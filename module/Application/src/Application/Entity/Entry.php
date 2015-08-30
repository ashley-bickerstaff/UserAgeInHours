<?php
/**
 * User age record entry
 *
 * @category   Application
 * @package    Application\Entity
 * @class      Entry
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;

class Entry implements ArraySerializableInterface
{

    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_DOB = 'date_of_birth';
    const FIELD_TIMESTAMP = 'timestamp';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $dateOfBirth;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $dob
     * @return $this
     */
    public function setDateOfBirth($dob)
    {
        $this->dateOfBirth = $dob;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        if (isset($array[self::FIELD_ID])) {
            $this->setId($array[self::FIELD_ID]);
        }

        if (isset($array[self::FIELD_NAME])) {
            $this->setName($array[self::FIELD_NAME]);
        }

        if (isset($array[self::FIELD_DOB])) {

            if (!$array[self::FIELD_DOB] instanceof \DateTime) {
                $array[self::FIELD_DOB] = new \DateTime($array[self::FIELD_DOB]);
            }
            $this->setDateOfBirth($array[self::FIELD_DOB]);
        }

        if (isset($array[self::FIELD_TIMESTAMP])) {
            $this->setTimestamp(new \DateTime($array[self::FIELD_TIMESTAMP]));
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return array(
            self::FIELD_ID => $this->getId(),
            self::FIELD_NAME => $this->getName(),
            self::FIELD_DOB => $this->getDateOfBirth(),
            self::FIELD_TIMESTAMP => $this->getTimestamp()
        );
    }
}