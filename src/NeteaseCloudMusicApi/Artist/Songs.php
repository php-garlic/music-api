<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Artist;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Songs extends Base
{
	protected string $uri = 'https://music.163.com/api/v1/artist/songs';

	protected array $sendParams = [
		'id' => '',
		'private_cloud' => 'true',
		'work_type' => 1,
		'order' => 'hot',
		'offset' => 0,
		'limit' => 100,
	];
}
