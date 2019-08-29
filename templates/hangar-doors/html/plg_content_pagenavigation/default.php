<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();

?>
<nav aria-label="navigation">
	<ul class="pagination">
	<?php if ($row->prev) :
		$direction = $lang->isRtl() ? 'right' : 'left'; ?>
		<li class="page-item">
			<a class="page-link" title="<?php echo htmlspecialchars($rows[$location-1]->title); ?>" data-toggle="tooltip" data-placement="left" aria-label="<?php echo JText::sprintf('JPREVIOUS_TITLE', htmlspecialchars($rows[$location-1]->title)); ?>" href="<?php echo $row->prev; ?>" rel="prev">
				<?php echo '<span aria-label="'. $row->prev_label .'" ><i class="fa-angle-' . $direction . '" aria-hidden="true"></i> </span>'; ?>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($row->next) :
		$direction = $lang->isRtl() ? 'left' : 'right'; ?>
		<li class="page-item">
			<a class="page-link" title="<?php echo htmlspecialchars($rows[$location+1]->title); ?>" data-toggle="tooltip" data-placement="right" aria-label="<?php echo JText::sprintf('JNEXT_TITLE', htmlspecialchars($rows[$location+1]->title)); ?>" href="<?php echo $row->next; ?>" rel="next">
				<?php echo '<span aria-label="'. $row->next_label .'" ><i class="fa-angle-' . $direction . '" aria-hidden="true"></i></span>'; ?>
			</a>
		</li>
	<?php endif; ?>
	</ul>
</nav>