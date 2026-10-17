<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'body', 'status', 'post_id'];

    public function post() :BelongsTo{
        return $this->belongsTo(Post::class);
    }
    public function smartTime(Carbon $t){
        $totalMinutes = $t->diffInMinutes(now());
        $totalHours = intdiv($totalMinutes, 60);
        if($totalHours < 1)
            {
                return intval($totalMinutes).'m';
            }
        $dayCount = $totalHours / 24;
        if($dayCount >= 1)
            {
                return intval($dayCount).'d';
            }
        return $totalHours.'h';

    }
}
