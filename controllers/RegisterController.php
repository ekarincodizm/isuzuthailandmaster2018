<?php

namespace app\controllers;

use Yii;
#use yii\filters\AccessControl;
use app\models\MemberVip;
use app\models\CustomerRegister;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Playfield;
use app\models\Upload;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**



 * RegisterController implements the CRUD actions for MemberVip model.
 */
class RegisterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MemberVip models.
     * @return mixed
     */
    public function actionMemberVip()
    {   

        $model = new MemberVip();
        $session = Yii::$app->session;
        $data_customer = '';
        // if(!$session->get('data') ){
        //     return $this->redirect(['/']);
        // }

        $formatter = \Yii::$app->formatter;

        if ($model->load(Yii::$app->request->post())) {

            // if( $model->vin_number == '' && $model->vip_number == ''){
            //     return $this->redirect(['/register-vip', 'error_massage' => 'กรุณากรอก vin_number หรือ vip_number']);
            // }

            // if( $model->vin_number == '' && $model->vip_number == ''){
            //     //echo "<script type='text/javascript'>alert('กรุณากรอกVip number หรือ vin number');</script>";
            //     return $this->redirect(['/register-vip','error_massage_1' =>'error']);
            // }

            if($model->playfield == ''){
                return $this->redirect(['/register-vip' ,'error_massage_2' =>'error']);
            }

            $vip_birthdate_year = '';
            //date('Y-m-d H:i:s')

            $model->create_date = date('Y-m-d H:i:s');
            
            if($model->vip_birthdate['year']>= date('Y')){
                $vip_birthdate_year = ($model->vip_birthdate['year']-543);
            }else{
                $vip_birthdate_year = $model->vip_birthdate['year'];
            }
            $model->vip_birthdate =  $vip_birthdate_year.'-'.$model->vip_birthdate['month'].'-'.$model->vip_birthdate['day'];

            if($model->register_birthdate['day'] == ''){
                $model->register_birthdate = '';
            }else{
                if($model->register_birthdate['year']>= date('Y')){
                    $vip_register_birthdate = ($model->register_birthdate['year']-543);
                }else{
                    $vip_register_birthdate = $model->register_birthdate['year'];
                }
                $model->register_birthdate = $vip_register_birthdate.'-'.$model->register_birthdate['month'].'-'.$model->register_birthdate['day'];
            }

            // $model_upload = new UploadForm();
            // $model_upload->imageFile   = UploadedFile::getInstance($model, 'document');
            // $model->document = $model_upload->upload();

            // $model_upload = new UploadForm();
            // $model_upload->imageFile   = UploadedFile::getInstance($model, 'document_related');
            // $model->document_related = $model_upload->upload();


            // if(isset($_FILES)){
            //     foreach($_FILES['MemberVip']['name'] as $index => $value_File){
            //         if($value_File){
            //             $files['name'] = $_FILES['MemberVip']['name'][$index];
            //             $files['size'] = $_FILES['MemberVip']['size'][$index];
            //             $files['tempName'] = $file_tmp[] = $_FILES['MemberVip']['tmp_name'][$index];
            //             $files['type'] = $file_type[] = $_FILES['MemberVip']['type'][$index];
            //             $upload = new Upload();
            //             if($index == 'document'){
            //                 $model->document = $upload->upload($files);
            //             }else{
            //                 $model->document_related = $upload->upload($files);
            //             }
            //         }
            //     }
            // }

            // $verifyid_old = '0000';
            // do {
            //     $verifyid = $this->randomString();
            //     $verifyid_customer = CustomerRegister::find()->where(['verifyid' => $verifyid])->one();
            //     $verifyid_vip = MemberVip::find()->where(['verifyid' => $verifyid])->one();
            // } while ($verifyid_customer != '' and $verifyid_vip != '');

            // $model->verifyid = $verifyid;
            

            $model->save(false);
            $data = MemberVip::findOne($model->m_id);

            //$data->verifyid = $this->randomString().$this->randomInt().$this->randomString();

            do {
                $verifyid = $this->randomString().$this->randomInt().$this->randomString();
                $verifyid_customer = CustomerRegister::find()->where(['verifyid' => $verifyid])->one();
                $verifyid_vip = MemberVip::find()->where(['verifyid' => $verifyid])->one();
            } while ($verifyid_customer != '' and $verifyid_vip != '');
            $data->verifyid = $verifyid;
            //$data->verifyid = $this->randomString().$model->m_id.$this->randomString();
            $data->save();

            $session->remove('data');
            return $this->redirect(['/thankyou', 'id' => $data->verifyid]);
            //return $this->redirect(['register', 'id' => $model->m_id]);
        }else if($session->get('data')){
            $formatter = \Yii::$app->formatter;
            $data_login = str_replace("(","",$session->get('data'));
            $data_login = str_replace(")","",$data_login);
            $data_customer = json_decode($data_login);
            $data_customer->vip_fullname = $data_customer->first_name.' '.$data_customer->last_name;
            $data_customer->vip_id_card = $data_customer->id_card;
            $data_customer->vip_phone = $data_customer->mobile;
            
            if($data_customer->dob != '0000-00-00'){
                $data_customer->day = $formatter->asDate($data_customer->dob, 'php:d');
                $data_customer->month = $formatter->asDate($data_customer->dob, 'php:m');
                $data_customer->year = $formatter->asDate($data_customer->dob, 'php:Y');
            }else{
                $data_customer->day = '';
                $data_customer->month = '';
                $data_customer->year = '';
            }

        }

        $playfiled_result = Playfield::find()->all();

        foreach ($playfiled_result as $key => $value) {
            $playfiled_result[$key]->match_date = $this->DateThai($value->match_date).'<br>';
        }
        
        //Yii::$app->formatter->locale = 'th_TH';
        $time = date('YmdHis');

        foreach ($playfiled_result as $key => $value) {

            $start = date('YmdHis',strtotime($value->register_date));
            $end = date('YmdHis',strtotime($value->end_date));
            
            if($time >= $start && $time <= $end){
                $playfiled_result[$key]->status = '';
            }else{
                $playfiled_result[$key]->status = 'disabled';
            }

        }

    

        return $this->render('register-vip-new', [
            'model' => $model,
            'playfiled' =>$playfiled_result,
            'data_customer' => $data_customer,
            'error_massage' => isset($_GET['error_massage'])?$_GET['error_massage']:''

        ]);
    }

    public function actionCustomerRegister()
    {   

        $model = new CustomerRegister();

        $formatter = \Yii::$app->formatter;

        if ($model->load(Yii::$app->request->post())) {



            $verifyid_card = CustomerRegister::find()
                            ->where(['id_card' => $model->id_card,'playfield'=> $model->playfield])
                            ->all();
            $verify_status =  CustomerRegister::find()
                                ->where(['id_card' => $model->id_card,'status'=> 'yes'])
                                ->all();

            // if(count($verifyid_card) >=1){
            //     echo '<script type="text/javascript">alert("บัตรประชาชนซ้ำ");</script>';
            //     echo '<script type="text/javascript">window.history.back();</script>';
            //     exit(0);
            // }else if(count($verify_status) >= 1) {
            //     echo '<script type="text/javascript">alert("คุณเคยสมัครสมาชิกแล้ว");</script>';
            //     echo '<script type="text/javascript">window.history.back();</script>';
            //     exit(0);
            // }

           
            $birthdate_year = '';

            $model->create_date = date('Y-m-d H:i:s');

            if($model->birthdate['year']>= date('Y')){
                $birthdate_year = ($model->birthdate['year']-543);
            }else{
                $birthdate_year = $model->birthdate['year'];
            }
            $model->birthdate =  $birthdate_year.'-'.$model->birthdate['month'].'-'.$model->birthdate['day'];

            // $verifyid_old = '0000';
            // do {
            //     $verifyid = $this->randomString();
            //     $verifyid_customer = CustomerRegister::find()->where(['verifyid' => $verifyid])->one();
            //     $verifyid_vip = MemberVip::find()->where(['verifyid' => $verifyid])->one();
            // } while ($verifyid_customer != '' and $verifyid_vip != '');

            // $model->verifyid = $verifyid;

            $model->save(false);

            $data = CustomerRegister::findOne($model->c_id);

            //$data->verifyid = $this->randomString().$model->c_id.$this->randomString();

            do {
                $verifyid = $this->randomString().$this->randomInt().$this->randomString();
                $verifyid_customer = CustomerRegister::find()->where(['verifyid' => $verifyid])->one();
                $verifyid_vip = MemberVip::find()->where(['verifyid' => $verifyid])->one();
            } while ($verifyid_customer != '' and $verifyid_vip != '');
            $data->verifyid = $verifyid;

            $data->save();

            return $this->redirect(['/thankyou', 'id' => $data->verifyid]);
            //return $this->redirect(['register', 'id' => $model->m_id]);
        }

        $playfiled_result = Playfield::find()->all();

        foreach ($playfiled_result as $key => $value) {
            $playfiled_result[$key]->match_date = $this->DateThai($value->match_date).'<br>';
        }
        
        $time = date('YmdHis');

        foreach ($playfiled_result as $key => $value) {

            $start = date('YmdHis',strtotime($value->register_date));
            $end = date('YmdHis',strtotime($value->end_date));
            
            if($time >= $start && $time <= $end){
                $playfiled_result[$key]->status = '';
            }else{
                $playfiled_result[$key]->status = 'disabled';
            }

        }

        return $this->render('register', [
            'model' => $model,
            'playfiled' =>$playfiled_result,
        ]);
    }

    function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        return "$strDay $strMonthThai $strYear";
    }

    function randomString($length = 1) {
        $str = "";
        $characters = array_merge(range('a','z'));
        //$characters = array_merge(range('a','z'),range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    function randomInt($length = 1) {
        $str = "";
        $characters = array_merge(range('0','9'));
        //$characters = array_merge(range('a','z'),range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function actionSaveSession($user,$pass) {
        $url = 'https://vipclub.isuzumu-x.net/api_login/?user='.$user.'&pass='.$pass;

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if (curl_errno($ch)) {
          echo curl_error($ch);
          echo "\n<br />";
          $data = '';
        } else {
          curl_close($ch);
        }
         //$data = @file_get_contents('http://vipclub.isuzumu-x.net/api_login/?user='.$user.'&pass='.$pass,FILE_USE_INCLUDE_PATH);

        $session = Yii::$app->session;
        //$session->remove('data');
        
        if($data != 'false'){
            $session->set('data', $data);
            return 'true';
        }else{
            return $data;
        }
        
    }


    public function actionThankyou()
    {

        $id = Yii::$app->request->get('id');

        return $this->render('thankyou', [
             'id' => $id,
            // 'playfiled' =>$playfiled_result,
        ]);

    }
    public function actionCheckIdcard()
    {
        $post = Yii::$app->request->post();

        if (isset($post)) {
            $data = '';
            $id_card = $post['id_card'];
            $playfiled = $post['playfied'];

            $verifyid_card = CustomerRegister::find()
                            ->where(['id_card' => $id_card,'playfield'=> $playfiled])
                            ->all();
            $verify_status =  CustomerRegister::find()
                            ->where(['id_card' => $id_card,'status'=> 'yes'])
                            ->all();

            if(count($verifyid_card) >=1){
                $data = 'บัตรประชาชนซ้ำ';
            }else if(count($verify_status) >= 1) {
                $data = 'คุณเคยสมัครสมาชิกแล้ว';
            }else{
                $data = 'true';
            }

            return $data;

        }

    }


}
