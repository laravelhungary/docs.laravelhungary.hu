<?php

namespace App\Http\Controllers;

use App\Services\DocumentationService;
use Cache;

class DocumentationController extends Controller
{

    private $documentationService;

    public function __construct(DocumentationService $documentationService)
    {
        $this->documentationService = $documentationService;
    }

    public function index($version)
    {
        if (!in_array($version,config('documentation.versions'))) {
            return redirect('/');
        }

        return $this->show($version,'installation');
    }

    public function show($version,$page)
    {
        $cacheKey = 'show.'.$version.'.'.$page;

        if (!Cache::has($cacheKey))
        {
            $content = $this->documentationService->page($version, $page);

            if (empty($content)) {
                $content = view('documentation.notfound');
            }

            $view = view('documentation.page', [
                'content' => $content,
                'leftMenu' => $this->documentationService->page($version, 'documentation'),
                'page' => $page,
                'version' => $version
            ]);

            Cache::put($cacheKey,$view->render(),60);
        }


        return Cache::get($cacheKey);
    }

}