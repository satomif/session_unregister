<?php
/**
 * session_unregister for greater than php5.4
 */
if (PHP_VERSION_ID >= 50400) {
    if (! function_exists('session_unregister')) {
        function session_unregister($name) {
            if (empty($_SESSION) || ! isset($_SESSION[$name])) {
                return false;
            }
            unset($_SESSION[$name]);
            return true;
        }
    }
}