         <?php
         $servername = "162.241.62.191:3306";
         $database = "tecnoso5_cocleavirtual";
         $username = "tecnoso5_master";
         $password = "nKwuIMe#Nj*8";
         // Create connection
         $conn = mysqli_connect($servername, $username, $password, $database);
         // Check connection
         if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
         }
         echo "Connected successfully";
         mysqli_close($conn);
         ?>