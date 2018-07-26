<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(array('placeholder' => 'Имя', 'class'=>'form-control text-center'))->label("") ?>

                <?= $form->field($model, 'email')->textInput(array('placeholder' => 'Электронный адрес', 'class'=>'form-control text-center'))->label("") ?>

                <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Пароль', 'class'=>'form-control text-center'))->label("") ?>

                <div class="form-group">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
