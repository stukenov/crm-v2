<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGroupRelationship extends Model
{
    use HasFactory;

    protected $table = 'contact_group_relationships';

    protected $fillable = [
        'contact_id',
        'group_id',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function group()
    {
        return $this->belongsTo(ContactGroup::class, 'group_id');
    }
}
