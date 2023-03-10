<?php


class User {
    private $id;
    private $username;
    private $email;
    private $password;
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


    public function getUsername(): string
    {
        return $this->username;
    }

    
    public function setUsername(string $username): self
    {
        if (strlen($username) >= 3 && strlen($username) <= 50){
        $this->username = $username;            
        }
        return $this;
    }

    
    public function getEmail(): string
    {
        return $this->email;
    }

    
    public function setEmail(string $email): self
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
        return $this;
    }

    
    public function getPassword(): string
    {
        return $this->password;
    }

   
    public function setPassword(string $password): self
    {
     
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        
        if ($uppercase && $lowercase && $number && strlen($password) >= 8) {
        $this->password = $password;
        }
        
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