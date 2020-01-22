@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit a link</h1>
            <form action="/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection

/** @test */
function guest_can_submit_a_new_link() {}

/** @test */
function link_is_not_created_if_validation_fails() {}

/** @test */
function link_is_not_created_with_an_invalid_url() {}

/** @test */
function max_length_fails_when_too_long() {}

/** @test */
function max_length_succeeds_when_under_max() {}

Verify that valid links get saved in the database
When validation fails, links are not in the database
Invalid URLs are not allowed
Validation should fail when the fields are longer than the max:255 validation rule
Validation should succeed when the fields are long enough according to max:255.