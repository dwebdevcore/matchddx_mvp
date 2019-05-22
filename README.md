1) Install MS SQL SERVER
First we install MS SQL EXPRESS https://www.microsoft.com/en-us/sql-server/sql-server-editions-express
Then MS SQL MANAGEMENT STUDIO
2) Importing the database
3) Installing drivers for ms sql server
https://docs.microsoft.com/en-us/sql/connect/php/loading-the-php-sql-driver?view=sql-server-2017
For php 7.2 we install the drivers:
php_pdo_sqlsrv_72_ts_x64.dll
php_sqlsrv_72_ts_x64.dll
php_sqlsrv_72_nts_x64.dll
php_pdo_sqlsrv_72_nts_x64.dll
If Windows x86 is installing the x86 driver
4) Change the connection settings in the file conn.php