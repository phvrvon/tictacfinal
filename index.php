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
        <title>Mon premier formulaire</title>
        <img src="image.gif">

        <meta charset="UTF-8" />
    </head>
    
    <body style="background-color:#2471A3">
    

    <center>
    <p   style=font-size:30px;> Welcome to TicTacToe </p>
<p   style=font-size:30px; >You have the choice between creating a game and sending the game id to your friend or joining an already created game as player 1 or 2. </p>
    <form action="tictac.php" method="post"> 
            <p> <input type="submit" name="new" value="New Game" />

               </p>
            <p>
                <input type="text" name="id" placeholder=" ID" />
<select name="player">
<option value="1"> j1
<option value="2"> j2

<select >
<input type="submit" value="Join Game" /></p>

         </form>
</center>
       





<?php
$servername = "eu-cdbr-west-03.cleardb.net";
$username = "bf34af6a205a49";
$password = "9d445f91";
$dbname = "heroku_665838fa192c80f";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tictactoe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
 //   echo $row['ID'] ." ".$row['GRID']."".$row['PLAYER']." <br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
    </body>
</html>