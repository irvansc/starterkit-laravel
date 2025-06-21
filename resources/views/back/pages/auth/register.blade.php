@extends('back.layouts.pages-auth')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Register')
@section('content')
@livewire('back.register-form')
@endsection