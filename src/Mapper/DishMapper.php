<?php

namespace ComposerTest\Mapper;

use ComposerTest\Model\Dish;
use PDO;

class DishMapper
{
    private PDO $db;

    public function __construct(string $host, string $tableName, string $userName, string $password)
    {
        $this->db = new PDO("mysql:host=$host;dbname=$tableName", $userName, $password);
    }

    public function Add(Dish $dish) : bool
    {
        $name = $dish->getName();
        $weight = $dish->getWeight();
        $price = $dish->getPrice();
        $photo = $dish->getPhoto();

        $query = $this->db->prepare("INSERT INTO dish(name, weight, price, photo) 
            VALUES (:name, :weight, :price, :photo)");
        return $query->execute(['name' => $name, 'weight' => $weight, 'price' => $price, 'photo' => $photo]);
    }

    public function Delete(int $id) : bool
    {
        $query = $this->db->prepare('DELETE FROM dish WHERE id = :id');
        return $query->execute();
    }

    public function GetAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM dish');
        $query->execute();
        $response = $query->fetchAll();

        $dishes = array();
        foreach ($response as $k => $v){
            $dish = new Dish($v['name'], $v['price'], $v['weight']);
            $dish->setPhoto($v['photo']);
            $dishes[] = $dish;

        }

        return $dishes;
    }

    public function GetById(int $id) : Dish
    {
        $query = $this->db->prepare('SELECT * FROM dish WHERE id = :id');
        $query->execute(['id' => $id]);
        $response = $query->fetch();

        return new Dish($response['name'], $response['price'], $response['weight']);
    }
}