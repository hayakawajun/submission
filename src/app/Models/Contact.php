<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public static $rules = [
        'category_id' => 'required|integer|min:1|max:5',
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required|integer|min:1|max:3',
        'email' => 'required',
        'tel' => 'required|integer',
        'address' => 'required',
        'detail' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query,$keyword)
    {
        if(!empty($keyword)){
            $query->whereRaw('CONCAT(last_name," ",first_name) LIKE ? ', '%' . $keyword . '%')
            ->orWhereRaw('CONCAT(last_name,"",first_name) LIKE ? ', '%' . $keyword . '%')
            ->orWhereRaw('CONCAT(first_name," ",last_name) LIKE ? ', '%' . $keyword . '%')
            ->orWhereRaw('CONCAT(first_name,"",last_name) LIKE ? ', '%' . $keyword . '%')
            ->orWhere('first_name','like','%'.$keyword.'%')
            ->orWhere('last_name','like','%'.$keyword.'%')
            ->orWhere('email','like','%'.$keyword.'%');
        }
        
    }

    public function scopeGenderSearch($query,$gender)
    {
        if($gender='1')    
        $query->where('gender',1);
        
    }

    public function scopeDateSearch($query,$date)
    {
        if(!empty($date)){
            $query->where('created_at','like','%'.$date.'%');
        }
        
    }

    public function scopeCategorySearch($query,$category_id)
    {
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }
}
