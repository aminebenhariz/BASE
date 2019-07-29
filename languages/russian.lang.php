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
 ** Purpose: Russian language file
 **      To translate into another language, copy this file and
 **          translate each variable into your chosen language.
 **          Leave any variable not translated so that the system will have
 **          something to display.
 ********************************************************************************
 ** Authors:
 ********************************************************************************
 ** Kevin Johnson <kjohnson@secureideas.net>
 ** Joel Esler <joelesler@users.sourceforge.net>
 ** Russian translation by: Dmitry Purgin <dpurgin@hotmail.kz>
 ** Ðóññêèé ïåðåâîä: Äìèòðèé Ïóðãèí <dpurgin@hotmail.kz>
 ********************************************************************************
 */

//locale
DEFINE('_LOCALESTR1', 'eng_ENG.ISO8859-1'); //NEW
DEFINE('_LOCALESTR2', 'eng_ENG.utf-8'); //NEW
DEFINE('_LOCALESTR3', 'english'); //NEW
DEFINE('_STRFTIMEFORMAT','%a %B %d, %Y %H:%M:%S'); //NEW - see strftime() sintax

// îñíîâíûå ôðàçû
DEFINE('_CHARSET','windows-1251');
DEFINE('_TITLE','Áàçîâûé äâèæîê àíàëèçà è áåçîïàñíîñòè (BASE) '.$BASE_installID);
DEFINE('_FRMLOGIN','Ëîãèí:');
DEFINE('_FRMPWD','Ïàðîëü:');
DEFINE('_SOURCE','Èñòî÷íèê');
DEFINE('_SOURCENAME','Èìÿ èñòî÷íèêà');
DEFINE('_DEST','Íàçíà÷åíèå');
DEFINE('_DESTNAME','Èìÿ íàçíà÷åíèÿ');
DEFINE('_SORD','Èñòî÷íèê èëè íàçíà÷åíèå');
DEFINE('_EDIT','Ðåäàêòèðîâàòü');
DEFINE('_DELETE','Óäàëèòü');
DEFINE('_ID','ID');
DEFINE('_NAME','Èìÿ');
DEFINE('_INTERFACE','Èíòåðôåéñ');
DEFINE('_FILTER','Ôèëüòð');
DEFINE('_DESC','Îïèñàíèå');
DEFINE('_LOGIN','Ëîãèí');
DEFINE('_ROLEID','ID ðîëè');
DEFINE('_ENABLED','Âêëþ÷åíî');
DEFINE('_SUCCESS','Óñïåøíî');
DEFINE('_SENSOR','Ñåíñîð');
DEFINE('_SENSORS','Sensors'); //NEW
DEFINE('_SIGNATURE','Ñèãíàòóðà');
DEFINE('_TIMESTAMP','Âðåìÿ');
DEFINE('_NBSOURCEADDR','Àäðåñ&nbsp;èñòî÷íèêà');
DEFINE('_NBDESTADDR','Àäðåñ&nbsp;íàçíà÷åíèÿ');
DEFINE('_NBLAYER4','Ñëîé&nbsp;äëÿ&nbsp;ïðîòî');
DEFINE('_PRIORITY','Ïðèîðèòåò');
DEFINE('_EVENTTYPE','òèï ñîáûòèÿ');
DEFINE('_JANUARY','ßíâàðü');
DEFINE('_FEBRUARY','Ôåâðàëü');
DEFINE('_MARCH','Ìàðò');
DEFINE('_APRIL','Àïðåëü');
DEFINE('_MAY','Ìàé');
DEFINE('_JUNE','Èþíü');
DEFINE('_JULY','Èþëü');
DEFINE('_AUGUST','Àâãóñò');
DEFINE('_SEPTEMBER','Ñåíòÿáðü');
DEFINE('_OCTOBER','Îêòÿáðü');
DEFINE('_NOVEMBER','Íîÿáðü');
DEFINE('_DECEMBER','Äåêàáðü');
DEFINE('_LAST','Ïîñëåäíèé');
DEFINE('_FIRST','First'); //NEW
DEFINE('_TOTAL','Total'); //NEW
DEFINE('_ALERT','Ïðåäóïðåæäåíèÿ');
DEFINE('_ADDRESS','Àäðåñ');
DEFINE('_UNKNOWN','íåèçâåñòíî');
DEFINE('_AND','AND'); //NEW
DEFINE('_OR','OR'); //NEW
DEFINE('_IS','is'); //NEW
DEFINE('_ON','on'); //NEW
DEFINE('_IN','in'); //NEW
DEFINE('_ANY','any'); //NEW
DEFINE('_NONE','none'); //NEW
DEFINE('_HOUR','Hour'); //NEW
DEFINE('_DAY','Day'); //NEW
DEFINE('_MONTH','Month'); //NEW
DEFINE('_YEAR','Year'); //NEW
DEFINE('_ALERTGROUP','Alert Group'); //NEW
DEFINE('_ALERTTIME','Alert Time'); //NEW
DEFINE('_CONTAINS','contains'); //NEW
DEFINE('_DOESNTCONTAIN','does not contain'); //NEW
DEFINE('_SOURCEPORT','source port'); //NEW
DEFINE('_DESTPORT','dest port'); //NEW
DEFINE('_HAS','has'); //NEW
DEFINE('_HASNOT','has not'); //NEW
DEFINE('_PORT','Port'); //NEW
DEFINE('_FLAGS','Flags'); //NEW
DEFINE('_MISC','Misc'); //NEW
DEFINE('_BACK','Back'); //NEW
DEFINE('_DISPYEAR','{ year }'); //NEW
DEFINE('_DISPMONTH','{ month }'); //NEW
DEFINE('_DISPHOUR','{ hour }'); //NEW
DEFINE('_DISPDAY','{ day }'); //NEW
DEFINE('_DISPTIME','{ time }'); //NEW
DEFINE('_ADDADDRESS','ADD Addr'); //NEW
DEFINE('_ADDIPFIELD','ADD IP Field'); //NEW
DEFINE('_ADDTIME','ADD TIME'); //NEW
DEFINE('_ADDTCPPORT','ADD TCP Port'); //NEW
DEFINE('_ADDTCPFIELD','ADD TCP Field'); //NEW
DEFINE('_ADDUDPPORT','ADD UDP Port'); //NEW
DEFINE('_ADDUDPFIELD','ADD UDP Field'); //NEW
DEFINE('_ADDICMPFIELD','ADD ICMP Field'); //NEW
DEFINE('_ADDPAYLOAD','ADD Payload'); //NEW
DEFINE('_MOSTFREQALERTS','Most Frequent Alerts'); //NEW
DEFINE('_MOSTFREQPORTS','Most Frequent Ports'); //NEW
DEFINE('_MOSTFREQADDRS','Most Frequent IP addresses'); //NEW
DEFINE('_LASTALERTS','Last Alerts'); //NEW
DEFINE('_LASTPORTS','Last Ports'); //NEW
DEFINE('_LASTTCP','Last TCP Alerts'); //NEW
DEFINE('_LASTUDP','Last UDP Alerts'); //NEW
DEFINE('_LASTICMP','Last ICMP Alerts'); //NEW
DEFINE('_QUERYDB','Query DB'); //NEW
DEFINE('_QUERYDBP','Query+DB'); //NEW - Equals to _QUERYDB where spaces are '+'s.
//Should be something like: DEFINE('_QUERYDBP',str_replace(" ", "+", _QUERYDB));
DEFINE('_SELECTED','Selected'); //NEW
DEFINE('_ALLONSCREEN','ALL on Screen'); //NEW
DEFINE('_ENTIREQUERY','Entire Query'); //NEW
DEFINE('_OPTIONS','Options'); //NEW
DEFINE('_LENGTH','length'); //NEW
DEFINE('_CODE','code'); //NEW
DEFINE('_DATA','data'); //NEW
DEFINE('_TYPE','type'); //NEW
DEFINE('_NEXT','Next'); //NEW
DEFINE('_PREVIOUS','Previous'); //NEW

