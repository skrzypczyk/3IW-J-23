<?php
namespace App\Forms;
class Register
{

    public static function getConfig(): array
    {
        return [
            "config"=>[
                "action"=>"",
                "method"=>"POST",
                "submit"=>"S'inscrire"
                ],
            "inputs"=>[
                "firstname"=>[
                    "type"=>"text",
                    "min"=>2,
                    "max"=>50,
                    "placeholder"=>"Votre prénom",
                    "required"=>true,
                    "error"=>"Votre prénom doit faire entre 2 et 50 caractères"
                ],
                "lastname"=>[
                    "type"=>"text",
                    "min"=>2,
                    "max"=>50,
                    "placeholder"=>"Votre nom",
                    "required"=>true,
                    "error"=>"Votre nom doit faire entre 2 et 50 caractères"
                ],
                "email"=>[
                    "type"=>"email",
                    "min"=>8,
                    "max"=>320,
                    "placeholder"=>"Votre email",
                    "required"=>true,
                    "error"=>"Votre email doit faire entre 8 et 320 caractères"
                ],
                "password"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe",
                    "required"=>true,
                    "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec des lettres minscules, majuscules et des chiffres"
                ],
                "passwordConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmation",
                    "required"=>true,
                    "confirm"=>"password",
                    "error"=>"La confirmation ne correspond pas"
                ],
            ]

        ];
    }


}