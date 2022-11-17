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

	protected $client;

	public function __construct ()
	{
		$this->client = new Request();
		$this->getRequestFunction();
	}

	public static function make ()
	{
		return (new static())->run();
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
			'form_params' => $params,
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

	protected function getRequestFunction ()
	{
		if ( function_exists('request') ) {
			$this->params = request()->all();
		}

		if ( is_post() ) {
			return $_POST;
		}
		return $_GET;
	}
}
