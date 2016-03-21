<?php

/**
 * Model all person into the appliction customer/user
 * in the future versions could be required that customer be modeled 
 * like entity/person.
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

use App\Exceptions\PropertyNotFoundException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass 
 * @ORM\Table(name="persons")
 */
class Person {
    
    protected $em;

    /**
     * Primary key
     * 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     * @var Integer
     * @access protected 
     */
    protected $id;

    /**
     * Name for person
     * 
     * @ORM\Column(type="string") 
     * @var Sring
     * @access protected 
     */
    protected $name;

    /**
     * email for person
     * @ORM\Column(type="string") 
     * @var String
     * @access protected
     */
    protected $email;

    /**
     * Status for person
     * 
     * @ORM\Column(type="boolean") 
     * @var Boolean
     * @access protected
     */
    protected $status;

    /* get all applications by customer
     * 
     * @param $name 
     * @access public
     * @return property 
     */

    public function getApplications() {
        return $this->applications;
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
