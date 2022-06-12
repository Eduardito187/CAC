<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Canton extends Model{
    protected $table="canton";
    public $timestamps=false;
    protected $fillable = ['ID','Canton','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>