<?php
// DEFINITIONS ONLY
// Utility class for code snippets to decrease repitition
class Util {
    public static function val_or_blank($var) {
        if (isset($var)) {
            return $var;
        }
        return '';
    }
}
?>