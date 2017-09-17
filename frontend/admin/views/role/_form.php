<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rolename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rolestatus')->dropDownList([ '' => '', 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdby')->textInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <?= $form->field($model, 'updatedby')->textInput() ?>

    <?= $form->field($model, 'updatedon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
