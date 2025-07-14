<?php

namespace App\Models;

use PDO;
use core\Database;

class BaseModel
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}
