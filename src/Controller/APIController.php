<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListingListingCategory;
use App\Entity\Listing;
use App\Repository\ListingListingCategoryRepository;
use App\Repository\ListingRepository;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;



class APIController extends AbstractController
{
    /**
     * @Route("/api/custom/getListingCategorie/{url}", name="getListingCategorie")
     */
    public function getListingCategorie(String $url): Response
    {
        $ListingListingCategory = $this->getDoctrine()
            ->getRepository(ListingListingCategory::class)
            ->findAllListingCategory($url);

        return new JsonResponse($ListingListingCategory);
    }

    /**
     * @Route("/api/custom/getListingRecherche/", name="getListingRecherche")
     */
     public function getListingRecherche(Request $request): Response
     {
        $ListingListingCategory = [];

        $search = $request->query->get('search');
        $location = $request->query->get('location');

        if(!empty($search) || !empty($location)){
            $ListingListingCategory = $this->getDoctrine()
                ->getRepository(Listing::class)
                ->findAllBySearch($search, $location);
        }

        return new JsonResponse($ListingListingCategory);
     }
}
