<?php
/** @noinspection PhpUnused */

/* This class was generated with the next code
 *$dao = new PdoOne('mysql', '127.0.0.1', 'root', 'abc.123', 'sakila');
 * $dao->open();
 * echo $dao->generateCodeClass('actor');  // the class octor must exists
 */

use eftec\PdoOne;
use eftec\_BasePdoOneRepo;

/**
 * Generated by PdoOne Version 1.33
 * @copyright (c) Jorge Castro C. MIT License  https://github.com/EFTEC/PdoOne
 * Class ActorRepo
 */
class ActorRepo extends _BasePdoOneRepo
{
    const TABLE = 'actor';
    const PK = 'actor_id';
    const ME=__CLASS__;

    public static function getDef() {
        return [
            'actor_id' => 'smallint unsigned not null auto_increment',
            'first_name' => 'varchar(45) not null default \'ABC\'',
            'last_name' => 'varchar(45) not null',
            'last_update' => 'timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ];
    }
    public static function getDefKey() {
        return [
            'actor_id' => 'PRIMARY KEY',
            'last_name' => 'KEY'
        ];
    }
    public static function getDefFK() {
        return [

        ];
    }
    public static function factoryCol($prefix=null) {
        $keys=array_keys(static::factoryNull());
        // tabla1.a1 as tabla1_a1,tabla2_a2
        return $prefix ? implode(',', $keys) : $prefix . '.' . implode(',' . $prefix . '.', $keys);
    }
    public static function factory() {
        $recursive=static::getRecursive();
        return [
            'actor_id'=>0,
            'first_name'=>'',
            'last_name'=>'',
            'last_update'=>in_array('last_update',$recursive) ? ActorRepo::factory() : null
        ];
    }
    public static function factoryNull() {
        return [
            'actor_id'=>null,
            'first_name'=>null,
            'last_name'=>null,
            'last_update'=>null
        ];
    }

}