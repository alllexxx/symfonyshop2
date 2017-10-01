<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 30.09.2017
 * Time: 9:40
 */
namespace Ch\ShopBundle\Twig\Extensions;

use Ch\ShopBundle\Entity\Category;
use Twig_Extension;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ChShopExtension extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'getallcategories',
                        array($this, 'getAllCategory'),
                        array(
                        'is_safe' => array('html'),
                        'needs_environment' => true,
                        )
            ),
        );

    }


    protected $doctrine;
    // Retrieve doctrine from the constructor
    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAllCategory(\Twig_Environment $environment)
    {
        $em = $this->doctrine->getManager();
        $categories = $em->getRepository('ChShopBundle:Category')->getAllCategories();
        return $environment->render('ChShopBundle:TwigExtension:categories.html.twig', array('categories' => $categories));
    }

    public function getName()
    {
        return 'ch_blog_extension';
    }
}