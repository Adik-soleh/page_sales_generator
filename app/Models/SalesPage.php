<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_name',
        'description',
        'features',
        'target_audience',
        'price',
        'selling_points',
        'generated_content',
        'template',
    ];

    protected $casts = [
        'features' => 'array',
        'generated_content' => 'array',
        'price' => 'decimal:2',
    ];

    /**
     * Get the user that owns the sales page.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
