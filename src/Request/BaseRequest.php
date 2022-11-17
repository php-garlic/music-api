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

	public function post ($url, $param = [])
	{
		return $this->client->post($url, $param)->getBody()->getContents();
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
		$ip = $this->randIP();
		return [
			// 'base_uri' => $this->baseUrl,
			'timeout' => 60,
			'verify' => false,
			'headers' => [
				'Accept' => '*/*',
				'Content-type' => 'application/x-www-form-urlencoded',
				'Referer' => $this->baseUrl,
				'User-Agent' => $this->randomUserAgent(),
				'X-Real-IP' => $ip,
				'X-Forwarded-For' => $ip,
				'X-From-Src' => $ip,
				'Connection' => 'keep-alive',
				'Accept-Language' => 'zh-CN,zh;q=0.8,gl;q=0.6,zh-TW;q=0.4',
			],
			'allow_redirects' => [
				'max' => 10,
				'strict' => false,
				'referer' => true,
				'protocols' => ['http', 'https'],
				'track_redirects' => true,
			],
			'debug' => false,
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

	protected function randIP ()
	{
		$ip_long = array(

			['607649792', '608174079'], //36.56.0.0-36.63.255.255

			['1038614528', '1039007743'], //61.232.0.0-61.237.255.255

			['1783627776', '1784676351'], //106.80.0.0-106.95.255.255

			['2035023872', '2035154943'], //121.76.0.0-121.77.255.255

			['2078801920', '2079064063'], //123.232.0.0-123.235.255.255

			['-1950089216', '-1948778497'], //139.196.0.0-139.215.255.255

			['-1425539072', '-1425014785'], //171.8.0.0-171.15.255.255

			['-1236271104', '-1235419137'], //182.80.0.0-182.92.255.255

			['-770113536', '-768606209'], //210.25.0.0-210.47.255.255

			['-569376768', '-564133889'], //222.16.0.0-222.95.255.255

		);
		$rand_key = mt_rand(0, 9);
		$ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
		return $ip;
	}
}
