<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\MappedSuperclass 
 * @ORM\Table(name="persons")
 */
class Person {

    /** 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     */
    protected $id;
    /** @ORM\Column(type="string") */
    protected $name;
    /** @ORM\Column(type="string") */
    protected $email;
    /** @ORM\Column(type="boolean") */
    protected $status;

}
