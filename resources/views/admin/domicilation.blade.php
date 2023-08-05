<x-app-layout>
    @section('title')
        {{ 'Domicilation' }}
    @endsection
    @section('content')
    <h1>Domicilation</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"> Number</th>
                <th scope="col">wilaya</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domicilations as $domicilation)


            <tr>
                <td>{{$domicilation->name}}</td>
                <td>{{$domicilation->email}}</td>
                <td>{{$domicilation->number}}</td>
                <td>{{$domicilation->wilaya}}</td>

                <td>
                    <a href="{{route('domicilation.show',$domicilation->id)}}">
                        <button type="button" class="btn btn-primary">Show Details</button>
                    </a>
                    <form method="post" action="{{route('domicilation.destroy',$domicilation->id)}}">
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
