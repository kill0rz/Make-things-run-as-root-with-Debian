<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

Works with versions starting from 1.12.953.8.

 */

$packagename = "Sparkleshare";
$packagefile = "/var/lib/flatpak/app/org.sparkleshare.SparkleShare/x86_64/stable/active/files/bin/sparkleshare";

if (file_exists($packagefile)) {
	$file = explode("\n", file_get_contents($packagefile));

	for ($i = 0; $i < count($file); $i++) {
		if (trim($file[$i]) == 'if [[ $UID -eq 0 ]]; then') {
			$replacezeile = $i;
		}
	}

	if (isset($replacezeile)) {
		unset($file[$replacezeile]);
		unset($file[$replacezeile + 1]);
		unset($file[$replacezeile + 2]);
		unset($file[$replacezeile + 3]);

		file_put_contents($packagefile, '');
		foreach ($file as $line) {
			file_put_contents($packagefile, $line . "\n", FILE_APPEND);
		}
		echo "MTRAR: Updated {$packagename}!\n";
	}
}
