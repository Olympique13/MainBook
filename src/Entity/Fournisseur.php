<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $frs_name = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $frs_product = null;

    #[ORM\Column]
    private ?int $frs_stock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrsName(): ?string
    {
        return $this->frs_name;
    }

    public function setFrsName(string $frs_name): static
    {
        $this->frs_name = $frs_name;

        return $this;
    }

    public function getFrsProduct(): ?Product
    {
        return $this->frs_product;
    }

    public function setFrsProduct(Product $frs_product): static
    {
        $this->frs_product = $frs_product;

        return $this;
    }

    public function getFrsStock(): ?int
    {
        return $this->frs_stock;
    }

    public function setFrsStock(int $frs_stock): static
    {
        $this->frs_stock = $frs_stock;

        return $this;
    }

    public function __toString(): string
    {
        return $this->frs_name;
    }
}
