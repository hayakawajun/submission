<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facade\DB;

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
            $query->where('first_name','like','%'.$keyword.'%')
            ->orWhere('last_name','like','%'.$keyword.'%')
            ->orWhere(DB::raw("CONCAT(last_name,first_name)"),'like','%'.$keyword.'%')
            ->orWhere('email','like','%'.$keyword.'%');
        }
    }
}
