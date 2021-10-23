<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * UserとWorkspaceの中間テーブルのモデル
 */
class UserWorkspaces extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
