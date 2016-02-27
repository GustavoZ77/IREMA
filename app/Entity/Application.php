<?php

/**
 * Class Application the differents customer have differents applications
 *
 *
 * PHP version 5
 *
 * @package    App\Entity
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version    1.0
 * @link       http://hightechcoders.com/apps/irema2/
 * @since      1.0
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
     * Primary key 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     * @var Integer
     * @access private
     */
    private $id;

    /** 
     * Name of application
     * 
     * @ORM\Column(type="string") 
     * @var String
     * @access private 
     */
    private $name;
    
    /** 
     * Short description of the application functionality
     * 
     * @ORM\Column(type="string") 
     * @var String
     * @access private 
     */
    private $description;

    /** 
     * The application is related with a customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="applications")     
     * @var Customer
     * @access private 
     */
    private $customer;

    /** 
     * All incidents detected on the applications
     * 
     * @ORM\oneToMany(targetEntity="Incident", mappedBy="application") 
     * @var array
     * @access private 
     */
    private $incidents;

    /** 
     * An application enable or disabled 
     * 
     * @ORM\Column(type="boolean") 
     * @var boolean
     * @access private 
     */
    private $status;

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

    /* margic get method
     * 
     * @param $name 
     * @access public
     * @return property 
     */
    public function __get($name) {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        } else {
            throw new PropertyNotFoundException('Not found the property ' . $name);
        }
    }

}
