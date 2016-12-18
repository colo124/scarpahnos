<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $cuit
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 *
 * @property Motor[] $motors
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'cuit', 'telefono', 'email', 'direccion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'cuit' => 'Cuit',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotors()
    {
        return $this->hasMany(Motor::className(), ['fk_cliente' => 'id']);
    }
}
