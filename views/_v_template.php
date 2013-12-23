<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Common CSS/JSS -->
    <!-- Load Twitter Bootstrap -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/postcard.css" type="text/css">

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
</head>

<body>
    <div class="container">
    <div id="nav">

        <!-- everyone gets the Home link -->
        <a href='/'>Home | </a>

        <?php if($user): ?>
        <!-- Menu -- users who are logged in -->
        <a href='/users/logout'>Logout | </a>
        <a href='/users/profile'>Profile | </a>
        <a href='/postcard/index'>Sent Postcards | </a>
        <a href='/postcard/create'>Create Postcard </a>


        <?php else: ?>
        <!-- Menu users who are not logged in -->
        <a href='/users/signup'>Sign up | </a>
        <a href='/users/login'>Log in </a>

        <?php endif; ?>

    </div>

    <div id="section">
        <br>
        <!-- Display the page content -->
        <?php if(isset($content)) echo $content; ?>
        <!-- Display the body -->
        <?php if(isset($client_files_body)) echo $client_files_body; ?>
    </div>

    </div> <!-- End container -->


<p style="text-align: center;">Derek Thurston, CSCI E-15 Dynamic Web Applications, Fall 2013</p>
    <!-- Load Jquery -->
    <script type="text/javascript" src="/js/jquery-2.0.2.min.js"></script>

</body>
</html>
