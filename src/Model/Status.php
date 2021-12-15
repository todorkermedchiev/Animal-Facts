<?php

// src/Model/Status.php

namespace App\Model;

/**
 * Status for animal facts
 *
 * @author user
 */
class Status
{
    /**
     * How many time the fact is sent for verification
     * 
     * @var int
     */
    protected ?int $sentCount;
    
    /**
     * Is the fact verified or not
     * 
     * @var bool
     */
    protected ?bool $verified;
  
    /**
     * Creates new Status object
     * 
     * @param bool|null $verified Is the fact is verified or not
     * @param int|null $sentCount Sent counted
     */
    public function __construct(?bool $verified = null, ?int $sentCount = null)
    {
        $this->verified = $verified;
        $this->sentCount = $sentCount;
    }
    
    /**
     * Returns the sent counter
     * 
     * @return int
     */
    public function getSentCount(): int
    {
        return $this->sentCount;
    }

    /**
     * Check whether the fact is verified or not
     * 
     * @return bool True if it, otherwise false
     */
    public function getVerified(): bool
    {
        return $this->verified;
    }

    /**
     * Sets the sent counter
     * 
     * @param int $sentCount The sent counter
     * @return $this
     */
    public function setSentCount(int $sentCount)
    {
        $this->sentCount = $sentCount;
        return $this;
    }

    /**
     * Sets the verified value
     * 
     * @param bool $verified True if it is verified, otherwise false
     * @return $this
     */
    public function setVerified(bool $verified)
    {
        $this->verified = $verified;
        return $this;
    }
}
