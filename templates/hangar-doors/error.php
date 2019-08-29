<?php 
defined('_JEXEC') or die; // Запрет на прямой доступ к файлу
jimport('joomla.application.module.helper'); 
$this->setGenerator(null);
$this->_script = $this->_scripts = array();
JHtml::_('jquery.framework', false);
$doc             = JFactory::getDocument();
$app             = JFactory::getApplication();
$tpath		  = '/templates/'.$this->template;
?>
<!DOCTYPE html>
<html lang="<?=$doc->language; ?>" dir="<?=$doc->description; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:locale" content="<?=$this->language; ?>">
	<meta property="og:title" content="<?=$doc->title; ?>">
	<meta property="og:description" content="<?=$doc->description; ?>">
	<meta property="og:url" content="<?=$url; ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?=$tpath.'/images/logo.svg'; ?>">
	<title>Ошибка <?=$this->error->getCode()." — "; echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?></title>
	<link href="<?=$tpath.'/favicon.ico';?>" rel="shortcut icon" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" href="<?=$tpath . '/css/app.css';?> "/>
	<link rel="stylesheet" href="<?=$tpath . '/css/style.css';?> "/>
</head>
<body>
	<div class="modal fade" id="modal_mail" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<button type="button" class="close ml-auto px-2" data-dismiss="modal" aria-label="Закрыть">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body">
					<?=RSFormProHelper::displayForm(3, true); ?>
				</div>
			</div>
		</div>
	</div>	
	<header class="header sticky" id="header">
		<nav class="header_desc">
			<div class="container">
				<a class="desc-logo" href="<?=JUri::base(); ?>">
					<img src="<?=$tpath.'/images/logo.svg';?>" alt="<?=$sitename; ?>" class="logo">
				</a>
				<span class="desc-text navbar-text"><?=JText::_('SLOGAN');?></span>
				<div class="desc-info-phone">
				<button type="button" class="btn">
					<a  href="tel:<?=JText::_('DESC_PHONE_HREF');?>" >
						<i class="far fa-phone"></i>
						<span class="desc-info-phone_label"><?=JText::_('DESC_PHONE');?></span>
					</a>
				</button>
				</div>
				<div class="desc-info-mail">
					<button type="button" class="btn">
						<a data-toggle="modal" data-target="#modal_mail">
							<i class="far fa-envelope"></i>
							<span class="desc-info-mail_label"><?=JText::_('DESC_MAIL');?></span>
						</a>
					</button>				
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<div class="header_nav">
			<div class="container">

				<div class="collapse navbar-collapse" id="mainMenu">
				<?php
					$modules =JModuleHelper::getModules('menu');
					foreach ($modules as $module){
						echo JModuleHelper::renderModule($module);
					} ?>
				</div>
			</div>
		</div>
	</header>
	<main class="container">
		<div class="card text-dark shadow">
		<div class="row no-gutters">
		<div class="col-md-6">
			<img src="<?=$tpath.'/images/404.jpg';?>" alt="<?=$sitename; ?>" class="card-img ">
		</div>
		<div class="col-md-6">
			<div class="card-body text-shadow d-flex flex-column align-items-center justify-content-center h-100">
				<h1 class="display-1">Ошибка <?=$this->error->getCode(); ?></h1>
				<p class="display-3 "><?=htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?></p>
				<div class="my-3">
					<a class="btn btn-dark btn-lg" href="<?=JUri::base(); ?>" role="button">Вернуться на главную страницу</a>
				</div>
				</div>
			</div>
			</div>
		</div>
	</main>
	<footer class="footer">
		<div class="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6"><img src="<?=$tpath.'/images/footer_logo.jpg';?>" alt="<?=$sitename; ?>" class="footer-logo"></div>
				<div class="col-md-6">	
					<ul class="contacts list-unstyled">
						<li><h3>Контакты</h3></li>
						<li><i class="fa-phone"></i>
							<a href="tel:<?=JText::_('DESC_PHONE_HREF');?>" class="info-phone"><?=JText::_('DESC_PHONE_RUS');?></a> <span class="info-label">(<?=JText::_('DESC_OFFICE_RUS');?>)</span>
						</li>
						<li><i class="fa-phone"></i>
							<a href="tel:<?=JText::_('DESC_PHONE_KAZ_HREF');?>" class="info-phone"><?=JText::_('DESC_PHONE_KAZ');?></a> <span class="info-label">(<?=JText::_('DESC_OFFICE_KAZ');?>)</span>
						</li>
						<li><?=JText::_('DESC_FOR_REQUSTS');?>
							<a href="tel:<?=JText::_('DESC_MAIL_HREF');?>" class="info-mail"><span class="info-label"><?=JText::_('DESC_MAIL_HREF');?></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</div>
		<div class="bottom">
			<div class="container">
			<div class="row">
				<span class="col-6" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<div class="copyright">&copy; <?=date('Y'); ?> <span itemprop="name"><?=JText::_('ETS_GROUP');?></span></div>
					<span class="d-none" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<meta itemprop="url image" content="<?=$tpath.'/images/logo.jpg' ;?>">
						<meta itemprop="width" content="150">
						<meta itemprop="height" content="150">
					</span>
				</span>
				<div class="col-6">
					<div class="security"><a href="#"><?=JText::_('SECURITY_POLICY');?></a></div>
				</div>
			</div>
			</div>
		</div>
		<div id="totop" class="totop" style="display: none;"><i class="arrow far fa-angle-up"></i></div>
	</footer>
	
<script src="<?=$tpath; ?>/js/libs.js"></script>
<script src="<?=$tpath; ?>/js/main.js"></script>

</body>
</html>