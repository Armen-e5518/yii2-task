<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SubCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sub Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'cat_id',
                'value' => function ($model) {
                    $cat = $model->GetParentCategory($model->cat_id);
                    return $cat ? $cat['name'] : '';
                }
            ],
            ['class' => 'yii\grid\ActionColumn',

                'template' => '{update}{delete}',
            ]
        ],
    ]); ?>
</div>
