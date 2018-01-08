<?php
	require 'UnitTesting.php';
	require_once 'PHPUnit/Framework/TestCase.php';

	class UnitTestingTest extends PHPUnit_Framework_TestCase{
		protected function setUp(){
			$this->UnitTesting = new UnitTesting();
		}

		public function testGaji(){
			$result = $this->UnitTesting->gaji(100000,5000,50000);
			$this->assertEquals(55000,$result);
		}

		public function testGaji_total(){
			$result = $this->UnitTesting->gaji_total(5000,50000,10000,10,10,10,2000,1000,1000);
			$this->assertEquals(85000,$result);
		}
		
		public function testUsername(){
			include ("koneksi/connection.php");
			$login = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE username = 'admin01'");
			$user = mysqli_fetch_array($login);
			$test_user = $user['username'];
				
			$content = $test_user;
			$this->assertEquals('admin01',$content);
		}
			
		public	function testUsernameFalse(){
			include ("koneksi/connection.php");
			$login = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE username = 'admin01'");
			$user = mysqli_fetch_array($login);
			$test_user = $user['username'];
				
			$content = $test_user;
			$this->assertNotEquals('admin',$content);
		}
			
		public function testPassword(){
			include ("koneksi/connection.php");
			$login = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE password = md5('adminsatu')");
			$user = mysqli_fetch_array($login);
			$test_user = $user['password'];
				
			$content = $test_user;
			$this->assertEquals(md5('adminsatu'),$content);
		}
			
		public	function testPasswordFalse(){
			include ("koneksi/connection.php");
			$login = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE password = 'adminsatu'");
			$user = mysqli_fetch_array($login);
			$test_user = $user['password'];
				
			$content = $test_user;
			$this->assertNotEquals('admin',$content);
		}
	}
?>
