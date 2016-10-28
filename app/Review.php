<?php

namespace App;
use App\Product;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function product()
  {
    return $this->belongsTo('App\Product');
  }

  public function scopeApproved($query)
  {
    return $query->where('approved', true);
  }

  public function scopeSpam($query)
  {
    return $query->where('spam', true);
  }

  public function scopeNotSpam($query)
  {
    return $query->where('spam', false);
  }
  public function getTimeagoAttribute()
  {
    $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    return $date;
  }
   // this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
    public function storeReviewForProduct($productID, $comment, $rating)
    {
        $product = Product::find($productID);
        //$this->user_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $this->user_id = 
        $product->reviews()->save($this);
        // recalculate ratings for the specified product
        $product->recalculateRating($rating);
    }
}
