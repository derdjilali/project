<x-app-layout>
    @section('title')
        {{ 'Trainings' }}
    @endsection
    @section('content')
    <h1>
        TRAININGS
    </h1>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Location</th>
                    <th scope="col">Start On</th>
                    <th scope="col">Seting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainings as $trining)


                <tr>
                    <td>{{$trining->title}}</td>
                    <td>{{$trining->desc}}</td>
                    <td>{{$trining->location}}</td>
                    <td>{{$trining->start_on}}</td>


                    <td>
                        <a href="{{route('trainings.edit',$trining->id)}}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form method="post" action="{{route('trainings.destroy',$trining->id)}}">
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
            <a href="{{route('trainings.create')}}">
                <button type="button" class="btn btn-success">+ ADD</button>
            </a>

        </div>
    @endsection

</x-app-layout>
