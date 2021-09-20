@extends('layouts.welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a booking') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('booking.store')}}" >
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('People') }}</label>
                                <div class="col-md-6">

                                <input type="number" id="persons" name="persons" min="1" max="5">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>
                                <div class="col-md-6">

                                    <select id="course" name="course">
                                        <option value="Green Course">Green Course</option>
                                        <option value="Red Course">Red Course</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tee_time" class="col-md-4 col-form-label text-md-right">{{ __('Tee Time') }}</label>

                                <div class="col-md-6">
                                    <input type="date" name="tee_date" id="tee_date" min="<?= date('Y-m-d'); ?>">
                                    <select class="form-select" size="3" aria-label="size 3 select example">
                                        <option selected>Select a time</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Book') }}
                                    </button>
                                    </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('date').on('change', function() {

            $.get( "/check-availability", { date: this.value }, function( data ) {
                console.log( data );
            });
        });

    </script>
@endsection
