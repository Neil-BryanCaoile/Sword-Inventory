<!-- Author:         Neil-Bryan Caoile -->
<!-- Student Number: 991590424 -->
<!-- April 15 2021 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/addSword.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&family=Zen+Dots&display=swap"
      rel="stylesheet"
    />
    <title>Create Sword</title>
  </head>
  <body>
    <header>
      <div class="title-container">
        <h1 class="glow">Create Sword</h1>
      </div>
      <div  id="size" class="navigation">
        <a href="sword.php">Home</a>
        <a href="addSword.php">Add Sword</a>
        <a href="viewSword.php">View Sword</a>
      </div>
    </header>
    <main>
      <div  class="form-container">
        <div class="sword-image-container">
          <img
            id="swordTypeImg"
            src="https://static.vecteezy.com/system/resources/thumbnails/001/202/766/small/sword.png"
            alt="sword type"
          />
        </div>

        <div>
          <form class="creatSwordForm" action="addSword1.php" method="post" onsubmit="return validation()">
            <div>
              <p class="error-message1"></p>
              <select
                name="swordType"
                id="swordType"
                onchange="displayImage();"
              >
                <optgroup>
                  <option value="">Select Type</option>
                  <option value="longSword">Long Sword</option>
                  <option value="shortSword">Short Sword</option>
                </optgroup>
              </select>
            </div>

            <div>
              <p class="error-message1"></p>
              <label for="swordName">Sword Name</label>
              <input type="text" name="swordName" id="swordName" placeholder="~sword name~"/>
            </div>

            <div>
              <p class="error-message1"></p>
              <label for="swordPrice">Sword Price</label>
              <input type="text" name="swordPrice" id="swordPrice" placeholder="~sword price~"/>
              <img src="" class="cancel-icon" alt="cancel icon"/>
            </div>
            <div>
              <input name="addbutton" class="button" type="submit" value="Add Sword" />
            </div>
          </form>
        </div>
      </div>
    </main>
    <?php
        if (isset($_REQUEST['result'])) {
            if ($_REQUEST['result'] == "success") {
                echo "<p>Sword Added Successfully!";
            }
            else if ($_REQUEST['result'] == "fail") {
                echo "<p>Product was not added successfully. Please try again.!";
            }
        }
    ?>
    <footer><span class="credit">©codecaoile<span></footer>
  </body>
  <script src="js/index.js"></script>
</html>
