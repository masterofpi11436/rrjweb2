<?php

namespace Framework;

interface RequestHandlerInterface
{
    /**
     * Handle the request and return a response.
     *
     * @param Request $request The current request.
     * @return Response The response.
     */
    public function handle(Request $request): Response;
}