<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class HotDetail extends Base
{
	protected string $uri = 'https://music.163.com/api/hotsearchlist/get';

	protected array $sendParams = [];
}
