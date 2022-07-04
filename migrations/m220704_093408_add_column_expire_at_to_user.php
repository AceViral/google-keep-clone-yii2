<?php

use yii\db\Migration;

/**
 * Class m220704_093408_add_column_expire_at_to_user
 */
class m220704_093408_add_column_expire_at_to_user extends Migration
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
        echo "m220704_093408_add_column_expire_at_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $ret=$this->db->createCommand("SELECT * FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name='user' AND column_name='expire_at'")->queryOne();
        if (empty($ret)) {
            $this->addColumn('user', 'expire_at', $this->integer(11)->defaultValue(NULL));
        }
    }

    public function down()
    {
        $this->dropColumn('user', 'expire_at');
        return true;
    }
}
