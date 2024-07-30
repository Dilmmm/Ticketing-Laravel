<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 't_documents';
    protected $primaryKey = 'id';
    protected $guarded = [''];


   /* public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ID_Ticket');
    }*/
}
