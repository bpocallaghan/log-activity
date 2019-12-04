<?php

namespace Bpocallaghan\LogActivity\Events;

class LogActivity
{
    public $name;

    public $description;

    public $eloquent;

    /**
     * Create a new event instance.
     * @param string $name
     * @param string $description
     * @param        $subject
     */
    public function __construct($name = '', $description = '', $subject = null)
    {
        $this->name = $name;
        $this->eloquent = $subject;
        $this->description = $description;
    }
}
