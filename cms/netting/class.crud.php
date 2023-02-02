<?php
setlocale(LC_ALL,"tr_TR.UTF-8");
date_default_timezone_set('Europe/Istanbul');
session_start();
require_once 'dbconfig.php';

class crud
{
    private $db;
    private $dbhost = DBHOST;
    private $dbuser = DBUSER;
    private $dbpass = DBPWD;
    private $dbname = DBNAME;

    function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname;charset=utf8mb4;", $this->dbuser, $this->dbpass);
            //echo "Bağlantı Başarılı";
        } catch (Exception $error) {
            die("Bağlantı Başarısız: " . $error->getMessage());
        }
    }
    public function adminsLogin($admins_username, $admins_pass)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM admins WHERE admins_username=? AND admins_status=1");
            $stmt->execute(array(htmlspecialchars($admins_username)));
            if ($stmt->rowCount()==1) {
                $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
                $er_pwd = $admins_pass;                     //PASSWORD FROM POST
                $db_pwd = $stmt['admins_pass'];                    //ENCRYPTED PASSWORD FROM DB
                $er_pwd_encode = urlencode($er_pwd);            // URL ENCODED POST PASSWORD
                $password = crypt($er_pwd_encode,$db_pwd);
                $query = $this->db->prepare("SELECT * FROM admins WHERE admins_username=? AND admins_pass=?");
                $query->execute([$admins_username,$password]);
                if (password_verify($er_pwd_encode, $db_pwd)) {
                    $_SESSION["admins"] = [
                        "admins_username" => $admins_username,
                        "admins_namesurname" => $stmt['admins_namesurname'],
                        "admins_file" => $stmt['admins_file'],
                        "admins_id" => $stmt['admins_id']
                    ];
                    return ['status' => TRUE];
                } else {
                    return ['status' => FALSE];
                }
            } else {
                return ['status' => FALSE];
            }
        } catch (Exception $error) {
            return ['status' => FALSE, "error" => $error->getMessage()];
        }
    }
    public function read($table,$options=[]) {
        try {
            if (isset($options['columns_name']) && empty($options['limit']) && !isset($options['today'])){
                $stmt = $this->db->prepare("SELECT * FROM $table ORDER BY {$options['columns_name']} {$options['columns_sort']}");
            } elseif(isset($options['columns_name']) && isset($options['limit']) && !isset($options['today'])){
                $stmt = $this->db->prepare("SELECT * FROM $table ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
            } elseif(isset($options['columns_name']) && isset($options['limit']) && isset($options['today'])){
                $date = $options['date'];
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE {$options['today']} {$options['operator']} \"{$date}\" ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
            }else {
                $stmt = $this->db->prepare("SELECT * FROM $table");
            }
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }
    public function wread($table,$columns,$values,$options=[]) {
        try {
            if (isset($options['columns_name']) && empty($options['limit']) && !isset($options['today'])){
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE $columns=? ORDER BY {$options['columns_name']} {$options['columns_sort']}");
            } elseif(isset($options['columns_name']) && isset($options['limit']) && !isset($options['today'])){
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE $columns=? ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
            } elseif(isset($options['columns_name']) && isset($options['limit']) && isset($options['today']) && isset($options['offset'])){
                $date = $options['date'];
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE {$options['today']} {$options['operator']} \"{$date}\" AND $columns=? ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']} OFFSET {$options['offset']}");
            } elseif(isset($options['columns_name']) && isset($options['limit']) && isset($options['today'])){
                $date = $options['date'];
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE {$options['today']} {$options['operator']} \"{$date}\" AND $columns=? ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
            }else {
                $stmt = $this->db->prepare("SELECT * FROM $table WHERE $columns=?");
            }
            $stmt->execute([htmlspecialchars($values)]);
            return $stmt;
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }
    public function addValue($value){
        return implode(',',array_map(function ($item){return $item.'=?';},array_keys($value)));
    }
    public function base64ToImage($base64_string,$dir,$file_delete=null) {
        $data = explode(',', $base64_string);
        $ext = "";
        $data[0]=str_replace(";base64","",substr($data[0],"5"));
        switch ($data[0]){
            case "image/png" :
                $ext = "png";
                break;
            case "image/jpeg" :
                $ext = "jpg";
                break;
            default:
                echo "none";
                break;
        }
        $filename = uniqid().".".$ext;
        $file = fopen("../img/$dir/$filename", "wb");
        fwrite($file, base64_decode($data[1]));
        fclose($file);
        if ($file_delete != null){
            unlink("../img/$dir/$file_delete");
            if($_SESSION["admins"]["admins_file"] == $file_delete){
                unset($_SESSION['admins']['admins_file']);
                $_SESSION["admins"] += ["admins_file" => $filename];
                echo "<script>window.location=\"admins.php?adminsUpdate=true&admins_id=".$_SESSION['admins']['admins_id']."\"</script>";
            }
        }
        return $filename;
    }
    public function insert($table,$values,$options=[]) {
        try {
            if (!empty($_POST['file'])){
                $base64 = $_POST['file'];
                unset($values[$options['file_name']]);
                $filename = $this->base64ToImage($base64,$options['dir']);
                $values+=[$options['file_name'] => $filename];
                unset($values['file']);
            } else {
                unset($values['file']);
            }
            unset($values[$options['form_name']]);
            if (isset($options['pass'])){
                $values[$options['pass']] = password_hash($values[$options['pass']],PASSWORD_BCRYPT);
            }
            if (isset($options['url'])){
                $url = $table."_url";
                $values[$url] = $options['url'];
            }
            /*echo "<pre>";
            var_dump($stmt);
            echo "<br><br>";
            var_dump(array_values($values));
            exit();*/
            try {
                $stmt = $this->db->prepare("INSERT INTO {$table} SET {$this->addValue($values)}");
                $a = $stmt->execute(array_values($values));

            }catch(PDOException $pdoError) {
                    die("Oh noes! There's an error in the query!");
                    var_dump($pdoError);
            }
            return ['status'=>true];
        } catch (Exception $e){
            return['status'=>FALSE,'error'=>$e->getMessage()];
        }
    }
    public function update($table,$values,$options=[]) {
        try {
            if (!empty($_POST['file'])){
                $base64 = $_POST['file'];
                unset($values[$options['file_name']]);
                $filename = $this->base64ToImage($base64,$options['dir'],$values[$options['file_delete']]);
                $values+=[$options['file_name'] => $filename];
                unset($values['file']);
            } else {
                unset($values['file']);
            }
            unset($values[$options['file_delete']]);
            unset($values[$options['form_name']]);
            $id=$values[$options['columns']];
            unset($values[$options['columns']]);
            if (!empty($values[$options['pass']])){
                $values[$options['pass']] = password_hash($values[$options['pass']],PASSWORD_BCRYPT);
            } else {
                unset($values[$options['admins_pass']],$options['pass'],$values['admins_pass']);
            }
            if (isset($options['url'])){
                $url = $table."_url";
                $values[$url] = $options['url'];
            }
            $stmt=$this->db->prepare("UPDATE $table SET {$this->addValue($values)} WHERE {$options['columns']}={$id}");
            $stmt->execute(array_values($values));
            return ['status'=>true];
        } catch (Exception $e){
            return['status'=>FALSE,'error'=>$e->getMessage()];
        }
    }
    public function delete($table,$column,$value,$filename=null){
        try {
            if (!empty($filename)){
                unlink("../img/$table/$filename");
            }
            $stmt=$this->db->prepare("DELETE FROM $table WHERE {$column}={$value}");
            $stmt->execute();
            return ['status'=>true];
        }catch (Exception $e){
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }
    public function qSql($sql){
        try {
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (Exception $e){
            return ['status'=>FALSE,'error'=>$e->getMessage()];
        }
    }
    public function orderUpdate($table,$values,$columns,$orderId){
        $sql="";
        try {
            foreach ($values as $key => $value){
                $sql.="UPDATE $table SET $columns=$key WHERE $orderId=$value";
                $stmt=$this->db->prepare("UPDATE $table SET $columns=? WHERE $orderId=?");
                $stmt->execute([$key,$value]);
            }
            return ['status'=>TRUE,'sql'=>$sql];
        } catch (Exception $e){
            return ['status'=>FALSE,'error'=>$e->getMessage()];
        }
    }
    public function seoUrl($s){
        $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');
        return $s;
    }
}
