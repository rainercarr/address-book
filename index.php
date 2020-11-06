  <!DOCTYPE html>
  <html>
    <?php 
      include_once("head.php");
      include_once("database.php");
    ?>

    <body>
      <?php
        include_once("header.php");
      ?>
      <main>
        <!--Search-->
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="search" type="search">
                    <label for="search">Look up</label>
                </div>
            </div>
        </form>
        
        <!--Address Table Here-->
        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address Type</th>
                    <th>City</th> <!--City, State-->
                </tr>
            </thead>
            <tbody>
                <!--Loop over all listed addresses-->
            </tbody>
        </table>
      </main>
      <?php
        include_once("footer.php");
        include_once("scripts.php");
      ?>
    </body>
  </html>