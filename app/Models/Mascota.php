<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mascota extends Model{
    protected $table="mascota";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Raza','Tamanho','Meses','Anho','F_Perfil','F_Frontal','F_Carnet','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>