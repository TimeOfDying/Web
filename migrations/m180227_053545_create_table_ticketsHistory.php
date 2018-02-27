<?php

use yii\db\Migration;


class m180227_053545_create_table_ticketsHistory extends Migration
{

    public function safeUp()
    {

    }


    public function safeDown()
    {

        return false;
    }


    public function up()
    {
        $sql = 'CREATE TABLE queue.TicketsHistory (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  `Start_date` datetime DEFAULT NULL,
                  `Ticket_name` varchar(50) DEFAULT NULL,
                  Status varchar(255) DEFAULT NULL,
                  Operator_ID int(11) DEFAULT NULL,
                  PRIMARY KEY (id)
                );';
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {

        $sql = 'DROP TABLE IF EXISTS TicketsHistory;';
        Yii::$app->db->createCommand($sql)->execute();
    }

}
