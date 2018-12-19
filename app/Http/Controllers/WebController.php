<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Metadata;
use App\Sursoom;
use App\Article;
use App\Service;
use App\GBA;
use App\GBABreak;
use App\GBASolutions;
use App\GBADocs;
use App\Odoo;
use App\Ecosystem;
use App\Client;
use App\Meth;

class WebController extends Controller
{
    public function sursoom()
    {
        $sursoom  = Sursoom::find('1');
        $services = Service::orderBy('id', 'DESC')->where('status', true)->limit(6)->get();
        $articles = Article::orderBy('id', 'DESC')->where('status', true)->simplePaginate(4);
    	return view('web.sursoom.index')
                ->with('sursoom', $sursoom)
                ->with('services', $services)
                ->with('articles', $articles);
    }

    public function gba()
    {
        $meta      = Metadata::find('1');
        $gba       = GBA::find('1');
        $gbabreak  = GBABreak::orderBy('id', 'DESC')
                        ->where('status', true)
                        ->limit(4)
                        ->get();        
        $solutions = GBASolutions::orderBy('id', 'DESC')
                        ->where('status', true)
                        ->limit(6)
                        ->get();
        $docs      = GBADocs::orderBy('id', 'DESC')
                        ->where('status', true)
                        ->limit(3)
                        ->get();
    	return view('web.gba.index')
                ->with('meta', $meta)
                ->with('gba', $gba)
                ->with('gbabreak', $gbabreak)
                ->with('solutions', $solutions)
                ->with('docs', $docs);
    }

    public function odoo()
    {
        $meta    = Metadata::find('1');
        $odoo    = Odoo::find('1');
        $ecos    = Ecosystem::orderBy('id', 'DESC')->limit(4)->get();
        $clients = Client::orderBy('id', 'DESC')->where('status', true)->limit(10)->get();
        $meths   = Meth::orderBy('id', 'DESC')->where('status', true)->limit(6)->get();
    	return view('web.odoo.index')
                ->with('meta', $meta)
                ->with('odoo', $odoo)
                ->with('ecos', $ecos)
                ->with('clients', $clients)
                ->with('meths', $meths);
    }
}
