<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params = $displayData->params;
$images = json_decode($displayData->images);
?>
<?php if (!empty($images->image_intro) || !empty($images->image_fulltext)) : ?>
<div class="images">
	<?php if (!empty($images->image_fulltext)) : ?>
	<picture>
		<?php if (!empty($images->image_intro) && !empty($images->image_fulltext)) : ?>
			<source srcset="<?=$images->image_intro; ?>" media="<?=JFactory::getApplication()->getUserState('maxWidth'); ?>">
			<source srcset="<?=$images->image_fulltext; ?>" >
			<img src="<?=$images->image_fulltext; ?>"
		<?php elseif($images->image_fulltext): ?>
			<source srcset="<?=$images->image_intro; ?>" >
			<img src="<?=$images->image_intro; ?>"
		<?php endif; ?>

		<?php if ($images->float_intro) : ?> 
			class="pull-<?=htmlspecialchars($images->float_intro); ?> image"
			<?php elseif($images->float_intro) : ?>
			class="pull-<?=htmlspecialchars($images->float_fulltext); ?> image"
			<?php else : ?>
			class="pull-<?=htmlspecialchars($params->get('float_intro')); ?> image"
		<?php endif; ?>

		<?php if ($images->image_intro_alt) : ?> 
			alt="<?=htmlspecialchars($images->image_intro_alt); ?>"
			<?php elseif($images->image_fulltext_alt) : ?>
			alt="<?=htmlspecialchars($images->image_fulltext_alt); ?>"
		<?php endif; ?>

		<?php if ($images->image_intro_caption) : ?> 
			title="<?=htmlspecialchars($images->image_intro_caption); ?>"
			<?php elseif($images->image_fulltext_caption) : ?>
			title="<?=htmlspecialchars($images->image_fulltext_caption); ?>"
		<?php endif; ?>
		itemprop="image">
	</picture>
	<?php endif; ?>
</div>
<?php endif; ?>