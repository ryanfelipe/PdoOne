<?php
/** @noinspection PhpUnused */
namespace repo;
use eftec\PdoOne;
use eftec\_BasePdoOneRepo;

/**
 * Generated by PdoOne Version 1.39
 * @copyright (c) Jorge Castro C. MIT License  https://github.com/EFTEC/PdoOne 
 * Class TablaparentxcategoryRepo
 */
class TablaparentxcategoryRepo extends _BasePdoOneRepo
{
    const TABLE = 'tablaparentxcategory';
    const PK = [
	    'idtablaparentPKFK',
	    'idcategoryPKFK'
	];
    const ME=__CLASS__;   
    
    public static function getDef($onlyKeys=false) {
        $r= [
		    'idtablaparentPKFK' => 'int NOT NULL',
		    'idcategoryPKFK' => 'int NOT NULL'
		];
        return ($onlyKeys)? array_keys($r): $r;
    }
    
    /**
     * It returns an associative array (colname=>key type) with all the keys/indexes (if any)
     * 
     * @return string[]
     */    
    public static function getDefKey() {
        return [
		    'idtablaparentPKFK' => 'PRIMARY KEY',
		    'idcategoryPKFK' => 'KEY'
		];
    }
    public static function getDefIdentity() {
        return [

		];
    }
    public static function getDefFK($structure=false) {
        if ($structure) {
            return [
			    'idcategoryPKFK' => 'FOREIGN KEY REFERENCES [tablacategory]([IdTablaCategoryPK])',
			    'idtablaparentPKFK' => 'FOREIGN KEY REFERENCES [tablaparent]([idtablaparentPK])'
			];
        }
        /* key,refcol,reftable,extra */
        return [
		    'idcategoryPKFK' => [
		        'key' => 'FOREIGN KEY',
		        'refcol' => 'IdTablaCategoryPK',
		        'reftable' => 'tablacategory',
		        'extra' => '',
		        'name' => 'tablaparentxcategory_fk2'
		    ],
		    '/idcategoryPKFK' => [
		        'key' => 'ONETOONE',
		        'refcol' => 'IdTablaCategoryPK',
		        'reftable' => 'tablacategory',
		        'extra' => '',
		        'name' => 'tablaparentxcategory_fk2'
		    ],
		    'idtablaparentPKFK' => [
		        'key' => 'FOREIGN KEY',
		        'refcol' => 'idtablaparentPK',
		        'reftable' => 'tablaparent',
		        'extra' => '',
		        'name' => 'FK_tablaparentxcategory_tablaparent'
		    ],
		    '/idtablaparentPKFK' => [
		        'key' => 'ONETOONE',
		        'refcol' => 'idtablaparentPK',
		        'reftable' => 'tablaparent',
		        'extra' => '',
		        'name' => 'FK_tablaparentxcategory_tablaparent'
		    ]
		];
    }
    public static function toList($filter=null,$filterValue=null) {
        return self::_toList($filter,$filterValue);
    }
    public static function first($pk = null) {
        return self::_first($pk);
    }
    
    /**
     * @param array $entity=self::factory()
     * @return bool true if the pks exists
     */
    public static function exist($entity) {
        return self::_exist($entity);
    }
    /**
     * @param array $entity=self::factory()
     * @param bool $transactional If true (default) then the operation is transaction
     * @return array|false=self::factory()
     */
    public static function insert(&$entity,$transactional=true) {
        return self::_insert($entity,$transactional);
    }
    
    /**
     * @param array $entity=self::factory()
     * @param bool $transactional If true (default) then the operation is transaction
     * @return array|false=self::factory()
     */
    public static function update($entity,$transactional=true) {
        return self::_update($entity,$transactional);
    }
    public static function delete($entity,$transactional=true) {
        return self::_delete($entity,$transactional);
    }
    public static function deleteById($pk,$transactional=true) {
        return self::_deleteById($pk,$transactional);
    }  
    

    public static function factory() {
        $recursive=static::getRecursive();
        return [
		'idtablaparentPKFK'=>0,
		'/idtablaparentPKFK'=>(in_array('/idtablaparentPKFK',$recursive)) 
		                            ? tablaparentRepo::factory() 
		                            : null, /* manytoone */
		'idcategoryPKFK'=>0,
		'/idcategoryPKFK'=>(in_array('/idcategoryPKFK',$recursive)) 
		                            ? tablacategoryRepo::factory() 
		                            : null, /* manytoone */
		];
    }
    public static function factoryNull() {
        return [
		'idtablaparentPKFK'=>null,
		'/idtablaparentPKFK'=>null, /* manytoone */
		'idcategoryPKFK'=>null,
		'/idcategoryPKFK'=>null, /* manytoone */
		];
    }     
     
}