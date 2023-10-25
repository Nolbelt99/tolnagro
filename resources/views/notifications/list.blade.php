@extends('layouts.app')
@section('title')
    Értesítések lista
@endsection
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
@endsection
@section('content')
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Címzett</th>
                <th>Kiküldve</th>
            </tr>
        </thead>
        <tbody>
            @if ($notifications->count() == 0)
                <tr>
                    <td colspan="3">Nincs megjelenítendő adat.</td>
                </tr>
            @endif
            @foreach ($notifications as $notification)
                <tr>
                    <td>
                        {{ $notification->id }}
                    </td>
                    <td>
                        {{ $notification->email }}
                    </td>
                    <td>
                        {{ $notification->created_at }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td class="text-right" colspan="3">Összesen: {{ $sum }} db</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $notifications->appends(Request::except('page'))->links('pagination::bootstrap-4') !!}
    </div>
@endsection
