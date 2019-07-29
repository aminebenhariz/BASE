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
 ** Purpose: Binary download of payload and pcap format packet download
 **
 ** Input GET/POST variables
 **   - sid
 **   - cid
 **   - download: 1 - binary download of just the payload. Nothing else.
 **               2 - download pcap format based packet (for FLoP extended db)
 **               3 - download pcap format based packet (for non-FLoP)
 ********************************************************************************
 ** Authors:
 ********************************************************************************
 ** Kevin Johnson <kjohnson@secureideas.net>
 **
 ********************************************************************************
 */

include ("base_conf.php");
include ("$BASE_path/includes/base_constants.inc.php");
include ("$BASE_path/includes/base_include.inc.php");

// Check role out and redirect if needed -- Kevin
$roleneeded = 10000;
$BUser = new BaseUser();
if (($BUser->hasRole($roleneeded) == 0) && ($Use_Auth_System == 1))
{
    base_header("Location: ". $BASE_urlpath . "/index.php");
    exit();
}

$cid = ImportHTTPVar("cid", VAR_DIGIT);
$sid = ImportHTTPVar("sid", VAR_DIGIT);
$download = ImportHTTPVar("download", VAR_DIGIT);


/**********************************************************/
/* 1 = binary download of just the payload. Nothing else. */
if ($download == 1)
{
    /* Connect to the Alert database */
    $db = NewBASEDBConnection($DBlib_path, $DBtype);
    $db->baseDBConnect($db_connect_method,
        $alert_dbname, $alert_host, $alert_port, $alert_user, $alert_password);

    /* Get the Payload from the database: */
    $sql2 = "SELECT data_payload FROM data WHERE sid='".$sid."' AND cid='".$cid."'";
    $result2 = $db->baseExecute($sql2);
    $myrow2 = $result2->baseFetchRow();
    $result2->baseFreeRows();

    /* get encoding information for payload */
    /* 0 == hex, 1 == base64, 2 == ascii;	*/
    $sql3 = 'SELECT encoding FROM sensor WHERE sid='.$sid;
    $result3 = $db->baseExecute($sql3);
    $myrow3 = $result3->baseFetchRow();
    $result3->baseFreeRows();

    if ( $myrow2[0] ){
        /****** database contains hexadecimal *******************/
        if ($myrow3[0] == 0){
            header ('HTTP/1.0 200');
            header ("Content-type: application/download");
            header ("Content-Disposition: attachment; filename=payload_".$sid."-".$cid.".bin");
            header ("Content-Transfer-Encoding: binary");
            ob_start();
            $payload = str_replace("\n", "", $myrow2[0]);
            $len = strlen($payload);
            $half = ($len / 2);
            header ("Content-Length: $half");
            $counter = 0;
            for ($i = 0; $i < ( $len + 32 ); $i += 2){
                $counter++;
                if ($counter > ($len / 2)){
                    break;
                }
                $byte_hex_representation = ($payload[$i].$payload[$i+1]);
                echo chr(hexdec($byte_hex_representation));
            }
            ob_end_flush();
            // nothing should come AFTER ob_end_flush().

            /********database contains base64 *******************/
        } elseif ($myrow3[0] == 1){
            header ('HTTP/1.0 200');
            header ("Content-type: application/octet-stream");
            header ("Content-Disposition: attachment; filename=payload".$sid."-".$cid.".bin");
            header ("Content-Transfer-Encoding: binary");
            ob_start();
            $pre_payload = str_replace("\n", "", $myrow2[0]);
            $payload = base64_decode($pre_payload);
            $len = strlen($payload);
            header ("Content-Length: $len");
            $counter = 0;
            for ($i = 0; $i < ($len + 16); $i++){
                $counter++;
                if ($counter > $len) {
                    break;
                }
                $byte = $payload[$i];
                print $byte;
            }
            ob_end_flush();
            // nothing should come AFTER ob_end_flush().

            /********** database contains ASCII ***************/
        } elseif ($myrow3[0] == 2){
            header ('HTTP/1.0 200');
            header ('Content-Type: text/html');
            print "<h1> File not found:</h1>";

            print "<br>Output of binary data with storage method ASCII<br>";
            print "is NOT supported, because this method looses data<br>";
            print "So you can not definitely rebuild the binary,<br>";
            print "as one ASCII character may represent different<br>";
            print "binary values. Think of the dot, for example.<br>";

            print "<br><br><hr><i>Generated by base_payload.php</i><br>";
        } else {
            header ('HTTP/1.0 200');
            header ('Content-Type: text/html');
            print "<h1> File not found:</h1>";
            print "<br>Encoding type not implemented in base_payload.php.";
            print "<br><br><hr><i>Generated by base_payload.php</i><br>";
        }
    } else {
        header ('HTTP/1.0 200');
        header ('Content-Type: text/html');
        print "<h1> File not found:</h1>";
        print "<br>No payload data found, that could be downloaded or stored.";
        print "<br><br><hr><i>Generated by base_payload.php</i><br>";
    }

}
/**************************************************************************/
/* pcap download, for both flop-extended databases and non-flop databases */
else if ($download == 2 || $download == 3)
{
    /*
     * If we have FLoP extended database schema then we can rebuild alert
     * in pcap format which can be used to analyze it via tcpdump or
     * ethereal to use their protocol analyzing features.
     */

    /* Connect to the Alert database. */
    $db = NewBASEDBConnection($DBlib_path, $DBtype);
    $db->baseDBConnect($db_connect_method,
        $alert_dbname, $alert_host, $alert_port, $alert_user, $alert_password);


    /* Sanity check */
    if ($download == 2)
    {
        /* Check do we have pcap_header and data_header columns in data table. */
        if (!in_array("pcap_header", $db->DB->MetaColumnNames('data')) ||
            !in_array("data_header", $db->DB->MetaColumnNames('data')))
        {
            header ('HTTP/1.0 200');
            header ('Content-Type: text/html');
            print "<h1> File not found:</h1>";
            print "<br>Make sure you have FLoP extended database.";
            print "<br><br><hr><i>Generated by base_payload.php</i><br>";
            exit;
        }
    }



    /*********** Get needed data from database. **************/

    /* For FLoP-extended databases: */
    if ($download == 2)
    {
        $sql2 = "SELECT pcap_header, data_header, data_payload FROM data ";
        $sql2.= "WHERE sid='".$sid."' AND cid='".$cid."'";
    }
    /* For non-flop databases: */
    else
    {
        $sql2 = "SELECT data_payload FROM data ";
        $sql2.= "WHERE sid='".$sid."' AND cid='".$cid."'";
    }
    $result2 = $db->baseExecute($sql2);
    $myrow2 = $result2->baseFetchRow();
    $result2->baseFreeRows();

    /* Get encoding information for current sensor. */
    $sql3 = 'SELECT encoding FROM sensor WHERE sid='.$sid;
    $result3 = $db->baseExecute($sql3);
    $myrow3 = $result3->baseFetchRow();
    $result3->baseFreeRows();



    /* For flop-extended databases: IP header information is already present
       in myrow2.

       For non-flop databases we are NOT done, yet.  So, try and get the missing
       information: */
    if ($download == 3)
    {
        $ip_sql = "SELECT ip_ver, ip_hlen, ip_tos, ip_len, ip_id, ip_off, ip_flags,";
        $ip_sql.= "ip_ttl, ip_proto, ip_csum, ip_src, ip_dst FROM iphdr ";
        $ip_sql.= "WHERE sid='".$sid."' AND cid='".$cid."'";
        $ip_res = $db->baseExecute($ip_sql);
        $ip = $ip_res->baseFetchRow();
        $ip_res->baseFreeRows();

        if ($ip[8] == 1)
        {
            $l4_sql = "SELECT icmp_type, icmp_code, icmp_csum, icmp_id, icmp_seq ";
            $l4_sql.= "FROM icmphdr WHERE sid='".$sid."' AND cid='".$cid."'";
        }
        elseif ($ip[8] == 6)
        {
            $l4_sql = "SELECT tcp_sport, tcp_dport, tcp_seq, tcp_ack, tcp_off,";
            $l4_sql.= "tcp_res, tcp_flags, tcp_win, tcp_csum, tcp_urp from tcphdr ";
            $l4_sql.= "WHERE sid='".$sid."' AND cid='".$cid."'";
        }
        elseif ($ip[8] == 17)
        {
            $l4_sql = "SELECT udp_sport, udp_dport, udp_len, udp_csum FROM udphdr ";
            $l4_sql.= "WHERE sid='".$sid."' AND cid='".$cid."'";
        }

        $l4_res = $db->baseExecute($l4_sql);
        $l4 = $l4_res->baseFetchRow();
        $l4_res->baseFreeRows();

    } // if ($download == 3)


    /***********************************************************************/
    /* Now, when extracting the information from the database: Pay attention
     * to the encoding:
   *
    /* 0 == hex, 1 == base64, 2 == ascii; cf. snort-2.8.5.1/src/plugbase.h */

    /****** hexadecimal encoding *********/
    if ($myrow3[0] == 0)
    {
        /* FLoP-extended databases */
        if ($download == 2)
        {
            $pcap_header  = $myrow2[0];
            $data_header  = $myrow2[1];
            $data_payload = $myrow2[2];
        }
        /* Non-flop databases */
        else
        {
            $data_payload = $myrow2[0];
        }
    }
    /******** base64 encoding ********/
    elseif ($myrow3[0] == 1)
    {
        /* FLoP-extended databases */
        if ($download == 2)
        {
            $pcap_header  = bin2hex(base64_decode($myrow2[0]));
            $data_header  = bin2hex(base64_decode($myrow2[1]));
            $data_payload = bin2hex(base64_decode($myrow2[2]));
        }
        /* Non-flop databases */
        else
        {
            $data_payload = bin2hex(base64_decode($myrow2[0]));
        }
    }
    else
    {
        /******* database contains neither hex nor base64 encoding. *********/
        header ('HTTP/1.0 200');
        header ('Content-Type: text/html');
        print "<h1> File not found:</h1>";
        print "<br>Only HEX and BASE64 encoding types are supported, nothing else.";
        print "<br><br><hr><i>Generated by base_payload.php</i><br>";
        exit;
    }




    /*
     * From here on: pcap header, data_header and data_payload all contain data
     * in hex encoding, even if original encoding type was base64.
     */

    /* Sanity checks for FLoP-extended databases*/
    if ($download == 2)
    {
        # /usr/include/pcap.h:
        # struct pcap_pkthdr {
        #    struct timeval ts;  /* time stamp */
        #    bpf_u_int32 caplen; /* length of portion present */
        #    bpf_u_int32 len;    /* length this packet (off wire) */
        # };
        #
        # And a struct timeval has either a 32-bit or 64-bit tv_sec.
        if (strlen($pcap_header) > 48)
        {
            header ('HTTP/1.0 200');
            header ('Content-Type: text/html');
            print "<h1> File not found:</h1>";
            print "<br>Error in pcap_header, answer is too large: ".strlen($pcap_header)."!";
            print "<br><br><hr><i>Generated by base_payload.php</i><br>";
            exit;
        }
        else if (strlen($pcap_header) == 0)
        {
            header ('HTTP/1.0 200');
            header ('Content-Type: text/html');
            print "<h1> File not found:</h1>";
            print "<br>No pcap header, we can't rebuild the network packet.";
            print "<br><br><hr><i>Generated by base_payload.php</i><br>";
            exit;
        }
    } // if ($download == 2)





    /* For non-flop databases, the data_header has not been created, yet.
     * Do it now: */
    if ($download == 3)
    {
        # tack an ethernet header on there
        $data_header = "DEADCAFEBABE1122334455660800";

        # later on, all of this gets interpreted as hex, so simply
        # pull the values from the db, convert them to hex, 0-pad them
        # as necessary, and tack them together.
        $data_header.= sprintf("%02s", $ip[0] . $ip[1]); // ver&ihl
        $data_header.= sprintf("%02s", dechex($ip[2])); // tos
        $data_header.= sprintf("%04s", dechex($ip[3])); // len
        $data_header.= sprintf("%04s", dechex($ip[4])); // id
        $data_header.= sprintf("%02s", dechex($ip[5])); // flags
        $data_header.= sprintf("%02s", dechex($ip[6])); // offset
        $data_header.= sprintf("%02s", dechex($ip[7])); // ttl
        $data_header.= sprintf("%02s", dechex($ip[8])); // proto
        $data_header.= sprintf("%04s", dechex($ip[9])); // csum.

        # http://us2.php.net/manual/en/function.dechex.php#71795
        # source IP
        $chars = ($ip[10] <= 0x0fffffff) ? 1 : 0;
        $data_header.= sprintf("%02s", substr(dechex((float) $ip[10]),0,2-$chars));

        for ($i = 1; $i < 4; $i++)
            $data_header.= sprintf("%02s", substr(dechex((float) $ip[10]), $i*2-$chars, 2));

        # dest IP
        $chars = ($ip[11] <= 0x0fffffff) ? 1 : 0;
        $data_header.= sprintf("%02s", substr(dechex((float) $ip[11]),0,2-$chars));

        for ($i = 1; $i < 4; $i++)
            $data_header.= sprintf("%02s", substr(dechex((float) $ip[11]), $i*2-$chars, 2));

        if ($ip[8] == 1)
        {
            $data_header.= sprintf("%02s", dechex((float) $l4[0])); // type
            $data_header.= sprintf("%02s", dechex((float) $l4[1])); // code
            $data_header.= sprintf("%04s", dechex((float) $l4[2])); // sum
            // only echo req/rep, timestamp, info req/rep have id/seq
            if ($l4[0] == 0 || $l4[0] == 8 || ($l4[0] >= 13 && $l4[0] <= 16))
            {
                $data_header.= sprintf("%04s", dechex((float) $l4[3])); // id
                $data_header.= sprintf("%04s", dechex((float) $l4[4])); // seq
            }
        }
        elseif ($ip[8] == 6)
        {
            $data_header.= sprintf("%04s", dechex((float) $l4[0])); // source port
            $data_header.= sprintf("%04s", dechex((float) $l4[1])); // dest port
            $data_header.= sprintf("%08s", dechex((float) $l4[2])); // seq #
            $data_header.= sprintf("%08s", dechex((float) $l4[3])); // ack #
            $data_header.= sprintf("%01s", dechex((float) $l4[4])); // offset
            $data_header.= sprintf("%03s", dechex((float) $l4[6])); // flags
            $data_header.= sprintf("%04s", dechex((float) $l4[7])); // window
            $data_header.= sprintf("%04s", dechex((float) $l4[8])); // checksum
            $data_header.= sprintf("%04s", dechex((float) $l4[9])); // urg ptr

            # walk opts...
            $tcp_opt_sql = "SELECT optid, opt_code, opt_len, opt_data FROM opt ";
            $tcp_opt_sql.= "WHERE sid='".$sid."' AND cid='".$cid."' AND opt_proto=6 ORDER BY optid ASC";
            $tcp_opt_res = $db->baseExecute($tcp_opt_sql);
            $tcp_opt_data = "";


            while ($tcp_opt = $tcp_opt_res->baseFetchRow())
            {
                $tcp_opt_data .= sprintf("%02s", dechex((float) $tcp_opt[1]));

                // if opt_len == 0, its an "opt kind", and thus has no length or data
                if ($tcp_opt[2] != 0)
                {
                    $tcp_opt_data .= sprintf("%02s", dechex((float) $tcp_opt[2] + 2));
                    $tcp_opt_data .= $tcp_opt[3];
                }
            } // while ($tcp_opt = $tcp_opt_res->baseFetchRow())

            $tcp_opt_res->baseFreeRows();
            $data_header.= $tcp_opt_data;

        }
        elseif ($ip[8] == 17)
        {
            $data_header.= sprintf("%04s", dechex((float) $l4[0])); // source port
            $data_header.= sprintf("%04s", dechex((float) $l4[1])); // dest port
            $data_header.= sprintf("%04s", dechex((float) $l4[2])); // len
            $data_header.= sprintf("%04s", dechex((float) $l4[3])); // sum
        }

    } // if ($download == 3)




    /*****************************************************************/
    /* Now, begin to create the file the user wants to download: */
    header ('HTTP/1.0 200');
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=base_packet_".$sid."-".$cid.".pcap");
    header ("Content-Transfer-Encoding: binary");



    /*
     * Calculating snaplen which is length of payload plus header,
     * for HEX we have to divide by two -> two HEX characters
     * represent one binary byte.
     */

    $snaplen = (strlen($data_header) + strlen($data_payload)) / 2;
    header ("Content-length: ". 40 + $snaplen);



    /* Create pcap file header. */
    $hdr['magic'] =         pack('L', 0xa1b2c3d4);  /* unsigned long  (always 32 bit, machine byte order) */
    $hdr['version_major'] = pack('S', 2);           /* unsigned short (always 16 bit, machine byte order) */
    $hdr['version_minor'] = pack('S', 4);           /* unsigned short (always 16 bit, machine byte order) */
    $hdr['thiszone'] =      pack('I', 0);           /* signed   long  (always 32 bit, machine byte order) */
    $hdr['sigfigs'] =       pack('L', 0);           /* unsigned long  (always 32 bit, machine byte order) */
    $hdr['snaplen'] =       pack('L', $snaplen);    /* unsigned long  (always 32 bit, machine byte order) */
    $hdr['linktype'] =      pack('L', 1);           /* unsigned long  (always 32 bit, machine byte order) */


    /* Create pcap packet header. Converting hex to decimal and then to network byte order (big endian). */
    /* For FLoP-extended databases: */
    if ($download == 2)
    {
        /* tv_sec in a struct timeval is either 32 bits or 64 bits long.
         * But, as it seems, in $pcap_header it is ALWAYS 32 bits = 4 bytes long.
         * Which means that, in the way as snort stores it, 8 bytes are consumed.
         * So, offset is 0, and length is ALWAYS 8.
         * I have not checked whether this is FLoP's or snort's fault.
         */
        list(, $phdr['timeval_sec']) =  unpack('L', pack('N', hexdec(substr($pcap_header, 0, 8))));

        if (strlen($pcap_header) > 32)
        {
            /* A 64-bit tv_sec in a struct timeval are 8 bytes.  In hexadecimal form
               as snort stores it, this consumes 16 bytes */
            list(, $phdr['timeval_usec']) = unpack('L', pack('N', hexdec(substr($pcap_header, 16, 8))));
        }
        else
        {
            /* A 32-bit tv_sec in a struct timeval are 4 bytes.  In hexadecimal form
               as snort stores it, this consumes 8 bytes */
            list(, $phdr['timeval_usec']) = unpack('L', pack('N', hexdec(substr($pcap_header, 8, 8))));
        }

        list(, $phdr['caplen']) =     unpack('L', pack('N', hexdec(substr($pcap_header, (strlen($pcap_header)) - 16, 8))));
        list(, $phdr['len']) =        unpack('L', pack('N', hexdec(substr($pcap_header, strlen($pcap_header) - 8, 8))));


        if ($debug_mode > 0)
        {
            error_log("phdr[timeval_sec]  = \"" . $phdr['timeval_sec']  . "\"");
            error_log("phdr[timeval_usec] = \"" . $phdr['timeval_usec'] . "\"");
            error_log("snaplen            = $snaplen bytes.<BR>\n");
            error_log("phdr[caplen]       = \"" . $phdr['caplen'] . "\"");
            list(, $tmp['caplen_new'])    = unpack('L', pack('N', hexdec(substr($pcap_header, 32, 8))));
            error_log("phdr[caplen] new   = \"" . $tmp['caplen_new'] . "\"");
            error_log("phdr[len]          = \"" . $phdr['len']    . "\"");
            list(, $tmp['len_new'])       = unpack('L', pack('N', hexdec(substr($pcap_header, 40, 8))));
            error_log("phdr[len] new      = \"" . $tmp['len_new'] . "\"");
        }
    }
    /* For non-flop databases */
    else
    {
        $ts_sql = "SELECT timestamp FROM event ";
        $ts_sql.= "WHERE sid='".$sid."' AND cid='".$cid."'";
        $ts_res = $db->baseExecute($ts_sql);
        $ts_string = $ts_res->baseFetchRow();
        $ts_res->baseFreeRows();
        $ts = strtotime($ts_string[0]);
        list(, $phdr['timeval_sec']) =  unpack('L', pack('L', $ts));
        list(, $phdr['timeval_usec']) = unpack('L', pack('L', 0));
        list(, $phdr['caplen']) =       unpack('L', pack('L', $snaplen));
        list(, $phdr['len']) =          unpack('L', pack('L', $snaplen));
    }

    /* Copy header to packet, convert hex to dec and from dec to char. */
    $packet = "";
    for ($i = 0; $i < strlen($data_header); $i = $i + 2)
        $packet .= chr(hexdec(substr($data_header, $i, 2)));

    /* Copy payload to packet, convert hex to dec and from dec to char. */
    for ($i = 0; $i < strlen($data_payload); $i = $i + 2)
        $packet .= chr(hexdec(substr($data_payload, $i, 2)));

    ob_start();

    /* Writing pcap file header */
    foreach ($hdr as $value)
        echo $value;

    /* Writing pcap packet header */
    foreach ($phdr as $value)
        echo pack('L', $value);

    /* Writing packet */
    echo $packet;

    ob_end_flush();
    /* nothing should come after ob_end_flush(). */
}
else // else if ($download == 2 || $download == 3)
{
    header ('HTTP/1.0 200');
    header ('Content-Type: text/html');
    print "<h1> File not found:</h1>";
    print "<br>This page is only intended for downloading purposes; it has no content.";
    print "<br><br><hr><i>Generated by base_payload.php</i><br>";
} // if ($download == 1)
?>
