<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    


    <div class="row login-row">
        <div class="col-3 login-col">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email')->textInput(array('placeholder' => 'Электронный адрес', 'class'=>'form-control text-center'))->label("")?>

                <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Пароль', 'class'=>'form-control text-center'))->label('') ?>
                
                <div class="forget-pass">
                     <?= Html::a('Забыли пароль?', ['/user/default/request-password-reset']) ?>
                </div>
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>

                


                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-3 facebook-wrapper">
		<h4>Вход через Facebook</h4>
          
		  
			<?= yii\authclient\widgets\AuthChoice::widget([
				'baseAuthUrl' => ['/user/default/auth'],
				'popupMode' => false,
			]) ?>
		  
        </div>
    </div>
</div>
