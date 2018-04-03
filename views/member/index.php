<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Vips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-vip-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Member Vip', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <div class="container">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'panel'=>[
                    'before'=>' '
            ],
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                'm_id',
                'vip_fullname',
                'vip_id_card',
                'vip_birthdate',
                'vip_phone',
                'vip_email:email',
                'customer_type',
                'owner',
                'corporate',
                'join_me',
                'register_transfer',
                'owner_name',
                'related',
                'register_fullname',
                'register_id_card',
                'register_birthdate',
                'register_phone',
                'register_email:email',
                'verifyid',
                'playfield',
                'create_date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
<?php 

$this->registerJsFile('@web/js/bootstrap.min.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/bootstrap.min.css?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);

$this->registerCss("
    .grid-view{
        text-align: center;
    }
    .table {
        background: white;
    }

    ");


 ?>