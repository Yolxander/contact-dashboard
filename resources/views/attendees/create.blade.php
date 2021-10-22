<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Attendee') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-b border-gray-200 flex justify-center r">


                    <form action="{{ route('attendees.store') }}" method="POST" class="w-3/6">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" placeholder="first name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" placeholder="last name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" name="email" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Member Since</strong>
                                    <input type="date" name="member_since" class="form-control"
                                           placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Approved</strong>
                                    <br>
                                    <input name="approved" type="radio" value="1"/> True
                                    <input name="approve" type="radio" value="0"/> False
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $("#datepicker").datepicker();
            });
        </script>
    @endpush

</x-app-layout>
