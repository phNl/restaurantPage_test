<?php

namespace ComposerTest\Controller;

use ComposerTest\Model\Dish;
use ComposerTest\Repository\DishRepository;
use ComposerTest\View\MenuPage;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MenuController
{
    private MenuPage $page;
    private DishRepository $dishRepository;
    private Logger $logger;

    public function __construct(MenuPage $menuPage, DishRepository $dishRepository)
    {
        $this->page = $menuPage;
        $this->dishRepository = $dishRepository;

        $this->logger = new Logger('new_dishes');
        $this->logger->pushHandler(new StreamHandler(dirname(__DIR__) . '/new_dishes.log', Logger::INFO));
    }

    public function addDishAction($name, $price, $weight): string
    {
        $this->dishRepository->Add(new Dish($name, $price, $weight));
        $this->logger->info('dish', ['name' => $name, 'price' => $price, 'weight' => $weight]);

        return $this->page->renderHtml();
    }

    public function showAction(): string
    {
        return $this->page->renderHtml();
    }
}