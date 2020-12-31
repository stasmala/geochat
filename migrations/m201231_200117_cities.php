<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m201231_200117_cities
 */
class m201231_200117_cities extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('cities', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            // 'content' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('cities');
        return false;
    }
}
