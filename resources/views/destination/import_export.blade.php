@extends('layouts.backend')
@section('content')

<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Import  Category</a>
			</div>
		</div>
	</nav>
	<div class="container">
	
		<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('destination/import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		@csrf
		@if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
		@if (session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
							<label for="">Import File to Data Category</label><br>
							<label for="">File (.xls dan .xlsx)</label>
			<input type="file" name="file"  required="required"/>    <p class="text-danger">{{ $errors->first('file') }}</p>
			<br>
                                <button class="btn btn-primary btn-sm">Upload</button>
                
		</form>
	</div>
	@endsection