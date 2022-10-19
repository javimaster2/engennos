<?php

namespace App\Observers;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;


class LessonObserver
{
    //
    public function creating(Lesson $lesson)
    {
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';   
        /* if($platform_id == 1){
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';       
        }else{
            $patron = '/https?:\/\/(www\.)?onedrive\.live\.com\/download[?+=&%a-zA-Z0-9]+/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<source controls width="560" height="315" src="'. $parte[0] .'" type="video/mp4" ></source>';
        } */
    }

    public function updating(Lesson $lesson)
    {
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        /* if($platform_id == 1){
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';       
        }else{
            // $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            //$array = preg_match($patron, $url, $parte);
            //$lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; 
                $patron = '/https?:\/\/(www\.)?onedrive\.live\.com\/download[?+=&%a-zA-Z0-9]+/';
                $array = preg_match($patron, $url, $parte);
                $lesson->iframe = '<source controls width="560" height="315" src="'. $parte[0] .'" type="video/mp4" ></source>';         
        } */
    }

    public function deleting(Lesson $lesson)
    {
        if($lesson->resource)
        {
            Storage::delete($lesson->resource->url);
            $lesson->resource->delete();
        }
    }
}
