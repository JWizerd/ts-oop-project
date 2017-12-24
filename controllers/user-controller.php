<?

Flight::route('POST /login', function(){	
	if (isset($_POST['login'])) {
		$username  = htmlspecialchars($_POST['username']);
		$password  = htmlspecialchars($_POST['password']);
		$logged_in = User::login($username, $password);
		if ($logged_in) {
			Flight::redirect('/diagnostic-code');
		} else {
			Flight::render('home', array('logged_in' => $logged_in));
		}
	}

});

Flight::route('POST /register', function(){
	if (isset($_POST['register'])) {
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		
		$registered = User::is_registered($username);

		if (!$registered) {
			User::register($username, $password);	
			Flight::render('register', array('registered' => $registered));
		} elseif($registered) {
		  Flight::render('register', array('registered' => $registered));
		}
	}
});

Flight::route('GET /update-user', function(){
	admin_session_manager();
	Flight::render('update-user');
});

Flight::route('GET /view-users', function(){	
	session_manager();
	$users = User::get_all_users();
	Flight::render('view-users', array('users' => $users));
});

Flight::route('GET /logout', function(){	
	User::logout();
	Flight::redirect('/');
});

Flight::route('POST /delete-user', function() {
	if (isset($_POST['delete-user'])) {
		$username = $_POST['username'];
		User::delete_user($username);
		Flight::redirect('/view-users');
	}
});