<x-app-layout>
    @section('title')
        {{ 'Partners' }}
    @endsection
    @section('content')
    <h1>Partners</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Name </th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">Job</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)


            <tr>
                <td>{{$partner->name}}</td>
                <td>{{$partner->email}}</td>
                <td>{{$partner->number}}</td>
                <td>{{$partner->company}}</td>
                <td>{{$partner->job}}</td>
                <td>
                    @if ($partner->status == false )
                        <a href="{{route('partner.edit',$partner->id)}}">
                            <button type="button" class="btn btn-success">Validate</button>
                        </a>
                    @endif
                    <a href="{{route('partner.show',$partner->id)}}">
                        <button type="button" class="btn btn-primary">View details</button>
                    </a>
                    <form method="post" action="{{route('partner.destroy',$partner->id)}}">
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
