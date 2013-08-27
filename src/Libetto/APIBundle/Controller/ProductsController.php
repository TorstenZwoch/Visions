<?php

namespace Libetto\APIBundle\Controller;

use Libetto\ItemBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getProductsAction(Request $request) {
        $columns[] = array( 'sTitle' => 'Id',
                            'mData' => 'id');

        $columns[] = array('sTitle' => 'Name',
            'mData' => 'c_name');

        $columns[] = array('sTitle' => 'Kurzname',
            'mData' => 'c_short_name');
        
        /* columns for sorting */
        $colName = array(
            "p.id",
            "p.cName",
            "p.cShortName"
        );
        
        $orderBy = $colName[(int) $request->query->get('iSortCol_0', 0)] . " " . $request->query->get('sSortDir_0', "ASC");
        
        /* Query Limit */
        $iDisplayStart = $request->query->get('iDisplayStart', 0);
        $iDisplayLength = $request->query->get('iDisplayLength', 10);

        /* Where clause for both queries */
        $where = "WHERE p.cName LIKE :name OR p.cDescription LIKE :description";

        /* Query */
        $data = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                        'SELECT p.id, p.cName as c_name, p.cShortName as c_short_name FROM LibettoItemBundle:Product p ' . $where . ' ORDER BY ' . $orderBy
                )
                ->setParameter('name', "%" . $request->query->get('sSearch', "") . "%")
                ->setParameter('description', "%" . $request->query->get('sSearch', "") . "%")
                ->setFirstResult($iDisplayStart)
                ->setMaxResults($iDisplayLength)
                ->getResult();

        /* Count all records for correct display of lines in table footer */
        $count = $this->getDoctrine()->getEntityManager()
                ->createQuery(
                        'SELECT count(p) as amount FROM LibettoItemBundle:Product p ' . $where . ' ORDER BY p.cName ASC '
                )
                ->setParameter('name', "%" . $request->query->get('sSearch', "") . "%")
                ->setParameter('description', "%" . $request->query->get('sSearch', "") . "%")                
                ->getResult();

        /* configure table */
        $sEcho = ($request != null) ? (int) $request->query->get('sEcho') : 1;
        $config["sEcho"] = $sEcho;
        $config["iTotalRecords"] = $count[0]["amount"];
        $config["iTotalDisplayRecords"] = $count[0]["amount"];
        $config["aaData"] = $data;
        $config["aoColumns"] = $columns;
        $config["sAjaxSource"] = $this->generateUrl('get_products') . ".json";

        return $config;
    }

    /**
     * @param Product $products
     * @return array
     * @View()
     * @ParamConverter("Product", class="LibettoItemBundle:Product")
     */
    public function getProductAction(Product $product) {
        $products = $this->getDoctrine()->getRepository('LibettoItemBundle:Product')->find($product);

        return array('records' => $products);
    }

}
