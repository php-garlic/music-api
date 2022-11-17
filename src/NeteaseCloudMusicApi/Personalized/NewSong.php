<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Personalized;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 推荐新音乐
 */
class NewSong extends Base
{
	protected string $uri = 'https://music.163.com/api/personalized/newsong';

	protected array $sendParams = [
		'type' => 'recommend',
		'areaId' => 0,
		'limit' => 2,
	];

	public function __construct ()
	{
		parent::__construct();
		$this->sendParams['areaId'] = $this->params['areaId'] ?? 0;
	}
}
