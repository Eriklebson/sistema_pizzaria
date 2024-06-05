<?php 
    function redirect($to){
        return header('Location:'.$to);
    }
    function setMessageAndRedirect($index, $message, $redirect){
        setFlash($index, $message);
        return redirect($redirect);
    }
?> 