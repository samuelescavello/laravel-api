<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;




class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($name){

        $slug = Str::slug($name, '-');
        $count = 1;
        while(category::where('slug',$slug)->first()){
            $slug = Str::slug($name.'-'.$count, '-');
            $count++;
        }

        return $slug;
    }

    public function projects(){

        return $this->belongsToMany(Project::class);
    }
}
