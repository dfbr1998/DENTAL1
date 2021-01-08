<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedimientos".
 *
 * @property int $id_procedimientos
 * @property int $id_paciente
 * @property string $detalle_procedim
 * @property int $id_medico
 * @property float $costo_procedim
 * @property float $porcentaje_comi
 * @property string $fecha_procedim
 *
 * @property DatosMedicos $medico
 * @property DatosPacientes $paciente
 */
class Procedimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'detalle_procedim', 'id_medico', 'costo_procedim', 'porcentaje_comi', 'fecha_procedim'], 'required'],
            [['id_paciente', 'id_medico'], 'integer'],
            [['costo_procedim'], 'number', 'min'=>0],
            [['porcentaje_comi'], 'number', 'min'=>0, 'max'=>1],
            [['fecha_procedim'], 'safe'],
            [['detalle_procedim'], 'string', 'max' => 100],
            [['id_medico'], 'exist', 'skipOnError' => true, 'targetClass' => Medicos::className(), 'targetAttribute' => ['id_medico' => 'id_medico']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Pacientes::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_procedimientos' => 'Id Procedimientos',
            'id_paciente' => 'Id Paciente',
            'detalle_procedim' => 'Detalle Procedimiento',
            'id_medico' => 'Id Medico',
            'costo_procedim' => 'Costo Procedimiento',
            'porcentaje_comi' => 'Porcentaje Comision',
            'fecha_procedim' => 'Fecha Procedimiento',
        ];
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(DatosMedicos::className(), ['id_medico' => 'id_medico']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(DatosPacientes::className(), ['id_paciente' => 'id_paciente']);
    }
}
