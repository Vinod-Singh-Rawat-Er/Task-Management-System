@extends('admin.base.base')
@section('content')
<section class="content">
  <div class="container-fluid">
    <a href="{{ route('addActivity')}}" class="btn btn-outline-primary">Add Activity</a><hr>
    <div class="row">
        <table  id="myTable" style="width:100%" class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">About</th>
              {{-- <th scope="col">link</th> --}}
              <th scope="col">Image</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $activities as $slider)
            <tr>
                <td scope="col">1</td>
                <td scope="col">{{$slider->name}}</td>
                <td scope="col">{!! $slider->about !!}</td>
                {{-- <td scope="col"></td> --}}
                <td scope="col"> 
                  <a class="btn btn-info" href="{{  route('activite_image',['id'=>$slider->id])}}"  data-toggle="tooltip" data-placement="top" title="View/edit Image">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
                <td scope="col" class="status">
                    @if($slider->status == 2)
                      <span class="badge bg-success">Publish</span> 
                    
                    @else
                      <span class="badge bg-danger">Unpublish</span>
                    @endif
                   
                </td>
                <td scope="col">
                  @if ($slider->status == 2)
                    <button class="btn btn-danger statusBtn" bind-id="{{$slider->id}}" bind-data="1"> <i class="fas fa-eye"></i>  </button>
                  @else
                    <button class="btn btn-success statusBtn" bind-id="{{$slider->id}}" bind-data="2"> <i class="fas fa-eye-slash"></i> </button>
                  @endif
                  
                  <a class="btn btn-info" href="{{ route('editActivity',['id'=>$slider->id])}}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a class="btn btn-danger" href="{{ route('deleteSlider',['id'=>$slider->id])}}">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>  
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</section>
@endsection
@section('script')
@parent
<script>
   $(".statusBtn").click(function(event) {
      /* Act on the event */
      let ref = this;
      status_value = $(this).attr('bind-data');
      var status_text ="Unpublish";
      var status = 2;
      var delClass ='bg-success';
      var addClass ="bg-danger";
      if(status_value == 2){
        status_text ="Publish";
        status = 1;
        var addClass ='bg-success';
        var delClass ="bg-danger";
      }
      id =$(this).attr('bind-id');
      $.ajax({
        url: "{{ route('changeSatus')}}",
        type: 'POST',
        dataType: 'HTML',
        data: {
                tableName: 'activities',
                fieldName:'status',id:id,value:status_value,
                "_token": "{{ csrf_token() }}",
              },
      })
      .done(function() {
        $(ref).attr('bind-data',status);
        $(ref).parent().siblings('.status').find('.badge').html(status_text);
        $(ref).parent().siblings('.status').find('.badge').removeClass(delClass);
        $(ref).parent().siblings('.status').find('.badge').addClass(addClass);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });
</script>
@endsection