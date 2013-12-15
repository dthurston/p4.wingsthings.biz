<?php
class users_controller extends base_controller {

    // This class is intended to manage the user postcards.  Either list them (v_postcards_index)
    // or allow the user to create new ones (v_postcard_add).

    public function __construct() {
        parent::__construct();
        // Commented this line out, it was causing the page to not display
        // due to a "headers already sent" error.
        //echo "users_controller construct called<br><br>";
    }

    // Add new code here
    
}