<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use File;

use App\Odoo;
use App\Ecosystem;
use App\Client;
use App\App;
use App\Meth;

class OdooController extends Controller
{
    public function header()
    {
    	$header = Odoo::find('1');
    	return view('dashboard.odoo.home.header')
    			->with('header', $header);
    }

    public function header_update(Request $request)
    {
    	$rules = [
			'header_h1'  => 'required|min:2',
			'header_img' => 'mimes:png,svg|max:2000'
        ];

        $messages = [            
			'required'         => 'Este campo es necesario',
			
			'header_h1.min'    => 'Mínimo :min caracteres',
			
			'header_img.mimes' => 'Sólo archivos PNG y SVG',
			'header_img.max'   => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

        $header = Odoo::find('1');

        if ($request->hasFile('header_img')) {
            File::delete(public_path() . '/assets/images/odoo/cabecera/' . $header->header_img);

            $image = $request->file('header_img');
            $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/cabecera/';
            $image->move($path, $name);

            $header->img_1 = $name;
        }

        $header->header_h1 = $request->header_h1;
        $header->save();

        return redirect()->back();
    }

    public function about()
    {
    	$about = Odoo::find('1');
    	return view('dashboard.odoo.home.about')
    			->with('about', $about);
    }

    public function about_update(Request $request)
    {
    	$rules = [
			'about_h1'      => 'required|min:2',
			'about_content' => 'required|min:2',
			'about_img'     => 'mimes:png,jpg,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080'
        ];

        $messages = [            
			'required'        => 'Este campo es necesario',
			
			'about_h1.min'    => 'Mínimo :min caracteres',
			
			'about_img.mimes' => 'Sólo archivos PNG y SVG',
			'about_img.max'   => 'Máximo 2MB',
			'about_img.max'   => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $about = Odoo::find('1');

        if ($request->hasFile('about_img')) {
            File::delete(public_path() . '/assets/images/odoo/nosotros/' . $about->about_img);

            $image = $request->file('about_img');
            $name  = uniqid('about_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/nosotros/';
            $image->move($path, $name);

            $about->about_img = $name;
        }

		$about->about_h1      = $request->about_h1;
		$about->about_content = html_entity_decode($request->about_content);
        $about->save();

        return redirect()->back();
    }

    public function clients()
    {
    	$clients = Odoo::find('1');
    	return view('dashboard.odoo.home.clients')
    			->with('clients', $clients);
    }

    public function clients_update(Request $request)
    {
    	$rules = [
			'clients_h1' => 'required|min:2'
        ];

        $messages = [            
			'clients_h1.required' => 'Este campo es necesario',
			'clients_h1.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        Odoo::find('1')->update($request->all());

        return redirect()->back();
    }

    public function apps()
    {
    	$apps = Odoo::find('1');
    	return view('dashboard.odoo.home.apps')
    			->with('apps', $apps);
    }

    public function apps_update(Request $request)
    {
    	$rules = [
			'apps_h1' => 'required|min:2'
        ];

        $messages = [            
			'apps_h1.required' => 'Este campo es necesario',
			'apps_h1.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        Odoo::find('1')->update($request->all());

        return redirect()->back();
    }

    public function break()
    {
    	$break = Odoo::find('1');
    	return view('dashboard.odoo.home.break')
    			->with('break', $break);
    }

    public function break_update(Request $request)
    {
    	$rules = [
			'break_h1'  => 'required|min:2',
			'break_img' => 'mimes:png,jpg,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080'
        ];

        $messages = [            
			'required'        => 'Este campo es necesario',
			
			'break_h1.min'    => 'Mínimo :min caracteres',
			
			'break_img.mimes' => 'Sólo archivos PNG y SVG',
			'break_img.max'   => 'Máximo 2MB',
			'break_img.max'   => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $break = Odoo::find('1');

        if ($request->hasFile('break_img')) {
            File::delete(public_path() . '/assets/images/odoo/descanso/' . $break->break_img);

            $image = $request->file('break_img');
            $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/descanso/';
            $image->move($path, $name);

            $break->break_img = $name;
        }

		$break->break_h1 = $request->break_h1;
        $break->save();

        return redirect()->back();
    }

    public function meth()
    {
    	$meth = Odoo::find('1');
    	return view('dashboard.odoo.home.meth')
    			->with('meth', $meth);
    }

    public function meth_update(Request $request)
    {
    	$rules = [
			'meth_h1' => 'required|min:2'
        ];

        $messages = [            
			'meth_h1.required' => 'Este campo es necesario',
			'meth_h1.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        Odoo::find('1')->update($request->all());

        return redirect()->back();
    }

    public function odoo_eco()
    {
    	$ecos = Ecosystem::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.odoo.ecosystems.index')
    			->with('ecos', $ecos);
    }

    public function odoo_eco_create()
    {
    	return view('dashboard.odoo.ecosystems.create');
    }

    public function odoo_eco_store(Request $request)
    {
    	$rules = [
			'title'   => 'required|min:2',
			'content' => 'required|min:2'
        ];

        $messages = [            
			'required'    => 'Este campo es necesario',
			
			'title.min'   => 'Mínimo :min caracteres',
			
			'content.min' => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        Ecosystem::create([
			'title'   => $request->title,
			'content' => html_entity_decode($request->content),
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/odoo/ecosistemas');
    }

    public function odoo_eco_edit($id)
    {
    	$eco = Ecosystem::find($id);
    	return view('dashboard.odoo.ecosystems.edit')
    			->with('eco', $eco);
    }

    public function odoo_eco_update(Request $request, $id)
    {
    	$rules = [
			'title'   => 'required|min:2',
			'content' => 'required|min:2',
			'status'  => 'required'
        ];

        $messages = [            
			'required'    => 'Este campo es necesario',
			
			'title.min'   => 'Mínimo :min caracteres',
			
			'content.min' => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        Ecosystem::find($id)->update([
			'title'   => $request->title,
			'content' => html_entity_decode($request->content),
			'status'  => $request->status
        ]);

        return redirect('/escritorio/odoo/ecosistemas');
    }

    public function odoo_clients()
    {
    	$clients = Client::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.odoo.clients.index')
    			->with('clients', $clients);
    }

    public function odoo_clients_create()
    {
    	return view('dashboard.odoo.clients.create');
    }

    public function odoo_clients_store(Request $request)
    {
    	$rules = [
			'name' => 'required|min:2',
			'img'  => 'required|mimes:png,svg|max:2000'
        ];

        $messages = [
			'required'  => 'Este campo es necesario',
			
			'name.min'  => 'Mínimo :min caracteres',
			
			'img.mimes' => 'Sólo archivos PNG y SVG',
			'img.max'   => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

		$image = $request->file('img');
		$name  = uniqid('app_', true) . '.' . $image->getClientOriginalExtension();
		$path  = public_path() . '/assets/images/odoo/clientes/';
		$image->move($path, $name);

        Client::create([
			'name'    => $request->name,
			'img'     => $name,
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/odoo/clientes');
    }

    public function odoo_clients_edit($id)
    {
    	$client = Client::find($id);
    	return view('dashboard.odoo.clients.edit')
    			->with('client', $client);
    }

    public function odoo_clients_update(Request $request, $id)
    {
    	$rules = [
			'name'   => 'required|min:2',
			'img'    => 'mimes:png,svg|max:2000',
			'status' => 'required'
        ];

        $messages = [            
			'required'  => 'Este campo es necesario',
			
			'name.min'  => 'Mínimo :min caracteres',
			
			'img.mimes' => 'Sólo archivos PNG y SVG',
			'img.max'   => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

        $client = Client::find($id);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/odoo/clientes/' . $client->img);

            $image = $request->file('img');
            $name  = uniqid('client_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/clientes/';
            $image->move($path, $name);

            $client->img = $name;
        }

		$client->name   = $request->name;
		$client->status = $request->status;
        $client->save();

        return redirect('/escritorio/odoo/clientes');
    }

    public function odoo_apps()
    {
    	$apps = App::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.odoo.apps.index')
    			->with('apps', $apps);
    }

    public function odoo_apps_create()
    {
    	return view('dashboard.odoo.apps.create');
    }

    public function odoo_apps_store(Request $request)
    {
    	$rules = [
			'title'   => 'required|min:2',
			'img'     => 'required|mimes:png,svg|max:2000',
			'content' => 'required|min:2'
        ];

        $messages = [
			'required'  => 'Este campo es necesario',
			'min'       => 'Mínimo :min caracteres',
			
			'img.mimes' => 'Sólo archivos PNG y SVG',
			'img.max'   => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

		$image = $request->file('img');
		$name  = uniqid('app_', true) . '.' . $image->getClientOriginalExtension();
		$path  = public_path() . '/assets/images/odoo/aplicaciones/';
		$image->move($path, $name);

        App::create([
			'title'   => $request->title,
			'img'     => $name,
			'content' => html_entity_decode($request->content),
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/odoo/aplicaciones');
    }

    public function odoo_apps_edit($id)
    {
    	$app = App::find($id);
    	return view('dashboard.odoo.apps.edit')
    			->with('app', $app);
    }

    public function odoo_apps_update(Request $request, $id)
    {
    	$rules = [
			'title'   => 'required|min:2',
			'img'     => 'mimes:png,svg|max:2000',
			'content' => 'required|min:2'
        ];

        $messages = [
			'required'  => 'Este campo es necesario',
			'min'       => 'Mínimo :min caracteres',
			
			'img.mimes' => 'Sólo archivos PNG y SVG',
			'img.max'   => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

        $app = App::find($id);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/odoo/aplicaciones/' . $app->img);

            $image = $request->file('img');
            $name  = uniqid('client_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/aplicaciones/';
            $image->move($path, $name);

            $app->img = $name;
        }

		$app->title   = $request->title;
		$app->content = html_entity_decode($request->content);
		$app->status  = $request->status;
        $app->save();

        return redirect('/escritorio/odoo/aplicaciones');
    }

    public function odoo_meth()
    {
    	$meths = Meth::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.odoo.meth.index')
    			->with('meths', $meths);   
    }

    public function odoo_meth_create()
    {
    	return view('dashboard.odoo.meth.create');
    }

    public function odoo_meth_store(Request $request)
    {
    	$rules = [
            'title'   => 'required|min:2',
            'slug'    => 'unique:meths,slug',
            'img'     => 'required|mimes:png,svg|max:2000',
            'content' => 'required|min:2'
        ];

        $messages = [
            'required'    => 'Este campo es necesario',
            'min'         => 'Mínimo :min caracteres',

            'slug.unique' => 'Ya existe esta URL, prueba otra',
            
            'img.mimes'   => 'Sólo archivos PNG y SVG',
            'img.max'     => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

		$image = $request->file('img');
		$name  = uniqid('meth_', true) . '.' . $image->getClientOriginalExtension();
		$path  = public_path() . '/assets/images/odoo/metodologia/';
		$image->move($path, $name);

        Meth::create([
            'title'   => $request->title,
            'slug'    => str_slug($request->title),
            'img'     => $name,
            'content' => html_entity_decode($request->content),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/odoo/metodologia');
    }

    public function odoo_meth_edit($id)
    {
    	$meth = Meth::find($id);
    	return view('dashboard.odoo.meth.edit')
    			->with('meth', $meth);
    }

    public function odoo_meth_update(Request $request, $id)
    {
        $meth = Meth::find($id);

    	$rules = [
            'title'   => 'required|min:2',
            'slug'    => 'unique:meths,slug,'.$meth->id,
            'img'     => 'mimes:png,svg|max:2000',
            'content' => 'required|min:2',
            'status'  => 'required'
        ];

        $messages = [
            'required'    => 'Este campo es necesario',
            'min'         => 'Mínimo :min caracteres',
            
            'slug.unique' => 'Ya existe esta URL, prueba otra',
            
            'img.mimes'   => 'Sólo archivos PNG y SVG',
            'img.max'     => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/odoo/metodologia/' . $meth->img);

            $image = $request->file('img');
            $name  = uniqid('meth_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/odoo/metodologia/';
            $image->move($path, $name);

            $meth->img = $name;
        }

        $meth->title   = $request->title;
        $meth->slug    = str_slug($request->title);
        $meth->content = html_entity_decode($request->content);
        $meth->status  = $request->status;
        $meth->save();

        return redirect('/escritorio/odoo/metodologia');
    }
}
