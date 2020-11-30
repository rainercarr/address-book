<?php
// DEFINITION ONLY FILE

class Sanitize {
    public static function variable($var_name) {
        if (isset($var_name)) {
            $var_stripped = htmlentities(strip_tags($var_name));
            // Remove all punctuation
            return preg_replace('/[^a-z0-9\W]+/i', '', $var_stripped);
        }
        return '';
        
    }
    public static function get_field($field_name) {
        if (isset($_GET[$field_name])) {
            $field_value = $_GET[$field_name];
            return Sanitize::variable($field_value);
        }
        return '';
    }
}
?>