<?php
class practice_controller extends base_controller {

    public function test_insert() {

		//echo "You are looking at test_insert";
    	// Our SQL command
			$q = "INSERT INTO users SET
			first_name = 'Sam',
			last_name = 'Seaborn',
			email = 'seaborn@whitehouse.gov'";

		// Run the command
			echo DB::instance(DB_NAME)->query($q);
   }

	public function test_update() {
		
		echo "You are looking at test_update";
		//Our SQL command
			$q = "Update users
			SET email = 'samseaborn@whitehouse.gov'
			WHERE email = 'seaborn@whitehouse.gov'"; 
		
		//Run the command
			echo DB::instance(DB_NAME)->query($q);
   }

	public function test_delete() {
   		echo "You are looking at test_delete";
		//Our SQL command
			$q = "DELETE FROM users
			WHERE email = 'samseaborn@whitehouse.gov'";
	
		//Run the command
			echo DB::instance(DB_NAME)->query($q);
   }
}
