<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.08.2017
 * Time: 14:03
 */

namespace Ch\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $products = $em->getRepository('ChShopBundle:Product')
            ->getLatestProducts();

        $categories = $em->getRepository('ChShopBundle:Category')
            ->getAllCategories();

        return $this->render('ChShopBundle:Page:index.html.twig', array(
            'products' => $products,
            'categories' =>$categories
        ));
    }


}