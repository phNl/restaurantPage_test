<?php

namespace ComposerTest\Repository;

use ComposerTest\Mapper\DishMapper;
use ComposerTest\Model\Dish;

class DishRepository
{
    private DishMapper $mapper;

    public function __construct(DishMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function Add(Dish $dish)
    {
        $this->mapper->Add($dish);
    }

    public function Delete(int $id)
    {
        $this->mapper->Delete($id);
    }

    public function GetAll() : array
    {
        return $this->mapper->GetAll();
    }

    public function GetById(int $id) : Dish
    {
        return $this->mapper->GetById($id);
    }
}