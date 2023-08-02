<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;

class ActorRepository
{
    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

    //array d'Actor si en objet
    public function findAll():array
    {
        $sql = "Select * From actor";
        $query = $this->pdoService->getPDO()->query($sql);
        $query->execute();

//        une fois en tableu et en une fois en objet
//        $resultsArray = $query->fetchAll(\PDO::FETCH_ASSOC);

        $resultsArray = $query->fetchAll(\PDO::FETCH_CLASS , Actor::class);

        return $resultsArray;

    }

    //Actor si en objet
    public function insertActor(Actor|array $actor): Actor|array
    {

        $firstName = $actor["first-name"];
        $lastName = $actor["last-name"];

        $sql = "INSERT into actor (first_name , last_name) values (? , ?)";
        $query = $this->pdoService->getPDO()->prepare($sql);
        $query->execute([$firstName , $lastName]);

        return $actor;

    }
}