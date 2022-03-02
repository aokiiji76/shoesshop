<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

   
    public function availableProductByCat($categoryId)
    {
        return $this->createQueryBuilder('p')
        ->addSelect('c') 
        ->leftJoin('p.category', 'c')
        ->where('c.id = :id')
        ->andWhere('p.status = 1')
        ->setParameter('id', $categoryId)
        ->getQuery()
        ->getResult();
    }

    public function availableProductByType($typeId)
    {
        return $this->createQueryBuilder('p')
        ->addSelect('t') 
        ->leftJoin('p.type', 't')
        ->where('t.id = :id')
        ->andWhere('p.status = 1')
        ->setParameter('id', $typeId)
        ->getQuery()
        ->getResult();
    }
    
    public function availableProductByBrand($brandId)
    {
        return $this->createQueryBuilder('p')
        ->addSelect('b') 
        ->leftJoin('p.brand', 'b')
        ->where('b.id = :id')
        ->andWhere('p.status = 1')
        ->setParameter('id', $brandId)
        ->getQuery()
        ->getResult();
    }

   
}
