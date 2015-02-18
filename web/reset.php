<?php

$db_user = 'root';
$db_pass = '';
$db_name = '';

$dir = dirname(__FILE__);

$commands = array(
  "cd $dir",
  "mysql -u root -p'$db_pass' $db_name < $dir/../src/Provider/AlmaBundle/dummy_alma.sql"
);

$cmd = implode(' && ', $commands);
echo shell_exec($cmd);
exit(0);
