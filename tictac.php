<?php



$servername = "eu-cdbr-west-03.cleardb.net";
$username = "bf34af6a205a49";
$password = "9d445f91";
$dbname = "heroku_665838fa192c80f";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  function genererChaineAleatoire($longueur = 10)
  {
   $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $longueurMax = strlen($caracteres);
   $chaineAleatoire = '';
   for ($i = 0; $i < $longueur; $i++)
   {
   $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
   }
   return $chaineAleatoire;
  }
  session_start();

  $db = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  

  function HasChar($Text,$Char) {
    $HasC = false;
    for ($i=0 ; $i<strlen($Text) ; $i++)
      if ($Text[$i]==$Char) {
        $HasC = true;
        break;
      }
    return $HasC;
  }
//------------------------------------------------------------------------------

if (isset($_POST['new'] ) ){
  $_SESSION["j"]="1";

  $stringg = genererChaineAleatoire(5);

 $sql=  " INSERT INTO tictactoe (id,grid,player)
 VALUES
 ('". $stringg."','000000000','0');" ;
    $ret = $db->query($sql);
 
    $_SESSION["id"]=$stringg;
 

/*$db->close();*/}
  else {
    //recuperer grid sql
    if (isset($_POST['id'] ) ){
      $sql=  " SELECT ID FROM tictactoe WHERE ID ='".$_POST['id']."'" ;
      $result = $db->query($sql);
      $row = $result->fetch_assoc();

      if ($row['ID']=="") {
        header('Location: index.php') ;
      }

      $_SESSION["j"]="2";
      if (isset($_POST['player'] )){
        $_SESSION["j"]=$_POST['player'] ;
      }
      $sql=  " SELECT GRID FROM tictactoe WHERE ID ='".$_POST['id']."'" ;
      $_SESSION["id"]=$_POST['id'] ;
      $ret = $db->query($sql);
      $row = $ret->fetch_assoc();
      $Grid =$row['GRID'] ;
  
  }
    else{   
      $sql=  " SELECT GRID FROM tictactoe WHERE ID ='".$_SESSION['id']."'" ;
      $ret = $db->query($sql);
    $row = $ret->fetch_assoc();

    $Grid =$row['GRID'] ;
  
    

    }
  }
//------------------------------------------------------------------------------


for ($i=0 ; $i<9 ; $i++){
if (isset($_POST[$i])) {
  $Grid[$_POST[$i]] = $_SESSION["j"];




    $sql= "UPDATE tictactoe SET GRID = '".$Grid."' WHERE ID ='".$_SESSION['id']."'";

    $ret =$db->query($sql);


    $sql=  " SELECT GRID FROM tictactoe WHERE ID ='".$_SESSION['id']."'" ;
    $ret = $db->query($sql);
    $row = $ret->fetch_assoc();
    $sql= "UPDATE tictactoe SET PLAYER = '".$_SESSION["j"]."' WHERE ID ='".$_SESSION['id']."'";
    $ret =$db->query($sql);
    header('Location: tictac.php');



}
}






