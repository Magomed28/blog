<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use frontend\assets\AppAsset;
use frontend\assets\FontAwesomeAsset;
use common\widgets\Alert;

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<?php $this->beginBody() ?>
	<body>

	<div class="wrapper">
		<header>
			<div class="header-top">
				<div class="container">
					<div class="col-12 brand-logo">
						
							<a href="<?php echo Url::to(['/site/index']); ?>">
								<img src="/img/beauty.jpg" alt="">
							</a>
					
					</div>
				</div>
			</div>


			<div class="header-main-nav">
				<div class="container">
					<div class="main-nav-wrapper">
						<nav class="main-menu">

							<?php
							$menuItems = [
								['label' => 'Лента', 'url' => ['/site/index']],
							];
							if (Yii::$app->user->isGuest) {
								$menuItems[] = ['label' => 'Регистрация', 'url' => ['/user/default/signup']];
								$menuItems[] = ['label' => 'Войти', 'url' => ['/user/default/login']];
							} else {
								$menuItems[] = ['label' => 'Мой профиль', 'url' => ['/user/profile/view', 'nickname' => Yii::$app->user->identity->getNickname()]];
								$menuItems[] = ['label' => 'Создать пост', 'url' => ['/post/default/create']];
								$menuItems[] = '<li>'
									. Html::beginForm(['/user/default/logout'], 'post')
									. Html::submitButton(
										'Выйти', ['class' => 'logout']
									)
									. Html::endForm()
									. '</li>';
							}
							echo Nav::widget([
								'options' => ['class' => 'menu navbar-nav navbar-right'],
								'items' => $menuItems,
							]);
							?>
						</nav>
					</div>
				</div>
			</div>

		</header>

		<div class="container full">
			<?= Alert::widget() ?>
			<?= $content ?>
		</div>

		<div class="push"></div>
	</div>

	<footer>
		<div class="footer">
			Beauty Village | 2018
		</div>
	</footer>

	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>