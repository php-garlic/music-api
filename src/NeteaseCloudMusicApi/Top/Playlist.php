<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Top;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 *歌单 ( 网友精选碟 )
 */
class Playlist extends Base
{
	protected string $uri = 'https://music.163.com/api/playlist/list';

	protected array $sendParams = [
		'cat' => '全部',
		'order' => 'hot',
		'limit' => 50,
		'offset' => 0,
		'total' => true,
	];
}
