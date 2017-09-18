<?php

namespace MyBooks\Domain;

/**
 * Class for Author entities
 *
 * @package MyBooks\Domain
 */
class Author
{
    /**
     * Author id.
     *
     * @var integer
     */
    private $id;

    /**
     * Author first name.
     *
     * @var string
     */
    private $firstName;

    /**
     * Author last name.
     *
     * @var string
     */
    private $lastName;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


}