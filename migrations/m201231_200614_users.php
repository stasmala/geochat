<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m201231_200614_users
 */
class m201231_200614_users extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
        return false;
    }
}
