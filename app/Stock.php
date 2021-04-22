<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    protected $casts = [
        'in_stock' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'url',
        'sku',
        'price',
        'in_stock',
        'product_id',
        'retailer_id',
    ];

    public function track()
    {
        if ($this->retailer->name === 'Best Buy') {
            $results = Http::get('http://foo.com')->json();
            $this->update([
                'in_stock' => $results['available'],
                'price' => $results['price'],
            ]);
        }
    }

    public function retailer(): BelongsTo
    {
        return $this->belongsTo(Retailer::class);
    }
}
