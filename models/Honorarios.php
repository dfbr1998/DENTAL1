<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "honorarios".
 *
 * @property int $id_honorarios
 * @property int $id_procedimientos
 * @property float $porcentaje_hon
 * @property float $total_honor_medico
 * @property string $fecha_procedimiento
 *
 * @property Procedimientos $procedimientos
 */
class Honorarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'honorarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_procedimientos', 'porcentaje_hon', 'total_honor_medico', 'fecha_procedimiento'], 'required'],
            [['id_procedimientos'], 'integer'],
            [['porcentaje_hon', 'total_honor_medico'], 'number'],
            [['fecha_procedimiento'], 'safe'],
            [['id_procedimientos'], 'exist', 'skipOnError' => true, 'targetClass' => Procedimientos::className(), 'targetAttribute' => ['id_procedimientos' => 'id_procedimientos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_honorarios' => 'Fecha Inicio',
            'id_procedimientos' => 'Medico',
            'porcentaje_hon' => 'Porcentaje Hon',
            'total_honor_medico' => 'Total Honor Medico',
            'fecha_procedimiento' => 'Fecha Fin',
        ];
    }

    /**
     * Gets query for [[Procedimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcedimientos()
    {
        return $this->hasOne(Procedimientos::className(), ['id_procedimientos' => 'id_procedimientos']);
    }
}
