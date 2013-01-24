<?php

/*
 * Demonstrates how to customize the naming convention by redefining the
 * methods used to determine the accessor method names.
 */

require '../vendor/autoload.php';

class Person
{
    use pjdietz\AutoProps\AutoPropsTrait;

    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    // This will be reachable as the name property.
    public function get_name()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    // Don't like the default getName style? Redefine these methods to change
    // the naming conventions.
    protected function getterName($propertyName)
    {
        return 'get_' . $propertyName;
    }

}

$peter = new Person('Peter', 'Griffin');
print $peter->name;
// Calls the get_name() method.
