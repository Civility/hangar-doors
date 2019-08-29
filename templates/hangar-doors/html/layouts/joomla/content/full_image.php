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
<?php if (!empty($images->image_fulltext)) : ?>
	<div class="images">
	<?php $imgfloat = empty($images->float_fulltext) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
		<img src="<?=htmlspecialchars($images->image_fulltext); ?>"
		<?php if ($images->image_fulltext_caption) :
			echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
		endif; ?>
		alt="<?=htmlspecialchars($images->image_fulltext_alt); ?>" class="pull-<?=htmlspecialchars($imgfloat); ?> image"	itemprop="image"/>
	</div>
<?php endif; ?>