<?php

require './vendor/autoload.php';

var_dump(\PhpGarlic\Music\NeteaseCloudMusicApi\Search\Search::make([], [
	'keywords' => '林俊杰',
]));
