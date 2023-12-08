@extends('layouts.app')

@section('content')
<div class="container mx-auto flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <form action="{{ route('spellbooks.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-bold text-gray-700">Upload a PDF:</label>
                <input type="file" name="file" id="file"
                    class="w-full mt-1 p-2 border rounded-md shadow-sm focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full btn btn-primary rounded-md shadow-sm bg-blue-500 hover:bg-blue-600 text-white px-4 py-2">Upload</button>
        </form>
    </div>
</div>
<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Spellbooks</h2>
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b max-w-xs">Title</th>
                <th class="py-2 px-4 border-b max-w-xs">Description</th>
                <th class="py-2 px-4 border-b ">URL</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($spellbooks as $spellbook)
            <tr>
                <td class="py-2 text-sm font-semibold px-4 max-w-xs border-b truncate text-ellipsis overflow-hidden">{{
                    $spellbook->title }}
                </td>
                <td class="py-2 text-sm font-medium px-4 max-w-xs border-b truncate text-ellipsis overflow-hidden">{{
                    $spellbook->description }}</td>
                <td class=" py-2 text-sm px-4 border-b hover:underline text-blue-500">
                    <a href="{{ $spellbook->file_path }}" target="_blank">{{ $spellbook->file_path }}</a>
                </td>
                <!-- Add more table cells as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">SpellBook Preview</h2>
    <div id="spellbook-preview" style="margin-top: 2rem;"
        class="border border-gray-300 rounded-md p-4 h-96 overflow-y-scroll bg-white shadow-md">
        <!-- Add content for spellbook preview here -->
    </div>
</div>


{{-- <form action="{{ route('spellbooks.update', $spellbook) }}" method="post" id="edit-form">
    @csrf
    <input type="hidden" name="fileName" id="fileName" value="">
    <div id="editable-fields">
    </div>
    <button type="submit"
        class="btn btn-primary rounded-md shadow-sm bg-blue-500 hover:bg-blue-600 text-white px-4 py-2">Save
        Spellbook Changes</button>
</form> --}}
</div>

<script>
    // Implement logic to display spellbook preview and handle field edits
</script>

@endsection