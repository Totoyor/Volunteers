<?php

class CoreController extends Core
{
    public $load;
    public $model;

    public function __construct()
    {
        $this->load = new CoreView();
    }

}