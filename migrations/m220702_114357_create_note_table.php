<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%note}}`.
 */
class m220702_114357_create_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%note}}', [
            'id' => $this->primaryKey(),
            'title'=> $this->string(),
            'text' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%note}}');
    }
}
