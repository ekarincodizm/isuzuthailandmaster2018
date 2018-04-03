<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberVip */

$this->title = 'Update Member Vip: '.$model->vip_fullname;
$this->params['breadcrumbs'][] = ['label' => 'Member Vips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->m_id, 'url' => ['view', 'id' => $model->m_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-vip-update">
	<div class="container bg-white">
		<br>
		<h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
		<div class="col-md-12">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
		</div>
    
	</div>
</div>
<?php 
$this->registerJsFile('@web/js/bootstrap.min.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('@web/css/bootstrap.min.css?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);

$this->registerCss("
    .grid-view{
        text-align: center;
    }
    .table,.member-vip-form,.bg-white {
        background: white;
    }
    .member-vip-form input{
    	font-size: 26px;
    }



    ");
 ?>