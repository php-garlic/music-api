<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Song;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Detail extends Base
{
	protected string $uri = 'https://music.163.com/api/v3/song/detail';

	protected array $sendParams = [];

	protected function parseSendParam ($params) : array
	{
		$old_ids = explode(',', $this->params['ids']);
		$ids = [];
		foreach ($old_ids as $k => $id) {
			$ids[]['id'] = $id;
		}
		$params['c'] = json_encode($ids);

		return $params;
	}
}
