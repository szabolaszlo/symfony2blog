<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.08.30.
 * Time: 22:04
 */

namespace Blog\CoreBundle\Twig;

/**
 * Class StringDecoratorExtension
 * @package Blog\CoreBundle\Twig
 */
class StringDecoratorExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    protected $decoratorChar = '';

    /**
     * StringDecoratorExtension constructor.
     * @param string $decoratorChar
     */
    public function __construct($decoratorChar)
    {
        $this->decoratorChar = $decoratorChar;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('decorateString', array($this, 'decorateString')),
        );
    }

    /**
     * @param $number
     * @return string
     */
    public function decorateString($number)
    {
        return $this->decoratorChar . $number . $this->decoratorChar;
    }
}