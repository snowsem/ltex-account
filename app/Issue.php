<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function comments() {
        return $this->hasMany(IssueComment::class);
    }
}
