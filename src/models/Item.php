<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 12/2/17
 * Time: 12:48 PM
 */


// Service & Product
class Item
{
    // id from database that is created
    protected $id;

    protected $title;
    protected $description;
    protected $image_url;

    protected $price;

    function __construct($id, $title, $description, $image_url, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->price = $price;
    }
    // I dont see this application needing
    // to get product name from product id




    /**
     * @return mixed
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }



}