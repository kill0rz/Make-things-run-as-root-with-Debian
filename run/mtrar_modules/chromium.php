<?php

/*
Makes things run as root Module

@author kill0rz - kill0rz.com

 */

$packagename = "Chromium";
$packagefile = "/usr/bin/chromium";

$file = explode("\n", file_get_contents($packagefile));

for ($i = 0; $i < count($file); $i++) {
	if (trim($file[$i]) == 'exec $LIBDIR/$APPNAME $CHROMIUM_FLAGS "$@"') {
		$replacezeile = $i;
	}
}

if (isset($replacezeile)) {
	$file[$replacezeile] .= " --user-data-dir --no-sandbox";

	file_put_contents($packagefile, '');
	foreach ($file as $line) {
		file_put_contents($packagefile, $line . "\n", FILE_APPEND);
	}
	echo "MTRAR: Updated {$packagename}!\n";
}