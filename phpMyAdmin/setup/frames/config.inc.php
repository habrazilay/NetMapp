<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Config file view and save screen
 *
 * @package PhpMyAdmin-Setup
 */

use PMA\setup\lib\ConfigGenerator;

if (!defined('PHPMYADMIN')) {
    exit;
}

/**
 * Core libraries.
 */
require_once './libraries/config/FormDisplay.tpl.php';
require_once './setup/lib/index.lib.php';

<<<<<<< HEAD
$config_readable = false;
$config_writable = false;
$config_exists = false;
PMA_checkConfigRw($config_readable, $config_writable, $config_exists);
=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
echo '<h2>' , __('Configuration file') , '</h2>';

echo PMA_displayFormTop('config.php');
echo '<input type="hidden" name="eol" value="'
    , htmlspecialchars(PMA_ifSetOr($_GET['eol'], 'unix')) , '" />';
echo PMA_displayFieldsetTop('config.inc.php', '', null, array('class' => 'simple'));
echo '<tr>';
echo '<td>';
echo '<textarea cols="50" rows="20" name="textconfig" '
    , 'id="textconfig" spellcheck="false">';
echo htmlspecialchars(ConfigGenerator::getConfigFile($GLOBALS['ConfigFile']));
echo '</textarea>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="lastrow" style="text-align: left">';
echo '<input type="submit" name="submit_download" value="'
    , __('Download') , '" class="green" />';
<<<<<<< HEAD
echo '<input type="submit" name="submit_save" value="' , __('Save') , '"';
if (!$config_writable) {
    echo ' disabled="disabled"';
}
echo '/>';
=======
>>>>>>> 9860b55650c4c7ee9976fb672b5165317a139584
echo '</td>';
echo '</tr>';

echo PMA_displayFieldsetBottomSimple();
echo PMA_displayFormBottom();
