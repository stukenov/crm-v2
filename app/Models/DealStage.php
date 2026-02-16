<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealStage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deal_id',
        'stage'
    ];

    /**
     * Get the deal that owns the stage.
     */
    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
