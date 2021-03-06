<?php
/**
 * User: tom
 * Date: 02/10/2017
 * Time: 21:26
 */

namespace Helpers;

class Users
{

    /**
     * @var \PDO
     */
    private $usersDatabase;

    public function __construct()
    {
        $database = new Database();
        $this->usersDatabase = $database->returnDatabase('test');
    }

    public function getUsers()
    {
        $query = 'SELECT * FROM users';
        $users = $this->usersDatabase->query($query);
        if ( ! $users) {
            throw new \Exception(__FUNCTION__ . ': Unable to get Users from database: ' . print_r($users->errorInfo(), true));
        }

        return $users->fetchAll(\PDO::FETCH_ASSOC);
    }
}
