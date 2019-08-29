<?php
defined('_JEXEC') or die;

function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_default($module, &$params, &$attribs)
{
	$moduleTag     = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize !== 0 ? ' col-12 col-lg-' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h4'), ENT_QUOTES, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');
	
	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="module mod' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8') . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}
			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}