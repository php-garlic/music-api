<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Recommend;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * Class Songs
 *
 * 获取每日推荐歌曲
 * 说明:调用此接口,可获得每日推荐歌曲(需要登录)
 *
 * 接口地址:
 * /recommend/songs
 *
 * 调用例子:
 * http://i.music.163.com/recommend/songs
 *
 */
class Songs extends Base
{
	protected string $uri = 'https://music.163.com/weapi/v1/discovery/recommend/songs';

	protected array $sendParams = [
		'total' => true,
		'offset' => 0,
		'limit' => 20,
	];
}
