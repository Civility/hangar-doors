<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$headerTag = htmlspecialchars($params->get('header_tag'), ENT_QUOTES, 'UTF-8');
$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');
?>
<div class="mod-modal mod<?=$moduleclass_sfx; ?>">
	<button type="button" class="btn btn-modal">
		<?php if($moduleclass_sfx) : ;?>
			<?='<i class="icon mod'. $moduleclass_sfx .'-icon"></i>';?>
		<?php endif; ?>
		<span class="btn-modal-link">
			<<?=$headerTag;?> class="<?=$headerClass;?>" data-toggle="modal" data-target="#modal_<?=$module->id?>"><?=$module->title;?></<?=$headerTag;?>>
		</span>
	</button>
	<div class="modal" id="modal_<?=$module->id?>" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?=$params->get('backgroundimage'); ?>)"<?php endif; ?> >
				<button type="button" class="close ml-auto px-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body">
					<?=$module->content; ?>
				</div>
			</div>
		</div>
	</div>
</div>