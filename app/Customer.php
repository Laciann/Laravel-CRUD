<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Fillable Example
    // protected $fillable = ['name','email','active'];
    //Gaurded example
    protected $guarded = []; //empty array means nothing is guarded
    public function scopeActive($query){
        return $query->where('active',1);
    }

     public function scopeInactive($query){
        return $query->where('active',0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
