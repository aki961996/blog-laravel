<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
        'user_id',
        'image',
     
        'content',
    
        'author',
        'date',
        'status',

    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $table  = 'blogs';

     //acceser
     public function getStatusAttribute()
     {
         return $this->attributes['status'] == 0 ? 'Active' : 'Inactive';
     }
 
    
     public function getCreatedAtFormattedAttribute()
     {
         return $this->created_at->format('d/m/Y H:i');
     }
 
     public function getDateFormattedAttribute()
     {
         return $this->date->format('d/m/Y H:i');
     }
 
 
     // Mutator to remove HTML tags from description
     public function setDescriptionAttribute($value)
     {
         $this->attributes['description'] = strip_tags(trim($value));
     }
 
 
     static public function getRecord()
     {
         $return = Blog::select('*')
             ->where('is_delete', '=', 0)
             ->where('status', 0);
             
 
         //search
         $title = request()->get('title');
         $author = request()->get('author');
         $date = request()->get('date');
         if (!empty($title)) {
             $return = $return->where('title', 'like', '%' . $title . '%');
         } elseif (!empty($author)) {
             $return = $return->where('author', 'like', '%' . $author . '%');
         } elseif (!empty($date)) {
             $return = $return->whereDate('created_at', "=", $date);
         }
         //search
 
         $return = $return->orderBy('blogs.id', 'desc')->paginate(10);
 
         return $return;
     }
 
     static public function getSingleData($id)
     {
         return Blog::find($id);
     }
 
   
 
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
