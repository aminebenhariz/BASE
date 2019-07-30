<?php
/*******************************************************************************
 ** Basic Analysis and Security Engine (BASE)
 ** Copyright (C) 2004 BASE Project Team
 ** Copyright (C) 2000 Carnegie Mellon University
 **
 ** (see the file 'base_main.php' for license details)
 **
 ** Project Leads: Kevin Johnson <kjohnson@secureideas.net>
 **                Sean Muller <samwise_diver@users.sourceforge.net>
 ** Built upon work by Roman Danyliw <rdd@cert.org>, <roman@danyliw.com>
 **
 ** Purpose: Create the Database schema
 ********************************************************************************
 ** Authors:
 ********************************************************************************
 ** Kevin Johnson <kjohnson@secureideas.net
 **
 ********************************************************************************
 */

include(__DIR__ . "/base_conf.php");
include(__DIR__ . "/includes/base_constants.inc.php");
include(__DIR__ . "/includes/base_include.inc.php");
include_once(__DIR__ . "/base_db_common.php");
include_once(__DIR__ . "/base_common.php");
include_once(__DIR__ . "/setup/setup_db.inc.php");

$et = new EventTiming($debug_time_mode);

$page_title = "DB Setup";
PrintBASESubHeader($page_title, $page_title, _BACK, 1);
?>

<FORM METHOD="POST" ACTION="base_db_setup.php">

    <?php
    $submit = ImportHTTPVar("submit", VAR_ALPHA | VAR_SPACE);

    /* Connect to the Alert database */
    $db = NewBASEDBConnection($DBlib_path, $DBtype);
    $db->baseDBConnect($db_connect_method,
        $alert_dbname, $alert_host, $alert_port, $alert_user, $alert_password);

    if ( $submit == "Create BASE AG" ) {
        $result = CreateBASEAG($db);
        echo '<HR><P>';
    }

    echo '
  <TABLE WIDTH="100%">
     <TR><TD CLASS="plfieldhdr">Operation</TD>
         <TD CLASS="plfieldhdr">Description</TD>
         <TD CLASS="plfieldhdr">Status</TD>
     </TR>
     <TR><TD VALIGN=TOP><B>BASE tables</B></TD>
         <TD VALIGN=TOP>Adds tables to extend the Snort DB to support the BASE functionality</TD>
         <TD VALIGN=TOP>';

    if ($result == 1)
        ErrorMessage("&nbsp;DONE&nbsp;");
    else
        echo '<INPUT TYPE="submit" NAME="submit" VALUE="Create BASE AG">';

    echo '
  </TABLE>';

    if ($result == 1)
        echo '<P>
           The underlying Alert DB is configured for usage with BASE.
           <P>
           <B>Additional DB permissions</B><BR>
           In order to support Alert purging (the selective ability to permanently delete
           alerts from the database) and DNS/whois lookup caching, 
           the DB user "'.$alert_user.'" must have the DELETE and UPDATE privilege
           on the database "'.$alert_dbname.'@'.$alert_host.'" 
           <P>
           Goto the <A HREF="base_main.php">Main page</A> to use the application.';

    echo "\n</FORM>\n";

    PrintBASESubFooter();

    $et->PrintTiming();
    echo "</body>\r\n\</html>";
    ?>
