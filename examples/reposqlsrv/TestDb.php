<?php
/** @noinspection PhpIncompatibleReturnTypeInspection
 * @noinspection ReturnTypeCanBeDeclaredInspection
 * @noinspection DuplicatedCode
 * @noinspection PhpUnused
 * @noinspection PhpUndefinedMethodInspection
 * @noinspection PhpUnusedLocalVariableInspection
 * @noinspection PhpUnusedAliasInspection
 * @noinspection NullPointerExceptionInspection
 * @noinspection SenselessProxyMethodInspection
 * @noinspection PhpParameterByRefIsNotUsedAsReferenceInspection
 */
namespace repo;
use eftec\PdoOne;
use eftec\_BasePdoOneRepo;
use Exception;

/**
 * Generated by PdoOne Version {version}. 
 * @copyright (c) Jorge Castro C. MIT License  https://github.com/EFTEC/PdoOne
 * Class TestDb
 */
class TestDb extends _BasePdoOneRepo
{
    const type = 'sqlsrv';
    const NS = 'repo\\';
    
    /** @var string[] it is used to set the relations betweeen table (key) and class (value) */
    const RELATIONS = [
	    'tablaparent' => 'TablaParentRepo',
	    'tablaparent_ext' => 'TablaParentExtRepo',
	    'tablachild' => 'TablachildRepo',
	    'tablaparentxcategory' => 'TablaparentxcategoryRepo',
	    'tablacategory' => 'TablacategoryRepo',
	    'tablagrandchildcat' => 'TablagrandchildcatRepo',
	    'tablagrandchild' => 'TablagrandchildRepo'
	];
    /**
     * With the name of the table, we get the class
     * @param string $tableName
     *
     * @return string[]
     */
    protected function tabletoClass($tableName) {        
        return static::RELATIONS[$tableName];           
    }    
}