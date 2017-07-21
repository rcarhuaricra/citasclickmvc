<?php

$config = array(
    'login/verificarLogin' => array(
        array(
            'field' => 'email',
            'label' => 'E-mail',
            //'rules' => 'trim|required|valid_email|callback_verificarEmailLogin'
            'rules' => 'required|callback_verificarEmailLogin'
        ),
        array(
            'field' => 'psw',
            'label' => 'Password',
            //'rules' => 'callback_verificarPassLoging'
            'rules' => 'callback_verificarPassLoging|required'
        )
    )
);
