<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'slug',
        'profile_avatar',
    ];

    public $editable = [
        'name' => 'SlugUpdateAfterName',
        'bio'=> null,
        'slug'=> null,
        'profile_avatar'=> null,
    ];

    static $profile_avatar_path = "public/artist_avatars/";

    public function musicEvents() {
        return $this->hasMany(MusicEvent::class);
    }

    public function handleProfileAvatar($file) {

        $filename = 'artist_' .$this->id . '.' . $file->getClientOriginalExtension();
        $file->storeAs(self::$profile_avatar_path, $filename);
        $this->profile_avatar = $filename;
        $this->save();
    }

    public function getProfileAvatar() : string {
        return Storage::url(self::$profile_avatar_path . $this->profile_avatar);
    }
}
