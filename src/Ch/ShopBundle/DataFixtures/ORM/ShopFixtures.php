<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.08.2017
 * Time: 15:38
 */

namespace Ch\ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ch\ShopBundle\Entity\Product;
use Ch\ShopBundle\Entity\Category;

class ShopFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cat1= new Category();
        $cat1->setName('Mobile phone');
        $cat1->setDescription('Mobile telephone');
        $cat1->setImage('Phone.jpg');
        $manager->persist($cat1);


        $product1 = new Product();
        $product1->setName('Meizu M3S');
        $product1->setImage('meizu.jpg');
        $product1->setPrice(200);
        $product1->setDescription("Super cool phone. The best");
        $product1->setQuantity(10);
        $product1->addCategory($cat1);
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Xiomi 100');
        $product2->setImage('xiomi.jpg');
        $product2->setPrice(200);
        $product2->setDescription("Phone. Not bad");
        $product2->setQuantity(10);
        $product2->addCategory($cat1);
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setName('LG L90');
        $product3->setImage('lg_l90.jpg');
        $product3->setPrice(100);
        $product3->setDescription("Old phone. Not bad");
        $product3->setQuantity(10);
        $product3->addCategory($cat1);
        $manager->persist($product3);

        $manager->flush();
    }
}