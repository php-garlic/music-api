<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Artist;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Detail extends Base
{
	protected string $uri = 'https://music.163.com/api/artist/head/info/get';

	protected array $sendParams = [
		'id' => '',
	];
}
