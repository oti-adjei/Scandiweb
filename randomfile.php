<?php

interface QueryInterface {
    public function runQuery($args);
}

class FurnitureQuery implements QueryInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function runQuery($args) {
        $length = $args['length'];
        $width = $args['width'];
        $height = $args['height'];

        $sql = "SELECT * FROM furniture WHERE length = ? AND width = ? AND height = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $length);
        $statement->bindParam(2, $width);
        $statement->bindParam(3, $height);
        $statement->execute();

        return $statement->fetchAll();
    }
}

class DVDQuery implements QueryInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function runQuery($args) {
        $size = $args['size'];

        $sql = "SELECT * FROM dvd WHERE size = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $size);
        $statement->execute();

        return $statement->fetchAll();
    }
}

class BookQuery implements QueryInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function runQuery($args) {
        $weight = $args['weight'];

        $sql = "SELECT * FROM book WHERE weight = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $weight);
        $statement->execute();

        return $statement->fetchAll();
    }
}

// Assume you have already created a PDO object $pdo

// Get the query type and args from the user input
$queryType = $_GET['queryType'];
$args = $_GET['args'];

// Create the appropriate Query object using the QueryFactory
$query = QueryFactory::create($queryType, $pdo);

// Call the query dynamically using the Query object and pass in the args
$results = call_user_func_array(array($query, 'runQuery'), array($args));
