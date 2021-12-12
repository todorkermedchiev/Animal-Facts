<?php

// src/Model/Fact.php

namespace App\Model;

/**
 * Model for animal facts
 *
 * @author user
 */
class Fact
{
    /**
     * Allowed types
     * 
     * @var mixed
     */
    public const ALLOWED_TYPES = [self::CAT, self::DOG];
    
    /**
     * Value for cat type
     * 
     * @var mixed
     */
    public const CAT = 'cat';
    
    /**
     * Value for dog type
     * 
     * @var mixed
     */
    public const DOG = 'dog';
    
    /**
     * The fact id
     * 
     * @var string
     */
    protected string $id = '';
    
    /**
     * The fact's text
     * 
     * @var string
     */
    protected string $text = '';
    
    /**
     * The user's id
     * 
     * @var string
     */
    protected string $user = '';
    
    /**
     * Animal type (cat or dog)
     * 
     * @var string
     */
    protected string $type = '';
    
    /**
     * Date, the fact is created at
     * 
     * @var \DateTimeImmutable
     */
    protected \DateTimeImmutable $createdAt;
    
    /**
     * Date, the fact is updated at
     * 
     * @var \DateTimeImmutable
     */
    protected \DateTimeImmutable $updatedAt;
    
    /**
     * The fact status
     * 
     * @var Status
     */
    protected Status $status;
    
    /**
     * The author object
     * 
     * @var User|null
     */
    protected ?User $author;
    
    /**
     * Returns the identifier of the fact
     * 
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Return the text of the string
     * 
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Returns the fact identifier
     * 
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Returns the type of the fact
     * 
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Returns the date and time when the fact is created
     * 
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Returns the date and time when the fact is updated
     * 
     * @return \DateTimeImmutable
     */
    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->uodatedAt;
    }

    /**
     * Returns the status of the fact
     * 
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * Returns the author object if any
     * 
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * Sets the fact identifier
     * 
     * @param string $id The identifier
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the text of the fact
     * 
     * @param string $text The fact's text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Sets the user identifier
     * 
     * @param string $user The user's identifier
     * @return $this
     */
    public function setUser(string $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Sets the fact's type
     * 
     * @param string $type The type of the fact
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Sets the date and time when the fact is created
     * 
     * @param \DateTimeImmutable $createdAt The DateTimeImmutable object
     * @return $this
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Sets the date and time when the fact is updated if any 
     * 
     * @param \DateTimeImmutable $updatedAt The object or null
     * @return $this
     */
    public function setUpdatedAt(\DateTimeImmutable $uodatedAt)
    {
        $this->uodatedAt = $uodatedAt;
        return $this;
    }

    /**
     * Sets the fact status
     * 
     * @param Status $status The status object
     * @return $this
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Sets the author's object if any
     * 
     * @param User|null $author The author object or null
     * @return $this
     */
    public function setAuthor(?User $author)
    {
        $this->author = $author;
        return $this;
    }
}
