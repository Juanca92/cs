<?php

namespace App\Controllers;

use App\Libraries\Backup_Database;


class Respaldo extends BaseController
{
	public function index()
	{
		 return $this->templater->view("respaldo/index");

	}
	public function descargarRespaldo()
	{

		//var_dump((new Backup_Database('localhost', 'root', '', 'sanpedro')));
		// return $this->templater->view("respaldo/index");
		/**
		 * Instantiate Backup_Database and perform backup
		 */

		// Report all errors
		error_reporting(E_ALL);
		// Set script max execution time
		set_time_limit(900); // 15 minutes

		// if (php_sapi_name() != "cli") {
		// 	echo '<div style="font-family: monospace;">';
		// }

		$backupDatabase = new Backup_Database('localhost', 'root', '', 'sanpedro');

		// Option-1: Backup tables already defined above
		$result = $backupDatabase->backupTables(TABLES) ? 'OK' : 'KO';

		// Option-2: Backup changed tables only - uncomment block below
		/*
		$since = '1 day';
		$changed = $backupDatabase->getChangedTables($since);
		if(!$changed){
		$backupDatabase->obfPrint('No tables modified since last ' . $since . '! Quitting..', 1);
		die();
		}
		$result = $backupDatabase->backupTables($changed) ? 'OK' : 'KO';
		*/


		// $backupDatabase->obfPrint('Backup result: ' . $result, 1);

		// Use $output variable for further processing, for example to send it by email
		$output = $backupDatabase->getOutput();

		// if (php_sapi_name() != "cli") {
		// 	echo '</div>';
		// }
		if(isset($backupDatabase->backupFile)){
			return $this->response->setJSON(['exito'=>'El respaldo se realizo correctamente','nombre_archivo'=>$backupDatabase->backupFile]);
		}else{
			return $this->response->setJSON(['error'=>'Ocurrio un error!]);
			
		}
	}
}
