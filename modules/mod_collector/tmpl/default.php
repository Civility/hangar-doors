<?php
/**
 * @package     Module minigallery
 * @subpackage  mod_minigallery
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$collectors = $params->get('collectors');
$popup = $params->get('popup');
$source = $params->get('source');
?>

<div id="mod<?=$moduleclass_sfx ?>" class="collector module<?=$moduleclass_sfx ?>">
<?php if(!empty($module->content) && isset($module->content)): ?>
    <span class="collector_desc"><?=$module->content; ?></span>
<?php endif; ?>
<?php foreach ($collectors as $key => $item) : ?>
    <div class="collector_card">
    <?php if(!empty($item->imgmini) && $popup !=1 ): ?>
        <a href="<?=$item->imgmini; ?>" class="link">
    <?php endif; ?>
    <?php if(!empty($item->imgmini) || !empty($item->imgbig)): ?>
    <picture>
    <?php if(!empty($item->imgmini) && !empty($source)): ?>
        <source srcset="<?=$item->imgmini; ?>" media="(max-width: <?=$source;?>px)">
        <?php else : ?>
        <source srcset="<?=$item->imgbig; ?>">
   <?php endif; ?>
        <img 
        <?php if(!empty($item->imgbig)): ?>
            src="<?=$item->imgbig; ?>"
        <?php else : ?>
            src="<?=$item->imgmini; ?>"
        <?php endif; ?>
        <?php if(!empty($item->alt)): ?>
            alt="<?=$item->alt; ?>"
        <?php else : ?>
            alt="images_<?=$key; ?>"
        <?php endif; ?>
        <?php if(!empty($item->alt)): ?>
            title="<?=$item->title; ?>"
        <?php endif; ?>
        class="image">
    </picture>
    <?php endif; ?>
    <?php if(!empty($item->imgmini) && $popup !=1): ?>       
        </a>
    <?php endif; ?>
    <?php if(!empty($item->header) || !empty($item->text) || !empty($item->url)): ?>
        <div class="collector_card_item">
        <?php if(!empty($item->header)): ?>
            <h2 class="collector_card_item-topic"><?=$item->header; ?></h2>
        <?php endif; ?> 
        <?php if(!empty($item->text)): ?>
            <p class="collector_card_item-text"><?=$item->text; ?></p>
        <?php endif; ?>
        <?php if(!empty($item->url)): ?>
            <a class="btn" href="<?=$item->url; ?>" role="button"><?=$item->texturl; ?></a>
        <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>