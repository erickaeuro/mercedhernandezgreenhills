<?php 
session_start();
require_once('connection.php');

Class Actions extends connection{
    function __construct(){
        parent::__construct();
    }
    function __destruct(){
        parent::__destruct();
    }
    function save_log($data=array()){
        // Data array paramateres
            // user_id = user unique id
            // action_made = action made by the user
            
        if(count($data) > 0){
            extract($data);
            $sql = "INSERT INTO `logs` (`user_id`,`action_made`) VALUES ('{$user_id}','{$action_made}')";
            $save = $this->conn->query($sql);
            if(!$save){
                die($sql." <br> ERROR:".$this->conn->error);
            }
        }
        return true;
    }
    function login(){
        extract($_POST);
        $sql = "SELECT * FROM users where username = '{$username}' and `password` = '".md5($password)."' ";
        @$qry = $this->conn->query($sql)->fetch_array();
        if(!$qry){
            $resp['status'] = "failed";
            $resp['msg'] = "Invalid username or password.";
        }else{
            $resp['status'] = "success";
            $resp['msg'] = "Login successfully.";
            foreach($qry as $k => $v){
                if(!is_numeric($k))
                $_SESSION[$k] = $v;
            }
            $log['user_id'] = $qry['id'];
            $log['action_made'] = "Logged in the system.";
            // audit log
            $this->save_log($log);
        }
        return json_encode($resp);
    }
    function logout(){
        $log['user_id'] = $_SESSION['id'];
        $log['action_made'] = "Logged out.";
        session_destroy();
        // audit log
        $this->save_log($log);
        header("location:./");
    }
}
$a = isset($_GET['a']) ?$_GET['a'] : '';
$action = new Actions();
switch($a){
    case 'login':
        echo $action->login();
    break;
    case 'logout':
        echo $action->logout();
    break;
    //case 'save_member':
        //echo $action->save_member();
    //break;
    //case 'delete_member':
        //echo $action->delete_member();
    //break;
    //case 'save_log':
        //$log['user_id'] = $_SESSION['id'];
        //$log['action_made'] = $_POST['action_made'];
        //echo $action->save_log($log);
    //break;
    default:
    // default action here
    echo "No Action given";
    break;
}