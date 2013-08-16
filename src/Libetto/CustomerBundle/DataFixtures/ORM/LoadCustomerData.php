<?php

namespace Libetto\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\CustomerBundle\Entity\Customer;
use Libetto\ContactBundle\Entity\Contact;
use Libetto\ContactBundle\Entity\Company;
use Libetto\ContactBundle\Entity\Person;
use Libetto\ContactBundle\Entity\Address;
use Libetto\ContactBundle\Entity\Phone;

/**
 * Description of LoadCustomerData
 *
 * @author torstenzwoch
 */
class LoadCustomerData implements FixtureInterface {

    //put your code here

    public function load(ObjectManager $manager) {
        
        // Firmenkontakt
        $company = new Company();
        $company->setCName("Müller AG");
        $company->setCEMail("info@mueller-ag.de");
        $manager->persist($company);
        
        // Person
        $person = new Person();
        $person->setCSalutation("Frau");
        $person->setCTitle("");        
        $person->setCFirstName("Frauke");
        $person->setCLastName("Meier");
        $person->setCEMail("fm@mueller-ag.de");
        $manager->persist($person);
        
        //$manager->flush();        
        
        // Adressen zur Firma hinterlegen
        $address = new Address();
        $address->setCIsDefault("true");
        $address->setCCountry("Deutschland");
        $address->setCStreet("Mauerstraße 9");
        $address->setCZipCode("33235");
        $address->setCompany($company);
        $address->setCCity("Borgentreich");
        $manager->persist($address);
        
        $address2 = new Address();
        $address2->setCIsDefault("true");
        $address2->setCCountry("Deutschland");
        $address2->setCStreet("Zur Mühle 92");
        $address2->setCZipCode("38837");
        $address2->setCompany($company);
        $address2->setCCity("Berlin");
        $manager->persist($address2);
                
        //$manager->flush();         
        
        // Allgemeine Telefonnummer der Firma 
        $phone = new Phone();
        $phone->setCCountryCode("+49");
        $phone->setCRegion("5645");
        $phone->setCNumber("5265");
        $phone->setCOfficeNumber("0");
        $phone->setCType("");
        $phone->setCompany($company);   
        $manager->persist($phone);
        
        // Telefonnummern einer Person zur Firma 
        $phone2 = new Phone();
        $phone2->setCCountryCode("+49");
        $phone2->setCRegion("5645");
        $phone2->setCNumber("5265");
        $phone2->setCOfficeNumber("12");
        $phone2->setCType("");
        $phone2->setCompany($company);
        $phone2->setPerson($person);
        $manager->persist($phone2);
                
        //$manager->flush();            
        
        // Eintrag in die Contact-Mapping Tabelle
        $contact = new Contact();
        $contact->setCLanguage("DE");
        $contact->setCompany($company);
        //$manager->persist($contact);
        
        // Kunden für die Company anlegen
        $customer = new Customer();
        $customer->setCNumber("10200");
        $customer->setCInfo("Kommunikation nur über Frau Müller");
        $customer->setContact($contact);
        $customer->setInvoiceContact($contact);
            
        $manager->persist($customer);
        $manager->flush();      
    }

}

?>
