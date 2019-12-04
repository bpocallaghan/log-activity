<?php

if (!function_exists('log_activity')) {
    /**
     * Log Activity
     * @param string $title
     * @param string $description
     * @param null   $eloquent
     */
    function log_activity($title = '', $description = '', $eloquent = null)
    {
        event(new Bpocallaghan\Titan\Events\ActivityWasTriggered($title, $description, $eloquent));
    }
}
