<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use App\Exceptions\PropertyNotFoundException;
use App\Entity\User;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="incidents")
 */
class Incident {

    /** 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     */
    private $id;


    /** @ORM\ManyToOne(targetEntity="Application", inversedBy="incidents") */
    private $application;

    /** @ORM\oneToOne(targetEntity="Type_Incident") */
    private $type_incident;

    /** @ORM\oneToOne(targetEntity="Priority") */
    private $priority;

    /** @ORM\Column(type="date") */
    private $date_incident;

    /** @ORM\Column(type="date") */
    private $last_update;

    /** @ORM\Column(type="string") */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_asigned", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="asigned", referencedColumnName="id")
     */
    private $asigned;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_created", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="entered", referencedColumnName="id")
     */
    private $entered_by;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_updated", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="updated", referencedColumnName="id")
     */
    private $updated_by;

    /** @ORM\Column(type="string") * */
    private $solution;

    /** @ORM\Column(type="integer") * */
    private $status_incident;

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
