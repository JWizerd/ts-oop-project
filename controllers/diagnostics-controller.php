<?php 

// DIAGNOSES

Flight::route('GET /diagnostic-code', function() {
	session_manager();
	$codes = Diagnosis::get_all_codes();
	Flight::render('diagnostic-code', array(
		'template_name' => 'diagnostic-code',
		'codes'         => $codes
		)
	);
});

Flight::route('POST /add-diagnosis', function(){
	admin_session_manager();
	if (isset($_POST['add-diagnosis'])) {
		$code             = htmlspecialchars($_POST['diagnosis-code']);
		$the_title        = htmlspecialchars($_POST['the_title']);
		$min_visits       = htmlspecialchars($_POST['min_visits']);
		$max_visits       = htmlspecialchars($_POST['max_visits']);
		$chiro_overview   = htmlspecialchars($_POST['chiro_overview']);
		$massage_overview = htmlspecialchars($_POST['massage_overview']);
		$acu_overview     = htmlspecialchars($_POST['acupuncture_overview']);
		$pt_overview      = htmlspecialchars($_POST['pt_overview']);
		Diagnosis::add_diagnosis($code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview);	
		Flight::redirect('view-diagnoses');
	}
});

Flight::route('GET /view-diagnoses', function() {
	admin_session_manager();
	$diagnoses = Diagnosis::get_all_diagnoses(); 
	Flight::render('view-diagnoses', array('diagnoses' => $diagnoses));
});

Flight::route('GET /add-diagnosis', function() {
	admin_session_manager();
	Flight::render('add-diagnosis', array('template_name' => 'add-diagnosis'));
});

Flight::route('GET /edit-diagnoses', function() {
	admin_session_manager();
	if (isset($_GET['code'])) {
		$code = $_GET['code'];
		$diagnosis = Diagnosis::get_diagnosis($code);
		Flight::render('edit-diagnoses', array(
			'diagnosis' => $diagnosis,
			'template_name' => 'care-plan'
			)
		);
	}
});

Flight::route('POST /edit-diagnoses', function() {
	admin_session_manager();
	$id               = (int) $_POST['id'];
	$code             = htmlspecialchars($_POST['code']);
	$the_title        = htmlspecialchars($_POST['the_title']);
	$min_visits       = (int)($_POST['min_visits']);
	$max_visits       = (int)($_POST['max_visits']);
	$chiro_overview   = htmlspecialchars($_POST['chiro_overview']);
	$massage_overview = htmlspecialchars($_POST['massage_overview']);
	$acu_overview     = htmlspecialchars($_POST['acupuncture_overview']);
	$pt_overview      = htmlspecialchars($_POST['pt_overview']);
	Diagnosis::update_diagnostic_content($code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview, $id);
	Flight::redirect('view-diagnoses');
});

Flight::route('POST /delete-diagnosis', function() {
	admin_session_manager();
	if (isset($_POST['delete-diagnosis'])) {
		$id = $_POST['id'];
		Diagnosis::delete_diagnosis($id);
		Flight::redirect('/view-diagnoses');
	}
});

// PHASES

Flight::route('GET /view-phases', function() {
	admin_session_manager();
	$phases = Diagnosis::get_all_phases();
	Flight::render('view-phases', array('phases' => $phases, 'template_name' => 'care-plan'));
});

Flight::route('POST /add-phase', function() {
	admin_session_manager();
	if (isset($_POST['add-phase'])) {
		$code_id       = htmlspecialchars($_POST['code_id']);
		$title 			   = htmlspecialchars($_POST['title']);
		$wellness_time = htmlspecialchars($_POST['wellness_time']);
		$chiro_min     = (int)$_POST['chiro_min'];
		$chiro_max     = (int)$_POST['chiro_max'];
		$massage_min   = (int)$_POST['massage_min'];
		$massage_max   = (int)$_POST['massage_max'];
		$pt_min        = (int)$_POST['pt_min'];
		$pt_max        = (int)$_POST['pt_max'];
		$description   = htmlspecialchars($_POST['description']);

		Diagnosis::add_phase($code_id, $title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description);
		Flight::redirect('/add-phase');
	}
});

Flight::route('GET /add-phase', function(){
	admin_session_manager();
	$codes = Diagnosis::get_all_codes();
	Flight::render('add-phase', array(
		'template_name' => 'care-plan',
		'codes' => $codes
		)
	);
});

Flight::route('GET /edit-phase', function() {
	admin_session_manager();
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$phase = Diagnosis::get_phase($id);
	Flight::render('edit-phase', array(
		'phase' => $phase,
		'template_name' => 'care-plan'
		)
	);	
	}
});

Flight::route('POST /edit-phase', function() {
	admin_session_manager();
	$id 					 = (int) $_POST['id'];
	$title 				 = htmlspecialchars($_POST['title']);
	$wellness_time = htmlspecialchars($_POST['wellness_time']);
	$chiro_min 		 = (int) $_POST['chiro_min'];
	$chiro_max 		 = (int) $_POST['chiro_max'];
	$massage_min 	 = (int) $_POST['massage_min'];
	$massage_max 	 = (int) $_POST['massage_max'];
	$pt_min 			 = (int) $_POST['pt_min'];
	$pt_max 		   = (int) $_POST['pt_max'];
	$description 	 = htmlspecialchars($_POST['description']);

	Diagnosis::update_phase($id, $title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description);
	Flight::redirect('view-phases');
});

Flight::route('GET /care-plan', function() {
	session_manager();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$content = Diagnosis::get_diagnostic_content($id);
		Flight::render('care-plan', array(
			'template_name' => 'care-plan',
			'content' => $content
			)
		);
	} else {
		Flight::redirect('/diagnostic-code');
	}
});

Flight::route('POST /delete-phase', function(){
  if (isset($_POST['delete-phase'])) {
  	$id = $_POST['id'];
  	Diagnosis::delete_phase($id);
  	Flight::redirect('/view-phases');
  }
});

/**
 * @todo GET last inserted ID from diagnosis table and then insert when adding phases
 */
Flight::route('POST /duplicate-diagnosis', function(){
	if (isset($_POST['duplicate-diagnosis'])) {
		$id = $_POST['id'];
		$diagnosis = Diagnosis::get_diagnosis_by_id($id);
		$phases    = Diagnosis::get_phases_by_code_id($id);
		Diagnosis::duplicate_diagnosis($diagnosis, $phases);
		Flight::redirect('/view-diagnoses');
	}
});