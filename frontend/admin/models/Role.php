<?php

namespace app\admin\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $roleid
 * @property string $rolename
 * @property string $rolestatus
 * @property integer $createdby
 * @property string $createdon
 * @property integer $updatedby
 * @property string $updatedon
 *
 * @property User $createdby0
 * @property User $updatedby0
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename', 'rolestatus', 'createdby', 'createdon', 'updatedby', 'updatedon'], 'required'],
            [['rolestatus'], 'string'],
            [['createdby', 'updatedby'], 'integer'],
            [['createdon', 'updatedon'], 'safe'],
            [['rolename'], 'string', 'max' => 50],
            [['createdby'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdby' => 'id']],
            [['updatedby'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedby' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleid' => 'Roleid',
            'rolename' => 'Rolename',
            'rolestatus' => 'Rolestatus',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'updatedby' => 'Updatedby',
            'updatedon' => 'Updatedon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedbyUser()
    {
        return $this->hasOne(User::className(), ['id' => 'createdby']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedbyUser()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedby']);
    }
}
