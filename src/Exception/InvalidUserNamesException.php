<?php

// src/Exception/InvalidUserNamesException.php

namespace App\Exception;

/**
 * This exceptions is thrown when an array without "first" or "last" index is tried to be set for user names.
 *
 * @author user
 */
class InvalidUserNamesException extends \InvalidArgumentException
{
    //put your code here
}
