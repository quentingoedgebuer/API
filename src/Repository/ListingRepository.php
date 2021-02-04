<?php

namespace App\Repository;

use App\Entity\Listing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listing::class);
	}

	public function findAllBySearch(String $search, String $location) : array
	{
		$listMotCle = explode(" ", $search);
		$listLocation = explode(" ", $location);

		$conn = $this->getEntityManager()->getConnection();

		$sqlMotCle = "";
		foreach ($listMotCle as $m) {
			$sqlMotCle .= "AND (u.company_name LIKE '%".$m."%'
			OR u.profession LIKE '%".$m."%'
			OR lct.name LIKE '%".$m."%')";
		}

		$sqlLocation = "";
		foreach ($listLocation as $l) {
			$sqlLocation = "AND (ua.city LIKE '%".$l."%')";
		}
		
		$sqlSearch = "SELECT l.price, l.certified, u.company_name, u.profession, ua.city, lct.name AS category,
		(SELECT name FROM user_image WHERE user_id = u.id LIMIT 1) AS user_image,
		(SELECT name FROM listing_image WHERE listing_id = l.id LIMIT 1) AS listing_image
		FROM listing l, user u, user_address ua, listing_listing_category llc, listing_category lc, listing_category_translation lct
		WHERE l.user_id = u.id
		AND ua.user_id = u.id
		AND llc.listing_id = l.id
		AND llc.listing_category_id = lc.id
		AND lct.translatable_id = lc.id "
		.$sqlMotCle ." 
		".$sqlLocation;

        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

}