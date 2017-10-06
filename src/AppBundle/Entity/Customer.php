<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Customer
 *
 * @package AppBundle\Entity
 */
class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var ArrayCollection
     */
    private $address;

    /**
     * @var ArrayCollection
     */
    private $commands;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->address = new ArrayCollection();
        $this->commands = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Customer
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     *
     * @return Customer
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return Customer
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param ArrayCollection $address
     *
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function addAddress(Address $address)
    {
        $this->address->add($address);
        $address->setCustomer($this);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @param ArrayCollection $commands
     *
     * @return Customer
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;

        return $this;
    }

    /**
     * @param Command $command
     *
     * @return Customer
     */
    public function addCommand(Command $command)
    {
        $this->commands->add($command);
        $command->setCustomer($this);

        return $this;
    }
}
