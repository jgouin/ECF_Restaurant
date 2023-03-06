<?php


class Category {
    private $id;
    private $name;

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

    
    public function getName(): string
    {
        return $this->name;
    }

    
    public function setName(string $name): self
    {
        if (strlen($name) >= 3 && strlen($name) <= 50){
            $this->name = $name;
        }
        return $this;
    }
}