<?php

// Package namespace Alaska \ src \ DAO;

// Abstract CAD class to bind tables
// help https://openclassrooms.com/en/courses/26832-learn-to-program-in-java/26830-beyond-sets-with-java-the-pattern-dao-objects
abstract class DAO 
{
    // Login to the database
    private $db;

    // constructor
    // Object of connection to the database
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Give access to the connection object to the database
    // return PDO object Connection object to the database
    
    protected function getDb() {
        return $this->db;
    }

    // Build a domain object from a database row.
    // Must be replaced by the child classes.
    protected abstract function buildDomainObject(array $row);
}
