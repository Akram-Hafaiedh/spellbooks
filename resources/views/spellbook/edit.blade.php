@extends('layouts.app')

@section('title', 'Edit')

@section('content')
<div class="mt-8">
    @php
        echo($spellBook)
    @endphp
    <h2>{{ $spellBook->file_name }}</h2>
    <p>{{ $spellBook->content }}</p>
</div>

@endsection
<script>

</script>
