<?php

if ( ! function_exists('dd') ) {
	/**
	 * Created by PhpStorm.
	 * User: kilingzhang
	 * Date: 2020-04-18
	 * Time: 17:20
	 */

	/**
	 * @param      $data
	 * @param bool $isExit
	 */
	function dd ($data, $isExit = true)
	{
		if ( isset($_SERVER['SHELL']) || (PHP_SAPI === 'cli') ) {
			echo "\n";
		} else {
			echo "<pre>";
		}
		var_dump($data);
		if ( isset($_SERVER['SHELL']) || (PHP_SAPI === 'cli') ) {
			echo "\n";
		} else {
			echo "</pre>";
		}
		$isExit && exit;
	}
}


/**
 * @todo: 判断是否为post
 */
if ( ! function_exists('is_post') ) {
	function is_post ()
	{
		return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
	}
}

/**
 * @todo: 判断是否为get
 */
if ( ! function_exists('is_get') ) {
	function is_get ()
	{
		return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'GET';
	}
}

/**
 * @todo: 判断是否为ajax
 */
if ( ! function_exists('is_ajax') ) {
	function is_ajax ()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST';
	}
}

/**
 * @todo: 判断是否为命令行模式
 */
if ( ! function_exists('is_cli') ) {
	function is_cli ()
	{
		return (PHP_SAPI === 'cli' or defined('STDIN'));
	}
}

