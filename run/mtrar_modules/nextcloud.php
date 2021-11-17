<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

 */

$packagename = "Nextcloud";
$packagefile = "/usr/bin/nextcloud";

if (file_exists($packagefile)) {
	$file = explode("\n", file_get_contents($packagefile));

	for ($i = 0; $i < count($file); $i++) {
		if (trim($file[$i]) == 'exec -a "$0" "$HERE/vivaldi-bin" "$@"') {
			$replacezeile = $i;
		}
	}

	if (isset($replacezeile)) {
		$file[$replacezeile] .= " --user-data-dir=/root/.config/vivaldi --no-sandbox";

		file_put_contents($packagefile, '');
		foreach ($file as $line) {
			file_put_contents($packagefile, $line . "\n", FILE_APPEND);
		}
		echo "MTRAR: Updated {$packagename}!\n";
	}
}
