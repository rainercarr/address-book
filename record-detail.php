<?php
// SETTINGS IMPORT
include_once 'settings.php';
// DEFINITION IMPORTS
include_once 'Database.php';
include_once 'RadioSelector.php';
include_once 'Sanitize.php';
include_once 'Util.php';
// SIDE EFFECT IMPORTS
include_once 'credential.php';
// Obtain Database Connection
$db = new Database($cr);
// Set editing flag (by default, true)
$editing = true;
// Get ID of contact (only applies if editing)
$contact_id = Sanitize::get_field('cid');
// Declare/initialize contact for scope access
$contact = NULL;
if ($contact_id === '') {
    $editing = false;
} 

if ($editing) {
    $sql = "SELECT *
            FROM contacts
            WHERE cid = ?";
    $stmt = $db->dbh->prepare($sql);
    $stmt->bindParam(1, $contact_id, PDO::PARAM_INT);
    $stmt->execute();
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    $contact_sanitized = array_map('Sanitize::variable', $contact);
    extract($contact_sanitized);
    print_r($contact_sanitized);
}

//
?>
<!DOCTYPE html>
<html>
<?php include_once "head.php"; ?>
    <body>
        <?php include_once "header.php"; ?>
        <main class="container">
            <form action="record-detail.php" method="GET">
                <!--ID Hidden Field-->
                <input type="hidden" name="cid" id="cid" value="<?php echo isset($cid) ? $cid : ''?>">
                <div class="container">
                    <div class="row">
                        <div class="input-field col s4">
                            <input class="text-input" name="firstname" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">First Name</label>
                        </div>
                        <div class="input-field col s4">

                            <input class="text-input" name="middlename" type="text" value="<?php echo isset($middlename) ? $middlename : '' ?>"/>
                            <label for="query">Middle Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input class="text-input" name="lastname" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input class="text-input" name="description" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input class="text-input" name="street" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">Street</label>
                        </div>
                        <div class="input-field col s4">
                            <input class="text-input" name="unit" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">Unit</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s7">
                            <input class="text-input" name="city" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">City</label>
                        </div>
                        <div class="input-field col s2">
                            <input class="text-input" name="state" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">State</label>
                        </div>
                        <div class="input-field col s3">
                            <input class="text-input" name="zipcode" type="text" value="<?php echo isset($firstname) ? $firstname : '' ?>"/>
                            <label for="query">ZIP</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea class="materialize-textarea" rows="4" id="notes" name="notes" value="<?php echo isset($firstname) ? $firstname : '' ?>"></textarea>
                            <label for="notes">Notes</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center-align">
                            <button class="btn btn-large"><i class="material-icons icon-in-button">save</i>   Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <?php 
        include_once 'footer.php'; 
        include_once 'scripts.php';
        ?>
        
    </body>
</html>
