<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/CommentFixtures.php

namespace Libetto\ContactBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ContactBundle\Entity\Person;
use Libetto\ContactBundle\Entity\Contact;
use Libetto\ContactBundle\Entity\Company;
use Libetto\ContactBundle\Entity\Address;
use Libetto\ContactBundle\Entity\Phone;

class ContactFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("");
        $person->setCFirstName("Hans");
        $person->setCLastName("Müller");
        $person->setCEMail("hans.m@example.com");
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Ahornallee 14");
        $address->setCZipCode("12345");
        $address->setCCity("Musterstadt");
        $address->setCType(1);
        $phone = new Phone();
        $phone->setWholeNumber("+49 5614 135356 13");
        $phone->setCType(1);
        
        $person->addPhone($phone);
        $person->addAdresse($address);
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("Dr.");
        $person->setCFirstName("Thomas");
        $person->setCLastName("Schmidt");
        $person->setCEMail("t.schmidt@example.com");
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Lilienstraße 3");
        $address->setCZipCode("26334");
        $address->setCCity("Frankfurt");
        $address->setCType(1);
        
        $person->addAdresse($address);
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("CHF");
        $person = new Person();
        $person->setCSalutation("Frau");
        $person->setCTitle("");
        $person->setCFirstName("Stefanie");
        $person->setCLastName("Schulz");
        $person->setCEMail("s.schulz@example.com");
        
        $contact->setPerson($person);
        $contactArr[] = $contact;
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $company = new Company();
        $company->setCName("Musterfirma GmbH");
        $company->setCEMail("info@musterfirma.de");
        $company->setCHomepage("www.musterfirma.de");
        $phone = new Phone();
        $phone->setWholeNumber("+49 2886 23878 12");
        $phone->setCType(1);
        $company->addPhone($phone);
        $phone = new Phone();
        $phone->setWholeNumber("+49 2886 23878 51");
        $phone->setCType(2);
        $company->addPhone($phone);
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Bahnhofsstraße 120");
        $address->setCZipCode("83352");
        $address->setCCity("München");
        $address->setCType(1);
        $company->addAdresse($address);
        
        $contact->setCompany($company);
        $contactArr[] = $contact;
        
        
        $contact = new Contact();
        $contact->setCLanguage("en");
        $contact->setCCurrency("GBP");
        $company = new Company();
        $company->setCName("Example Inc.");
        $company->setCEMail("info@example.co.uk");
        $company->setCHomepage("www.example.co.uk");
        $phone = new Phone();
        $phone->setWholeNumber("+44 9246 72362 28");
        $phone->setCType(1);
        $company->addPhone($phone);
        $phone = new Phone();
        $phone->setWholeNumber("+44 9246 72362 33");
        $phone->setCType(2);
        $company->addPhone($phone);
        
        $contact->setCompany($company);
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