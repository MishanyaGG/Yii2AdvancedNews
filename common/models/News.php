<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $header
 * @property string|null $information
 * @property string|null $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['information'], 'string'],
//            [['date'], 'safe'],
            [['header'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Header',
            'information' => 'Information',
            'date' => 'Date',
        ];
    }
}
