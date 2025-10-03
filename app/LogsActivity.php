<?php

namespace App;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    public function logActivity(string $action, string $module, array|string $details = [])
    {
        if (is_string($details)) {
            $details = ['info' => $details];
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action'  => $action,
            'module'  => $module,
            'details' => $details,
        ]);
    }
}
