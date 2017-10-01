<?php

namespace Ch\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChShopBundle:Default:index.html.twig');
    }
}
