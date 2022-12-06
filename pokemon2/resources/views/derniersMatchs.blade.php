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
                    <th>Date</th>
                    <th>Gagnant</th>
                    <th >Perdant</th>
                    <th >Replay</th>   
                </tr>
            </thead>

            
            <tbody>
                <tr>
                    @foreach ($Matchs as $match)
                        <td> {{$match->created_at}}</td>
                        <td> {{$match->gagnant}}</td>
                        <td> {{$match->perdant}}</td>
                        <td> {{$match->replay}}</td></tr>
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