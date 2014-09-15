<?php

class Database 
{

    const DBNAME='vk';

    public $db;

    function __construct() 
    {
            /*$this->db = new PDO('mysql:host=' . App::getConfig('db_host') . ';dbname=' . self::DBNAME . ';charset=utf8',
            App::getConfig('db_user'),
            App::getConfig('db_pass')
        );*/
			$this->db = new PDO('mysql:host=localhost; dbname='.self::DBNAME.'; charset=utf8','root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
     }
 }

