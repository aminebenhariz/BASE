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
 ** Purpose: Logout -- axe the cookie, redir to index.php
 ********************************************************************************
 ** Authors:
 ********************************************************************************
 ** Kevin Johnson <kjohnson@secureideas.net
 **
 ********************************************************************************
 */
include(__DIR__ . "/base_conf.php");
include_once(__DIR__ . "/base_common.php");
setcookie('BASERole', "", time()-600000);
base_header("Location: ". $BASE_urlpath . "/index.php");
?>
