<?php

use yii\db\Migration;

class m161218_135324_table_cliente_and_motor extends Migration
{
    public function up()
    {
      $this->createTable('motor', array(
                  'id' => 'pk',
                  'fk_cliente' => 'integer NOT NULL',
                  'marca' => 'string NOT NULL',
                  'hp' => 'integer NOT NULL',
                  'rpm' => 'integer NOT NULL',
                  'imagen' => 'string',
                  'descripcion' => 'string',
                  'estado' => 'string',
                  'fecha' => 'date'
              ));
      $this->createTable('cliente', array(
                  'id' => 'pk',
                  'nombre' => 'string NOT NULL',
                  'cuit' => 'string',
                  'telefono' => 'string',
                  'email' => 'string',
                  'direccion' => 'string'
              ));

      $this->addForeignKey('FK_cliente', 'motor', 'fk_cliente', 'cliente', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
      $this->dropTable('motor');
      $this->dropTable('cliente');

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
