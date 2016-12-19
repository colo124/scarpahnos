<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "motor".
 *
 * @property integer $id
 * @property integer $fk_cliente
 * @property string $marca
 * @property integer $hp
 * @property integer $rpm
 * @property string $imagen
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha
 *
 * @property Cliente $fkCliente
 */
class Motor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_cliente', 'marca', 'hp', 'rpm'], 'required'],
            [['fk_cliente', 'rpm'], 'integer'],
            [['fecha'], 'safe'],
            [['marca', 'imagen', 'hp', 'descripcion', 'estado'], 'string', 'max' => 255],
            [['fk_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['fk_cliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_cliente' => 'Cliente',
            'marca' => 'Marca',
            'hp' => 'Hp',
            'rpm' => 'Rpm',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'fk_cliente']);
    }
}
