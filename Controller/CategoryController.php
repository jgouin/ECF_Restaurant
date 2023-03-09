<?php

require_once ('./Config/DotEnv.php');


class CategoryController {
    
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
        $categories= [];
        $req = $this->pdo->query("SELECT * FROM `categories`");
        $data = $req->fetchAll();
        foreach($data as $category){
            $categories[] = new Category($category);
        }
        return $categories;
    
    }

    public function getCategoryName()
    {
        $categories= [];
        $req = $this->pdo->query("SELECT name FROM `categories`");
        $data = $req->fetchAll();
        foreach($data as $categoryName){
            $categories[] = new Category($categoryName);
        }
        return $categories;
    
    }
    public function get(int $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM `categories` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $category = new Category($data);
        return $category;
    }
    
}
