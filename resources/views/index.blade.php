@extends('partials.layout')

@section('content')
    <div class="title">NEVTIK REGISTRATION</div>

    <div class="card-container">
        @foreach($posts as $post)
            <a href="{{ $post->link }}" class="{{ $post->status == 'open' ? '' : 'link-disabled' }}">
                <div class="card {{ $post->status }}">
                    <div class="card-image">
                        <img src="{{ $post->image }}" alt="{{ $post->name }}" />
                    </div>
                    <div class="card-details">
                        <div class="card-title">
                            {{ $post->name }} <span class="muted">(SMKN 1 Cibinong Only)</span>
                        </div>
                        <div class="due">
                            <span class="thin">Due : {{ $post->due }}</span>
                        </div>
                    </div>
                    <div class="button {{ $post->status == 'open' ? '' : 'disabled' }}">
                        {{ ucfirst($post->status) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
