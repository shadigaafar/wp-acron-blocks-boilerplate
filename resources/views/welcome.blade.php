@extends('layouts.app')

@section('content')
@blockpart('header')
  <h1>Welcome</h1>
 
  
  @livewire('hero')
   @livewire('post-list')
@endsection