/*session is started if you don't write this line can't use $_Session  global variable*/





  function Full3($P1,$P2,$P3) {
  //Indique si 3 cases spécifiées sont occupées par le même signe
    global $Grid;
    return ($Grid[$P1]!='0' && $Grid[$P1]==$Grid[$P2] && $Grid[$P2]==$Grid[$P3]);
  }

  function CheckWin() {
  //0-1-2
  //3-4-5
  //6-7-8
    global $Grid;
    return ( Full3(0,3,6) || Full3(1,4,7) || Full3(2,5,8) ||     //Verticales
             Full3(0,1,2) || Full3(3,4,5) || Full3(6,7,8) ||     //Horizontales
             Full3(0,4,8) || Full3(2,4,6)      );                //Diagonales
  }
  if(!HasChar( $Grid,'0')){
    $Grid = '000000000';

    $sql= "UPDATE tictactoe SET GRID = '".$Grid."' WHERE ID ='".$_SESSION['id']."'";

    $ret =$db->query($sql);
    
  }
  if (!isset($_POST['new'])) {
    $sql=  "SELECT PLAYER FROM tictactoe WHERE ID ='".$_SESSION['id']."'" ;
  $ret =$db->query($sql);
  $rowso = $ret->fetch_assoc();}
  else{
    $rowso =0;
  }

  function EchoTab($Index, $rowso) {

  

    global $Grid;

      if ($Grid[$Index]=='1')
      
        echo '<img src="croix.gif" alt="Cliquez pour recommencer"  height="100" width="100">';
     else if($Grid[$Index]=='2'){
        echo '<img src="cercle.gif" alt="Cliquez pour recommencer"  height="100" width="100">';}
        else {
//ajouter si c'est au tour du joueur mettre bouton sinon blank

if(   $rowso['PLAYER']== $_SESSION["j"]){

      echo ' <form action="tictac.php" method="post"> 
        <p><input type="submit" name="'. $Index.'" value="'. $Index.'"disabled="true" style="padding : 50px" />

           </p>';
      echo '</a>';
    }
    else{


        echo ' <form action="tictac.php" method="post"> 
        <p><input type="submit" name="'. $Index.'" value="'. $Index.'" style="padding : 50px"/>

           </p>';}
      echo '</a>';
    
    }  

  }


?>
<html>
<head>
<center>

<img src="image.gif" width=800 height=200>
</center>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Le jeu du morpion</title>
  <style>
    A.link		{ color: #8080FF; text-decoration: none }
    A.link:hover	{ color: blue; text-decoration: underline overline }
    TD	{ border: 10px ; background-color:  #2471A3;}   
.gameboard	{ border: 3px solid #FF9728 ; }

    IMG			{ border: 0 }
    input {
      border: none;
      color:  #2471A3;
  background-color:  #2471A3;
 
}
  </style>
</head>

<body bgcolor= #2471A3>
  <table width="35%" cellspacing="0" border="0" align="center">
    <tr> 
    <td  height="50px" align="center" style="border: 1px solid #FF9728">
          <b><font face="Verdana" color="#FF9728"> <?php  echo"GAME ID: ".$_SESSION['id'] ?></font></b>
          
      </td>
      <td  height="50px" align="center" style="border: 1px solid #996600">
        <?php
          $sql=  " SELECT PLAYER FROM tictactoe WHERE ID ='".$_SESSION['id']."'" ;
          $ret = $db->query($sql);
 
          $row = $ret->fetch_assoc();
          if (CheckWin()&& $row['PLAYER']==$_SESSION["j"]){
            header('Location: resultW.php') ;

          }
          elseif(CheckWin()&& $row['PLAYER']!=$_SESSION["j"]){
            header('Location: resultL.php') ;

          }


          elseif (!HasChar($Grid,'0')) {
              echo '<b><font face="Verdana" color="#996600">Match nul !</font></b>';
              header('Location: index.php') ;


            } else
             ;
        ?>
      </td>
    </tr>

    <tr> 
    

      <td rowspan="2">
        <br/>&nbsp;
        <table width="156" border="3" cellspacing="3" align="center" style="border: none">
          <tr>

            <td  class=gameboard style="border-top:none; border-left:none"><?php EchoTab(0, $rowso); ?></td>
            <td  class=gameboard style="border-top:none"><?php EchoTab(1, $rowso); ?></td>
            <td  class=gameboard style="border-top:none; border-right:none"><?php EchoTab(2, $rowso); ?></td>
          </tr>
          <tr>
            <td class=gameboard style="border-left:none"><?php EchoTab(3, $rowso); ?></td>
            <td  class=gameboard><?php EchoTab(4, $rowso); ?></td>
            <td class=gameboard style="border-right:none"><?php EchoTab(5, $rowso); ?></td>
          </tr>
          <tr>
            <td  class=gameboard style="border-bottom:none; border-left:none"><?php EchoTab(6, $rowso); ?></td>
            <td  class=gameboard style="border-bottom:none"><?php EchoTab(7, $rowso); ?></td>
            <td  class=gameboard style="border-bottom:none; border-right:none"><?php EchoTab(8, $rowso); ?></td>
          </tr>
        </table>
        <br/>&nbsp;
      </td>
    </tr>

 

    <tr> 
     
    </tr>

    <tr> 
      <td colspan="2" align="center" style="border: 2px solid #996600">
        <font size="2" color="maroon">Phvrvon <b>©</b> </font>
      </td>
    </tr>
  </table>

</body>
</html>