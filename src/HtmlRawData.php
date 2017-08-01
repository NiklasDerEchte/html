<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.08.17
 * Time: 17:20
 */

namespace Niklas\Html;


class HtmlRawData
{
    private $mHtmlCode;

    public function __construct($htmlCode)
    {
        $this->mHtmlCode = $htmlCode;
    }

    public function getCode() {
        return $this->mHtmlCode;
    }
}