<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'loginvip';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
            <div class="wrap-detail">
                <form id="login">
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
                            สมัครเข้าสู่ระบบ
                        </h2>
                        <div class="txt-detail">
                            <p>
                                กรุณากรอกหมายเลข
                            </p>
                            <ul>
                                <li>
                                    กรุณากรอก Username และ Password ตามการเข้าระบบของ Isuzu MU-X VIP Club
                                </li>
                                <li>
                                    Password จะต้องประกอบด้วย ตัวอักษรใหญ่ (Capital Letter) อย่างน้อย 1 ตัวอักษรและตัวเลข (Number) อย่างน้อย 1 ตัวเลข
                                </li>
                            </ul>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Username<sup>*</sup>
                                        </td>
                                        <td>
                                            <input type="text" name="user" value="Kavin">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password<sup>*</sup>
                                        </td>
                                        <td>
                                            <input type="password" name="pass" value="Boss291058">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box-btn">
                                <input type="reset" name="" class="login-reset" value="ยกเลิก">
                                <input type="submit" name="" value="ยืนยันการสมัคร">
                            </div>
                        </div>
                    </div>
                </form>                   
            </div> 
        </div>

<?php 

$this->registerJsFile('@web/js/main.js?=r'.date('ymd'), ['depends' => 'yii\web\YiiAsset']);
 ?>