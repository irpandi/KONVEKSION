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

		public function testUpdate_and_insert_data_gaji_karyawan_admin(){
			$result = $this->UnitTesting->update_and_insert_data_gaji_karyawan_admin(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
			$this->assertFalse($result);
		}
	}
?>