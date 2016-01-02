<?php

/**
 * All incidents for all applications 
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
use App\Entity\User;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="incidents")
 */
class Incident {

    /**
     * Primary key
     * 
     * @ORM\id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue 
     * @var Integer
     * @access private 
     */
    private $id;

    /**
     * Application for the incident
     * 
     * @ORM\ManyToOne(targetEntity="Application", inversedBy="incidents") 
     * @var Application
     * @access private
     */
    private $application;

    /**
     * Type of the incident
     * 
     * @ORM\oneToOne(targetEntity="Type_Incident") 
     * @var Type_Incident
     * @access private
     */
    private $type_incident;

    /**
     * The priority for resolve the incident
     * 
     * @ORM\oneToOne(targetEntity="Priority") 
     * @var Priority
     * @access private
     */
    private $priority;

    /**
     * date of incident registration
     *  
     * @ORM\Column(type="date") 
     * @var Date
     * @access private
     */
    private $date_incident;

    /**
     * last modification date
     * 
     * @ORM\Column(type="date") 
     * @var Date
     * @access private
     */
    private $last_update;

    /**
     * description of incident
     * 
     * @ORM\Column(type="string") 
     * @var String
     * @access private
     */
    private $description;

    /**
     * User (type user SUPPORT) who will work with the resolution
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_asigned", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="asigned", referencedColumnName="id")
     * @var User
     * @access private
     */
    private $asigned;

    /**
     * the user who created the incident
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_created", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="entered", referencedColumnName="id")
     * @var User
     * @access private
     */
    private $entered_by;

    /**
     * the last user who modified the incident
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="incidents_updated", cascade={"persist"}, fetch="LAZY" )
     * @ORM\JoinColumn(name="updated", referencedColumnName="id")
     * @ORM\JoinColumn(name="entered", referencedColumnName="id")
     * @var User
     * @access private
     */
    private $updated_by;

    /**
     * The solution for incident
     *  
     * @ORM\Column(type="string")
     * @var User
     * @access private 
     */
    private $solution;

    /**
     * status for the incident[SCHEDULED, WORK IN PROGRESS, COMPLETED]
     * 
     *  @ORM\Column(type="integer") 
     * @var User
     * @access private 
     */
    private $status_incident;

    /* margic set method
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
