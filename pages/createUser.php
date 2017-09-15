
<?


$db = new mysql_connector();
$db->connect();

if($_POST["action"] == "create") {






	if(!empty($_POST["login"]) && !empty($_POST["password"])) {
		$log = $_POST["login"];
		$t = $db->getDatafromTable("user","*","login='$log'");
		if (!empty($t["login"])) {
		$message = "User vorhanden!";
		} else {
			$sql = "insert Into user Values('','". $_POST["login"] ."','". md5($_POST["password"]) ."','". $_POST["fn"] ."','". $_POST["ln"] ."','". $_POST["gen"] ."','". $_POST["raum"] ."','". $_POST["shownames"] ."')";
                      ### insert INTO user VALUES('auto',Login,password,vorname,nachname,gender,raum); (es fehlt names (namen anzeigen))
			$result = mysql_query($sql, $db->con) or die(mysql_error());
			$message = "User hinzugefügt";
		}



	} else {

		$message = "Bitte Daten ausfüllen";

	}



}



?>




<form action="index.php?page=createUser" method="post">
<input type="hidden" name="action" value="create"/>

<?PHP echo $message ?>
<table>

	<tr>
		<td>login</td>
		<td>
			<input name="login" size="30" maxlength="30" value="<?PHP echo $_POST["login"] ?>"/>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
		 <input type="password" name="password" size="30" maxlength="30" value="<?PHP echo $_POST["password"] ?>" />
		</td>
	</tr>

	<tr>
		<td>Anrede</td>
		<td>
		 <input type="radio" name="gen" value="1"> Herr<br>
  		 <input type="radio" name="gen" value="0"> Frau<br>
		</td>
	</tr>



	<tr>
		<td>Vorname</td>
		<td>
			<input name="fn" size="30" maxlength="30" value="<?PHP echo $_POST["fn"] ?>"/>
		</td>
	</tr>
	<tr>
		<td>Nachname</td>
		<td>
			<input name="ln" size="30" maxlength="30" value="<?PHP echo $_POST["ln"] ?>"/>
		</td>
	</tr>

	<tr>
		<td>RaumNr</td>
		<td>
			<input name="raum" size="30" maxlength="30" value="<?PHP echo $_POST["raum"] ?>"/>
		</td>
	</tr>

	<tr>
		<td>Namen anzeigen</td>
		<td>
			<input name="shownames" size="1" maxlength="1" value="<?PHP echo $_POST["shownames"] ?>"/> 0=Nein 1=Ja
		</td>
	</tr>


	<tr>
		<td><input type="submit" value="submit" />
	</tr>

</table>
</form>
