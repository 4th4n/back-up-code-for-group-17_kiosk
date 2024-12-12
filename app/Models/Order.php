<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'total_price', 'completed'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'order_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    protected $dates = ['completed_at']; // Ensure completed_at is cast as a Carbon date.

public function completeOrder()
{
    $this->completed = true;
    $this->completed_at = now(); // Save the current time when marked as completed
    $this->save();
}

}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     use HasFactory;

//     protected $fillable = ['total_price'];

//     public function items()
//     {
//         return $this->belongsToMany(Item::class, 'order_items')
//                     ->withPivot('quantity', 'price');
//     }
// }

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     use HasFactory;

//     // Add 'completed' to the $fillable property
//     protected $fillable = ['total_price', 'completed'];

//     public function items()
//     {
//         return $this->belongsToMany(Item::class, 'order_items')
//                     ->withPivot('quantity', 'price');
//     }
// }
