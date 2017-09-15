<?

$db = new mysql_connector();
$db->connect();

if($logout == true) {
	$logout = false;
	setcookie ("user", "", time() -1);
	header("Location:index.php");

}

if(!empty($_POST["password"]) || !empty($_POST["login"])) {
	$md = md5($_POST["password"]);
	$sql = "select * from user where login='". $_POST["login"] . "' AND password ='" .$md . "';";
	$result = mysql_query($sql, $db->con) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$db->close();
	//$message = $_POST["password"] . " ; " . $md  . " ; " . $sql . "<br>";
	if(!empty($row["login"])) {
	 $message = "Sucessfully logged in";
		$Gueltigkeit = time()+ (24 * 3600);
		setcookie("user", $row["id"], $Gueltigkeit);
		header("Location:index.php?page=admin");


	} else {
	 $message = "Passwort/Username falsch";
	}



} else {

	$message = "Passwort/Username falsch";

}

?>



<form action="index.php?page=login" method="post">
<?PHP
if($_POST["submitt"]) {
echo $message;
}


?>
<table>
	<tr>
		<td>Login</td>
		<td>
			<input name="login" size="60" maxlength="50" value="<?PHP echo $_POST["login"] ?>"/>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
		 <input type="password" name="password" size="60" maxlength="50" value="<?PHP echo $_POST["password"] ?>" />
		</td>
	</tr>

	<tr>
	<input type="hidden" name="submitt" value="true">
		<td><input type="submit" value="submit" />
	</tr>

</table>
</form>

