<?php
        // connect with database
		$host = 'localhost';               
        $username = 'caoilen_admin';      
        $password = '4j2!dA8sn$Ck';        	
        $dbname = 'caoilen_SwordInventory';   	
                                            

        //Set the connection command
            $conn = mysqli_connect($host, $username, $password, $dbname);

        // Verify if connection wasn't established
            if (empty($conn))
                die ("Connection Failed: " . mysqli_connect_error());

        // read the values from the form
            $swordType = $_REQUEST['swordType'];
            $swordName = $_REQUEST['swordName'];
            $swordPrice = $_REQUEST['swordPrice'];
        // query to insert into table tblProducts
            $query = "insert into tblSwordInventory (swordType, swordName, swordPrice) 
            values ('$swordType', '$swordName', $swordPrice);";

        // execute the query
            $result = mysqli_query($conn, $query);

        // check if 1 record was added
            if ($result == 1)
            {
                // redirect back to add-product.php page, along with the query string 'result'
                    header ('location:addSword.php?result=success');
            }
            else
            {
                // redirect back to add-product.php page, along with the query string 'result'
                    header ('location:addSword.php?result=fail');
            }

?>
