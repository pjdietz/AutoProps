<?php

/*
 * Simple example showing a class with readable property. The class defines
 * a getName() method that can be accessed as the ->name property.
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
    public function getName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}

$peter = new Person('Peter', 'Griffin');
print $peter->name;
// Calls the getName() method.
