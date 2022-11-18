<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Hot extends Base
{
	protected string $uri = 'https://music.163.com/api/search/hot';

	protected array $sendParams = [
		'type' => 1111,
	];
}
