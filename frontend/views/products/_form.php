<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
$this->registerJsFile('/js/categories.js');
?>

<div class="products-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'upc')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'case_count')->textInput() ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'cat_id')->dropDownList($cats, ['id' => 'categories','prompt' => 'Select a category']) ?>
            <?= $form->field($model, 'sub_cat_id')->dropDownList([], ['id' => 'sub_categories','prompt' => 'Select a category']) ?>
            <?= $form->field($model, 'sub_sub_cat_id')->dropDownList([], ['id' => 'sub_sub_categories','prompt' => 'Select a category']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
