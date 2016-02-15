@extends('app')


@section('content')

<link rel="stylesheet" href="{{asset('css/react-quill-snow.css')}}"/>
<div class="container-fluid" style="height:88%">
	<div class="row" style="height:100%">
        <div id="render" style="height: 100%"></div>
	</div>
</div>
<script src="{{asset('dist/bundle.js')}}"></script>
@endsection
