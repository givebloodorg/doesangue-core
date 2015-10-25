<?php 
/**
* Classe DB
* @author José Cage
* @package DoeSangue
* @version 0.0.1
* @link http://mentedigital.me
*/
 class DB{
 	private static $conn;
 	public function __construct(){}
 
 	public static function conn(){
 		if (is_null(self::$conn)) {
 			self::$conn = new PDO('mysql:host='.HOST.';dbname='.BANCO.'', ''.USER.'', ''.PASS.'');
 		}
 	}
 }
 ?>