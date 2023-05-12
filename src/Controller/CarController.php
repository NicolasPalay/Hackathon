<?php

namespace App\Controller;

class CarController extends AbstractController
{
    public function beach(): string
    {
        return $this->twig->render('/car/beach.html.twig');
    }

    public function coast(): string
    {
        return $this->twig->render('/car/coast.html.twig');
    }

    public function edition(): string
    {
        return $this->twig->render('/car/edition.html.twig');
    }
}
