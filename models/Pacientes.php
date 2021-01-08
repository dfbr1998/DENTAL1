<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datos_pacientes".
 *
 * @property int $id_paciente
 * @property string $nom_ape_paciente
 * @property string $direccion_paciente
 * @property int $edad_paciente
 * @property string $telefono_paciente
 * @property string $correo_paciente
 *
 * @property Procedimientos[] $procedimientos
 */
class Pacientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_pacientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom_ape_paciente', 'direccion_paciente', 'edad_paciente', 'telefono_paciente', 'correo_paciente'], 'required'],
            [['edad_paciente'], 'integer', 'min'=> 0],
            [['nom_ape_paciente'], 'string', 'max' => 50],
            [['direccion_paciente', 'telefono_paciente'], 'string', 'max' => 45],
            [['correo_paciente'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'nom_ape_paciente' => 'Nombre y Apellido Paciente',
            'direccion_paciente' => 'Direccion Paciente',
            'edad_paciente' => 'Edad Paciente',
            'telefono_paciente' => 'Telefono Paciente',
            'correo_paciente' => 'Correo Paciente',
        ];
    }

    /**
     * Gets query for [[Procedimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcedimientos()
    {
        return $this->hasMany(Procedimientos::className(), ['id_paciente' => 'id_paciente']);
    }
}
