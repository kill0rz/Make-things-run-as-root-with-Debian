<?php

/*
Makes things run as root Module

@author INSERTAUTHORHERE

 */

$packagename = "XXX";
$packagefile = "/usr/bin/XXX";

if (file_exists($packagefile)) {
	$file = explode("\n", file_get_contents($packagefile));

	for ($i = 0; $i < count($file); $i++) {
		if (trim($file[$i]) == '//CONDITION') {
			$replacezeile = $i;
		}
	}

	if (isset($replacezeile)) {
		$file[$replacezeile] .= "//REPLACEACTION";

		file_put_contents($packagefile, '');
		foreach ($file as $line) {
			file_put_contents($packagefile, $line . "\n", FILE_APPEND);
		}
		echo "MTRAR: Updated {$packagename}!\n";
	}
}