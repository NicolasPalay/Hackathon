<?php

namespace App\Controller;

use App\Model\CarsManager;
use App\Model\ReservationManager;

class ReservationController extends AbstractController
{
    /**
     * Reservation
     */


    /**
     * Show informations for a specific item
     */
    public function show(): ?string
    { $start = $_POST['start'];
        $return = $_POST['return'];
        $data = [$start,$return];

            // clean $_POST data
            $reservation = array_map('trim', $_POST);

            // TODO validations (length, format...)

        $carsManager = new CarsManager();
        $cars = $carsManager->selectAll('title');

       /* $reservationManager = new ReservationManager();
        $reservation= $reservationManager->selectOneById($id);*/

        return $this->twig->render('Reservation/show.html.twig', ['reservation' => $reservation,
            ]);
    }

    public function add(): ?string
    {
        $start = $_POST['start'];
        $return = $_POST['return'];
        $data = [$start,$return];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($reservation)) {
            // clean $_POST data
            $reservation = array_map('trim', $_POST);

            // TODO validations (length, format...)

            $reservationManager = new ReservationManager();
            $id= $reservationManager->insert($reservation);

header('Location: /reservation/show?id=' . $id);
            return null;


            }



        return $this->twig->render('Reservation/add.html.twig',['data'=>$data]);
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
