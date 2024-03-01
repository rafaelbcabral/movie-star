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

?>

<div id="main-container" class="container-fluid">
  <div class="col-md-12"></div>
  <div class="row">
    <div class="col-md-6 offset-md-1">
      <h1><?= $movie->title ?></h1>
      <p class="page-description"> Altere os dados do filme no formulário abaixo:</p>
      <form id="edit-movie-form" action="<?= $BASE_URL ?>movie_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">
        <input type="hidden" name="id" value="<?= $movie->id ?>">
        <div class="form-group">
          <label for="title">Título:</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do seu filme." value="<?php $movie->title ?>">
        </div>
        <div class="form-group">
          <label for="title">Imagem:</label>
          <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
          <label for="title">Duracao:</label>
          <input type="text" class="form-control" id="lenght" name="lenght" placeholder="Digite a duracao do filme." value="<?php $movie->lenght ?>">
        </div>
        <div class="form-group">
          <label for="category">Categoria: </label>
          <select name="category" id="category" class="form-control">
            <option value="">Selecione</option>
            <option value="Acao" <?php $movie->category === "Acao" ? "selected" : "" ?>>Acao</option>
            <option value="Terror" <?php $movie->category === "Terror" ? "selected" : "" ?>>Terror</option>
            <option value="Comédia" <?php $movie->category === "Comédia" ? "selected" : "" ?>>Comédia</option>
            <option value="Fantasia / Ficcao" <?php $movie->category === "Fantasia / Ficcao" ? "selected" : "" ?>>Fantasia / Ficcao</option>
            <option value="Romance"><?php $movie->category === "Romance" ? "selected" : "" ?>Romance</option>
          </select>
        </div>
        <div class="form-group">
          <label for="trailer">Trailer:</label>
          <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Insira o link do trailer." value="<?= $movie->trailer ?>">
        </div>
        <div class="form-group">
          <label for="descripton">Descricao:</label>
          <textarea class="form-control" name="description" id="description" rows="5" placeholder="Descreva o filme..."><?= $movie->description ?></textarea>
        </div>
        <input type="submit" class="btn card-btn" value="Adicionar filme">

      </form>
    </div>
  </div>
</div>


<?php
require_once("templates/footer.php");
?>