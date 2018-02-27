<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currentTickets".
 *
 * @property int $id
 * @property string $Start date
 * @property string $Ticket name
 * @property string $Status
 * @property int $Operator_ID
 */
class currentTickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currentTickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Start date'], 'safe'],
            [['Operator_ID'], 'integer'],
            [['Ticket name'], 'string', 'max' => 50],
            [['Status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Start date' => 'Start Date',
            'Ticket name' => 'Ticket Name',
            'Status' => 'Status',
            'Operator_ID' => 'Operator  ID',
        ];
    }
}
