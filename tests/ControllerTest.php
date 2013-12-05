<?php


class ControllerTest extends Illuminate\Foundation\Testing\TestCase {

	function createApplication(){
	}

	public function testIndex(){
		$this->call('GET', 'index');
	}

}