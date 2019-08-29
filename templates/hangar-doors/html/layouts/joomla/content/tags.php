<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

$authorised = JFactory::getUser()->getAuthorisedViewLevels();

?>
<?php if (!empty($displayData)) : ?>
	<ul class="tags">
		<?php foreach ($displayData as $tag) : ?>
			<?php if (in_array($tag->access, $authorised)) : ?>
				<?php $tagParams = new Registry($tag->params); ?>
				<?php $tagMetadata = new Registry($tag->metadata); ?>
				<?php $tagRobots = $tagMetadata->get('robots'); ?>
				<?php $link_class = $tagParams->get('tag_link_class', 'badge'); ?>
				<li class="tags_list" itemprop="keywords">
				<?php if($tagRobots != 'noindex, nofollow') : ?>
					<a href="<?=JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . ':' . $tag->alias)); ?>" class="<?=$link_class; ?>"><?=$this->escape($tag->title); ?></a>
				<?php else : ?>
					<span class="<?=$link_class; ?>"><?=$this->escape($tag->title); ?></span>			
				<?php endif; ?>
				</li>
			<?php endif; ?>
			
		<?php endforeach; ?>
	</ul>
<?php endif; ?>