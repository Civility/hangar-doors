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
?>
<?php $images = json_decode($displayData->images); ?>
<?php $imgfloat_fulltext = empty($images->float_fulltext) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
<?php $imgfloat_intro = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>

<?php if (!empty($images->image_intro) || !empty($images->image_fulltext)) : ?>
	<div class="images">
	<?php if (!empty($images->image_intro) && !empty($images->image_fulltext)) : ?>
		<a href="<?=$images->image_fulltext; ?>">
			<img src="<?=($images->image_intro); ?>" alt="<?=htmlspecialchars($images->image_intro_alt); ?>"
		<?php if ($images->image_intro_caption) : ?>
			title="<?=htmlspecialchars($images->image_intro_caption); ?>"
		<?php endif; ?>
			class="pull-<?=htmlspecialchars($imgfloat_intro); ?> image"
			itemprop="image"/>
		</a>
		<?php elseif(!empty($images->image_fulltext)): ?>
			<img src="<?=($images->image_fulltext); ?>" 
			alt="<?=htmlspecialchars($images->image_fulltext_alt); ?>" 
		<?php if ($images->image_fulltext_caption) : ?>
			title="<?=htmlspecialchars($images->image_fulltext_caption);?>"
		<?php endif; ?>
			class="pull-<?=htmlspecialchars($imgfloat_fulltext); ?> image"
			itemprop="image"/>

		<?php elseif(!empty($images->image_intro)): ?>
		<img src="<?=($images->image_intro); ?>" 
			alt="<?=htmlspecialchars($images->image_intro_alt); ?>" 
		<?php if ($images->image_intro_caption) : ?>
			title="<?=htmlspecialchars($images->image_intro_caption);?>"
		<?php endif; ?>
			class="pull-<?=htmlspecialchars($imgfloat_intro); ?> image"
			itemprop="image"/>
	<?php endif; ?>
	</div>
<?php endif; ?>