<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Attendee Dashboard') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <a class="inline-block border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white" href="{{ route('attendees.create') }}">Add Attendee</a>
                    </div>
                    <table class="table table-dark">

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Member Since</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendees as $attendee)
                        <tr>
                            <th scope="row">{{ $loop->iteration  }}</th>
                            <td>{{ $attendee->first_name }}</td>
                            <td>{{ $attendee->last_name }}</td>
                            <td>{{ $attendee->member_since}}</td>

                            @can('delete attendees')
                            <td>
                                <form action="{{ route('attendees.destroy',$attendee->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
