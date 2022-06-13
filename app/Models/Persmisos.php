<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Permisos extends Model{
    protected $table="permisos";
    public $timestamps=false;
    protected $fillable = ['ID','Cod1','Cod2','Cod3','Cod4','Cod5','Cod6','Cod7','Cod18','Cod9','Cod10','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>