<?php
namespace App\Models;

use CodeIgniter\Model;
$db = \Config\Database::connect();
class UserModel extends Model
{
  protected $table = 'usuario';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['name', 'email', 'contraseña'];

  public function getUsersSkills($id_user = null)
  {
    $where_user = "";
    if ($id_user !== null) {
      $where_user = "WHERE usuario.id = " . $id_user;
    }
    $sql = "SELECT
        usuario.id as id,
        usuario.name as nombre,
        usuario.email as email,
        usuario_data.birth_date as fecha_nacimiento,
      habilidades.name as habilidad
     FROM
     usuario
     INNER JOIN
     usuario_data ON usuario.id = usuario_data.user
     INNER JOIN
     habilidades_usuarios ON usuario.id = habilidades_usuarios.user
     INNER JOIN
     habilidades ON habilidades_usuarios.skill = habilidades.id " .
      $where_user .
      " ORDER BY 
      usuario.name
       ;";

    return $this->query($sql)->getResult();
  }
  public function validaciondatos($nombre)
  {
    $sql = "SELECT * FROM usuario WHERE name='$nombre'";
    $query = $this->query($sql)->getResult();
    $contar = count($query);
    
    if ($contar > 0) {
?>
<div class="alert alert-info">
  <strong>Info!</strong> the account is already registered
</div>
<?php
    }
    return $contar;

  }
  public function registrardatos($username,$contraseña,$useremail){
    //$sql = "INSERT INTO usuario (name, email, contraseña ) VALUES ($username,$useremail,$contraseña)";
    //$this->db->query($sql);

    $sql2 = "SELECT id FROM usuario WHERE name='$username'";
    return $this->query($sql2)->getResult();
  }
  public function rescatarUser($id_user)
  {
    $sql = "SELECT name FROM usuario WHERE id='$id_user'";
    return $this->query($sql)->getResult();
    
  }
  public function obtenerUsuario($data){
    $Usuario = $this->db->table('usuario');
    $Usuario->where($data);
    return $Usuario->get()->getResultArray();
  }
  
}