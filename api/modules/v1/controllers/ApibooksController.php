<?php
namespace app\api\modules\v1\controllers;


use app\models\Authors;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\NotFoundHttpException;
use app\models\Apibooks;



class ApibooksController extends ActiveController
{
    public $modelClass = 'app\models\apibooks';

    public function behaviors() //"поведение"
    {
        return[
            'contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                   // 'application/xml' => \yii\web\Response::FORMAT_XML,
                ],]

        ];
    }

    public function actionList(){ // 4.1
        return Apibooks::find()->all();
    }
    public function actionUpdate($id) //Обновление
    {
        $book = $this->findBook($id);
        if ($book->load(Yii::$app->request->post()) && $book->save()) {
            return [
                'success' => true,
                'message' => "Book was updated!",
            ];
        }
        return [
            'success' => false,
            'message' => $book->errors,
        ];
    }

    public function actionDelete($id) {
        $book = $this->findBook($id);
        if ($book->delete()) {
            return [
                'success' => true,
                'message' => "Book was deleted!",
            ];
        }
        return [
            'success' => false,
            'message' => $book->errors,
        ];
    }

    protected function findBook($id)
    {
        if (($model = Apibooks::find()->where(['id' => $id])->with('authors')->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
