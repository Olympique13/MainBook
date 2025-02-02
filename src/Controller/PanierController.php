<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CartItemRepository;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CartItem;

class PanierController extends AbstractController
{
    #[Route('/mon-panier', name: 'app_panier')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function index(CartItemRepository $cartItemRepository): Response
    {
        $user = $this->getUser();
        $cartItems = $cartItemRepository->findBy(['user' => $user]);
        $total = array_reduce($cartItems, function ($sum, $item) {
            return $sum + ($item->getProduct()->getPrice() * $item->getQuantity());
        }, 0);

        return $this->render('panier/monPanier.html.twig', [
            'cart' => $cartItems,
            'total' => $total,
        ]);
    }

    #[Route('/mon-panier/remove/{id}', name: 'remove_from_cart', methods: ['POST'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function remove(CartItem $cartItem, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if ($cartItem->getUser() !== $user) {
            throw $this->createAccessDeniedException();
        }

        $em->remove($cartItem);
        $em->flush();

        return $this->redirectToRoute('app_panier');
    }

    #[Route('/mon-panier/update/{id}', name: 'update_cart_item', methods: ['POST'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function update(CartItem $cartItem, Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if ($cartItem->getUser() !== $user) {
            throw $this->createAccessDeniedException();
        }

        $action = $request->query->get('action');
        if ($action === 'increment') {
            $cartItem->setQuantity($cartItem->getQuantity() + 1);
        } elseif ($action === 'decrement') {
            $cartItem->setQuantity($cartItem->getQuantity() - 1);
            if ($cartItem->getQuantity() <= 0) {
                $em->remove($cartItem);
            }
        } else {
            $quantity = $request->request->get('quantity');
            if ($quantity > 0) {
                $cartItem->setQuantity($quantity);
            } else {
                $em->remove($cartItem);
            }
        }
        $em->flush();

        return $this->redirectToRoute('app_panier');
    }
}
