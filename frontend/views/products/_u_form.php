<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
$this->registerJsFile('/js/attachments.js');
$this->registerJsFile('/js/categories.js');

?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php if (!empty($res_image) && $res_image['status'] == false && !empty($res_image['error'])) : ?>
        <div class="callout callout-danger">
            <h4>Error!</h4>
            <?= $res_image['error'] ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($res_video) && $res_video['status'] == false && !empty($res_video['error'])) : ?>
        <div class="callout callout-danger">
            <h4>Error!</h4>
            <?= $res_video['error'] ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Product</h3>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'upc')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'case_count')->textInput() ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'cat_id')->dropDownList($cats, ['id' => 'categories', 'prompt' => 'Select a category']) ?>
                    <?= $form->field($model, 'sub_cat_id')->dropDownList($sub_cats, ['id' => 'sub_categories', 'prompt' => 'Select a category']) ?>
                    <?= $form->field($model, 'sub_sub_cat_id')->dropDownList($sub_sub_cats, ['id' => 'sub_sub_categories', 'prompt' => 'Select a category']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Attachments</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Videos</h3>
                                    <div class="box-body">
                                        <div class="" id="videos">
                                            <?php if (!empty($videos)): ?>
                                                <?php foreach ($videos as $kay => $video) :++$kay ?>
                                                    <div class="item row">
                                                        <div class="col-md-12 index" data-index=<?= $kay ?>>
                                                            <H4>Video <?= $kay ?> </H4>
                                                            <a href="#" class="delete" style="color: red">Delete</a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <lable class="control-label">Video</lable>
                                                            <br>
                                                            <?php if (!empty($video['name'])): ?>
                                                                <video width="100%" controls>
                                                                    <source src="/videos/<?= $video['name'] ?>"
                                                                            type="video/mp4">
                                                                    Your browser does not support HTML5 video.
                                                                </video>
                                                            <?php endif; ?>
                                                            <input class="form-control" value="<?= $video['name'] ?>"
                                                                   type="hidden"
                                                                   name=videos[index_<?= $kay ?>][video]>
                                                            <input class="form-control" type="file"
                                                                   name=videos[index_<?= $kay ?>][video]>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="item row">
                                                    <div class="col-md-12 index" data-index=1>
                                                        <H4>Video 1 </H4>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <lable>Video</lable>
                                                        <input class="form-control" value=""
                                                               type="hidden"
                                                               name=videos[index_1][video]>
                                                        <input class="form-control" type="file"
                                                               name=videos[index_1][video]>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <br>
                                        <button type="button" id="add_new_video" class="btn btn-success">Add new Video
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Images</h3>
                                    <div class="box-body">
                                        <div class="" id="images">
                                            <?php if (!empty($images)): ?>
                                                <?php foreach ($images as $kay => $image) :++$kay ?>
                                                    <div class="item row">
                                                        <div class="col-md-12 index" data-index=<?= $kay ?>>
                                                            <H4>Image <?= $kay ?> </H4>
                                                            <a href="#" class="delete">Delete</a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <lable class="control-label">Image</lable>
                                                            <br>
                                                            <?php if (!empty($image['name'])): ?>
                                                                <img src="/images/<?= $image['name'] ?>" width="100%"
                                                                     alt="">
                                                            <?php endif; ?>
                                                            <input class="form-control" value="<?= $image['name'] ?>"
                                                                   type="hidden"
                                                                   name=images[index_<?= $kay ?>][image]>
                                                            <input class="form-control" type="file"
                                                                   name=images[index_<?= $kay ?>][image]>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="item row">
                                                    <div class="col-md-12 index" data-index=1>
                                                        <H4>Image 1 </H4>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <lable>Image</lable>
                                                        <input class="form-control" value=""
                                                               type="hidden"
                                                               name=images[index_1][image]>
                                                        <input class="form-control" type="file"
                                                               name=images[index_1][image]>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <br>
                                        <button type="button" id="add_new_image" class="btn btn-success">Add new Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
