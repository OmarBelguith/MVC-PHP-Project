<?php
/**
 * Created by PhpStorm.
 * User: Omar Belguith
 * Date: 17/11/2017
 * Time: 5:48 PM
 */

class Messages{
    public static function setMsg($text, $type){
        if($type == 'error'){
            $_SESSION['errorMsg'] = $text;
        }else{
            $_SESSION['successMsg'] = $text;
        }
    }
    public static function display(){
        if(isset($_SESSION['errorMsg'])){
            echo '<div class="alert alert-danger">'. $_SESSION['errorMsg'].'</div>';
            unset($_SESSION['errorMsg']);
        }
        if(isset($_SESSION['successMsg'])){
            echo '<div class="alert alert-success">'. $_SESSION['successMsg'].'</div>';
            unset($_SESSION['successMsg']);
        }
    }
}