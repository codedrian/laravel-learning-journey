<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function showHome()
    {
        return view('home');
    }
    public function showAbout()
    {;
        return view('about');
    }
    public function showContact()
    {
        return view('contact');
    }
    public function showJob()
    {
        $jobs = [
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
        return view('job', compact('jobs'));
    }

    public function showJobDetails($id)
    {
        $jobs = [
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
        if($id > count($jobs)) {
            return redirect()->back();
        }
        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
        return view('job-details', compact('job'));
    }
}
