<?php

// File: app/helpers.php
namespace App;
if (!function_exists('flashMessage')) {
    function flashMessage($key, $message = null)
    {
        if ($message) {
            // Store the message in the session
            session()->flash($key, $message);
        } else {
            // Retrieve and return the message from the session
            return session($key);
        }
    }
}

