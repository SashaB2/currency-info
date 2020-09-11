<?php

use yii\db\Migration;

/**
 * Class m200727_183228_fillibanks
 */
class m200727_183228_fillibanks extends Migration
{
    private $banks = '{{%banks}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->banks,[
            'bank_name_ua' => 'Приват Банк',
            'bank_name_ru' => 'Приват Банк',
            'bank_name_uk' => 'Private Bank',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->banks);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200727_183228_fillibanks cannot be reverted.\n";

        return false;
    }
    */
}
