<?php
/**
 * Limb Web Application Framework
 *
 * @link http://limb-project.com
 *
 * @copyright  Copyright &copy; 2004-2007 BIT
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 * @version    $Id: lmbWysiwygComponent.class.php 5932 2007-06-04 12:30:26Z pachanga $
 * @package    wysiwyg
 */
lmb_require('limb/wact/src/components/form/form.inc.php');

class lmbWysiwygComponent extends WactTextAreaComponent
{
  var $ini = null;
  var $group = null;

  function renderContents()
  {
    echo '<textarea';
    $this->renderAttributes();
    echo '>';
    echo htmlspecialchars($this->getValue(), ENT_QUOTES);
    echo '</textarea>';
  }

  function getIniOption($option)
  {
    if($value = $this->ini->getOption($option, $this->group))
      return $value;
    return '';
  }

  function initWysiwyg($ini_file_name, $group = null)
  {
    $this->ini = lmbToolkit :: instance()->getConf($ini_file_name);
    $this->group = $group;

    if(!$this->getAttribute('rows'))
      $this->setAttribute('rows', $this->getIniOption('rows'));

    if(!$this->getAttribute('cols'))
      $this->setAttribute('cols', $this->getIniOption('cols'));

    if(!$this->getAttribute('width'))
      $this->setAttribute('width', $this->getIniOption('width'));

    if(!$this->getAttribute('height'))
      $this->setAttribute('height', $this->getIniOption('height'));

  }
}
?>