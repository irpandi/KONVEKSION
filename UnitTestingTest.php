<?php
	require 'UnitTesting.php';

	class UnitTestingTest extends PHPUnit_Framework_TestCase{
		protected function setUp(){
			$this->UnitTesting = new UnitTesting();
		}

		public function testSelect(){
			$result = $this->UnitTesting->select();
			$this->assertTrue($result);
		}

		public function testDelete(){
			$result = $this->UnitTesting->delete_data(1);
			$this->assertTrue($result);
		}
	}
?>