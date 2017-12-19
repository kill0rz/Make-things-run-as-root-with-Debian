<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

 */

$packagename = "Steam";
$packagefile = "/usr/bin/steam";

if (file_exists($packagefile)) {
	$doreplace = false;
	$file = explode("\n", file_get_contents($packagefile));

	for ($i = 0; $i < count($file); $i++) {
		if (trim($file[$i]) == "# Don't allow running as root") {
			unset($file[$i]);
			unset($file[$i + 1]);
			unset($file[$i + 2]);
			unset($file[$i + 3]);
			unset($file[$i + 4]);
			$doreplace = true;
			break;
		}
	}

	if ($doreplace) {
		file_put_contents($packagefile, '');
		foreach ($file as $line) {
			if ($line) {
				file_put_contents($packagefile, $line . "\n", FILE_APPEND);
			}
		}
		echo "MTRAR: Updated {$packagename}!\n";
	}
}
