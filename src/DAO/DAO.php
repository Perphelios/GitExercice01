<?php

namespace MyBooks\DAO;

use Doctrine\DBAL\Connection;

/**
 * Abstract class for all DAOs
 *
 * @package MyBooks\DAO
 */
abstract class DAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Grants access to the database connection object
     *
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDb() {
        return $this->db;
    }

    /**
     * Builds a domain object from a DB row.
     * Must be overridden by child classes.
     *
     * @param array $row
     */
    protected abstract function buildDomainObject(array $row);
}