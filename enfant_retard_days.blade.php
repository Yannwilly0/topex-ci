
  
  
@extends('parent.parent_nav')

@section('content')
<div class="container-fluid">
    <div class="row">
       
       
       <div class="col-md-12">


            <div class="container py-5 card">
              <P>{{$data['enfant']->nom}} {{$data['enfant']->prenom}} {{$data['enfant']->classroom}}</P>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link " href="{{'/parent/enfant/'.$data['id'].'/presence'}}">Résumé des présences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{'/parent/enfant/'.$data['id'].'/absences'}}">Jours d'absence</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{'/parent/enfant/'.$data['id'].'/retards'}}">Retards</a>
                    </li>
                    
                </ul>
                
                <!--table-->
                <div class="container mt-4">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            
                            <th scope="col" class="text-danger">Retards</th>
                            <th scope="col">Voir</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['attendances'] as $attendance)
                            @if($attendance->retards >0)
                              <tr>
                                <td>{{$attendance->date}}</td>
                                <td>{{$attendance->total}}</td>
                              
                                <td class="text-danger">{{$attendance->retards}}</td>
                                <td ><i class="fa fa-file voir details" aria-hidden="true" data-id="{{$data['id']}}" data-attnd="{{$attendance->date}}"></i></td>
                              </tr>
                            @endif
                          @endforeach
                          
                        </tbody>
                    </table>
                    <div class="container text-center ">
                        {{$data['attendances']->links()}}
                    </div>
                </div>
                
            </div>

            
            <!--col end-->
        </div> 
       
    </div>
    <!--spinner -->
    <div id='spinner' class="loader"><img src="{{asset('images/spinner.gif')}}"/></div>
    <!-- Modal -->
   <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog modal-lg">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
     </div>
    </div>
   </div>

</div>
<script type="text/javascript">
    $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
   $(document).ready(function(){
     
    $("#spinner").hide();
        $('.details').click(function(){
        $(this).prop('disabled', true);
        var stud_id = $(this).data('id');
        var attnd_id = $(this).data('attnd');

        // AJAX request
            $.ajax({
            url: "{{ route('enfant.retard.day') }}",
            type: 'post',
            data: {stud_id: stud_id,attnd_id:attnd_id},
            success: function(response){ 
                
                $('.modal-body').html(response);

                $('#empModal').modal('show'); 
            },
            beforeSend: function() {
                    $("#spinner").show();
                },
                // hides the loader after completion of request, whether successfull or failor.             
                complete: function() {
                    $("#spinner").hide();
                },
            });
        });
});
</script>
   

@endsection

