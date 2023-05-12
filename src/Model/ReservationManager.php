<?php

namespace App\Model;

use PDO;

class ReservationManager extends AbstractManager
{
    public const TABLE = 'reservation';

    /**
     * Insert new item in database
     */
    public function insert(array $reservation): int
    {
        $statement = $this->pdo->prepare("INSERT INTO reservation (starting_date, end_date,
       id_van_id) VALUES (:starting_date, :end_date, :id_van_id)");
        $statement->bindValue(':starting_date', $reservation['start'], PDO::PARAM_STR);
        $statement->bindValue(':end_date', $reservation['return'], PDO::PARAM_STR);
        $statement->bindValue(':id_van_id', $reservation['id_van'], PDO::PARAM_INT);
        $statement->execute();
        $idReservation = $this->pdo->lastInsertId();

       $statement2 = $this->pdo->prepare("INSERT INTO user (first_name, last_name, email)
       VALUES (:first_name, :last_name, :email)");
        $statement2->bindValue(':first_name', $reservation['first_name'], PDO::PARAM_STR);
        $statement2->bindValue(':last_name', $reservation['last_name'], PDO::PARAM_STR);
        $statement2->bindValue(':email', $reservation['email'], PDO::PARAM_STR);
        $statement2->execute();
        $idUser =$this->pdo->lastInsertId();

        $statement3 = $this->pdo->prepare("INSERT INTO test.location (van_id, reservation_id) VALUES (:van_id, :reservation_id)");
        $statement3->bindValue(':van_id', $idUser , PDO::PARAM_INT);
        $statement3->bindValue(':reservation_id', $idReservation, PDO::PARAM_INT);
        $statement3->execute();
        return (int)$this->pdo->lastInsertId();/* */
    }

    /**
     * Update item in database
     */

    public function selectOneById(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM location as loc

    join reservation as res on loc.reservation_id = res.id_reservation
    join van on res.id_van_id = van.id_van
    join user as u on loc.van_id = u.id_user
         WHERE id_location=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
