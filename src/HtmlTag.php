<?php

namespace HtmlGenerator;

class HtmlTag extends Markup
{
    protected $autocloseTagsList = array(
        'img', 'br', 'hr', 'input', 'area', 'link', 'meta', 'param'
    );

    /**
     * Add a class to classList.
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function addClass($value)
    {
        if (!isset($this->attributeList['class']) || is_null($this->attributeList['class'])) {
            $this->attributeList['class'] = array();
        }
        if (function_exists('hookAddClassHtmlTag')) {
            hookAddClassHtmlTag($value);
        }
        $this->attributeList['class'][] = $value;
        return $this;
    }

    /**
     * Shortcut to set('checked', $value).
     *
     * @param boolean $value
     * @param boolean $check_value
     * @return HtmlTag instance
     */
    public function checked($value = true, $check_value = true)
    {
        if ($value === $check_value) {
            return parent::attr('checked', 'checked');
        }
        return $this;
    }

    /**
     * Shortcut to set('disabled', $value).
     *
     * @param boolean $value
     * @param boolean $check_value
     * @return HtmlTag instance
     */
    public function disable($value = true, $check_value = true)
    {
        if ($value === $check_value) {
            return parent::attr('disabled', 'disabled');
        }
        return $this;
    }

    /**
     * Shortcut to set('for', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function forId($value)
    {
        return parent::attr('for', $value);
    }

    /**
     * Shortcut to set('href', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function href($value)
    {
        return parent::attr('href', $value);
    }

    /**
     * Shortcut to set('id', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function id($value)
    {
        return $this->set('id', $value);
    }

    /**
     * Shortcut to for creating a label
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function label($text)
    {
        $id = $this->attributeList['id'];

        return Html::createElement('label')
            ->refer($id)
            ->text($this)
            ->text($text);
    }

    /**
     * Shortcut to set('name', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function name($value)
    {
        return parent::attr('name', $value);
    }

    /**
     * Shortcut to set('on...', $value).
     *
     * @param string $name
     * @param string $value
     * @return HtmlTag instance
     */
    public function on($name, $value)
    {
        return parent::attr('on'.$name, $value);
    }

    /**
     * Shortcut to set('pattern', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function pattern($value)
    {
        return parent::attr('pattern', $value);
    }

    /**
     * Shortcut to set('placeholder', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function placeholder($value)
    {
        return parent::attr('placeholder', $value);
    }

    /**
     * Remove a class from classList.
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function removeClass($value)
    {
        if (!is_null($this->attributeList['class'])) {
            unset($this->attributeList['class'][array_search($value, $this->attributeList['class'])]);
        }
        return $this;
    }

    /**
     * Shortcut to set('required', $value).
     *
     * @param boolean $required
     * @param boolean $required_value
     * @return HtmlTag instance
     */
    public function required($required = true, $required_value = true)
    {
        if ($required == $required_value) {
            return parent::attr('required', 'required');
        }
        return $this;
    }

    /**
     * Shortcut to set('rows', $value).
     *
     * @param integer $rows
     * @return HtmlTag instance
     */
    public function rows($rows)
    {
        if ($this->tag === 'textarea') {
            return parent::attr('rows', $rows);
        }
    }

    /**
     * (Re)Define an attribute.
     *
     * @param string $name
     * @param string $value
     * @return Markup instance
     */
    public function set($name, $value)
    {
        if ($name === 'value') {
            $value = htmlspecialchars($value);
        }
        parent::set($name, $value);
        return $this;
    }

    /**
     * Shortcut to set('style', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function style($value)
    {
        return parent::attr('style', $value);
    }

    /**
     * Define text content.
     *
     * @param string $value
     * @return Markup instance
     */
    public function text($value)
    {
        if ($this->tag === 'textarea') {
            $value = htmlspecialchars($value);
        }
        parent::text($value);
        return $this;
    }

    /**
     * Shortcut to set('title', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function title($value)
    {
        return parent::attr('title', $value);
    }

    /**
     * Shortcut to set('type', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function type($value)
    {
        switch ($value) {
            case 'checkbox':
                $this->value(1);
                break;
        }
        return parent::attr('type', $value);
    }

    /**
     * Shortcut to set('value', $value).
     *
     * @param string $value
     * @return HtmlTag instance
     */
    public function value($value)
    {
        return parent::attr('value', $value);
    }






}
