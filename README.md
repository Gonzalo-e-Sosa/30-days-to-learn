# 30 days to learn Laravel

I'm going to show you how to study Laravel in 30 days with this course 
[#https://laracasts.com/series/30-days-to-learn-laravel-11]

1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Routing](#routing)
4. [Layouts and Components](#layouts-and-components)
5. [Database](#database)
6. [Migrations](#migrations)
7. [Controllers](#controllers)
8. [Models](#models)
9. [Views](#views)

## Introduction

This is the readme for 30 days to learn Laravel. It covers the basics of Laravel and how to use it in practice.

## Installation

`xampp`
`composer`
`laravel`

## Routing

To create a route in Laravel, use the `Route::get()` method. For example:
```php
Route::get('/contact', function (){
    return view('contact');
})
```
This route return a view to the page `contact.blade.php`.

## Layouts and Components 

To create a layout in Laravel, you can create a `layout.blade.php` file in the `resources/views` folder. To create a component in Laravel, you can create a `component.blade.php` file in the `resources/views/components` folder.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>30 days to learn | Laravel</title>
</head>
<body>
    <!-- Your content here -->
</body>
</html>
```

You can add `{{ $slot }}` to your component to display content in the layout.

```php
<body>
    {{ $slot }}
</body>
```

`{{ $slot }}` is the same as `<?php echo $slot; ?>`
`$slot` is a variable that contains the content of the component.
You can send data to the component in other files. For example: 
`home.blade.php`
```php
<x-layout>
    <h1>Slot data here!</h1>
</x-layout>
```

`<x-layout>` is a special tag to include the `layout.blade.php` file in the component.
Use "x" at the beginning of the tag with "-" and the name of the component -> `<x-component>`

You can use the `@include('folder.component')` directive to add components to the layout. For example: 

```php 
<body>
    @include('components.nav')
    {{ $slot }}
</body>
```

This will include the `nav` component of the `components` folder in the layout.

You can add `{{ $attributes }}` to your component like in React with props

```php
<body 
    {{ $attributes }}
>
    {{ $slot }}
</body>
```

And if you want to add a custom content to yout component you can use `$<name>`

```php	
// components/title.blade.php
<h1>
    {{ $heading }}
</h1>
```

And use like this: 

```php
<x-title>
    <x-slot:heading>
        30 days to learn Laravel
    </x-slot:heading>
</x-title>
```

Creating a `link` component: 

1. create a simple component in the `resources/views/components` folder
2. create a `link.blade.php` file in the `resources/views/components` folder
3. add attributes and slot content
```php
<a {{$attributes}}>
    {{$slot}}
</a>
```

4. use like this:
```php
<x-link href="https://laravel.com">
    Laravel
</x-link>
```

5. Add a custom attribute/prop `active` to your component:

```php
@props(['active' => false])
<a
    class="{{$active ? 'active' : ''}}"
    {{$attributes}}
>
    {{$slot}}
</a>    
```

6. Example with `active` prop:

```php
<x-link
    :active="request()->is('contact')"
    href="https://laravel/contact.com"
>
    Contact
</x-link>
```

Use `:` before the name of the prop to make it reactive(evaluates to `true` or `false`).

If you not add `:` before the name of the prop, it will be always `true` because the prop will be a `string` evaluating to `true`.

7. Be more specific with the `active` prop:

```php
<a
    {{ $attributes->class([
        'default classes',
        'active' => url()->current() === $attributes->get('href'),
    ]) }}
>
    Contact
</a>
```

With this example, the `active` prop will be `true` if the current url is the same as the `href` prop.

For exmple: 

```php
<x-link
    href="https://laravel/contact"
>
    Contact
</x-link>
```

Will add the class `active` to the link if the current url is the same as the `href` prop.

### Custom components <x-nav-link>

This is a custom component for creating navigation links.

You can create a link using the 'a' type or a button using the 'button' type.

The component uses `@props` to accept a 'type' prop which defaults to 'a'.

The component uses `@switch` to switch between the two types:

- In the 'a' type:
  - The `href` attribute is set to the `href` prop or defaults to '#'.
  - The 'active' class is added if the current url is the same as the `href`.
  - The `aria-current` attribute is set to 'page' if active and 'false' if not.

- In the 'button' type:
  - The attributes are passed to the button element.

The component uses `@php` to set the 'href' and 'active' variables.

The component uses `@switch` to switch between the two types.

The component uses `@break` to exit the switch statement.

The component uses `@endswitch` to end the switch statement.

See `resources/views/components/nav-link.blade.php` for implementation.

### Day 6 | View Data and Route Wildcards

Declare an array of jobs with fake data.

```php
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
    ]
];
```

Added a new route to `/jobs` that displays a list of jobs.

`routes/web.php`
```php
Route::get('/jobs', function() use ($jobs){
    return view('jobs', [
            'jobs' => $jobs
        ]
    );
});
```
Important, the `use ($jobs)` means that the `$jobs` variable will be available in the function, if you not use it the compilation will fail.

Use a new directive `@foreach` to iterate each job in the `$jobs` array.
`resources/views/jobs.blade.php`
```php
<x-layout>
    <!-- ... -->
    <section>
            <ul>
                @foreach ($jobs as $job)
                <li>
                    <!-- Content of $job here -->
               </li>
                @endforeach
            </ul>
    </section>
</x-layout>
```

To display each attribute of the job use the `$job['name']` syntax.

```php
<!-- Inside of @foreach -->
<li>
    <h3>{{$job['title']}}</h3>
    <p>{{$job['description']}}</p>
    <span>{{$job['location']}}</span>
    <span>{{$job['salary']}}</span>
    <a href="{{$job['url']}}">Apply Now</a>
</li>
```

Create a dinamic route to display a single job.

`routes/web.php`
```php
Route::get('/jobs/{id}', function($id) use ($jobs){
    $job = \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', [
        'job' => $job
    ]);
});
```

Pay attention to the `{id}` included in the route, it means that the id will be dinamic. For example, if the id is `1` it will be the first job in the array with the route `/jobs/1`. If the id is `2` it will be the second job in the array with the route `/jobs/2`.

To display the data of the job you need to 'find' the job. So to get the scope of `$jobs` include the `use ($jobs)` in the function.
With this you can call the method `Arr:first` to find the job, previously  include the module in the file with the `use Illuminate\Support\Arr;` or just use the `\Illuminate\Support\Arr::first` inline.
`Arr:first` will return the first job in the array that matchs the condition of the `fn`.
`fn` is a callback function that will be executed for each element in the array, like the arrow functions of javascript.
```php
fn($job) => $job['id'] == $id
```
This will return the first job that has the `id` equals to `$id`.

The route returns a view to a new file called `job.blade.php`
```php
return view('job', [
    'job' => $job
]);
```

`resources/views/job.blade.php`
```php
<x-layout>
    <x-slot:heading>
        {{$job['title']}}
    </x-slot:heading>
    <section>
        <h2>{{$job['company']}}</h2>
        <p>{{$job['description']}}</p>
        <span>{{$job['location']}}</span>
        <span>{{$job['salary']}}</span>
        <a href="{{$job['url']}}">Apply Now</a>
    </section>
</x-layout>
```

This will display the data of the `$job` variable using the `layout` previusly defined.
