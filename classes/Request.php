<?php

namespace MartinMuzatko;

/**
 *
 */
class Request
{

    function __construct(argument)
    {
        $this->method = argument || $_SERVER['REQUEST_METHOD'];
    }
}
