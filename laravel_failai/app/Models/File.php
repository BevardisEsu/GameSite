<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public const TYPES_IMAGE    = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    public const TYPES_DOCUMENT = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'rtf', 'odt'];
    public const TYPES_ARCHIVE  = ['zip', 'rar', '7z', 'tar', 'gz', 'tgz', 'bz2', 'tbz2', 'xz', 'txz', 'iso', 'dmg'];
    public const TYPES_AUDIO    = ['mp3', 'wav', 'ogg', 'wma', 'aac', 'flac', 'alac'];
    public const TYPES_VIDEO    = ['mp4', 'avi', 'wmv', 'mov', 'mkv', 'flv', 'webm', 'vob', 'ogv', 'm4v', '3gp', '3g2'];


    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'extension',
        'size',
        'url',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($value) {
            if (file_exists(public_path($value->path))) {
                unlink($value->path);
            }
        });
    }

}
