<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

		<div id="modnews" class="articles-module">
			<?php if ($grouped) : ?>
				<?php foreach ($list as $group_name => $group) : ?>
				<div class="list-inline-item">
					<div class="module-card-group"><?=JText::_($group_name); ?></div>
					<div>
						<?php foreach ($group as $item) : ?>
							<div class="list-inline-item">
								<?php if ($params->get('link_titles') == 1) : ?>
									<a class="module-card-title <?=$item->active; ?>" href="<?=$item->link; ?>">
										<?=$item->title; ?>
									</a>
								<?php else : ?>
									<?=$item->title; ?>
								<?php endif; ?>

								<?php if ($item->displayHits) : ?>
									<span class="module-card-hits">
										(<?=$item->displayHits; ?>)
									</span>
								<?php endif; ?>

								<?php if ($params->get('show_author')) : ?>
									<span class="module-card-writtenby">
										<?=$item->displayAuthorName; ?>
									</span>
								<?php endif; ?>

								<?php if ($item->displayCategoryTitle) : ?>
									<span class="module-card-category">
										(<?=$item->displayCategoryTitle; ?>)
									</span>
								<?php endif; ?>

								<?php if ($item->displayDate) : ?>
									<span class="module-card-date"><?=$item->displayDate; ?></span>
								<?php endif; ?>

								<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
									<div class="module-card-tags">
										<?=JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
									</div>
								<?php endif; ?>

								<?php if ($params->get('show_introtext')) : ?>
									<p class="module-card-introtext">
										<?=$item->displayIntrotext; ?>
									</p>
								<?php endif; ?>

								<?php if ($params->get('show_readmore')) : ?>
									<p class="module-card-category-readmore">
										<a class="module-card-category-title <?=$item->active; ?>" href="<?=$item->link; ?>">
											<?php if ($item->params->get('access-view') == false) : ?>
												<?=JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
											<?php elseif ($readmore = $item->alternative_readmore) : ?>
												<?=$readmore; ?>
												<?=JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
													<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
														<?=JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
													<?php endif; ?>
											<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
												<?=JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
											<?php else : ?>
												<?=JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
												<?=JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php endif; ?>
										</a>
									</p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ($list as $item) : ?>
				<pre><?php print_r($item);?></pre>
					<div class="module-card">
					<?php $images = json_decode($item->images); ?>

					<?php if($images->image_intro) : ?>
					<div class="module-card-images">
						<img src="<?=$images->image_intro; ?>" 
						<?=$images->image_intro_alt ? 'alt="'.$images->image_intro_alt .'"' : 'alt="' . $item->title  . '"'  ;?>
						<?=$images->image_intro_caption ? 'title="' . $images->image_intro_caption . '"' : ''  ;?>
						class="images">
					</div>
					<?php endif; ?>

					<?php if ($item->displayDate) : ?>
						<span class="module-card-date"><?=$item->displayDate; ?></span>
					<?php endif; ?>
						<div class="module-card-body ">
							<?php if ($params->get('link_titles') == 1) : ?>
								<a class="card-title module-card-link<?=$item->active; ?>" href="<?=$item->link; ?>"><?=$item->title; ?></a>
							<?php else : ?>
								<?=$item->title; ?>
							<?php endif; ?>

							<?php if ($params->get('show_introtext')) : ?><p class="module-card-text"><?=$item->displayIntrotext; ?></p><?php endif; ?>
						</div>
						<div class="module-card-footer">
							<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
								<small class="tags module-card-tags"><?=JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?></small>
							<?php endif; ?>

							<?php if ($item->displayHits) : ?>
								<small class="hits module-card-hits">(<?=$item->displayHits; ?>)</small>
							<?php endif; ?>

							<?php if ($params->get('show_author')) : ?>
								<small class="writtenby module-card-writtenby"><?=$item->displayAuthorName; ?></small>
							<?php endif; ?>

							<?php if ($item->displayCategoryTitle) : ?>
								<small class="category module-card-category">(<?=$item->displayCategoryTitle; ?>)</small>
							<?php endif; ?>

							<?php if ($params->get('show_readmore')) : ?>
								<p class="readmore module-card-readmore">
									<a class="module-card-title <?=$item->active; ?>" href="<?=$item->link; ?>">
										<?php if ($item->params->get('access-view') == false) : ?>
											<?=JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
										<?php elseif ($readmore = $item->alternative_readmore) : ?>
											<?=$readmore; ?>
											<?=JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
											<?=JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
										<?php else : ?>
											<?=JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
											<?=JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php endif; ?>
									</a>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
