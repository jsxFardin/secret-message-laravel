<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'text',
        'recepient_id',
        'sender_id',
        'read_at',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recepient()
    {
        return $this->belongsTo(User::class, 'recepient_id');
    }

    public function text(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value),
        );
    }

    protected static function boot(){

        parent::boot();

        static::creating(function($model){
            $model->identifier = Uuid::uuid4()->toString();
        });
    }
}
