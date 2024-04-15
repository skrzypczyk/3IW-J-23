<?php

namespace App\Controller;
class User {
    public function login()
    {

    }
}
//--------------------------
namespace App\Core;
class User {
    public function getFirstname()
    {

    }
}

//--------------------------

namespace App;
use App\Controller\User;
use App\Core\User as UserCore;

new User();
new UserCore();