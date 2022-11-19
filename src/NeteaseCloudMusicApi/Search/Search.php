<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Search extends Base
{
	protected string $uri = 'https://music.163.com/api/search/voice/get';
	protected array $sendParams = [
		'keyword' => '',
		'scene' => 'normal',
		'limit' => 30,
		'offset' => 0,
	];

	protected function parseSendParam ($params) : array
	{
		$params['keyword'] = $this->params['keywords'] ?? '';
		return $params;
	}
}
