<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
define('DB_SERVER', '192.185.41.39:3306');
define('DB_USERNAME', 'twlpue17_prueba');
define('DB_PASSWORD', '1234567890');
define('DB_NAME', 'twlpue17_prueba');

/* Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
*/?>

<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '192.185.41.39:3306');
define('DB_USERNAME', 'twlpue17_prueba');
define('DB_PASSWORD', '1234567890');
define('DB_NAME', 'twlpue17_prueba');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>