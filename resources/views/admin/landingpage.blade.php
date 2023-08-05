<x-app-layout>
    @section('title')
        {{ 'Landing Page' }}
    @endsection
    @section('content')
    <h1>Landing Page</h1>
    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Title</th>
                <th scope="col">media</th>
                <th scope="col">Description</th>
                <th scope="col">Seting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)

            <tr>
                <td>{{$article->type}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->media}}</td>
                <td>{{$article->desc}}</td>

                <td>
                    <a href="{{route('Landingpage.edit',$article->id)}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <form method="post" action="{{route('Landingpage.destroy',$article->id)}}">
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
            <a href="{{route('Landingpage.create')}}">
                <button type="button" class="btn btn-success">+ ADD</button>
            </a>
        </div>
    @endsection

</x-app-layout>
