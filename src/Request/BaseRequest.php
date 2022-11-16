<?php

namespace PhpGarlic\Music\Request;

use GuzzleHttp\Client;

abstract class BaseRequest
{
	protected $client;

	protected $baseUrl;

	public function __construct ()
	{
		$this->client = new Client($this->getRequestHeaderInfo());
	}

	/**
	 * @param array $header
	 *
	 * @return void
	 */
	public function setRequestHeader (array $header)
	{
		$header = array_merge($this->getRequestHeaderInfo(), $header);
		$this->reloadClient($header);
	}

	/**
	 * @param array $header
	 *
	 * @return void
	 */
	protected function reloadClient (array $header = [])
	{
		$this->client = new Client($header);
	}

	/**
	 * @return array
	 */
	protected function getRequestHeaderInfo () : array
	{
		return [
			'base_uri' => $this->baseUrl,
			'timeout' => 60,
			'verify' => false,
			'headers' => [
				'Accept' => 'application/json',
				'Content-type' => 'application/json;charset=utf-8',
				'Referer' => $this->baseUrl,
				'User-Agent' => $this->randomUserAgent(),
			],
			'allow_redirects' => [
				'max' => 10,
				'strict' => false,
				'referer' => true,
				'protocols' => ['http', 'https'],
				'track_redirects' => true,
			],

			'http_errors' => true,
			'connect_timeout' => 60,
		];
	}

	/**
	 * @param $ua
	 *
	 * @return string
	 */
	public function randomUserAgent ($ua = null) : string
	{
		$userAgentList = [
			'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
			'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
			'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1',
			'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
			'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
			'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 6 Build/LYZ28E) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Mobile Safari/537.36',
			'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_2 like Mac OS X) AppleWebKit/603.2.4 (KHTML, like Gecko) Mobile/14F89;GameHelper',
			'Mozilla/5.0 (iPhone; CPU iPhone OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1',
			'Mozilla/5.0 (iPad; CPU OS 10_0 like Mac OS X) AppleWebKit/602.1.38 (KHTML, like Gecko) Version/10.0 Mobile/14A300 Safari/602.1',
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:46.0) Gecko/20100101 Firefox/46.0',
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',
			'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4',
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:46.0) Gecko/20100101 Firefox/46.0',
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
			'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/13.10586',
		];

		switch ( $ua ) {
			case 'pc' :
				$num = rand(8, count($userAgentList) - 1);
				break;
			case 'mobile' :
				$num = rand(1, 7);
				break;
			case 'linux' :
				$num = 0;
				break;
			default :
				$num = rand(1, count($userAgentList) - 1);
				break;
		}

		return $userAgentList[$num];
	}
}
