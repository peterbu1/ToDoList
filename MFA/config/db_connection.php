<?php
/*
 * Name: DATABASE connection script
 * File name: db_connection.php
 * database Connection variables
 * */
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'tuj87538'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'tuvaitie'); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'fa22_3342_tuj87538'); // Database name
define('CHARSET', 'utf8');

function DB()
{
    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}

?>
