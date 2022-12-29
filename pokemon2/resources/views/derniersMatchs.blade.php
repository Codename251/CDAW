@extends('template')

@section('style')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" >
    <link href="css/content.css" rel="stylesheet" />
    <link href="css/modal.css" rel="stylesheet" />
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
                    <?php $counter = -1 ?>
                    @foreach ($Matchs as $match)
                        <td> {{$match->created_at}}</td>
                        <td> {{$match->gagnant}}</td>
                        <td> {{$match->perdant}}</td>
                        <td>  <?php $replayTab = explode(".", $match->replay);  
                                    $stringReplay = "";           
                                    for($i = 0, $size = count($replayTab); $i < $size; ++$i) {
                                        $stringReplay = $stringReplay . strval($replayTab[$i]);
                                        $stringReplay = $stringReplay . '\n';
                                    }

                                    $counter += 1;
                                 
                                ?>

                            <button class="myBtn" onclick ="showModal({{$counter}})"> Replay </button>
                            <div class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">

                                    <button class="closeButton" onclick ="closeModal()"> x </button>
                                    
                                    <p>@foreach ($replayTab as $phrase)
                                        <p> {{$phrase}} <br></p>
                                         @endforeach</p>
                                </div>

                            </div>
                            </td></tr>
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

    <script>
                // Get the modal
        var modal = document.getElementsByClassName("modal");

        var index = -1;

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close");

        // When the user clicks on the button, open the modal
        function showModal(counter) {
            modal[counter].style.display = "block";
            index = counter;
        }

        function closeModal() {
            console.log("close croix");
            modal[index].style.display = "none";
        }

        

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal[index]) {
            modal[index].style.display = "none";
        }
        }
    </script>

        <!-- @foreach ($replayTab as $phrase)
            <p> {{$phrase}} <br></p>
        @endforeach  -->
@endsection