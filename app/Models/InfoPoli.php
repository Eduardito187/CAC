<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class InfoPoli extends Model{
    protected $table="info_poli";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Escalafon','FechaCreado'];
}
?>