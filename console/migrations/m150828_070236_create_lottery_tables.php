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
  用户编号 INT NOT NULL,
  开奖编号 INT NOT NULL,
  投注编号 INT NOT NULL,
  投注时间 VARCHAR(16),
  投注倍数 TINYINT DEFAULT 1 NOT NULL,
  投注总额 DECIMAL(10,0) NOT NULL,
  投注份额 DECIMAL(10,0) NOT NULL,
  中奖总额 DECIMAL(10,0) DEFAULT 0 NOT NULL,
  中奖份额 DECIMAL(10,0) DEFAULT 0 NOT NULL,
  投注方式 CHAR(5),
  投注方式编号 INT,
  投注状态 CHAR(3),
  是否兑奖 TINYINT,
  是否中奖 TINYINT
);
     */

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lottery_buy}}', [
            'id' =>$this->primaryKey(),
            '用户编号' =>$this->integer()->notNull(),
            '追号期值' =>$this->string(),
        ],$tableOptions);

        $this->createTable('{{%lottery_chase}}', [
            'id' =>$this->primaryKey(),
            '追号方式' =>$this->string(5)->notNull(),
            '追号期值' =>$this->string(),
        ],$tableOptions);

        $this->createTable('{{%lottery_donation}}', [
            'id' =>$this->primaryKey(),
            '捐赠类型' =>$this->string(5)->notNull(),
            '捐赠数量' =>$this->decimal(10,0),
            '起捐金额' =>$this->decimal(10,0),
        ],$tableOptions);

        $this->createTable('{{%lottery_draw}}', [
            'id' =>$this->primaryKey(),
            '投注类型' =>$this->string(5)->notNull(),
            '投注格式' =>$this->string(),
            '投注号码' =>$this->text(),
            '存储形式' =>$this->string(6),
            '兑奖编号' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_issue}}', [
            'id' =>$this->primaryKey(),
            '彩票编号' =>$this->integer()->notNull(),
            '开奖期号' =>$this->integer(),
            '开奖时间' =>$this->dateTime(),
            '开奖号码' =>$this->string(),
            '累积奖金' =>$this->decimal(10,0),
            '中奖金额' =>$this->decimal(10,0),
            '中奖总数' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_rule}}', [
            'id' =>$this->primaryKey(),
            '彩票编号' =>$this->integer()->notNull(),
            '组号格式' =>$this->text(),
            '组号描述' =>$this->text(),
        ],$tableOptions);

        $this->createTable('{{%lottery_score}}', [
            'id' =>$this->primaryKey(),
            '积分名称' =>$this->string(20)->notNull(),
            '每元积分' =>$this->integer(),
            '生效日期' =>$this->dateTime(),
            '失效日期' =>$this->dateTime(),
        ],$tableOptions);

        $this->createTable('{{%lottery_summary}}', [
            'id' =>$this->primaryKey(),
            '用户编号' =>$this->integer()->notNull(),
            '购买总额' =>$this->decimal(10,0)->defaultValue(0),
            '中奖金额' =>$this->decimal(10,0)->defaultValue(0),
            '积分编号' =>$this->integer(),
            '当前积分' =>$this->integer(),
            '已领积分' =>$this->integer(),
            '捐赠编号' =>$this->integer(),
            '当前捐赠' =>$this->integer(),
            '完成捐赠' =>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%lottery_type}}', [
            'id' =>$this->primaryKey(),
            '名称' =>$this->string(20)->notNull(),
            '类别' =>$this->string(20)->notNull(),
            '描述' =>$this->text(),
            '开奖时间' =>$this->dateTime(),
            '开奖间隔' =>$this->smallInteger(),
            '发行机构' =>$this->string(),
            '购买网站' =>$this->string(),
            '单注价格' =>$this->smallInteger(2),
        ],$tableOptions);

        $this->createTable('{{%lottery_union}}', [
            'id' =>$this->primaryKey(),
            '用户名称' =>$this->string(20)->notNull(),
            '用户密码' =>$this->string(20)->notNull()
        ],$tableOptions);

        $this->createTable('{{%lottery_user}}', [
            'id' =>$this->primaryKey(),
            '用户名称' =>$this->string(20)->notNull(),
            '用户密码' =>$this->string(20)->notNull()
        ],$tableOptions);

        $this->createTable('{{%lottery_win}}', [
            'id' =>$this->primaryKey(),
            '彩票编号' =>$this->integer()->notNull()->defaultValue(0),
            '类别' =>$this->string(3)->notNull(),
            '奖级' =>$this->smallInteger()->notNull()->defaultValue(0),
            '奖金' =>$this->decimal(10,2)->notNull()->defaultValue(0.00),
            '条件' =>$this->string()->notNull()->defaultValue(""),
            '描述' =>$this->text()->defaultValue("")
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
