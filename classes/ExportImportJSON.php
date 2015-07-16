<?php 

require_once 'File.php';

class ExportImportJSON extends File {

	public function __construct($fileName = 'data.json', array $fileData = []) {
		parent::__construct($fileName, './assets/data/', $fileData);
	}

	public function export() {
		return $this->saveFile();
	}

	public function import() {
		return $this->loadFile();
	}
}