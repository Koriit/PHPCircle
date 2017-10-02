<?php

namespace Koriit\PHPCircle\Application\Exceptions;

class ApplicationAlreadyRunning extends ApplicationLifecycleException
{
    public function __construct(ó$cause = null)
    {
        parent::__construct("Application is already running", 0, $cause);
    }
}
