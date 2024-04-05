<?php
session_start();
require_once __DIR__ . '/functions/db.php';
require_once __DIR__ . '/functions/redirect.php';

//On tente de se connecter à la base de données
try{
$pdo = getConnection();
}catch(PDOException $e) {
    redirect('info_event.php');
}


//On vérifie si on a bien des données
if (!isset($_POST)) {
    redirect('info_event.php');
}

//On récupère toutes les infos du formulaire dans un tableau $_POST
$img = $_POST['img'];
$matchNumber = $_POST['matchNumber'];
$homeTeam = $_POST['homeTeam'];
$homeTeamScore = $_POST['homeTeamScore'];
$awayTeam = $_POST['awayTeam'];
$awayTeamScore = $_POST['awayTeamScore'];
$date = $_POST['date'];
$time = $_POST['time'];
$matchLocation = $_POST['matchLocation'];

$query = "INSERT INTO games (game_img, game_number, game_homeTeam, game_homeTeam_score, game_awayTeam, game_awayTeam_score, game_date, game_time, game_location) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);

$stmt->execute([$img, $matchNumber, $homeTeam, $homeTeamScore, $awayTeam, $awayTeamScore, $date, $time, $matchLocation]);

redirect("index.php");