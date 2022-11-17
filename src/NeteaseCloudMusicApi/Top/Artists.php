<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Top;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 热门歌手
 */
class Artists extends Base
{
	protected string $uri = 'https://music.163.com/api/artist/top';

	protected array $sendParams = [
		'limit' => 50,
		'total' => true,
		'offset' => 0,
	];
}
