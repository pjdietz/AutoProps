<?php

/*
 * For PHP 5.3, use the AutoPropsBase as a base class.
 */

require '../vendor/autoload.php';

class Person extends pjdietz\AutoProps\AutoPropsBase
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
