<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Banner;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 *banner( 轮播图 )
 */
class Banner extends Base
{
	protected string $uri = 'https://music.163.com/api/v2/banner/get';

	protected array $sendParams = [
		'type' => [
			0 => 'pc',
			1 => 'android',
			2 => 'iphone',
			3 => 'ipad',
		][0],
	];

}
