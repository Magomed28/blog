<?php
/* @var $this yii\web\View */
/* @var $user frontend\models\User */
/* @var $currentUser frontend\models\User */
/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */
/* @var $abc \frontend\components\FeedService */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use dosamigos\fileupload\FileUpload;

$this->title = Html::encode($user->username);
?>


<div class="page-posts no-padding">
	<div class="row">
		<div class="page page-post col-12">


			<div class="blog-posts blog-posts-large">

				<div class="row">

					<!-- profile -->
					<article class="profile col-12">
						<div class="profile-wrapper">
						<img src="<?php echo $user->getPicture(); ?>" id="profile-picture"  class="author-image" title="Изменить изображение"/>

						<div class="profile-title">



							<div class="author-name"><?php echo Html::encode($user->username); ?></div>

							<?php if ($currentUser && $currentUser->equals($user)): ?>

							<div class="change-img">
								<?=
								FileUpload::widget([
									'model' => $modelPicture,
									'attribute' => 'picture',
									'url' => ['/user/profile/upload-picture'], // your url, this is just for demo purposes,
									'options' => ['accept' => 'image/*'],
									'clientEvents' => [
										'fileuploaddone' => 'function(e, data) {
                                            if (data.result.success) {
                                                $("#profile-image-success").show();
                                                $("#profile-image-fail").hide();
                                                $("#profile-picture").attr("src", data.result.pictureUri);
                                            } else {
                                                $("#profile-image-fail").html(data.result.errors.picture).show();
                                                $("#profile-image-success").hide();
                                            }
                                        }',
									],
								]);
								?>
							</div>
							<!--                            <a href="#" class="btn btn-default">Upload profile image</a>-->
						</div>
						

						</div>	
							<?php endif; ?>

						<?php if ($currentUser && !$currentUser->equals($user)): ?>
							<?php if ($currentUser->isFollowing($user)): ?>
								<a href="<?php echo Url::to(['/user/profile/unsubscribe', 'id' => $user->getId()]); ?>" class="btn btn-info">Отписаться</a>

							<?php else: ?>
								<a href="<?php echo Url::to(['/user/profile/subscribe', 'id' => $user->getId()]); ?>" class="btn btn-info">Подписаться</a>
							<?php endif; ?>
							
							<div class="mutual-friends">
								Друзья, которые подписаны:
								<?php foreach ($currentUser->getMutualSubscriptionsTo($user) as $item): ?>
									
										 <a href="<?php echo Url::to(['/user/profile/view', 'nickname' => ($item['nickname']) ? $item['nickname'] : $item['id']]); ?>">
											<?php echo Html::encode($item['username']); ?> |
										</a>
									
								<?php endforeach; ?>
							</div>
							<hr>
						<?php endif; ?>

						<?php if ($user->about): ?>
							<div class="profile-description">
								<p><?php echo HtmlPurifier::process($user->about); ?></p>
							</div>
						<?php endif; ?>

						<div class="profile-bottom-wrapper">
							<div class="profile-post-count">
								<span><?php echo $user->getPostCount(); ?> публикаций</span>
							</div>
							<div class="profile-followers">
								<a href="#" data-toggle="modal" data-target="#myModal2"><?php echo $user->countFollowers(); ?> подписчиков</a>
							</div>
							<div class="profile-following">
								<a href="#" data-toggle="modal" data-target="#myModal1">Подписки: <?php echo $user->countSubscriptions(); ?> </a>
							</div>
						</div>

					</article>

					<div class="col-12">
						<div class="row profile-posts">
							<?php foreach($user->getPosts() as $post): ?>
								<div class="col-4 profile-post">
									<a href="<?php echo Url::to(['/post/default/view', 'id' => $post->getId()]); ?>">
										<img src="<?php echo Yii::$app->storage->getFile($post->filename); ?>" class="post-img" />
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>


				</div>

			</div>
		</div>

	</div>
</div>

<!-- Modal subscriptions -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Ваши подписки</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<?php foreach ($user->getSubscriptions() as $subscription): ?>
						<div class="col-md-12">
							<a href="<?php echo Url::to(['/user/profile/view', 'nickname' => ($subscription['nickname']) ? $subscription['nickname'] : $subscription['id']]); ?>">
								<?php echo Html::encode($subscription['username']); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal subscriptions -->

<!-- Modal followers -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Подписчики</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<?php foreach ($user->getFollowers() as $follower): ?>
						<div class="col-md-12">
							<a href="<?php echo Url::to(['/user/profile/view', 'nickname' => ($follower['nickname']) ? $follower['nickname'] : $follower['id']]); ?>">
								<?php echo Html::encode($follower['username']); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal followers -->