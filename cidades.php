<?php
include('config.php');

$estado2 = $_POST['estado'];

$sql2 = "SELECT * FROM cidade WHERE estado = '$estado2' ORDER BY nome ASC";
$qr2 = mysql_query($sql2) or die(mysql_error());

if(mysql_num_rows($qr2) == 0){
echo '<option value="0">Não há cidades nesse estado!</option>';
}else{
while($ln2 = mysql_fetch_array($qr2)){
echo '<option value="'.(int)$ln2['id'].'">'.utf8_encode($ln2['nome']).'</option>';
}
}
?>