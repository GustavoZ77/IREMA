<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use App\Entity\Person;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="customers")
 */
class Customer extends Person {

    /** @ORM\Column(type="string") * */
    private $phone;

    /** @ORM\Column(type="string") * */
    private $address;

    /** @ORM\Column(type="string") * */
    private $stand;

    /** @ORM\oneToMany(targetEntity="Application", mappedBy="customer") */
    private $applications;

    /** @ORM\oneToMany(targetEntity="User", mappedBy="customer") */
    private $users;

    public function __set($property, $value) {
        if (property_exists(__CLASS__, $property)) {
            $this->$property = $value;
        } else {
            throw new PropertyNotFoundException('Not found the property ' . $property);
        }
    }

    public function __get($name) {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        } else {
            throw new PropertyNotFoundException('Not found the property ' . $name);
        }
    }

    public function getApplications() {
        return $this->applications;
    }

    public function setApplications($applications) {
        $this->applications = $applications;
    }

}
