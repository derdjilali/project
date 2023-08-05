<x-app-layout>
    @section('title')
        {{ 'Coachs' }}
    @endsection
    @section('content')
    <h1>Coachs</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">First name </th>
                <th scope="col">Last Name </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coachs as $coach)


            <tr>
                <td>{{$coach->first_name}}</td>
                <td>{{$coach->last_name}}</td>
                <td>{{$coach->email}}</td>
                <td>{{$coach->number}}</td>

                <td>
                    @if ($coach->status == false )
                        <a href="{{route('coach.edit',$coach->id)}}">
                            <button type="button" class="btn btn-success">Validate</button>
                        </a>
                    @endif
                    <a href="{{route('coach.show',$coach->id)}}">
                        <button type="button" class="btn btn-primary">View details</button>
                    </a>
                    <form method="post" action="{{route('coach.destroy',$coach->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>


                </td>
            </tr>


           @endforeach


        </tbody>
    </table>

    @endsection

</x-app-layout>
