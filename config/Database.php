<?php
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['localhost_db'] The hostname of your database server.
|	['username_db'] The username used to connect to the database
|	['password_db'] The password used to connect to the database
|	['database_db'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['thanhdieudb'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/
include_once($_SERVER['DOCUMENT_ROOT'].'/app/function/install.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/app/function/db.sql.php');
try {
    $thanhdieudb=mysqli_connect($localhost_db,$username_db,$password_db,$database_db);
    if (!$thanhdieudb) {
        die(require_once($_SERVER['DOCUMENT_ROOT'].'/app/insert/error/Error.Connection.Database.php'));
    }
} catch (mysqli_sql_exception $e) {
    die(require_once($_SERVER['DOCUMENT_ROOT'].'/app/insert/error/Error.Connection.Database.php'));
} catch (Exception $e) {
    die("Lỗi: ".$e->getMessage());
}
require_once(__DIR__.'/Common.php');
/**
 * Developed ThanhDieu || WusTeam (Ws) © 2023
 */