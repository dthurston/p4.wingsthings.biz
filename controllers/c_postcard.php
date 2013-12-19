<?php
class postcard_controller extends base_controller {

    // This class is intended to manage the user postcards.  Either list them (v_postcards_index)
    // or allow the user to create new ones (v_postcard_add).

    public function __construct() {
        parent::__construct();
        // Commented this line out, it was causing the page to not display
        // due to a "headers already sent" error.
        //echo "users_controller construct called<br><br>";
    }


    public function index($error = NULL) {
        // A function to view the existing postcards

        // Setup the View
        $this->template->content = View::instance('v_postcard_index');
        $this->template->title = "Viewing Postcards";

        // Pull the created postcards from the DB and display.
        // Build the query to get all the postcards for the logged in user.
        $q = 'SELECT postcard_id, image_name, created, message FROM postcard WHERE user_id = ' .$this->user->user_id.
            ' ORDER BY created DESC LIMIT 3;';

        # Execute the query to get all the postcards
        # and store the result array in the variable $postcards
        $postcards = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->postcards = $postcards;

        # Render the template
        echo $this->template;
    }

    public function create() {

        // Setup the View
        $this->template->content = View::instance('v_postcard_create');
        $this->template->title = "Create a New Postcard";

        // Pull the last 3 images from the DB and display them
        $q = 'SELECT postcard_id, image_name FROM postcard WHERE user_id = ' .$this->user->user_id.
            ' ORDER BY created DESC LIMIT 3;';

        # Execute the query to get all the postcards
        # and store the result array in the variable $postcards
        $photos = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->photos = $photos;

        // Render the template
        echo $this->template;
    }

    public function p_create() {

        // Insert the postcard into the database
        $newpostcard = 'INSERT INTO postcard SET
                        user_id = '. $this->user->user_id . ',' .
                        ' image_name = "' . $_POST['photo'] . '",' .
                        ' created = ' . $_POST['created'] = Time::now() . ',' .
                        ' modified = ' . $_POST['modified'] = Time::now() . ',' .
                        ' salutation = "' . $_POST['salutation'] . '",' .
                        ' message = "' .$_POST['what-he-saw'] . '",' .
                        ' encouragement = "' .$_POST['encouragement'] .'";';

    echo $newpostcard;
//        '
        // This should be changed to a post signup view.
        // For now, just route them to the index page...
        //        Router::redirect("/");
        die();
        // Pull the images from the DB and display them
        $q = 'SELECT postcard_id, image_name FROM postcard WHERE user_id = ' .$this->user->user_id. ';';

        # Execute the query to get all the postcards
        # and store the result array in the variable $postcards
        $photos = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->photos = $photos;

        // Render the template
        echo $this->template;
    }

    public function p_upload() {
        //var_dump($_FILES);
        # if the user specified a new image file, upload it
        if ($_FILES['newphoto']['error'] == 0)
        {

        // function to generate a random filename for the photo
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }

        // upload the image
        $image = Upload::upload($_FILES, "/uploads/photos/",
            array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), generateRandomString());

        if($image == 'Invalid file type.') {
            # return an error
            Router::redirect("/users/profile/error");
        }
        else {
            # create a link to the image in the DB image column of the users table
            $data = Array("user_id" => $this->user->user_id,
                "image_name" => $image,
                "created" => $_POST['created'] = Time::now(),
                "modified" => $_POST['modified'] = Time::now()
            );

            DB::instance(DB_NAME)->insert("postcard", $data);

            # resize the image to something sane
            $imgObj = new Image(APP_PATH ."uploads/photos/". $image);
            $imgObj->resize(100,100, "crop");
//            $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . $image);
            $imgObj->save_image(APP_PATH ."uploads/photos/" . $image);

            # Redirect to the postcard create page
            Router::redirect('/postcard/create');
        }
        }
    else {
            # Something has failed in the profile update
            Router::redirect("/users/profile/error");
    }


    }




    public function edit() {
        // A function to create a postcard

        // Setup the View
        $this->template->content = View::instance('v_postcard_edit');
        $this->template->title = "Editing Postcard";

        // Render the template
        echo $this->template;
    }

    public function photo($error = NULL) {
        // A function to view and upload a photo

        // if user is blank, then they're not logged in - redirect to login
        if (!$this->user) {
            router::redirect('/users/login');
        }

        // pass the profile view to the 'content' area of the master template
        $this->template->content = View::instance('v_postcard_index');

        // title for this page
        $this->template->title = $this->user->first_name . " " . $this->user->last_name . "'s Photos";

        // pass errors, if any
        $this->template->content->error = $error;

        //render the view
        echo $this->template;
    }

    // A function to upload a photo
    public function photo_update() {

        // If there is no one logged in, redirect to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }
        //
        if ($_FILES['avatar']['error'] == 0) {
            # upload the image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->user_id);

            if($image == 'Invalid file type.') {
                # return an error
                Router::redirect("/postcard/error");
            } else {
                # create a link to the image in the DB image column of the users table
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

                # resize the image to something sane
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/photos/' . $image);
                $imgObj->resize(100,100, "crop");
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/photos/' . $image);
            }
        }

        else {
            # Something has failed in the profile update
            Router::redirect("/postcard/error");
        }

        # Redirect to the profile page
        router::redirect('/postcard/photo');
    }



    public function error() {
        // Set up the View
        $this->template->content = View::instance('v_postcard_error');
        $this->template->title = "YOU HAVE FAILED";

        # Render the template
        echo $this->template;
    }
}