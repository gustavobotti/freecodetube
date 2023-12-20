<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'acess' => [
                'class' => AccessControl::class,
                'only' => ['like', 'dislike'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post']
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->published()->latest()
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $this->layout = 'auth';
        $video = $this->findVideo($id);

        $videoView = new VideoView();
        $videoView->video_id = $id;
        $videoView->user_id = \Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $video
        ]);
    }

    public function actionLike($id)
    {
        $video = $this->findVideo($id);
        $userId = \Yii::$app->user->id;

        $videoLike = VideoLike::find()->userIdVideoId($userId, $id)
        ->one();

        if(!$videoLike){
            $this->saveLike($id, $userId, VideoLike::TYPE_LIKE);
        } else if ($videoLike->type == VideoLike::TYPE_LIKE){
            $videoLike->delete();
        } else {
            $videoLike->delete();
            $this->saveLike($id, $userId, VideoLike::TYPE_LIKE);
        }

        return $this->renderAjax('_like_buttons', [
            'model' => $video
        ]);
    }

    public function actionDislike($id)
    {
        $video = $this->findVideo($id);
        $userId = \Yii::$app->user->id;

        $videoLike = VideoLike::find()->userIdVideoId($userId, $id)
            ->one();

        if(!$videoLike){
            $this->saveLike($id, $userId, VideoLike::TYPE_DISLIKE);
        } else if ($videoLike->type == VideoLike::TYPE_DISLIKE){
            $videoLike->delete();
        } else {
            $videoLike->delete();
            $this->saveLike($id, $userId, VideoLike::TYPE_DISLIKE);
        }

        return $this->renderAjax('_like_buttons', [
            'model' => $video
        ]);
    }

    protected function findVideo($id)
    {
        $video = Video::findOne($id);
        if(!$video){
            throw new NotFoundHttpException("Video not found");
        }
        return $video;
    }

    protected  function saveLike($videoId, $userId, $type)
    {
        $videoLike = new VideoLike();
        $videoLike->video_id = $videoId;
        $videoLike->user_id = $userId;
        $videoLike->type = $type;
        $videoLike->created_at = time();
        $videoLike->save();
    }
}