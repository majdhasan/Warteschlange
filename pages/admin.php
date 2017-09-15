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


if($_GET["do"] == "reset1") {

                $db = new mysql_connector();

                $db->connect();

                $result=mysql_query("update config set value='100' where field='number'", $db->con) or die(mysql_error());
				$result = mysql_query("delete from queue where queue='1'") or die(mysql_error());


}
if($_GET["do"] == "reset2") {

                $db = new mysql_connector();

                $db->connect();

                $result=mysql_query("update config set value='500' where field='number2'", $db->con) or die(mysql_error());
				$result = mysql_query("delete from queue where queue='2'") or die(mysql_error());


}
if($_GET["do"] == "reset3") {

                $db = new mysql_connector();

                $db->connect();

                $result=mysql_query("update config set value='800' where field='number3'", $db->con) or die(mysql_error());
                                $result = mysql_query("delete from queue where queue='3'") or die(mysql_error());


}
if($_GET["do"] == "names") {

                $db = new mysql_connector();

                $db->connect();
				$num = $_GET["num"];
                $result=mysql_query("update user set names='$num' where id='$id'", $db->con) or die(mysql_error());
				$names = $num;

}

?>



<a href="index.php?page=admin&do=reset1">Pr&uuml;fungsb&uuml;ro Queue zur&uuml;cksetzen</a><br>
<a href="index.php?page=admin&do=reset2">Studienb&uuml;ro Queue zur&uuml;cksetzen</a><br>
<a href="index.php?page=admin&do=reset3">Promotionsb&uuml;ro Queue zur&uuml;cksetzen</a>
<br><br><br>


<a href="index.php?page=changepw">Passwort ändern</a><br>
<?
if($names == 1) {
echo "Namen werden angezeigt<br>";
echo "<a href=\"index.php?page=admin&do=names&num=2\">Namen nicht mehr anzeigen</a>";
} else {
echo "Namen werden nicht angezeigt<br>";
echo "<a href=\"index.php?page=admin&do=names&num=1\">Namen anzeigen</a>";
}
?>



