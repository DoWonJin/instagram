<?php
  $dbh = new PDO('mysql:host=localhost:3307;dbname=instagram', 'root', '111111', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $sql = "SELECT name1
  FROM followTBL
  WHERE name2='".$_POST['nickname']."'";
  $res = $dbh->prepare($sql);
  $res->execute();
  while($row = $res->fetch(PDO::FETCH_ASSOC))
  {
    echo $row['name1']."<br>";
  }
 ?>
