<?php

namespace App\Controller;

class LegalController extends AbstractController
{
    public function rentalTerms(): string
    {

        return $this->twig->render('Legal/rental-terms.html.twig');
    }

    public function insurance(): string
    {

        return $this->twig->render('Legal/insurance.html.twig');
    }

    public function termConditions(): string
    {
        return $this->twig->render('Legal/terms & conditions.html.twig');
    }

    public function privacyPolice(): string
    {
        return $this->twig->render('Legal/privacy police.html.twig');
    }
}
