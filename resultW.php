<!doctype html>
<html>
    <head>
    <style>

input,select {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

input span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

input span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

input:hover span {
  padding-right: 25px;
}

input:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
        <title>Result</title>
        <img src="image.gif">

        <meta charset="UTF-8" />
    </head>
    
    <body style="background-color:#2471A3">


       





<?php

$servername = "eu-cdbr-west-03.cleardb.net";
$username = "bf34af6a205a49";
$password = "9d445f91";
$dbname = "heroku_665838fa192c80f";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {

  die("Connection failed: " . $db->connect_error);
}
?>

<td  height="50px" align="center" style="border: 1px solid #996600">
   
  
      </td>
      <center>

      <form action="index.php">
    <input type="submit" value= "WIN" >
</center>

</form>
</center>

    </body>
</html>