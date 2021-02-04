<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\UserAddress;
use App\Entity\UserImage;
use App\Entity\Listing;
use App\Entity\ListingImage;
use App\Entity\ListingCategory;
use App\Entity\ListingListingCategory;
use App\Entity\listingCategoryTranslation;
use App\Entity\Mariage;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Theme;

class AppFixtures extends Fixture
{
    private $manager;
    private $repoUser;
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->manager = $manager;
        $repoUser = $this->manager->getRepository(User::class);

        // Create mariage
        $this->loadMariage();

        // Create listingCategory
        $this->loadCategorie();

        // Create user and listing
        $this->loadUserListing(120);

        // Create article and category article 
        $this->loadArticleCategory();

        // Create header and footer
        $this->loadHeaderFooter();

        $manager->flush();
    }

    public function loadUserListing($nb)
    {
        for ($i=0; $i < $nb; $i++) { 
            $user = new User();
            $user->setUsername($this->faker->lastName());
            $user->setEmail($this->faker->email());
            $user->setPassword("password");
            $user->setRoles([]);
            $user->setPersonType($this->faker->numberBetween(1,2));
            $user->setCompanyName($this->faker->company());
            $user->setLastName($this->faker->lastName());
            $user->setFirstName($this->faker->firstName());
            $user->setPhone($this->faker->e164PhoneNumber());
            $user->setNationality("FR");
            $user->setProfession($this->faker->company());
            $user->setCreatedat($this->faker->dateTimeInInterval('-20 days', '+20 days'));
            $this->manager->persist($user);

            $userAdress = new UserAddress();
            $userAdress->setAddress($this->faker->address());
            $userAdress->setCity($this->faker->city());
            $userAdress->setCountry("FR");
            $user->addAddress($userAdress);
            $this->manager->persist($userAdress);

            $userImage = new UserImage();
            $userImage->setName("mariage-turc.png");
            $user->addImage($userImage);
            $this->manager->persist($userImage);

            $listing = new Listing();
            $listing->setStatus(2);
            $listing->setPrice($this->faker->numberBetween(100, 2000));
            $listing->setCertified(false);
            $user->addListing($listing);
            $this->manager->persist($listing);

            $listingImage = new ListingImage();
            $listingImage->setName("ImageAccueil5ec296248a5a7.png");
            $listingImage->setPosition(0);
            $listing->addListingImage($listingImage);
            $this->manager->persist($listingImage);

            // Ajoute des mariages aux prestataires
            for ($i2=0; $i2 < mt_rand(3,5); $i2++) { 
                $listing->addMariage($this->getReference("mariage-".mt_rand(1,8)));
            }

            // Ajoute des category aux prestataires
            for ($i2=0; $i2 < mt_rand(1,2); $i2++) { 
                $listing->addListingCategory($this->getReference("cat-".mt_rand(1,17)));
            }

        }
    }


    public function loadMariage()
    {   
        $mariage = new Mariage();
        $mariage->setNom('Mariage à la carte');
        $mariage->setUrl('mariage-a-la-carte');
        $mariage->setTexte('Si vous souhaitez organiser un mariage à votre image, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à cet événement.');
        $mariage->setImageaccueil("ImageAccueil5ed62ef34a9aa.png");
        $mariage->setImage('Type-Mariage5ea3f4eda814f.png');
        $mariage->setTraduction('dd');
        $this->addReference("mariage-1", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage juif');
        $mariage->setUrl('mariage-juif');
        $mariage->setTexte('Si vous souhaitez vous marier selon la tradition juive, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à ce rituel.');
        $mariage->setImageaccueil("ImageAccueil5ec29642e00b7.png");
        $mariage->setImage('Type-Mariage5ea3f50d113bb.png');
        $mariage->setTraduction('נישואין יהודיים');
        $this->addReference("mariage-2", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage maghrébin');
        $mariage->setUrl('mariage-maghrebin');
        $mariage->setTexte('Si vous souhaitez vous marier selon la tradition maghrébine, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à ce rituel.');
        $mariage->setImageaccueil("ImageAccueil5ed630b9a34ad.png");
        $mariage->setImage('Type-Mariage5ec29588d68b0.png');
        $mariage->setTraduction('زواج المغرب');
        $this->addReference("mariage-3", $mariage);
        $this->manager->persist($mariage);
        
        $mariage = new Mariage();
        $mariage->setNom('Mariage pour tous');
        $mariage->setUrl('mariage-lgbt');
        $mariage->setTexte('Si vous souhaitez organisez un mariage entre personnes de même sexe, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer cet évènement.');
        $mariage->setImageaccueil("ImageAccueil5ec2968b1c195.png");
        $mariage->setImage('Type-Mariage5ea3f53e2d58b.png');
        $mariage->setTraduction('Hello, quelqu\'un peut s\'en occuper');
        $this->addReference("mariage-4", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage turc');
        $mariage->setUrl('mariage-turc');
        $mariage->setTexte('Si vous souhaitez vous marier selon la tradition turque, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à ce rituel.');
        $mariage->setImageaccueil("ImageAccueil5ed6328a82c7e.png");
        $mariage->setImage('Type-Mariage5ea3f55c7d8c6.png');
        $mariage->setTraduction('Türk evliliğinde');
        $this->addReference("mariage-5", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage asiatique');
        $mariage->setUrl('mariage-asistique');
        $mariage->setTexte('Si vous souhaitez vous marier selon la tradition asiatique, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à ce rituel.');
        $mariage->setImageaccueil("ImageAccueil5ed6338bd014c.png");
        $mariage->setImage('Type-Mariage5ea3f57185877.png');
        $mariage->setTraduction('亚洲婚礼');
        $this->addReference("mariage-6", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage indien');
        $mariage->setUrl('mariage-indien');
        $mariage->setTexte('Si vous souhaitez vous marier selon la tradition indienne, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer à ce rituel.');
        $mariage->setImageaccueil("ImageAccueil5ed634242e099.png");
        $mariage->setImage('Type-Mariage5ea3f5819f517.png');
        $mariage->setTraduction('भारतीय शादी');
        $this->addReference("mariage-7", $mariage);
        $this->manager->persist($mariage);

        $mariage = new Mariage();
        $mariage->setNom('Mariage végan');
        $mariage->setUrl('mariage-vegan');
        $mariage->setTexte('Si vous souhaitez organisez un mariage 100% végan et écolo, nous vous proposons une liste de prestataires qui vous permettront de bien vous préparer cet événement.');
        $mariage->setImageaccueil("ImageAccueil5ed634f606cf8.png");
        $mariage->setImage('Type-Mariage5ea3f593f348f.png');
        $mariage->setTraduction('d');
        $this->addReference("mariage-8", $mariage);
        $this->manager->persist($mariage);
    }
    
    public function loadCategorie()
    {
        // HOME Categorie
        $category = new ListingCategory();
        $category->setTexteaccueil("Optez pour les meilleurs services gastronomiques ! Le choix et la qualité de la nourriture contribue largement au succès d’un événement.");
        $category->setTexte("En réservant un traiteur professionnel, vous mettez toutes les chances de votre côté pour rendre celui-ci mémorable. Consultez leurs profils, les avis des jeunes mariés et demandez-leur des devis sur mesure. Réservez facilement le meilleur prestataire, celui qui sera parfait pour la célébration de votre événement.");
        $category->setImageaccueil("tmariage2.png");
        $category->setImage("Type-prestataire5ed63f25864e2.jpeg");
        $category->setUrl("traiteurs");
        $lct = new listingCategoryTranslation();
        $lct->setName("Traiteurs");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-1", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setTexteaccueil("Trouvez les meilleurs photographes professionnels spécialisés dans la photographie de mariage pour la réalisation du reportage photo du plus beau jour de votre vie.");
        $category->setTexte("Consultez leurs profils, les avis des jeunes mariés et demandez-leur des devis sur mesure. Réservez facilement le meilleur prestataire, celui qui sera parfait pour la célébration de votre événement.");
        $category->setImageaccueil("tmariage3.png");
        $category->setImage("Type-prestataire5edcac6228b93.jpg");
        $category->setUrl("photo-et-video");
        $lct = new listingCategoryTranslation();
        $lct->setName("Photo et vidéo");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-2", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setTexteaccueil("Pour réussir un événement, la musique et l’animation jouent un rôle important. Elles donnent de l’ambiance à la soirée et garantit qu’elle reste dans les mémoires.");
        $category->setTexte("Chaque divertissement est un enjeu majeur, faire en sorte que vous et les invités gardent en tête un souvenir mémorable de cette soirée. Consultez leurs profils, les avis des jeunes mariés et demandez-leur des devis sur mesure. Réservez facilement le meilleur prestataire, celui qui sera parfait pour la célébration de votre événement.");
        $category->setImageaccueil("Type-prestataire5ecb9ae681c4e.png");
        $category->setImage("Type-prestataire5eafc67f479cb.jpeg");
        $category->setUrl("musique-et-animation");
        $lct = new listingCategoryTranslation();
        $lct->setName("Musique et Animation");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-3", $category);
        $this->manager->persist($category);
        // ---

        $category = new ListingCategory();
        $category->setUrl("lieux-de-reception");
        $lct = new listingCategoryTranslation();
        $lct->setName("Lieux de réception");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-4", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("fleuriste");
        $lct = new listingCategoryTranslation();
        $lct->setName("Fleuriste");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-5", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("decoration");
        $lct = new listingCategoryTranslation();
        $lct->setName("Décoration");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-6", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("location-de-vehicule");
        $lct = new listingCategoryTranslation();
        $lct->setName("Location de véhicules");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-7", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("bijoutiers");
        $lct = new listingCategoryTranslation();
        $lct->setName("Bijoutiers");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-8", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("wedding-planner");
        $lct = new listingCategoryTranslation();
        $lct->setName("Wedding planner");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-9", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("agence-de-voyages");
        $lct = new listingCategoryTranslation();
        $lct->setName("Agences de voyages");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-10", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("robes-de-mariee");
        $lct = new listingCategoryTranslation();
        $lct->setName("Robes de mariée");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-11", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("accessoires-mariee");
        $lct = new listingCategoryTranslation();
        $lct->setName("Accessoires mariée");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-12", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("beaute");
        $lct = new listingCategoryTranslation();
        $lct->setName("Beauté");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-13", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("tenue-du-marie");
        $lct = new listingCategoryTranslation();
        $lct->setName("Tenue du marié");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-14", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("faire-part");
        $lct = new listingCategoryTranslation();
        $lct->setName("Faire-part");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-15", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("autres");
        $lct = new listingCategoryTranslation();
        $lct->setName("Autres");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-16", $category);
        $this->manager->persist($category);

        $category = new ListingCategory();
        $category->setUrl("cake-designer");
        $lct = new listingCategoryTranslation();
        $lct->setName("Cake designer");
        $lct->setLocale("fr");
        $this->manager->persist($lct);
        $category->addListingCategoryTranslation($lct);
        $this->addReference("cat-17", $category);
        $this->manager->persist($category);
    }


    //////////////////////////////////ARTICLE///////////////////////////////////////

    public function loadArticleCategory()
    {
        $category = new Categorie();
        $category->setLibelle("test");
        $this->manager->persist($category);

        $article = new Article();
        $article->setTitre("test");
        $article->setContenu("testtest");
        //$article->setDate(null);
        $article->setUrl("test");
        $article->setExtrait("test");
        $article->setImage("test");
        $article->setCategorie($category);
        $this->manager->persist($article);
      
    }

    public function loadHeaderFooter()
    {
        $theme = new Theme();
        $theme->setHeader("<header>\r\n
        <div class=\"navbar navbar-dark\">\r\n
        <div class=\"container d-flex justify-content-between\">\r\n
        <a href=\"https://weddingyourself.fr/fr/\" class=\"navbar-brand d-flex align-items-center\">\r\n
        <img src=\"https://weddingyourself.fr/images/logo.png\" alt=\"Accueil\"/>\r\n
        </a>\r\n
        <div class=\"right_menu\">\r\n
        <a href=\"https://weddingyourself.fr/fr/page/comment-ca-marche\" class=\"fav_link\" abindex=\"5\">\r\n
        Comment ça marche ?\r\n
        </a>\r\n
        <a>\r\n
        <a href=\"http://serveur1.arras-sio.com/symfony4-4057/blog/public/payement\" class=\"fav_link\" abindex=\"5\">\r\n
        Payer\r\n
        </a>\r\n
        <a href=\"\'{{path(\'index\')}}\'\" class=\"fav_link\" abindex=\"5\">\r\n
        Blog\r\n
        </a>\r\n
        <!-- <a href=\"/fr/annonce/favorite\" class=\"fav_link\" abindex=\"5\"> <i class=\"fa fa-heart\" aria-hidden=\"true\"></i> Favoris <span id=\"fav-count\"></span> </a> -->\r\n
        <!-- User info -->\r\n
        <a class=\"conn_link\" href=\"https://weddingyourself.fr/fr/inscription\" tabindex=\"7\">\r\n
        Connectez-vous\r\n
        </a>\r\n
        <!-- New listing link -->\r\n
        <a href=\"https://weddingyourself.fr/fr/inscription\" class=\"wedder_link\" tabindex=\"9\">\r\n
        DEVENIR WEDDER\r\n
        </a>\r\n
        </div>\r\n
        </div>\r\n
        </div>\r\n
        </header>");
        $theme->setFooter('<!-- Footer -->\r\n
        <footer id=\"footer\">\r\n
        <div class=\"container\">\r\n
        <div class=\"row text-center text-xs-center text-sm-left text-md-left\">\r\n
        <div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n
        <h5 class=\"colorwy\">A propos</h5>\r\n
        <ul class=\"list-unstyled quick-links\">\r\n
        <li>\r\n
        <a href=\"/fr/page/qui-sommes-nous\">\r\n
        <i class=\"fa fa-angle-double-right\"></i>Qui sommes nous?</a>\r\n
        </li>\r\n
        <li>\r\n
        <a href=\"/fr/page/comment-ca-marche\">\r\n
        <i class=\"fa fa-angle-double-right\"></i>Comment ca marche?</a>\r\n
        </li>\r\n
        <li>\r\n
        <a href=\"/fr/page/mentions-legales\">\r\n
        <i class=\"fa fa-angle-double-right\"></i>Mentions légales</a>\r\n
        </li>\r\n
        </ul>\r\n
        </div>\r\n
        <div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n
        <h5 class=\"colorwy\">Aide & Contact</h5>\r\n
        <ul class=\"list-unstyled quick-links\">\r\n
        <li>\r\n
        <a href=\"contact/creer\">\r\n
        <i class=\"fa fa-angle-double-right\"></i>Nous contacter</a>\r\n
        </li>\r\n
        </ul>\r\n
        </div>\r\n
        <div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n
        <h5 class=\"colorwy\">Nous contacter</h5>\r\n
        <ul class=\"list-unstyled quick-links\">\r\n
        <li>\r\n
        <a href=\"mailto:&#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#119;&#101;&#100;&#100;&#105;&#110;&#103;&#121;&#111;&#117;&#114;&#115;&#101;&#108;&#102;&#046;&#102;&#114;\">\r\n
        <i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>\r\n
        &#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#119;&#101;&#100;&#100;&#105;&#110;&#103;&#121;&#111;&#117;&#114;&#115;&#101;&#108;&#102;&#046;&#102;&#114;</a>\r\n
        </li>\r\n
        <li>\r\n
        <a href=\"tel:330761414421\">\r\n
        <i class=\"fa fa-phone\" aria-hidden=\"true\"></i>\r\n
        330761414421</a>\r\n
        </li>\r\n
        </ul>\r\n
        </div>\r\n
        </div>\r\n
        <div class=\"row\">\r\n
        <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5\">\r\n
        <ul class=\"list-unstyled list-inline social text-center\">\r\n
        <li class=\"list-inline-item\">\r\n
        <a href=\"https://www.facebook.com/Weddingyourself/\">\r\n
        <i class=\"fa fa-facebook\"></i>\r\n
        </a>\r\n
        </li>\r\n
        <li class=\"list-inline-item\">\r\n
        <a href=\"https://www.instagram.com/weddingyourself.fr/\">\r\n
        <i class=\"fa fa-instagram\"></i>\r\n
        </a>\r\n
        </li>\r\n
        </ul>\r\n
        </div>\r\n
        <hr>\r\n
        </div>\r\n
        <div class=\"row\">\r\n
        <div class=\"col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white\">\r\n
        <p>\r\n
        <u>\r\n
        <a href=\"https://weddingyourself.fr/\">Wedding Yourself</a>\r\n
        </u>\r\n
        est une plateforme de mise en relation pour les clients désireux de réaliser eux-mêmes tous types d\'événements (Mariages, anniversaires, baptêmes...).</p>\r\n
        <p class=\"h6\">&copy; 2020 tous droits réservés\r\n
        <a class=\"text-green ml-2\" href=\"/fr/\">WeddingYourself</a>\r\n
        </p>\r\n
        </div>\r\n
        <hr>\r\n
        </div>\r\n
        </div>\r\n
        </footer>\r\n
        <!-- ./Footer -->');
        $this->manager->persist($theme);
    }

}
