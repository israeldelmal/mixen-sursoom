<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use File;

use App\User;
use App\Metadata;
use App\Sursoom;
use App\Article;
use App\Service;

class DashboardController extends Controller
{
	// Index
    public function index()
    {
    	return view('dashboard.index.index');
    }

    // Usuarios
    public function users()
    {
    	$users = User::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.users.index')
    			->with('users', $users);
    }

    public function users_edit($id)
    {
    	$user = User::find($id);
    	return view('dashboard.users.edit')
    			->with('user', $user);
    }

    // Usuario
    public function user($id)
    {
        $user = User::find($id);
        return view('dashboard.users.user')
                ->with('user', $user);
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'email'        => 'required|email|unique:users,email,'.$user->id,
            'name'         => 'required|min:4',
            'lastname'     => 'required|min:4'
        ];

        $messages = [            
            'email.required'    => 'Este campo es requerido',
            'email.email'       => 'No tiene formato de email',
            'email.unique'      => 'Ya existe está registrado este correo',
            
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'Mínimo 4 caracteres',
            
            'lastname.required' => 'Este campo es requerido',
            'lastname.min'      => 'Mínimo 4 caracteres'
        ];

        $request->validate($rules, $messages);

        if ($request->email != auth()->user()->email) {
            $user->email = $request->email;
        }

        if ($request->name != auth()->user()->name) {
            $user->name = $request->name;
        }

        if ($request->lastname != auth()->user()->lastname) {
            $user->lastname = $request->lastname;
        }

