@extends('layouts.app')

@section('content')
@blockpart('header')
  <h1>Welcome</h1>
 
  <p>You do not need this at all if you were planing to make only Wordpress blocks.
    Just go to Editor and add your blocks there. This is just an example of how you can use Acorn to make a custom page template with Livewire components.
  </p>
  @livewire('hero')
  @livewire('post-list')
@endsection
