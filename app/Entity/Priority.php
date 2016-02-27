<?php

/**
 * Let know what kind of ungency is necesary to use for fix this incident 
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
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="priorities")
 */
class Priority {

    /**
     * Primary key 
     * 
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     * @var Integer
     * @access private
     */
    private $id;

    /** 
     * description of priority object
     * 
     * @ORM\Column(type="string") 
     * @var Integer
     * @access private
     */
    private $description;

    /**
     * Status for catalog
     *  
     * @ORM\Column(type="boolean") 
     * @var Integer
     * @access private
     */
    private $status;

    /** 
     * Time in days for find a solution (in the next version we will use date for improve accuracy)
     * 
     * @ORM\Column(type="integer") 
     * @var Integer
     * @access private
     */
    private $time_priority;

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
