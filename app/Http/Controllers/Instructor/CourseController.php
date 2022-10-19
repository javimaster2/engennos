<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Oferta;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;



class CourseController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('can:Leer Cursos')->only('index');
        $this->middleware('can:Crear Cursos')->only('create','store');
        $this->middleware('can:Actualizar Cursos')->only('edit','update','goals');
        $this->middleware('can:Eliminar Cursos')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories=Category::pluck('name','id');
        $prices=Price::pluck('name','id');
        $ofertas=Oferta::pluck('name','id');
        

        
        return view('instructor.courses.create',compact('categories','prices','ofertas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
        
         $messages=[
            'title.required'=>'Por favor ingrese el titulo ',
            'slug.required'=>'Por favor ingrese el slug',
            'subtitle.required'=>'Por favor ingrese el subtitulo',
            'description.required'=>'Por favor ingrese la descripcion',
            'intro.required'=>'Por favor ingrese la url de presentacion',
            'file.required'=>'El archivo no es de tipo imagen',
        ];
         $rules=[
                 'title'=>'required',
                 'slug'=>'required|unique:courses',
                 'subtitle'=>'required',
                 'description'=>'required',
                 'intro'=>'required',
                 'category_id'=>'required',
                 'price_id'=>'required',
                 /* 'oferta_id'=>['required'], */
                 'file'=>'image'
        ];

        $notification = array(
            'message' => 'El curso se publico con exito',
            'alert-type' => 'success'
        );

        

        $this->validate($request,$rules,$messages);


        
      
            $request['oferta_id']=1;
            $course=Course::create($request->all());
       
            if($request->file('file'))
            {
                $url=Storage::put('courses',$request->file('file'));
                $course->image()->create([
                    'url'=>$url
                ]);
            }
            
            return redirect()->route('instructor.courses.index',$course)->with($notification);
        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dicatated',$course);

        $categories=Category::pluck('name','id');
        $prices=Price::pluck('name','id');
        $ofertas=Oferta::pluck('name','id');
        return view('instructor.courses.edit',compact('course','categories','prices','ofertas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dicatated',$course);

        $messages=[
            'title.required'=>'Por favor ingrese el titulo ',
            'slug.required'=>'Por favor ingrese el slug',
            'subtitle.required'=>'Por favor ingrese el subtitulo',
            'description.required'=>'Por favor ingrese la descripcion',
            'intro.required'=>'Por favor ingrese la url de presentacion',
            'file.required'=>'El archivo no es de tipo imagen',
        ];
         $rules=[
                 'title'=>'required',
                 'slug'=>'required|unique:courses,slug,'.$course->id,
                 'subtitle'=>'required',
                 'description'=>'required',
                 'intro'=>['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'],
                 'category_id'=>'required',
                 'price_id'=>'required',
                 /* 'oferta_id'=>'required', */
                 'file'=>'image'
        ];

        $notification = array(
            'message' => 'No se puede aplicar una oferta porque hay cupon activo para este curso',
            'alert-type' => 'error'
        );

        $this->validate($request,$rules,$messages);

        $cupon=Coupon::all();
        $oferta=Oferta::where('id',$request->oferta_id)->get();
        $name="";
        foreach($oferta as $oferta)
        {
            $name=$oferta->name;
        }
        
        if($cupon->count()==0 || $name=="No hay oferta")
        {
            $url = $course->intro;
        

        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            //$request['oferta_id']=1;
            $course->update($request->all());
            if($request->file('file'))
            {
                $url=Storage::put('courses',$request->file('file'));
                if($course->image)
                {
                    Storage::delete($course->image->url);
                    $course->image->update([
                        'url'=>$url
                    ]);
                }else{
                    $course->image()->create([
                        'url'=>$url
                    ]);
                }
            }
            
            return redirect()->route('instructor.courses.edit',$course);
        }else{
            
            return redirect()->route('instructor.courses.edit',$course)->with($notification);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course){
        $this->authorize('dicatated',$course);
        return view('instructor.courses.goals',compact('course'));
    }

    public function status(Course $course)
    {
        $course->status=2;
        $course->save();

        if($course->observation)
        {
            $course->observation->delete();
        }
        

        return redirect()->route('instructor.courses.edit',$course);
    }

    public function observation(Course $course)
    {
        return view('instructor.courses.observation',compact('course'));
    }

    

}
