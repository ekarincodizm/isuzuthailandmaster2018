<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Vips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-vip-index">

    <h1><?= Html::encode($this->title) ?></h1>


</div>


<?php 

$this->registerJsFile('@web/js/bootstrap.min.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/bootstrap.min.css?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);

 ?>