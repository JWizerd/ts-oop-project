<?php 
  class DB {

    protected $host    = '50.28.38.41';
    protected $db      = 'torrents_db';
    protected $user    = 'torrents_user';
    protected $pass    = '%5tiGq{&fD+Q';
    protected $charset = 'utf8';
    public $pdo;
    

    public function __construct() {
      $this->open_connection();
    }
    public function get_pdo_obj($pdo) {
      return $this->pdo;
    }
    public function open_connection() {
      $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
      $options = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false,
      ];
      try {
        $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
      }
      catch(Exception $e) {
        echo $e->getMessage();
      }
    }
  
  }
?>