//ïóíêòû ìåíþ
DEFINE('_HOME','Äîìîé');
DEFINE('_SEARCH','Ïîèñê');
DEFINE('_AGMAINT','Ïîääåðæêà Ãðóïï Ïðåäóïðåæäåíèé');
DEFINE('_USERPREF','Óñòàíîâêè ïîëüçîâàòåëÿ');
DEFINE('_CACHE','Êýø è Ñòàòóñ');
DEFINE('_ADMIN','Àäìèíèñòðèðîâàíèå');
DEFINE('_GALERTD','Ãðàôèê äàííûõ ïðåäóïðåæäåíèé');
DEFINE('_GALERTDT','Ãðàôèê âðåìåíè îïðåäåëåíèÿ ïðåäóïðåæäåíèé');
DEFINE('_USERMAN','Óïðàâëåíèå ïîëüçîâàòåëÿìè');
DEFINE('_LISTU','Ñïèñîê ïîëüçîâàòåëåé');
DEFINE('_CREATEU','Ñîçäàòü ïîëüçîâàòåëÿ');
DEFINE('_ROLEMAN','Óïðàâëåíèå ðîëÿìè');
DEFINE('_LISTR','Ñïèñîê ðîëåé');
DEFINE('_CREATER','Ñîçäàòü ðîëü');
DEFINE('_LISTALL','Âåñü ñïèñîê');
DEFINE('_CREATE','Ñîçäàòü');
DEFINE('_VIEW','Ïðîñìîòðåòü');
DEFINE('_CLEAR','Î÷èñòèòü');
DEFINE('_LISTGROUPS','Ñïèñîê ãðóïï');
DEFINE('_CREATEGROUPS','Ñîçäàòü ãðóïïó');
DEFINE('_VIEWGROUPS','Ïðîñìîòðåòü ãðóïïó');
DEFINE('_EDITGROUPS','Ðåäàêòèðîâàòü ãðóïïó');
DEFINE('_DELETEGROUPS','Óäàëèòü ãðóïïó');
DEFINE('_CLEARGROUPS','Î÷èñòèòü ãðóïïó');
DEFINE('_CHNGPWD','Ïîìåíÿòü ïàðîëü');
DEFINE('_DISPLAYU','Ïîêàçàòü ïîëüçîâàòåëÿ');

//base_footer.php
DEFINE('_FOOTER','( by <A class="largemenuitem" href="mailto:base@secureideas.net">Êåâèí Äæîíñîí (Kevin Johnson)</A> è êîììàíäà ïðîåêòà <A class="largemenuitem" href="http://sourceforge.net/project/memberlist.php?group_id=103348">BASE</A><BR>Îñíîâàíî íà ACID Ðîìàíà Äàíûëèâà (Roman Danyliw)');

//index.php --ñòðàíèöà âõîäà â ñèñòåìó
DEFINE('_LOGINERROR','Ïîëüçîâàòåëü íå ñóùåñòâóåò èëè Âàø ïàðîëü íåâåðíûé!<br>Ïîæàëóéñòà, ïîïûòàéòåñü åùå ðàç');

// base_main.php
DEFINE('_MOSTRECENT','Ñàìûå ïîñëåäíèå ');
DEFINE('_MOSTFREQUENT','Ñàìûå ÷àñòûå ');
DEFINE('_ALERTS',' Ïðåäóïðåæäåíèÿ:');
DEFINE('_ADDRESSES',' Àäðåñà');
DEFINE('_ANYPROTO','ëþáîé ïðîòîêîë');
DEFINE('_UNI','óíèêàëüíûé');
DEFINE('_LISTING','ëèñòèíã');
DEFINE('_TALERTS','Ñåãîäíÿøíèå ïðåäóïðåæäåíèÿ: ');
DEFINE('_SOURCEIP','Source IP'); //NEW
DEFINE('_DESTIP','Destination IP'); //NEW
DEFINE('_L24ALERTS','Ïðåäóïðåæäåíèÿ çà ïîñëåäíèå 24 ÷àñà: ');
DEFINE('_L72ALERTS','Ïðåäóïðåæäåíèÿ çà ïîñëåäíèå 72 ÷àñà: ');
DEFINE('_UNIALERTS',' Óíèêàëüíûå ïðåäóïðåæäåíèÿ');
DEFINE('_LSOURCEPORTS','Ïîñëåäíèå ïîðòû-èñòî÷íèêè: ');
DEFINE('_LDESTPORTS','Ïîñëåäíèå ïîðòû-íàçíà÷åíèÿ: ');
DEFINE('_FREGSOURCEP','Ñàìûå ÷àñòûå ïîðòû-èñòî÷íèêè: ');
DEFINE('_FREGDESTP','Ñàìûå ÷àñòûå ïîðòû-íàçíà÷åíèÿ: ');
DEFINE('_QUERIED','Çàïðîñ ïî');
DEFINE('_DATABASE','Áàçà äàííûõ:');
DEFINE('_SCHEMAV','Âåðñèÿ ñõåìû:');
DEFINE('_TIMEWIN','Âðåìåííîå îêíî:');
DEFINE('_NOALERTSDETECT','ïðåäóïðåæäåíèé íåò');
DEFINE('_USEALERTDB','Use Alert Database'); //NEW
DEFINE('_USEARCHIDB','Use Archive Database'); //NEW
DEFINE('_TRAFFICPROBPRO','Traffic Profile by Protocol'); //NEW

//base_auth.inc.php
DEFINE('_ADDEDSF','Óñïåøíî äîáàâëåíî');
DEFINE('_NOPWDCHANGE','Íåâîçìîæíî ïîìåíÿòü ïàðîëü: ');
DEFINE('_NOUSER','Ïîëüçîâàòåëü íå ñóùåòñâóåò!');
DEFINE('_OLDPWD','Ñòàðûé ââåäåííûé ïàðîëü íå ñîîòâåòñòâóåò íàøèì çàïèñÿì!');
DEFINE('_PWDCANT','Íåâîçìîæíî ïîìåíÿòü Âàø ïàðîëü: ');
DEFINE('_PWDDONE','Âàø ïàðîëü èçìåíåí!');
DEFINE('_ROLEEXIST','Ðîëü óæå ñóùåñòâóåò');
DEFINE('_ROLEIDEXIST','ID ðîëè óæå ñóùåñòâóåò');
DEFINE('_ROLEADDED','Ðîëü óñïåøíî äîáàâëåíà');

//base_roleadmin.php
DEFINE('_ROLEADMIN','Àäìèíèñòðèðîâàíèå ðîëåé BASE');
DEFINE('_FRMROLEID','ID ðîëè:');
DEFINE('_FRMROLENAME','Èìÿ ðîëè:');
DEFINE('_FRMROLEDESC','Îïèñàíèå:');
DEFINE('_UPDATEROLE','Update Role'); //NEW

