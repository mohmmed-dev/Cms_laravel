@extends('layouts.dashboard')

@section('title',__('Permission'))

@section('content')
    @livewire('permission', ['permissions' => $permissions])
@endsection
