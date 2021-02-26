<?php

	error_reporting(E_ALL);

	class file {
		public $name;
		public $extension;

		public function name($name,$extension){
			$this->name = $name;
			$this->extension = $extension;
		}
	}
	
	function delet ($path){
		if(file_exists($path) && is_dir($path)){
			$dir = scandir($path);
			 $files = array_diff($dir, array('.', '..'));
			foreach ($files as  $file) {
				$fil = new file();
				$fil->name = pathinfo($file,PATHINFO_BASENAME);
				$fil->extension = pathinfo($file,PATHINFO_EXTENSION);
				if($fil->extension=="bak"){
					unlink("$path/$fil->name");
					echo "File Delete $fil->name \n";
				} else if (is_dir("$path/$file")){
					delet("$path/$file");
				} 
			}

		} else { echo "ERROR: The directory does not exist."; }
	} 

	$path = readline("Dir: ");

	delet($path);

?>