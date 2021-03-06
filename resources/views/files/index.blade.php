@extends('layouts.plain')

@section('content')
    <div class="container-fluid no-padding MAIN-FILES-CONTAINER">
        @include('files.partials._top_filter_nav')
        <div class="container no-padding-xs">
            @if($files->isEmpty())
                <p>No files found</p>
            @else
                @foreach($files as $file)
                    <div class="col-xs-12 no-padding FILES-BOX">
                        <a href="/{{ $file->identifier }}">
                            <div class="col-xs-4 col-sm-4 col-md-3 no-padding">
                                <div class="image">
                                    <img class="img-box" src="{{ isset($file->avatar) ? '/images/files/cover/'.$file->avatar : 'images/home/default.png' }}" alt="{{ $file->title }} cover image" />
                                    <span class="label label-success price-tag hidden-xs">{{ $file->price > 0 ? '$' . $file->price : 'Free' }}</span>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-9">
                                <h4>{{ $file->title }}</h4>
                                <div class="price-mobile">{{ $file->price > 0 ? '$' . $file->price : 'Free' }}</div>
                                <p class="hidden-xs">{{ str_limit($file->overview_short, 175) }}</p>
                                <small class="hidden-xs">
                                    <img src="{{ $file->user->avatar ? '/images/avatars/'.$file->user->avatar : '/images/icons/avatar.svg' }}" alt="User avatar" class="user-avatar">
                                    {{ $file->user->name }}
                                </small>
                            </div>
                        </a>
                    </div>
                @endforeach

                {{ $files->appends(request()->input())->links() }}
            @endif
        </div>
    </div>
@endsection