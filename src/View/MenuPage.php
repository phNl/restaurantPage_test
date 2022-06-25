<?php

namespace ComposerTest\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MenuPage
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $loader = new FilesystemLoader(__DIR__);
        $this->twig = $twig;
    }

    /**
     * @return string
     */
    public function renderHtml(): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->twig->render('menu.twig');
    }
}