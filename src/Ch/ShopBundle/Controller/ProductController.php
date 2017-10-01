<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.08.2017
 * Time: 15:23
 */

namespace Ch\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class ProductController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('ChShopBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Blog product.');
        }

        $categories = $product->getCategories();


        return $this->render('ChShopBundle:Product:show.html.twig', array(
            'product'      => $product,
            'categories'   => $categories
        ));
    }


}