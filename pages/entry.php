<?
$db = new mysql_connector();
$db->connect();
if($_POST["action"] == "create") {
                if(!empty($_POST["queue"]) && !empty($_POST["fn"]) && !empty($_POST["ln"])) {
												if($_POST["queue"] == 1) {
												$result  =mysql_query("select value from config where field='number'", $db->con) or die(mysql_error());
												} elseif($_POST["queue"] == 2) {

                                               $result  =mysql_query("select value from config where field='number2'", $db->con) or die(mysql_error());
												} elseif($_POST["queue"] == 3) {

                                               $result  =mysql_query("select value from config where field='number3'", $db->con) or die(mysql_error());
												}
                                               $row = mysql_fetch_array($result);
                                               $number = $row["value"];
                                               $newnumber = $number + 1;

												if($_POST["queue"] == 1) {
												$result=mysql_query("update config set value='$newnumber' where field='number'", $db->con) or die(mysql_error());
												} elseif($_POST["queue"] == 2) {
												$result=mysql_query("update config set value='$newnumber' where field='number2'", $db->con) or die(mysql_error());
												} elseif($_POST["queue"] == 3) {
												$result=mysql_query("update config set value='$newnumber' where field='number3'", $db->con) or die(mysql_error());

												}

                               if($_POST["special"] == 1) {

                                               $newid = $_POST["queue"];

                                               $sp = 1;
                               $result2 = mysql_query("select * from queue where queue='$newid' and timesel = 0 and user2 != '1' order by `time` ASC LIMIT 1", $db->con) or die(mysql_error());

                               $row2 = mysql_fetch_array($result2);

                               if(empty($row2["time"])) {

                                               $ttime = time();
                               }else {

                                               $ttime = $row2["time"] - 1;
                               }

                               } else {

                                               $ttime = time();

                               }

                                               $sql = "insert Into queue Values('','". $number ."','". $ttime ."','". $_POST["fn"] ."','". $_POST["ln"] ."','". $_POST["matr"] ."','". $_POST["queue"] ."','','','$sp')";

                                               $result = mysql_query($sql, $db->con) or die(mysql_error());

                                               $message = "<h2>Ihre Wartenummer lautet: <font color=\"red\" size=\"+1\"><b>$number</b></font></h2><h2> Bitte achten Sie auf den Aufruf Ihrer Nummer.</h2>";

						header("refresh:10");

                } else {
                               $message = "Bitte alle Pflichtfelder (*) ausfüllen";
                }
}
?>

<h2>Sprechzeiten</h2>
<table>
<tr>
<td valign="top">
<b>Pr&uuml;fungsb&uuml;ro</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>
<?
#$tag = date("D");
#$h = date("H:i");
#$h = date("H:i",strtotime("+30 minutes"));

//Eintragungsschluss 30 min vor Ende
#$h2 = date("H:i",strtotime("+30 minutes")); #$pb = false; // $pb = true;

#$sb = false;
// $sb = true;

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
    'March'     => 'M&auml;z',
    'May'       => 'Mai',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'October'   => 'Oktober',
    'December'  => 'Dezember',
);

