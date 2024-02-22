<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'title', 'desc', 'location', 'mail', 'phone', 'price', 'type', 'brand', 'fuel', 'mileage', 'active'];

    public const CARS = [
        "car-small" => "Auta małe",
        "car-city" => "Auta miejskie",
        "coupe"=> "Coupe",
        "cabriolet"=> "Kabriolet",
        "kombi"=>"Kombi",
        "compact"=>"Kompakt",
        "minivan"=>"Minivan",
        "sedan"=>"Sedan",
        "suv"=>"SUV",
        "no-type"=>"nie dotyczy",
    ];
    public const FUEL = [
        "petrol" => "Benzyna",
        "diesel" => "Diesel",
        "hybrid" => "Hybrydowe",
        "EV" => "Elektryczne",
        "gas" => "LPG",
        "other" => "inne",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ImageUpload');
    }

    public function imageMain() {
        return $this->hasOne('App\Models\ImageUpload')->oldest();
    }

    public function scopeActive($query) {
        return $query->where('active',1);
    }
    public function scopeMine($query) {
        return $query->where('user_id',auth()->user()->id);
    }
}
