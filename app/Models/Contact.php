<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'position',
        'address',
        'notes',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function groups()
    {
        return $this->belongsToMany(ContactGroup::class, 'contact_group_relationships', 'contact_id', 'group_id');
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

}
