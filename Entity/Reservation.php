<?php

class Reservation {
    private $id;
    private $user_id;
    private $day;
    private $hour;
    private $nbCovers;
    private $allergies;


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

    
    public function getUser_id(): int
    {
        return $this->user_id;
    }

    
    public function setUser_id($user_id): self
    {
        if ($user_id > 0) {
            $this->user_id = $user_id;            
        }

        return $this;
    }

   
    public function getDay()
    {
        return $this->day;
    }


    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

   
    public function getHour()
    {
        return $this->hour;
    }

    
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

   
    public function getNbCovers(): int
    {
        return $this->nbCovers;
    }

  
    public function setNbCovers(int $nbCovers): self
    {
        if ($nbCovers > 0) {
            $this->nbCovers = $nbCovers;
        }
        return $this;
    }

    public function getAllergies(): string
    {
        return $this->allergies;
    }

   
    public function setAllergies(string $allergies): self
    {
        $this->allergies = $allergies; 
        return $this;
    }
}