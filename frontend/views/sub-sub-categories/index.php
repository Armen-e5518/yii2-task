<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SubSubCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-sub-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sub Sub Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'sub_cat_id',
                'value' => function ($model) {
                    $cat = $model->GetParentCategory($model->sub_cat_id);
                    return $cat ? $cat['name'] : '';
                }
            ],

            ['class' => 'yii\grid\ActionColumn',

                'template' => '{update}{delete}',
            ]
        ],
    ]); ?>
</div>
