<?php

namespace App\Services;

use App\Documentation;

class MdFileParser
{

    protected $converter;
    protected $documentation;

    public function __construct()
    {
        $this->converter = new \ParsedownExtra();
    }

    /**
     * md file to laravel documentation html code
     * @param string $content
     * @return string
     */
    public function convertToHtml(Documentation $documentation)
    {
        $this->documentation = $documentation;

        $this->documentation->setContent($this->text());
        $this->documentation->setContent($this->fixHrefs());
        $this->documentation->setContent($this->setPreClass());
        $this->documentation->setContent($this->iconGenerator());

        return $this->documentation->getContent();
    }

    /**
     * Convert md content to html
     * @return mixed|string
     */
    protected function text()
    {
        return $this->converter->text(
            $this->documentation->getContent()
        );
    }

    /**
     * Fixing the internal url -s
     * @return string
     */
    protected function fixHrefs()
    {
        $from = [
            '/docs/{{version}}',
            '{{version}}',
            '/api/'
        ];
        $to = [
            '/'.$this->documentation->getVersion(),
            $this->documentation->getVersion(),
            'http://laravel.com/api/'
        ];

        return str_replace($from,$to,$this->documentation->getContent());
    }

    /**
     * Fixing the internal url -s
     * @return string
     */
    protected function setPreClass()
    {
        $from = '<pre>';
        $to = '<pre class="prettyprint  lang-php">';

        return str_replace($from,$to,$this->documentation->getContent());
    }

    protected function iconGenerator()
    {
        $from = [
            '{tip}',
            '{tipp}',
            '{note}',
            '{jegyzet}',
        ];

        $to = [
            '<span class="glyphicon glyphicon-ok"></span> &nbsp; ',
            '<span class="glyphicon glyphicon-ok"></span> &nbsp; ',
            '<span class="glyphicon glyphicon-pencil"></span> &nbsp;',
            '<span class="glyphicon glyphicon-pencil"></span> &nbsp;'
        ];

        return str_replace($from,$to,$this->documentation->getContent());
    }
}