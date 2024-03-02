<?php
require_once("templates/header.php");

// verify user authentic
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");
require_once("models/User.php");

$user = new User();
$userDao = new UserDAO($conn, $BASE_URL);
$movieDao = new MovieDAO($conn, $BASE_URL);

// receber id 
$id = filter_input(INPUT_GET, "id")

if(empty($id)){
  if(!empty($userData)){
  $id = $userData->id;
  }else{
    $message->setMessage("O usuário nao foi encontrado!", "error", "index.php");

  }
}else{

  $userData = $userDao->findById($id);

  if(!$userData){
  $message->setMessage("O usuário nao foi encontrado!", "error", "index.php");
}
}


?>

<div id="main-container" class="container-fluid">

</div>


<?php
require_once("templates/footer.php");
?>