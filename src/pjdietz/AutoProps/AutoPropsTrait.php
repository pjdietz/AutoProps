<?php

namespace pjdietz\AutoProps;

/**
 * Adds magic accessor methods (__get, __set, __isset, and __unset) that call
 * predictably named accessor methods.
 */
trait AutoPropsTrait
{
    /**
     * @param $propertyName
     * @return mixed
     */
    public function __get($propertyName)
    {
        $method = $this->getterName($propertyName);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }

    /**
     * @param $propertyName
     * @param $value
     */
    public function __set($propertyName, $value)
    {
        $method = $this->setterName($propertyName);
        if (method_exists($this, $method)) {
            $this->{$method}($value);
        }
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    public function __isset($propertyName)
    {
        $method = $this->issetterName($propertyName);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    public function __unset($propertyName)
    {
        $method = $this->unsetterName($propertyName);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }

    /**
     * Return the name for a getter method given a property name.
     *
     * @param $propertyName
     * @return string
     */
    protected function getterName($propertyName)
    {
        return 'get' . ucfirst($propertyName);
    }

    /**
     * Return the name for a setter method given a property name.
     *
     * @param $propertyName
     * @return string
     */
    protected function setterName($propertyName)
    {
        return 'set' . ucfirst($propertyName);
    }

    /**
     * Return the name for an isset method given a property name.
     *
     * @param $propertyName
     * @return string
     */
    protected function issetterName($propertyName)
    {
        return 'isset' . ucfirst($propertyName);
    }

    /**
     * Return the name for an unset method given a property name.
     *
     * @param $propertyName
     * @return string
     */
    protected function unsetterName($propertyName)
    {
        return 'unset' . ucfirst($propertyName);
    }

}
