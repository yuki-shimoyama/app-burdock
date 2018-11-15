<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    /**
    * モデルのルートキーの取得
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'project_name';
    }

    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }
}
