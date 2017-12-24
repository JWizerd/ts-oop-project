<?
require('./models/DB.php');
class User {

	private function set_username($username) {
		$this->username = $username;
	}

	private function get_username() {
		return $this->username;
	}

	public static function get_all_users() {
		$users = [];
	  $db = new DB();
	  $user_obj = $db->pdo->query("SELECT id, username, password, login_count FROM users");
	  foreach ($user_obj as $field_name => $field) {
	  	$users += [$users[$field_name] = $field];
	  }
	  return $users;
	}

	private static function authenticate($username, $password) {
	  $user = self::find_user($username);
	  $creds_correct = (!empty($user) && $password == $user['password'])  ? true : false;
	  return $creds_correct;

	  // use this later with password hashing and salting password_hash()
	  // password_verify($password, $user['password']))
	}

  private static function find_user($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare("SELECT username, password, id, login_count FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // close connection
    $db = null;
    $stmt = null;
    return $user;
  }

  public static function is_admin($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare("SELECT admin FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // close connection
    $db = null;
    $stmt = null;
    return $user['admin'];
  }

  /**
   * @todo set up admin session token management system
   */
  private static function set_session_token($username, $password, $id) {
    $token = crypt($username . $password . (string)$id);
    $_SESSION['user_token'] = $token;
    $_SESSION['username'] = $username;
    $db = new DB(); 
    $stmt = $db->pdo->prepare("UPDATE users SET session_token = ? WHERE username = ?");
    $stmt->execute([$token, $username]);
    // close connection
    $db = null;
    $stmt = null;
  }

  /**
   * @param  string Username
   * @return string session_token from db users
   */
  public static function get_user_session_token($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare("SELECT session_token FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    // close connection
    $db = null;
    $stmt = null;
    return $user['session_token'];    
  }

  /**
   * @param  string Username
   * @return string session_token from db users
   */
  public static function get_user_id($username) {
  	$db = new DB();
  	$stmt = $db->pdo->prepare("SELECT id FROM users WHERE username = ?");
  	$stmt->execute([$username]);
  	$user_id = $stmt->fetch();
  	// close connection
  	$db = null;
  	$stmt = null;
  	return $user_id['id'];
  }

  /**
  * @param string Username, string Password
  * @return true if already authenticated else return false
  **/
  public static function login($username, $password) {
    $authenticated = self::authenticate($username, $password);
    if ($authenticated) {
      $user_id = self::get_user_id($username);
      self::set_session_token($username, $password, $user_id);
      self::increment_login_count($username);
    }
    return $authenticated;
  }

  public static function logout() {
    session_unset(); // unset $_SESSION variables for user
    session_destroy();
  }

  public static function is_registered($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare('SELECT username FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    return !empty($user['username']);
  }

  public static function register($username, $password) {
  	$db = new DB();
  	$stmt = $db->pdo->prepare("INSERT INTO users (username, password) VALUES (?,?)");
  	$stmt->execute([$username, $password]);
  	$user_id = $stmt->fetch();
  	// close connection
  	$db = null;
  	$stmt = null;
  }

  private static function get_login_count($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare('SELECT login_count FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $login_count = $stmt->fetch();
    return $login_count['login_count'];
  }

  /**
   * @param  string The username of a user
   */
  public static function increment_login_count($username) {
    $current_login_count = self::get_login_count($username);
    $login_count = $current_login_count + 1;

    $db = new DB(); 
    $stmt = $db->pdo->prepare("UPDATE users SET login_count = ? WHERE username = ?");
    $stmt->execute([$login_count, $username]);
    // close connection
    $db = null;
    $stmt = null;
  }

  public static function delete_user($username) {
    $db = new DB();
    $stmt = $db->pdo->prepare("DELETE FROM users WHERE username = ?");
    $stmt->execute([$username]);
    // close connection
    $db = null;
    $stmt = null; 
  }

}