<?php
include('../config.php');

$estado2 = $_POST['tempo'];

$sql2 = "SELECT * FROM destacar WHERE tempo = '$estado2'";
$qr2 = mysql_query($sql2) or die(mysql_error());

if(mysql_num_rows($qr2) == 0){
echo '';
}else{
while($ln2 = mysql_fetch_array($qr2)){
echo ''.$ln2['valor'].'';
}
}
?>