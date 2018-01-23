<?php

abstract class Control{
	abstract public function doaction($a);

	public function show($url,$data=null){
		include_once $url;
	}
}