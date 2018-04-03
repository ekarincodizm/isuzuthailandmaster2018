<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Membersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$baseUrl = 'dev_isuzuthailandmaster2018';
$this->title = 'register';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="wrap-detail">
       <form id="w0" action="/<?php echo $baseUrl; ?>/register-vip" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
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
                    ข้อมูลสมาชิก
                </h2>
                <div class="txt-detail">
                    <table>
                        <tr>
                            <td>
                                ชื่อ-นามสกุล<sup>*</sup>
                            </td>
                            <td>
                                <input type="text" class="validate" name="MemberVip[vip_fullname]" value="<?php echo @$data_customer->vip_fullname; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                บัตรประชาชน<sup>*</sup>
                            </td>
                            <td>
                                <input type="text" class="validate" name="MemberVip[vip_id_card]" value="<?php echo @$data_customer->vip_id_card; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup>
                                <span>ตัวอย่าง ( 01-09-1988 )</span>
                            </td>
                            <td>
                                <input type="text" maxlength="2" class="date validate number" name="MemberVip[vip_birthdate][day]" value="<?php if(isset($data_customer->day)) echo $data_customer->day;?>" > <p>-</p>
                                <input type="text" maxlength="2" class="month validate number" name="MemberVip[vip_birthdate][month]" maxlength="2" aria-required="true" value="<?php if(isset($data_customer->month)) echo $data_customer->month;?>" > <p>-</p>
                                <input type="text" maxlength="4" class="year validate number" name="MemberVip[vip_birthdate][year]" maxlength="4" aria-required="true" value="<?php if(isset($data_customer->year)) echo $data_customer->year;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                เบอร์ติดต่อ<sup>*</sup>
                            </td>
                            <td>
                                <input type="tel" class="validate number" name="MemberVip[vip_phone]" value="<?php if(isset($data_customer->vip_phone)) echo $data_customer->vip_phone;?>" >
                                <input type="hidden"  name="MemberVip[customer_type]" value="VIP" >
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
                                <input type="radio" value="1" id="owner" name="MemberVip[owner]" value="1">
                                <span></span>
                                <p>กรณีรถอีซูซุเป็นชื่อบุคคล</p>
                            </label>
                            <ul>
                                <li> 
                                    <label>
                                        <input type="radio" class="radio-owner radio-join_me" name="MemberVip[join_me]" value="1">
                                        <span></span>
                                        <p>ตนเอง</p>
                                    </label>
                                </li>
                                <li>             
                                    <label>       
                                        <input type="radio" class="radio-owner radio-register_transfer" name="MemberVip[register_transfer]"  value="1">
                                        <span></span>
                                        <p>โอนสิทธิ์ให้บุคคลในครอบครัว</p>
                                   <!--      <p>ระบุชื่อเจ้าของรถอีซุซุ <input type="text" name="MemberVip[owner_name]"></p> -->
                                        <p>ความสัมพันธ์กับเจ้าของรถอีซูซุ</p>
                                    </label>
                                    <ul>
                                        <li>
                                            <label>                                                
                                                <input type="radio" name="MemberVip[related]" value="parents">
                                                <span></span>
                                                <p>บิดา / มารดา</p>
                                            </label>
                                        </li>
                                        <li>
                                            <label>                                                
                                                <input type="radio" name="MemberVip[related]" value="baby">
                                                <span></span>
                                                <p>บุตร</p>
                                            </label>
                                        </li>
                                        <li>
                                            <label>                                                
                                                <input type="radio" name="MemberVip[related]" value="spouse">
                                                <span></span>
                                                <p>สามี / ภรรยา</p>
                                            </label>
                                        </li>
                                        <li>
                                            <label>                                                
                                                <input type="radio" name="MemberVip[related]" value="brethren">
                                                <span></span>
                                                <p>พี่น้อง (บิดา / มารดาเดียวกัน)</p>
                                            </label>
                                        </li>
                                    </ul>
                                    <table class="table-owner">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    ข้อมูลผู้สมัคร
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody >                                            
                                            <tr>
                                                <td>
                                                    ชื่อ-นามสกุล<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_fullname]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    หมายเลขบัตรประชาชน<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_id_card]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup>
                                                    <span>ตัวอย่าง ( 01-09-1988 )</span>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_birthdate][day]" class="date number" maxlength="2"> <p>-</p>
                                                    <input type="text" name="MemberVip[register_birthdate][month]" class="month number" maxlength="2"> <p>-</p>
                                                    <input type="text" name="MemberVip[register_birthdate][year]" class="year number" maxlength="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    เบอร์ติดต่อ<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="tel" name="MemberVip[register_phone]" class="number">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    อีเมล์
                                                </td>
                                                <td>
                                                    <input type="mail" name="MemberVip[register_email]">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </li>
                        <li class="not-value">
                            <label>
                                <input type="radio"  id="corporate" name="MemberVip[corporate]" value="1" >
                                <span></span>
                                <p>กรณีรถอีซูซุเป็นชื่อนิติบุคคล</p>
                                <p>
                                    ผู้สมัครต้องเป็นผู้ที่มีรายชื่อเป็นกรรมการบริษัทเท่านั้น โดยชื่อต้องตรงกับหนังสือรับรองบริษัท
                                </p>
                                <table class="table-corporate">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                ข้อมูลผู้สมัคร
                                            </th>
                                        </tr>
                                    </thead>
                                   <tbody>                                            
                                            <tr>
                                                <td>
                                                    ชื่อ-นามสกุล<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_fullname]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    บัตรประชาชน<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_id_card]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    วัน-เดือน-ปีเกิด (ค.ศ.)<sup>*</sup>
                                                    <span>ตัวอย่าง ( 01-09-1988 )</span>
                                                </td>
                                                <td>
                                                    <input type="text" name="MemberVip[register_birthdate][day]" class="date" maxlength="2"> <p>-</p>
                                                    <input type="text" name="MemberVip[register_birthdate][month]" class="month" maxlength="2"> <p>-</p>
                                                    <input type="text" name="MemberVip[register_birthdate][year]" class="year" maxlength="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    เบอร์ติดต่อ<sup>*</sup>
                                                </td>
                                                <td>
                                                    <input type="tel" name="MemberVip[register_phone]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    อีเมล์
                                                </td>
                                                <td>
                                                    <input type="mail" name="MemberVip[register_email]">
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
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
                                <input type="radio" name="MemberVip[playfield]" value="<?php echo $row->id ?>">
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
                <input type="submit" name="" value="ยืนยันการสมัคร">
            </div>
        </form>                 
    </div> 
</div>

<?php 
$this->registerJsFile('@web/js/main.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
 ?>