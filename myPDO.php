<?php
class pdoClass extends PDO {
    
    private $pdo;
    
    public function __construct()
    {
        
        $this->pdo = parent::__construct('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        
        // Set charset \\
        parent::exec(CHARSET);
        
        // On fetch, fetch as object \\
        parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        // On error, throw PDOException \\
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    
    public function __destruct()
    {
        
        $this->pdo = NULL;
        
    }
    
    
    public function getRowCount()
    {
        
        return $this->rowCount;
        
    }
    
}
?>
