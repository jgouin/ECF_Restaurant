
<?php

require_once ('./Config/DotEnv.php');
require_once ('Entity/Reservation.php');

class ReservationController {
    
    private $pdo;

    public function __construct()
    {
        try {
            (new DotEnv('.env'))->load();
            $this->setPdo(new PDO(getenv('DATABASE_DNS'),
                                  getenv('DATABASE_USER'),
                                  getenv('DATABASE_PASSWORD')));
        } catch (PDOException $error) {
            var_dump($error);
            echo "<p style='color: red'>$error</p>";
        }
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function getAll()
    {
        $reservations= [];
        $req = $this->pdo->query("SELECT * FROM `reservation`");
        $data = $req->fetchAll();
        foreach($data as $reservation){
            $reservations[] = new Reservation($reservation);
        }
        return $reservations;
    
    }


    function getAllSlots() : array

    {
        $slots = [];
        $ReservationController = new ReservationController();
        $reservations = $ReservationController->getAll();
        foreach ($reservations as $reservation){
            $slots [] = $reservation->getDay().'_'.$reservation->getHour();
        }
        return $slots;
    }

    public function getAllReservationByUserId(int $user_id) : array
    {
        $reservations= [];
        $req = $this->pdo->prepare("SELECT * FROM `reservation` WHERE user_id = :user_id");
        $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetchAll();
        foreach($data as $reservation){
            $reservations[] = new Reservation($reservation);
        }
        return $reservations;
    
    }

    public function get(int $id): Reservation
    {
        $req = $this->pdo->prepare("SELECT * FROM `reservation` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $reservation = new Reservation($data);
        return $reservation;
    }

  

    public function create(Reservation $newReservation): void
    {
        $req = $this->pdo->prepare("INSERT INTO `reservation` (user_id, day, hour, nbCovers, allergies) VALUES (:user_id, :day, :hour, :nbCovers, :allergies)");

        $req->bindValue(":user_id", $newReservation->getUser_id(), PDO::PARAM_INT);
        $req->bindValue(":day", $newReservation->getDay(), PDO::PARAM_STR);
        $req->bindValue(":hour", $newReservation->getHour(), PDO::PARAM_STR);
        $req->bindValue(":nbCovers", $newReservation->getNbCovers(), PDO::PARAM_INT);
        $req->bindValue(":allergies", $newReservation->getAllergies(), PDO::PARAM_STR);
      

        $req->execute();

    }

}