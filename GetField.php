<?php
// DEFINITION ONLY FILE

class GetField {
    
    public static function clean($field_name) {
        if (isset($_GET[$field_name])) {
            $field_value = $_GET[$field_name];
            $field_stripped = htmlentities(strip_tags($field_value));
            // Remove all punctuation
            return preg_replace('/[^a-z0-9\W]+/i', '', $field_stripped);
        }
        return '';
    }
}
?>