
<?

$id = $_COOKIE["user"];

if(empty($id)) {

die("nicht eingeloggt");

}
$db = new mysql_connector();
$db->connect();
$result=mysql_query("select * from user where id=$id", $db->con) or die(mysql_error());
$row = mysql_fetch_array($result);
$names = $row["names"];		
?>

<a href="index.php?page=queue&id=2">Studienb&uuml;ro</a>
<a href="index.php?page=queue&id=1">Pr&uuml;fungsb&uuml;ro</a>
<a href="index.php?page=queue&id=3">Promotionsb&uuml;ro</a>


<?
if(empty($_GET["id"])) {
	$id = 2;
} else {
$id = $_GET["id"];
}


if($_GET["action"] == "next") {

$result = mysql_query("delete from queue where user='". $_COOKIE["user"] ."' and timesel > 0", $db->con) or die(mysql_error());
$result2 = mysql_query("select * from queue where queue='$id' and timesel = 0 order by `time` ASC LIMIT 1", $db->con) or die(mysql_error());
$row = mysql_fetch_array($result2);
if(empty($row["id"])) {
$message = "kein weiterer Student in dieser Liste";
} else {
$ttime =time();
$usr = $_COOKIE["user"];
$sql2 = "update queue set timesel='$ttime', user='$usr' where id=". $row["id"] .";";
$result3 = mysql_query($sql2, $db->con) or die(mysql_error());

}

} elseif($_GET["action"] == "move") {

$result = mysql_query("select * from queue where user='". $_COOKIE["user"] ."' and timesel > 0", $db->con) or die(mysql_error());
$row = mysql_fetch_array($result);
if(empty($row["id"])) {
$message = "kein aktueller Student in dieser Liste";
} else {
$uid = $row["queue"];
if($uid == 1) {
$newid = 2;
} elseif($uid == 2) {
$newid = 2;
} elseif($uid == 3) {
$newid = 1;
}

$result2 = mysql_query("select * from queue where queue='$newid' and timesel = 0 order by `time` ASC LIMIT 1", $db->con) or die(mysql_error());
$row2 = mysql_fetch_array($result2);
if(empty($row2["time"])) {
$ttime = $row["time"];
}else {
$ttime = $row2["time"] - 1;
}




$sql2 = "update queue set timesel='0',`time`='$ttime', queue='$newid', user='0'  where id=". $row["id"] .";";
$result3 = mysql_query($sql2, $db->con) or die(mysql_error());

}



}






?>
<br><br>
<? echo $message; ?>
Ihr aktueller Kunde:
<table>
<tr>
<th width="150px">Nummer</th>
<th width="150px">Vorname</th>
<th width="150px">Nachname</th>
<th width="150px">Matr.Nr</th>
<th width="150px">Liste</th>
<th width="150px">abgerufen</th>
<th width="150px">eingetragen</th>
</tr>
<tr>
<?
$result = mysql_query("select * from queue where user='". $_COOKIE["user"] ."' and timesel > 0", $db->con) or die(mysql_error());
$row = mysql_fetch_array($result);
if (empty($row["num"])) {
	echo "<td>noch keiner</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";

} else {
	$result2  = mysql_query("select * from queuelist where id=". $row["queue"] .";", $db->con) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);
	$hasstudent = true;
	echo "<td>". $row["num"] ."</td>";
	echo "<td>". $row["name"] ."</td>";
	echo "<td>". $row["surname"] ."</td>";
	echo "<td>". $row["matr"] ."</td>";
	echo "<td>". $row2["name"] ."</td>";
	echo "<td>". date("H:i", $row["timesel"]) ."</td>";
	echo "<td>". date("H:i", $row["time"]) ."</td>";
}


?>
</tr>


</table>
<br><!-- Hier klappts noch nicht!! -->
<?
if($hasstudent) {
        echo "<!-- <br><a href=\"index.php?page=queue&id=2&action=move\">Student zum Pr&uuml;fungsb&uuml;ro verschieben</a> -->";
        echo "<!-- <br><a href=\"index.php?page=queue&id=3&action=move\">Student zum Promotionsb&uuml;ro verschieben</a> --> ";
        echo "<!-- <br><a href=\"index.php?page=queue&id=1&action=move\">Student zum Studienb&uuml;ro verschieben</a> -->";
} 
	echo "<br><a href=\"index.php?page=queue&id=". $id ."&action=next\">N&auml;chsten Studenten aus Listen holen</a>";


?>


<table>
<tr>
<th width="150px">Nummer</th>
<th width="150px">Vorname</th>
<th width="150px">Nachname</th>
<th width="150px">Matrikelnummer</th>
<th width="150px">eingetragen</th>
</tr>
<?
$result = mysql_query("select * from queue where queue='$id' and timesel = 0 order by `time` ASC", $db->con) or die(mysql_error());

while($row = mysql_fetch_array($result)){
if($names == 1) {
	echo "<tr><td>";
	echo $row["num"];
	echo "</td><td>";
	echo $row["name"];
	echo "</td><td>";
	echo $row["surname"];
	echo "</td><td>";
	echo $row["matr"];
	echo "</td><td>";
	echo date("H:i", $row[time]);
	echo "</td></tr>";
} else {
	echo "<tr><td>";
	echo $row["num"];
	echo "</td><td>";
	echo "</td><td>";
	echo "</td><td>";
	echo $row["matr"];
	echo "</td><td>";
	echo date("H:i", $row[time]);
	echo "</td></tr>";

}
	
	}



?>
</table>
