<? 
require('./models/User.php');

class Session {

    private function authenticate($email, $password) {
      $user = $this->find_user($email);
      $creds_correct = (!empty($user) && password_verify($password, $user['password'])) ? true : false;
      return $creds_correct;
    }

    private function find_user($email) {
      $db = new DB();
      $stmt = $db->pdo->prepare("SELECT email, password FROM users WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();
      // close connection
      $db = null;
      $stmt = null;
      return $user;
    }

    private function set_session_token() {
      $_SESSION['authenticated'] = true;
      $authenticated = $_SESSION['authenticated'];
      return true;
    }

    private function login($email, $password) {
      $authenticated = $this->authenticate($email, $password);
      return ($authenticated) ? true : false;
      // if ($authenticated) {
      //   return true;
      // } else {
      //   return false;
      // }
    }

    public function logout() {
      session_destroy();
      $this->authenticated = false;
    }
    
  }
  $login = new Session();
?>