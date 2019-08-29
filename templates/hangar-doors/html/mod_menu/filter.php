<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die; ?>
<ul class="nav menu menu<?php echo $class_sfx;?>"
<?php

	$tag = '';
	if ($tagId = $params->get('tag_id', ''))
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
// The menu class is deprecated. Use nav instead
?> itemscope itemtype="https://schema.org/SiteNavigationElement">

<?php foreach ($list as $i => &$item)
{
	$class = 'nav-item item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	// if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	// {
	// 	$class .= ' current';
	// }

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		// if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		// {
		// 	$class .= ' active';
		// }
		// elseif (in_array($aliasToId, $path))
		// {
		// 	$class .= ' alias-parent-active';
		// }
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	echo '<li class="' . $class . '" >';


	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;
		default:

		$attributes = array();
		$attributes['itemprop'] = 'url';
		if ($item->anchor_css) { 
			$attributes['class'] .= $item->anchor_css;
		}
		$linktype = $item->title;

		echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)), $linktype, $attributes);
			break;
	endswitch;

	// The next item is deeper.
	// if ($item->deeper)
	// {
	// 	echo '<ul class="nav-child unstyled">';
	// }
	// The next item is shallower.
	// elseif ($item->shallower)
	// {
	// 	echo '</li>';
	// 	echo str_repeat('</ul></li>', $item->level_diff);
	// }
	// The next item is on the same level.
	// else
	// {
	// 	echo '</li>';
	// }
}
?></ul>
