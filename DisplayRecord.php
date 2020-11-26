<?php
// Record will come in the form of associative array
// When we get the record, we want to display only certain attributes of the array
class DisplayRecord {

    public function __construct($db_record) {
        // bring the DB record into the local scope
        extract($db_record);
        // print the record
        echo "
        <tr>
            <td>$firstname $middlename $lastname</td>
            <td>$description</td>
            <td>$street</td>
            <td>$unit</td>
            <td>$city $state $zipcode</td>
            <td>$phone</td>
            <td>$notes</td>
        </tr>
        ";
    }
}
?>