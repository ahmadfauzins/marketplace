@extends('account.layouts.default')

@section('account.content')
    <div class="ACCOUNT-FILE-FORM">
        <div class="HEADER-BOX">
            make changes to: {{ $file->title }}
        </div>
        <div class="col-sm-12 no-padding YOUR-FILE-BOX">

            @if($approvals)
                @include('account.files.partials._changes', compact('approval'))
            @endif

            <form action="{{ route('account.files.update', $file) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="hidden" name="live" value="0">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="live" id="live" {{ $file->live ? ' checked' : '' }} value="1">
                       Live
                    </label>
                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $file->title }}" autofocus placeholder="Title">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('overview_short') ? ' has-error' : '' }}">
                    <textarea class="form-control" id="overview_short" name="overview_short" rows="3" style="height: auto;" placeholder="Short Overview">{{ old('overview_short') ? old('overview_short') : $file->overview_short }}</textarea>
                    @if ($errors->has('overview_short'))
                        <span class="help-block">
                            <strong>{{ $errors->first('overview_short') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') ? old('price') : $file->price }}" placeholder="Price">
                    @if ($errors->has('price'))
                        <span class="help-block">
                   <strong>{{ $errors->first('price') }}</strong>
               </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('overview') ? ' has-error' : '' }}">
                    <textarea class="form-control" name="overview" id="overview" rows="6" style="height: auto;" placeholder="Overview">{{ old('overview') ? old('overview') : $file->overview }}</textarea>
                    @if ($errors->has('overview'))
                        <span class="help-block">
                            <strong>{{ $errors->first('overview') }}</strong>
                        </span>
                    @endif
                </div>

                <br />

                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

                <div class="col-sm-12 no-padding">
                    <small class="pull-right">Your file changes may be subject to review.</small>
                </div>
            </form>
        </div>
    </div>
@endsection