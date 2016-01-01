<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use App\Exceptions\PropertyNotFoundException;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="applications")
 */
class Application {

    /** 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     */
    private $id;

    /** @ORM\Column(type="string") * */
    private $name;
    
    /** @ORM\Column(type="string") * */
    private $description;

    /** @ORM\ManyToOne(targetEntity="Customer", inversedBy="applications") */
    private $customer;

    /** @ORM\oneToMany(targetEntity="Incident", mappedBy="application") */
    private $incidents;

    /** @ORM\Column(type="boolean") * */
    private $status;

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

}
