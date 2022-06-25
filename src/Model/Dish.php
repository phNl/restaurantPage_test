<?php

namespace ComposerTest\Model;

class Dish
{
    private string $name;
    private int $price;
    private int $weight;
    private string $photo;

    public function __construct(string $name, int $price, int $weight) {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->photo = '';
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


}