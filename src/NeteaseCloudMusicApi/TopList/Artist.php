<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\TopList;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 *
 * 热门歌手
 */
class Artist extends Base
{
	protected string $uri = 'https://music.163.com/api/toplist/artist';

	protected array $sendParams = [
		'type' => 1,
		'limit' => 100,
		'offset' => 0,
		'total' => true,
	];
}
