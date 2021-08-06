<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : "profile/fyQ1bGQXNhR2vi87sjFfdRBZJQmfMiNsV03hVad5.jpg";
   
        return '/storage/' .$imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
        
    } 

}
