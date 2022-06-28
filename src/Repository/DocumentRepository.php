<?php

namespace App\Repository;

use App\Entity\Document;
use App\Entity\Categorie;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Document>
 *
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }

    public function add(Document $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Document $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getQueryBuilderForList(): QueryBuilder
    {
        return $this->createQueryBuilder('d');
    }
    
    public function getAllDocumentsByCategorie(Document $doc): array
    {
        $query = $this->createQueryBuilder('d')
        ->select('c.name')
        ->innerJoin('d.categories', 'c')
        ->andWhere('d.id = :doc')
        ->getDQL();
                
        $query_2 = $this->createQueryBuilder('d2')
        ->select('DISTINCT d2')
        ->innerJoin('d2.categories', 'c2')
        ->andWhere("c2.name IN($query)")
        ->setParameter('doc', $doc->getId())
        ->getQuery()
        ->getResult()
        ;

        return $query_2;
    }

    public function getSimilarDocuments(Document $document): array
    {
        $query = $this->createQueryBuilder('d')
        ->select('c.name')
        ->innerJoin('d.categories', 'c')
        ->andWhere('d.id = :document')
        ->getDQL();
                
        $query_2 = $this->createQueryBuilder('d2')
        ->select('DISTINCT d2')
        ->innerJoin('d2.categories', 'c2')
        ->andWhere("c2.name IN($query)")
        ->andWhere("d2.id != :document")
        ->setParameter('document', $document->getId())
        ->setMaxResults(5)
        ->getQuery()
        ->getResult()
        ;

        return $query_2;
    }

}
