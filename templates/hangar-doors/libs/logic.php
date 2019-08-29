<?php defined('_JEXEC') or die;
$this->setGenerator(null);
$this->_script = $this->_scripts = array();

// Add jQuery
JHtml::_('jquery.framework', false);
// picture
JFactory::getApplication()->setUserState('maxWidth', '(max-width: 768px)');
// variables
$doc          = JFactory::getDocument();
$app          = JFactory::getApplication();
$menu         = $app->getMenu();
$active       = $app->getMenu()->getActive();
$params       = $app->getParams();
$pageclass    = $params->get('pageclass_sfx');
$url          = rtrim(JUri::base(), '/');
$tpath		  = '/templates/'.$this->template;
$option       = $app->input->getCmd('option', '');
$view         = $app->input->getCmd('view', '');
$IdCategory   = JRequest::getInt('id');
// $social_title = $doc->getTitle();

// $doc->setHtml5(true);
$doc->setMetadata('X-UA-Compatible', 'IE=edge,chrome=1');
$doc->setMetadata('viewport', 'width=device-width, initial-scale=1.0');

// Copyrights
// $doc->setMetadata('copyright', trim($app->getCfg('sitename')));

$sitename = trim($app->getCfg('sitename'));

// template css, js
$doc->addStyleSheet($tpath . '/css/app.css');
$doc->addStyleSheet($tpath . '/css/style.css');
// modal module
// JHTML::_('behavior.modal');

// $doc->addScript($tpath . '/js/jq.js');
//вывод только на главной странице 
//if (JURI::current() == JURI::base()) :  //endif;
// if (JRequest::getVar('view') == 'featured') { 
// 	// $doc->addScript($tpath . '/js/app.js');
// 	// $doc->addScript($tpath . '/js/themes.js');
// }
// $doc->addScript($tpath . '/js/themes.js');