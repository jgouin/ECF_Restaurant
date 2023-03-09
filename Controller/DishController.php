
<?php

require_once ('./Config/DotEnv.php');
require_once ('Entity/Dish.php');

class DishController {
    
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
        $dishes= [];
        $req = $this->pdo->query("SELECT * FROM `dishes`");
        $data = $req->fetchAll();
        foreach($data as $dish){
            $dishes[] = new Dish($dish);
        }
        return $dishes;
    
    }
    public function get(int $id): Dish
    {
        $req = $this->pdo->prepare("SELECT * FROM `dishes` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $dish = new Dish($data);
        return $dish;
    }

    public function manageDish(string $cmd, Dish $dish): void
    {
        $req = $this->pdo->prepare($cmd);

        $req->bindValue(":category_id", $dish->getCategory_id(), PDO::PARAM_INT);
        $req->bindValue(":title", $dish->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":description", $dish->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":price", $dish->getPrice(), PDO::PARAM_INT);
        $req->bindValue(":image", $dish->getImage(), PDO::PARAM_STR);
        $req->bindValue(":menu", $dish->getMenu(), PDO::PARAM_STR);

        $req->execute();
    }

    public function create(Dish $dish): void
    {
        $cmd = "INSERT INTO `dishes` (category_id, title, description, price, image, menu) 
                VALUES (:category_id, :title, :description, :price, :image, :menu)";

        $this->manageDish($cmd, $dish);
    }

    public function update(Dish $dish): void
    {
        $cmd = "UPDATE `dishes`
                SET category_id = :category_id,
                    title = :title,
                    description = :description,
                    price = :price,
                    image = :image,
                    menu = :menu
                WHERE id = :id";
        $this->manageDish($cmd, $dish);
    }

    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM `dishes` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);

        $req->execute();
    }
}