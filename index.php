<? 
require './flight/Flight.php';
require('./models/User.php');
require('./models/Diagnosis.php');

Flight::route('GET /', function(){
	Flight::render('home');
});

include('./controllers/static-controller.php');
include('./controllers/user-controller.php');
include('./controllers/diagnostics-controller.php');

Flight::start(); 