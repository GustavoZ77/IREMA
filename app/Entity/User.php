<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use App\Entity\Person;
use App\Entity\Incident;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use App\Exceptions\PropertyNotFoundException;

/**
 * @ORM\Entity 
 * @ORM\Table(name="users")
 */
class User extends Person implements \LaravelDoctrine\ORM\Contracts\Auth\Authenticatable {

    use \LaravelDoctrine\ORM\Auth\Authenticatable;

    protected $em;

    /**
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="asigned") 
     */
    private $incidents_asigned;

    /**
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="entered_by") 
     */
    private $incidents_created;

    /**
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="updated_by") 
     */
    private $incidents_updated;

    /**
     * @ORM\ManyToOne(targetEntity="Type_User", inversedBy="users", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="type_user", referencedColumnName="id")
     */
    public $type_user;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="customer", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     */
    private $customer;

    public function __construct() {
        $this->incidents_asigned = new ArrayCollection();
        $this->incidents_created = new ArrayCollection();
        $this->incidents_updated = new ArrayCollection();
    }

    public function setPassword($password) {
        $this->password = bcrypt($password);
    }

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
