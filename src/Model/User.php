<?php

// src/Model/User.php

namespace App\Model;

/**
 * Class User for fact authors
 *
 * @author user
 */
class User
{
    /**
     * The user id
     * 
     * @var string
     */
    protected string $id;
    
    /**
     * User names (first and last)
     * 
     * @var array
     */
    protected array $name;
    
    /**
     * The user's photo
     * 
     * @var string
     */
    protected string $photo;
    
    /**
     * Creates new User object
     * 
     * @param string $id User identifier
     * @param string $photo URL for user's photo
     * @param array $name Array with first and last names
     */
    public function __construct(string $id, string $photo, array $name)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->name = $name;
    }
    
    /**
     * Returns the user identifier
     * 
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Returns the array with the user first and last names
     * 
     * @return array
     */
    public function getName(): array {
        return $this->name;
    }

    /**
     * Return the URL of the user's photo
     * 
     * @return string
     */
    public function getPhoto(): string {
        return $this->photo;
    }

    /**
     * Sets the user's identifier
     * 
     * @param string $id The identifier string
     * @return $this
     */
    public function setId(string $id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the user's first and last names
     * If the given parameter does not contain keys "first" or "last"
     * it will throw an InvalidUserNamesException
     * 
     * @param array $name Array with strings for the first and last name
     * @return $this
     */
    public function setName(array $name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Sets the URL of the user's photo
     * 
     * @param string $photo The URL string
     * @return $this
     */
    public function setPhoto(string $photo) {
        $this->photo = $photo;
        return $this;
    }
    
    public function getFirstName(): string
    {
        return $this->name['FirstName'];
    }
    
    public function getLastName(): string
    {
        return $this->name['LastName'];
    }
    
    public function getFullName(): string
    {
        return $this->name['FirstName'] . ' ' . $this->name['LastName'];
    }
}
