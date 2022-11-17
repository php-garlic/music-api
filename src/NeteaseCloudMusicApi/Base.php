<?php

namespace PhpGarlic\Music\NeteaseCloudMusicApi;

abstract class Base
{
	protected string $uri;
	protected array $sendParams = [
		'total' => true,
		'offset' => 0,
		'limit' => 20,
	];

	protected array $params = [];
	protected array $requestParam = [];

	protected $client;

	public function __construct ($params = [], $requestParam = [])
	{
		$this->requestParam = $requestParam;
		$this->sendParams = array_merge($this->sendParams, $params);
		$this->client = new Request();
		$this->getRequestFunction();
	}

	public static function make ($params = [], $requestParam = [])
	{
		return (new static($params, $requestParam))->run();
	}

	public function run ()
	{
		$params = [];
		foreach ( $this->sendParams as $key => $param ) {
			if ( is_array($param) ) {

				$value = $this->get($key, $param['value'], $param['enum']);
				isset($param['as']) && $params[$param['as']] = $value;
				! isset($param['as']) && $params[$key] = $value;

				if ( isset($param['route']) ) {
					$this->uri = str_replace(
						sprintf("{\$%s}", $param['route']),
						$value,
						$this->uri
					);
				}

			} else {
				$params[$key] = $this->get($key, $param);
			}
		}

		return json_decode($this->client->post($this->uri, [
			'form_params' => $this->parseSendParam($params),
		]), true);
	}

	/**
	 * @param string     $key
	 * @param null       $value
	 * @param array|null $enum
	 *
	 * @return null
	 * @throws \Exception
	 */
	protected function get (string $key, $value = null, array $enum = null)
	{
		if ( ! isset($this->params[$key]) && $value === null ) {
			throw new \Exception(sprintf("{%s}参数不存在", $key));
		}
		$value = $this->params[$key] ?? $value;
		return ! empty($enum) && isset($enum[$value]) ? $enum[$value] : $value;
	}

	protected function getRequestFunction () : array
	{
		if ( function_exists('request') ) {
			$this->params = request()->all();
		}

		if ( is_post() ) {
			$this->params = $_POST;
		}
		if ( is_get() ) {
			$this->params = $_GET;
		}
		$this->params = array_merge($this->params, $this->requestParam);

		return $this->params;
	}

	protected function parseSendParam ($params) : array
	{
		return $params;
	}
}
