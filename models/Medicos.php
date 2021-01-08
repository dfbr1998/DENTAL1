<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datos_medicos".
 *
 * @property int $id_medico
 * @property string $nom_ape_medico
 * @property string $telefono_medico
 * @property string $universidad_medico
 * @property int $iddato_especialidad
 * @property float $sueldo_base
 *
 * @property DatoEspecialidad $iddatoEspecialidad
 * @property Procedimientos[] $procedimientos
 */
class Medicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_medicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom_ape_medico', 'telefono_medico', 'universidad_medico', 'iddato_especialidad', 'sueldo_base'], 'required'],
            [['iddato_especialidad'], 'integer'],
            [['sueldo_base'], 'number','min'=>0],
            [['nom_ape_medico', 'telefono_medico', 'universidad_medico'], 'string', 'max' => 45],
            [['iddato_especialidad'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidad::className(), 'targetAttribute' => ['iddato_especialidad' => 'iddato_especialidad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_medico' => 'Id Medico',
            'nom_ape_medico' => 'Nombre y Apellido Medico',
            'telefono_medico' => 'Telefono Medico',
            'universidad_medico' => 'Universidad Medico',
            'iddato_especialidad' => 'Id Especialidad',
            'sueldo_base' => 'Sueldo Base',
        ];
    }

    /**
     * Gets query for [[IddatoEspecialidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddatoEspecialidad()
    {
        return $this->hasOne(DatoEspecialidad::className(), ['iddato_especialidad' => 'iddato_especialidad']);
    }

    /**
     * Gets query for [[Procedimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcedimientos()
    {
        return $this->hasMany(Procedimientos::className(), ['id_medico' => 'id_medico']);
    }
}
