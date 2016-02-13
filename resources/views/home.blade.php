@extends('app')


@section('content')

<link rel="stylesheet" href="{{asset('css/react-quill-snow.css')}}"/>
<style>
    .quill-toolbar.ql-toolbar.ql-snow{
        border-bottom: 1px solid #ccc !important;
    }
</style>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
            <div id="render"></div>
		</div>
	</div>
</div>
<script src="http://localhost:8000/static/appsMenu.js"></script>
@endsection
