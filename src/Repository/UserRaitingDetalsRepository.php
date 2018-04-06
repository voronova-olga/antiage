<?php

namespace App\Repository;

use App\Entity\UserRaitingDetals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserRaitingDetals|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserRaitingDetals|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserRaitingDetals[]    findAll()
 * @method UserRaitingDetals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRaitingDetalsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserRaitingDetals::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
