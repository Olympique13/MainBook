<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ContactFixture extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $this->contact($manager);
    }

    public function contact(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setNom('John');
        $contact->setPrenom('Doe');
        $contact->setEmail($contact->getNom() . '.' . $contact->getPrenom() . '@gmail.com');
        $contact->setSujet('Sujet de test');
        $contact->setMessage('C\'est un message pour voir si ça fonctionne');

        $manager->persist($contact);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['contact'];
    }
}
