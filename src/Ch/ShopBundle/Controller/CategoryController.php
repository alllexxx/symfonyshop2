<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 29.08.2017
 * Time: 13:10
 */

namespace Ch\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class CategoryController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('ChShopBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $categoryName=$category->getName();
        $products =$category ->getProducts();

        return $this->render('ChShopBundle:Category:show.html.twig', array(
            'categoty_name' =>$categoryName,
            'products'      => $products
        ));
    }

}
