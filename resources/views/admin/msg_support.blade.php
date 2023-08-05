<x-app-layout>
    @section('title')
        {{ 'Support Messages' }}
    @endsection
    @section('content')
    <h1>Support Messages</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">From </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">message</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($msgs as $msg)


            <tr>
                <td>{{$msg->name}}</td>
                <td>{{$msg->email}}</td>
                <td>{{$msg->number}}</td>
                <td>{{$msg->message}}</td>

                <td>

                    <form method="post" action="{{route('supportmsg.destroy',$msg->id)}}">
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
