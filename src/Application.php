<?php

namespace ComposerTest;

use ComposerTest\Controller\HomeController;
use ComposerTest\Controller\MenuController;
use ComposerTest\DI\ServiceLocator;
use ComposerTest\Mapper\DishMapper;
use ComposerTest\Repository\DishRepository;
use ComposerTest\View\HomePage;
use ComposerTest\View\MenuPage;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application
{
    private ServiceLocator $serviceLocator;

    public function __construct()
    {
        $this->serviceLocator = $this->initServices();
    }

    public function run(): string
    {
        if (!empty($_POST) && $_GET['action'] === 'add_to_menu') {
            return $this->serviceLocator->get(MenuController::class)->addDishAction($_POST['dish_name'], (int)$_POST['price'], (int)$_POST['weight']);
        }
        if (($_GET['action'] ?? '') === 'edit_menu') {
            return $this->serviceLocator->get(MenuController::class)->showAction();
        }

        return $this->serviceLocator->get(HomeController::class)->showAction();
    }

    private function initServices(): ServiceLocator
    {

        $serviceLocator = new ServiceLocator();

        $serviceLocator->set('twig', new Environment(
            new FilesystemLoader(dirname(__DIR__) . '/templates')
        ));

        $serviceLocator->set(HomeController::class, function(ServiceLocator $serviceLocator) {
            return new HomeController(
                new HomePage($serviceLocator->get('twig')),
                new DishRepository(new DishMapper('198.211.107.171', 'restaurant', 'phnl', '52345234'))
            );
        });

        $serviceLocator->set(MenuController::class, function(ServiceLocator $serviceLocator) {
            return new MenuController(
                new MenuPage($serviceLocator->get('twig')),
                new DishRepository(new DishMapper('198.211.107.171', 'restaurant', 'phnl', '52345234'))
            );
        });

        return $serviceLocator;
    }
}