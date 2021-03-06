<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Import from Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>', ['import'], ['class' => 'btn btn-info']) ?>
    </p>
    <p>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'upc',
            'case_count',
            'name',
            'description',
            //'brand',
            //'size',

            ['class' => 'yii\grid\ActionColumn',

                'template' => '{update}{delete}',
            ]
        ],
    ]); ?>
</div>
