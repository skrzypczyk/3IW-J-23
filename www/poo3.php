<?php

namespace App\Auth;
class Security
{
    //Check la securité de l'auth
}
/* -------------------------------------*/

namespace App\Payment;
class Security
{
    //Check la securité des paiements sur le site eCommerce
}

/* -------------------------------------*/
namespace App;
use App\Auth\Security as Secu;
use App\Payment\Security as SecuPayment;

$myAuth = new SecuPayment();