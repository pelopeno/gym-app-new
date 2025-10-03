<?php

namespace App;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    //
    public function logActivity($action, $module, $details = null)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'module' => $module,
            'details' => $details,
        ]);
    }
}
