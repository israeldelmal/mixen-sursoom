<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use File;

use App\GBA;
use App\GBABreak;
use App\GBASolutions;
use App\GBADocs;
use App\GBASystem;

class GBAController extends Controller
{
    public function header()
    {
    	$gba = GBA::find('1');
    	return view('dashboard.gba.header')
    			->with('gba', $gba);
    }

    public function header_update(Request $request)
    {
    	$rules = [
			'header_h1'   => 'required|min:4',
			'header_sub'  => 'required|min:4',
			'header_logo' => 'mimes:png,svg|max:2000',
			'header_img'  => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080'
    	];

    	$messages = [
			'header_h1.required'    => 'Este campo es requerido',
			'header_h1.min'         => 'Mínimo :value caracteres',
			
			'header_sub.required'   => 'Este campo es requerido',
			'header_sub.min'        => 'Mínimo :value caracteres',
			
			'header_logo.mimes'     => 'Sólo se permiten archivos PNG y SVG',
			'header_logo.max'       => 'Máximo :value MB',
			
			'header_img.mimes'      => 'Sólo se permiten archivos JPG, PNG y JPEG',
			'header_img.max'        => 'Máximo :value MB',
			'header_img.dimensions' => 'Un máximo y mínimo de 1920px x 1080px'
    	];

    	$request->validate($rules, $messages);

		$gba             = GBA::find('1');
		$gba->header_h1  = $request->header_h1;
		$gba->header_sub = $request->header_sub;

		if ($request->hasFile('header_logo')) {
            File::delete(public_path() . '/assets/images/gba/cabecera/' . $gba->header_logo);

            $image = $request->file('header_logo');
            $name  = uniqid('header_logo_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/cabecera/';
            $image->move($path, $name);

            $gba->header_logo = $name;
        }

        if ($request->hasFile('header_img')) {
            File::delete(public_path() . '/assets/images/gba/cabecera/' . $gba->header_img);

            $image = $request->file('header_img');
            $name  = uniqid('header_bg_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/cabecera/';
            $image->move($path, $name);

            $gba->header_img = $name;
        }

        $gba->save();

    	return redirect()->back();
    }

    public function about()
    {
    	$gba = GBA::find('1');
    	return view('dashboard.gba.about')
    			->with('gba', $gba);
    }

    public function about_update(Request $request)
    {
    	$rules = [
			'about_h1'      => 'required|min:4',
			'about_content' => 'required|min:4',
			'about_img'     => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'about_h1.required'      => 'Este campo es necesario',
			'about_h1.min'           => 'Mínimo 4 caracteres',
			
			'about_content.required' => 'Este campo es necesario',
			'about_content.min'      => 'Mínimo 4 caracteres',
			
			'about_img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
			'about_img.max'          => 'Peso máximo de 2MB',
			'about_img.dimensions'   => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $about                = GBA::find('1');
        $about->about_h1      = $request->about_h1;
        $about->about_content = html_entity_decode($request->about_content);

        if ($request->hasFile('about_img')) {
            File::delete(public_path() . '/assets/images/gba/nosotros/' . $about->about_img);

            $image = $request->file('about_img');
            $name  = uniqid('about_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/nosotros/';
            $image->move($path, $name);

            $about->about_img = $name;
        }

        $about->save();

        return redirect()->back();
    }

    public function break()
    {
    	$gba = GBA::find('1');
    	return view('dashboard.gba.break')
    			->with('gba', $gba);
    }

    public function break_update(Request $request)
    {
    	$rules = [
			'break_h1'  => 'required|min:4',
			'break_img' => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'break_h1.required'    => 'Este campo es necesario',
			'break_h1.min'         => 'Mínimo 4 caracteres',
			
			'break_img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
			'break_img.max'        => 'Peso máximo de 2MB',
			'break_img.dimensions' => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

		$break           = GBA::find('1');
		$break->break_h1 = $request->break_h1;

        if ($request->hasFile('break_img')) {
            File::delete(public_path() . '/assets/images/gba/descanso/' . $break->break_img);

            $image = $request->file('break_img');
            $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/descanso/';
            $image->move($path, $name);

            $break->break_img = $name;
        }

        $break->save();

        return redirect()->back();
    }

    public function solutions()
    {
    	$gba = GBA::find('1');
    	return view('dashboard.gba.solutions')
    			->with('gba', $gba);
    }

    public function solutions_update(Request $request)
    {
    	$rules = [
			'solutions_h1'  => 'required|min:4',
			'solutions_sub' => 'required|min:4'
        ];

        $messages = [            
			'solutions_h1.required'  => 'Este campo es necesario',
			'solutions_h1.min'       => 'Mínimo 4 caracteres',
			
			'solutions_sub.required' => 'Este campo es necesario',
			'solutions_sub.min'      => 'Mínimo 4 caracteres'
        ];

        $request->validate($rules, $messages);

		GBA::find('1')->update($request->all());

        return redirect()->back();
    }

    public function system()
    {
    	$gba = GBA::find('1');
    	return view('dashboard.gba.system')
    			->with('gba', $gba);
    }

    public function system_update(Request $request)
    {
    	$rules = [
			'sistems_h1'  => 'required|min:4',
			'sistems_img' => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'sistems_h1.required'    => 'Este campo es necesario',
			'sistems_h1.min'         => 'Mínimo 4 caracteres',
			
			'sistems_img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
			'sistems_img.max'        => 'Peso máximo de 2MB',
			'sistems_img.dimensions' => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

		$system             = GBA::find('1');
		$system->sistems_h1 = $request->sistems_h1;

        if ($request->hasFile('sistems_img')) {
            File::delete(public_path() . '/assets/images/gba/sistemas/' . $system->sistems_img);

            $image = $request->file('sistems_img');
            $name  = uniqid('sistems_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/sistemas/';
            $image->move($path, $name);

            $system->sistems_img = $name;
        }

        $system->save();

        return redirect()->back();
    }

    public function sursoom_blog()
    {
        $blog = Sursoom::find('1');
        return view('dashboard.sursoom.blog')
                ->with('blog', $blog);
    }

    public function sursoom_blog_update(Request $request)
    {
        $rules = [
            'blog_h1'  => 'required|min:4',
            'blog_sub' => 'required|min:4',
        ];

        $messages = [            
            'blog_h1.required'  => 'Este campo es necesario',
            'blog_h1.min'       => 'Mínimo :min caracteres',
            
            'blog_sub.required' => 'Este campo es necesario',
            'blog_sub.min'      => 'Mínimo :min caracteres',
        ];

        $request->validate($rules, $messages);
        
        Sursoom::find('1')->update($request->all());

        return redirect()->back();
    }

    // Descanso
    public function gba_break()
    {
    	$gba = GBABreak::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.gba.break.index')
    			->with('gba', $gba);
    }

    public function gba_break_create()
    {
    	return view('dashboard.gba.break.create');
    }

    public function gba_break_store(Request $request)
    {
    	$rules = [
			'name' => 'required|min:4',
        ];

        $messages = [            
			'name.required' => 'Este campo es necesario',
			'name.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        GBABreak::create([
			'name'    => $request->name,
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/gba/elementos');
    }

    public function gba_break_edit($id)
    {
    	$gba = GBABreak::find($id);
    	return view('dashboard.gba.break.edit')
    			->with('gba', $gba);
    }

    public function gba_break_update(Request $request, $id)
    {
        $rules = [
			'name' => 'required|min:4',
        ];

        $messages = [            
			'name.required' => 'Este campo es necesario',
			'name.min'      => 'Mínimo :value caracteres'
        ];

        $request->validate($rules, $messages);

        GBABreak::find($id)->update([
			'name'   => $request->name,
			'status' => $request->status
        ]);

        return redirect('/escritorio/gba/elementos');
    }

    // Soluciones
    public function gba_solutions()
    {
    	$gba = GBASolutions::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.gba.solutions.index')
    			->with('gba', $gba);
    }

    public function gba_solutions_create()
    {
    	return view('dashboard.gba.solutions.create');
    }

    public function gba_solutions_store(Request $request)
    {
    	$rules = [
			'title'       => 'required|min:2',
			'slug'        => 'unique:gba_solutions,slug',
			'img'         => 'required|mimes:png,svg|max:2000',
			'content'     => 'required|min:4',
			'description' => 'required|min:4|max:155'
        ];

        $messages = [            
			'title.required'       => 'Este campo es necesario',
			'title.min'            => 'Mínimo :min caracteres',
			
			'slug.unique'          => 'Ya existe esta URL, prueba otra',
			
			'img.required'         => 'Este campo es necesario',
			'img.mimes'            => 'Sólo se permiten imágenes PNG y SVG',
			'img.max'              => 'Mínimo :min caracteres',
			
			'content.required'     => 'Este campo es necesario',
			'content.min'          => 'Mínimo :min caracteres',
			
			'description.required' => 'Este campo es necesario',
			'description.min'      => 'Mínimo :min caracteres',
			'description.max'      => 'Máximo :max caracteres'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/gba/soluciones/';
        $image->move($path, $name);

        GBASolutions::create([
			'title'       => $request->title,
			'slug'        => str_slug($request->title),
			'img'         => $name,
			'content'     => html_entity_decode($request->content),
			'description' => $request->description,
			'user_id'     => auth()->user()->id
        ]);

        return redirect('/escritorio/gba/solutions');
    }

    public function gba_solutions_edit($id)
    {
    	$gba = GBASolutions::find($id);
    	return view('dashboard.gba.solutions.edit')
    			->with('gba', $gba);
    }

    public function gba_solutions_update(Request $request, $id)
    {
    	$gba = GBASolutions::find($id);

        $rules = [
			'title'       => 'required|min:2',
			'slug'        => 'unique:gba_solutions,slug,'.$gba->id,
			'img'         => 'mimes:png,svg|max:2000',
			'content'     => 'required|min:4',
			'description' => 'required|min:4|max:155',
			'status'      => 'required'
        ];

        $messages = [            
			'title.required'       => 'Este campo es necesario',
			'title.min'            => 'Mínimo :min caracteres',
			
			'slug.unique'          => 'Ya existe esta URL, prueba otra',
			
			'img.mimes'            => 'Sólo se permiten imágenes PNG y SVG',
			'img.max'              => 'Máximo 2MB',
			
			'content.required'     => 'Este campo es necesario',
			'content.min'          => 'Mínimo :min caracteres',
			
			'description.required' => 'Este campo es necesario',
			'description.min'      => 'Mínimo :min caracteres',
			'description.max'      => 'Máximo :max caracteres',
			
			'status.required'      => 'Este campo es necesario'
        ];

        $request->validate($rules, $messages);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/gba/soluciones/' . $gba->img);

            $image = $request->file('img');
            $name  = uniqid('solution_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/soluciones/';
            $image->move($path, $name);

            $gba->img = $name;
        }

		$gba->title       = $request->title;
		$gba->slug        = str_slug($request->title);
		$gba->content     = html_entity_decode($request->content);
		$gba->description = $request->description;
		$gba->status      = $request->status;
        $gba->save();

        return redirect('/escritorio/gba/solutions');
    }

    // Documentación
    public function gba_docs()
    {
    	$gba = GBADocs::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.gba.docs.index')
    			->with('gba', $gba);
    }

    public function gba_docs_create()
    {
    	return view('dashboard.gba.docs.create');
    }

    public function gba_docs_store(Request $request)
    {
    	$rules = [
			'title'   => 'required|min:4',
			'img'     => 'required|mimes:png,jpg,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
			'content' => 'required|min:4',
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo :min caracteres',
			
			'img.required'     => 'Este campo es necesario',
			'img.mimes'        => 'Sólo se permiten imágenes PNG, JPG y JPEG',
			'img.max'          => 'Mínimo :min caracteres',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
			
			'content.required' => 'Este campo es necesario',
			'content.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('docs_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/gba/docs/';
        $image->move($path, $name);

        GBADocs::create([
			'title'   => $request->title,
			'img'     => $name,
			'content' => html_entity_decode($request->content),
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/gba/documentacion');
    }

    public function gba_docs_edit($id)
    {
    	$gba = GBADocs::find($id);
    	return view('dashboard.gba.docs.edit')
    			->with('gba', $gba);
    }

    public function gba_docs_update(Request $request, $id)
    {
    	$gba = GBADocs::find($id);

        $rules = [
			'title'   => 'required|min:4',
			'img'     => 'mimes:png,jpg,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
			'content' => 'required|min:4',
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo :min caracteres',
			
			'img.mimes'        => 'Sólo se permiten imágenes PNG, JPG y JPEG',
			'img.max'          => 'Máximo 2MB',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
			
			'content.required' => 'Este campo es necesario',
			'content.min'      => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/gba/docs/' . $gba->img);

            $image = $request->file('img');
            $name  = uniqid('docs_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/docs/';
            $image->move($path, $name);

            $gba->img = $name;
        }

		$gba->title   = $request->title;
		$gba->content = html_entity_decode($request->content);
		$gba->status  = $request->status;
        $gba->save();

        return redirect('/escritorio/gba/documentacion');
    }

    // Sistemas
    public function gba_systems()
    {
    	$gba = GBASystem::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.gba.systems.index')
    			->with('gba', $gba);
    }

    public function gba_systems_create()
    {
    	return view('dashboard.gba.systems.create');
    }

    public function gba_systems_store(Request $request)
    {
    	$rules = [
			'title'   => 'required|min:4',
			'img'     => 'required|mimes:png,jpg,jpeg|max:2000'
        ];

        $messages = [            
			'title.required' => 'Este campo es necesario',
			'title.min'      => 'Mínimo :min caracteres',
			
			'img.required'   => 'Este campo es necesario',
			'img.mimes'      => 'Sólo se permiten imágenes PNG, JPG y JPEG',
			'img.max'        => 'Mínimo :min caracteres'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('systems_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/gba/systems/';
        $image->move($path, $name);

        GBASystem::create([
			'title'   => $request->title,
			'img'     => $name,
			'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/gba/systems');
    }

    public function gba_systems_edit($id)
    {
    	$gba = GBASystem::find($id);
    	return view('dashboard.gba.systems.edit')
    			->with('gba', $gba);
    }

    public function gba_systems_update(Request $request, $id)
    {
    	$gba = GBASystem::find($id);

        $rules = [
			'title'   => 'required|min:4',
			'img'     => 'mimes:png,jpg,jpeg|max:2000'
        ];

        $messages = [            
			'title.required' => 'Este campo es necesario',
			'title.min'      => 'Mínimo :min caracteres',
			
			'img.mimes'      => 'Sólo se permiten imágenes PNG, JPG y JPEG',
			'img.max'        => 'Máximo 2MB'
        ];

        $request->validate($rules, $messages);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/gba/systems/' . $gba->img);

            $image = $request->file('img');
            $name  = uniqid('systems_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/gba/systems/';
            $image->move($path, $name);

            $gba->img = $name;
        }

		$gba->title  = $request->title;
		$gba->status = $request->status;
        $gba->save();

        return redirect('/escritorio/gba/systems');
    }
}
