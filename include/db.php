<?php
class DB{
    private $hostname = 'localhost'; //your db host
    private $username = 'root'; //your db username
    private $password = ''; //your db password
    private $db_name = 'blog'; //your db name
    private $mysqli; 
    private $result = [];
    private $conn = false;

    private $perPage;
    private $offset = 0;

    public function __construct(){
        
        if(!$this->conn){
            $this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->db_name);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                // die("Connection failed: " . $this->mysqli->connect_error);
                return false;
            }
        }else{
           return true;
        }  
    }

    public function insert($table,$perameters=[]){
        if ($this->tableExsits($table)) {
             $table_columns = implode(', ', array_keys($perameters));
             $table_values = implode("', '", $perameters);
             $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";
             if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
             }else{
                array_push($this->result, $this->mysqli->error);
                return false;
             }
        }else{
            return false;
        }
        
    }

    public function update($table,$perameters=[],$where=null){
        if ($this->tableExsits($table)) {
           $args=[];
           foreach ($perameters as $key => $value) {
            $args[] = "$key = '$value'";
           }
            $sql = "UPDATE $table SET ". implode(', ', $args);
           if ($where != null) {
                $sql .= " WHERE $where";
            }
         if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
         }else{
            array_push($this->result, $this->mysqli->error);
            return false;
         }
       }else{
           return false;
       }
    }

    public function delete($table,$where=null){
        if ($this->tableExsits($table)) {
            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }
           if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
         }else{
            array_push($this->result, $this->mysqli->error);
            return false;
         }
       }else{
           return false;
       }
    }
    public function softdelete($table,$where=null){
        if ($this->tableExsits($table)) {
            date_default_timezone_set("Asia/Dhaka");
            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE $table SET `deleted_at`='$now'";
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // echo $sql;
            // die();
        if ($this->mysqli->query($sql)) {
            if ($this->mysqli->affected_rows > 0 ) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->affected_rows);
                return false;
            }
           
         }else{
            array_push($this->result, $this->mysqli->error);
            return false;
         }
       }else{
           return false;
       }
    }
    public function restore($table,$where=null){
        if ($this->tableExsits($table)) {
            
            $sql = "UPDATE $table SET `deleted_at`=NULL";
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // echo $sql;
            // die();
        if ($this->mysqli->query($sql)) {
            if ($this->mysqli->affected_rows > 0 ) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->affected_rows);
                return false;
            }
           
         }else{
            array_push($this->result, $this->mysqli->error);
            return false;
         }
       }else{
           return false;
       }
    }

    public function find($table ,$id ,$rows="*"){
        if ($this->tableExsits($table)) { 
            $sql = "SELECT $rows FROM $table WHERE id=$id";
            $query = $this->mysqli->query($sql);
            if ($query) {
                $data = mysqli_fetch_assoc($query);
                return $data;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    public function select($table, $rows="*", $join=null,$where=null, $order=null, $limit=null, $offset=0){
        if ($this->tableExsits($table)) {
            $sql = "SELECT $rows FROM $table";
            if ($join != null) {
                $sql .= " LEFT JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                $sql .= " LIMIT " . $limit;
                $this->perPage = $limit;
                if ($offset != 0) {
                    $sql .= " OFFSET " . $offset;
                }
            }
            // echo $sql;
            // die();
            $query = $this->mysqli->query($sql);
            if ($query) {
                // $data = array();
                // $data  = $query->fetch_all(MYSQLI_ASSOC);
                // return $data;

                ////////////////////////
                    $data = array();
                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }
                
                return $data;
                ///////////////////////

            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }
    public function countRows($table, $where = null) {
        $sql = "SELECT COUNT(*) AS total FROM " . $table;
    
        if ($where) {
            $sql .= " WHERE $where";
        }
        // echo $sql;
        // die();
        $result = $this->mysqli->query($sql);
    
        if (!$result) {
            die("Query failed: " . $this->mysqli->error);
        }
    
        $row = $result->fetch_assoc();
    
        return $row["total"];
    }
    public function sql($sql){
        $query = $this->mysqli->query($sql);
        if ($query) {
            $result = $query->fetch_all(MYSQLI_ASSOC);
            return $result;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    private function tableExsits($table){
        $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb= $this->mysqli->query($sql);
        if($tableInDb){
            if ($tableInDb->num_rows == 1) {
                return true;
            }else{
                array_push($this->result, $table."dose not exsits in this database!");
                return false;
            }
        }
    }

    public function getResult(){
        $val = $this->result;
        $this->result = [];
        return $val;
    }
    public function links($table, $where= null){
        $tag = isset($_GET["tag"]) ? $_GET["tag"] : "";
        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Current page
        // $this->offset = ($page - 1) * $this->perPage;
        $totalRows = $this->countRows($table, $where);
        $totalPages = ceil($totalRows / $this->perPage);
        // $previousPage = $page > 1 ? $page - 1 : null;
        // $nextPage = $page < $totalPages ? $page + 1 : null;
            // Pagination links
            // echo $totalRows;
            echo "<ul class='pagination'>";

            // Previous page link
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='?tag=".$tag."&search=".$search."&page=" . ($page - 1) . "'>Previous</a></li>";
            }

            // First page link
            if ($page > 3) {
                echo "<li class='page-item'><a class='page-link' href='?tag=".$tag."&search=".$search."&page=1'>1</a></li>";
                if ($page > 4) {
                    echo "<li class='page-item'>. . . .</li>";
                }
            }

            // Middle pages
            $start = max(1, $page - 2);
            $end = min($totalPages, $page + 2);
            for ($i = $start; $i <= $end; $i++) {
                $active = $i == $page ? "active" : "";
                echo "<li class='page-item " . $active . "'><a class='page-link' href='?tag=".$tag."&search=".$search."&page=" . $i . "'>" . $i . "</a></li>";
            }

            // Last page link
            if ($page < $totalPages - 2) {
                if ($page < $totalPages - 3) {
                    echo "<li class='page-item'>. . . .</li>";
                }
                echo "<li class='page-item'><a class='page-link' href='?tag=".$tag."&search=".$search."&page=" . $totalPages . "'>" . $totalPages . "</a></li>";
            }

            // Next page link
            if ($page < $totalPages) {
                echo "<li class='page-item'><a class='page-link' href='?tag=".$tag."&search=".$search."&page=" . ($page + 1) . "'>Next</a></li>";
            }

            echo "</ul>";
    }

// try to create dynamic table start

   



// try to create dynamic table end
    public function __call($name, $arguments)
    {
        echo "this is pirvet or non exsisting method:".$name."</br>";
        if ($arguments) {
            echo "<pre>";
            print_r($arguments);  
            echo "</pre>";
        }
    }
    public function __destruct()
    {
        if($this->conn){
            if( $this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            return false;
        }
    }
}


?>