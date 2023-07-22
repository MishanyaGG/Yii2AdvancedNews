<?php

namespace backend\controllers;

use app\models\UserInformation;
use app\models\Users;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use common\models\LoginForm;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * AdminController implements the CRUD actions for Users model.
 */
class AdminController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionLogin(){

        // Проверка на гостя
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        // Создаём экземпляр модели
        $model = new LoginForm();

        // Пробуем войти
        if($model->load(Yii::$app->request->post())&& $model->login()){
            return $this->goBack();
        }

        return $this->render('login',[
            'model'=>$model
        ]);
    }

    /**
     * Выход из аккаунта
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        // Выход из аккаунта
        Yii::$app->user->logout();

        // Перенаправление на главную страницу (news/index)
        return $this->goHome();
    }

    /**
     * Displays a single Users model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Users();
        $user_information = new UserInformation();

        if ($this->request->isPost) {
            $post = $this->request->post();

            if(count(User::find()->where('login = "'.$post['Users']['login'].'"')->asArray()->all()) == 1){
                return $this->redirect('error');
            }

            if ($model->load($this->request->post()) && $model->save()) {

                $user_information->id_user = $model->id; $user_information->save();

                return $this->redirect('login');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionError(){
        $model = new Users();
        $user_information = new UserInformation();

        if ($this->request->isPost) {
            $post = $this->request->post();

            if(count(User::find()->where('login = "'.$post['Users']['login'].'"')->asArray()->all()) == 1){

                return $this->redirect('error');
            }

            if ($model->load($this->request->post()) && $model->save()) {

                $user_information->id_user = $model->id; $user_information->save();

                return $this->redirect('login');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('error', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tr = new GoogleTranslate();

        if ($this->request->isPost){
            $listPost = $this->request->post();

            $model->surname = $listPost['surname'];
            $model->name = $listPost['name'];
            $model->patronymic = $listPost['patronimyc'];
            $model->phone_number = $listPost['phone_number'];
            $model->email = $listPost['email'];
            $model->login = $listPost['login'];
            $model->password = $listPost['password'];

            try {
                $user_information = Yii::$app->db->createCommand(
                "update user_information
                        set information_in_ru =  '".$listPost['user_information']."',
                            information_in_de = '".$tr->setSource('ru')->setTarget('de')->translate($listPost['user_information'])."',
                            information_in_en = '".$tr->setSource('ru')->setTarget('en')->translate($listPost['user_information'])."',
                            information_in_sp = '".$tr->setSource('ru')->setTarget('sp')->translate($listPost['user_information'])."'
                        where id_user = ".$id.";")
                ->query();

            } catch (\Exception $exception){
                var_dump($exception); die();
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
