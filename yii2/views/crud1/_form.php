<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Crud1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crud1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_combo')->textInput() ?>

    <?= $form->field($model, 'col3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col1')->textInput() ?>

    <?= $form->field($model, 'is_admin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
