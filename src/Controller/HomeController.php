<?php

namespace ComposerTest\Controller;

use ComposerTest\Mapper\DishMapper;
use ComposerTest\Model\Dish;
use ComposerTest\Repository\DishRepository;
use ComposerTest\View\HomePage;

class HomeController
{
    private HomePage $page;
    private DishRepository $dishRepository;

    public function __construct(HomePage $homePage, DishRepository $dishRepository)
    {
        $this->page = $homePage;
        $this->dishRepository = $dishRepository;
    }

    public function showAction(): string
    {
        $dishes = $this->dishRepository->GetAll();
        return $this->page->renderHtml($dishes);
    }
}