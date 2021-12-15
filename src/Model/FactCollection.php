<?php

// src/Model/FactCollection.php

namespace App\Model;

/**
 * Collection with Fact objects
 * This class extends the built-in ArrayObject and override
 * the offsetSet() method to validate that all set values are Fact objects
 *
 * @author user
 */
class FactCollection extends \ArrayObject
{
    /**
     * Override the original method to validate the value is Fact object
     * 
     * @param mixed $index The index that the new value will be set on
     * @param mixed $newval The object
     * @return void
     */
    public function offsetSet($index, $newval): void {}
    
    /**
     * Validate the object is Fact instance
     * 
     * @param object $object The object to be checked
     * @return void
     */
    protected function ensureFactObject(object $object): void {}
}
