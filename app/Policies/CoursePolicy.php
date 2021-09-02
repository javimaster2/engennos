<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //verifica si un alumno se encuentra matriculado o no //devuelve true o false
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);//este metodo contains verifica si el id de este usuario se encuentra en esta coleccion que recuperamos atraves de la relacion
    }

    public function published(?User $user, Course $course)
    {
        if($course->status==3)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function dicatated(User $user, Course $course)
    {
        if($course->user_id==$user->id)
        {
            return true;
        }else{
            return false;
        }
    }

    public function revision(User $user, Course $course)
    {
        if($course->status==2)
        {
            return true;
        }else{
            return false;
        }
    }

    public function valued(User $user, Course $course)
    {
        if(Review::where('user_id',$user->id)->where('course_id',$course->id)->count())
        {
            return false;
        }
        else{
            return true;
        }
    }
}
