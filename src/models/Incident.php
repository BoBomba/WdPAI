<?php

class Incident {

    private $id;
    private $title;
    private $description;
    private $location;
    private $status;
    private $file;

    private $author;

    public function __construct($id ,$title, $description, $location, $status, $file, $user)
    {
        $this->id = $user->id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->status = $status;
        $this->file = $file;
        $this->author = $user;
    }



    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getFile()
    {
        return $this->file;
    }
    public function __toString()
    {
        return $this->getTitle();
    }
    public function getAuthor()
    {
        return $this->author;
    }
   
    public function setID($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setLocation($location){
        $this->location = $location;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setFile($file){
        $this->file = $file;
    } 
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}





?>