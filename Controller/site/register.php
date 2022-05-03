<?php
class Register {
    public function invoke()
    {
        
        require('./View/site/pages/register.php');

	}
 }
$C_Register = new Register();
$C_Register->invoke();