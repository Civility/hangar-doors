<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

// Create a shortcut for params.
$params = $displayData->params;
$canEdit = $displayData->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
?>

<?php if ($displayData->state == 0 || $params->get('show_title') || ($params->get('show_author') && !empty($displayData->author ))) : ?>
	<h2 class="page-title" itemprop="name">
		<?php if ($params->get('show_title')) : ?>
				<?php if ($params->get('link_titles') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) : ?>
					<a href="<?=JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>" class="page-title-link" itemprop="url"><?=$this->escape($displayData->title); ?></a>
				<?php else : ?>
					<?=$this->escape($displayData->title); ?>
				<?php endif; ?>
		<?php endif; ?>
		
		<?php if ($displayData->state == 0) : ?>
			<small class="alert alert-warning"><?=JText::_('JUNPUBLISHED'); ?></small>
		<?php endif; ?>

		<?php if (strtotime($displayData->publish_up) > strtotime(JFactory::getDate())) : ?>
			<small class="alert alert-warning"><?=JText::_('JNOTPUBLISHEDYET'); ?></small>
		<?php endif; ?>
		
		<?php if ($displayData->publish_down != JFactory::getDbo()->getNullDate()
			&& (strtotime($displayData->publish_down) < strtotime(JFactory::getDate()))
		) : ?>
			<small class="alert alert-warning"><?=JText::_('JEXPIRED'); ?></small>
		<?php endif; ?>
	</h2>
<?php endif; ?>
