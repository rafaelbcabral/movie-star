<?php
require_once("templates/header.php");

// verify user authentic
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");
require_once("models/User.php");

$user = new User();
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);

$id = filter_input(INPUT_GET, "id");

if (empty($id)) {
  $message->setMessage("O filme nao foi encontrado!", "error", "index.php");
} else {

  $movie = $movieDao->findById($id);

  // verifica se filme > 0
  if (!$movie) {
    $message->setMessage("O filme nao foi encontrado!", "error", "index.php");
  }
}

$fullname = $user->getFullName($userData);

if ($userData->image == "") {
  $userData->image = "user.png";
}

// check film have a img
if ($movie->image == "") {
  $movie->image = "movie_cover.jpg";
}

$userMovies = $movieDao->getMoviesByUserId($id);

?>
<div id="main-container" class="container-fluid">
  .col-md-8.offset-md-2
  
  
  
  
  


  

  

</div>


<?php
require_once("templates/footer.php");
?>