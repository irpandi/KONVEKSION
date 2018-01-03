<?php
	require 'UnitTesting.php';

	class UnitTestingTest extends PHPUnit_Framework_TestCase{
		protected function setUp(){
			$this->UnitTesting = new UnitTesting();
		}

		public function testSelect(){
			$result = $this->UnitTesting->select();
			$this->assertFalse($result);
		}

		public function testDelete(){
			$result = $this->UnitTesting->delete_data(1);
			$this->assertFalse($result);
		}

		public function testUsernameFalse(){
			$result = $this->UnitTesting->UsernameFalse();
			$this->assertFalse($result);
		}

		public function testPasswordFalse(){
			$result = $this->UnitTesting->PasswordFalse();
			$this->assertFalse($result);
		}
	}
?>