<?PHP

$db = new mysql_connector();

$db->connect();

$id = $_COOKIE["user"];

if(empty($id)) {

$message = "nicht eingeloggt";

} else {

                if($_GET["action"] == "change" && $_POST["op"] == $_POST["np"])    {

 

                               $pw = md5($_POST["np"]);

                               $result = mysql_query("update user set password='$pw' where id='$id'", $db->con) or die(mysql_error());

                               $message = "Passwort geändert";

                              

                } else {

                               $message = "Beide Passwörter müssen gleich sein.";

                }

 

}

echo $message;

 

?>

 

<form action="index.php?page=changepw&action=change" method="post">

<table>

 

 

                <tr>

                               <td>Passwort</td>

                               <td>

                                               <input name="op" type="password" size="30" maxlength="30" value="<?PHP echo $_POST["op"] ?>"/>

                               </td>

                </tr>

                               <tr>

                               <td>Wiederholung</td>

                               <td>

                                               <input name="np" type="password" size="30" maxlength="30" value="<?PHP echo $_POST["np"] ?>"/>

                               </td>

                </tr>

                </tr>

                               <tr>

                               <td colspan="2"><input type="submit" value="aendern"></td>

                              

                </tr>

</table>

</form>

