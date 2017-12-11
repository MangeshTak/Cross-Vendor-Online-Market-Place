<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 11/26/17
 * Time: 4:39 PM
 */

/*
 * Products/Service extends from this class
 */

class AnObject
{
    // id from database that is created
    protected $id;

    protected $title;
    protected $description;
    protected $image_url;

    public function __construct($title, $description, $image_url)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image_url = $image_url;
    }

    public function echoImage($url, $height=100, $width=100)
    {
        echo "<img src=$url height=$height width=$width>";

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function rate($pdo, $value)
    {

    }

    public function review($pdo, $whatWasSaid)
    {


    }

}

