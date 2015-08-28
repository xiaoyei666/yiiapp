<?php

use yii\db\Schema;
use yii\db\Migration;

class m150828_070236_create_lottery_tables extends Migration
{
    public function up()
    {
        /*
         *
CREATE TABLE lottery_buy
(
  id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  �û���� INT NOT NULL,
  ������� INT NOT NULL,
  Ͷע��� INT NOT NULL,
  Ͷעʱ�� VARCHAR(16),
  Ͷע���� TINYINT DEFAULT 1 NOT NULL,
  Ͷע�ܶ� DECIMAL(10,0) NOT NULL,
  Ͷע�ݶ� DECIMAL(10,0) NOT NULL,
  �н��ܶ� DECIMAL(10,0) DEFAULT 0 NOT NULL,
  �н��ݶ� DECIMAL(10,0) DEFAULT 0 NOT NULL,
  Ͷע��ʽ CHAR(5),
  Ͷע��ʽ��� INT,
  Ͷע״̬ CHAR(3),
  �Ƿ�ҽ� TINYINT,
  �Ƿ��н� TINYINT
);
     */

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lottery_buy}}', [
            'id' =>$this->primaryKey(),
            '�û����' =>$this->integer()->notNull(),
            '׷����ֵ' =>$this->string(),
        ],$tableOptions);

        $this->createTable('{{%lottery_chase}}', [
            'id' =>$this->primaryKey(),
            '׷�ŷ�ʽ' =>$this->string(5)->notNull(),
            '׷����ֵ' =>$this->string(),
        ],$tableOptions);

        $this->createTable('{{%lottery_donation}}', [
            'id' =>$this->primaryKey(),
            '��������' =>$this->string(5)->notNull(),
            '��������' =>$this->decimal(10,0),
            '�����' =>$this->decimal(10,0),
        ],$tableOptions);

        $this->createTable('{{%lottery_draw}}', [
            'id' =>$this->primaryKey(),
            'Ͷע����' =>$this->string(5)->notNull(),
            'Ͷע��ʽ' =>$this->string(),
            'Ͷע����' =>$this->text(),
            '�洢��ʽ' =>$this->string(6),
            '�ҽ����' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_issue}}', [
            'id' =>$this->primaryKey(),
            '��Ʊ���' =>$this->integer()->notNull(),
            '�����ں�' =>$this->integer(),
            '����ʱ��' =>$this->dateTime(),
            '��������' =>$this->string(),
            '�ۻ�����' =>$this->decimal(10,0),
            '�н����' =>$this->decimal(10,0),
            '�н�����' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_rule}}', [
            'id' =>$this->primaryKey(),
            '��Ʊ���' =>$this->integer()->notNull(),
            '��Ÿ�ʽ' =>$this->text(),
            '�������' =>$this->text(),
        ],$tableOptions);

        $this->createTable('{{%lottery_score}}', [
            'id' =>$this->primaryKey(),
            '��������' =>$this->string(20)->notNull(),
            'ÿԪ����' =>$this->integer(),
            '��Ч����' =>$this->dateTime(),
            'ʧЧ����' =>$this->dateTime(),
        ],$tableOptions);

        $this->createTable('{{%lottery_summary}}', [
            'id' =>$this->primaryKey(),
            '�û����' =>$this->integer()->notNull(),
            '�����ܶ�' =>$this->decimal(10,0)->defaultValue(0),
            '�н����' =>$this->decimal(10,0)->defaultValue(0),
            '���ֱ��' =>$this->integer(),
            '��ǰ����' =>$this->integer(),
            '�������' =>$this->integer(),
            '�������' =>$this->integer(),
            '��ǰ����' =>$this->integer(),
            '��ɾ���' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_type}}', [
            'id' =>$this->primaryKey(),
            '����' =>$this->string(20)->notNull(),
            '���' =>$this->string(20)->notNull(),
            '����' =>$this->text(),
            '����ʱ��' =>$this->dateTime(),
            '�������' =>$this->smallInteger(),
            '���л���' =>$this->string(),
            '������վ' =>$this->string(),
            '��ע�۸�' =>$this->smallInteger(2),
        ],$tableOptions);

        $this->createTable('{{%lottery_union}}', [
            'id' =>$this->primaryKey(),
            '�û�����' =>$this->string(20)->notNull(),
            '�û�����' =>$this->string(20)->notNull()
        ],$tableOptions);

        $this->createTable('{{%lottery_user}}', [
            'id' =>$this->primaryKey(),
            '�û�����' =>$this->string(20)->notNull(),
            '�û�����' =>$this->string(20)->notNull()
        ],$tableOptions);

        $this->createTable('{{%lottery_win}}', [
            'id' =>$this->primaryKey(),
            '��Ʊ���' =>$this->integer()->notNull()->defaultValue(0),
            '���' =>$this->string(3)->notNull(),
            '����' =>$this->smallInteger()->notNull()->defaultValue(0),
            '����' =>$this->decimal(10,2)->notNull()->defaultValue(0.00),
            '����' =>$this->string()->notNull()->defaultValue(""),
            '����' =>$this->text()->defaultValue("")
        ],$tableOptions);

    }

    public function down()
    {

        $this->dropTable('{{%lottery_buy}}');
        $this->dropTable('{{%lottery_chase}}');
        $this->dropTable('{{%lottery_donation}}');
        $this->dropTable('{{%lottery_draw}}');
        $this->dropTable('{{%lottery_issue}}');
        $this->dropTable('{{%lottery_rule}}');
        $this->dropTable('{{%lottery_score}}');
        $this->dropTable('{{%lottery_summary}}');
        $this->dropTable('{{%lottery_type}}');
        $this->dropTable('{{%lottery_union}}');
        $this->dropTable('{{%lottery_user}}');
        $this->dropTable('{{%lottery_win}}');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
