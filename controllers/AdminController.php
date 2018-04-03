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
use yii\data\ActiveDataProvider;


/**



 * RegisterController implements the CRUD actions for MemberVip model.
 */
class AdminController extends Controller
{
    public function actionIndex()
    {


        return $this->render('index', [
            //'dataProvider' => $dataProvider,
        ]);
        // $dataProvider = new ActiveDataProvider([
        //     'query' => MemberVip::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }



}
