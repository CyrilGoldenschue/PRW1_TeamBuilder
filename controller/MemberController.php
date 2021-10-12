<?php
namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Member;

class MemberController
{

    public function autoConnect(){
        require dirname(__DIR__, 1) . "\model\.env.php";
        return Member::find($connect_user_id);

    }



}