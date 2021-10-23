<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    /**
     * WorkspaceのPartの取得
     */
    public function part()
    {
        return $this->belongsToMany(Part::class, 'part_workspaces');
    }
}
