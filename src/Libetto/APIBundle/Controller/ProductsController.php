<?php

namespace Libetto\APIBundle\Controller;

use Libetto\ItemBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProductsController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getProductsAction()
    {
        $productss = $this->getDoctrine()->getRepository('LibettoItemBundle:Product')->findAll();
        return array('records' => $productss);
    }
    
    /**
     * @param Product $products
     * @return array
     * @View()
     * @ParamConverter("Product", class="LibettoItemBundle:Product")
     */
    public function getProductAction(Product $products)
    {        
        $productss = $this->getDoctrine()->getRepository('LibettoItemBundle:Product')->find($products);
        return array('records' => $productss);
    }    
}
