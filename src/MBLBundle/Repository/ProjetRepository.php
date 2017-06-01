<?php

namespace MBLBundle\Repository;

/**
 * ProjetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLast4()
    {
        return $this ->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.dateCreation', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
            ;// TODO: Change the autogenerated stub
    }
}
