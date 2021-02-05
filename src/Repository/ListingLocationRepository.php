<?php

namespace App\Repository;

use App\Entity\ListingLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ListingLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListingLocation::class);
	}

	public function findAllBySearch(String $search) : array
	{
		$conn = $this->getEntityManager()->getConnection();

		$sql = "SELECT city FROM listing_location WHERE city LIKE :city LIMIT 0, 5";

        $stmt = $conn->prepare($sql);
		$stmt->execute(["city" => "%".$search."%"]);

        return $stmt->fetchAll();
	}

}