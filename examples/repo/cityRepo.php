
<?php
/** @noinspection PhpUnused */

use eftec\PdoOne;
use eftec\_BasePdoOneRepo;

/**
 * Generated by PdoOne Version 1.33
 * @copyright (c) Jorge Castro C. MIT License  https://github.com/EFTEC/PdoOne
 * Class CityRepo
 */
class CityRepo extends _BasePdoOneRepo
{
    const TABLE = 'city';
    const PK = 'city_id';
    const ME=__CLASS__;

    public static function getDef() {
        return [
            'city_id' => 'smallint unsigned not null auto_increment',
            'city' => 'varchar(50) not null',
            'country_id' => 'smallint unsigned not null',
            'last_update' => 'timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ];
    }
    public static function getDefKey() {
        return [
            'city_id' => 'PRIMARY KEY',
            'country_id' => 'KEY'
        ];
    }
    public static function getDefFK($structure=false) {
        if ($structure) {
            return [
                'country_id' => 'FOREIGN KEY REFERENCES`country`(`country_id`) ON UPDATE CASCADE'
            ];
        }
        /* key,refcol,reftable,extra */
        return [
            'country_id' => [
                'key' => 'FOREIGN KEY',
                'refcol' => 'country_id',
                'reftable' => 'country',
                'extra' => 'FOREIGN KEY REFERENCES`country`(`country_id`) ON UPDATE CASCADE'
            ]
        ];
    }
    public static function factory() {
        $recursive=static::getRecursive();
        return [
            'city_id'=>0,
            'city_id.address'=>(in_array('city_id.address',$recursive))
                ? []
                : null, /* onetomany */
            'city'=>'',
            'country_id'=>0,
            'country_id.country'=>(in_array('country_id',$recursive))
                ? countryRepo::factory()
                : null, /* manytoone */
            'last_update'=>''
        ];
    }
    public static function factoryNull() {
        return [
            'city_id'=>null,
            'city'=>null,
            'country_id'=>null,
            'last_update'=>null
        ];
    }

}