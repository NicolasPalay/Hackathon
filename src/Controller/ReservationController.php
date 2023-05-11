<?php

namespace App\Controller;

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
    { $reservation = array_map('trim', $_POST);
       /* $reservationManager = new ReservationManager();
        $reservation= $reservationManager->selectOneById($id);*/

        return $this->twig->render('Reservation/show.html.twig', ['reservation=' => $reservation]);
    }

    public function add(): ?string
    {
        $start = $_POST['start'];
        $return = $_POST['return'];
        $data = [$start,$return];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $reservation = array_map('trim', $_POST);

            // TODO validations (length, format...)
            var_dump($reservation);

            // if validation is ok, insert and redirection
/*            $reservationManager = new ReservationManager();
            $id= $reservationManager->insert($reservation);
                // if validation is ok, insert and redirection




                return null;
            }*/
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
