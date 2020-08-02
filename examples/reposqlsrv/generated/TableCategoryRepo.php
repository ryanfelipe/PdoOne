<?php
/** @noinspection PhpUnused
 * @noinspection ReturnTypeCanBeDeclaredInspection
 */
namespace reposqlsrv;
use sqlsrv\repomodel\TableCategoryModel;
use Exception;

/**
 * Generated by PdoOne Version 1.53 Date generated Sun, 02 Aug 2020 19:12:31 -0400. 
 * EDIT THIS CODE.
 * @copyright (c) Jorge Castro C. MIT License  https://github.com/EFTEC/PdoOne
 * Class TableCategoryRepo
 * <pre>
 * $code=$pdoOne->generateCodeClassRepo(''TableCategory'',''reposqlsrv'','array('TableParent'=>'TableParentRepo','TableChild'=>'TableChildRepo','TableGrandChild'=>'TableGrandChildRepo','TableGrandChildTag'=>'TableGrandChildTagRepo','TableParentxCategory'=>'TableParentxCategoryRepo','TableCategory'=>'TableCategoryRepo','TableParentExt'=>'TableParentExtRepo',)',''sqlsrv\repomodel\TableCategoryModel'');
 * </pre>
 */
class TableCategoryRepo extends AbstractTableCategoryRepo
{
    const ME=__CLASS__; 
    const MODEL= TableCategoryModel::class;
  
    
}