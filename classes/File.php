<?php 

class File {

	protected $_fileName = 'data.json';
	protected $_path = './';
	protected $_fileData = [];

	public function __construct($fileName = 'data.json', $path = './', array $fileData = []) {
		$this->setFileName($fileName);
		$this->setFileData($fileData);
		$this->setPath($path);
	}

	public function setPath($path = './') {
		if ($path) {
			$this->_path = $path;
		}
		return $this;
	}

	public function setFileName($fileName = null) {
		if ($fileName) {
			$this->_fileName = $fileName;
		}
		return $this;
	}

	public function setFileData(array $fileData = []) {
		if (is_array($fileData)) {
			$this->_fileData = $fileData;
		}
		return $this;
	}

	public function getFileData() {
		if (!empty($this->_fileData)) {
			return $this->_fileData;
		}
		return [];
	}

	public function saveFile() {
		file_put_contents($this->_path . $this->_fileName, json_encode($this->getFileData()));
		return $this;
	}

	public function loadFile() {
		
		$fileData = json_decode(@file_get_contents($this->_path . $this->_fileName), true);
		if ($fileData === false) {
			$fileData = [];
			throw new Exception('Failed to open ' . $this->_path . $this->_fileName);
		}

		$this->setFileData($fileData);
		return $this;
	}
}
