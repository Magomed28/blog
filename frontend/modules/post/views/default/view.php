<?php

/* @var $this yii\web\View */
/* @var $post frontend\models\Post */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
?>
<div class="post-default-index">
    <div class="post">
    <div class="row">
        
        <div class="post-title">
		
            <img src="<?php echo Yii::$app->storage->getFile($post->user->picture); ?>" class = "author-img" alt="" />
                
        

            <div class="author-name">
                <?php if ($post->user): ?>
                    <?php echo $post->user->username; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-12">
            <img src="<?php echo $post->getImage(); ?>" />
        </div>

        <div class="col-12 description">
            <?php echo Html::encode($post->description); ?>
        </div>

    </div>

    <div class="row like-unlike">
	   <div class="col-12">
		        <i class="fa fa-lg fa-heart-o"></i> <span class="likes-count"><?php echo $post->countLikes(); ?></span>
                
		        <a href="#" class="button-unlike <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $post->id; ?>">
			            Unlike
				</a>
		        <a href="#" class="button-like<?php echo ($currentUser && $post->isLikedBy($currentUser)) ? " display-none" :"";?>" data-id="<?php echo $post->id; ?>">
			            Like
				</a>

	   </div>
    </div>
    </div>
</div>



<?php $this->registerJsFile('@web/js/likes.js', [
	    'depends' => JqueryAsset::class,
	]); 