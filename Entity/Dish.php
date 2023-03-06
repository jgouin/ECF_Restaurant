<?php


class Dish {
    private $id;
    private $category_id;
    private $title;
    private $description;
    private $price;
    private $image;
    private $menu;

    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key =>$value){
            $method ="set".ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $newId): self
    {
        if ($newId > 0) {
            $this->id = $newId; 
        }
        return $this;
    }


    public function getCategory_id(): int
    {
        return $this->category_id;
    }

    
    public function setCategory_id(int $category_id): self
    {
        if ($category_id > 0) {
        $this->category_id = $category_id;            
        }
        return $this;
    }

    
    public function getTitle(): string
    {
        return $this->title;
    }

    
    public function setTitle(string $title): self
    {
        if (strlen($title) >= 3 && strlen($title) <= 50){
            $this->title = $title;
        }
        return $this;
    }

    
    public function getDescription(): string
    {
        return $this->description;
    }

   
    public function setDescription(string $description): self
    {
        if (strlen($description) >= 50 && strlen($description) <= 500){
            $this->description = $description;
        }
        return $this;
    }

  
    public function getPrice(): int
    {
        return $this->price;
    }

  
    public function setPrice(int $price): self
    {
        if ($price > 0) {
            $this->price = $price;
        }
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

   
    public function setImage(string $image): self
    {
        $this->image = $image; 
        return $this;
    }

    public function getMenu(): string
    {
        return $this->menu;
    }

   
    public function setMenu(string $menu): self
    {
        $this->menu = $menu; 
        return $this;
    }
}