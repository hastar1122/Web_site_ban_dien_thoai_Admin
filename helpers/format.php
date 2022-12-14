<?php
class Format{

    public function formatDate($date) {
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 400) {
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text. ".....";
        return $text;
    }

    public function validation($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function validationRegister($data) {
        if(preg_match('([A-Za-z0-9]+)', $data)) { 
            return true;
        } else {
            return false;
        }
    }

    public function validationName($data) {
        if(preg_match('([A-Za-z]+)', $data)) { 
            return true;
        } else {
            return false;
        }
    }

    public function validationEmail($data) {
        if(filter_var($data, FILTER_VALIDATE_EMAIL)) { 
            return true;
        } else {
            return false;
        }
    }

    public function validationNumber($data) {
        if(preg_match('([0-9]+)', $data)) { 
            return true;
        } else {
            return false;
        }
    }

    public function checkPass($pass, $repass) {
        if (strcmp($pass, $repass) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function title() {
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        if ($title == 'index') {
            $title = 'home';
        } elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }
}
?>