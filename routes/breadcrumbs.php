<?php

use Rawilk\Breadcrumbs\Facades\Breadcrumbs;
use Rawilk\Breadcrumbs\Support\Generator;

// Home
Breadcrumbs::for('home', fn(Generator $trail) => $trail->push('Home', route('home')));

// Home > About
Breadcrumbs::for(
    'about',
    fn(Generator $trail) => $trail->parent('home')->push('About', route('About'))
);

// Home > Users
Breadcrumbs::for(
    'Users',
    fn(Generator $trail) => $trail->parent('home')->push('Users', route('users.index'))
);


// Home > Users > Show
Breadcrumbs::for(
    'users.show',
    fn(Generator $trail, $category) => $trail->parent('Users')->push($category->email, route('users.show', $category->id))
);

// Home > Users > Edit
Breadcrumbs::for(
    'users.edit',
    fn(Generator $trail, $category) => $trail->parent('Users')->push($category->email . '/ Edit', route('users.show', $category->id))
);

// Home > Users > Create
Breadcrumbs::for(
    'users.create',
    fn(Generator $trail, $category) => $trail->parent('Users')->push('Create', route('users.create'))
);

// Home > Users > Register
Breadcrumbs::for(
    'register',
    fn(Generator $trail, $category) => $trail->parent('Users')->push('Register', route('register'))
);

// Home > Users > Login
Breadcrumbs::for(
    'login',
    fn(Generator $trail, $category) => $trail->parent('Users')->push('Login', route('login'))
);


// Home > Companies
Breadcrumbs::for(
    'Companies',
    fn(Generator $trail) => $trail->parent('home')->push('Companies', route('companies.index'))
);


// Home > Blog > [Category]
Breadcrumbs::for(
    'category',
    fn(Generator $trail, $category) => $trail->parent('blog')->push($category->title, route('category', $category->id))
);

// Home > Blog > [Category] > [Post]
Breadcrumbs::for(
    'post',
    fn(Generator $trail, $post) => $trail->parent('category', $post->category)->push($post->title, route('post', $post->id))
);
