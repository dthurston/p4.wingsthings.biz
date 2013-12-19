<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
	    // Commented this line out, it was causing the page to not display
	    // due to a "headers already sent" error.
        //echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
		# Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;
    }
    
	public function p_signup() {

        // Need to add a check for duplicate email

        // Store the created and modified times in the DB
    		$_POST['created']  = Time::now();
    		$_POST['modified'] = Time::now();
		
		// Encrypt the password using the salts from config.php
    		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

    	// Create an encrypted token via their email address and a random string
    		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
    		
		// Insert the user into the database
    		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

    	// This should be changed to a post signup view.
        // For now, just route them to the index page...
        Router::redirect("/");
    }

	public function login($error = NULL) {

    	# Set up the view
    	$this->template->content = View::instance('v_users_login');
        $this->template->title   = APP_NAME ." Login";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render the view
    	echo $this->template;
}

	public function p_login() {
        # Set up the view
        $this->template->content = View::instance('v_users_login');

        # Verify there is an email address entered
        if(!$_POST['email']) {
            $this->template->content->error = '<p>Please enter an email address</p>';
            echo $this->template;
        }

    	    # Sanitize the form input data
    		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

            # Escape HTML chars
            $_POST['email'] = stripslashes(htmlspecialchars($_POST['email']));

            # Hash submitted password
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

            # Search the db for this email and password
            # Retrieve the token if it's available
            $q = "SELECT token
            FROM users
            WHERE email = '".$_POST['email']."'
            AND password = '".$_POST['password']."'";

            $token = DB::instance(DB_NAME)->select_field($q);

		# Login failed
    		if(!$token) {

        		# Note the addition of the parameter "error"
        		$this->template->content->error = '<p>This username &amp; password combination was not found.</p>';
				echo $this->template;
    		}
    		# Login passed
    		else {
        		setcookie("token", $token, strtotime('+2 weeks'), '/');
        		Router::redirect("/");
    }

}

    public function logout() {

    # Generate and save a new token for next login
    $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

    # Create the data array we'll use with the update method
    # In this case, we're only updating one field, so our array only has one entry
    $data = Array("token" => $new_token);

    # Do the update
    DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

    # Delete their token cookie by setting it to a date in the past - effectively logging them out
    setcookie("token", "", strtotime('-1 year'), '/');

    # Send them back to the main index.
    Router::redirect("/");

}

    public function profile($user_name = NULL) {

        // If there is no one logged in, redirect to the login page
        if(!$this->user) {
        Router::redirect("/users/login");
        }

    # Setup view
    $this->template->content = View::instance('v_users_profile');

    # Set page title
    $this->template->title = $this->user->first_name . "'s ". APP_NAME ." Profile";

    # Create an array of 1 or many client files to be included in the head
    $client_files_head = Array(
        '/css/widgets.css',
        '/css/profile.css'
        );

    # Use load_client_files to generate the links from the above array
    $this->template->client_files_head = Utils::load_client_files($client_files_head);  

/*    # Create an array of 1 or many client files to be included before the closing </body> tag
    $client_files_body = Array(
        '/js/widgets.min.js',
        '/js/profile.min.js'
        );
*/

    # Use load_client_files to generate the links from the above array
    $this->template->client_files_body = Utils::load_client_files($client_files_body);

    # Pass information to the view fragment
    $this->template->content->user_name = $user_name;

    # Render View
    echo $this->template;
    }

    public function profile_update() {
        # if the user specified a new image file, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            # upload the image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->user_id);

            if($image == 'Invalid file type.') {
                # return an error
                Router::redirect("/users/profile/error");
            }
            else {
                # create a link to the image in the DB image column of the users table
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

                # resize the image to something sane
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
                $imgObj->resize(100,100, "crop");
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
            }
        }

        else {
            # Something has failed in the profile update
            Router::redirect("/users/profile/error");
        }

        # Redirect to the profile page
        router::redirect('/users/profile');
    }



} #EOC
