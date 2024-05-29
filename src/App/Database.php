<?php

// Enforce type checking
declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    private ?PDO $pdo = null;

    /**
     * Database constructor.
     * 
     * @param string $host The database host.
     * @param string $name The name of the database.
     * @param string $user The username for the database.
     * @param string $password The password for the database.
     */
    public function __construct(private string $host,
                                private string $name,
                                private string $user,
                                private string $password) {}
    
    /**
     * Get a connection to the database.
     * 
     * @return PDO The PDO instance representing a connection to the database.
     */
    public function getConn(): PDO
    {
        if ($this->pdo === null) {

            // Data Source Name (DSN) specifying the database to connect to
            $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8;port=3306";

            // Create a new PDO instance with the specified DSN, username, and password
            // Enable exceptions for error handling
            $this->pdo = new PDO($dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        return $this->pdo;
    }
}