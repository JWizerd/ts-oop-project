<?php

/**
 * @todo  utilize code sample below to set timeout IF js proves to be troublesome
 */
// 2 hours in seconds
// $inactive = 7200; 
// ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours

// session_start();

// if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
//     // last request was more than 2 hours ago
//     session_unset();     // unset $_SESSION variable for this page
//     session_destroy();   // destroy session data
// }
// $_SESSION['testing'] = time(); // Update session

// must render session in this file as all header from view files are being renderred here
session_start();

function session_manager() {
	if (isset($_SESSION['user_token'])) {
		$username      = $_SESSION['username'];
		$session_token = $_SESSION['user_token'];
		$user_token    = User::get_user_session_token($username);

		if ($session_token !== $user_token) {
			Flight::redirect('/');
		}  
		
	} else {
		Flight::redirect('/');
	}
}

function admin_session_manager() {
	if (isset($_SESSION['user_token'])) {
		$username      = $_SESSION['username'];
		$session_token = $_SESSION['user_token'];
		$is_admin = User::is_admin($username);

		if ($is_admin !== 1) {
			Flight::redirect('/');
		}
		
	} else {
		Flight::redirect('/');
	}
}

Flight::route('GET /register', function() {
	admin_session_manager();
	Flight::render('register', array('template_name' => 'register'));
});

Flight::route('GET /admin', function() {
	admin_session_manager();
	$username = $_SESSION['username'];
	$admin = (string)User::is_admin($username);
	Flight::render('admin', array('template_name' => 'admin'));
});

?>