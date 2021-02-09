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

	/**
	* Moteur de recherche du site WeddingYourself
	*/
	public function findAllBySearch(String $search, String $location) : array
	{
		$listMotCle = explode(" ", $search);
		$listLocation = explode(" ", $location);

		$conn = $this->getEntityManager()->getConnection();

		$sqlMotCle = "";
		foreach ($listMotCle as $m) {
			$sqlMotCle .= "AND (lt.title LIKE '%".$m."%'
			OR u.profession LIKE '%".$m."%'
			OR lct.name LIKE '%".$m."%')";
		}

		$sqlLocation = "";
		foreach ($listLocation as $l) {
			$sqlLocation = "AND (ll.city LIKE '%".$l."%')";
		}
		
		$sqlSearch = "SELECT l.price, l.certified, lt.title, lt.slug, ll.city, lct.name AS category, u.last_name AS user_name,
		(SELECT name FROM user_image WHERE user_id = u.id LIMIT 1) AS user_image,
		(SELECT name FROM listing_image WHERE listing_id = l.id LIMIT 1) AS listing_image
		FROM listing l, user u, listing_location ll, listing_listing_category llc, listing_category lc, listing_category_translation lct, listing_translation lt
		WHERE l.user_id = u.id
		AND ll.id = l.location_id
		AND llc.listing_id = l.id
		AND llc.listing_category_id = lc.id
		AND lct.translatable_id = lc.id
		AND lt.translatable_id = l.id "
		.$sqlMotCle ." 
		".$sqlLocation.
		"GROUP BY lt.title";

        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

	public function findAllListing() : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		$sqlSearch = "SELECT id, listingCategory FROM listing";
		
        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

}