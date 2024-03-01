<?php
require_once("templates/header.php");
require_once("dao/MovieDAO.php");

// dao films..


$movieDao = new MovieDAO($conn, $BASE_URL);

$latestMovies = $movieDao->getLatestMovies();

$actionMovies = $movieDao->getMoviesByCategory("Acao");

$terrorMovies = $movieDao->getMoviesByCategory("Terror");

?>

<div id="main-container" class="container-fluid">
  <h2 class="section-title">Filmes e seriados novos</h2>
  <p class="section-description">Veja as críticas dos últimos filmes e seriados adicionados no MovieStar</p>
  <div class="movies-container">
    <?php foreach ($latestMovies as $movie) : ?>
      <?php require("templates/movie_card.php"); ?>
    <?php endforeach; ?>
    <?php if (count($latestMovies) === 0) : ?>
      <p class="empty-list">Ainda não há filmes cadastrados!</p>
    <?php endif; ?>
  </div>
  <h2 class="section-title">Ação</h2>
  <p class="section-description">Veja os melhores filme e seriados de ação</p>
  <div class="movies-container">
    <?php foreach ($actionMovies as $movie) : ?>
      <?php require("templates/movie_card.php"); ?>
    <?php endforeach; ?>
    <?php if (count($actionMovies) === 0) : ?>
      <p class="empty-list">Ainda não há filmes de ação cadastrados!</p>
    <?php endif; ?>
  </div>
  <h2 class="section-title">Terror</h2>
  <p class="section-description">Veja os melhores filme e seriados de terror</p>
  <div class="movies-container">
    <?php foreach ($terrorMovies as $movie) : ?>
      <?php require("templates/movie_card.php"); ?>
    <?php endforeach; ?>
    <?php if (count($terrorMovies) === 0) : ?>
      <p class="empty-list">Ainda não há filmes e seriados de terror cadastrados!</p>
    <?php endif; ?>
  </div>
</div>
<?php
require_once("templates/footer.php");
?>
