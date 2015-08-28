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

class Entry
{

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
     * @param string $dob
     * @return $this
     */
    public function setDateOfBirth($dob)
    {
        $this->dateOfBirth = $dob;
        return $this;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}