<?php
/*
** Copyright (C) 2004 Kevin Johnson
** Copyright (C) 2000 Carnegie Mellon University
**
** Author: Kevin Johnson <kjohnson@secureideas.net>
** Project Leads: Kevin Johnson <kjohnson@secureideas.net>
**                Sean Muller <samwise_diver@users.sourceforge.net>
** Built upon work by Roman Danyliw <rdd@cert.org>, <roman@danyliw.com>
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
*/

/*
 * Basic Analysis and Security Engine (BASE) by Kevin Johnson
 * based upon Analysis Console for Incident Databases (ACID) by Roman Danyliw
 *
 * See http://sourceforge.net/projects/secureideas for the most up to date
 * information and documentation about this application.
 *
 * Purpose:
 *
 *   BASE is an PHP-based analysis engine to search and process
 *   a database of security incidents generated by the NIDS Snort.
 *
 * Configuration:
 *
 *   See the 'docs/README' file, and 'base_conf.php'
 *
 */

$start = time();
require("base_conf.php");
include_once("$BASE_path/includes/base_auth.inc.php");
include_once("$BASE_path/includes/base_db.inc.php");
include_once("$BASE_path/includes/base_output_html.inc.php");
include_once("$BASE_path/base_common.php");
include_once("$BASE_path/base_db_common.php");
include_once("$BASE_path/includes/base_cache.inc.php");
include_once("$BASE_path/includes/base_state_criteria.inc.php");
include_once("$BASE_path/includes/base_log_error.inc.php");
include_once("$BASE_path/includes/base_log_timing.inc.php");

RegisterGlobalState();

/* Initialize the history */
$_SESSION = NULL;
InitArray($_SESSION['back_list'], 1, 3, "");
$_SESSION['back_list_cnt'] = 0;

PushHistory();

// Check role out and redirect if needed -- Kevin
$roleneeded = 10000;
$BUser = new BaseUser();
//if (($Use_Auth_System == 1) && ($BUser->hasRole($roleneeded) == 0))
if ($Use_Auth_System == 1)
{
    if ($BUser->hasRole($roleneeded) == 0)
        base_header("Location: $BASE_urlpath/index.php");
}

// Set cookie to use the correct db.
if (isset($_GET['archive']))
{
    "no" == $_GET['archive'] ? $value = 0 : $value = 1;
    setcookie('archive', $value);
    base_header("Location: $BASE_urlpath/base_main.php");
}

