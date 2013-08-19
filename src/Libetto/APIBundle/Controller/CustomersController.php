<?php

namespace Libetto\APIBundle\Controller;

use Libetto\CustomerBundle\Entity\Customer;
use Libetto\ItemBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CustomersController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getCustomersAction()
    {
        //$customers = $this->getDoctrine()->getRepository('LibettoCustomerBundle:Customer')->findAll();
        $customers = $this->getDoctrine()->getRepository('LibettoItemBundle:Product')->findAll();
        return array('records' => $customers);
    }
    
    /**
     * @param Product $customer
     * @return array
     * @View()
     * @ParamConverter("Product", class="LibettoItemBundle:Product")
     */
    public function getCustomerAction(Product $customer)
    {        
        $customers = $this->getDoctrine()->getRepository('LibettoItemBundle:Product')->find($customer);
        //$customers = $this->getDoctrine()->getRepository('LibettoCustomerBundle:Customer')->find($customer);
        return array('records' => $customers);
    }    
}
