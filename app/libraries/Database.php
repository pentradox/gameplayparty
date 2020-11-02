<?php

class Database {
  private $dbh; // dbase handler
  private $statementHandler; // statement
  private $error; // error message

  public function __construct() {
    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;

    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create PDO instance
    try {
      $this->dbh = new PDO($dsn, DBUSER, DBPASS,
                                      $options);
    } catch(PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }

  }

  // Prepare statement
  public function prepare($query) {
    $this->statementHandler = $this->dbh->prepare($query);
  }

  // Bind the param
  public function bind($param, $value, $type = null) {
    if(is_null($type)) {
      switch(true) { // Check that function returns true

      case is_int($value):
        $type = PDO::PARAM_INT;
        break;

      case is_bool($value):
        $type = PDO::PARAM_BOOL;
        break;

      case is_null($value):
        $type = PDO::PARAM_NULL;
        break;

      default:
        $type = PDO::PARAM_STR;
        break;
      }
    }
  $this->statementHandler->bindValue($param, $value, $type);
  }

    // Execute the prepared statement
  public function execute() {
    return $this->statementHandler->execute();
  }

  // Get single row as object
  public function getRow() {
    $this->execute();
    return $this->statementHandler->fetch(PDO::FETCH_OBJ);
  }

  // Get results in an array
  public function getArray() {
    $this->execute();
    return $this->statementHandler->fetchAll(PDO::FETCH_OBJ);
  }

  // Get row count
  public function rowCount() {
    return $this->statementHandler->rowCount();
  }

  // Start Transaction
  public function beginTransaction() {
    $this->dbh->beginTransaction();
  }

  // Rollback
  public function rollBack() {
    $this->dbh->rollBack();
  }

  // Commit Transaction
  public function commit() {
    return $this->dbh->commit();
  }


}

?>
