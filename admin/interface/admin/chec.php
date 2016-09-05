<?php

/*
 * Script to check the validity of MYSQL tables by running CHECK TABLE
 * on every table in the given database.
 *
 * To use:
 *    php -f <path_to_script> [-- options]
 *
 * (need to use "--" to separate script options from PHP options
 *
 * Example:
 *    php -f /usr/local/bin/check_mysql_tables.php -- -verbose -fast
 *
 * An example cron entry, checks each day at 2:02am:
 *    2 2 * * * /bin/php -f /bin/check_mysql_tables.php
 *
 */
$usage = "Checks the validity of tables in a mysql database\n\n" .
         "Usage: " . $argv[0] . " [options]\n" .
         "  -f[ast]    perform a fast check (CHECK TABLE tblName FAST)\n" .
         "  -<?|h|x>   show usage string (this message)\n" .
         "  -v[erbose] display verbose messages while running\n";

$msg = "";
$fast = false;
$verbose = false;
$server = "localhost";
$database = "test";
$uid = "root";
$pwd = "";
$tcount = 0;

array_shift($argv);  // take out the script name

foreach ($argv as $option) {
    switch ($option) {
    case '-f':
    case '-fast':
        $fast = true;
        break;
    case '-v':
    case '-verbose':
        $verbose = true;
        echo "Verbose enabled\n";
        break;
    case '-x':
    case '-?':
    case '-h':
        die($usage);
        break;
    default:
        die("Unknown parameter: " . $option . "\n\n" . $usage);
        break;
    }
}

if ( ! mysql_connect($server, $uid, $pwd) ) {
       die("Failed connecting to server: " . mysql_error());
}

if ($verbose) echo "Connected to server: $server\n";

if ( ! mysql_select_db($database) ) {
       die( "Failed selecting database '$database': " . mysql_error() );
}

if ($verbose) echo "Selected database: " . $database . "\n";

$rs_tables = mysql_query("SHOW TABLES");
if (!$rs_tables || (($num_tables = mysql_num_rows($rs_tables)) <= 0) ) {
       die( "Could not iterate database tables\n" );
}
if ($verbose) echo "Number of tables: $num_tables\n";

$bOk = true;
$checktype = "";

if ($fast) $checktype = "FAST";

while (list($tname) = mysql_fetch_row($rs_tables)) {
    $query = "CHECK TABLE `$tname` $checktype";
    if ($verbose) printf("%3d. $query:\n", ++$tcount);

    $rs_status = mysql_query( $query );
    if (!$rs_status || mysql_num_rows($rs_status) <= 0 ) {
        $msg .= "Could not get status for table $tname\n";
        $bOk = false;
        continue;
    }

    // seek to last row
    mysql_data_seek($rs_status, mysql_num_rows($rs_status)-1);
    $row_status = mysql_fetch_assoc($rs_status);
    if ($row_status['Msg_type'] != "status") {
        $msg .= "Table {$row_status['Table']}: ";
        $msg .= "{$row_status['Msg_type']} = {$row_status['Msg_text']}\n";
        $bOk = false;
        if ($verbose) echo "  ** Check failed!!\n";
    }
    if ($verbose) {
        echo "       {$row_status['Msg_type']} -> {$row_status['Msg_text']}\n";
    }

}

if ( ! $bOk ) die( "Check failed: \n\n" . $msg );

exit(0);
?> 