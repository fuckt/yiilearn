<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "coursetype".
 *
 * @property integer $idcoursetype
 * @property string $label
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $sort_order
 */
class Coursetype extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = -1;
    private $_statusLabel;
    private $_createUserName;
    private $_updateUserName;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coursetype';
    }

    /**
     * create_time, update_time to now()
     * crate_user_id, update_user_id to current login user id
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status', 'sort_order'], 'integer'],
            [['label'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcoursetype' => '编号',
            'label' => '名称',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'status' => '状态',
            'sort_order' => '排序',
        ];
    }

    /**
     * Before save.
     * create_time update_time
     */
    /*public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            // add your code here
            return true;
        }
        else
            return false;
    }*/

    /**
     * After save.
     *
     */
    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        // add your code here
    }*/

    /**
     * @inheritdoc
     */
    public static function getArrayStatus()
    {
        return [
            self::STATUS_INACTIVE => Yii::t('app', 'STATUS_INACTIVE'),
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getStatusLabel()
    {
        if ($this->_statusLabel === null) 
        {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }

    /**
     * @return string
     */
    public function getCreateUserName()
    {
        if($this->_createUserName === null)
        {
            if($this->create_user_id > 0)
                return User::findOne($this->create_user_id)->username;
            else
                return '-';
        }
        return $this->_createUserName;
    }

    /**
     * @return string
     */
    public function getUpdateUserName()
    {
        if($this->_updateUserName === null)
        {
            if($this->update_user_id > 0)
                return User::findOne($this->update_user_id)->username;
            else
                return '-';
        }
        return $this->_updateUserName;
    }


}
