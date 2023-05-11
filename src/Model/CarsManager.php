<?php

namespace App\Model;

use PDO;

class CarsManager extends AbstractManager
{
    public const TABLE = 'van';

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM van where  id_van IN (1, 5,8)';

        return $this->pdo->query($query)->fetchAll();
    }



}
