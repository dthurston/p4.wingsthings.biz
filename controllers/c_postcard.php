<?php
class postcard_controller extends base_controller {

    // This class is intended to manage the user postcards.

    public function __construct() {
        parent::__construct();
    }

    // A function to view the existing postcards
    public function index() {

        // Setup the View
        $this->template->content = View::instance('v_postcard_index');
        $this->template->title = "Viewing Postcards";

        // Pull the created postcards from the DB and display.
        $q = 'SELECT * FROM postcard WHERE user_id = ' .$this->user->user_id.
            ' AND message != "" ORDER BY created DESC LIMIT 3;';

        // Execute the query to get all the postcards
        // and store the result array in the variable $postcards
        $postcards = DB::instance(DB_NAME)->select_rows($q);
        if (count($postcards) == 0) {
            $nocards = '<h3>You don\'t have any postcards yet!</h3> Create one <a href="/postcard/create">here</a>';
        }

        // Pass data to the View
        $this->template->content->postcards = $postcards;
        $this->template->content->nocards = $nocards;
        // Render the template
        echo $this->template;
    }

    public function create() {
        // If there is no one logged in, redirect to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }

        // Setup the View
        $this->template->content = View::instance('v_postcard_create');
        $this->template->title = "Create a New Postcard";

        // Pull the last 3 images from the DB and display them
        $q = 'SELECT DISTINCT image_name FROM postcard WHERE user_id = ' .$this->user->user_id.
            ' ORDER BY created DESC LIMIT 3;';

        # Execute the query to get all the postcards
        # and store the result array in the variable $postcards
        $photos = DB::instance(DB_NAME)->select_rows($q);
        if (count($photos) == 0) {
            $photos = '0';
        }

        # Pass data to the View
        $this->template->content->photos = $photos;

        // Render the template
        echo $this->template;
    }

    public function p_create() {

        // check to make sure someone is logged in and that all the fields have been filled
        // in on the create page (zip is the last field).
        if ($this->user && $_POST['zip']) {
        // Insert the postcard into the database
        $newpostcard = 'INSERT INTO postcard SET
                        user_id = '. $this->user->user_id . ',' .
                        ' image_name = "' . $_POST['photo'] . '",' .
                        ' created = ' . $_POST['created'] = Time::now() . ',' .
                        ' modified = ' . $_POST['modified'] = Time::now() . ',' .
                        ' recipient = "' . $_POST['recipient'] . '",' .
                        ' message = "' .$_POST['message'] . '",' .
                        ' address = "' .$_POST['address'] . '",' .
                        ' city = "' .$_POST['city'] . '",' .
                        ' state = "' .$_POST['state'] . '",' .
                        ' zip = ' .$_POST['zip'] . ';';

        // Execute the query
        $photos = DB::instance(DB_NAME)->query($newpostcard);

        # Redirect to the postcard view page
        Router::redirect('/postcard/index');
        } else {
        Router::redirect('/postcard/create/error');
        }
    }

    public function p_upload() {
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
            $image = Upload::upload($_FILES, "/uploads/photos/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), generateRandomString());

            if($image == 'Invalid file type.') {
                // return an error
                //$this->template->content->error = $image;
                Router::redirect("/postcard/create/error");
            }
            else {
                // create a link to the image in the DB image column of the users table
                $data = Array("user_id" => $this->user->user_id,
                    "image_name" => $image,
                    "created" => $_POST['created'] = Time::now(),
                    "modified" => $_POST['modified'] = Time::now()
                );

                DB::instance(DB_NAME)->insert("postcard", $data);

                // resize the image to something sane
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] ."/uploads/photos/". $image);
                $imgObj->resize(350,650, "crop");
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . "/uploads/photos/" . $image);

                // Redirect to the postcard create page
                Router::redirect('/postcard/create');
            }
        }
        else {
            // Something has failed in the photo upload
            Router::redirect("/postcard/error");
        }
    } // End of function p_upload()

    public function error($error = NULL) {
        // Set up the View
        $this->template->content = View::instance('v_postcard_error');
        $this->template->title = "YOU HAVE FAILED";
        $this->template->error = $error;
        # Render the template
        echo $this->template;
    }
}