function DBLink()
{
    // generate the link to select the other database....
    GLOBAL $archive_exists;

    if ( (isset($_COOKIE['archive']) && $_COOKIE['archive'] == 1) || (isset($_GET['archive']) && $_GET['archive'] == 1)) {
        echo '<a href="base_main.php?archive=no">' . _USEALERTDB . '</a>';
    } elseif ($archive_exists != 0) {
        echo ('<a href="base_main.php?archive=1">' . _USEARCHIDB . '</a>');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- <?php echo _TITLE . $BASE_VERSION; ?> -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo _CHARSET; ?>">
    <meta http-equiv="pragma" content="no-cache">
    <?php
    PrintFreshPage($refresh_stat_page, $stat_page_refresh_time);
    $archiveDisplay = (isset($_COOKIE['archive']) && $_COOKIE['archive'] == 1) ? "-- ARCHIVE" : "";
    echo ('<title>' . _TITLE . $BASE_VERSION . $archiveDisplay . '</title>
<link rel="stylesheet" type="text/css" href="styles/' . $base_style . '">');
    ?>
</head>
<body>
<div class="mainheadertitle">&nbsp;<?php echo _TITLE . $archiveDisplay; ?></div>
<?php
if ($debug_mode == 1) {
    PrintPageHeader();
}

/* Check that PHP was built correctly */
$tmp_str = verify_php_build($DBtype);
if ($tmp_str != "") {
    echo $tmp_str;
    die();
}

/* Connect to the Alert database */
$db = NewBASEDBConnection($DBlib_path, $DBtype);
$db->baseDBConnect($db_connect_method, $alert_dbname, $alert_host, $alert_port, $alert_user, $alert_password);

/* Check that the DB schema is recent */
$tmp_str = verify_db($db, $alert_dbname, $alert_host);
if ($tmp_str != "") {
    echo $tmp_str;
    die();
}
?>
<table width="100%" style="border:0;padding:0">
    <tr>
        <td align="left" rowspan="2">
            <?php
            // Various things for the snapshot functiuonality on the first page.... Kevin
            $tmp_month = date("m");
            $tmp_day = date("d");
            $tmp_year = date("Y");
            $today = '&amp;time%5B0%5D%5B0%5D=+&amp;time%5B0%5D%5B1%5D=%3E%3D'.
                '&amp;time%5B0%5D%5B2%5D='.$tmp_month.
                '&amp;time%5B0%5D%5B3%5D='.$tmp_day.
                '&amp;time%5B0%5D%5B4%5D='.$tmp_year.
                '&amp;time%5B0%5D%5B5%5D=&amp;time%5B0%5D%5B6%5D=&amp;time%5B0%5D%5B7%5D='.
                '&amp;time%5B0%5D%5B8%5D=+&amp;time%5B0%5D%5B9%5D=+';
            $yesterday_year = date("Y", time() - 86400);
            $yesterday_month = date("m", time() - 86400);
            $yesterday_day = date ("d", time() - 86400);
            $yesterday_hour = date ("H", time() - 86400);
            $yesterday =  '&amp;time%5B0%5D%5B0%5D=+&amp;time%5B0%5D%5B1%5D=%3E%3D'.
                '&amp;time%5B0%5D%5B2%5D='.$yesterday_month.
                '&amp;time%5B0%5D%5B3%5D='.$yesterday_day.
                '&amp;time%5B0%5D%5B4%5D='.$yesterday_year.
                '&amp;time%5B0%5D%5B5%5D='.$yesterday_hour.
                '&amp;time%5B0%5D%5B6%5D=&amp;time%5B0%5D%5B7%5D='.
                '&amp;time%5B0%5D%5B8%5D=+&amp;time%5B0%5D%5B9%5D=+';
            $last72_year  = date("Y", time()-86400 * 3);
            $last72_month = date("m", time()-86400 * 3);
            $last72_day   = date ("d", time()-86400 * 3);
            $last72_hour  = date ("H", time()-86400 * 3);
            $last72 = '&amp;time%5B0%5D%5B0%5D=+&amp;time%5B0%5D%5B1%5D=%3E%3D'.
                '&amp;time%5B0%5D%5B2%5D='.$last72_month.
                '&amp;time%5B0%5D%5B3%5D='.$last72_day.
                '&amp;time%5B0%5D%5B4%5D='.$last72_year.
                '&amp;time%5B0%5D%5B5%5D='.$last72_hour.
                '&amp;time%5B0%5D%5B6%5D=&amp;time%5B0%5D%5B7%5D='.
                '&amp;time%5B0%5D%5B8%5D=+&amp;time%5B0%5D%5B9%5D=+';
            $tmp_24hour        = 'base_qry_main.php?new=1'.$yesterday.'&amp;submit='._QUERYDBP.'&amp;num_result_rows=-1&amp;time_cnt=1';
            $tmp_24hour_unique = 'base_stat_alerts.php?time_cnt=1'.$yesterday;
            $tmp_24hour_sip    = 'base_stat_uaddr.php?addr_type=1&amp;sort_order=occur_d&amp;time_cnt=1'.$yesterday;
            $tmp_24hour_dip    = 'base_stat_uaddr.php?addr_type=2&amp;sort_order=occur_d&amp;time_cnt=1'.$yesterday;
            $tmp_72hour        = 'base_qry_main.php?new=1'.$last72.'&amp;submit='._QUERYDBP.'&amp;num_result_rows=-1&amp;time_cnt=1';
            $tmp_72hour_unique = 'base_stat_alerts.php?time_cnt=1'.$last72;
            $tmp_72hour_sip    = 'base_stat_uaddr.php?addr_type=1&amp;sort_order=occur_d&amp;time_cnt=1'.$last72;
            $tmp_72hour_dip    = 'base_stat_uaddr.php?addr_type=2&amp;sort_order=occur_d&amp;time_cnt=1'.$last72;
            $tmp_today         = 'base_qry_main.php?new=1'.$today.'&amp;submit='._QUERYDBP.'&amp;num_result_rows=-1&amp;time_cnt=1';
            $tmp_today_unique  = 'base_stat_alerts.php?time_cnt=1'.$today;
            $tmp_sip           = 'base_stat_uaddr.php?addr_type=1&amp;sort_order=occur_d&amp;time_cnt=1'.$today;
            $tmp_dip           = 'base_stat_uaddr.php?addr_type=2&amp;sort_order=occur_d&amp;time_cnt=1'.$today;
            echo '
          <div class="stats">
            <table width="100%" class="systemstats">
              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '. _TALERTS .'</td>
	            <td><a href="'.$tmp_today_unique.'">'. _UNI .'</a></td>
	            <td><a href="'.$tmp_today.'">'. _LISTING .'</a></td>
	            <td><a href="'.$tmp_sip.'">'._SOURCEIP.'</a></td>
	            <td><a href="'.$tmp_dip.'">'._DESTIP.'</a></td>
	          </tr>

              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '. _L24ALERTS .'</td>
	            <td><A href="'.$tmp_24hour_unique.'">'. _UNI .'</a></td>
	            <td><A href="'.$tmp_24hour.'">'. _LISTING .'</a></td>
	            <td><A href="'.$tmp_24hour_sip.'">'._SOURCEIP.'</a></td>
	            <td><A href="'.$tmp_24hour_dip.'">'._DESTIP.'</a></td>
	          </tr>

              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '. _L72ALERTS .'</td>
	            <td><a href="'.$tmp_72hour_unique.'">'._UNI.'</a></td>
	            <td><a href="'.$tmp_72hour.'">'. _LISTING .'</a></td>
	            <td><a href="'.$tmp_72hour_sip.'">'._SOURCEIP.'</a></td>
	            <td><a href="'.$tmp_72hour_dip.'">'._DESTIP.'</a></td>
	          </tr>

	          <tr class="main_quick_surf">
	            <td style="text-align:left;">- ' . _MOSTRECENT . $last_num_alerts . _ALERTS .'</td>
	            <td><a href="base_qry_main.php?new=1&amp;caller=last_any&amp;num_result_rows=-1&amp;submit=Last%20Any">' . _ANYPROTO . '</a></td>
	            <td><a href="base_qry_main.php?new=1&amp;layer4=TCP&amp;caller=last_tcp&amp;num_result_rows=-1&amp;submit=Last%20TCP">TCP</a></td>
	            <td><a href="base_qry_main.php?new=1&amp;layer4=UDP&amp;caller=last_udp&amp;num_result_rows=-1&amp;submit=Last%20UDP">UDP</a></td>
	            <td><a href="base_qry_main.php?new=1&amp;layer4=ICMP&amp;caller=last_icmp&amp;num_result_rows=-1&amp;submit=Last%20ICMP">ICMP</a></td>
	          </tr>

              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '._LSOURCEPORTS.'</td>
	            <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=1&amp;proto=-1&amp;sort_order=last_d">'._ANYPROTO.'</a></td>
                <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=1&amp;proto=6&amp;sort_order=last_d">TCP</a></td>
                <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=1&amp;proto=17&amp;sort_order=last_d">UDP</a></td>
	          </tr>
      
              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '._LDESTPORTS.'
                <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=2&amp;proto=-1&amp;sort_order=last_d">'._ANYPROTO.'</a></td>
                <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=2&amp;proto=6&amp;sort_order=last_d">TCP</a></td>
                <td><a href="base_stat_ports.php?caller=last_ports&amp;port_type=2&amp;proto=17&amp;sort_order=last_d">UDP</a></td>
              </tr>

              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '._FREGSOURCEP.'</td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=1&amp;proto=-1&amp;sort_order=occur_d">'._ANYPROTO.'</a></td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=1&amp;proto=6&amp;sort_order=occur_d">TCP</a></td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=1&amp;proto=17&amp;sort_order=occur_d">UDP</a></td>
	          </tr>
      
              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '._FREGDESTP.'</td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=2&amp;proto=-1&amp;sort_order=occur_d">'._ANYPROTO.'</a></td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=2&amp;proto=6&amp;sort_order=occur_d">TCP</a></td>
	            <td><a href="base_stat_ports.php?caller=most_frequent&amp;port_type=2&amp;proto=17&amp;sort_order=occur_d">UDP</a></td>
	          </tr>

              <tr class="main_quick_surf">
	            <td style="text-align:left;">- '._MOSTFREQUENT . $freq_num_uaddr . " " ._ADDRESSES.":".'</td>
                <td><a href="base_stat_uaddr.php?caller=most_frequent&amp;addr_type=1&amp;sort_order=occur_d">'._SOURCE.'</a></td>
                <td><a href="base_stat_uaddr.php?caller=most_frequent&amp;addr_type=2&amp;sort_order=occur_d">'._DEST.'</a></td>
	          </tr>

              <tr class="main_quick_surf_2">
	            <td colspan=2>- <a href="base_stat_alerts.php?caller=last_alerts&amp;sort_order=last_d">'._MOSTRECENT.$last_num_ualerts._UNIALERTS.'</a></td>
	          </tr>

	          <tr class="main_quick_surf_2">
	            <td colspan=2>- <a href="base_stat_alerts.php?caller=most_frequent&amp;sort_order=occur_d">'._MOSTFREQUENT . $freq_num_alerts . " " ._UNIALERTS.'</a></td>
	          </tr>
	        </table>
          </div>
    </td>
    <td align="right" valign="top">
      <div class="systemstats">';
            if ($event_cache_auto_update == 1) {
                UpdateAlertCache($db);
            }

            if (!setlocale(LC_TIME, _LOCALESTR1)) {
                if (!setlocale (LC_TIME, _LOCALESTR2)) {
                    setlocale (LC_TIME, _LOCALESTR3);
                }

                printf("<strong>"._QUERIED." </strong> : %s<br />" , strftime(_STRFTIMEFORMAT));
                if (isset($_COOKIE['archive']) && $_COOKIE['archive'] == 1) {
                    printf("<strong>"._DATABASE."</strong> %s &nbsp;&nbsp;&nbsp;(<strong>"._SCHEMAV."</strong> %d) \n<br />\n",
                        ($archive_dbname.'@'.$archive_host. ($archive_port != "" ? ':'.$archive_port : "") ),
                        $db->baseGetDBversion()
                    );
                } else {
                    printf("<strong>"._DATABASE."</strong> %s &nbsp;&nbsp;&nbsp;(<strong>"._SCHEMAV."</strong> %d) \n<br />\n",
                        ( $alert_dbname.'@'.$alert_host. ($alert_port != "" ? ':'.$alert_port : "") ),
                        $db->baseGetDBversion()
                    );
                }

                StartStopTime($start_time, $end_time, $db);
                if ($start_time != "") {
                    printf("<strong>"._TIMEWIN."</strong> [%s] - [%s]\n", $start_time, $end_time);
                } else {
                    printf("<strong>"._TIMEWIN."</strong> <em>"._NOALERTSDETECT."</em>\n");
                }
            }
            ?>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top">
            <strong><a href="base_qry_main.php?new=1"><?php echo _SEARCH; ?></a></strong><br />
            <strong><a href="base_graph_main.php"><?php echo _GALERTD; ?></a></strong><br />
            <a href="base_stat_time.php"><?php echo _GALERTDT; ?></a><br /><br />
            <?php DBLink(); ?>
        </td>
    </tr>
</table>

<hr />
<table style='border:0' width='100%'>
    <tr>
        <td width='30%' valign='top'>
            <?php
            /* mstone 20050309 avoid count(*) if requested */
            PrintGeneralStats($db, 0, $main_page_detail, "", "", $avoid_counts != 1);

            /* mstone 20050309 make show_stats even leaner! */
            if ($main_page_detail == 1) {
                echo '
    </td>
    <td width="70%" valign="top">
    <strong>'._TRAFFICPROBPRO.'</strong>';
                PrintProtocolProfileGraphs($db);
            }
            ?>
        </td>
    </tr>
</table>

<p>
<hr />
<?php
include("$BASE_path/base_footer.php");
if (strlen($base_custom_footer) != 0) {
    include($base_custom_footer);
}

$stop = time();
if ($debug_time_mode > 0) {
    echo "<div class='systemdebug'>[" . _LOADEDIN . "&nbsp;" .($stop - $start)." seconds]</div>";
}
?>
</body>
</html>
