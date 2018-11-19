<?php

use yii\widgets\ActiveForm;

?>
<div class="products-view">
    <h1>Import Excel File</h1>
    <hr>
    <?php if ($res !== true) : ?>
        <?php foreach ($res as $errors): ?>
            <?php foreach ($errors as $error): ?>
                <div class="callout callout-danger">
                    <h4>Error!</h4>
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="row">
        <div class="col-md-4">

            <h3>Download Example</h3>
            <a title="Download example" href="/example/example.xlsx" download="">
                <img src="/img/647702-excel-512.png" width="50" alt="">
            </a>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'excel')->fileInput()->label('Excel file') ?>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Import</button>

    <?php ActiveForm::end() ?>
</div>
