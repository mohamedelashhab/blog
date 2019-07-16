@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
	    
                <div class="col-md-8 col-md-offset-2">
                    
                    <h1>Create post</h1>
                    
                <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}" />
                        </div>
                        
                        <div class="form-group">
                            <label for="body">Body *</label>
                        <textarea rows="5" id="body" class="form-control" name="body" value="{{ old('body') }}"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <p><span class="require"></span> 
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            </p>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>

                        </div>
                        
                    </form>
                </div>
                
            </div>
</div>
@endsection
