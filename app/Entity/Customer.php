<?php

/**
 * Class Customer model all customers
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

use App\Entity\Person;
use App\Exceptions\PropertyNotFoundException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="customers")
 */
class Customer extends Person {

    /**
     * Telephone for customer
     *  
     * @ORM\Column(type="string") 
     * @var String
     * @access private 
     */
    private $phone;

    /**
     * phisical address 
     *  
     * @ORM\Column(type="string") 
     * @var String
     * @access private  
     */
    private $address;

    /**
     * Sometimes the customes have stands 
     *  
     * @ORM\Column(type="string") 
     * @var String
     * @access private 
     */
    private $stand;

    /**
     * All applications for a Customer
     * 
     * @ORM\oneToMany(targetEntity="Application", mappedBy="customer") 
     * @var Array
     * @access private 
     */
    private $applications;

    /**
     * A Customer can have  user for create incidents
     * 
     * @ORM\oneToMany(targetEntity="User", mappedBy="customer") 
     * @var Array
     * @access private 
     */
    private $users;

    /* set all application 
     * 
     * @param $name 
     * @access public
     * @return property 
     */
    public function setApplications($applications) {
        $this->applications = $applications;
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
