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
        <!--New contact-->

        <!--Search-->
        <form action="#" class="col s12" method="get">
            <div class="row">
                <div class="input-field col s12">
                    <input id="search" type="search" />
                    <label for="search">Search term</label>
                </div>
                <!--This is per Materialize best practice-->
                <button class="btn-floating btn-large waves-effect waves-light brown">
                    <i class="material-icons">search</i>
                </button>
            </div>
            <div class="row">
                <div>
                    <label>
                        <input name="search-type" type="radio" value="first-name" checked />
                        <span>First name</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input name="search-type" type="radio" value="last-name" checked />
                        <span>Last name</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input name="search-type" type="radio" value="contains" checked />
                        <span>Contains text</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input name="search-type" type="radio" value="city" checked />
                        <span>City (no state)</span>
                    </label>
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