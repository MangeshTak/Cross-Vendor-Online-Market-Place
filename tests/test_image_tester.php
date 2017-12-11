<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 11/26/17
 * Time: 5:00 PM
 */

include "../src/models/AnObject.php";

$object = new AnObject("Hello", "hello");

$object->echoImage("http://huyvanvo94.com/img/cs.jpg", 100, 100);
?>