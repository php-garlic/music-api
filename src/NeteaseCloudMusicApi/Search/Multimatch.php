<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Multimatch extends Base
{
	protected string $uri = 'https://music.163.com/api/search/suggest/multimatch';

	protected array $sendParams = [
		'type' => 1,
		's' => '',
	];

	protected function parseSendParam ($params) : array
	{
		$params['s'] = $this->params['keywords'];
		return $params;
	}
}
