<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SubSubCategories */

$this->title = 'Update Sub Sub Categories: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sub Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-sub-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cats' => $cats,
    ]) ?>

</div>