        if ($user->save()) {
            if ($request->email != auth()->user()->email) {
                auth()->logout();
                return redirect('/escritorio');
            } else {
                return redirect()->back();
            }
        }

    }

    // Metadatos
    public function metadata_sursoom()
    {
        $sursoom = Metadata::find('1');
        return view('dashboard.metadata.sursoom')
                ->with('sursoom', $sursoom);
    }

    public function metadata_sursoom_update(Request $request)
    {
        $rules = [
            'ss_title'       => 'required|min:2',
            'ss_description' => 'required|min:1',
            'ss_keywords'    => 'required|min:1'
        ];

        $messages = [            
            'ss_title.required'       => 'Este campo es necesario',
            'ss_title.min'            => 'Mínimo 2 caracteres',
            
            'ss_description.required' => 'Este campo es necesario',
            'ss_description.min'      => 'Mínimo 1 caracteres',
            
            'ss_keywords.required'    => 'Este campo es necesario',
            'ss_keywords.min'         => 'Mínimo 1 caracteres',
        ];

        $request->validate($rules, $messages);

        Metadata::find('1')->update($request->all());

        return redirect()->back();
    }

    public function metadata_gba()
    {
        $gba = Metadata::find('1');
        return view('dashboard.metadata.gba')
                ->with('gba', $gba);
    }

    public function metadata_gba_update(Request $request)
    {
        $rules = [
            'gba_title'       => 'required|min:2',
            'gba_description' => 'required|min:1',
            'gba_keywords'    => 'required|min:1'
        ];

        $messages = [            
            'gba_title.required'       => 'Este campo es necesario',
            'gba_title.min'            => 'Mínimo 2 caracteres',
            
            'gba_description.required' => 'Este campo es necesario',
            'gba_description.min'      => 'Mínimo 1 caracteres',
            
            'gba_keywords.required'    => 'Este campo es necesario',
            'gba_keywords.min'         => 'Mínimo 1 caracteres'
        ];

        $request->validate($rules, $messages);

        Metadata::find('1')->update($request->all());

        return redirect()->back();
    }

    public function metadata_odoo()
    {
        $odoo = Metadata::find('1');
        return view('dashboard.metadata.odoo')
                ->with('odoo', $odoo);
    }

    public function metadata_odoo_update(Request $request)
    {
        $rules = [
            'odoo_title'       => 'required|min:2',
            'odoo_description' => 'required|min:1',
            'odoo_keywords'    => 'required|min:1'
        ];

        $messages = [            
            'odoo_title.required'       => 'Este campo es necesario',
            'odoo_title.min'            => 'Mínimo 2 caracteres',
            
            'odoo_description.required' => 'Este campo es necesario',
            'odoo_description.min'      => 'Mínimo 1 caracteres',
            
            'odoo_keywords.required'    => 'Este campo es necesario',
            'odoo_keywords.min'         => 'Mínimo 1 caracteres'
        ];

        $request->validate($rules, $messages);

        Metadata::find('1')->update($request->all());
        
        return redirect()->back();
    }

    // Sursoom
    public function sursoom_header()
    {
        $header = Sursoom::find('1');
        return view('dashboard.sursoom.header')
                ->with('header', $header);
    }

    public function sursoom_header_update(Request $request)
    {
        $rules = [
            'header_h1'  => 'required|min:4',
            'header_sub' => 'required|min:4',
            'img_1'      => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'header_h1.required'  => 'Este campo es necesario',
            'header_h1.min'       => 'Mínimo 4 caracteres',
            
            'header_sub.required' => 'Este campo es necesario',
            'header_sub.min'      => 'Mínimo 4 caracteres',
            
            'img_1.mimes'         => 'Sólo imágenes JPG, JPEG y PNG',
            'img_1.max'           => 'Peso máximo de 5MB',
            'img_1.dimensions'    => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $header             = Sursoom::find('1');
        $header->header_h1  = $request->header_h1;
        $header->header_sub = $request->header_sub;

        if ($request->hasFile('img_1')) {
            File::delete(public_path() . '/assets/images/sursoom/cabecera/' . $header->img_1);

            $image = $request->file('img_1');
            $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/cabecera/';
            $image->move($path, $name);

            $header->img_1 = $name;
        }

        $header->save();

        return redirect()->back();
    }

    public function sursoom_about()
    {
        $about = Sursoom::find('1');
        return view('dashboard.sursoom.about')
                ->with('about', $about);
    }

    public function sursoom_about_update(Request $request)
    {
        $rules = [
            'about_h1'      => 'required|min:4',
            'about_content' => 'required|min:4',
            'img_2'         => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'about_h1.required'      => 'Este campo es necesario',
            'about_h1.min'           => 'Mínimo 4 caracteres',
            
            'about_content.required' => 'Este campo es necesario',
            'about_content.min'      => 'Mínimo 4 caracteres',
            
            'img_2.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img_2.max'              => 'Peso máximo de 5MB',
            'img_2.dimensions'       => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $about                = Sursoom::find('1');
        $about->about_h1      = $request->about_h1;
        $about->about_content = $request->about_content;

        if ($request->hasFile('img_2')) {
            File::delete(public_path() . '/assets/images/sursoom/nosotros/' . $about->img_2);

            $image = $request->file('img_2');
            $name  = uniqid('about_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/nosotros/';
            $image->move($path, $name);

            $about->img_2 = $name;
        }

        $about->save();

        return redirect()->back();
    }

    public function sursoom_break()
    {
        $break = Sursoom::find('1');
        return view('dashboard.sursoom.break')
                ->with('break', $break);
    }

    public function sursoom_break_update(Request $request)
    {
        $rules = [
            'break_h1' => 'required|min:4',
            'img_3'    => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'break_h1.required'      => 'Este campo es necesario',
            'break_h1.min'           => 'Mínimo 4 caracteres',
            
            'img_3.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img_3.max'              => 'Peso máximo de 5MB',
            'img_3.dimensions'       => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $break           = Sursoom::find('1');
        $break->break_h1 = $request->break_h1;

        if ($request->hasFile('img_3')) {
            File::delete(public_path() . '/assets/images/sursoom/descanso-1/' . $break->img_3);

            $image = $request->file('img_3');
            $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/descanso-1/';
            $image->move($path, $name);

            $break->img_3 = $name;
        }

        $break->save();

        return redirect()->back();
    }

    public function sursoom_products()
    {
        $products = Sursoom::find('1');
        return view('dashboard.sursoom.products')
                ->with('products', $products);
    }

    public function sursoom_products_update(Request $request)
    {
        $rules = [
            'products_h1'  => 'required|min:4',
            'products_sub' => 'required|min:4',
        ];

        $messages = [            
            'products_h1.required'  => 'Este campo es necesario',
            'products_h1.min'       => 'Mínimo 4 caracteres',
            
            'products_sub.required' => 'Este campo es necesario',
            'products_sub.min'      => 'Mínimo 4 caracteres',
        ];

        $request->validate($rules, $messages);

        Sursoom::find('1')->update($request->all());

        return redirect()->back();
    }

    public function sursoom_docs()
    {
        $docs = Sursoom::find('1');
        return view('dashboard.sursoom.docs')
                ->with('docs', $docs);
    }

    public function sursoom_docs_update(Request $request)
    {
        $rules = [
            'docs_h1'        => 'required|min:4',
            'docs_content_1' => 'required|min:4',
            'img_4'          => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'docs_h2'        => 'required|min:4',
            'docs_content_2' => 'required|min:4',
            'img_5'          => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080'
        ];

        $messages = [            
            'docs_h1.required'        => 'Este campo es necesario',
            'docs_h1.min'             => 'Mínimo 4 caracteres',
            
            'docs_content_1.required' => 'Este campo es necesario',
            'docs_content_1.min'      => 'Mínimo 4 caracteres',
            
            'img_4.mimes'             => 'Sólo imágenes JPG, JPEG y PNG',
            'img_4.max'               => 'Peso máximo de 5MB',
            'img_4.dimensions'        => 'Las medidas son de 1920x1080',
            
            'docs_h2.required'        => 'Este campo es necesario',
            'docs_h2.min'             => 'Mínimo 4 caracteres',
            
            'docs_content_2.required' => 'Este campo es necesario',
            'docs_content_2.min'      => 'Mínimo 4 caracteres',
            
            'img_5.mimes'             => 'Sólo imágenes JPG, JPEG y PNG',
            'img_5.max'               => 'Peso máximo de 5MB',
            'img_5.dimensions'        => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $docs                 = Sursoom::find('1');
        $docs->docs_h1        = $request->docs_h1;
        $docs->docs_content_1 = $request->docs_content_1;

        if ($request->hasFile('img_4')) {
            File::delete(public_path() . '/assets/images/sursoom/documentacion/' . $docs->img_4);

            $image = $request->file('img_4');
            $name  = uniqid('docs_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/documentacion/';
            $image->move($path, $name);

            $docs->img_4 = $name;
        }

        $docs->docs_h2        = $request->docs_h2;
        $docs->docs_content_2 = $request->docs_content_2;

        if ($request->hasFile('img_5')) {
            File::delete(public_path() . '/assets/images/sursoom/documentacion/' . $docs->img_5);

            $image = $request->file('img_5');
            $name  = uniqid('docs_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/documentacion/';
            $image->move($path, $name);

            $docs->img_5 = $name;
        }

        $docs->save();

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
            'blog_h1.min'       => 'Mínimo 4 caracteres',
            
            'blog_sub.required' => 'Este campo es necesario',
            'blog_sub.min'      => 'Mínimo 4 caracteres',
        ];

        $request->validate($rules, $messages);
        
        Sursoom::find('1')->update($request->all());

        return redirect()->back();
    }

    // Servicios
    public function services()
    {
    	$services = Service::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.services.index')
    			->with('services', $services);
    }

    public function services_create()
    {
    	return view('dashboard.services.create');
    }

    public function services_store(Request $request)
    {
    	$rules = [
            'title'       => 'required|min:4s',
            'slug'        => 'unique:services,slug',
            'content'     => 'required|min:4',
            'img'         => 'required|mimes:png,svg|max:2000',
            'description' => 'required|min:4|max:155'
        ];

        $messages = [            
            'required'    => 'Este campo es necesario',
            'min'         => 'Mínimo :min caracteres',
            'max'         => 'Máximo :max caracteres',
            
            'slug.unique' => 'Ya existe esta URL, prueba otra',
            
            'img.mimes'   => 'Sólo imágenes PNG y SVG',
            'img.max'     => 'Peso máximo de 2MB',
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/sursoom/servicios/';
        $image->move($path, $name);

        Service::create([
            'title'       => $request->title,
            'slug'        => str_slug($request->title),
            'content'     => html_entity_decode($request->content),
            'img'         => $name,
            'description' => $request->description,
            'user_id'     => auth()->user()->id
        ]);

        return redirect('/escritorio/servicios');
    }

    public function services_edit($id)
    {
    	$service = Service::find($id);
    	return view('dashboard.services.edit')
    			->with('service', $service);
    }

    public function services_update(Request $request, $id)
    {
        $service = Service::find($id);

        $rules = [
            'title'       => 'required|min:4s',
            'slug'        => 'unique:services,slug,'.$service->id,
            'content'     => 'required|min:4',
            'img'         => 'mimes:png,svg|max:2000',
            'description' => 'required|min:4|max:155',
            'status'      => 'required'
        ];

        $messages = [            
            'required'    => 'Este campo es necesario',
            'min'         => 'Mínimo :min caracteres',
            'max'         => 'Máximo :max caracteres',
            
            'slug.unique' => 'Ya existe esta URL, prueba otra',
            
            'img.mimes'   => 'Sólo imágenes PNG y SVG',
            'img.max'     => 'Peso máximo de 2MB'
        ];

        $request->validate($rules, $messages);

        $service->title = $request->title;
        $service->slug  = str_slug($request->title);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/sursoom/servicios/' . $service->img);

            $image = $request->file('img');
            $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/sursoom/servicios/';
            $image->move($path, $name);

            $service->image = $name;
        }

        $service->content     = html_entity_decode($request->content);
        $service->description = $request->description;
        $service->status      = $request->status;
        $service->save();

        return redirect('/escritorio/servicios');
    }

    // Artículos
    public function articles()
    {
        $articles = Article::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.articles.index')
                ->with('articles', $articles);
    }

    public function articles_create()
    {
        return view('dashboard.articles.create');
    }

    public function articles_store(Request $request)
    {
        $rules = [
            'title'       => 'required|min:4',
            'slug'        => 'unique:articles,slug',
            'content'     => 'required|min:4',
            'img'         => 'required|mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'description' => 'required|min:4|max:155',
            'keywords'    => 'required|min:2'
        ];

        $messages = [
            'title.required'       => 'Este campo es necesario',
            'title.min'            => 'Mínimo 4 caracteres',
            
            'slug.unique'          => 'Ya existe esta URL, prueba otra',
            
            'content.required'     => 'Este campo es necesario',
            'content.min'          => 'Mínimo 4 caracteres',
            
            'img.required'         => 'Este campo es necesario',
            'img.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'              => 'Peso máximo de 2MB',
            'img.dimensions'       => 'Las medidas son de 1920x1080',
            
            'description.required' => 'Este campo es necesario',
            'description.min'      => 'Mínimo 4 caracteres',
            'description.max'      => 'Máximo 155 caracteres',
            
            'keywords.required'    => 'Este campo es necesario',
            'keywords.min'         => 'Mínimo 2 caracteres'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/articulos/';
        $image->move($path, $name);

        Article::create([
            'title'       => $request->title,
            'slug'        => str_slug($request->title),
            'content'     => html_entity_decode($request->content),
            'img'         => $name,
            'description' => $request->description,
            'keywords'    => $request->keywords,
            'user_id'     => auth()->user()->id
        ]);

        return redirect('/escritorio/articulos');
    }

    public function articles_edit($id)
    {
        $article = Article::find($id);
        return view('dashboard.articles.edit')
                ->with('article', $article);
    }

    public function articles_update(Request $request, $id)
    {
        $article = Article::find($id);

        $rules = [
            'title'       => 'required|min:4',
            'slug'        => 'unique:articles,slug,'.$article->id,
            'content'     => 'required|min:4',
            'img'         => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'description' => 'required|min:4|max:155',
            'keywords'    => 'required|min:2'
        ];

        $messages = [
            'title.required'       => 'Este campo es necesario',
            'title.min'            => 'Mínimo 4 caracteres',
            
            'slug.unique'          => 'Ya existe esta URL, prueba otra',
            
            'content.required'     => 'Este campo es necesario',
            'content.min'          => 'Mínimo 4 caracteres',
            
            'img.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'              => 'Peso máximo de 2MB',
            'img.dimensions'       => 'Las medidas son de 1920x1080',
            
            'description.required' => 'Este campo es necesario',
            'description.min'      => 'Mínimo 4 caracteres',
            'description.max'      => 'Máximo 155 caracteres',
            
            'keywords.required'    => 'Este campo es necesario',
            'keywords.min'         => 'Mínimo 2 caracteres'
        ];

        $request->validate($rules, $messages);

        $article->title = $request->title;
        $article->slug  = str_slug($request->title);

        if ($request->hasFile('image')) {
            File::delete(public_path() . '/assets/images/articulos/' . $article->image);

            $image = $request->file('image');
            $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/articulos/';
            $image->move($path, $name);

            $article->image = $name;
        }

        $article->content     = html_entity_decode($request->content);
        $article->description = $request->description;
        $article->keywords    = $request->keywords;
        $article->status      = $request->status;
        $article->save();

        return redirect('/escritorio/articulos');
    }
}
