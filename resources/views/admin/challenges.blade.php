<x-app-layout>
    @section('title')
        {{ 'Challenges' }}
    @endsection
    @section('content')
    <h1>Challenges</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Link</th>
                <th scope="col">Start Date</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($challenges as $challenge)


            <tr>
                <td>{{$challenge->title}}</td>
                <td>{{$challenge->link}}</td>
                <td>{{$challenge->start_date}}</td>
                <td><img height="300" width="300" src="pictures/challenges/{{$challenge->photo}}" alt=""></td>
                <td>{{$challenge->description}}</td>

                <td>
                    <a href="{{route('challenges.edit',$challenge->id)}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <form method="post" action="{{route('challenges.destroy',$challenge->id)}}">
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
            <a href="{{route('challenges.create')}}">
                <button type="button" class="btn btn-success">+ ADD</button>
            </a>
        </div>
    @endsection

</x-app-layout>
