<?php

class Presenter
{
    public function __construct()
    {


    }


    public function render($view, $data = [])
    {
        include_once("view/template/nav.mustache");
        include_once($view);
        include_once("view/template/nav-admin.mustache");

    }



}