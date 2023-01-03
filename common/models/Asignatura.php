<?php

namespace common\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "asignatura".
 *
 * @property int $id
 * @property string $nombre
 * @property string $clave
 * @property string $creditos
 * @property string $competencia_disciplinar
 * @property int $asesor_interno_id
 * @property int $horas_dedicadas
 * @property string $periodo_desarrollo
 * @property string $periodo_acreditacion
 * @property int $ingenieria_id
 * @property int $semestre_id
 *
 * @property AsesorInterno $asesorInterno
 * @property Ingenieria $ingenieria
 * @property Semestre $semestre
 */
class Asignatura extends \yii\db\ActiveRecord
{
    public $mes_inicio, $anio_inicio, $mes_final, $anio_final;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'clave', 'creditos', 'competencia_disciplinar', 'asesor_interno_id', 'periodo_desarrollo', 'periodo_acreditacion', 'ingenieria_id', 'semestre_id', 'mes_inicio','anio_inicio','mes_final','anio_final'], 'required'],
            [['competencia_disciplinar'], 'string'],
            [['asesor_interno_id', 'horas_dedicadas', 'ingenieria_id', 'semestre_id'], 'integer'],
            [['nombre', 'clave', 'creditos', 'periodo_desarrollo', 'periodo_acreditacion'], 'string', 'max' => 45],
            [['ingenieria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingenieria::class, 'targetAttribute' => ['ingenieria_id' => 'id']],
            [['asesor_interno_id'], 'exist', 'skipOnError' => true, 'targetClass' => AsesorInterno::class, 'targetAttribute' => ['asesor_interno_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'creditos' => 'Creditos',
            'competencia_disciplinar' => 'Competencia Disciplinar',
            'asesor_interno_id' => 'Docente ',
            'horas_dedicadas' => 'Horas Dedicadas',
            'periodo_desarrollo' => 'Periodo Desarrollo',
            'periodo_acreditacion' => 'Periodo Acreditacion',
            'ingenieria_id' => 'Ingenieria',
            'semestre_id' => 'Semestre',
            'mes_inicio' => 'Mes',
            'anio_inicio' => 'Año',
            'mes_final' => 'Mes',
            'anio_final' => 'Año',
        ];
    }

    /**
     * Gets query for [[AsesorInterno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsesorInterno()
    {
        return $this->hasOne(AsesorInterno::class, ['id' => 'asesor_interno_id']);
    }

    /**
     * Gets query for [[Ingenieria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngenieria()
    {
        return $this->hasOne(Ingenieria::class, ['id' => 'ingenieria_id']);
    }

    public function getSemestre()
    {
        return $this->hasOne(Semestre::class, ['id' => 'semestre_id']);
    }

    public function getAsesorInternoNombre() 
    { 
        return $this->asesorInterno->nombre; 
    }

    public function getAsesorInternoList()
    {
        $asesorInterno = AsesorInterno::find()->all();

        $asesorInternoList = ArrayHelper::map($asesorInterno, 'id', 'nombre');

        return $asesorInternoList;
    }

    public static function getAsesores($ingenieria_id) {
        $data=\common\models\AsesorInterno::find()
        ->where(['ingenieria_id'=>$ingenieria_id])
        ->select(['id','nombre AS name'])->asArray()->all();

        return $data;
    }

    public function getSemestresList()
    {
        $semestres = Semestre::find()->all();

        $semestresList = ArrayHelper::map($semestres, 'id', 'nombre');

        return $semestresList;
    }

    public function getSemestreNombre() 
    { 
        return $this->semestre->nombre; 
    }
}
