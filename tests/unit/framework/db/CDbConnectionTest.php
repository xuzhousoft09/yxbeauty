<?php

Yii::import('system.db.CDbConnection');

if(!defined('SRC_DB_FILE'))
	define('SRC_DB_FILE',dirname(__FILE__).'/data/source.db');
if(!defined('TEST_DB_FILE'))
	define('TEST_DB_FILE',dirname(__FILE__).'/data/test.db');

class CDbConnectionTest extends CTestCase
{
	private $_connection;

	public function setUp()
	{
		if(!extension_loaded('pdo') || !extension_loaded('pdo_sqlite'))
			$this->markTestSkipped('PDO and SQLite extensions are required.');
		copy(SRC_DB_FILE,TEST_DB_FILE);

		$this->_connection=new CDbConnection('sqlite:'.TEST_DB_FILE);
	}

	public function tearDown()
	{
		$this->_connection->active=false;
	}

	public function testAutoConnect()
	{
		$db=new CDbConnection;
		$db->connectionString='sqlite:'.TEST_DB_FILE;
		$this->assertFalse($db->active);
		$this->assertTrue($db->autoConnect);
		$db->init();
		$this->assertTrue($db->active);

		$db2=new CDbConnection;
		$db2->connectionString='sqlite:'.TEST_DB_FILE;
		$db2->autoConnect=false;
		$this->assertFalse($db2->autoConnect);
		$this->assertFalse($db2->active);
		$db->init();
		$this->assertFalse($db2->active);
	}

	public function testInitialized()
	{
		$db=new CDbConnection;
		$db->autoConnect=false;
		$this->assertFalse($db->isInitialized);
		$db->init();
		$this->assertTrue($db->isInitialized);
	}

	public function testActive()
	{
	    $this->assertFalse($this->_connection->active);
	    $this->_connection->active=true;
	    $this->assertTrue($this->_connection->active);
	    $pdo=$this->_connection->pdoInstance;
	    $this->assertTrue($pdo instanceof PDO);

	    $this->_connection->active=true;
	    $this->assertEquals($pdo,$this->_connection->pdoInstance);

		$this->_connection->active=false;
	    $this->assertFalse($this->_connection->active);
	    $this->assertEquals($this->_connection->pdoInstance,null);

		$connection=new CDbConnection('unknown:'.TEST_DB_FILE);
		$this->setExpectedException('CException');
		$connection->active=true;
	}

	public function testCreateCommand()
	{
		$sql='SELECT * FROM posts';
		$this->_connection->active=true;
		$command=$this->_connection->createCommand($sql);
		$this->assertTrue($command instanceof CDbCommand);

		$this->_connection->active=false;
		$this->setExpectedException('CException');
		$this->_connection->createCommand($sql);
	}

	public function testLastInsertID()
	{
	    $this->_connection->active=true;
		$sql='INSERT INTO posts(title,create_time,author_id) VALUES(\'test post\',11000,1)';
		$this->_connection->createCommand($sql)->execute();
		$this->assertEquals($this->_connection->lastInsertID,6);
	}

	public function testQuoteValue()
	{
	    $this->_connection->active=true;
		$str="this is 'my' name";
		$expectedStr="'this is ''my'' name'";
		$this->assertEquals($expectedStr,$this->_connection->quoteValue($str));
	}

	public function testColumnNameCase()
	{
	    $this->_connection->active=true;
		$this->assertEquals(PDO::CASE_NATURAL,$this->_connection->ColumnCase);
		$this->_connection->columnCase=PDO::CASE_LOWER;
		$this->assertEquals(PDO::CASE_LOWER,$this->_connection->ColumnCase);
	}

	public function testNullConversion()
	{
	    $this->_connection->active=true;
		$this->assertEquals(PDO::NULL_NATURAL,$this->_connection->NullConversion);
		$this->_connection->nullConversion=PDO::NULL_EMPTY_STRING;
		$this->assertEquals(PDO::NULL_EMPTY_STRING,$this->_connection->NullConversion);
	}
}
