@extends('admin.main')
@section('title')
    <title>Investee list</title>
@endsection
@section('main-content')
<!--Edit Investee Modal -->
<div class="modal fade" id="investeeEditModal" tabindex="-1" role="dialog" aria-labelledby="investeeEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Investee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="c;pse">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <input type="hidden" name="investerId" id="invester-hidden-id">
  
          <div class="form-group">
            <label for="name">Name</label>
            <input type="email" class="form-control" id="name" aria-describedby="Investee name" readonly>
          </div>
  
  
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="Investee email" readonly>
          </div>
  
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status">
              <option value="pending">Pending</option>
              <option value="approved">Approved</option>
              <option value="reject">Reject</option>
            </select>
          </div>
  
  
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update-invester">Update changes</button>
        </div>
      </div>
    </div>
  </div>
  


<table class="table align-middle gs-0 gy-4" id="investee-list">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bolder text-muted bg-light">
            <th class="ps-4 min-w-325px rounded-start">Name</th>
            <th class="min-w-200px">Email</th>
            <th class="min-w-150px">Status</th>
            <th class="min-w-200px rounded-end">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
@section('script')
<script>
    window.onload = function(){
        (function(){
            loadTable();
        })()

    }

    $(document).on("click" , ".close" , function(e){
        $("#investeeEditModal").modal("toggle");
    })


    $(document).on("click" , ".delete-invester" , function(e){
        let investerId = this.dataset.investerId;

        Swal.fire({
                title: 'Are you sure?',
                text: 'All the data will be remove related to this Invester',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url : '{{route("admin.delete.invester")}}',
                    type : "POST",
                    data : {
                      _token : "{{csrf_token()}}",
                      investerId : investerId
                    },
                    success : function(res){
                      if(res.success == true)
                      {
                        loadTable();
                      }else{
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.msg,
                            })
                      }
                    }
                  })
                }
            });
    })


    $(document).on('click' , '.edit-invester' , function(e){
        investeeId = this.dataset.investerId;
        $.ajax({
            type : 'POST',
            url : '{{route("admin.get.user.detail")}}',
            data : {
                _token : "{{csrf_token()}}",
                id : investeeId
            },
            success : function(res){
                if(res.success == true)
                {
                    let user = res.user;
                    document.getElementById("invester-hidden-id").value = user.id;
                    document.getElementById("name").value = user.name;
                    document.getElementById("email").value = user.email;
                    $("#investeeEditModal").modal("toggle");
                }else{
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.msg,
                        })
                }
            }
        })
    })


    $(document).on("click" , "#update-invester" , function(e){
        let investerId = document.getElementById("invester-hidden-id").value;
        let status = document.getElementById("status").value;
        $.ajax({
            type : "POST",
            url :  "{{route('admin.update.invester')}}",
            data : {
                _token : "{{csrf_token()}}",
                investerId : investerId,
                status : status
            },
            success : function(res){
                if(res.success == true)
                {
                    Swal.fire({
                                icon: 'success',
                                title: 'Invester updated successfully',
                            })
                    loadTable()
                    $("#investeeEditModal").modal('toggle')
                }else{
                    Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.msg,
                            })
                }
            }
        })
    })


    function loadTable()
        {
        $("#investee-list").DataTable({
                    processing: true,
                    serverSide: true,
                    pagingType: 'full_numbers',
                    "bDestroy": true,
                    ajax : {
                        type : 'POST',
                        url : '{{ route('admin.invester.list') }}',
                        data : {
                            _token : "{{csrf_token()}}"
                        }
                    },
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action' },
                    ]
                });
        }

    //script ends here
</script>
@endsection