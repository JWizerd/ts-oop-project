<?php

class Diagnosis {
	/**
	 * @return diagnostic_content object from db
	 */
	public static function get_diagnosis($code) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT * FROM diagnostic_codes WHERE code = ?"); 
		$stmt->execute([$code]);
		$diagnosis = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;

		return $diagnosis;
	}

	/**
	 * @return diagnostic_phase object from db
	 */
	public static function get_phase($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT * FROM diagnostic_phases WHERE id = ?"); 
		$stmt->execute([$id]);
		$phase = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;
		return $phase;
	}

	/**
	 * @return diagnostic id from db
	 */
	public static function get_diagnosis_id($code) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT id FROM diagnostic_codes WHERE code = ? ORDER BY id ASC");
		$stmt->execute([$code]);
		$id = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;	

		return $id['id'];
	}

	public static function get_diagnosis_by_id($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT * FROM diagnostic_codes WHERE id = ? ORDER BY id ASC");
		$stmt->execute([$id]);
		$obj = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;	

		return $obj;
	}

	public static function get_phases_by_code_id($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT * FROM diagnostic_phases WHERE code_id = ? ORDER BY id ASC");
		$stmt->execute([$id]);
		$obj = $stmt->fetchAll();
		// close connection
		$db = null;
		$stmt = null;	

		return $obj;	
	}

	public static function get_all_codes() {
		$db = new DB(); 
		$codes = [];
		$codes_obj = $db->pdo->query("SELECT id, code, the_title FROM diagnostic_codes ORDER BY id ASC");
		$db = null;
		return $codes_obj;
	}

	public static function get_all_diagnoses() {
		$diagnoses = [];
	  $db = new DB();
	  $diagnosis_obj = $db->pdo->query("SELECT id, code, the_title FROM diagnostic_codes ORDER BY id ASC");
	  foreach ($diagnosis_obj as $field_name => $field) {
	  	$diagnoses += [$diagnoses[$field_name] = $field];
	  }
	  return $diagnoses;
	}

	public static function get_all_phases() {
		$phases = [];
	  $db = new DB();
	  // removed ORDER BY ASC to fix reodering phases bug
	  $phases_obj = $db->pdo->query("SELECT id, code_id, title FROM diagnostic_phases ORDER BY code_id, id ASC");
	  foreach ($phases_obj as $field_name => $field) {
	  	$phases += [$phases[$field_name] = $field];
	  }
	  return $phases;
	}

	/**
	 * Add diagnosis to DB
	 * @param  array $_POST
	 * @return String sql statement 
	 * @todo  refactor method so that is can be used with multiple INSERT statements for Relational DB
	 */
	public static function add_diagnosis($code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview) {
		$db = new DB();
		$stmt = $db->pdo->prepare("
			INSERT INTO diagnostic_codes 
			(code, the_title, min_visits, max_visits, chiro_overview, massage_overview, acu_overview, pt_overview) 
			VALUES
			(:code, :the_title, :min_visits, :max_visits, :chiro_overview, :massage_overview, :acu_overview, :pt_overview)");
		$stmt->execute([$code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview]);
		$last_id = $db->pdo->lastInsertId();
		// close connection
		$db = null;
		$stmt = null;	

		return $last_id;
	}

	private static function get_code_id($code) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT id FROM diagnostic_codes WHERE code = ?");
		$stmt->execute([$code]);
		$id = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;	

		return $id;
	}

	public static function get_diagnosis_title_by_id($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("SELECT the_title, code FROM diagnostic_codes WHERE id = ?");
		$stmt->execute([$id]);
		$obj = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;	

		return $obj;
	}

	public static function add_phase($code_id, $title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description) {
		$db = new DB();
		$stmt = $db->pdo->prepare("
			INSERT INTO diagnostic_phases 
			(code_id, title, wellness_time, chiro_min, chiro_max, massage_min, massage_max, pt_min, pt_max, description) 
			VALUES
			(:code_id, :title, :wellness_time, :chiro_min, :chiro_max, :massage_min, :massage_max, :pt_min, :pt_max, :description)");
		$stmt->execute([$code_id, $title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description]);
		// close connection
		$db = null;
		$stmt = null;	
	}

	/**
	 * [duplicate_diagnosis and related phsases, this approach creates unique ids for each diagnosis so if you delete the duplicated phase only the phases belonging to that duplicated diagnosis will be deleted]
	 * @param  [type] $diagnosis [array of fields for Diagnosis record]
	 * @param  [type] $phases    [array of fields for Phases record]
	 */
	public static function duplicate_diagnosis($diagnosis, $phases) {
		$id = self::add_diagnosis($diagnosis['code'], 
												$diagnosis['the_title'], 
												$diagnosis['min_visits'], 
												$diagnosis['max_visits'], 
												$diagnosis['chiro_overview'],
												$diagnosis['massage_overview'],
												$diagnosis['acu_overview'],
												$diagnosis['pt_overview']);
		if (count($phases) > 0) {
			foreach ($phases as $row => $phase) {
				self::add_phase($id, 
												$phase['title'], 
												$phase['wellness_time'], 
												$phase['chiro_min'], 
												$phase['chiro_max'], 
												$phase['massage_min'], 
												$phase['massage_max'], 
												$phase['pt_min'], 
												$phase['pt_max'], 
												$phase['description']);
			}
		}
	}


	/*
	Integrate this method into View Phases view so that belongs to shows title of diagnosis rather than relational ID
	 */
	public static function get_diagnosis_title($id) {
		$stmt = $db->pdo->prepare("SELECT id FROM diagnostic_codes WHERE code = ?");
		$stmt->execute([$code]);
		$diagnosis = $stmt->fetch();
		// close connection
		$db = null;
		$stmt = null;	

		return $diagnosis['title'];
	}

	/**
	 * @param string diagnostic code
	 * @todo create relational query to remove phases and diagnostic codes / overview from db
	 */
	public static function delete_diagnosis($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("DELETE FROM diagnostic_codes WHERE id = ?");
		$stmt->execute([$id]);
		// close connection
		$db = null;
		$stmt = null;	
		self::delete_phases_for_diagnosis($id);
	}

	private static function delete_phases_for_diagnosis($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("DELETE FROM diagnostic_phases WHERE code_id = ?");
		$stmt->execute([$id]);
		// close connection
		$db = null;
		$stmt = null;	
	}

	public static function delete_phase($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare("DELETE FROM diagnostic_phases WHERE id = ?");
		$stmt->execute([$id]);
		// close connection
		$db = null;
		$stmt = null;
	}

	/**
	* @param string Diagnostic Code from either admin view diagnoses or client diagnostic page
	* @return array All related content from both diagnostic_codes and diagnostic_phases table for display on care-plan
	**/
	public static function get_diagnostic_content($id) {
		$db = new DB();
		$stmt = $db->pdo->prepare(
			"SELECT
			 c.code,
			 c.the_title, 
			 c.min_visits,
			 c.max_visits,
			 c.chiro_overview,
			 c.massage_overview,
			 c.acu_overview,
			 c.pt_overview,
			 p.*
       FROM diagnostic_codes c
       RIGHT JOIN diagnostic_phases p ON c.id = p.code_id
       WHERE c.id = ? ORDER BY p.id ASC"
		);
		$stmt->execute([$id]);
		$content = $stmt->fetchAll();

		// close connection
		$db = null;
		$stmt = null;

		return $content;
	}

	public static function update_diagnostic_content($code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview, $id) {
		$db = new DB();
		$stmt = $db->pdo->prepare(
			"UPDATE diagnostic_codes 
			 SET code = :code, 
			 		 the_title = :the_title,
			 		 min_visits = :min_visits,
			 		 max_visits = :max_visits,
			     chiro_overview = :chiro_overview, 
			 		 massage_overview = :massage_overview, 
			 		 acu_overview = :acu_overview, 
			 		 pt_overview = :pt_overview
			 WHERE id = :id"
		);
		$stmt->execute([$code, $the_title, $min_visits, $max_visits, $chiro_overview, $massage_overview, $acu_overview, $pt_overview, $id]);
		// close connection
		$db = null;
		$stmt = null;	
	}

	public static function update_phase($id, $title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description) {
		$db = new DB();
		$stmt = $db->pdo->prepare("
			UPDATE diagnostic_phases 
			SET title = :title, 
			    wellness_time = :wellness_time,
			    chiro_min = :chiro_min, 
			    chiro_max = :chiro_max, 
			    massage_min = :massage_min, 
			    massage_max = :massage_max, 
			    pt_min = :pt_min, 
			    pt_max = :pt_max, 
			    description = :description 
			WHERE id = :id"
		);
		$stmt->execute([$title, $wellness_time, $chiro_min, $chiro_max, $massage_min, $massage_max, $pt_min, $pt_max, $description, $id]);
		// close connection
		$db = null;
		$stmt = null;	
	}

}