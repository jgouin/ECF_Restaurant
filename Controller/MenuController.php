
<?php

require_once ('./Config/DotEnv.php');


class MenuController {
    
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

    public function getAll(): array
    {
        $menus = [];
        $req = $this->pdo->query("SELECT * FROM `menus`");
        $data = $req->fetchAll();
        foreach ($data as $menu) {
            $menus[] = new Menu($menu);
        }
        return $menus;
    }

    public function get(int $id): Menu
    {
        $req = $this->pdo->prepare("SELECT * FROM `menu` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $menu = new Menu($data);
        return $menu;
    }

    public function create(Menu $newMenu): void
    {
        $req = $this->pdo->prepare("INSERT INTO `menu` (title, formule, price)
                                    VALUES (:title, :formule, :price)");

        $req->bindValue(":title", $newMenu->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":formule", $newMenu->getformule(), PDO::PARAM_STR);
        $req->bindValue(":price", $newMenu->getPrice(), PDO::PARAM_INT);
        
        $req->execute();
    }

    public function update(Menu $menu): void
    {
        $req = $this->pdo->prepare("UPDATE `menu`
                                    SET title = :title,
                                        formule = :formule,
                                        price = :price
                                    WHERE id = :id");

        $req->bindValue(":title", $menu->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":formule", $menu->getformule(), PDO::PARAM_STR);
        $req->bindValue(":price", $menu->getPrice(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM `menu` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}