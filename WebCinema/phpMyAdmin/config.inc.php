<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * phpMyAdmin sample configuration, you can use it as base for
 * manual configuration. For easier setup you can use setup/
 *
 * All directives are explained in Documentation.html and on phpMyAdmin
 * wiki <http://wiki.phpmyadmin.net>.
 *
 * @package phpMyAdmin
 */


$i = 0;


$i++;
$cfg['PmaAbsoluteUri'] = 'http://theatrumcinema.informaticaneko.es/phpMyAdmin/';
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['host'] = 'db405849310.db.1and1.com';
$cfg['Servers'][$i]['only_db'] ='db405849310';
$cfg['Servers'][$i]['user'] = 'dbo405849310';
$cfg['Servers'][$i]['password'] = 'modesuperprofe';


?>
