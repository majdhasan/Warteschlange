<?
 $id = $_COOKIE["user"];
if(empty($id)) {
die("nicht eingeloggt");
}
$db = new mysql_connector();
$db->connect();
if($_POST["add"]) {
                $sql = "insert Into times Values('','','". $_POST["day"] ."','". $_POST["start"] ."','". $_POST["end"] ."','". $_POST["que"] ."')";
                $result = mysql_query($sql, $db->con) or die(mysql_error());
                $message = "Timeslot hinzugefügt";
} elseif($_GET["del"]) {
                if(!empty($_GET["id"])) {
                               $sql = "delete from times where id='" . $_GET["id"] . "'";
                               $result = mysql_query($sql, $db->con) or die(mysql_error());
                $message = "Timeslot gelöscht";
                } else {
                $message = "Fehler";
                }
}

 

echo $message;

?>

 

Pr&uuml;fungsb&uuml;ro

<table>

<tr>

<th width="80px">Tag</th>

<th width="80px">Start</th>

<th width="80px">Ende</th>

<th width="80px">delete</th>

</tr>

<?

$trans = array(

    'Monday'    => 'Montag',

    'Tuesday'   => 'Dienstag',

    'Wednesday' => 'Mittwoch',

    'Thursday'  => 'Donnerstag',

    'Friday'    => 'Freitag',

    'Saturday'  => 'Samstag',

    'Sunday'    => 'Sonntag',

    'Mon'       => 'Mo',

    'Tue'       => 'Di',

    'Wed'       => 'Mi',

    'Thu'       => 'Do',

    'Fri'       => 'Fr',

    'Sat'       => 'Sa',

    'Sun'       => 'So',

    'January'   => 'Januar',

    'February'  => 'Februar',

    'March'     => 'März',

    'May'       => 'Mai',

    'June'      => 'Juni',

    'July'      => 'Juli',

    'October'   => 'Oktober',

    'December'  => 'Dezember',

);

 

 

$result = mysql_query("select * from times where queue = 1", $db->con) or die(mysql_error());

 

while($row = mysql_fetch_array($result)){

 

                echo "<tr><td>";

                echo strtr($row["day"], $trans);

                echo "</td><td>";

                echo $row["start"];

                echo "</td><td>";

                echo $row["end"];

                echo "</td><td>";

                echo "<a href=\"index.php?page=times&del=true&id=". $row["id"] ."\">delete</a>";

                echo "</td></tr>";

}

 

 

 

?>

 

</table>

<br><br><br>

Studienb&uuml;ro

<table>

<tr>

<th width="80px">Tag</th>

<th width="80px">Start</th>

<th width="80px">Ende</th>

<th width="80px">delete</th>

</tr>

<?

$result = mysql_query("select * from times where queue = 2", $db->con) or die(mysql_error());

 

while($row = mysql_fetch_array($result)){

 

                echo "<tr><td>";

                echo strtr($row["day"], $trans);

                echo "</td><td>";

                echo $row["start"];

                echo "</td><td>";

                echo $row["end"];

                echo "</td><td>";

                echo "<a href=\"index.php?page=times&del=true&id=". $row["id"] ."\">delete</a>";

                echo "</td></tr>";

}

?>

</table>

<br><br><br>

Promotionsb&uuml;ro

<table>

<tr>

<th width="80px">Tag</th>

<th width="80px">Start</th>

<th width="80px">Ende</th>

<th width="80px">delete</th>

</tr>

<?

$result = mysql_query("select * from times where queue = 3", $db->con) or die(mysql_error());



while($row = mysql_fetch_array($result)){



                echo "<tr><td>";

                echo strtr($row["day"], $trans);

                echo "</td><td>";

                echo $row["start"];

                echo "</td><td>";

                echo $row["end"];

                echo "</td><td>";

                echo "<a href=\"index.php?page=times&del=true&id=". $row["id"] ."\">delete</a>";

                echo "</td></tr>";

}

?>

</table>
 




 

<form action="index.php?page=times" method="post">

<br><br>

 

 

<table>

<tr>

<th>Tag</th>

<th>Start</th>

<th>Ende</th>

<th>Bereich</th>

<th>In der Datenbank...</th>

</tr>

 

 

                <tr><td>

 

<select name="day">

<option value="Mon"   selected>Montag</option>

<option value="Tue">Dienstag</option>

<option value="Wed">Mittwoch</option>

<option value="Thu">Donnerstag</option>

<option value="Fri">Freitag</option>

<option value="Sat">Samstag</option>

</select>

 

 

 

                </td>

                <td><input type="text" size="10" name="start" value="hh:mm">

                </td>

                <td><input type="text"  size="10"  name="end" value="hh:mm">

                </td>

                <td>

 

<select name="que">

<option value="1"          selected>Pr&uuml;fungsb&uuml;ro</option>

<option value="2">Studienb&uuml;ro</option>

<option value="3">Promotionsb&uuml;ro</option> 

</select>

</td>

<td><input type="submit" value="anlegen">

                </td>

 

                </tr>

<input type="hidden" name="add" value="true">

</form>

</table>




