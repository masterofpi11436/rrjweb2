<?php

declare(strict_types=1);

namespace Framework;

class Response
{
    // Holds the body content of the response
    private string $body = "";

    // Holds the headers to be sent with the response
    private array $headers = [];

    // Holds the HTTP status code for the response
    private int $status_code = 0;

    /**
     * Sets the HTTP status code for the response.
     *
     * @param int $code The HTTP status code.
     */
    public function setStatusCode(int $code): void
    {
        $this->status_code = $code;
    }

    /**
     * Adds a Location header to the response to perform a redirect.
     *
     * @param string $url The URL to redirect to.
     */
    public function redirect(string $url): void
    {
        $this->addHeader("Location: $url");
    }

    /**
     * Adds a header to the response.
     *
     * @param string $header The header string (e.g., "Content-Type: application/json").
     */
    public function addHeader(string $header): void
    {
        $this->headers[] = $header;
    }

    /**
     * Sets the body content of the response.
     *
     * @param string $body The body content.
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * Gets the body content of the response.
     *
     * @return string The body content.
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Appends content to the body of the response.
     *
     * @param string $body The content to append.
     */
    public function appendBody(string $body): void
    {
        $this->body .= $body;
    }

    /**
     * Sends the HTTP response to the client.
     */
    public function send(): void
    {
         // If a status code is set, send it
        if ($this->status_code) {
            http_response_code($this->status_code);
        }

        // Send all headers
        foreach ($this->headers as $header) {
            header($header);
        }
        // Output the body content
        echo $this->body;
    }
}
