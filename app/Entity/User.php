<?php

/**
 * All users into the application
 *
 *
 * PHP version 5
 *
 * @package    App\Entity
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version    1.0
 * @link       http://hightechcoders.com/apps/irema2/
 * @since      1.0
 */

namespace App\Entity;

use App\Entity\Incident;
use App\Entity\Person;
use App\Exceptions\PropertyNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="users")
 */
class User extends Person implements \LaravelDoctrine\ORM\Contracts\Auth\Authenticatable {

    use \LaravelDoctrine\ORM\Auth\Authenticatable;

    /**
     * All incidents asigned to one user
     * 
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="asigned") 
     * @var Incidents
     * @access protected 
     */
    private $incidents_asigned;

    /**
     * All incidents created
     * 
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="entered_by") 
     * @var Incidents
     * @access protected 
     */
    private $incidents_created;

    /**
     * All incidentes updated
     * 
     * @ORM\OneToMany(targetEntity="Incident", mappedBy="updated_by") 
     * @var Incidents
     * @access protected 
     */
    private $incidents_updated;

    /**
     * Type user [ADMIN,USER,SUPPORT]
     * 
     * @ORM\ManyToOne(targetEntity="Type_User", inversedBy="users", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="type_user", referencedColumnName="id")
     * @var Type_user
     * @access protected 
     */
    private $type_user;

    /**
     * The customer for this user
     * 
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="customer", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="customer", referencedColumnName="id")
     * @var Customer
     * @access protected 
     */
    private $customer;

    /**
     * __construct magic function
     * 
     * @access public
     */
    public function __construct() {
        $this->incidents_asigned = new ArrayCollection();
        $this->incidents_created = new ArrayCollection();
        $this->incidents_updated = new ArrayCollection();
    }

    
    /** 
     * Set password and encrypt the word
     * 
     * @param $password 
     * @access public 
     */
    public function setPassword($password) {
        $this->password = bcrypt($password);
    }

    /**
     * margic get method
     *
     * @param $property
     * @access public
     * @return property
     */
    public function __get($property) {
    	if (property_exists(__CLASS__, $property)) {
    		return $this->$property;
    	} else {
    		throw new PropertyNotFoundException('Not found the property ' . $property);
    	}
    }
    
    /**
     * margic set method
     *
     * @param $property
     * @param $value
     * @access public
     */
    public function __set($property, $value) {
    	if (property_exists(__CLASS__, $property)) {
    		$this->$property = $value;
    	} else {
    		throw new PropertyNotFoundException('Not found the property ' . $property);
    	}
    }

}
