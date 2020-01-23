<?php

namespace App\Services;


class Paysera
{
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function pay($email, $amount) {



    }

}
