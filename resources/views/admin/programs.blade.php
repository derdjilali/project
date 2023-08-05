<x-app-layout>
    @section('title')
        {{ 'Programs' }}
    @endsection
    @section('content')
    <h1>
        PROGRAMS
    </h1>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Seting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)


                <tr>
                    <td>{{$program->title}}</td>
                    <td>{{$program->sub_title}}</td>
                    <td>{{$program->desciprtion}}</td>
                   

                    <td>
                        <a href="{{route('programs.edit',$program->id)}}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form method="post" action="{{route('programs.destroy',$program->id)}}">
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
            <a href="{{route('programs.create')}}">
                <button type="button" class="btn btn-success">+ ADD</button>
            </a>

        </div>
    @endsection

</x-app-layout>
