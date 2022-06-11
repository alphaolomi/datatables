@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>
    {{$dataTable->table()}}
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
