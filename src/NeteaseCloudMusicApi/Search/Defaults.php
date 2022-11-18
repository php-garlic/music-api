<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Search;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

class Defaults extends Base
{
	protected string $uri = 'https://interface3.music.163.com/api/search/defaultkeyword/get';

	protected array $sendParams = [];
}
