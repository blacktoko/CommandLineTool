<?php

namespace Helpers;

use Exception;
use Symfony\Component\Yaml\Yaml;
use PDOException;

/**
 * User: tom
 * Date: 29-9-17
 * Time: 10:34
 */
class Database {
    private $databases;
    public $connection;

    /**
     * Database constructor.
     */
    public function __construct() {
        $this->databases = Yaml::parse(file_get_contents(dirname(__DIR__) . '/config/databases.yml'));
    }

    /**
     * Retuns a database by the given name. The name must be equal to the name in the config file.
     *
     * @param $name Database name
     *
     * @return \PDO
     * @throws \Exception
     */
    public function returnDatabase($name) {
        if ( ! array_key_exists($name, $this->databases)) {
            throw new \Exception('Unable to load database, it does not appears in the config file.');
        }

        $dsn = 'mysql:host=' . $this->databases[$name]['database_host'] . ';port=' . $this->databases[$name]['database_port'] . ';dbname=' . $this->databases[$name]['database_name'];

        try {
            $this->connection = new \PDO($dsn, $this->databases[$name]['database_user'], $this->databases[$name]['database_password']);
            return $this->connection;
        } catch (\PDOException $e) {
            throw new Exception('Caught database exception on line: '. $e->getLine() . ' Error: ' . $e->getMessage());
        }
    }
}
