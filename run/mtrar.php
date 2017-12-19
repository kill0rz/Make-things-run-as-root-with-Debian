<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

See https://github.com/kill0rz/Make-things-run-as-root-with-Debian for further information

Execute:
Place this file and modules folder somewhere and run this file with
#php mtrar.php
- done

 */

$currentdir = dirname(__FILE__) . "/";
$modulesdir = $currentdir . "mtrar_modules/";

foreach (glob($modulesdir . "*.php") as $filename) {
	include $filename;
}