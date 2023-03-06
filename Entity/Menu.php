<?php

class Menu {
    protected $id;
    protected $title;
    protected $formule;
    protected $price;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data) 
    {
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

    
    public function getFormule(): string
    {
        return $this->formule;
    }

   
    public function setFormule(string $formule): self
    {
        if (strlen($formule) >= 3 && strlen($formule) <= 500){
            $this->formule = $formule;
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

}