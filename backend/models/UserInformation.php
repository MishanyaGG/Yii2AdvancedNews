<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "user_information".
 *
 * @property int $id
 * @property int $id_user
 *
 * @property Users $user
 */
class UserInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'information_in_ru' => 'Information In Ru',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
