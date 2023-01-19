<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','identifier'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
