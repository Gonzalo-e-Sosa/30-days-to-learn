<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
    ]);
});

$jobs = [
    [
        'id' => 1,
        'title' => 'Laravel Developer',
        'company' => 'Laravel',
        'location' => 'Remote',
        'description' => 'Full-time position for full-stack developers',
        'salary' => '$50000',
        'url' => 'https://laravel.com',
        'date' => '2022-01-01'
    ],
    [
        'id' => 2,
        'title' => 'PHP Developer',
        'company' => 'PHP',
        'location' => 'Remote',
        'description' => 'Maintain and develop websites and web applications.',
        'salary' => '$40000',
        'url' => 'https://php.net',
        'date' => '2022-01-01'
    ],
    [
        'id' => 3,
        'title' => 'Frontend Developer',
        'company' => 'Frontend',
        'location' => 'Remote',
        'description' => 'Develop websites and web applications.',
        'salary' => '$30000',
        'url' => 'https://frontend.com',
        'date' => '2022-01-01'
    ]
];

Route::get('/jobs', function() use ($jobs){
    return view('jobs', [
            'jobs' => $jobs
        ]
    );
});

Route::get('/jobs/{id}', function($id) use ($jobs){
    $job = \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', [
        'job' => $job
    ]);
});