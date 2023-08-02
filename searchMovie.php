<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

if (isset($_POST["title-search"])) {

    $title = $_POST["title-search"];
    $movieRepository = new MovieRepository();
    $movies = $movieRepository->findByTitle($title);

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Movies</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<table style="width:100%">
    <tr>
        <th>Title</th>
        <th>Release Date</th>
    </tr>
    <?php foreach ($movies as $movie): ?>
        <tr>
            <td><?= $movie["title"] ?></td>
            <td><?= $movie["release_date"] ?></td>
        </tr>
    <?php endforeach ?>

</table>

<a href="index.php">Index</a>
</body>
</html>
