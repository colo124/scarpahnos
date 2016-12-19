<?php

use yii\db\Migration;

class m161219_002930_alter_table_motorrr_hp extends Migration
{
    public function up()
    {
    $this->execute('ALTER TABLE motor ALTER COLUMN hp TYPE varchar(30);');


    }

    public function down()
    {
        echo "m161219_002930_alter_table_motorr_hp cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
