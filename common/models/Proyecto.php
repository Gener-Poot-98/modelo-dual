<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\Departamento;
use common\models\Ingenieria;
/**
 * This is the model class for table "proyecto".
 *
 * @property int $id
 * @property string $nombre
 * @property int $departamento_id
 * @property int $ingenieria_id
 * @property int $perfil_estudiante_id
 * @property int $empresa_id
 * @property int $asesor_externo_id
 * @property int $estado_proyecto_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AsesorExterno $asesorExterno
 * @property Departamento $departamento
 * @property Empresa $empresa
 * @property EstadoProyecto $estadoProyecto
 * @property Ingenieria $ingenieria
 * @property PerfilEstudiante $perfilEstudiante
 * @property ProyectoDocente[] $proyectoDocentes
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'departamento_id', 'ingenieria_id', 'perfil_estudiante_id', 'empresa_id', 'asesor_externo_id', 'estado_proyecto_id', 'created_at', 'updated_at'], 'required'],
            [['departamento_id', 'ingenieria_id', 'perfil_estudiante_id', 'empresa_id', 'asesor_externo_id', 'estado_proyecto_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre'], 'string', 'max' => 2500],
            [['asesor_externo_id'], 'exist', 'skipOnError' => true, 'targetClass' => AsesorExterno::class, 'targetAttribute' => ['asesor_externo_id' => 'id']],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::class, 'targetAttribute' => ['departamento_id' => 'id']],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['empresa_id' => 'id']],
            [['estado_proyecto_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoProyecto::class, 'targetAttribute' => ['estado_proyecto_id' => 'id']],
            [['ingenieria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingenieria::class, 'targetAttribute' => ['ingenieria_id' => 'id']],
            [['perfil_estudiante_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilEstudiante::class, 'targetAttribute' => ['perfil_estudiante_id' => 'id']],
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
            'departamento_id' => 'Departamento ID',
            'ingenieria_id' => 'Ingenieria ID',
            'perfil_estudiante_id' => 'Perfil Estudiante ID',
            'empresa_id' => 'Empresa ID',
            'asesor_externo_id' => 'Asesor Externo ID',
            'estado_proyecto_id' => 'Estado Proyecto ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AsesorExterno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsesorExterno()
    {
        return $this->hasOne(AsesorExterno::class, ['id' => 'asesor_externo_id']);
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::class, ['id' => 'departamento_id']);
    }

    public function getDepartamentoList()
    {
        $departamento = Departamento::find()->all();

        $departamentoList = ArrayHelper::map($departamento, 'id', 'nombre');

        return $departamentoList;
    }

    public function getDepartamentoNombre() 
    { 
        return $this->departamento->nombre; 
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::class, ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[EstadoProyecto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoProyecto()
    {
        return $this->hasOne(EstadoProyecto::class, ['id' => 'estado_proyecto_id']);
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

    public function getIngenieriasList()
    {
        $ingenierias = Ingenieria::find()->all();

        $ingenieriasList = ArrayHelper::map($ingenierias, 'id', 'nombre');

        return $ingenieriasList;
    }

    public function getIngenieriaNombre() 
    { 
        return $this->ingenieria->nombre; 
    }

    /**
     * Gets query for [[PerfilEstudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilEstudiante()
    {
        return $this->hasOne(PerfilEstudiante::class, ['id' => 'perfil_estudiante_id']);
    }

    /**
     * Gets query for [[ProyectoDocentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoDocentes()
    {
        return $this->hasMany(ProyectoDocente::class, ['proyecto_id' => 'id']);
    }
}
