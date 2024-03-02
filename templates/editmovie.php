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
  <div class="col-md-8 offset-md-2">
    <div class="row profile-container">
      <div class="col-md-12">
        <h1 class="page-title"><?php $fullname ?></h1>
        <div id="profile-image-container" style="background-image: 
          url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>')">
          </div>
          <h3 class="about-title">Sobre:</h3>
            <?php if(!empty($userData->bio)): ?>
                <p class="profile-description"><?= $userData->bio ?></p>
            <?php else: ?>
              <p class="profile-description">O usuário nao possui biografia.</p>
            <?php endif; ?>
          


      </div>
      <div class="col-md-12 added-movies-container">
            <h3>Filmes que enviou</h3>
            <?php foreach($userMovies as $movie): ?>
              <?php require("templates/movie_card.php"); ?>
              <?php endforeach; ?>
              <?php if(count($userMovies) == 0): ?>
                <p class="empty-list">O usuário ainda nao enviou filmes.</p>
                <?php endif; ?>
      </div>
    </div>
  </div>
  
  
  
  
  
  


  

  

</div>


<?php
require_once("templates/footer.php");
?>