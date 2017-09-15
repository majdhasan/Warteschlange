<?PHP

ob_start();
// Report all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>



<?PHP
require_once("class.mysql.php");
?>



<!-- noindex -->



<? if (empty($_GET["page"])) {

?>

      <meta http-equiv="refresh" content="15" url="index.php">

      <?

      }

      ?>


      <title>

            Fachbereich Geschichts- und Kulturwissenschaften:





                  Warteschlange



      </title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



            <meta http-equiv="cache-control" content="no-cache">





            <meta http-equiv="pragma" content="no-cache">





            <meta name="robots" content="index,follow">


      <script type="text/javascript" src="files/default.js"></script>



            <link rel="stylesheet" type="text/css" media="screen" href="files/default.css">



                  <link rel="stylesheet" type="text/css" media="screen" href="files/geschkult-design-1.css">

                        <link rel="stylesheet" type="text/css" media="screen" href="files/geschkult-fb-homepage.css">


            <link rel="stylesheet" type="text/css" media="screen" href="files/default-content.css">


      <link rel="stylesheet" type="text/css" media="screen" href="files/containerRight-1.css">

      <link rel="stylesheet" type="text/css" media="print" href="files/print.css">

<!-- /noindex -->

                  </head><body>

                        <!-- Anfang wrapper -->

                        <div id="wrapper">

<div id="baseIdentity">
<h1>
Anmeldung Pr&uuml;fungs-/Studien-/Promotionsb&uuml;ro &nbsp;
</h1>
<span class="baseIdentityBild"><h1>   Fachbereich Geschichts- und Kulturwissenschaften</h1></span>

</div>


                             <!-- /noindex -->

                             <!-- Ende IdentitÃ¤tsbereich -->

                                        <div id="NaviContentWrapper">

                             <!-- noindex -->



                             <!-- Anfang Navigation links -->

                             <h2 class="info">Navigation/Men&uuml;: Links auf weitere Seiten dieser Website</h2>

                             <div id="baseNavigationContainerGeschkult">

      <ul>

        <?

		if($_COOKIE["user"] != "") {
	?>



                                         <li>

                                         <a href="index.php?page=admin">

                                         Admin

                                         </a>

                                         </li>

                                         <li>

                                         <a href="index.php?page=queue">

                                         Queue anzeigen

                                         </a>

                                         </li>

                                         <li>

                                         <a href="index.php?page=createUser">

                                         Sachbearbeiter anlegen

                                         </a>

                                          </li>

                                         <li>

                                         <a href="index.php?page=times">

                                         Sprechzeiten bearbeiten

                                         </a>

                                         </li>

					<li>

                                         <a href="index.php?page=logintimes">

                                         Anmeldezeiten bearbeiten

                                         </a>

                                         </li>

                                         <li>

                                         <a href="index.php?page=logout">

                                         logout

                                         </a>
 
                                         </li>

<?

}

?>

      </ul>

                                   <div id="baseBannerContainer">

                                   </div>

                             </div>

                             <hr class="divider">

                             <!-- /noindex -->

                             <!-- Ende Navigation links -->



                             <!-- Anfang Content -->

                             <div id="baseContent">

                                   <!-- noindex -->


<div id="baseIcons">

</div>

<hr class="divider">

	<?
switch ($_GET["page"]) {

      case "login":

            require_once("pages/login.php");

            break;

      case "admin":

            require_once("pages/admin.php");

            break;

      case "queue":

            require_once("pages/queue.php");

            break;

      case "createUser":

            require_once("pages/createUser.php");

            break;

      case "times":

            require_once("pages/times.php");

            break;

      case "logout":

            $logout = true;

            require_once("pages/login.php");

            break;

      case "entry":

            require_once("pages/entry.php");

            break;

      case "entrydebug":

            require_once("pages/entrydebug.php");

            break;


      case "changepw":

            require_once("pages/changepw.php");

            break;

      case "logintimes":

            require_once("pages/logintimes.php");

            break;

      default:

            require_once("pages/showqueue.php");

            break;

}
                  ?>

                                   <div class="clear"></div>

                             </div>

                             <!-- Ende Content -->

                                       <br class="clear">

                                       </div>



                             <hr class="divider">



                                         <!-- Anfang Footer -->

                                         <!-- noindex -->

      <div id="baseContainerFooter">

            <div class="left">

                  &copy; 2009&nbsp;

                  Fachbereich Geschichts- und Kulturwissenschaften&nbsp;&nbsp;|&nbsp;

                                   <span lang="en">Lars Rieche IT-Service und IT-Support FB GeschKult</span>


                  &nbsp;|

            </div>
                  <div class="right">

                  </div>
     </div>

                                         <!-- /noindex -->

                                         <!-- Ende Footer -->

                                         </div>

                                         <!--Ende wrapper -->

                        <!-- Anfang rechter Container -->
                             <!-- noindex -->
                             

<!-- /noindex -->
                        <!-- Ende rechter Container -->

                        <hr class="divider">

                        <!-- noindex -->
                        <!-- /noindex -->

</body></html>

<?PHP

ob_end_flush();

?>










