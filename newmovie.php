<?php
require_once("templates/header.php");

// verify user authentic
require_once("dao/UserDAO.php");
require_once("models/User.php");

$user = new User();
$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken(true);

?>

<div id="main-container" class="container-fluid">
  <div class="off-set-md-4 col-md-4 new-movie-container" id="moviess">
    <h1 class="pag-title">Adicionar filme</h1>
    <p class="page-description">Adicione sua critíca e compartilhe com o mundo.</p>
    <form action="<?= $BASE_URL ?>movie_process.php" id="add-movie-form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do seu filme.">
      </div>
      <div class="form-group">
        <label for="title">Imagem:</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="form-group">
        <label for="title">Duracao:</label>
        <input type="text" class="form-control" id="lenght" name="lenght" placeholder="Digite a duracao do filme.">
      </div>
      <div class="form-group">
        <label for="category">Categoria: </label>
        <select name="category" id="category" class="form-control">
          <option value="">Selecione</option>
          <option value="Acao">Acao</option>
          <option value="Terror">Terror</option>
          <option value="Comédia">Comédia</option>
          <option value="Fantasia / Ficcao">Fantasia / Ficcao</option>
          <option value="Romance">Romance</option>
        </select>
      </div>
      <div class="form-group">
        <label for="trailer">Trailer:</label>
        <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Insira o link do trailer.">
      </div>
      <div class="form-group">
        <label for="descripton">Descricao:</label>
        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Descreva o filme..."></textarea>
      </div>
      <input type="submit" class="btn card-btn" value="Adicionar filme">
    </form>

  </div>
</div>

<?php
require_once("templates/footer.php");
?>