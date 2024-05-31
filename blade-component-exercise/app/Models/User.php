<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function showJobs(): array
    {
        return [
            [
                'id' => '1',
                'title' => 'King/Queen of Westeros',
                'salary' => '500,000',
                'responsibilities' => 'Rule the Seven Kingdoms, strategic decision-making, diplomacy, maintaining power.'
            ],
            [
                'id' => '2',
                'title' => 'Hand of the King/Queen',
                'salary' => '300,000',
                'responsibilities' => 'Advise the King/Queen, manage the King/Queen’s Small Council, oversee the realm.'
            ],
            [
                'id' => '3',
                'title' => 'Master of Coin',
                'salary' => '200,000',
                'responsibilities' => 'Manage the realm’s finances, collect taxes, oversee the treasury.'
            ],
            [
                'id' => '4',
                'title' => 'Master of Whisperers',
                'salary' => '200,000',
                'responsibilities' => 'Gather intelligence, spy on enemies, maintain a network of informants.'
            ],
            [
                'id' => '5',
                'title' => 'Master of Laws',
                'salary' => '200,000',
                'responsibilities' => 'Interpret and enforce the law, oversee the justice system, advise the King/Queen on legal matters.'
            ], [
                'id' => '6',
                'title' => 'Master of Ships',
                'salary' => '200,000',
                'responsibilities' => 'Oversee the royal fleet, manage naval operations, protect the realm from seaborne threats.'
            ],
            [
                'id' => '7',
                'title' => 'Lord Commander of the Kingsguard',
                /*  'salary' => '200,000',*/
                'responsibilities' => 'Protect the King/Queen, defend the realm, uphold the honor of the Kingsguard.'
            ]
        ];
    }

    public static function findJob($id)
    {
        $jobs = static::showJobs();
        if($id > count($jobs)) {
            throw new ModelNotFoundException('Job not found');
        }
        return Arr::first($jobs, fn($job) => $job['id'] == $id);
    }
}
