<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $date;
    public $body;

    public function __construct($title, $date, $body, $active)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->active = $active;
    }



    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
        // return $files;
    }


    public static function find($slug)
    {

        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
       return cache()->remember("posts.{$slug}", 5, function () use ($path){
            return file_get_contents($path);
        });

    }
}
