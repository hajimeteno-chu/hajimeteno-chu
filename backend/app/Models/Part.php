<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    /**
     * このPartを使用しているWorkspaceの取得
     */
    public function workspace()
    {
        return $this->belongsToMany(Workspace::class, 'part_workspaces');
    }
}
