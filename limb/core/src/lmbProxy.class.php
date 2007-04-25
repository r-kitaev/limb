<?php
/**
 * Limb Web Application Framework
 *
 * @link http://limb-project.com
 *
 * @copyright  Copyright &copy; 2004-2007 BIT
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 * @version    $Id: lmbProxy.class.php 5143 2007-02-20 21:40:01Z serega $
 * @package    core
 */

/**
* Base class for creating proxies.
* Proxies acts like real(original) objects until real object is definitely required.
* In such a case the original object is <b>resolved</b> and since that moment all method
* and argument calls will be delegeted to the real object.
*/
abstract class lmbProxy
{
  /**
  * @var boolean Flag if real object is resolved already
  */
  protected $is_resolved = false;
  /**
  * @var mixed Real object
  */
  protected $original;

  /**
  * Returns hash string for original object
  * @return string
  */
  function getHash()
  {
    if(!$this->is_resolved)
      return md5(serialize($this));

    return $this->resolve()->getHash();
  }

  /**
  * Creates original object
  */
  abstract protected function _createOriginalObject();

  /**
  * Resolves original object.
  * Resolving is depend on child classes implementation
  */
  function resolve()
  {
    if($this->is_resolved)
      return $this->original;

    $this->original = $this->_createOriginalObject();
    $this->is_resolved = true;

    return $this->original;
  }

  /**
  * Magic caller
  * Resolves original object and delegates method call to it.
  */
  function __call($method, $args = array())
  {
    $this->resolve();
    if(method_exists($this->original, $method))
      return call_user_func_array(array($this->original, $method), $args);
  }

  /**
  * Magic getter
  * Resolves original object and delegates to it.
  */
  function __get($attr)
  {
    $this->resolve();
    return $this->original->$attr;
  }

  /**
  * Magic setter
  * Resolves original object and delegates to it.
  */
  function __set($attr, $val)
  {
    $this->resolve();
    $this->original->$attr = $val;
  }
}
?>
