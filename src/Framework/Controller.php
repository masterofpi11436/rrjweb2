<?php

declare(strict_types=1);

namespace Framework;

/**
 * Abstract base class for all controllers.
 * Provides common functionality for handling requests and rendering views.
 */
abstract class Controller
{
    // Holds the current HTTP request
    protected Request $request;

     // Holds the current HTTP response
    protected Response $response;

    // Holds the viewer object for rendering views
    protected Viewer $viewer;

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    /**
     * Sets the current HTTP request.
     *
     * @param Request $request The current request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * Sets the viewer object.
     *
     * @param Viewer $viewer The viewer object for rendering views
     */
    public function setViewer(Viewer $viewer): void
    {
        $this->viewer = $viewer;
    }

    /**
     * Renders a view template and sets it as the response body.
     *
     * @param string $template The path to the view template
     * @param array $data The data to be passed to the view template
     * @return Response The HTTP response object
     */
    public function view(string $template, array $data = []): Response
    {
        $this->response->setBody($this->viewer->render($template, $data));
        
        return $this->response;
    }

    /**
     * Redirects to a specified URL.
     *
     * @param string $url The URL to redirect to
     * @return Response The HTTP response object
     */
    public function redirect(string $url): Response
    {
        $this->response->redirect($url);

        return $this->response;
    }
}