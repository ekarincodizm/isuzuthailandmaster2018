<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MemberVip */

$this->title = 'Create Member Vip';
$this->params['breadcrumbs'][] = ['label' => 'Member Vips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-vip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
