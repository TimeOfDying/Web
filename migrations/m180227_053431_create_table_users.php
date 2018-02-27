<?php

use yii\db\Migration;

class m180227_053431_create_table_users extends Migration
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
        $sql = 'CREATE TABLE queue.Users (
                  id int(11) NOT NULL AUTO_INCREMENT,
                  username varchar(255) UNIQUE DEFAULT NULL,
                  password varchar(255) NOT NULL,
                  Role_id varchar(255) DEFAULT NULL,
                  First_name varchar(255) DEFAULT NULL,
                  Second_name varchar(255) DEFAULT NULL,
                  Last_name varchar(255) DEFAULT NULL,
                  Status varchar(255) DEFAULT NULL,
                  PRIMARY KEY (id)
                );';
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {

        $sql = 'DROP TABLE IF EXISTS Users;';
        Yii::$app->db->createCommand($sql)->execute();
    }
}
