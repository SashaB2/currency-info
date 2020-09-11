<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $model app\models\CurrencyInfoSearchForm; */

$this->title = 'Currency exchange info';
    $this->params['breadcrumbs'][] = $this->title;
?>

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'id')?>
    <?= $form->field($model, 'bankName')?>
    <?= $form->field($model, 'ccy')?>
    <?= $form->field($model, 'baseCcy')?>
    <?= $form->field($model, 'buy')?>
    <?= $form->field($model, 'sale')?>
    <?= $form->field($model, 'updated')?>
    <?= Html::submitButton("Search", ['class' => 'btn btn-success'])?>

    <?php ActiveForm::end(); ?>

    <p><?php print_r($model->id)?></p>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr >
                <th>#</th>
                <th>bank_name</th>
                <th>ccy</th>
                <th>base_ccy</th>
                <th>buy</th>
                <th>sale</th>
                <th>updated</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($currencyInfo as $currency){
                ?>
                <tr>
                    <td><?php echo $currency['id']?></td>
                    <td><?php echo $currency['bank_name_ua']?></td>
                    <td><?php echo $currency['ccy']?></td>
                    <td><?php echo $currency['base_ccy']?></td>
                    <td><?php echo $currency['buy']?></td>
                    <td><?php echo $currency['sale']?></td>
                    <td><?php echo $currency['updated_at']?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>


