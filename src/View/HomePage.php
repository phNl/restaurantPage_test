<?php

namespace ComposerTest\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomePage
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $loader = new FilesystemLoader(__DIR__);
        $this->twig = $twig;
    }

    /**
     * @param array $dishes
     * @return string
     */
    public function renderHtml(array $dishes): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->twig->render('home.twig', ['dishes' => $dishes]);
    }
}