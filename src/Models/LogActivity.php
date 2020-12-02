<?php

namespace Bpocallaghan\LogActivity\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogActivity extends Model
{
    protected $table = 'log_activities';

    protected $guarded = ['id'];

    /**
     * Get the subject of the activity.
     *
     * @return mixed
     */
    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * Fetch the user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the latest activities on the site
     * @param int $limit
     * @return mixed
     */
    public static function getLatest($limit = 200)
    {
        return self::with('subject')->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    /**
     * Get the latest activities on the site
     * @param int $minutes
     * @return mixed
     */
    public static function getLatestMinutes($minutes = 24 * 60)
    {
        $date = Carbon::now()->subMinutes($minutes);

        return self::where('created_at', '>=', $date)->orderBy('created_at', 'DESC')->get();
    }
}
