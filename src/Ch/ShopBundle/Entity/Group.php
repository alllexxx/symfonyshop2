<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 30.09.2017
 * Time: 12:08
 */

namespace Ch\ShopBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __toString()
    {
        return parent::getName();
    }
}