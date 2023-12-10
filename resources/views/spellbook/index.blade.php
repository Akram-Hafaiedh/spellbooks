@extends('layouts.app')

@section('title', 'SpellBooks')

@section('content')
<div x-data="{ showModal :false ,  selectedSpellBook: '', spellbookToDelete: null}" x-cloak class="container mx-auto">

    <!-- Create Spellbook-->
    <div class="flex items-center justify-center ">
        <div class="w-full max-w-md p-8 bg-white shadow-xl rounded-xl">
            <form action="{{ route('spellbooks.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-sm font-bold text-gray-700">Upload a PDF:</label>
                    <input type="file" name="file" id="file"
                        class="w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-500 rounded-md shadow-sm btn btn-primary hover:bg-blue-600">Upload</button>
            </form>
        </div>
    </div>

    <!-- Spelbook listings-->
    <div class="relative mt-8 overflow-x-auto">
        <h2 class="mb-4 text-2xl font-bold">PDFs</h2>
        <table class="w-full text-sm !text-left bg-white border border-gray-300 rounded-md sm:min-w-full">
            <thead class="text-white bg-gray-700">
                <tr>
                    <th scope="col" class="max-w-xs px-4 py-2 border-b">ID</th>
                    <th scope="col" class="max-w-xs px-4 py-2 border-b">File Name</th>
                    <th scope="col" class="max-w-xs px-4 py-2 border-b">Created</th>
                    <th scope="col" class="max-w-xs px-4 py-2 border-b">Updated</th>
                    <th scope="col" class="w-10 px-4 py-2 border-b">Actions</th>
                    {{-- <th class="px-4 py-2 border-b ">URL</th> --}}
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($spellbooks as $spellbook)
                <tr id={{ $spellbook->id }} class="spellbook-row hover:bg-gray-200 hover:cursor-pointer"
                    {{-- @click="selectedSpellBook = '{{ $spellbook->file_name}}';console.log(selectedSpellBook)"
                    --}}
                    >
                    @php
                    $parts = explode('-', $spellbook->file_name);
                    $filenameAfterDash = $parts[1];
                    // echo $spellbook->file_name;
                    @endphp
                    <td
                        class="max-w-xs px-4 py-2 overflow-hidden text-sm font-semibold truncate border-b text-ellipsis">
                        {{$spellbook->id}}
                    </td>
                    <td
                        class="max-w-xs px-4 py-2 overflow-hidden text-sm font-semibold truncate border-b text-ellipsis">
                        {{
                        $filenameAfterDash}}
                    </td>
                    <td class="max-w-xs px-4 py-2 overflow-hidden text-sm font-medium truncate border-b text-ellipsis">
                        {{
                        $spellbook->created_at->format('Y-m-d') }} At {{
                        $spellbook->updated_at->format('H:m:s') }}
                    </td>
                    <td class="max-w-xs px-4 py-2 overflow-hidden text-sm font-medium truncate border-b text-ellipsis">
                        {{
                        $spellbook->updated_at->format('Y-m-d') }} At {{
                        $spellbook->updated_at->format('H:m:s') }}
                    </td>

                    <td class="flex items-center px-4 py-2 space-x-2 text-sm text-blue-500 border-b ">
                        <span @click="showModal = true; spellbookToDelete = {{ $spellbook->id }};"
                            class="cursor-pointer material-symbols-outlined hover:underline">
                            delete
                        </span>
                        <a href="{{ route('spellbooks.edit', ['spellbook' => $spellbook]) }}"
                            class="cursor-pointer material-symbols-outlined hover:underline">
                            edit
                        </a>
                        {{-- <a href="{{ $spellbook->file_path }}" target="_blank">{{ $spellbook->file_path }}</a>
                        --}}
                    </td>
                    <!-- Add more table cells as needed -->
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Content for Delete -->
    <div x-show="showModal" @click.away="showModal = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="max-w-md p-4 mx-auto bg-white rounded-md shadow-lg">
            <div class="mb-4 text-xl font-bold">{{ __('Confirmation') }}</div>
            <p class="mb-4" x-text="'Are you sure you want to delete the spellbook ' + spellbookToDelete + '?'"></p>
            <div class="flex justify-end space-x-2">
                <button @click="showModal = false"
                    class="px-4 py-2 text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400">{{ __('Cancel')
                    }}</button>
                <form :action="`/spellbooks/${spellbookToDelete}`" method="post">
                    @csrf
                    @method('DELETE')
                    {{-- <script>
                        console.log('Form action:', `/spellbooks/${spellBookToDelete}`);
                    </script> --}}
                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">{{
                        __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>

    <!-- spellbook preview -->
    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-bold">PDF Preview</h2>
        <div id="spellbook-preview" style="margin-top: 2rem;"
            class="p-4 overflow-y-scroll bg-white border border-gray-300 rounded-md shadow-md h-96">
            <p class="font-bold text-center" x-text="selectedSpellBook"></p>
            <p class="font-bold text-center" x-show="selectedSpellBook === ''">No PDF selected</p>

            {{-- <iframe x-blind:src="" frameborder="0" style="width: 100%; height: 100%;"></iframe> --}}
            <iframe x-bind:src="selectedSpellBook ? '/storage/spellbooks/' + selectedSpellBook : ''"
                style="width: 100%; height: 100%;" frameborder="0">
            </iframe>
            {{-- <iframe :src="{{ asset ('/storage/spellbooks/1702125733-data.pdf') }}" frameborder="0"
                style="width: 100%; height: 100%;"></iframe>
            <p>No PDF Selected.</p> --}}
            <!-- Add content for spellbook preview here -->
        </div>
    </div>

</div>

</div>

<script>

</script>

@endsection