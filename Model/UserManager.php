<?php
namespace Model;

class UserManager extends ModelManager{

    public function __construct()
    {
        parent::__construct("user");
    }
}