<?php
// No direct access
defined('_JEXEC') or die;

// Include the helper file
require_once __DIR__ . '/helper.php';

// Get the list of products
$products = ModSoapHelper::getProducts();

// Load the template to display the module
require JModuleHelper::getLayoutPath('mod_soap');
?>