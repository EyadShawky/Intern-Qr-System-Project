<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport extends Model
{
        protected $users;
    
        public function __construct($users)
        {
            $this->users = $users;
        }
    
        public function collection()
        {
            return $this->users;
        }
    
        public function headings(): array
        {
            return [
                'ID',
                'Name',
      ];
    }
    }
    