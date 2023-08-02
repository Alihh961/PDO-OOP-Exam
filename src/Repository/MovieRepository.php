<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use DateTime;

class MovieRepository
{

    private PDOService $pdoService;
    //array de Movie si en objet

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

    public function findAll():array
    {
        $sql = "Select * From movie";
        $query = $this->pdoService->getPDO()->query($sql);
        $query->execute();

        //j'ai fait une fois en object et en fois en tableu Associative
        //$results = $query->fetchAll(\PDO::FETCH_CLASS , Movie::class);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $results;

    }

    //array de Movie si en objet
    public function findByTitle(string $title):array
    {
        $sql = "Select * From movie WHERE title = ? ";
        $query = $this->pdoService->getPDO()->prepare($sql);
        $query->execute([$title]);

        //j'ai fait une fois en object et en fois en tableu Associative
        //$results = $query->fetchAll(\PDO::FETCH_CLASS , Movie::class);

        $results = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $results;

    }

    //Movie si en objet
    public function insertMovie(Movie|array $movie): Movie|array
    {

        $title = $movie["title"];
        $releaseDate = $movie["releaseDate"];

        $sql = "INSERT into movie (title , release_date) values (? , ?)";
        $query = $this->pdoService->getPDO()->prepare($sql);
        $query->execute([$title , $releaseDate]);

        return $movie;

    }
}