//base_useradmin.php
DEFINE('_USERADMIN','Àäìèíèñòðèðîâàíèå ïîëüçîâàòåëåé BASE');
DEFINE('_FRMFULLNAME','Ïîëíîå èìÿ:');
DEFINE('_FRMROLE','Ðîëü:');
DEFINE('_FRMUID','ID ïîëüçîâàòåëÿ:');
DEFINE('_SUBMITQUERY','Submit Query'); //NEW
DEFINE('_UPDATEUSER','Update User'); //NEW

//admin/index.php
DEFINE('_BASEADMIN','Àäìèíèñòðèðîâàíèå BASE ');
DEFINE('_BASEADMINTEXT','Ïîæàëóéñòà, âûáåðèòå îïöèþ ñëåâà.');

//base_action.inc.php
DEFINE('_NOACTION','Äåñòâèå äëÿ ïðåäóïðåæäåíèé íå óêàçàíî');
DEFINE('_INVALIDACT',' íåâåðíîå äåéñòâèå');
DEFINE('_ERRNOAG','Íåâîçìîæíî äîáàâèòü ïðåäóïðåæäåíèÿ, ÃÏ íå óêàçàíà');
DEFINE('_ERRNOEMAIL','Íåâîçìîæíî îòïðàâèòü ïðåäóïðåæäåíèÿ ïî e-mail, íå óêàçàí e-mail-àäðåñ');
DEFINE('_ACTION','ÄÅÉÑÒÂÈÅ');
DEFINE('_CONTEXT','êîíòåêñò');
DEFINE('_ADDAGID','ÄÎÁÀÂÈÒÜ â ÃÏ (ïî ID)');
DEFINE('_ADDAG','ÄÎÁÀÂÈÒÜ-Íîâóþ-ÃÏ');
DEFINE('_ADDAGNAME','ÄÎÁÀÂÈÒÜ â ÃÏ (ïî èìåíè)');
DEFINE('_CREATEAG','Ñîçäàòü ÃÏ (ïî èìåíè)');
DEFINE('_CLEARAG','Î÷èñòèòü ÃÏ');
DEFINE('_DELETEALERT','Óäàëèòü ïðåäóïðåæäåíèå(-ÿ)');
DEFINE('_EMAILALERTSFULL','Îòïðàâèòü ïðåäóïðåæäåíèå(-ÿ) (ïîëíîñòüþ)');
DEFINE('_EMAILALERTSSUMM','Îòïðàâèòü ïðåäóïðåæäåíèå(-ÿ) (îïèñàíèå)');
DEFINE('_EMAILALERTSCSV','Îòïðàâèòü ïðåäóïðåæäåíèå(-ÿ) (csv)');
DEFINE('_ARCHIVEALERTSCOPY','Àðõèâèðîâàòü ïðåäóïðåæäåíèå(-ÿ) (êîïèðîâàòü)');
DEFINE('_ARCHIVEALERTSMOVE','Àðõèâèðîâàòü ïðåäóïðåæäåíèå(-ÿ) (ïåðåìåñòèòü)');
DEFINE('_IGNORED','Èãíîðèðîâàííîå ');
DEFINE('_DUPALERTS',' äóáëèðóþùååñÿ(-èåñÿ) ïðåäóïðåæäåíèå(-ÿ)');
DEFINE('_ALERTSPARA',' ïðåäóïðåæäåíèå(-ÿ)');
DEFINE('_NOALERTSSELECT','Ïðåäóïðåæäåíèÿ íå âûáðàíû èëè');
DEFINE('_NOTSUCCESSFUL','íå áûë óñïåøíûì');
DEFINE('_ERRUNKAGID','Óêàçàí íåèçâåñòíûé èäåíòèôèêàòîð ÃÏ (âîçìîæíî, ÃÏ íå ñóùåñòâóåò)');
DEFINE('_ERRREMOVEFAIL','Íå óäàëîñü óäàëèòü íîâûé ÃÏ');
DEFINE('_GENBASE','Ñãåíåðèðîâàíî BASE');
DEFINE('_ERRNOEMAILEXP','ÎØÈÁÊÀ ÝÊÑÏÎÐÒÀ: Íå óäàëîñü îòïðàâèòü ýêñïîðòèðîâàííûå ïðåäóïðåæäåíèÿ íà');
DEFINE('_ERRNOEMAILPHP','Ïðîâåðüòå êîíôèãóðàöèþ ïî÷òû PHP.');
DEFINE('_ERRDELALERT','Îøèáêà óäàëåíèÿ ïðåäóïðåæäåíèÿ');
DEFINE('_ERRARCHIVE','Îøèáêà àðõèâàöèè:');
DEFINE('_ERRMAILNORECP','ÎØÈÁÊÀ ÏÎ×ÒÛ: Ïîëó÷àòåëü íå óêàçàí');

//base_cache.inc.php
DEFINE('_ADDED','Äîáàâëåíû ');
DEFINE('_HOSTNAMESDNS',' èìåíà õîñòîâ ê êýøó IP DNS');
DEFINE('_HOSTNAMESWHOIS',' èìåíà õîñòîâ ê êýøó Whois');
DEFINE('_ERRCACHENULL','ÎØÈÁÊÀ Êýøèðîâàíèÿ: îáíàðóæåí ðÿä NULL-ñîáûòèé?');
DEFINE('_ERRCACHEERROR','ÎØÈÁÊÀ ÊÝØÈÐÎÂÀÍÈß ÑÎÁÛÒÈÉ:');
DEFINE('_ERRCACHEUPDATE','Íå óäàëîñü îáíîâèòü êýø ñîáûòèé');
DEFINE('_ALERTSCACHE',' ïðåäóïðåæäåíèå(-ÿ) ê êýøó ïðåäóïðåæäåíèé');

