
@section('styling')
<style>
    h1 {
        text-align: center;
        font-size: 40px;
    }

    .product-form {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group textarea,
    .form-group input[type="number"],
    .form-group input[type="file"],
    select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-top: 5px;
    }

    .form-button {
        background-color: #007bff;
        color: #0069d9;
        border: #0069d9 solid 2px;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.5s ease;
        margin-top: 20px;
    }

    .form-button:hover {
        background-color: #0069d9;
        color: white
    }
</style>
@endsection


<x-app-layout>
    @section('title')
        {{'Add Training'}}
    @endsection
    @section('content')
    <form action="{{route('trainings.store')}}" method="post" enctype="multipart/form-data" class="product-form">
        @csrf
        <h1>ADD TRAINING</h1>
        <div class="form-group">
            <label for="">Title :</label>
            <input type="text" name="title" id="" >
        </div>
        <div class="form-group">
            <label for="">Cover Title :</label>
            <input type="text" name="cover_title" id="" >
        </div>
        <div class="form-group">
            <label for="">Location :</label>
            <input type="text" name="location" id="" >
        </div>
        <div class="form-group">
            <label for="">Diration :</label>
            <input type="text" name="diration" id="" >
        </div>
        <div class="form-group">
            <label for="">Start On :</label>
            <input type="date" name="start_on" id="" >
        </div>
        <div class="form-group">
            <label for="">Description :</label>
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">Cover Image :</label>
            <input type="file" name="cover_img" id="" >
        </div>
        <div class="form-group">
            <label for="">Goals :</label>
            <textarea name="goals" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">Training for :</label>
            <textarea name="training_for" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="">How you will learn  :</label>
            <textarea name="how_learn" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="form-button btn btn-primary">Save</button>
    </form>
@endsection
</x-app-layout>
