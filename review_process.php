<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Movie.php");
require_once("models/Review.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");
require_once("dao/ReviewDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);


$type = filter_input("INPUT_POST", "type");

$userData = $userDao->verifyToken();
if($type === "create"){

  $rating = filter_input(INPUT_POST, "rating");
  $review = filter_input(INPUT_POST, "review");
  $movies_id = filter_input(INPUT_POST, "movies_id");

  $reviewObject = new Review();

  $movieData = $movieDao->findById($id);
  
}else{
  $message->setMessage("Informacoes inválidas!", "error", "index.php");

}