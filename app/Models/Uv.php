<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Uv extends Model{
    protected $table="uv";
    public $timestamps=false;
    protected $fillable = ['ID','UV','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>