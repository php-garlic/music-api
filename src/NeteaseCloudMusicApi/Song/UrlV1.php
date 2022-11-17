<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi\Song;

use PhpGarlic\Music\NeteaseCloudMusicApi\Base;

/**
 * 获取歌曲链接
 *
 * 此版本不再采用 br 作为音质区分的标准
 * 而是采用 standard, exhigh, lossless, hires 进行音质判断
 */
class UrlV1 extends Url
{
	protected string $uri = 'https://interface.music.163.com/api/song/enhance/player/url/v1';

	protected array $sendParams = [
		'ids' => '',
		'level' => [
           'lossless',
           'standard',
           'exhigh',
           'hires',
       ][0],
		'encodeType' => 'flac',
	];
}
