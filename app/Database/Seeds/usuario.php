<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
class usuario extends Seeder
{
    public function run()
    {
        $usuario = "admin";
        $password = password_hash("123", PASSWORD_DEFAULT);
        $type = "admin";

        $data = [
            'name' => $usuario,
            'contraseña' => $password
        ];
        $this->db->table('usuario')->insert($data);
    }
}