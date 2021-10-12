<?php

namespace TeamBuilder\Controller;

use TeamBuilder\Model\Member;

class AuthController
{
    static function autoConnect(){
        require dirname(__DIR__, 1) . "\model\.env.php";
        return Member::find($connect_user_id);

    }

}