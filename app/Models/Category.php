<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'slug'
    ];
    public function projects()
    {
        return $this->hasMany(project::class);
    }

    public static function generateSlug($name){

        $slug = Str::slug($name, '-');
        $count = 1;
        while(category::where('slug',$slug)->first()){
            $slug = Str::slug($name.'-'.$count, '-');
            $count++;
        }

        return $slug;
    }
}
