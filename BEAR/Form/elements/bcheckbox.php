<?php
/**
 * This file is part of the BEAR.Saturday package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Base class
 */
/** @noinspection PhpIncludeInspection */

/**
 * HTML class for a "bcheckbox" element
 *
 * @link       http://pear.php.net/package/HTML_QuickForm
 * @since      1.0
 */
class HTML_QuickForm_bcheckbox extends HTML_QuickForm_checkbox
{
    /**
     * Class constructor
     *
     * @param string $elementName  (optional)Input field name attribute
     * @param string $elementLabel (optional)Input field value
     * @param string $text         (optional)Checkbox display text
     * @param mixed  $attributes   (optional)Either a typical HTML attribute string
     *                             or an associative array
     *
     * @since     1.0
     */
    public function __construct($elementName = null, $elementLabel = null, $text = '', $attributes = null)
    {
        parent::__construct($elementName, $elementLabel, $attributes);
        $this->_persistantFreeze = true;
        $this->_text = $text;
        $this->setType('checkbox');
        $this->updateAttributes(array('value' => 1));
        $this->_generateId();
    }

    /**
     * Returns the checkbox element in HTML
     *
     * @since     1.0
     *
     * @return string
     */
    public function toHtml()
    {
        if (0 == strlen($this->_text)) {
            $label = '';
        } elseif ($this->_flagFrozen) {
            // チェックの時のみラベルを表示
            $label = $this->getChecked() ? $this->_text : '';
        } else {
            $label = '<label for="' . $this->getAttribute('id') . '">' . $this->_text . '</label>';
        }

        return HTML_QuickForm_input::toHtml() . $label;
    }

    //end func toHtml

    /**
     * Returns the value of field without HTML tags
     *
     * @since     1.0
     *
     * @return string
     */
    public function getFrozenHtml()
    {
        return $this->_getPersistantData();
    }
}
