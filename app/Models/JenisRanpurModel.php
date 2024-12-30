<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisRanpurModel extends Model
{
    protected $table = 'jenis_ranpur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ranpur'];
}
