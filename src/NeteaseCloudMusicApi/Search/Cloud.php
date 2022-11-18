<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Cloud extends Base
{
	protected string $uri = 'https://music.163.com/api/cloudsearch/pc';

	protected array $sendParams = [
		's' => '',
		'type' => 1,
		'limit' => 30,
		'offset' => 0,
		'total' => true,
	];

	protected function parseSendParam ($params) : array
	{
		$params['s'] = $this->params['keywords'] ?? '';
		return $params;
	}
}
