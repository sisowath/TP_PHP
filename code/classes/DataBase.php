<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author usager
 */
class DataBase {
	private static $connexion = null;
	
	private function __construct() {}
	
	public static function getInstance()
	{
		if(self::$connexion == null)
			self::$connexion = new PDO(
				"mysql:host=localhost;dbname=clubsoccer", 
				"root", 
				"root");
		return self::$connexion;
	}
	public static function close()
	{
            self::$connexion = null;
	}	
}
