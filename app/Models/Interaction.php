<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\User;

class Interaction extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = [
        'contact_id',
        'user_id',
        'interaction_type',
        'interaction_datetime',
        'interaction_summary',
        'interaction_details',
    ];

    /**
     * Клиент, связанный с этим взаимодействием.
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Пользователь (сотрудник), связанный с этим взаимодействием.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
