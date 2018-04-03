<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Membersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$baseUrl = 'isuzuthailandmaster2018';
$this->title = 'register';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="wrap-detail">
        <form action="/<?php echo $baseUrl; ?>/register-vip" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
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
                <h2>
                    ข้อมูลผู้สมัคร
                </h2>
                <div class="txt-detail">
                    <table>
                        <tr>
                            <td>
                                ชื่อ-นามสกุล<sup>*</sup>
                            </td>
                            <td>
                                <input type="text" name="MemberVip[vip_fullname]">
                                <span>
                                    (กรุณาใส่ชื่อและนามสกุลตามบัตรประชาชน)
                                </span>
                            </td>
                        </tr>
                        <tr class="row-number">
                            <td>
                                กรุณากรอกหมายเลข<sup>*</sup>
                                <span>
                                    (VIP หรือ VIN NUMBER<br>อย่างใดอย่างหนึ่ง)
                                </span>
                            </td>
                            <td class="datamember_type">
                                <label>
                                    <input type="radio" class="radio-datamember" name="MemberVip[datamember_type]" value="vip">
                                    <span></span>
                                    <p>
                                        หมายเลขสมาชิก Isuzu MU-X VIP Club
                                    </p>
                                    <input type="text" class="" name="MemberVip[vip_number]"  >
                                    <a data-popup="img/vip-clup-update.jpg"><span>กดดูตัวอย่าง</span></a>
                                </label>
                                <label>
                                    <input type="radio" class="radio-datamember" name="MemberVip[datamember_type]" value="vin">
                                    <span></span>
                                    <p>
                                        VIN Number
                                        (จากสติกเกอร์บาร์โค้ดบนสมุดรับประกัน หรือเลขตัวรถจากสมุดทะเบียนรถของอีซูซุมิว-เอ็กซ์<br> หรืออีซูซุมิว-เซเว่น)
                                    </p>
                                    <input type="text" class="" name="MemberVip[vin_number]"  >
                                    <!-- <a data-popup="img/vin-update.jpg"></a> -->
                                    <span class="span-vin">ตัวอย่าง VIN Number (MP1xxxxxxxxxxxxxx)</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                หมายเลขบัตรประชาชน<sup>*</sup>
                            </td>
                            <td>
                                <input type="text" name="MemberVip[vip_id_card]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup>
                                <span>ตัวอย่าง ( 01-09-1988 )</span>
                            </td>
                            <td>
                                <input type="text" maxlength="2" class="date validate number" name="MemberVip[vip_birthdate][day]" > <p>-</p>
                                <input type="text" maxlength="2" class="month validate number" name="MemberVip[vip_birthdate][month]" maxlength="2" aria-required="true" > <p>-</p>
                                <input type="text" maxlength="4" class="year validate number" name="MemberVip[vip_birthdate][year]" maxlength="4" aria-required="true" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                เบอร์ติดต่อ<sup>*</sup>
                            </td>
                            <td>
                                <input type="tel" name="MemberVip[vip_phone]" class="number">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box-detail">
                <h2>
                    สนามแข่งขัน (รอบคัดเลือก)
                </h2>
                <div class="txt-detail race">
                    <ul class="playfield">
                       <?php foreach($playfiled as $row){ ?>
                        <li>
                            <label> <!-- <?php echo $row->status;?> -->
                                <input type="radio" name="MemberVip[playfield]" value="<?php echo $row->id ?>"  >
                                <span></span>
                                <ul >
                                    <li>
                                        <?php echo $row->name ?>
                                    </li>
                                    <li>
                                        จ. <?php echo $row->province; ?>
                                    </li>
                                    <li>
                                        วันที่ <?php echo $row->match_date; ?>
                                    </li>
                                </ul>
                            </label>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="box-btn">
                <input type="reset" onclick="location.href = 'http://isuzu-tis.com/<?php echo$baseUrl; ?>';" name="" value="ยกเลิก">
                <input type="submit" name="" value="ยืนยันการสมัคร">
            </div>
        </form>                   
    </div> 
</div>
<div class="popup">
    <div class="mesk-popup"></div>
    <div class="inner-popup">
        <a class="btn-close">✖</a>
        <div class="wrap-img"></div>
    </div>
</div>

<?php 
if(isset($_GET['error_massage_1']) || isset($_GET['error_massage_2'])  ){
    ?>
    <script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>
    <?php
}
$this->registerJsFile('@web/js/main-new.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);

 ?>