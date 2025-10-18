<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Task extends Model
{
    /**
     * ステータス（状態）定義
     * 
     */
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];

    /**
     * ステータス（状態）ラベルのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
    
    /**
     * 状態を表すHTMLクラスのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
