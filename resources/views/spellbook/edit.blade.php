@extends('layouts.app')

@section('title', 'Edit Spellbook')

@section('content')
<div>
    <h2>{{ explode("-", $spellBook->file_name)[1]}}</h2>

    @php
    $rows = explode("\n", $spellBook->content);
    $headers = explode(' ', trim($rows[0]));

    // Output headers
    echo '<table class="border">';
        echo '<thead>
            <tr>';
                foreach ($headers as $header) {
                echo '<th>' . $header . '</th>';
                }
                echo '</tr>
        </thead>
        <tbody>';

            // Output content
            for ($i = 1; $i < count($rows); $i++) { $cells=explode(' ', trim($rows[$i]));

        echo ' <tr>';
                foreach ($cells as $cell) {
                echo '<td>' . $cell . '</td>';
                }
                echo '</tr>';
                }

                echo '</tbody>
    </table>';
    @endphp

    <p>{{ $spellBook->content }}</p>
    <p>{!! nl2br($spellBook->content) !!}</p>
</div>
@endsection