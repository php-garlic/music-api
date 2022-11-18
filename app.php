<?php

require './vendor/autoload.php';

var_dump(\PhpGarlic\Music\NeteaseCloudMusicApi\Search\Cloud::make([], [
	'keywords' => '林俊杰',
]));
