<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'amount',
        'date_transaction',
        'note',
        'image',
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeExpanses($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expanse', true);
        });
    }
    public function scopeIncomes($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expanse', false);
        });
    }
}
