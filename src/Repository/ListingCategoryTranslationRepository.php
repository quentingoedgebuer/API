<?php

namespace App\Repository;

use App\Entity\ListingCategoryTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ListingCategoryTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListingCategoryTranslation::class);
	}

	public function findAllBySearch(String $search) : array
	{

		$conn = $this->getEntityManager()->getConnection();
		
		$sql = "SELECT name FROM listing_category_translation WHERE name LIKE :search LIMIT 0, 5";

        $stmt = $conn->prepare($sql);
		$stmt->execute(["search" => "%".$search."%"]);

        return $stmt->fetchAll();
	}

}