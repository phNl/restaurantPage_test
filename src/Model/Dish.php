<?php

namespace ComposerTest\Model;

use PDO;

class Dish
{
    private string $name;
    private int $price;
    private int $weight;
    private string $photo;
    
    private PDO $db;

    public function __construct(string $name, int $price, int $weight) {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->photo = '';
        
        $this->db = new PDO("mysql:host=198.211.107.171;dbname=restaurant", phnl, 52345234);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    // Active-Record
    public function Save() : bool
    {
        $query = $this->db->prepare("INSERT INTO dish(name, weight, price, photo) 
            VALUES (:name, :weight, :price, :photo)");
        return $query->execute(['name' => $this->name, 'weight' => $this->weight, 'price' => $this->price, 'photo' => $this->photo]);
    }

}
