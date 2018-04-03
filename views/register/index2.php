<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Membersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index " >
    <div class="col-md-offset-2 col-md-8 header_register">
        
        <div class="header">
            <h2>อีซูซุไทยแลนด์มาสเตอร์ 2018</h2>
        </div>
        <div class="register-content">
            <h3>ข้อมูลผู้สมัคร</h3>
        </div>
  <!--   <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
           <?php $form = ActiveForm::begin([
           'enableClientValidation'=>false,
           'options' => ['enctype'=>'multipart/form-data']
           ]); ?>
    <div class="col-md-4">
        <label for="">ชื่อ-นามสกุล<span class="red">*</span></label>
    </div>
    <div class="col-md-8">

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'value' => @$data_customer->first_name.' '.@$data_customer->last_name])->label(false) ?>
    </div>
    <div class="col-md-4">
        <label for="">บัตรประชาชน<span class="red">*</span></label>
    </div>
    <div class="col-md-8">
        <?= $form->field($model, 'id_card')->textInput(['maxlength' => 13, 'value' => @$data_customer->id_card])->label(false) ?>
    </div>

    <div class="col-md-4">
        <label for="">วัน-เดือน-ปีเกิด<span class="red">*</span></label>
    </div>
    <div class="col-md-8 text-left">
        <div class="form-group field-member-birthdate form-inline required">
            <input type="text" class="form-group form-control day" name="Member[birthdate][day]" maxlength="2" aria-required="true" value="<?php if(isset($data_customer->id_card)) echo $data_customer->day;?>">
            <input type="text" class="form-group form-control month" name="Member[birthdate][month]" maxlength="2" aria-required="true" value="<?php if(isset($data_customer->id_card)) echo $data_customer->month;?>">
            <input type="text" class="form-group form-control year" name="Member[birthdate][year]" maxlength="4" aria-required="true" value="<?php if(isset($data_customer->id_card)) echo $data_customer->year;?>">
        <div class="help-block"></div>
        </div>
      <!--   <?= $form->field($model, 'birthdate')->textInput()->label(false) ?> -->
    </div>

    <div class="col-md-4">
        <label for="">เบอร์ติดต่อ<span class="red">*</span><span class="red">*</span></label>
    </div>
    <div class="col-md-8">
        <?= $form->field($model, 'id_card')->textInput(['maxlength' => true, 'value' => @$data_customer->mobile])->label(false) ?>
    </div>
    <div class="col-md-4">
        <label for="">อีเมล์</label>
    </div>
    <div class="col-md-8">
         <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => @$data_customer->user_email])->label(false) ?>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-4">
        <label for="">ผู้สมัครเป็นลูกค้าประเภทใด</label>
    </div>
    <div class="col-md-8">
        <?php 
        if($data_customer != ''){
            $model->customer_type = 'isuzu'; 
        }
        
        ?>
         <?= $form->field($model, 'customer_type')->radioList(array('isuzu'=>'ลูกค้าอีซูซุ','public'=>'ลูกค้าทั่วไป'))->label(false) ?>
    </div>

    <div class="col-md-offset-4 col-md-8 text-left">
        <div class="form-group field-member-customer_type">
            <div class="row">
                <div class="col-md-12">
                    <label><input type="radio" name="Member[customer_izusu_type]" id="type_personal" value="personal"> ลูกค้าบุคคล กรุณาแนบสำเนาทะเบียนรถของท่าน</label>
                </div>
                <div class="col-md-12 izusu_type_personal">
                    <?= $form->field($model ,'document')->fileInput(['class' => 'form-group form-control'])->label(false) ?>
                    <!-- <input type="file"  class="form-group form-control" name="Member[document]" aria-required="true"> -->
                </div>
                <div class="col-md-12">
                    <p>หรือโอนสิทธิ์ให้บุคลอื่น (โปรดระบุความสัมพันธ์)</p>
                </div>
                <div class="col-md-12 form-inline">
                    <label class="form-group" for="">เกี่ยวข้องเป็น</label>
                    <?= $form->field($model, 'related')->textInput(['maxlength' => true , 'class' => 'form-group form-control'])->label(false) ?>
                    <label class="form-group" for="">กับเจ้าของรถอีซุซุ</label>
                </div>
                <div class="col-md-12 ">
                    <?= $form->field($model ,'document_related')->fileInput()->label(false) ?>
                 <!--    <input type="file" class="form-group form-control " name="uploadFiles[document_related]" aria-required="true"> -->
            
                </div>
                <div class="col-md-12">
                    <p>(เช่นสามี,ภรรยา สำเนาะทะเบียนสมรถส และลูกบุตร สำเนาใบเกิด)</p>
                </div>
                <div class="col-md-12">
                    <label><input type="radio" name="Member[customer_izusu_type]" id="type_corporate" value="corporate"> ลูกค้านิติบุคคล กรุณาแนบสำเนาหนังสือรับรองบริษัทฯ</label>
                </div>
                <div class="col-md-12 izusu_type_corporate">

                   <!--  <input type="file" class="form-group form-control" name="uploadFiles[corporate]" aria-required="true"> -->
            
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <label for="">ผู้สมัครเป็นลูกค้าประเภทใด</label>
    </div>
    <div class="col-md-8 text-left nopadding">
      <!--  <input type="radio" name="Member[playfield]" value="personal"> บลูแคนยอน คันทรีคลับ จ.ภูเก็ต วันที่ 23 เม.ย. 2561</label> -->
        <?php 
         foreach($playfiled as $row){
            echo '<div class="col-md-12">';
            echo '<div class="col-md-1"><input type="radio" name="Member[playfield]" value="'.$row->name.'"></div>';
            echo '<div class="col-md-5">'.$row->name.'</div> ';
            echo '<div class="col-md-3">จ.'.$row->province.'</div>';
            echo '<div class="col-md-3">'.$row->match_date.'</div>';
            echo '</div>';
            }
        ?>
    </div>
    <br><br>
    

   


    

<div class="help-block"></div>

    
    <div class="col-md-12 form-group btn_submit">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
