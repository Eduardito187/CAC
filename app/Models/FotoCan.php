<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FotoCan extends Model{
    protected $table="foto_can";
    public $timestamps=false;
    protected $fillable = ['ID','Foto','Can','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>