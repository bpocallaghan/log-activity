<?php

if (!function_exists('log_activity')) {
    /**
     * Log Activity
     * @param string $name
     * @param string $description
     * @param null   $eloquent
     */
    function log_activity($name = '', $description = '', $eloquent = null)
    {
        event(new Bpocallaghan\LogActivity\Events\LogActivity($name, $description, $eloquent));
    }
}
