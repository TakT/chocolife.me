<?php 

class ArrayGenerator {

	private $_data             = [];
	private $_categories       = [];
	private $_lengthCategories = 5;
	private $_lengthShares     = 40;
	
	private $_heights = [100, 200, 300];
	private $_widths  = [100, 33.333333, 66.66666];

	const MAX_CATEGORY_ID = 1413;
	
	public function __construct($lengthCategories = 5, $lengthShares = 40) {
		$this->setLengthCategories($lengthCategories);
		$this->setLengthShares($lengthShares);

		$this->_generateCategories();
	}

	public function setLengthCategories($lengthCategories = 1) {
		if ($lengthCategories > 1) {
			$this->_lengthCategories = $lengthCategories;
		}
		return $this->_lengthCategories;
	}

	public function setLengthShares($lengthShares = 1) {
		if ($lengthShares > 1) {
			$this->_lengthShares = $lengthShares;
		}
		return $this->_lengthShares;
	}

	public function getArray() {
		$this->_generate();
		return $this->_data;
	}

	public function getLengthCategories() {
		return $this->_lengthCategories;
	}

	public function getLengthShares() {
		return $this->_lengthShares;
	}

	private function _getWidth() {
		return $this->_widths[array_rand($this->_widths)];
	}

	private function _getHeight() {
		return $this->_heights[array_rand($this->_heights)];
	}

	public function getCategories() {
		return $this->_categories;
	}

	private function _getShareCategories() {

		$categories        = [];
		$randCategoryIndex = rand(1, count($this->_categories) - 1);
		$categoriesIndexes = (array)array_rand($this->_categories, $randCategoryIndex);
		
		foreach ($categoriesIndexes as $key => $categoryId) {
			$categories[] = $this->_categories[$categoryId];
		}

		return $categories;
	}

	private function _generateCategories() {

		$this->_categories = [];
		for ($i=0; $i < $this->getLengthCategories(); $i++) { 
			$this->_categories[] = rand(1, self::MAX_CATEGORY_ID);
		}
		return true;
	}

	private function _generate() {
		$this->_data = [];
		for ($i=0; $i < $this->getLengthShares(); $i++) { 
			$this->_data[] = [
				'id'         => $i + 1,
				'width'      => $this->_getWidth(),
				'height'     => $this->_getHeight(),
				'is_show'    => true,
				'categories' => $this->_getShareCategories(),
			];
		}
		return true;
	}
}