<?php
// Record will come in the form of associative array
// When we get the record, we want to display only certain attributes of the array
class DisplayRecord {

    public function __construct($db_record) {
        //Sanitize record data (expected to be associative array)
        $db_record_sanitized = array_map('Sanitize::variable', $db_record);
        // bring the DB record into the local scope
        extract($db_record_sanitized);
        // print the record
        echo "
        <tr>
            <td>
                <button onclick='editRecord($cid)' class='btn btn-small' type='button'>Edit</button>
            </td>
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