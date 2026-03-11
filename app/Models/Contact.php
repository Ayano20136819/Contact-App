<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'given_name',
        'family_name',
        'nick_name',
        'title',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * List of custom calculated attributes to append to the
     * output from queries, without calling methods to create
     * the required detail.
     *
     * @var string[]
     */
    protected $appends = ['full_name',];

    protected function fullName(): Attribute
    {
        $given = $this->given_name ?? '';
        $family = $this->family_name ?? '';
        return new Attribute(
            get: fn() => Str::trim($given.' '.$family),
        );
    }


//    public function fullname()
//    {
//        $given = $this->given_name ?? '';
//        $family = $this->family_name ?? '';
//        $fullname = Str::trim($given.' '.$family);
//        return $fullname;
//    }

}
