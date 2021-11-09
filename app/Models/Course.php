<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Course extends Model
{
    use HasFactory;
    protected $guarded=['id','status'];
    protected $withCount=['students','reviews'];//para agregar un campo mas por medio de la  relacion students que permita contar cuantos estudiantes hay curso
    

    const BORRADOR=1;
    const REVISION=2;
    const PUBLICADO=3;

    //toda la coleccion de los reviews que los alumnos hallan dejado a un curso
    public function getRatingAttribute()
    {
        if($this->reviews_count)
        {
            return round($this->reviews->avg('rating'),1);
        }else
        {
            return 5;
        }
        
    }

    //QueryScopes
    public function scopeCategory($query,$category_id)
    {
        if($category_id)//si hay almacenado algo y si no no entrara
        {
            return $query->where('category_id',$category_id);
        }
    }

    public function getRouteKeyName()
    {
        return "slug";   
    }

    //relacion uno a uno
    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
    }
    

    //relacion uno a muchos
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }
    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }
    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    //relacion uno a muchos inversa 
    public function teacher() //recuperar el usuario que a dictado el curso
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }


    //relacion muchos a muchos metodo para recuperar todos los estudiantes que tenga este curso
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image','imageable');
    }

    //relacion uno a uno polimorfica
    public function resource()
    {
        return $this->morphOne('App\Models\Resource','resourceable');
    }

    //relacion entre curso y lesson atraves de section
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson','App\Models\Section');
    }

}
