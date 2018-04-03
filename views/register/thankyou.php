<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'thankyou';
$this->params['breadcrumbs'][] = $this->title;
$baseUrl = 'isuzuthailandmaster2018';
?>

<div class="container">
            <div class="wrap-detail">
                <form>
                    <div class="title">
                        <h1>
                            อีซูซุไทยแลนด์มาสเตอร์ 2018
                        </h1>
                        <p>
                            ตีเสียดฟ้า...บนสนาม<b>ความสูงระดับเวิลด์คลาส</b>
                        </p>
                        <p>
                            ร่วมประลองวงสวิง กับทัวร์นาเมนท์สุดยิ่งใหญ่
                        </p> 
                        <p class="detail">
                            ชิงรางวัลแพ็คเกจเล่นกอล์ฟที่สนาม “เจดดราก้อน สโนว์เมาน์เทน กอล์ฟคลับ”<br>
                            (Jade Dragon Snow Mountain Golf Club) ณ เมืองลี่เจียง ประเทศจีน<br>
                            พร้อมลุ้นรางวัลพิเศษมากมาย*
                        </p>   
                    </div>                    
                    <div class="box-detail">
                        <strong>การกรอกข้อมูลใบสมัครเข้าร่วมการแข่งขันสมบูรณ์แล้ว</strong>
                        <p>
                            หมายเลขการสมัครของท่าน คือ<span><?php echo $id ?></span>
                        </p>
                        <p>
                            ผู้สมัครที่ได้รับสิทธิ์เข้าร่วมการแข่งขันกอล์ฟ <span></span>“อีซูซุไทยแลนด์มาสเตอร์ 2018”<br>
                            แต่ละสนามจะต้องได้รับโทรศัพท์ยืนยันสิทธิ์การเข้าร่วมการแข่งขันจากเจ้าหน้าที่ลูกค้าสัมพันธ์อีซูซุเท่านั้น
                        </p>
                        <a href="/<?php echo $baseUrl; ?>" class="btn">กลับหน้าแรก</a>
                    </div>
                </form>                   
            </div> 
        </div>
