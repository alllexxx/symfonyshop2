<?php

namespace Ch\ShopBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function getLatestProducts($limit = null)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->addOrderBy('p.created', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}
