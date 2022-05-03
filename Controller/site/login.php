<?php
class Login {
    public function invoke()
    {
        
        require('./View/site/pages/login.php');

	}
    
 }
$C_Login = new Login();
$C_Login->invoke();