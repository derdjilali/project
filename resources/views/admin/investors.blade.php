<x-app-layout>
    @section('title')
        {{ 'Investors' }}
    @endsection
    @section('content')
    <h1>Investors</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>

                <th scope="col"> Name </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Region</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($investors as $investor)


            <tr>
                <td>{{$investor->name}}</td>

                <td>{{$investor->email}}</td>
                <td>{{$investor->number}}</td>
                <td>{{$investor->region}}</td>
                <td>
                    @if ($investor->status == false )
                        <a href="{{route('investor.edit',$investor->id)}}">
                            <button type="button" class="btn btn-success">Validate</button>
                        </a>
                    @endif
                    <a href="{{route('investor.show',$investor->id)}}">
                        <button type="button" class="btn btn-primary">View details</button>
                    </a>
                    <form method="post" action="{{route('investor.destroy',$investor->id)}}">
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
