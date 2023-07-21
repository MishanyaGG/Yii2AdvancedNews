<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\UserInformation;

/**
 * User model
 *
 * @property int id
 * @property string login
 * @property string password
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function tableName()
    {
        return 'users';
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return;
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return static::findOne(['login'=>$login]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->id;
    }

    /*
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->id;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($login,$password)
    {
        $user = User::find()->where(['login'=>$login,'password'=>$password])->asArray()->all();

        if (count($user) == 0){
            return false;
        } else{
            return true;
        }
    }

    /**
     * Gets query for [[UserInformations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserInformations()
    {
        return $this->hasMany(UserInformation::class, ['id_user' => 'id']);
    }
}
