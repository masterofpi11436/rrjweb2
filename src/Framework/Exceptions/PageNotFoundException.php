<?php

namespace Framework\Exceptions;

// Use the DomainException class to extend its functionality
use DomainException;

// Custom exception to be thrown when a page cannot be found
class PageNotFoundException extends DomainException
{
    // Additional code can be added here to log events, redirect the user, or display an error message
}