<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /*'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            */
        ];
    }


    private function getCity() {
       return 'Dnepr'; 
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        // https://www.yiiframework.com/doc/guide/2.0/en/input-forms
        
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('registerFormSubmitted');

            return $this->refresh();
        }

        // достаем данные из куков пользователя
        $cookiesData = Yii::$app->request->cookies;

        // получение логина из куков
        $login = $cookiesData->has('login') ? $cookiesData->get('login') : "";
        $city = $cookiesData->has('login') ? $cookiesData->get('login') : $this->getCity();
        
        return $this->render('index', [
            'model' => $model,
            'udata' => [
                'login' => $login,
                'city' => $city,
            ],
        ]);


        //return $this->render('index');
    }

    /**
     * Displays Register.
     *
     * @return string
     */
    public function actionRegister()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->register(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('registerFormSubmitted');

            return $this->refresh();
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
