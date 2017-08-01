<?php  

namespace App\Classes;
		
	class passwordGenerator {

		public static function createPassword() {

			$value = '';
			$characters = 'abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?#$@&';

			for ($i=0; $i <=5 ; $i++) { 
				$index = rand(0, strlen($characters));
				$value .= substr($characters, $index, 1);
			}

			return $value;
		}
	}

 ?>