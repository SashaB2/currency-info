<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;

/**
 * Class m200616_183229_banks
 */
class m200616_183229_banks extends Migration
{
    private $banks = '{{%banks}}';
    private $currency_info = '{{%currency_info}}';
    private $currency_codes = '{{%currency_codes}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->banks,
            [
                'id' => $this->primaryKey()->unique(),
                'bank_name_ua' => $this->string(255)->notNull(),
                'bank_name_ru' => $this->string(255)->notNull(),
                'bank_name_uk' => $this->string(255)->notNull(),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );

        $this->createTable($this->currency_info,
            [
                'id' => $this->primaryKey()->unique()->notNull(),
                'bank_id' => $this->integer()->comment('Bank ID'),
                'ccy' => $this->string(3)->notNull(),
                'base_ccy' => $this->string(3)->notNull(),
                'buy' => $this->float()->notNull(),
                'sale' => $this->float()->notNull(),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );

        $this->createTable($this->currency_codes,
            [
                'id' => $this->primaryKey()->unique()->notNull(),
                'symbol' => $this->string()->unique(),
                'ccy' => $this->string(3)->unique()->notNull(),
                'num' => $this->integer(3)->unique()->notNull(),
                'name_ua' => $this->string(255)->unique()->notNull(),
                'name_ru' => $this->string(255)->unique()->notNull(),
                'name_uk' => $this->string(255)->unique()->notNull(),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->banks);
        $this->dropTable($this->currency_info);
        $this->dropTable($this->currency_codes);

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_183229_banks cannot be reverted.\n";

        return false;
    }
    */
}
