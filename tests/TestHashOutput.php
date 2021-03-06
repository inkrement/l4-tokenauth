<?php

use Pichkrement\Tokenauth\Lib\RandomHash;

class TestHashOutput extends PHPUnit_Framework_TestCase {

	/**
	 * testLength
	 *
	 * tests the output length of the SimpleHashGenerator tokens
	 */
	public function testLength(){

		$gen = new RandomHash(10, 'a');

		$token = $gen->getRandomToken();

		$this->assertEquals(strlen($token), 10);
	}

	/**
	 * testMonoAlphabet
	 *
	 * tests a simple and well defined token consisting of 10 a's
	 */
	public function testMonoAlphabet(){

		$gen = new RandomHash(10, 'a');

		$token = $gen->getRandomToken();

		$this->assertEquals($token, "aaaaaaaaaa");
	}

	/**
	 * testDistribution
	 * tests the getToken distribution of the SimpleHashGenerator
	 *
	 * Attention: This test is bad practice, because the results will 
	 * highly depend on random values. Furthermore this test could fail, 
	 * even if the code is correct [but it's very unlikely]
	 */
	public function testDistribution(){

		$gen = new RandomHash(1000, 'aa');

		$token = $gen->getRandomToken();

		/* calculate number of occurences */

		foreach (count_chars($token, 1) as $i => $val) {

			//there should me more than one occurence of each character
			$this->assertGreaterThan(1, $val);
		}
	}

	/**
	 * test Umlauts
	 *
	 * test Hash in combination with german umlauts
	 */
	public function testUmlauts(){

		$gen = new RandomHash(1, 'ÜÖÄüäö');
		$token = $gen->getRandomToken();

		$this->assertContains($token, 'ÜÖÄüäö');
	}


	/**
	 * testUrl
	 *
	 */
	public function testUrl(){
		$gen = new RandomHash(40, '#*?/\\+=öäüÖÜÄß');
		$token = $gen->getRandomToken();

		$this->assertNotContains($token, '#*?/\\+=öäüÖÜÄß');
	}
}