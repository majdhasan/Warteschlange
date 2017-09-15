
<table>
<tr>
<td colspan="4" width="80%" align="center">
<!-- <td colspan="4" width="100%" style="padding-left:210px"> -->
<h1 style="font-size:200%; color:red">Bitte finden Sie sich drei Nummern vor der derzeit aufgerufenen Nummer im Wartebereich 1.0104 ein.<br />Ihre Wartenummer verf&auml;llt nach Aufruf! <!-- <br /><br />  -->
<!-- <h1><font color="red" size="+2">Bitte beachten Sie, dass das Pr&uuml;fungsb&uuml;ro aufgrund des <br /> Umzugs im Zeitraum vom 23.02.2015 bis zum 06.03.2015 nicht erreichbar ist.<br /> <br /> -->
</font> 
<!-- <font color="red" size="+1">Sie k&ouml;nnen
die angezeigte Liste auch unter
<br /><font size="+1"><strong>https://verwaltung.geschkult.fu-berlin.de/line/</strong></font></font><br /><font color="red" size="+1"> abrufen und verfolgen. </font> --> </h1>
</td>
</tr>
<tr>
<!-- <td></td> 
<td style="width:40px"></td>
<th colspan="2" style="font-size: 20px;text-align:center;"> N&auml;chste Nummern </th>
 --> </tr> 
<tr >

<td valign="top">
<table width="700">

            <tbody><tr>

            <th style="font-size: 20px;">Aufgerufene Nummer</th>

            <th ></th>

            <th style="font-size: 20px;">Raum</th>

            <th style="font-size: 20px;">Bereich</th>

<!-- Audiotest -->
	 	<audio id="audio_autoplay" autoplay src="gong.mp3" type="audio/mp3">
<!-- Audiotest zu ende-->
            </tr>







<?PHP




$db = new mysql_connector();

$db->connect();



$result = mysql_query("select * from queue where timesel > 0 order by timesel asc", $db->con) or die(mysql_error());





while($row = mysql_fetch_array($result)) {



$result2 = mysql_query("select * from queuelist where id=". $row["queue"] ."", $db->con) or die(mysql_error());

$row2 = mysql_fetch_array($result2);

$result3 = mysql_query("select * from user where id=". $row["user"] ."", $db->con) or die(mysql_error());

$row3 = mysql_fetch_array($result3);

?>



            <tr>

            <td style="font-size: 50px; text-align: left;background-color: #ffffff"><? echo $row["num"]; ?></td>



            <td></td>

            <td style="font-size: 40px; text-align: left;background-color: #ffffff"><? echo $row3["room"]; ?></td>

            <td style="font-size: 40px; text-align: left;background-color: #ffffff"><? echo $row2["name"]; ?></td>

            </tr>



<?

}

?>





	        </tbody></table>
</td>
<td>
<table width="40">
<tr><td></td></tr>
</table>
</td>
<td valign="top">


<!-- <table width="200">

            <tbody><tr valign="top">

            <th style="font-size: 20px;">Pr&uuml;fungsb&uuml;ro</th>


            </tr>

            <?PHP
            $result = mysql_query("select * from queue where queue='1' and timesel = 0 order by `time` ASC LIMIT 0,8", $db->con) or die(mysql_error());
            $i = 1;
             while($row = mysql_fetch_array($result)){
			if($i<=3) {
            echo "<tr><td style=\"font-size: 40px;background-color:#98cb00;\">". $row["num"]."</td></tr>";
			$i++;
			} else {
			echo "<tr><td style=\"font-size: 40px;\">". $row["num"]."</td></tr>";
			}
            }
            ?>
  </tbody></table>

-->
</td>
<td valign="top">
<!--
<table width="200">

            <tbody><tr valign="top">

            <th style="font-size: 20px;">Studienb&uuml;ro</th>

			          <?
            $result = mysql_query("select * from queue where queue='2' and timesel = 0 order by `time` ASC LIMIT 0,8", $db->con) or die(mysql_error());
          	$i = 1;
             while($row = mysql_fetch_array($result)){
			if($i<=3) {
            echo "<tr><td style=\"font-size: 40px;background-color:#98cb00;\">". $row["num"]."</td></tr>";
			$i++;
			} else {
			echo "line";
			echo "<tr><td style=\"font-size: 40px;\">". $row["num"]."</td></tr>";
			}
            }
            ?>

            </tr>
  </tbody></table>
-->
</td>
</tr>
</table>
<table>
<tr>
<td align="center">
<br />
<h1 style="font-size:+2; color:red">Bitte beachten Sie unsere neue Anschrift Fabeckstr. 23-25!</h1>
</td>
</tr>

</table>
<hr>
<table>
<h1 align="center"><font color="grey">Sie k&ouml;nnen die angezeigte Liste auch unter <br /><font color="blue" size="+1"><strong>https://verwaltung.geschkult.fu-berlin.de/line/</strong></font><br /></font><font color="grey"> abrufen und verfolgen. </font></h1>
</table>


