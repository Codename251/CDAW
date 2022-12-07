@extends('template')

@section('style')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" >
    <link href="css/content.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content">
        <table id="myTable"  style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th >Image</th>
                    <th >Energy</th>
                
                </tr>
            </thead>

            
            <tbody>
                <tr>
                   
                    @foreach ($Pokemons as $pokemon)
                        <td> {{$pokemon->id}}</td>
                        <td> {{$pokemon->name}}</td>
                        <td><img src= "{{$pokemon->path}}"></td>
                        <td> {{$pokemon->energy->name}}</td></tr>
                    @endforeach 
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>  
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection