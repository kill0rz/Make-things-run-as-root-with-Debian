<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

 */

$packagename = "VLC Player";
$packagefile = "/usr/bin/vlc";

if (file_exists($packagefile)) {
	shell_exec("sed -i 's/geteuid/getppid/' {$packagefile}");
}
