<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table ='t_ticket';


    protected $primaryKey = 'ID_Ticket';
    protected $guarded = [''];
    protected $dates = [''];

    public function document()
    {
        return $this->hasMany(Document::class, 'id_Ticket');
    }

}
