<?php
    // DEFINITION ONLY FILE
    class RadioSelector {
        private $field_name;

        // $field_name is the html name attribute of the radio button field (and the name of the corresponding field in GET/POST request)
        // $field_value is the input of the field from GET or POST
        public function __construct($field_value) {
            $this->field_value = $field_value;
        }
        public function checked($value, $checked_by_default = false) {
            if (($this->field_value === '' && $checked_by_default) || $this->field_value === $value) {
                return 'checked';
            }
            return '';
        }
    }
?>