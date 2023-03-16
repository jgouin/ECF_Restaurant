
<?php
require_once ('templates/header.php');
require_once('Entity/Reservation.php');
require_once('Controller/ReservationController.php');

    
if ($_POST) {

    $ReservationController = new ReservationController();
    $slots = $ReservationController->getAllSlots();
   
    $PostSlot = $_POST['day'].'_'.$_POST['hour'];

    if (array_search($PostSlot, $slots)){
        echo ('<div class="alert alert-danger"><p>Ce créneau est déja pris.</p></div>');
        echo "<script>
            setTimeout(() => {
              window.location='bookTable.php';
            }, '1500')
          </script>";
        
    } else {
        $reservation = new Reservation($_POST);
        $ReservationController->create($reservation);
        echo ('<div class="alert alert-success"><p>Votre réservation est confirmée.</p></div>');
        echo "<script>
            setTimeout(() => {
              window.location='index.php';
            }, '1500')
          </script>";
    }        
}

if (!isset($_SESSION['user'])){ 
        
    echo "<script>window.location='newUser.php';</script>";

} else { ?>



<p class="text-end m-3 px-4">
    <small><a class="text-decoration-none text-muted" href="index.php">Retour</a></small>
</p>

<form class="text-center" action="" method="POST">
    <h2 class="mb-3">Réservez votre table !</h2>

    <div class="d-none">
        <input class="form-control" name="user_id" id="user_id" value="<?= $_SESSION['id'] ?>">
    </div>

    <div class="form-floating m-1 mx-5">
    <select name="nbCovers" id="nbCovers" class="form-select" required>
        <?php for ($i = 1; $i <= 12; $i++): ?>
        <option <?= $i === $_SESSION["nbCovers"] ? "selected" : "" ?> value="<?= $_SESSION["nbCovers"] ?>"><?= $i ?></option>
        <?php endfor ?>
      </select>
      <label for="nbCovers">Nombre de convives</label>
    </div>


    <div class="form-floating m-1 mx-5">
        <?php
            $start_date = date_create("now");
            $end_date   = date_create("2 week");

            $interval = DateInterval::createFromDateString('1 day');
            $daterange = new DatePeriod($start_date, $interval ,$end_date);
        ?>
        <select name="day" class="form-select" id="day" onchange="loadAvailableSlotsDay()" required>
            <option disabled selected="selected">Choissiez un jour</option>
            <?php foreach($daterange as $date){ ?>
            <option id="selectedDay" value="<?= $date->format('d/m/y') ?>"><?= $date->format('d/m/y') ?></option>
            <?php } ?> 
        </select>
        <label for="day">Jour</label>
    </div>
    

    <div id="slotHour" class="d-none form-floating m-1 mx-5">
        <?php
        $start_hour = "12:00";			 
        $end_hour = "14:00";
        $frequency = 15;
        for($i = strtotime($start_hour); $i<= strtotime($end_hour); $i = $i + $frequency * 60) {
            $hours[] = date("H\hi", $i);  
        }
        ?>
        <select name="hour" class="form-select" id="hour" required>
        <?php foreach($hours as $hour){ ?>
                    <option value="<?= $hour ?>"><?= $hour ?></option>
        <?php } ?> 
        </select>
        <label for="hour">Jour</label>
    </div>
    

    <div class="form-floating m-1 mx-5">
        <textarea class="form-control" name="allergies" id="allergies"><?= $_SESSION['allergies'] ?></textarea>
        <label for="allergies">Allergie(s)</label>
    </div>

    <p class="text-muted p-3">Si vous souhaitez réserver pour plus de 12 personnes, merci de nous contacter directement.</p>
    <button class="btn btn-lg btn-warning" type="submit">Envoyer</button>
</form>


<?php }

require_once ('templates/footer.php');

?>