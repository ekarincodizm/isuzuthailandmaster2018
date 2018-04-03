<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Membersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'register';
// $this->params['breadcrumbs'][] = $this->title;
$baseUrl = 'isuzuthailandmaster2018';
?>
<div class="container">
    <div class="wrap-detail">
        <form action="/<?php echo $baseUrl; ?>/register" method="post" enctype="multipart/form-data" onsubmit="return checkIDStatus();">
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
                                <input type="text" name="CustomerRegister[fullname]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                บัตรประชาชน<sup>*</sup>
                            </td>
                            <td>
                                <input type="text" name="CustomerRegister[id_card]">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup>
                                <span>ตัวอย่าง ( 01-09-1988 )</span>
                            </td>
                            <td>
                                <input type="text" maxlength="2" class="date validate number" name="CustomerRegister[birthdate][day]" > <p>-</p>
                                <input type="text" maxlength="2" class="month validate number" name="CustomerRegister[birthdate][month]" maxlength="2" aria-required="true" > <p>-</p>
                                <input type="text" maxlength="4" class="year validate number" name="CustomerRegister[birthdate][year]" maxlength="4" aria-required="true" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                เบอร์ติดต่อ<sup>*</sup>
                            </td>
                            <td>
                                <input type="tel" name="CustomerRegister[phone]" class="number">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                อีเมล์
                            </td>
                            <td>
                                <input type="mail" name="CustomerRegister[email]">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box-detail">
                <h2>
                    ผู้สมัครเป็นลูกค้าประเภทใด
                </h2>
                <div class="txt-detail customer">
                    <ul>
                        <li class="not-value">
                            <label>
                                <input type="radio" name="CustomerRegister[customer_type]" value="isuzu">
                                <span></span>
                                <p>
                                    ลูกค้าอีซูซุ
                                </p>
                                <p>
                                    ทะเบียนรถ
                                    <input type="text" name="CustomerRegister[car_number]">
                                    เช่น กก1234
                                </p>
                            </label>
                            <ul class="register_isuzu_type">
                                <li class="not-value">
                                    <label>
                                        <input type="radio" name="CustomerRegister[owner]" id="owner" value="1">
                                        <span></span>
                                        <p>กรณีรถอีซูซุเป็นชื่อบุคคล</p>
                                    </label>
                                    <ul >
                                        <li>ชื่อเจ้าของรถอีซุซุ</li>
                                        <li> 
                                            <label>
                                                <input type="radio" class="radio-owner" name="CustomerRegister[register_me]" id="register_me" value="1">
                                                <span></span>
                                                <p>ตนเอง</p>
                                            </label>
                                        </li>
                                        <li>             
                                            <label>       
                                                <input type="radio" class="radio-owner" name="CustomerRegister[register_transfer]" id="register_transfer" value="1">
                                                <span></span>
                                                <p>บุคคลในครอบครัว</p>
                                                <p>ระบุชื่อเจ้าของรถอีซุซุ <input type="text" name="CustomerRegister[owner_name]"></p>
                                                <p>ความสัมพันธ์กับเจ้าของรถอีซูซุ</p>
                                            </label>
                                            <ul>
                                                <li>
                                                    <label>                                                
                                                        <input type="radio" name="CustomerRegister[related]" value="parents">
                                                        <span></span>
                                                        <p>บิดา / มารดา</p>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>                                                
                                                        <input type="radio" name="CustomerRegister[related]" value="baby">
                                                        <span></span>
                                                        <p>บุตร</p>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>                                                
                                                        <input type="radio" name="CustomerRegister[related]" value="spouse">
                                                        <span></span>
                                                        <p>สามี / ภรรยา</p>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>                                                
                                                        <input type="radio" name="CustomerRegister[related]" value="brethren">
                                                        <span></span>
                                                        <p>พี่น้อง (บิดา / มารดาเดียวกัน)</p>
                                                    </label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="not-value">
                                    <label>
                                        <input type="radio" name="CustomerRegister[corporate]" id="corporate" value="corporate">
                                        <span></span>
                                        <p>กรณีรถอีซูซุเป็นชื่อนิติบุคคล</p>
                                        <p>
                                            ผู้สมัครต้องเป็นผู้ที่มีรายชื่อเป็นกรรมการบริษัทเท่านั้น โดยชื่อต้องตรงกับหนังสือรับรองบริษัท
                                        </p>
                                    </label>
                                </li>
                            </ul>
                        </li>  
                        <li class="not-value">
                            <label>
                                <input type="radio" name="CustomerRegister[customer_type]" id="customer_type_normal" value="normal">
                                <span></span>
                                <p>
                                    ลูกค้าทั่วไป
                                </p>
                            </label>
                        </li>                              
                    </ul>
                </div>
            </div>
            <div class="box-detail">
                <h2>
                    สนามแข่งขัน (รอบคัดเลือก)
                </h2>
                <div class="txt-detail race">
                    <ul>
                       <?php foreach($playfiled as $row){ ?>
                        <li>
                            <label> <!-- <?php echo $row->status;?> -->
                                <input type="radio" name="CustomerRegister[playfield]" value="<?php echo $row->id ?>"  >
                                <span></span>
                                <ul>
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
                <input type="reset" name="" value="ยกเลิก">
                <input type="button" name="" id='register_button' value="ยืนยันการสมัคร">
                <input type="submit" name="" id='register_submit' value="ยืนยันการสมัคร" style="display: none;">
            </div>
        </form>                   
    </div> 
</div>

<?php 
$this->registerJsFile('@web/js/main.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
 ?>