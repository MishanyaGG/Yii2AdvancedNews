<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230721_145245_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(50),
            'name' => $this->string(50),
            'patronymic' => $this->string(50),
            'phone_number' => $this->string(40),
            'email' => $this->string(200),
            'login' => $this->string(50),
            'password' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