//base_db.inc.php
DEFINE('_ERRSQLTRACE','Íå óäàëîñü îòêðûòü ôàéë òðàññèðîâêè SQL');
DEFINE('_ERRSQLCONNECT','Îøèáêà ïîäêëþ÷åíèÿ ê ÁÄ :');
DEFINE('_ERRSQLCONNECTINFO','<P>Ïðîâåðüòå ïåðåìåííûå ïîäêëþ÷åíèÿ ê ÁÄ â ôàéëå <I>base_conf.php</I> 
              <PRE>
               = $alert_dbname   : èìÿ ÁÄ MySQL, â êîòîðîé õðàíÿòñÿ ïðåäóïðåæäåíèÿ
               = $alert_host     : õîñò, íà êîòîðîì õðàíèòñÿ ÁÄ
               = $alert_port     : ïîðò, íà êîòîðîì õðàíèòñÿ ÁÄ
               = $alert_user     : èìÿ ïîëüçîâàòåëÿ ÁÄ
               = $alert_password : ïàðîëü ïîëüçîâàòåëÿ
              </PRE>
              <P>');
DEFINE('_ERRSQLPCONNECT','Îøèáêà (p)ïîäêëþ÷åíèÿ ê ÁÄ :');
DEFINE('_ERRSQLDB','ÎØÈÁÊÀ ÁÄ:');
DEFINE('_DBALCHECK','Ïðîâåðêà àáñòðàêöèîííîé áèáëèîòåêè ÁÄ â');
DEFINE('_ERRSQLDBALLOAD1','<P><B>Îøèáêà çàðóçêè àáñòðàêöèîííîé áèáëèîòåêè ÁÄ: </B> èç ');
DEFINE('_ERRSQLDBALLOAD2','<P>Ïðîâåðüòå ïåðåìåííóþ àáñòðàêöèîííîé áèáëèîòåêè ÁÄ <CODE>$DBlib_path</CODE> â <CODE>base_conf.php</CODE>
            <P>
            Â äàííûé ìîìåíò èñïîëüçóåòñÿ ADODB êàê áèáëèîòåêà ðàáîòû ñ ÁÄ, îíà ìîæåò áûòü çàãðóæåíà ñ
            <A HREF="http://adodb.sourceforge.net/">http://adodb.sourceforge.net/</A>');
DEFINE('_ERRSQLDBTYPE','Óêàçàí íåâåðíûé òèï ÁÄ');
DEFINE('_ERRSQLDBTYPEINFO1','Ïåðåìåííàÿ <CODE>\$DBtype</CODE> â <CODE>base_conf.php</CODE> óñòàíîâëåíà â íåðàñïîçíàâàåìîå çíà÷åíèå òèïà ÁÄ ');
DEFINE('_ERRSQLDBTYPEINFO2','Ïîääåðæèâàþòñÿ òîëüêî ñëåäóþùèå ÁÄ: <PRE>
                MySQL         : \'mysql\'
                PostgreSQL    : \'postgres\'
                MS SQL Server : \'mssql\'
                Oracle        : \'oci8\'
             </PRE>');

//base_log_error.inc.php
DEFINE('_ERRBASEFATAL','ÔÀÒÀËÜÍÀß ÎØÈÁÊÀ BASE:');

//base_log_timing.inc.php
DEFINE('_LOADEDIN','Çàãðóæåíî çà');
DEFINE('_SECONDS','ñåêóíä');

//base_net.inc.php
DEFINE('_ERRRESOLVEADDRESS','Íåâîçìîæíî ïîëó÷èòü àäðåñ');

//base_output_query.inc.php
DEFINE('_QUERYRESULTSHEADER','Âûõîäíîé çàãîëîâîê ðåçóëüòàòîâ çàïðîñà:');

//base_signature.inc.php
DEFINE('_ERRSIGNAMEUNK','Íåèçâåñòíûé SigName');
DEFINE('_ERRSIGPROIRITYUNK','Íåèçâåñòíûé SigPriority');
DEFINE('_UNCLASS','íåêëàññèôèöèðîâàíî');

//base_state_citems.inc.php
DEFINE('_DENCODED','äàííûå çàêîäèðîâàíû êàê');
DEFINE('_NODENCODED','(äàííûå íå ïðåîáðàçîâàíû, ïðåäïîëàãàåòñÿ ðîäíàÿ êîäèðîâêà ÁÄ)');
DEFINE('_SHORTJAN','Jan'); //NEW
DEFINE('_SHORTFEB','Feb'); //NEW
DEFINE('_SHORTMAR','Mar'); //NEW
DEFINE('_SHORTAPR','Apr'); //NEW
DEFINE('_SHORTMAY','May'); //NEW
DEFINE('_SHORTJUN','Jun'); //NEW
DEFINE('_SHORTJLY','Jly'); //NEW
DEFINE('_SHORTAUG','Aug'); //NEW
DEFINE('_SHORTSEP','Sep'); //NEW
DEFINE('_SHORTOCT','Oct'); //NEW
DEFINE('_SHORTNOV','Nov'); //NEW
DEFINE('_SHORTDEC','Dec'); //NEW
DEFINE('_DISPSIG','{ signature }'); //NEW
DEFINE('_DISPANYCLASS','{ any Classification }'); //NEW
DEFINE('_DISPANYPRIO','{ any Priority }'); //NEW
DEFINE('_DISPANYSENSOR','{ any Sensor }'); //NEW
DEFINE('_DISPADDRESS','{ adress }'); //NEW
DEFINE('_DISPFIELD','{ field }'); //NEW
DEFINE('_DISPPORT','{ port }'); //NEW
DEFINE('_DISPENCODING','{ encoding }'); //NEW
DEFINE('_DISPCONVERT2','{ Convert To }'); //NEW
DEFINE('_DISPANYAG','{ any Alert Group }'); //NEW
DEFINE('_DISPPAYLOAD','{ payload }'); //NEW
DEFINE('_DISPFLAGS','{ flags }'); //NEW
DEFINE('_SIGEXACTLY','exactly'); //NEW
DEFINE('_SIGROUGHLY','roughly'); //NEW
DEFINE('_SIGCLASS','Signature Classification'); //NEW
DEFINE('_SIGPRIO','Signature Priority'); //NEW
DEFINE('_SHORTSOURCE','Source'); //NEW
DEFINE('_SHORTDEST','Dest'); //NEW
DEFINE('_SHORTSOURCEORDEST','Src or Dest'); //NEW
DEFINE('_NOLAYER4','no layer4'); //NEW
DEFINE('_INPUTCRTENC','Input Criteria Encoding Type'); //NEW
DEFINE('_CONVERT2WS','Convert To (when searching)'); //NEW

//base_state_common.inc.php
DEFINE('_PHPERRORCSESSION','ÎØÈÁÊÀ PHP: Îáíàðóæåíà ÷àñòíàÿ ÐÍÐ-ñåññèÿ (ïîëüçîâàòåëüñêàÿ). Îäíàêî, BASE íå ñêîíôèãóðèðîâàí ðàñïîçíàâàòü äàííûé êîíêðåòíûé çàãîëîâîê.  Óñòàíîâèòå <CODE>use_user_session=1</CODE> â <CODE>base_conf.php</CODE>');
DEFINE('_PHPERRORCSESSIONCODE','ÎØÈÁÊÀ PHP: Áûë ñêîíôèãóðèðîâàí ÷àñòíûé õýíäåð ÍÐ-ñåññèè (ïîëüçîâàòåëüñêîé), íî õýíäåð, óêàçàííûé â <CODE>user_session_path</CODE> íåïðàâèëüíûé.');
DEFINE('_PHPERRORCSESSIONVAR','PHP ERROR: Áûë ñêîíôèãóðèðîâàí ÷àñòíûé õýíäëåð ÐÍÐ-ñåññèè (ïîëüçîâàòåëüñêîé), íî èìïëåìåíòàöèÿ ýòîãî õýíäëåðà íå óêàçàíà â BASE.  Åñëè õýíäëåð ÷àñòåîé ñåññèè ïðåäïî÷òèòåëåí, óñòàíîâèòå ïåðåìåííóþ <CODE>user_session_path</CODE> â <CODE>base_conf.php</CODE>.');
DEFINE('_PHPSESSREG','Ñåññèÿ çàðåãåñòðèðîâàíà');

//base_state_criteria.inc.php
DEFINE('_REMOVE','Óäàëåíèå');
DEFINE('_FROMCRIT','èç êðèòåðèåâ');
DEFINE('_ERRCRITELEM','Íåâåðíûé ýëåìåíò êðèòåðèåâ');

//base_state_query.inc.php
DEFINE('_VALIDCANNED','Âåðíûé ñïèñîê çàïðîñîâ');
DEFINE('_DISPLAYING','Îòîáðàæåíèå');
DEFINE('_DISPLAYINGTOTAL','Îòîáðàæåíèå ïðåäóïðåæäåíèé %d-%d èç %d');
DEFINE('_NOALERTS','Ïðåäóïðåæäåíèÿ íå íàéäåíû.');
DEFINE('_QUERYRESULTS','Ðåçóëüòàòû çàïðîñà');
DEFINE('_QUERYSTATE','Ñîñòîÿíèå çàïðîñà');
DEFINE('_DISPACTION','{ action }'); //NEW

//base_ag_common.php
DEFINE('_ERRAGNAMESEARCH','Óêàçàííîå èìÿ ÃÏ äëÿ ïîèñêà íåâåðíî. Ïîïðîáóéòå åùå ðàç!');
DEFINE('_ERRAGNAMEEXIST','Óêàçàííàÿ ÃÏ íå ñóùåñòâóåò.');
DEFINE('_ERRAGIDSEARCH','Óêàçàííûé ID ÃÏ äëÿ ïîèñêà íåâåðíûé.  Ïîïðîáóéòå åùå ðàç!');
DEFINE('_ERRAGLOOKUP','Îøèáêà ïîèñêà ID ÃÏ');
DEFINE('_ERRAGINSERT','Îøèáêà âñòàâêè íîâîé ÃÏ');

//base_ag_main.php
DEFINE('_AGMAINTTITLE','Ïîääåðæêà Ãðóïï Ïðåäóïðåæäåíèé (ÃÏ)');
DEFINE('_ERRAGUPDATE','Îøèáêà îáíîâëåíèÿ ÃÏ');
DEFINE('_ERRAGPACKETLIST','Îøèáêà óäàëåíèÿ ñïèñêà ïàêåòîâ èç ÃÏ:');
DEFINE('_ERRAGDELETE','Îøèáêà óäàëåíèÿ ÃÏ');
DEFINE('_AGDELETE','óñïåøíî ÓÄÀËÅÍÎ');
DEFINE('_AGDELETEINFO','èíôîðìàöèÿ óäàëåíà');
DEFINE('_ERRAGSEARCHINV','Ââåäåííûå êðèòåðèè ïîèñêà íåâåðíû. Ïîïðîáóéòå åùå ðàç!');
DEFINE('_ERRAGSEARCHNOTFOUND','Ïî äàííûì êðèòåðèÿì íå íàéäåíî íè îäíîé ÃÏ.');
DEFINE('_NOALERTGOUPS','Ãðóïï Ïðåäóïðåæäåíèé íåò');
DEFINE('_NUMALERTS','×èñëî ïðåäóïðåæäåíèé');
DEFINE('_ACTIONS','Äåéñòâèÿ');
DEFINE('_NOTASSIGN','åùå íî íàçíà÷åíî');
DEFINE('_SAVECHANGES','Save Changes'); //NEW
DEFINE('_CONFIRMDELETE','Confirm Delete'); //NEW
DEFINE('_CONFIRMCLEAR','Confirm Clear'); //NEW

//base_common.php
DEFINE('_PORTSCAN','Òðàôôèê ñêàíèðîâàíèÿ ïîðòîâ');

//base_db_common.php
DEFINE('_ERRDBINDEXCREATE','Íå óäàëîñü ñîçäàòü èíäåêñ äëÿ');
DEFINE('_DBINDEXCREATE','Èíäåêñ óñïåøíî ñîçäàí äëÿ');
DEFINE('_ERRSNORTVER','Ýòî ìîæåò áûòü ñòàðîé âåðñèè. Ïîääåðæèâàþòñÿ áàçû ïðåäóïðåæäåíèé ñîçäàííûå òîëüêî ñ ïîìîùüþ Snort 1.7-beta0 èëè áîëåå ïîçäíåé âåðñèè');
DEFINE('_ERRSNORTVER1','ÁÄ-ïîäëîæêà');
DEFINE('_ERRSNORTVER2','ìîæåò áûòü íåïîëíîé/íåâåðíîé');
DEFINE('_ERRDBSTRUCT1','Âåðñèÿ ÁÄ âåðíà, íî ñòðóêòóðà ÁÄ BASE');
DEFINE('_ERRDBSTRUCT2','íå ïðèñóòñòâóåò. Èñïîëüçóéòå <A HREF="base_db_setup.php">Ñòðàíèöó óñòàíîâêè</A> äëÿ êîíôèãóðèðîâàíèÿ è îïòèìèçàöèè ÁÄ.');
DEFINE('_ERRPHPERROR','ÎØÈÁÊÀ PHP');
DEFINE('_ERRPHPERROR1','Íåñîâìåñòèìàÿ âåðñèÿ');
DEFINE('_ERRVERSION','Âåðñèÿ');
DEFINE('_ERRPHPERROR2','PHP ñëèøêîì ñòàðà.  Ïîæàëóéñòà, îáíîâèòå åå äî 4.0.4 èëè áîëåå ïîçäíåé');
DEFINE('_ERRPHPMYSQLSUP','<B>áèëä PHP íåïîëíûé</B>: <FONT>âñòðîåííàÿ ïîääåðæêà MySQL, íåîáõîäèìàÿ äëÿ 
               ÷òåíèÿ áàçû ïðåäóïðåæäåíèé, íå âñòðîåíà â PHP.  
               Ïîæàëóéñòà, ïåðåêîìïèëèðóéòå PHP ñ íåîáõîäèìîé áèáëèîòåêîé (<CODE>--with-mysql</CODE>)</FONT>');
DEFINE('_ERRPHPPOSTGRESSUP','<B>áèëä PHP íåïîëíûé</B>: <FONT>âñòðîåííàÿ ïîääåðæêà PostgreSQL, íåîáõîäèìàÿ äëÿ 
               ÷òåíèÿ áàçû ïðåäóïðåæäåíèé, íå âñòðîåíà â PHP.  
               Ïîæàëóéñòà, ïåðåêîìïèëèðóéòå PHP ñ íåîáõîäèìîé áèáëèîòåêîé (<CODE>--with-pgsql</CODE>)</FONT>');
DEFINE('_ERRPHPMSSQLSUP','<B>áèëä PHP íåïîëíûé</B>: <FONT>âñòðîåííàÿ ïîääåðæêà MS SQL Server, íåîáõîäèìàÿ äëÿ
               ÷òåíèÿ áàçû ïðåäóïðåæäåíèé, íå âñòðîåíà â PHP.  
               Ïîæàëóéñòà, ïåðåêîìïèëèðóéòå PHP ñ íåîáõîäèìîé áèáëèîòåêîé  (<CODE>--enable-mssql</CODE>)</FONT>');
DEFINE('_ERRPHPORACLESUP','<B>PHP build incomplete</B>: <FONT>the prerequisite Oracle support required to 
                   read the alert database was not built into PHP.  
                   Please recompile PHP with the necessary library (<CODE>--with-oci8</CODE>)</FONT>');

//base_graph_form.php
DEFINE('_CHARTTITLE','Çàãîëîâîê ãðàôèêà:');
DEFINE('_CHARTTYPE','Chart Type:'); //NEW
DEFINE('_CHARTTYPES','{ chart type }'); //NEW
DEFINE('_CHARTPERIOD','Chart Period:'); //NEW
DEFINE('_PERIODNO','no period'); //NEW
DEFINE('_PERIODWEEK','7 (a week)'); //NEW
DEFINE('_PERIODDAY','24 (whole day)'); //NEW
DEFINE('_PERIOD168','168 (24x7)'); //NEW
DEFINE('_CHARTSIZE','Size: (width x height)'); //NEW
DEFINE('_PLOTMARGINS','Plot Margins: (left x right x top x bottom)'); //NEW
DEFINE('_PLOTTYPE','Plot type:'); //NEW
DEFINE('_TYPEBAR','bar'); //NEW
DEFINE('_TYPELINE','line'); //NEW
DEFINE('_TYPEPIE','pie'); //NEW
DEFINE('_CHARTHOUR','{hora}'); //NEW
DEFINE('_CHARTDAY','{dia}'); //NEW
DEFINE('_CHARTMONTH','{mÃªs}'); //NEW
DEFINE('_GRAPHALERTS','Graph Alerts'); //NEW
DEFINE('_AXISCONTROLS','X / Y AXIS CONTROLS'); //NEW
DEFINE('_CHRTTYPEHOUR','Âðåìÿ (÷àñû) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEDAY','Âðåìÿ (äíè) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEWEEK','Âðåìÿ (íåäåëè) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEMONTH','Âðåìÿ (ìåñÿöû) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEYEAR','Âðåìÿ (ãîäû) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPESRCIP','IP-èñòî÷íèê  è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEDSTIP','IP-íàçíà÷åíèå è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEDSTUDP','UDP ïîðò-íàçíà÷åíèå è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPESRCUDP','UDP ïîðò-èñòî÷íèê è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPEDSTPORT','TCP ïîðò-íàçíà÷åíèå è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPESRCPORT','TCP ïîðò-èñòî÷íèê è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPESIG','Ñèã. êëàññèôèêàöèÿ è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTYPESENSOR','Ñåíñîð è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTBEGIN','Íà÷àëî ãðàôèêà:');
DEFINE('_CHRTEND','Êîíåö ãðàôèêà:');
DEFINE('_CHRTDS','Èñòî÷íèê äàííûõ:');
DEFINE('_CHRTX','Îñü X');
DEFINE('_CHRTY','Îñü Y');
DEFINE('_CHRTMINTRESH','Ìèíèìàëüíîå ïîðîãîâîå çíà÷åíèå');
DEFINE('_CHRTROTAXISLABEL','Ïîâåðíóòü ìåòêè íà îñè (90 ãðàäóñîâ)');
DEFINE('_CHRTSHOWX','Ïîêàçàòü ñåòêó ëèíèé îñè X');
DEFINE('_CHRTDISPLABELX','Ïîêàçûâàòü ìåòêó îñè X êàæäûå');
DEFINE('_CHRTDATAPOINTS','åäèíèö äàííûõ');
DEFINE('_CHRTYLOG','Ëîãàðèôìè÷åñêàÿ îñü Y');
DEFINE('_CHRTYGRID','Ïîêàçûâàòü ñåòêó ëèíèé îñè Y');

//base_graph_main.php
DEFINE('_CHRTTITLE','Ãðàôèê BASE');
DEFINE('_ERRCHRTNOTYPE','Íå óêàçàí òèï ãðàôèêà');
DEFINE('_ERRNOAGSPEC','ÃÏ íó óêàçàíà. Èñïîëüçóþòñÿ âñå ïðåäóïðåæäåíèÿ.');
DEFINE('_CHRTDATAIMPORT','Íà÷àëî èìïîðòà äàííûõ');
DEFINE('_CHRTTIMEVNUMBER','Âðåìÿ è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTTIME','Âðåìÿ');
DEFINE('_CHRTALERTOCCUR','Ñëó÷àè ïðåäóïðåæäåíèé');
DEFINE('_CHRTSIPNUMBER','IP-èñòî÷íèê è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTSIP','IP-èñòî÷íèê');
DEFINE('_CHRTDIPALERTS','IP-íàçíà÷åíèå è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTDIP','IP-íàçíà÷åíèå');
DEFINE('_CHRTUDPPORTNUMBER','UDP ïîðò (íàçíà÷åíèå) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTDUDPPORT','UDP ïîðò-íàçíà÷åíèå');
DEFINE('_CHRTSUDPPORTNUMBER','UDP ïîðò (èñòî÷íèê) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTSUDPPORT','UDP ïîðò-èñòî÷íèê');
DEFINE('_CHRTPORTDESTNUMBER','TCP ïîðò (íàçíà÷åíèå) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTPORTDEST','TCP ïîðò-íàçíà÷åíèå');
DEFINE('_CHRTPORTSRCNUMBER','TCP ïîðò (èñòî÷íèê) è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTPORTSRC','TCP ïîðò-èñòî÷íèê');
DEFINE('_CHRTSIGNUMBER','Ñèã. êëàññèôèêàöèÿ è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTCLASS','Êëàññèôèêàöèÿ');
DEFINE('_CHRTSENSORNUMBER','Ñåíñîð è ÷èñëî ïðåäóïðåæäåíèé');
DEFINE('_CHRTHANDLEPERIOD','Îïðåäåëåíèå ïåðèîäà ïðè íåîáõîäèìîñòè');
DEFINE('_CHRTDUMP','Çàïèñü äàííûõ ...');
DEFINE('_CHRTDRAW','Ðèñîâàíèå ãðàôèêà');
DEFINE('_ERRCHRTNODATAPOINTS','Íåò òî÷åê äàííûõ äëÿ ðèñîâàíèÿ');
DEFINE('_GRAPHALERTDATA','Graph Alert Data'); //NEW

//base_maintenance.php
DEFINE('_MAINTTITLE','Ïîääåðæêà');
DEFINE('_MNTPHP','Áèëä PHP:');
DEFINE('_MNTCLIENT','ÊËÈÅÍÒ:');
DEFINE('_MNTSERVER','ÑÅÐÂÅÐ:');
DEFINE('_MNTSERVERHW','HW ÑÅÐÂÅÐÀ:');
DEFINE('_MNTPHPVER','ÂÅÐÑÈß PHP:');
DEFINE('_MNTPHPAPI','PHP API:');
DEFINE('_MNTPHPLOGLVL','Óðîâåíü ïðîòîêîëèðîâàíèÿ PHP:');
DEFINE('_MNTPHPMODS','Çàãðóæåííûå ìîäóëè:');
DEFINE('_MNTDBTYPE','Òèï DB:');
DEFINE('_MNTDBALV','Âåðñèÿ àáñòðàêöèè DB:');
DEFINE('_MNTDBALERTNAME','Èìÿ ÁÄ ïðåäóïðåæäåíèé:');
DEFINE('_MNTDBARCHNAME','Èìÿ ÁÄ àðõèâà:');
DEFINE('_MNTAIC','Êýø èíôîðìàöèè î ïðåäóïðåæäåíèÿõ:');
DEFINE('_MNTAICTE','Âñåãî ñîáûòèé:');
DEFINE('_MNTAICCE','Êýøèðîâàíî ñîáûòèé:');
DEFINE('_MNTIPAC','Êýø IP-àäðåñîâ');
DEFINE('_MNTIPACUSIP','Óíèêàëüíûå IP-èñòî÷íèêè:');
DEFINE('_MNTIPACDNSC','Êýøèðîâàííûõ DNS:');
DEFINE('_MNTIPACWC','Êýøèðîâàííûõ Whois:');
DEFINE('_MNTIPACUDIP','Óíèêàëüíûå IP-íàçíà÷åíèÿ:');

//base_qry_alert.php
DEFINE('_QAINVPAIR','Íåâåðíàÿ ïàðà (sid,cid)');
DEFINE('_QAALERTDELET','Ïðåäóïðåæäåíèå ÓÄÀËÅÍÎ');
DEFINE('_QATRIGGERSIG','Òðèããåðíàÿ ñèãíàòóðà');
DEFINE('_QANORMALD','Normal Display'); //NEW
DEFINE('_QAPLAIND','Plain Display'); //NEW
DEFINE('_QANOPAYLOAD','Fast logging used so payload was discarded'); //NEW

//base_qry_common.php
DEFINE('_QCSIG','ñèãíàòóðà');
DEFINE('_QCIPADDR','IP àäðåñà');
DEFINE('_QCIPFIELDS','IP ïîëÿ');
DEFINE('_QCTCPPORTS','TCP ïîðòû');
DEFINE('_QCTCPFLAGS','TCP ôëàãè');
DEFINE('_QCTCPFIELD','TCP ïîëÿ');
DEFINE('_QCUDPPORTS','UDP ïîðòû');
DEFINE('_QCUDPFIELDS','UDP ïîëÿ');
DEFINE('_QCICMPFIELDS','ICMP ïîëÿ');
DEFINE('_QCDATA','Äàííûå');
DEFINE('_QCERRCRITWARN','Âíèìàíèå:');
DEFINE('_QCERRVALUE','Âåëè÷èíà');
DEFINE('_QCERRFIELD','Ïîëå');
DEFINE('_QCERROPER','Îïåðàòîð');
DEFINE('_QCERRDATETIME','Äàòà/âðåìÿ');
DEFINE('_QCERRPAYLOAD','Âåëè÷èíà çàãðóçêè');
DEFINE('_QCERRIP','IP àäðåñ');
DEFINE('_QCERRIPTYPE','IP àäðåñ òèïà');
DEFINE('_QCERRSPECFIELD',' ââåäåí(-à) â ïîëå ïðîòîêîëà, íî êîíêðåòíîå ïîëå íå áûëî óêàçàíî.');
DEFINE('_QCERRSPECVALUE','âûáðàí(-à) êàê êðèòåðèé, íî íå óêàçàíà âåëè÷èíà äëÿ ñîîòâåòñòâèÿ åé.');
DEFINE('_QCERRBOOLEAN','Â êà÷åñòâå êðèòåðèÿ ââåäåíî íåñîêëüêî ïðîòîêîëîâ, íî íå èñïîëüçîâàíû ëîãè÷åñêèå îïåðàòîðû (íàïð., AND, OR).');
DEFINE('_QCERRDATEVALUE','âûáðàí(-à) êàê ïîêàçûâàþùèé(-àÿ), ÷òî äîëæíà ñîâïàäàòü äàòà/âðåìÿ, íî çíà÷åíèå íå óêàçàíî.');
DEFINE('_QCERRINVHOUR','(Íåâåðíîå âðåìÿ) Íå ââåäåí êðèòåðèé äàòû äëÿ óêàçàííîãî âðåìåíè.');
DEFINE('_QCERRDATECRIT','âûáðàí(-à), êàê ïîêàçûâàþùèé(-àÿ), ÷òî äîëæíà ñîâïàäàòü äàòà/âðåìÿ, íî çíà÷åíèå íå óêàçàíî.');
DEFINE('_QCERROPERSELECT','ââåäåí(-à), íî íè îäèí îïåðàòîð íå âûáðàí.');
DEFINE('_QCERRDATEBOOL','Ââåäåíû íåñêîëüêî êðèòåðèåâ äàòû/âðåìåíè áåç ëîãè÷åñêèõ îïåðàòîðîâ ìåæäó íèìè (íàïð., AND, OR).');
DEFINE('_QCERRPAYCRITOPER','ââåäåí(-à) êàê êðèòåðèé çàãðóçêè, íî îïåðàòîð (íàïð., has, has not) íå áûë óêàçàí.');
DEFINE('_QCERRPAYCRITVALUE','âûáðàí(-à) êàê ïîêàçûâþùèé, ÷òî êðèòåðèåì ÿâëÿåòñÿ çàãðóçêà, íî çíà÷åíèå íå óêàçàíî.');
DEFINE('_QCERRPAYBOOL','Ââåäåíî íåñêîëüêî êðèòåðèåâ çàãðóçêè áåç ëîãè÷åñêîãî îïåðàòîðà ìåæäó íèìè (íàïð., AND, OR).');
DEFINE('_QCMETACRIT','Ìåòà êðèòåðèé');
DEFINE('_QCIPCRIT','Êðèòåðèé IP');
DEFINE('_QCPAYCRIT','Êðèòåðèé çàãðóçêè');
DEFINE('_QCTCPCRIT','Êðèòåðèé TCP');
DEFINE('_QCUDPCRIT','Êðèòåðèé UDP');
DEFINE('_QCICMPCRIT','Êðèòåðèé ICMP');
DEFINE('_QCLAYER4CRIT','Layer 4 Criteria'); //NEW
DEFINE('_QCERRINVIPCRIT','Íåâåðíûé êðèòåðèé: IP àäðåñ');
DEFINE('_QCERRCRITADDRESSTYPE','ââåäåí(-à) êàê çíà÷åíèå êðèòåðèÿ, íî òèï àäðåñà (íàïð., èñòî÷íèê, íàçíà÷åíèå) íå áûë óêàçàí.');
DEFINE('_QCERRCRITIPADDRESSNONE','ïîêàçûâàþùèé(-àÿ), ÷òî IP àäðåñ äîëæåí áûòü êðèòåðèåì, íî àäðåñ íå óêàçàí.');
DEFINE('_QCERRCRITIPADDRESSNONE1','âûáðàí(-à) (#');
DEFINE('_QCERRCRITIPIPBOOL','Â êà÷åñòâå êðèòåðèÿ ââåäåíû íåñêîëüêî IP àäðåñîâ áåç ëîãè÷åñêîãî îïåðàòîðà ìåæäó íèìè (íàïð., AND, OR)');

//base_qry_form.php
DEFINE('_QFRMSORTORDER','Ïîðÿäîê ñîðòèðîâêè');
DEFINE('_QFRMSORTNONE','none'); //NEW
DEFINE('_QFRMTIMEA','âðåìÿ (âîñõîäÿùèé)');
DEFINE('_QFRMTIMED','âðåìÿ (íèñõîäÿùèé)');
DEFINE('_QFRMSIG','ñèãíàòóðà');
DEFINE('_QFRMSIP','IP-èñòî÷íèê');
DEFINE('_QFRMDIP','IP-íàçíà÷åíèå');

//base_qry_sqlcalls.php
DEFINE('_QSCSUMM','Îáùàÿ ñòàòèñòèêà');
DEFINE('_QSCTIMEPROF','Âðåìåííîé ïðîôèèëü');
DEFINE('_QSCOFALERTS','ïðåäóïðåæäåíèé');

//base_stat_alerts.php
DEFINE('_ALERTTITLE','Ñïèñîê ïðåäóïðåæäåíèé');

//base_stat_common.php
DEFINE('_SCCATEGORIES','Êàòåãîðèè:');
DEFINE('_SCSENSORTOTAL','Ñåíñîðû/Âñåãî:');
DEFINE('_SCTOTALNUMALERTS','Îáùåå êîëè÷åñòâî ïðåäóïðåæäåíèé:');
DEFINE('_SCSRCIP','IP-èñòî÷íèê:');
DEFINE('_SCDSTIP','IP-íàçíà÷åíèå:');
DEFINE('_SCUNILINKS','Óíèêàëüíûå IP ñâÿçè');
DEFINE('_SCSRCPORTS','Ïîðòû-èñòî÷íèêè: ');
DEFINE('_SCDSTPORTS','Ïîðòû-íàçíà÷åíèÿ: ');
DEFINE('_SCSENSORS','Ñåíñîðû');
DEFINE('_SCCLASS','êëàññèôèêàöèè');
DEFINE('_SCUNIADDRESS','Óíèêàëüíûå àäðåñû: ');
DEFINE('_SCSOURCE','Èñòî÷íèê');
DEFINE('_SCDEST','Íàçíà÷åíèå');
DEFINE('_SCPORT','Ïîðò');

//base_stat_ipaddr.php
DEFINE('_PSEVENTERR','ÎØÈÁÊÀ ÑÎÁÛÒÈß ÑÊÀÍÈÐÎÂÀÍÈß ÏÎÐÒÎÂ: ');
DEFINE('_PSEVENTERRNOFILE','Íè îäèí ôàéë íå óêàçàí â ïåðåìåííîé $portscan_file.');
DEFINE('_PSEVENTERROPENFILE','Íå óäàëîñü îòêðûòü ôàéë ñîáûòèé ñêàíèðîâàíèÿ ïîðòîâ');
DEFINE('_PSDATETIME','Äàòà/Âðåìÿ');
DEFINE('_PSSRCIP','IP-èñòî÷íèê');
DEFINE('_PSDSTIP','IP-íàçíà÷åíèå');
DEFINE('_PSSRCPORT','ïîðò-èñòî÷íèê');
DEFINE('_PSDSTPORT','ïîðò-íàçíà÷åíèå');
DEFINE('_PSTCPFLAGS','Ôëàãè TCP');
DEFINE('_PSTOTALOCC','Âñåãî<BR> Ñëó÷àåâ');
DEFINE('_PSNUMSENSORS','×èñëî ñåíñîðîâ');
DEFINE('_PSFIRSTOCC','Ïåðâûé<BR> Ñëó÷àé');
DEFINE('_PSLASTOCC','Ïîñëåäíèé<BR> Ñëó÷àé');
DEFINE('_PSUNIALERTS','Óíèêàëüíûå ïðåäóïðåæäåíèÿ');
DEFINE('_PSPORTSCANEVE','Ñîáûòèÿ ñêàíèðîâàíèÿ ïîðòîâ');
DEFINE('_PSREGWHOIS','Ïîèñê (whois) â');
DEFINE('_PSNODNS','íå ïîëó÷åíî DNS-ðàçðåøåíèÿ');
DEFINE('_PSNUMSENSORSBR','×èñëî <BR>Ñåíñîðîâ');
DEFINE('_PSOCCASSRC','Ñëó÷àè <BR>êàê èñòî÷íèêè.');
DEFINE('_PSOCCASDST','Ñëó÷àè <BR>êàê íàçíà÷åíèÿ.');
DEFINE('_PSWHOISINFO','Èíôîðìàöèÿ Whois');
DEFINE('_PSTOTALHOSTS','Total Hosts Scanned'); //NEW
DEFINE('_PSDETECTAMONG','%d unique alerts detected among %d alerts on %s'); //NEW
DEFINE('_PSALLALERTSAS','all alerts with %s/%s as'); //NEW
DEFINE('_PSSHOW','show'); //NEW
DEFINE('_PSEXTERNAL','external'); //NEW

//base_stat_iplink.php
DEFINE('_SIPLTITLE','IP Ñâÿçè');
DEFINE('_SIPLSOURCEFGDN','Èñòî÷íèê FQDN');
DEFINE('_SIPLDESTFGDN','Íàçíà÷åíèå FQDN');
DEFINE('_SIPLDIRECTION','Íàïðàâëåíèå');
DEFINE('_SIPLPROTO','Ïðîòîêîë');
DEFINE('_SIPLUNIDSTPORTS','Óíèêàëüíûå ïîðòû-íàçíà÷åíèÿ');
DEFINE('_SIPLUNIEVENTS','Óíèêàëüíûå ñîáûòèÿ');
DEFINE('_SIPLTOTALEVENTS','Âñåãî ñîáûòèé');

//base_stat_ports.php
DEFINE('_UNIQ','Óíèêàëüíûå');
DEFINE('_DSTPS','Ïîðòû-íàçíà÷åíèÿ');
DEFINE('_SRCPS','Ïîðò-èñòî÷íèêè');
DEFINE('_OCCURRENCES','Occurrences'); //NEW

//base_stat_sensor.php
DEFINE('SPSENSORLIST','Ñïèñîê ñåíñîðîâ');

//base_stat_time.php
DEFINE('_BSTTITLE','Âðåìåííîé ïðîôèëü ïðåäóïðåæäåíèé');
DEFINE('_BSTTIMECRIT','Êðèòåðèè âðåìåíè');
DEFINE('_BSTERRPROFILECRIT','<FONT><B>Íå óêàçàí ïðîôàéëèíã êðèòåðèåâ!</B>  Íàæìèòå íà "÷àñû", "äåíü", èëè "ìåñÿö", ÷òîáû âûáðàòü çåðíèñòîñòü àãðåãàòíîé ñòàòèñòèêè.</FONT>');
DEFINE('_BSTERRTIMETYPE','<FONT><B>Íå óêàçàí òèï âðåìåííîãî ïàðàìåòðà!</B>  Âûáåðèòå èëè "â", ÷òîáû óêàçàòü îäíó äàòó, èëè "ìåæäó", ÷òîáû óêàçàòü èíòåðâàë.</FONT>');
DEFINE('_BSTERRNOYEAR','<FONT><B>Ïàðàìåòð Ãîä íå óêàçàí!</B></FONT>');
DEFINE('_BSTERRNOMONTH','<FONT><B>Ïàðàìåòð Ìåñÿö íå óêàçàí!</B></FONT>');
DEFINE('_BSTERRNODAY','<FONT><B>Ïàðàìåòð Äåíü íå óêàçàí!</B></FONT>');
DEFINE('_BSTPROFILEBY','Profile by'); //NEW
DEFINE('_TIMEON','on'); //NEW
DEFINE('_TIMEBETWEEN','between'); //NEW
DEFINE('_PROFILEALERT','Profile Alert'); //NEW

//base_stat_uaddr.php
DEFINE('_UNISADD','Óíèêàëüíûå àäðåñà-èñòî÷íèêè');
DEFINE('_SUASRCIP','IP-èñòî÷íèê');
DEFINE('_SUAERRCRITADDUNK','ÎØÈÁÊÀ ÊÐÈÒÅÐÈß: íåèçâåñòíûé òèïà àäðåñà -- ïðåäïîëàãàåòñÿ àäðåñ-íàçíà÷åíèå');
DEFINE('_UNIDADD','Óíèêàëüíèûå àäðåñà-íàçíà÷åíèÿ');
DEFINE('_SUADSTIP','IP-íàçíà÷åíèå');
DEFINE('_SUAUNIALERTS','Óíèêàëüíûå&nbsp;ïðåäóïðåæäåíèÿ');
DEFINE('_SUASRCADD','Àäðåñ&nbsp;èñòî÷íèê.');
DEFINE('_SUADSTADD','Àäðåñ.&nbsp;íàçíà÷åíèå');

//base_user.php
DEFINE('_BASEUSERTITLE','Ïîëüçîâàòåëüñêèå óñòàíîâêè BASE');
DEFINE('_BASEUSERERRPWD','Âàø ïàðîëü íå ìîæåò áûòü ïóñòûì èëè äâà ïàðîëÿ íå ñîâïàëè!');
DEFINE('_BASEUSEROLDPWD','Ñòàðûé ïàðîëü:');
DEFINE('_BASEUSERNEWPWD','Íîâûé ïàðîëü:');
DEFINE('_BASEUSERNEWPWDAGAIN','Åùå ðàç íîâûé ïàðîëü:');

DEFINE('_LOGOUT','Âûõîä');

?>
