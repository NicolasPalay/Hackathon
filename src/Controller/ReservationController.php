<?php

namespace App\Controller;

use App\Model\ReservationManager;

class ReservationController extends AbstractController
{
    /**
     * Reservation
     */
    public function index(): string
    {


        $start = $_POST['start'];
        $return = $_POST['return'];
        $data=[$start,$return];
        var_dump($data);
        return $this->twig->render('Reservation/add.html.twig',['data' => $data]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $itemManager->update($item);

            header('Location: /items/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Item/edit.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $itemManager = new ItemManager();
            $id = $itemManager->insert($item);

            header('Location:/items/show?id=' . $id);
            return null;
        }

        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $itemManager = new ItemManager();
            $itemManager->delete((int)$id);

            header('Location:/items');
        }
    }
}
