<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id'; // Custom primary key
    protected $fillable = ['item_name', 'description', 'item_price', 'item_quantity', 'item_availability', 'minimum_amount', 'check_player_name_avilability'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'item_id', 'item_id');
    }
}
