<?php

namespace App\Controller;

use App\Model\ContactManager;

class ContactController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        return $this->twig->render('User/contact.html.twig');
    }
}
