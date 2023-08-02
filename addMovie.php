<?php
include_once __DIR__ . '/vendor/autoload.php';
use App\Repository\MovieRepository;

if(isset($_POST['title']) && isset($_POST['releaseDate'])){

    $title = $_POST['title'];
    $releaseDate = $_POST['releaseDate'];

    $movieRepository = new MovieRepository();

    $movieRepository->insertMovie([
        "title" => $title,
        "releaseDate" => $releaseDate
    ]);

    header("location:index.php");


}
