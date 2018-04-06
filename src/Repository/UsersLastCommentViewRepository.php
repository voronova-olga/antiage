<?php

namespace App\Repository;

use App\Entity\UsersLastCommentView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UsersLastCommentView|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersLastCommentView|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersLastCommentView[]    findAll()
 * @method UsersLastCommentView[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersLastCommentViewRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UsersLastCommentView::class);
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
