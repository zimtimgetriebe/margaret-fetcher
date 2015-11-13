<?php
header('Content-Type: application/json');

// db creds 
/* ************************* EDIT HERE **************************************** */
define('DB_HOST',           '');                    /*  <=   host               */
define('DB_USER',           '');                    /*  <=   username for db    */
define('DB_PASSWORD',       '');                    /*  <=   password for db    */
define('DB_NAME',           '');                    /*  <=   databasename       */
define('DB_CUSTOMQUERY',    '');                    /*  <=   query              */
/* **************************************************************************** */

// db connection
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$db) {
    die('Connection failed. Not cool, but here\'s the error: ' . mysql_error());
}

// db query
$result = mysqli_query($db, DB_CUSTOMQUERY);
$outputput = array();
while($row = mysqli_fetch_assoc($result))
{
  $outputput[] = $row;
}

// json output
print json_encode($outputput);

// free the memory & close the door before you leave.
mysqli_free_result($result);
mysqli_close($db);
?>
