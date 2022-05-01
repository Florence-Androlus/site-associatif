<?php

namespace App\Repository;

use App\Entity\CS2020;

use Doctrine\ORM\Query;
use App\Entity\Contacts;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method CS2020|null findOneBy(array $criteria, array $orderBy = null)
 * @method CS2020[]    findAll()
 * @method CS2020[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CS2020Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CS2020::class);
    }

   
}
