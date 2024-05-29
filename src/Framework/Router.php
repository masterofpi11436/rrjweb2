<?php

// Enforce type checking
declare(strict_types=1);

namespace Framework;

class Router
{
    // Array to store the routes from the routing table
    private array $routes = [];

    // Add the routes from the routing table to the $routes array
    // $path is the path entered in the URL
    // $params array store the custom params to control where the route goes.
    public function add(string $path, array $params = []): void
    {
        $this->routes[] = ["path" => $path, "params" => $params];
    }

    // Match the requested path with one of the stored routes
    // Returns an array of matched parameters or false if no match is found
    public function match(string $path, string $method): array|bool
    {
        // Decode the URL
        $path = urldecode($path);

        // Trim the leading and trailing "/"
        $path = trim($path, "/");

        // Iterate through the routes to find a match
        foreach ($this->routes as $route) {

            // Get the REGEX pattern to match with
            $pattern = $this->getPatternFromRoutePath($route["path"]);

            // Compare the pattern to the path
            if (preg_match($pattern, $path, $matches)) {

                // Filter the matches and keep only named keys
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

                // Merge the route params with teh matched params
                $params = array_merge($matches, $route["params"]);

                // Check if the HTTP method is set in the parameters
                if (array_key_exists("method", $params)) {

                    if (strtolower($method) !== strtolower($params["method"])) {

                        continue;

                    }
                }

                // Return the parameters matches
                return $params;
            }
        }

        // Return false if no matches found
        return false;
    }

    // Convert a route path to a REGEX pattern
    private function getPatternFromRoutePath(string $routePath): string
    {
        // Trim the leading and trailing "/"
        $routePath = trim($routePath, "/");

        // Split the route path into segments
        $segments = explode("/", $routePath);

        // Map each segment to a REGEX pattern
        $segments = array_map(function(string $segment): string {

            // Match each segment enclosed in curly braces ({controller} or {action})
            if (preg_match("#^\{([a-z][a-z]*)\}$#", $segment, $matches)) {

                // Return a names capture group
                return "(?<" . $matches[1] . ">[^/]*)";
            }

            // Match segments with a custom REGEX ({id:\d+})
            if (preg_match("#^\{([a-z][a-z]*):(.+)\}$#", $segment, $matches)) {

                // Return a named capture group pattern with the custom REGEX
                return "(?<" . $matches[1] . ">" . $matches[2] . ")";
            }

            // Return the segment if it does not match the above patterns
            return $segment;

        }, $segments);

        // Combine the segments into a full REGEX pattern
        return $pattern = "#^" . implode("/", $segments) . "$#iu";
    }
}