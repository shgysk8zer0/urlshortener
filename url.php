<?php
namespace shgysk8zer0\URLShortener;

final class URL
{
	const MAGIC_PROPERTY = '_data';

	private $_data = array();

	public function __construct($config)
	{
		// Connect to database
	}

	public function __get($key)
	{
		if ($this->__isset($key)) {
			return $this->{self::MAGIC_PROPERTY}[$key];
		}
	}

	public function __set($key, $value)
	{
		$this->{self::MAGIC_PROPERTY}[$key] = "$value";
	}

	public function __isset($key)
	{
		return array_key_exists($key, $this->{self::MAGIC_PROPERTY});
	}

	public function __unset($key)
	{
		unset($this->{self::MAGIC_PROPERTY}[$key]);
	}

	public function __invoke($key)
	{
		if ($this->__isset($key)) {
			http_response_code('303');
			header("Location: {$this->__get($key)}");
		} else {
			http_response_code(404);
			exit();
		}
	}

	private function _incrementURL($key)
	{
		// Update click count in database
	}
}
