<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dato_especialidad".
 *
 * @property int $iddato_especialidad
 * @property string $nombre_especialidad
 * @property string $descripcion_especialidad
 * @property string $nivel_dificultad_especialidad
 * @property string $anios_min_experiencia
 *
 * @property DatosMedicos[] $datosMedicos
 */
class Especialidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dato_especialidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_especialidad', 'descripcion_especialidad', 'nivel_dificultad_especialidad', 'anios_min_experiencia'], 'required'],
            [['nombre_especialidad', 'descripcion_especialidad', 'nivel_dificultad_especialidad', 'anios_min_experiencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddato_especialidad' => 'Id Especialidad',
            'nombre_especialidad' => 'Nombre Especialidad',
            'descripcion_especialidad' => 'Descripcion Especialidad',
            'nivel_dificultad_especialidad' => 'Nivel Dificultad Especialidad',
            'anios_min_experiencia' => 'Tiempo de Experiencia',
        ];
    }

    /**
     * Gets query for [[DatosMedicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosMedicos()
    {
        return $this->hasMany(DatosMedicos::className(), ['iddato_especialidad' => 'iddato_especialidad']);
    }
}
