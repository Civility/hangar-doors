<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div id="mod<?php echo $moduleclass_sfx; ?>" class="module<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
	<div class="module_col">
		<div class="module_card">
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
		</div>
	</div>
	<?php endforeach; ?>
</div>

