<?php

namespace ComposerTest\DI;

class ServiceLocator
{
    private array $services = [];

    public function set(string $name, $service): void
    {
        $this->services[$name] = $service;
    }

    public function get(string $name)
    {
        if (isset($this->services[$name]) && is_callable($this->services[$name])) {
            $this->services[$name] = $this->services[$name]($this);
        }

        return $this->services[$name];
    }
}