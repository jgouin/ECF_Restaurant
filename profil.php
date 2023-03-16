
<?php
require_once ('templates/header.php');
require_once ('Entity/User.php');
require_once ('Controller/UserController.php');
require_once('Entity/Reservation.php');
require_once('Controller/ReservationController.php');

$ReservationController = new ReservationController();
$reservations = $ReservationController->getAllReservationByUserId($_SESSION['id']);

$userController = new UserController();
$user = $userController->get($_SESSION['id']);

if(($_SESSION['username'] !== 'admin') && ($_SESSION['email'] !== 'quai_Antique@Chambery.fr')){ ?>

  <p class="text-end m-3 px-4">
      <small><a class="text-decoration-none text-muted" href="index.php">Retour</a></small>
  </p>
    
  <div class="container">
    <div class="row">
      <div class="col-5 px-4 my-3">
        <h4 class="m-2">Votre Profil:</h4>
        <div class="col-lg-5 mx-auto p-3">
          <p class="lead m-2"><?= $_SESSION["username"] ?></p>
          <p class="lead m-2"><?= $user->getEmail() ?></p>
        </div>
      </div>

      <div class="col px-4 my-3">
        <h4 class="m-2">Vos Préférences:</h4>
        <div class="col-lg-7 mx-auto p-3">
          <p class="lead m-2">Nombre de couverts (par défaut): <?= $user->getNbCovers() ?></p>
          <p class="lead m-2">Vos allergies (par défaut): <?= $user->getAllergies() ?></p>
        </div>
      </div>

      <div class="row">
        <h4 class="m-2">Vos Réservations:</h4>
        <div class="col-lg-6 mx-auto p-3">
        <?php foreach($reservations as $reservation) { ?>
          <p class="lead m-2">Le <?= $reservation->getDay()?> à <?= $reservation->getHour()?> pour <?= $reservation->getNbCovers()?> personne(s)</p>
        <?php }; ?>
        </div>
      </div>
      
      <p class=" px-4 text-decoration-none text-muted" href="index.php">Pour toutes modifications de réservation, merci de nous contacter</p>

      <div class="px-4 my-5">
        <a class="btn btn-sm btn-outline-warning" href="updateUser.php">Modifier mon profil</a>
        <a class="btn btn-sm btn-outline-dark" href="deleteUser.php?">Supprimer mon profil</a>
      </div>

    </div>
    
  </div>
 

         
      

<?php }


require_once ('templates/footer.php');

?>