<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
	}

	public function findAllUsers() : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		$sqlSearch = "SELECT id, email, username, roles, person_type FROM user";
		
        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

	public function findAllPrestataires() : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		$sqlSearch = "SELECT id, email, username, roles, person_type FROM user WHERE person_type=2";
		
        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}


	public function findInscriptionLastMonth() : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		$sqlSearch = "SELECT Count(id) FROM user WHERE createdat >= DATE_ADD(NOW(),INTERVAL -30 DAY)";
		

        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

	public function findInscriptionLastWeek() : array
	{
		$conn = $this->getEntityManager()->getConnection();
		
		$sqlSearch = "SELECT Count(id) FROM user WHERE createdat >= DATE_ADD(NOW(),INTERVAL -7 DAY)";
		

        $stmt = $conn->prepare($sqlSearch);
		$stmt->execute();

        return $stmt->fetchAll();
	}

}