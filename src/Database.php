<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 11/26/17
 * Time: 4:11 PM
 */


class Database
{

    private $pdo;
    // The constructor
    // Database dependency from settings.php
    function __construct($settings)
    {

        $this->pdo = new PDO(sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
            $settings['username'],
            $settings['password']
        );
    }

    function __destruct()
    {
        //    $this->pdo = null;

    }
    // get database connection
    public function getPDO()
    {
        return $this->pdo;
    }

    public function close(){
        $this->pdo = null;
    }


}