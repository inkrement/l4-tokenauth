<?php

use Pichkrement\Tokenauth\SimpleHashGenerator as Hash;

class TestHashOutput extends PHPUnit_Framework_TestCase {

	/**
	 * testLength
	 *
	 * tests the output length of the SimpleHashGenerator tokens
	 */
	public function testLength(){

		$token = Hash::getToken(10, "a");

		$this->assertEquals(strlen($token), 10);
	}

	/**
	 * testMonoAlphabet
	 *
	 * tests a simple and well defined token consisting of 10 a's
	 */
	public function testMonoAlphabet(){

		$token = Hash::getToken(10, "a");

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
		$token = Hash::getToken(1000, "ab");

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
		$token = Hash::getToken(1, "ÜÖÄüäö");

		$this->assertContains($token, 'ÜÖÄüäö');
	}
}