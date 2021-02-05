<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListingListingCategory;
use App\Entity\ListingCategoryTranslation;
use App\Entity\Listing;
use App\Entity\ListingLocation;
use App\Entity\User;

use App\Repository\ListingListingCategoryRepository;
use App\Repository\ListingRepository;
use App\Repository\UserRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class APIController extends AbstractController
{
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

    /**
     * @Route("/api/custom/getListingCategoryRecherche/", name="getListingCategoryRecherche")
     */
     public function getListingCategoryRecherche(Request $request)
     {
        $ListingCategoryTranslation = [];

        $search = $request->query->get('search');

        if(!empty($search)){
            $ListingCategoryTranslation = $this->getDoctrine()
                ->getRepository(ListingCategoryTranslation::class)
                ->findAllBySearch($search);
        }

        return new JsonResponse($ListingCategoryTranslation);
     }
     
    /**
     * @Route("/api/custom/getListingLocationRecherche/", name="getListingLocationRecherche")
     */
     public function getListingLocationRecherche(Request $request)
     {
        $listingLocations= [];

        $search = $request->query->get('search');

        if(!empty($search)){
            $listingLocations = $this->getDoctrine()
                ->getRepository(ListingLocation::class)
                ->findAllBySearch($search);
        }

        return new JsonResponse($listingLocations);
     }


      /**
     * @Route("/api/custom/getLesUsers/", name="getLesUsers")
     */
    public function getLesUsers(Request $request): Response
    {
        $users = [];

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAllUsers();
       
       return new JsonResponse($users);
    }


     /**
     * @Route("/api/custom/getLesPrestataires/", name="getLesPrestataires")
     */
    public function getLesPrestataires(Request $request): Response
    {
        $users = [];

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAllPrestataires();
       
       return new JsonResponse($users);
    }

    /**
     * @Route("/api/custom/getLesUsersLastMonth/", name="getLesUsersLastMonth")
     */
    public function getLesUsersLastMonth(Request $request): Response
    {
        $users = [];

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findInscriptionLastMonth();
       
       return new JsonResponse($users);
    }

     /**
     * @Route("/api/custom/getLesUsersLastWeek/", name="getLesUsersLastWeek")
     */
    public function getLesUsersLastWeek(Request $request): Response
    {
        $users = [];

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findInscriptionLastWeek();
       
       return new JsonResponse($users);
    }

     /**
     * @Route("/api/custom/getLesListing/", name="getLesListing")
     */
    public function getLesListing(Request $request): Response
    {
        $users = [];

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAllListing();
       
       return new JsonResponse($users);
    }

    
}
