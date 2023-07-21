<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_information}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m230721_150123_create_user_information_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_information}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'information_in_ru' => $this->text(),
            'information_in_en' => $this->text(),
            'information_in_de' => $this->text(),
            'information_in_sp' => $this->text(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-user_information-id_user}}',
            '{{%user_information}}',
            'id_user'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_information-id_user}}',
            '{{%user_information}}',
            'id_user',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-user_information-id_user}}',
            '{{%user_information}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-user_information-id_user}}',
            '{{%user_information}}'
        );

        $this->dropTable('{{%user_information}}');
    }
}
