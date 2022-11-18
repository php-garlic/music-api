<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Suggest extends Base
{
	protected string $uri = 'https://music.163.com/api/search/suggest/web';

	protected array $sendParams = [
		's' => '',
	];

	protected function parseSendParam ($params) : array
	{
		return [
			's' => $this->params['keywords'] ?? ''
		];
	}
}
