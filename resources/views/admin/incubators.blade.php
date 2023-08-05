<x-app-layout>
    @section('title')
        {{ 'Incubators' }}
    @endsection
    @section('content')
    <h1>Incubators</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>

                <th scope="col"> Name </th>
                <th scope="col">Wilaya</th>
                <th scope="col">photo</th>
                <th scope="col">Description</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incubators as $incubator)


            <tr>
                <td>{{$incubator->name}}</td>

                <td>{{$incubator->wilaya}}</td>
                <td>{{$incubator->photo}}</td>
                <td>{{$incubator->desc}}</td>
                <td>

                    <a href="{{route('incubator.edit',$incubator->id)}}">
                        <button type="button" class="btn btn-primary">Edit </button>
                    </a>
                    <form method="post" action="{{route('incubator.destroy',$incubator->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>


                </td>
            </tr>


           @endforeach


        </tbody>
    </table>
    <div class="add_btn">
        <a href="{{route('incubator.create')}}">
            <button type="button" class="btn btn-success">+ ADD</button>
        </a>
    </div>

    @endsection

</x-app-layout>
