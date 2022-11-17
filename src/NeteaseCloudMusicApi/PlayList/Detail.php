<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\PlayList;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 歌单详情
 */
class Detail extends Base
{
	protected string $uri = 'https://music.163.com/api/v6/playlist/detail';

	protected array $sendParams = [
		'id' => '',
		'n' => 100000,
		's' => 8,
	];
}
