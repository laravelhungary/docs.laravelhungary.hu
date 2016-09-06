<?php

namespace App\Services;

use File;
use App\Documentation;
use Cache;

class DocumentationService
{

    protected $parser;
    protected $version;

    public function __construct()
    {
        $this->parser = new MdFileParser();
    }

    /**
     * Get a documentation page
     * @param $version
     * @param $page
     * @return null|string
     */
    public function page($version,$page)
    {
        $this->version = $version;

        return $this->generatePageContent($version,$page);
    }

    /**
     * Generate the page content
     * @param $version
     * @param $page
     */
    protected function generatePageContent($version,$page)
    {
        $content = $this->getContent($page);

        $documentation = app(Documentation::class, [
            'content' => $content,
            'version' => $version
        ]);

        $content = $this->parser->convertToHtml($documentation);

        return $content;
    }

    /**
     * Generate the documentation page content
     * @param $page
     * @return null|string
     */
    protected function getContent($page)
    {
        $content = $this->getHungarianContent($page);

        if (empty($content)) {
            $content = $this->getOriginalContent($page);
        }

        return $content;
    }


    /**
     * Get the hungarian content from md file
     * @param string $page
     * @return null|string
     */
    protected function getHungarianContent($page)
    {
        $mdFile = storage_path('docs/'.$this->version.'/hu/'.$page.'.md');

        return $this->getFileContent($mdFile);

    }

    /**
     * Get the original english md file
     * @param string $page
     * @return null|string
     */
    protected function getOriginalContent($page)
    {
        $mdFile = storage_path('docs/'.$this->version.'/'.$page.'.md');

        return $this->getFileContent($mdFile);
    }

    /**
     * Get content from file
     * @param string $fileName
     * @return null|string
     */
    protected function getFileContent($fileName)
    {
        $content = null;

        if (file_exists($fileName)) {
            $content = file_get_contents($fileName);
        }

        return $content;
    }

}