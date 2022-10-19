<?php

namespace App\Observers;

use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        //
        $url = $course->intro;
        

        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $course->iframe = '<iframe id="videoplay" src="https://player.vimeo.com/video/' . $parte[2] . '" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';

    }

    /**
     * Handle the Course "updated" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function updating(Course $course)
    {
        //
        $url = $course->intro;
        

        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $course->iframe = '<iframe id="videoplay" src="https://player.vimeo.com/video/' . $parte[2] . '" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';

    }

    /**
     * Handle the Course "deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
