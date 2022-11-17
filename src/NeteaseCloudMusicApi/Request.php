<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi;

use PhpGarlic\Music\Request\BaseRequest;

class Request extends BaseRequest
{
	protected $iv = '0102030405060708';
	protected $presetKey = '0CoJUm6Qyw8W8jud';
	protected $linuxapiKey = 'rFgB&h#%2?^eDg:Q';
	protected $eapiKey = 'e82ckenh8dichen8';
	protected $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDgtQn2JZ34ZC28NWYpAUd98iZ37BUrX/aKzmFbt7clFSs6sXqHauqKWqdtLkF2KexO40H1YTX8z2lSgBBOAxLsvaklV8k4cBFK9snQXE9/DDaFt6Rr7iVZMldczhC0JNgTz+SHXT6CBHuX3e9SdB1Ua44oncaTWz7OBGLbCiK45wIDAQAB
-----END PUBLIC KEY-----';
	// use static secretKey, without RSA algorithm
	protected $secretKey = 'TA3YiYCfY2dDJQgg';
	protected $encSecKey = '84ca47bca10bad09a6b04c5c927ef077d9b9f1e37098aa3eac6ea70eb59df0aa28b691b7e75e4f1f9831754919ea784c8f74fbfadf2898b0be17849fd656060162857830e241aba44991601f137624094c114ea8d17bce815b0cd4e5b8e2fbaba978c6d1d14dc3d1faf852bdd28818031ccdaaa13a6018e1024e2aae98844210';
	protected $base62 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	protected $userAgent;
	protected $cookies = 'appver=8.2.30; os=iPhone OS; osver=15.0; EVNSM=1.0.0; buildver=2206; channel=distribution; machineid=iPhone13.3';
	protected $baseUrl = 'https://music.163.com/';

	protected function getRequestHeaderInfo () : array
	{

		 return array_merge(parent::getRequestHeaderInfo(), [
			 'headers' => [
				 'Cookie' => $this->cookies
			 ],
		 ]);
	}
}
