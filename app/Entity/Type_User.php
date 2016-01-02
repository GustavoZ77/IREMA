<?php

/**
 * type of users
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
 * @ORM\Table(name="type_users")
 * */
class Type_User {

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
     * description for catalog
     * 
     * @ORM\Column(type="string")  
     * @var Integer
     * @access private
     */
    private $description;

    /**
     * ALl users with this role
     * 
     * @ORM\OneToMany(targetEntity="User", mappedBy="type_user")
     * @var array
     * @access private
     */
    private $users;

    /**
     * status of the catalog 
     * 
     * @ORM\Column(type="boolean")    
     * @var String
     * @access private 
     */
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
