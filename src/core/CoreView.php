<?php

class CoreView extends Core
{
    function view($file_name, $data = null)
    {
        include_once 'views/'.$file_name;
    }
}