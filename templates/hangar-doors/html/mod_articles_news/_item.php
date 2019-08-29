<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


defined('_JEXEC') or die;
$db = JFactory::getDbo();
$module->note = $db->setQuery("SELECT `note` FROM `#__modules` WHERE `id` = ".$module->id)->loadResult();
foreach($item->jcfields as $field) :
	$itemFieldVal[$field->name] = $field->value;
endforeach;
?>
	<div class="module_card-images">
		<?php if(!empty($itemFieldVal['imgsol']) && isset($itemFieldVal['imgsol'])) : ?>
			<?=($itemFieldVal['imgsol']); ?>
		<?php endif; ?>
		<?php if ($params->get('img_intro_full') !== 'none' && !empty($item->imageSrc)) : ?>
			<img src="<?=$item->imageSrc; ?>" <?=$item->imageAlt ? 'alt="'.$item->imageAlt .'"': 'alt="'.$item->title.'"' ;?><?php if (!empty($item->imageCaption)) : ?> title="<?=$item->imageCaption; ?>" <?php endif; ?> class="image">
		<span class="info-published">
			<time datetime="<?php echo JHtml::_('date', $item->publish_up, 'c'); ?>" itemprop="datePublished"><?php echo JText::sprintf(JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC'))); ?></time>
		</span>
		<?php endif; ?>
	</div>

	<?php // title ?>
	<div class="module_card-item">
		<?php if ($params->get('item_title')) : ?>
			<?php $item_heading = $params->get('item_heading', 'h4'); ?>
			<?php if ($item->link != '' && $params->get('link_titles') != 1) : ?>
				<<?=$item_heading; ?> class="module_card-title <?=$params->get('header_class'); ?>"><?=JHtml::_('string.truncate', $item->title, htmlspecialchars((int) $module->note),false, false);?></<?=$item_heading; ?>>
			<?php else : ?>
				<a href="<?=$item->link; ?>" class="module_card-link"><<?=$item_heading; ?> class="module_card-title <?=$params->get('header_class'); ?>">
				<?php if(!empty($itemFieldVal['titlesol']) && isset($itemFieldVal['titlesol'])): 
					echo $itemFieldVal['titlesol']; 
				else :
					echo JHtml::_('string.truncate', $item->title, htmlspecialchars((int) $module->note),false, false);
				endif; ?>
				</<?=$item_heading; ?>></a>
			<?php endif; ?>
		<?php endif; ?>
		<?=$item->beforeDisplayContent; ?>
		<?php if (!$params->get('intro_only')) : ?>
			<?=$item->afterDisplayTitle; ?>
		<?php endif; ?>
		<?php if ($params->get('show_introtext', 1)) : ?>
			<div class="module_card-text"><?=$item->introtext; ?></div>
		<?php endif; ?>
		<?=$item->afterDisplayContent; ?>
	</div>
	<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
	<div class="module_card-footer">
		<?='<a class="readmore" href="' . $item->link . '">' . $item->linkText . '</a>'; ?>
	</div>	
	<?php endif; ?>








