  <!--SIDE EFFECTS ONLY-->
  <?php
    // SETTINGS IMPORT
    include_once 'settings.php';
    // DEFINITION IMPORTS
    include_once 'Database.php';
    include_once 'DisplayRecord.php';
    include_once 'Sanitize.php';
    include_once 'RadioSelector.php';
    // SIDE EFFECT IMPORTS
    include_once 'credential.php';
    // Obtain Database Connection
    $db = new Database($cr);
    // Testing Database
    
    
    // Get Query Results
    $sql = '';
    $sth = NULL;
    $query = Sanitize::get_field('query');
    // echo $query;
    $search_type = Sanitize::get_field('search-type');
    if (strlen($query) != 0) {
        $query = '%' . $query . '%';
        if ($search_type === 'contains') {
            $sql = "    SELECT *
                        FROM contacts
                        WHERE 
                            firstname LIKE :query OR
                            lastname LIKE :query OR
                            description LIKE :query OR
                            street LIKE :query OR
                            city LIKE :query OR
                            state LIKE :query OR
                            notes LIKE :query";
        } else if ($search_type === 'firstname') {
            $sql =  "   SELECT *
                    FROM contacts
                    WHERE firstname LIKE :query";
        } else if ($search_type === 'lastname') {
            $sql =  "   SELECT *
                    FROM contacts
                    WHERE lastname LIKE :query";
        } else if ($search_type === 'city') {
            $sql =  "   SELECT *
                    FROM contacts
                    WHERE city LIKE :query";
        }
        $sth = $db->dbh->prepare($sql);
        //$sth->bindParam(':search_type', $search_type, );
        $sth->bindParam(':query', $query, PDO::PARAM_STR);
    } else {
        $sql = 'SELECT * FROM contacts';
        $sth = $db->dbh->prepare($sql);
    }
    $sth->execute();


    /*
    ELSE
        IF search box value empty
            display all records
        ELSE
            IF firstname

            ELSE IF lastname

            ELSE IF city

            ELSE IF contains text

            ELSE IF city
        */

    
  ?>
  <!DOCTYPE html>
  <html>
    <?php 
      include_once "head.php";
    ?>
    <body>
      <?php
        include_once "header.php";
      ?>
      <main class="container">
        <!--New contact-->
        <div>
            <div class="content center-align">
                <a class="btn btn-large" href="record-detail.php"><i class="material-icons icon-in-button">person_add</i> New Contact</a>
            </div>
        </div>
        <!--Search-->
        <form action="index.php" class="" id="search-form" method="GET">
            <div class="container">
                <div class="row">
                    <div class="input-field col s10">
                        <input class="text-input" id="query" name="query" type="text" value="<?php echo Sanitize::get_field('query'); ?>"/>
                        <label for="query">Search</label>
                    </div>
                    <div class="col center s2">
                        <button class="btn-floating btn-large waves-effect waves-light red" name="searchbutton">
                        <i class="material-icons">search</i>
                        </button>
                    </div>
                    <!--This is per Materialize best practice-->
                </div>
            </div>
            <?php 
                $radio = new RadioSelector($search_type);
            ?>
            <div class="container">
                <div class="row center-align">
                    <div class="col s3">
                        <label>
                            <input name="search-type" type="radio" value="firstname" <?php echo $radio->checked('firstname', $checked_by_default = true); ?>/>
                            <span>First name</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input name="search-type" type="radio" value="lastname" <?php echo $radio->checked('lastname'); ?>/>
                            <span>Last name</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input name="search-type" type="radio" value="contains" <?php echo $radio->checked('contains'); ?>/>
                            <span>Contains text</span>
                        </label>
                    </div>
                    <div class="col s3">
                        <label>
                            <input name="search-type" type="radio" value="city" <?php echo $radio->checked('city'); ?>/>
                            <span>City (no state)</span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
        
        <!--Address Table Here-->
        <table class="highlight centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Street</th>
                    <th>Unit</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <!--The entire table body is a form-->
                <!--The value of the hidden cid input is changed based on which row is clicked-->
                <form action="record-detail.php" id="records-form" method="GET">
                    <input id="cid" name="cid" type="hidden" value="" />
                    <?php
                    //Get every row that has been retrieved from the database
                    while($record = $sth->fetch(PDO::FETCH_ASSOC)) {
                        new DisplayRecord($record);
                    }
                    /*
                    foreach($records as $record) {
                        new DisplayRecord($record);
                    }
                    */
                    ?>
                </form>
            </tbody>
        </table>
      </main>
      <?php
        include_once("footer.php");
        include_once("scripts.php");
      ?>
      <!--Script for selecting record to edit-->
      <script type="text/javascript" src="js/index.js"></script>
    </body>
  </html>