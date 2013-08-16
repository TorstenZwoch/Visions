<?php

namespace Libetto\SupplierBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\SupplierBundle\Entity\Supplier;
use Libetto\SupplierBundle\Entity\SupplierLead;
use Libetto\ContactBundle\Entity\Contact;
use Libetto\ContactBundle\Entity\Address;
use Libetto\ContactBundle\Entity\Person;

/**
 * Description of LoadSupplierData
 *
 * @author
 */
class LoadSupplierData implements FixtureInterface{
    //put your code here
    
    public function load(ObjectManager $manager){
        
        
        // Supplier 1
        
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("Dr.");
        $person->setCFirstName("Franz");
        $person->setCLastName("Wilper");
        $person->setCEMail("franz.w@example.com");
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Auf der Heide 14");
        $address->setCZipCode("33154");
        $address->setCCity("Salzkotten");
        $address->setCType(1);
        $person->addAdresse($address);
        
        $person2 = new Person();
        $person2->setCSalutation("Frau");
        $person2->setCTitle("");
        $person2->setCFirstName("Maria");
        $person2->setCLastName("Richter");
        $person2->setCEMail("maria.r@example.com");
        
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Parkstraße 17");
        $address->setCZipCode("33154");
        $address->setCCity("Salzkotten");
        $address->setCType(1);
        $person2->addAdresse($address);
        
        $contact2 = new Contact();
        $contact2->setCLanguage("de");
        $contact2->setCCurrency("EUR");
        $contact2->setPerson($person2);
        
        $supplier = new Supplier();
        $supplier->setCNumber("7000417");
        $supplier->setCInfo("");
        $supplier->setInvoiceContact($contact2);
        $supplier->setContact($contact);
        $supplier->setRContactGroup("Getränke");
        $supplier->setRTermsOfPayment("Zahlung bei Lieferung");
        $supplier->setRPricelist("GF-GT-17");

        $manager->persist($supplier);      
        $manager->flush();
        
        
        // Supplier 2
                
        $person = new Person();
        $person->setCSalutation("Frau");
        $person->setCTitle("");
        $person->setCFirstName("Laura");
        $person->setCLastName("Funke");
        $person->setCEMail("laura.f@example.com");
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Auf der Heide 14");
        $address->setCZipCode("33154");
        $address->setCCity("Salzkotten");
        $address->setCType(1);
        $person->addAdresse($address);
        
        $person2 = new Person();
        $person2->setCSalutation("Herr");
        $person2->setCTitle("");
        $person2->setCFirstName("Thomas");
        $person2->setCLastName("Fischer");
        $person2->setCEMail("thomas.f@example.com");
        
        $address = new Address();
        $address->setCCountry("Deutschland");
        $address->setCIsDefault(true);
        $address->setCStreet("Bahnhofsstraße 17");
        $address->setCZipCode("33154");
        $address->setCCity("Salzkotten");
        $address->setCType(1);
        $person2->addAdresse($address);
        
        $contact2 = new Contact();
        $contact2->setCLanguage("de");
        $contact2->setCCurrency("EUR");
        $contact2->setPerson($person2);
        
        $supplier = new Supplier();
        $supplier->setCNumber("7000307");
        $supplier->setCInfo("");
        $supplier->setInvoiceContact($contact2);
        $supplier->setContact($contact);
        $supplier->setRContactGroup("Lebensmittel");
        $supplier->setRTermsOfPayment("Rechnung");
        $supplier->setRPricelist("GF-LM-13");

        $manager->persist($supplier);      
        $manager->flush();
        
        
        // SupplierLead 1
                
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("");
        $person->setCFirstName("Martin");
        $person->setCLastName("Weinz");
        $person->setCEMail("martin.w@example.com");
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        
        $supplierlead = new SupplierLead();
        $supplierlead->setCNumber("6000417");
        $supplierlead->setCInfo("");
        $supplierlead->setContact($contact);
        $supplierlead->setRContactGroup("Lebensmittel");
        $supplierlead->setRTermsOfPayment("Vorauszahlung");
        $supplierlead->setRPricelist("GS-LM-04");

        $manager->persist($supplierlead);      
        $manager->flush();
        
        
        //SupplierLead 2
        
        $person = new Person();
        $person->setCSalutation("Herr");
        $person->setCTitle("");
        $person->setCFirstName("Peter");
        $person->setCLastName("Müller");
        $person->setCEMail("peter.m@example.com");
        
        $contact = new Contact();
        $contact->setCLanguage("de");
        $contact->setCCurrency("EUR");
        $contact->setPerson($person);
        
        $supplierlead = new SupplierLead();
        $supplierlead->setCNumber("6000415");
        $supplierlead->setCInfo("");
        $supplierlead->setContact($contact);
        $supplierlead->setRContactGroup("");
        $supplierlead->setRTermsOfPayment("Rechnung");
        $supplierlead->setRPricelist("GS-DF-25");

        $manager->persist($supplierlead);      
        $manager->flush();
        
        
    }
}

?>