$result = mysql_query("select * from times where queue = 1", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
#                if($row["start"] < $h && $row["end"] > $h2 && $row["day"] == $tag)
#                {
#                              $pb = true;
#                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}
?>

</table>
</td>
<td valign="top">
<b>
Studienb&uuml;ro
</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>
<?
$result = mysql_query("select * from times where queue = 2", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
#                if($row["start"] < $h && $row["end"] > $h2 && $row["day"] == $tag)
#                {
#                               $sb = true;
#                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}
?>

</table>
</td>
<td valign="top">
<b>
Promotionsb&uuml;ro
</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>
<?
$result = mysql_query("select * from times where queue = 3", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
#                if($row["start"] < $h && $row["end"] > $h2 && $row["day"] == $tag)
#                {
#                               $sb = true;
#                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}

echo "</table>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
?>


</table>
</td></table>
<!-- Loginzeiten Anfang-->
<h2>Anmeldezeitraum</h2>
<table>
<tr>
<td valign="top">
<b>Pr&uuml;fungsb&uuml;ro</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>
<?
$tag = date("D");
$h = date("H:i");
#$h = date("H:i",strtotime("+30 minutes"));
echo $tag;
//Eintragungsschluss 30 min vor Ende
#$h2 = date("H:i",strtotime("+30 minutes")); $pb = false; // $pb = true;

$sb = false;
// $sb = true;

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
    'March'     => 'M&auml;z',
    'May'       => 'Mai',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'October'   => 'Oktober',
    'December'  => 'Dezember',
);

$result = mysql_query("select * from logintimes where queue = 1", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
                if($row["start"] < $h && $row["end"] > $h && $row["day"] == $tag)
                {
                              $pb = true;
                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}
?>

</table>
</td>
<td valign="top">
<b>
Studienb&uuml;ro
</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>

<?
$result = mysql_query("select * from logintimes where queue = 2", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
                if($row["start"] < $h && $row["end"] > $h && $row["day"] == $tag)
                {
                               $sb = true;
                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}
?>
</table>
</td>
<td valign="top">
<b>
Promotionsb&uuml;ro
</b>
<table>
<tr>
<th width="80px">Tag</th>
<th width="80px">Beginn</th>
<th width="80px">Ende</th>
</tr>

<?
$result = mysql_query("select * from logintimes where queue = 3", $db->con) or die(mysql_error()); while($row = mysql_fetch_array($result)){
                if($row["start"] < $h && $row["end"] > $h && $row["day"] == $tag)
                {
                               $rb = true;
                }
                echo "<tr><td>";
                echo strtr($row["day"], $trans);
                echo "</td><td>";
                echo $row["start"];
                echo "</td><td>";
                echo $row["end"];
                echo "</td></tr>";
}

echo "</table>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";

## Loginzeiten Ende
?>
Sie k&ouml;nnen sich <b>nur w&auml;hrend</b> der angegebenen <b>Anmeldezeitr&auml;ume </b> f&uuml; die Sprechzeiten eintragen. Ausserhalb dieser Zeit ist <b>kein</b> Eintrag m&ouml;glich.

<br><br>
<!-- Es ist
<?PHP
 echo strtr(date("l"), $trans);
 echo " ";
 echo date("H:i");
 ?> Uhr.
 <br>
 -->
<form action="index.php?page=entry" method="post"> <input type="hidden" name="action" value="create"/> <?PHP
                if(isset($number)) {
                                echo "<h2>$message</h2><br>";
                                echo "<a href=\"index.php?page=entry\"><b>N&auml;hsten Studenten eintragen</b></a>";
                } else {
                                echo $message;
                ?>
<table>
                <tr>
                               <td>Vorname*</td>
                               <td>
                                               <input name="fn" size="30" maxlength="30" value="<?PHP echo $_POST["fn"] ?>"/>
                               </td>
                </tr>
                <tr>
                               <td>Nachname*</td>
                               <td>
                                               <input name="ln" size="30" maxlength="30" value="<?PHP echo $_POST["ln"] ?>"/>
                               </td>
                </tr>
                <tr>
                               <td valign="top">Sie m&ouml;chten zum... *</td>
                               <td>
                                 <?
if($pb) {
?>
                 <input type="radio" name="queue" value="1"> Pr&uuml;fungsb&uuml;ro (Nummernvergabe beginnt bei 100)<br> <?
}
if($sb) {
?>
                 <input type="radio" name="queue" value="2"> Studienb&uuml;ro (Nummernvergabe beginnt bei 500)<br> <?
}
if($rb) {
?>
                 <input type="radio" name="queue" value="3"> Promotionsb&uuml;ro (Nummernvergabe beginnt bei 800)<br> <?
}
?>
                               </td>
                </tr>
                <tr>
                               <td valign="top">Beeintr&auml;chtigung</td>
                               <td>
<input type="checkbox" name="special" value="1"> Ja<br>
		 Diese M&ouml;glichkeit ist f&uuml;r Schwerbehinderte, Studierende in Begleitung eines kleinen Kindes oder
		schwangere Frauen gedacht. Sie werden bevorzugt bedient. Bitte haben Sie Verst&auml;ndnis f&uuml;r die Nichtbearbeitung bei Missbrauch.
		</td>
                </tr>
 <!--
                <tr>
                               <td>Matrikelnummer</td>
                               <td>
                                               <input name="matr" size="30" maxlength="30" value="<?PHP echo $_POST["matr"] ?>"/>
                               </td>
                </tr>
-->
                <tr>
<?           if($pb || $sb || $rb) { ?>
                               <td colspan="2"><input type="submit" value=" Eintragen " /> <input type="reset" value=" Eingaben l&ouml;schen "> <a href="https://verwaltung.geschkult.fu-berlin.de/line/?page=entry" target="_top"><b>Gesamte Seite neu laden</b></a></td>
<?           } ?>

                </tr>
</table>

</form>

<?

}

?>



