<?php
	require 'UnitTesting.php';

	class UnitTestingTest extends PHPUnit_Framework_TestCase{
		protected function setUp(){
			$this->UnitTesting = new UnitTesting();
		}

		public function testRead(){
			$result = $this->UnitTesting->select();
			$this->assertFalse($result);
		}

		public function testDelete(){
			$result = $this->UnitTesting->delete_data(1);
			$this->assertFalse($result);
		}
	}
?>