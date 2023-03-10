
<?php

require_once ('./Config/DotEnv.php');


class UserController {
    
    private $pdo;

    public function __construct()
    {
        try {
            (new DotEnv('.env'))->load();
            $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
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
        $users= [];
        $req = $this->pdo->query("SELECT * FROM `users`");
        $data = $req->fetchAll();
        foreach($data as $user){
            $users[] = new User($user);
        }
        return $users;
    
    }

    public function get(int $id): User
    {
        $req = $this->pdo->prepare("SELECT * FROM `users` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $user = new User($data);
        return $user;
    }

    public function getUserByEmail(string $email): User
    {
        $req = $this->pdo->prepare("SELECT * FROM `users` WHERE email = :email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();
        $user = new User($data);
        return $user;
    }

    public function create(User $newUser): void
    {
        $req = $this->pdo->prepare("INSERT INTO `users` (username, email, password, nbCovers, allergies) 
                                    VALUES (:username, :email, :password, :nbCovers, :allergies)");

        $req->bindValue(":username", $newUser->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":email", $newUser->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $newUser->getPassword(), PDO::PARAM_STR);
        $req->bindValue(":nbCovers", $newUser->getNbCovers(), PDO::PARAM_INT);
        $req->bindValue(":allergies", $newUser->getAllergies(), PDO::PARAM_STR);
       
        $req->execute();
        
    }

    public function update(User $user): void
    {
        $req = $this->pdo->prepare("UPDATE `users` 
                                    SET username = :username,
                                        email = :email,
                                        password = :password,
                                        nbCovers = :nbCovers,
                                        allergies = :allergies 
                                    WHERE id = :id");

print_r($user);
        $req->bindValue(":id", $user->getId(), PDO::PARAM_INT);
        $req->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(":nbCovers", $user->getNbCovers(), PDO::PARAM_INT);
        $req->bindValue(":allergies", $user->getAllergies(), PDO::PARAM_STR);


        $req->execute();
    }

    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM `users` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        
        $req->execute();
    }
}