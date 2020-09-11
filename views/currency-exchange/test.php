<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin();?>

<?= $form->field($model, 'id')?>

<?= Html::submitButton("Search", ['class' => 'btn btn-success'])?>

<?php ActiveForm::end(); ?>



