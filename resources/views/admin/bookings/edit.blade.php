@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit booking') }}</h1>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="arena_id">{{ __('Nomer Lapangan') }}</label>
                        <select name="arena_id" id="arena_id" class="form-control">
                            @foreach($arenas as $arena)
                                <option {{ $booking->arena->number == $arena->number ? 'selected' : null }} value="{{ $arena->id }}">{{ $arena->number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time_from">{{ __('Jam Mulai') }}</label>
                        <input type="text" class="form-control datetimepicker" id="time_from" name="time_from" value="{{ old('time_from', $booking->time_from) }}" />
                    </div>
                    <div class="form-group">
                        <label for="time_to">{{ __('Jam Selesai') }}</label>
                        <input type="text" class="form-control datetimepicker" id="time_to" name="time_to" value="{{ old('time_to', $booking->time_to) }}" />
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ $booking->status == 'On Proses' ? 'selected' : null }}  value="0">On Proses</option>
                            <option {{ $booking->status == 'Sukses' ? 'selected' : null }}  value="1">Sukses</option>
                            <option {{ $booking->status == 'Batal' ? 'selected' : null }}  value="2">Batal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection


@push('style-alt')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush

@push('script-alt')
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'en',
            sideBySide: true,
            icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
            },
            stepping: 10
        });
    </script>
@endpush