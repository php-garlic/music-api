<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Personalized;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 推荐歌单
 */
class Personalized extends Base
{
	protected string $uri = 'https://music.163.com/api/personalized/playlist';

	protected array $sendParams = [
		'limit' => 30,
		'total' => true,
		'n' => 1000,
	];
}
