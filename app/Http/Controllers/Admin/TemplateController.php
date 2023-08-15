<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\WebConfig;

class TemplateController extends Controller
{
    public function __construct() 
    {
        $this->website  = WebConfig::get()->first()->nama_web;
    }

    public function index()
    {
        $website    = $this->website;
        $title      = "Template";

        $template   = Template::get()->first();

        return view('admin.template.index', compact('website', 'title', 'template'));
    }

    public function edit(Template $template)
    {
        $website    = $this->website;
        $title      = "Ubah Template";

        return view('admin.template.edit', compact('website', 'title', 'template'));
    }
}
