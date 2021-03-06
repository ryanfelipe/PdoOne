<?php

use eftec\_BasePdoOneRepo;
use eftec\PdoOne;
use eftec\tests\CacheServicesmysql;
use PHPUnit\Framework\TestCase;

class PdoOne_mysql_Test extends TestCase
{
    /** @var PdoOne */
    protected $pdoOne;

    public function setUp() {
        $this->pdoOne = new PdoOne("mysql", "127.0.0.1", "travis", "", "travisdb");
        $this->pdoOne->connect();
        $this->pdoOne->logLevel = 3;

    }
    public function test_Time() {
         $this->assertNotEquals(null,$this->pdoOne->dateNow());
    }
    public function test_missingerr() {

        try {
            $this->pdoOne->select('*')->from('missintable')->toList();
        } catch (Exception $e) {
            $this->assertContains('Failed to run query',$this->pdoOne->errorText);
            $this->assertEquals('select * from missintable',$this->pdoOne->lastQuery);
            try {
                $this->pdoOne->toList();
            } catch (Exception $e) {
                // stack was deleted so the columns and table are not keeped
                $this->assertEquals('select  from ',$this->pdoOne->lastQuery);
            
            }
        }
        try {
            $this->pdoOne->select('*')->from('missintable')->setNoReset(true)->toList();
        } catch (Exception $e) {
            $this->assertContains('Failed to run query',$this->pdoOne->errorText);
            $this->assertEquals('select * from missintable',$this->pdoOne->lastQuery);
            $this->assertFalse($this->pdoOne->hasWhere());
        }
    }

    public function test_1()
    {
        $this->pdoOne->render();
        $a1=1;
        $this->assertEquals(1,$a1);
 
    }

    public function test_2()
    {
        $a1=1;
        $this->pdoOne->cliEngine();
        $this->assertEquals(1,$a1);
    }
    public function test_base() {
        $array1=["a"=>1,"b"=>2,"c"=>3];
        $array2=["a","b"];
        $array2As=["a"=>222,"b"=>333];
        $array3=["a","b",'d'];

        
        $this->assertEquals(["a"=>1,"b"=>2], _BasePdoOneRepo::intersectArrays($array1, $array2));
        $this->assertEquals(["c"=>3], _BasePdoOneRepo::diffArrays($array1, $array2));

        

        $this->assertEquals(["a"=>1,"b"=>2], _BasePdoOneRepo::intersectArrays($array1, $array2As,true));
        $this->assertEquals(["c"=>3], _BasePdoOneRepo::diffArrays($array1, $array2As,true));

        $this->assertEquals(["a"=>1,"b"=>2,"d"=>null], _BasePdoOneRepo::intersectArrays($array1, $array3,false));
        $this->assertEquals(["c"=>3], _BasePdoOneRepo::diffArrays($array1, $array3,false));
        
    }

    
    public function test_3() {
        $dt=new DateTime('18-07-2020');
        $cv=PdoOne::dateConvert('2020-07-18 00:00:00.000','sql','class');
        var_dump($cv);
        $this->assertEquals($dt,$cv);
        $this->assertEquals('2020-01-30',PdoOne::dateConvert('30/01/2020','human','sql'));
        $this->assertEquals('2020-01-30',PdoOne::dateConvert('30/01/2020','human','iso'));
        $this->assertEquals(new DateTime('01/30/2020 00:00:00'),PdoOne::dateConvert('30/01/2020','human','class'));
        $this->assertEquals('30/01/2020',PdoOne::dateConvert('2020-01-30','sql','human'));
    }
    public function test_4() {
        $this->assertGreaterThan(0,count($this->pdoOne->tableSorted()));
    }
}