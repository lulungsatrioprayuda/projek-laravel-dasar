@extends('layouts.master')
@section('title', 'Projek Laravels')
@push('css')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@endpush
@section('content')
        <div class="section-body">
            isi content ada di sini
        </div>
@endsection
@push('page-scripts')
    <script>
        console.log('hellow');
    </script>
@endpush