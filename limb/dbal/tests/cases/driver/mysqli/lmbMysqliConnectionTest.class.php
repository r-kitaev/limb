<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 */

require_once(dirname(__FILE__) . '/../DriverConnectionTestBase.class.php');
require_once(dirname(__FILE__) . '/fixture.inc.php');

class lmbMysqliConnectionTest extends DriverConnectionTestBase
{
  function lmbMysqliConnectionTest()
  {  
    parent :: DriverConnectionTestBase('lmbMysqliQueryStatement', 'lmbMysqliInsertStatement', 'lmbMysqliManipulationStatement', 'lmbMysqliStatement');
  }

  function setUp()
  {
    $this->connection = lmbToolkit :: instance()->getDefaultDbConnection();
    DriverMysqliSetup($this->connection->getConnectionId());
    parent::setUp();
  }
}
