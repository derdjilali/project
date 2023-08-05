<x-app-layout>
    @section('title')
        {{ 'Sponsors' }}
    @endsection
    @section('content')
    <h1>Sponsors</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Name </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">type</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sponsors as $sponsor)


            <tr>
                <td>{{$sponsor->bus_name}}</td>
                <td>{{$sponsor->email}}</td>
                <td>{{$sponsor->number}}</td>
                <td>{{$sponsor->company}}</td>
                <td>{{$sponsor->type}}</td>
                <td>
                    @if ($sponsor->status == false )
                        <a href="{{route('sponsor.edit',$sponsor->id)}}">
                            <button type="button" class="btn btn-success">Validate</button>
                        </a>
                    @endif
                    <a href="{{route('sponsor.show',$sponsor->id)}}">
                        <button type="button" class="btn btn-primary">View details</button>
                    </a>
                    <form method="post" action="{{route('sponsor.destroy',$sponsor->id)}}">
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
