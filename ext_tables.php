<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';

$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform'; // new!

t3lib_extMgm::addPlugin(array('LLL:EXT:gkh_rss_import/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');

// now, add your flexform xml-file
// NOTE: Be sure to change sampleflex to the correct directory name of your extension!                    // new!
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:gkh_rss_import/flexform_ds_pi1.xml');             // new!


if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_gkhrssimport_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_gkhrssimport_pi1_wizicon.php';

t3lib_extMgm::addStaticFile($_EXTKEY,'static/rss_feed/', 'rss_feed');
?>