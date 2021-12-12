<?php

// src/Exception/InvalidResponseBodyException.php

namespace App\Exception;

/**
 * This exception is thrown when a problem with json decoding of the response body is raised. 
 * The origin JsonException must be set as previous exception.
 *
 * @author user
 */
class InvalidResponseBodyException extends \InvalidArgumentException
{
    //put your code here
}
