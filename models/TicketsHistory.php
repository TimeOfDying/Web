<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TicketsHistory".
 *
 * @property int $id
 * @property string $Start_date
 * @property string $Ticket_name
 * @property string $Status
 * @property int $Operator_ID
 */
class TicketsHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TicketsHistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Start_date'], 'safe'],
            [['Operator_ID'], 'integer'],
            [['Ticket_name'], 'string', 'max' => 50],
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
            'Start_date' => 'Start Date',
            'Ticket_name' => 'Ticket Name',
            'Status' => 'Status',
            'Operator_ID' => 'Operator  ID',
        ];
    }
}
