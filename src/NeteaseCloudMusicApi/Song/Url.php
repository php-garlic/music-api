<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Song;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 获取歌曲链接
 */
class Url extends Base
{
	protected string $uri = 'https://interface3.music.163.com/api/song/enhance/player/url';

	protected array $sendParams = [
		'ids' => '',
		'br' => 999000,
	];

	protected function parseSendParam ($params) : array
	{
		$params['ids'] = "[{$this->params['id']}]";

		return $params;
	}
}
