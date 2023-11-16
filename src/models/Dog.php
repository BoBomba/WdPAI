<?php

class Dog {
    private $name;
    private $breed;
    private $age;
    private $color;
    private $photoURL;

    public function __construct($name, $breed, $age, $color, $photoURL) {
        $this->name = $name;
        $this->breed = $breed;
        $this->age = $age;
        $this->color = $color;
        $this->photoURL = $photoURL;
    }

    // Getters and Setters
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getBreed() {
        return $this->breed;
    }

    public function setBreed($breed) {
        $this->breed = $breed;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getPhotoURL() {
        return $this->photoURL;
    }

    public function setPhotoURL($photoURL) {
        $this->photoURL = $photoURL;
    }

    // Methods
    public function bark() {
        echo "Woof, woof!\n";
    }

    public function fetch($item) {
        echo $this->name . " is fetching the " . $item . ".\n";
    }

    public function displayDetails() {
        echo "Name: " . $this->name . "\n";
        echo "Breed: " . $this->breed . "\n";
        echo "Age: " . $this->age . " years\n";
        echo "Color: " . $this->color . "\n";
    }

    public function displayPhoto() {
        echo "Displaying photo: " . $this->photoURL . "\n";
    }
}

