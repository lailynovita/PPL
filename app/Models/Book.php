<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public static function rules()
    {
        return [
            'isbn' => [
                'required',
                'regex:/^\d{1}-\d{3}-\d{5}-\d{1}$/',
                Rule::unique('books', 'isbn'),
            ],
            'author' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|in:1,2,3,4,5',
        ];
    }

    public static function updateRules($isbn)
    {
        return [
            'author' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|in:1,2,3,4,5',
        ];
    }
}