@extends('backend.layouts.master')

<!-- title -->
@section('title') Create post @endsection
<!-- end title -->



<!-- primary content -->
@section('content')
<div class="rows">
    @include('backend.layouts.breadcrumb')
</div>


<div class="rows">
    @include('backend.parts.form-create-edit')
</div>


@endsection
<!-- end primary content -->