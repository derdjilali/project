<x-app-layout>
    @section('title')
        {{ 'Events' }}
    @endsection
    @section('content')
    <h1>
        EVENTS
    </h1>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">start Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Seting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)


                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->type}}</td>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->description}}</td>
                    <td><img height="300" width="300" src="pictures/events/{{$event->photo}}" alt=""></td>
                    <td>
                        <a href="{{route('events.edit',$event->id)}}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form method="post" action="{{route('events.destroy',$event->id)}}">
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
            <a href="{{route('events.create')}}">
                <button type="button" class="btn btn-success">+ ADD</button>
            </a>
        </div>
    @endsection

</x-app-layout>
