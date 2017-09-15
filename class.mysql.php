<?php

/**
 */
class mysql_connector {

        var $mysqlhost = "127.0.0.1";
    var $mysqluser = "root";
    var $mysqlpwd = "M301091m";
    var $mysqldb = "warteschlange";
    var $con = "";

    function mysql_select_db()
    {
    }

    function setDB($db)
    {
        $this->mysqldb = $db;
    }

    function connect()
    {
        $this->con = mysql_connect($this->mysqlhost, $this->mysqluser, $this->mysqlpwd) or die("Verbindungsversuch fehlgeschlagen");
        mysql_select_db($this->mysqldb, $this->con) or die("Konnte die Datenbank nicht waehlen.");
    }

    function close()
    {
        mysql_close($con);
    }

    function getDatafromID($table, $id, $datastring = "*")
    {
        if (!$con) {
            $this->connect();
            $dea = "t";
        }

        $result = mysql_query("select $datastring from $table where ID = '$id'", $this->con) or die(mysql_error());;
        $row = mysql_fetch_array($result);
        if ($dea == "t") {
            $this->close();
        }
        return $row;
    }

	function getDatafromTable($table, $datastring = "*", $where = "")
	{

		if($where != "") {
			$where = "where " . $where;
		}

		$result = mysql_query("select $datastring from $table $where", $this->con) or die(mysql_error());;
        $row = mysql_fetch_array($result);

        return $row;
	}

}

?>
