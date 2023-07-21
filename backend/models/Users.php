<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $surname
 * @property string|null $name
 * @property string|null $patronymic
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $login
 * @property string|null $password
 *
 * @property UserInformation[] $userInformations
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic', 'phone_number', 'email','login', 'password'], 'required'],
            [['surname', 'name', 'patronymic', 'login', 'password'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'phone_number' => 'Номер телефона',
            'email' => 'Почта',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
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
