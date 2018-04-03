<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MemberVip */

$this->title = $model->m_id;
$this->params['breadcrumbs'][] = ['label' => 'Member Vips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-vip-view">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->m_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->m_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>
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