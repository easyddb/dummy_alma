<?php

$db_user = 'root';
$db_pass = '';
$db_name = 'dummy_alma';

$dir = dirname(__FILE__);

$commands = "mysql -u $db_user" . (!empty($db_pass) ? " -p'$db_pass'" : '')  . " $db_name < $dir/../src/Provider/AlmaBundle/dummy_alma.sql";

echo shell_exec($commands);
exit(0);
