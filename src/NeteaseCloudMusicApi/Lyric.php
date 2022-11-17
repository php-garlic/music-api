<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi;

class Lyric extends Base
{
	protected string $uri = 'https://music.163.com/api/song/lyric?_nmclfl=1';

	protected array $sendParams = [
		'id' => '',
		'tv'=> -1,
	    'lv'=> -1,
	    'rv'=> -1,
	    'kv'=> -1,
	];
}
