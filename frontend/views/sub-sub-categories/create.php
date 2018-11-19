<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SubSubCategories */

$this->title = 'Create Sub Sub Categories';
$this->params['breadcrumbs'][] = ['label' => 'Sub Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-sub-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cats' => $cats,
    ]) ?>

</div>
