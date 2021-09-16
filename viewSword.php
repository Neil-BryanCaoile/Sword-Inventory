<!-- Author:         Neil-Bryan Caoile -->
<!-- Student Number: 991590424 -->
<!-- April 15 2021 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&family=Zen+Dots&display=swap"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="css/addSword.css" />
    <title>Inventory</title>
  </head>
  <body>

    <header>
      <h1 class="inventory glow">Sword Inventory</h1>
    </header>

    <main>
      <!-- Navigation -->
      <div id="size" class="navigation">
        <a href="sword.php">Home</a>
        <a href="addSword.php">Add Sword</a>
        <a href="viewSword.php">View Sword</a>
      </div>
      <!-- Title -->
      <div id="inventory-title">
        <h2>View Swords</h2>
        <!-- Form -->
        <form action="" method="POST">
          <input type="text"name="search_input" placeholder="search" />
          <input class="button" type="submit" name="searchbutton"  value="Search"/>
        </form>
      </div>
      <div>
      </div>
    <!-- Table -->
      <table>
        <tr>
          <th>S. No.</th>
          <th>Sword Type</th>
          <th>Sword Name</th>
          <th>Sword Price</th>
        </tr>
        <!-- Table Body -->
        <?php
          //Connect to the database
          $host = 'localhost';               
          $username = 'caoilen_admin';      
          $password = '4j2!dA8sn$Ck';        	
          $dbname = 'caoilen_SwordInventory';   	
          $conn = mysqli_connect($host, $username, $password, $dbname);
          //Show error in the connection if there is 
          if (empty($conn)){
            die ("Connection Failed: " . mysqli_connect_error());
          }
          // Select all data
          $query = "select * from tblSwordInventory;";
          $result = mysqli_query($conn, $query);
          //If data has no values
          if (mysqli_num_rows($result) > 0){ 
            //Get form 
            $searchFieldname= $_REQUEST['search_input'];
            $searchButton= $_REQUEST['searchbutton'];

            //If search button is clicked and not empty textfield 
            if(isset($searchButton) && !empty($searchFieldname)){
              //Print the searched data
              $querySearch = "SELECT * FROM tblSwordInventory where swordName='$searchFieldname'";
              $querySearch_Run = mysqli_query($conn,$querySearch);
              $i = 0; 
              while ($row = mysqli_fetch_assoc($querySearch_Run)){ 
                $i++; 
                echo "<tr>"; 
                echo "<td>$i</td>"; 
                echo "<td>" . $row['swordType'] . "</td>"; 
                echo "<td>" . $row['swordName'] . "</td>"; 
                echo "<td>" . $row['swordPrice'] . "</td>"; 
                echo "</tr>"; 
              } 
              //If no data
              if($i == 0){
                echo "<div class='error-message'> 
                        <img id='error-icon' src='https://loading.io/s/icon/jhexu7.svg'alt='x mark'/>";
                echo "  <p>
                          <b>No sword data found.</b><br>";
                echo "    Clear the <b>search text field</b> and and click <b>search button</b> to see all swords data.
                        </p>";
                echo "</div>";
              }
            //Print if no input on the textfield and search button is clicked
            }elseif(isset($submitbutton) && empty($searchFieldname) ){
              $i = 1; 
              while ($row = mysqli_fetch_assoc($result)){ 
                echo "<tr>"; 
                echo "<td>$i</td>"; 
                echo "<td>" . $row['swordType'] . "</td>"; 
                echo "<td>" . $row['swordName'] . "</td>"; 
                echo "<td>" . $row['swordPrice'] . "</td>"; 
                echo "</tr>"; 
                $i++; 
              } 
            }else{//Print when the page first loads
              $i = 1; 
                while ($row = mysqli_fetch_assoc($result)){ 
                echo "<tr>"; 
                echo "<td>$i</td>"; 
                echo "<td>" . $row['swordType'] . "</td>"; 
                echo "<td>" . $row['swordName'] . "</td>"; 
                echo "<td>" . $row['swordPrice'] . "</td>"; 
                echo "</tr>"; 
                $i++; 
              } 
            }
          }else{ 
            echo "No Rows Fetched!"; 
          }
      ?>
    </table>
  </main>
  <footer><span class="credit">©codecaoile<span></footer>
</body>
</html>
