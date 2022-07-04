<?php

use yii\db\Migration;

/**
 * Class m220704_093356_add_column_access_token_to_user
 */
class m220704_093356_add_column_access_token_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220704_093356_add_column_access_token_to_user cannot be reverted.\n";

        return false;
    }

   public function up()
    {

        $ret=$this->db->createCommand("SELECT * FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'user' AND column_name = 'access_token'")->queryOne(); // Оценка таблицы пользователя Есть ли поле 'access_token'
        if (empty($ret)) {
            $this->addColumn('user', 'access_token', $this->string(255)->defaultValue(NULL));
        }
    }

    public function down()
    {
        $this->dropColumn('user', 'access_token');
        return true;
    }
}
