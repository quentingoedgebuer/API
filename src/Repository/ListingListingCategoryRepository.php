<?php

namespace App\Repository;

use App\Entity\ListingListingCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ListingListingCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListingListingCategory::class);
	}

	public function findAllListingCategory(String $url) : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		// Récupère les données de la catégorie (si il y a des prestataire disponible)
		$sql = "SELECT  *, llc.id
			FROM listing_listing_category llc, listing_category lc, listing_category_translation lct
			WHERE llc.listing_category_id = lc.id
			AND lct.translatable_id = lc.id
			AND lc.url = :url
			LIMIT 1";

        $stmt = $conn->prepare($sql);
		$stmt->execute(["url" => $url]);

		$listing_category = $stmt->fetchAll();

		// Récupère les prestataires de la catégorie
		$sql = "SELECT l.price, l.certified, u.company_name, u.profession, ua.city,
				(SELECT name
				FROM listing_image
				WHERE listing_id = llc.listing_id
				LIMIT 1) AS image_listing,
				(SELECT name
				FROM user_image ui
				WHERE ui.user_id = u.id
				LIMIT 1) AS image_user
			FROM listing_listing_category llc, listing l, user u, user_address ua
			WHERE llc.listing_id = l.id
			AND l.user_id = u.id
			AND ua.user_id = u.id
			AND llc.listing_category_id  = :id";

		$stmt = $conn->prepare($sql);
		if(isset($listing_category[0]["listing_category_id"])){
			$stmt->execute(["id" => $listing_category[0]["listing_category_id"]]);
		}
		
		$listings = $stmt->fetchAll();

		$donnees = [
			"category" => $listing_category,
			"listings" => $listings
		];

        return $donnees;
	}

}