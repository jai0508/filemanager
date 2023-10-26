<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use App\Traits\HasCreateorAndUpdater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory , HasCreateorAndUpdater,NodeTrait , SoftDeletes;

    public function isOwnedBy($userId): bool
    {
        return $this->created_by == $userId;
    }
}
