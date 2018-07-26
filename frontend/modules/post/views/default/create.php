<?php

/* @var $this yii\web\View */
/* @var $model frontend\modules\post\models\forms\PostForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="post-default-index">
	<div class="create-post">
	<h1>Создать пост</h1>

	<?php $form = ActiveForm::begin(); ?>

	<?php echo $form->field($model, 'picture')->fileInput()->label('Изображение'); ?>

	<?php echo $form->field($model, 'description')->label('Описание'); ?>

	<?php echo Html::submitButton('Создать'); ?>

	<?php ActiveForm::end(); ?>
	</div>
</div>