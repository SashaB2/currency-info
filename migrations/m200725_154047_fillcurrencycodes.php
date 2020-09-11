<?php

use yii\db\Migration;

/**
 * Class m200725_154047_fillcurrencycodes
 */
class m200725_154047_fillcurrencycodes extends Migration
{
    private $currency_codes = '{{%currency_codes}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->currency_codes,[
            'symbol' => '$',
            'ccy' => 'USD',
            'num' => 840,
            'name_ua' => 'Долар США',
            'name_ru' => 'Долар США',
            'name_uk' => 'United States dollar',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        $this->insert($this->currency_codes,[
            'symbol' => '₴',
            'ccy' => 'UAH',
            'num' => 980,
            'name_ua' => 'Українська гривня',
            'name_ru' => 'Украинская гривна',
            'name_uk' => 'Ukrainian hryvnia',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        $this->insert($this->currency_codes,[
            'symbol' => '€',
            'ccy' => 'EUR',
            'num' => 978,
            'name_ua' => 'Євро',
            'name_ru' => 'Евро',
            'name_uk' => 'Euro',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->currency_codes);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200725_154047_fillcurrencycodes cannot be reverted.\n";

        return false;
    }
    */
}
