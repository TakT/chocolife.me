<?php

require_once './classes/ArrayGenerator.php';
require_once './classes/ExportImportJSON.php';

$ArrayGenerator    = new ArrayGenerator(5, 50);
$ExportImportJSON  = new ExportImportJSON;

// Generate array data
$sharesArray      = $ArrayGenerator->getArray();
$sharesCategories = $ArrayGenerator->getCategories();

// Save generated arrays to JSON file
/*$ExportImportJSON->setFileName('dataFirstCategories-v1.json')->setFileData($sharesCategoriesFirst)->export();
$ExportImportJSON->setFileName('dataFirst-v1.json')->setFileData($sharesArrayFirst)->export();*/

// Load generated arrays to JSON file
$sharesArray      = $ExportImportJSON->setFileName('dataFirst-v1.json')->import()->getFileData();
$sharesCategories = $ExportImportJSON->setFileName('dataFirstCategories-v1.json')->import()->getFileData();


var_dump($sharesArray);
var_dump($sharesCategories);