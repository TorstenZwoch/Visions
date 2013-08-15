<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/CommentFixtures.php

namespace Libetto\ContactBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ContactBundle\Entity\Person;
use Libetto\ContactBundle\Entity\Contact;

class ContactFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("");
        $person->setCFirstName("Hans");
        $person->setCLastName("Müller");
        $person->setCEMail("hans.m@example.com");
        $contact = new Contact();
        $contact->setCLanguage("Deutsch");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("Dr.");
        $person->setCFirstName("Thomas");
        $person->setCLastName("Schmidt");
        $person->setCEMail("t.schmidt@example.com");
        $contact = new Contact();
        $contact->setCLanguage("Deutsch");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        $person = new Person();
        $person->setCSalutation("Frau");
        $person->setCTitle("");
        $person->setCFirstName("Stefanie");
        $person->setCLastName("Schulz");
        $person->setCEMail("s.schulz@example.com");
        $contact = new Contact();
        $contact->setCLanguage("Deutsch");
        $contact->setCCurrency("CHF");
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        foreach ($contactArr as $contact) {
            $manager->persist($contact);
        }
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}