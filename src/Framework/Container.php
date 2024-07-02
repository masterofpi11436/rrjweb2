<?php

// Enforce strict type checking
declare(strict_types=1);

namespace Framework;

use ReflectionClass;
use Closure;
use ReflectionNamedType;
use InvalidArgumentException;

class Container
{
    // Array to keep track of the registered classes
    private array $registry = [];

    // Register a class with a closure that returns the instance
    public function set(string $name, Closure $value): void
    {
        $this->registry[$name] = $value;
    }

    // Retrieve and instantiate a class, resolving its dependencies automatically
    public function get(string $class): object
    {
        // Check if the class is already registered
        if (array_key_exists($class, $this->registry)) {

            // Return the instance using the stored closure
            return $this->registry[$class]();

        }

        // Use ReflectionClass to analyze the class
        $reflector = new ReflectionClass($class);

        // Get the constructor of the class
        $constructor = $reflector->getConstructor();

        // Array to store the constructor's dependencies
        $dependencies = [];

        // If the class has no constructor or the constructor has no parameters
        if ($constructor === null) {

            // Instantiate and return the class
            return new $class;
        }
        
        // Iterate over each parameter of the constructor
        foreach ($constructor->getParameters() as $parameter) {
        
            // Get the type (class) of the parameter
            $type = $parameter->getType();

            // Check if the type is not declared
            if ($type === null) {

                // Manually handle the case for PHPMailer
                if ($parameter->getName() === 'exceptions') {
                    $dependencies[] = true;
                    continue;
                }

                throw new InvalidArgumentException("Constructor parameter '{$parameter->getName()}' in the class $class has no type declaration");
            }

            // Ensure the type is a named type (not a union or other type)
            if (!($type instanceof ReflectionNamedType)) {

                throw new InvalidArgumentException("Constructor parameter '{$parameter->getName()}' in the class $class is an invalid type: $type - only single named types supported");

            }

            // Ensure the parameter type is not a built-in type
            if ($type->isBuiltin()) {

                throw new InvalidArgumentException("Unable to resolve the constructor parameter '{$parameter->getName()}' of type '$type' in the class $class class");
            }

            // Recursively resolve the dependency and add it to the dependencies array
            $dependencies[] = $this->get((string) $type);

        }
    
        // Instantiate the class dynamically with its resolved dependencies
        return new $class(...$dependencies);
    }
}