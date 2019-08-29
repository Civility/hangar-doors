<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$db =JFactory::getDBO();
$query = $db->getQuery(true);
$query
	->select($db->quoteName('tag_id'))
	->from($db->quoteName('#__contentitem_tag_map'))
	->where($db->quoteName('content_item_id') . ' = '. $displayData->id);
$db->setQuery($query);
$result = $db->loadObjectList(); 
foreach ($result as $row) : $page_tag_id = ($row->tag_id);
endforeach;
$query = $db->getQuery(true);
$query
	->select(array('a.title', 'a.alias', 'a.images'))
	->from($db->quoteName('#__content', 'a'))
	->join('INNER', $db->quoteName('#__contentitem_tag_map', 'b') . ' ON (' . $db->quoteName('b.content_item_id') . ' = ' . $db->quoteName('a.id') . ')')
		->where($db->quoteName('b.tag_id') . '= ' .$page_tag_id)
		->where($db->quoteName('a.state') . '=1 ')
		->where($db->quoteName('a.catid') . '=14');
$db->setQuery($query);
$result = $db->loadObjectList();
?>
<div class="examples">
<?php 
foreach($result as $key => $rowval) : 
	$val_title = $this->escape($rowval->title);
	$val_alias = $this->escape($rowval->alias);
	$val_images  = json_decode($rowval->images);
	?>
	<div class="examples_box">
		<a href="/projects/<?=$val_alias; ?>" class="link">
			<img src="<?=$val_images->image_intro; ?>" alt="<?php echo $val_images->image_intro_alt != '' ? $val_images->image_intro_alt : $val_title; ?>" class="image">
			<div class="examples_box-content">
				<h4 class="page-subtitle"><?=$val_title; ?></h4>
			</div>
		</a>
	</div>
<?php endforeach; ?>
</div>