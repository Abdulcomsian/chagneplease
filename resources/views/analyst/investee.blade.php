@extends('analyst.main')
@section('title')
    <title>Investee</title>
@endsection
@section('main-content')
<div class="dash_table_text">
    <h3>Investees</h3>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae
      dictum congue viverra bibendum.
    </p>
  </div>
  <div class="sortBy d-flex justify-content-end">
    <label for="sort">Sort By:</label>
    <select name="sort" id="sort">
      <option value="1">Newest</option>
      <option value="2">Oldest</option>
    </select>
  </div>
  <!-- =========== table tabs ========== -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button
        class="nav-link active investee-btn"
        id="home-tab"
        data-investee-type="all"
        data-bs-toggle="tab"
        data-bs-target="#home"
        type="button"
        role="tab"
        aria-controls="home"
        aria-selected="true"
      >
        All
      </button>
    </li>
    {{-- <li class="nav-item" role="presentation">
      <button
        class="nav-link investee-btn"
        data-investee-type="approved"
        id="profile-tab"
        data-bs-toggle="tab"
        data-bs-target="#profile"
        type="button"
        role="tab"
        aria-controls="profile"
        aria-selected="false"
      >
        Approved
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link investee-btn"
        data-investee-type="reject"
        id="contact-tab"
        data-bs-toggle="tab"
        data-bs-target="#contact"
        type="button"
        role="tab"
        aria-controls="contact"
        aria-selected="false"
      >
        Rejected
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link investee-btn"
        data-investee-type="pending"
        id="contact-tab"
        data-bs-toggle="tab"
        data-bs-target="#contact"
        type="button"
        role="tab"
        aria-controls="contact"
        aria-selected="false"
      >
        Pending
      </button>
    </li> --}}
    {{-- <li class="nav-item" role="presentation">
      <button
        class="nav-link"
        id="report-tab"
        data-bs-toggle="tab"
        data-bs-target="#report"
        type="button"
        role="tab"
        aria-controls="report"
        aria-selected="false"
      >
        Complete Report
      </button>
    </li> --}}
  </ul>
  <div class="tab-content" id="myTabContent">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div class="table-responsive dash_table my-2">
        <table class="table caption-top" id="investee-list">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              {{-- <th scope="col">Status</th> --}}
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            {{-- <tr>
              <td>
                John Doe
                <span class="badge rounded-pill bg-primary">New</span>
              </td>
              <td>johndoe@gmail.com</td>
              <td>1223456789</td>
              <td>Lorem Ipsum</td>
              <td><span class="text-success">Accepted</span></td>
              <td>
                <a href="#"><i class="fas fa-trash-alt"></i></a>
                <a href="#"><i class="fas fa-eye"></i></a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr> --}}
          </tbody>
        </table>
      </div>
    </div>
    {{-- <div
      class="tab-pane fade"
      id="profile"
      role="tabpanel"
      aria-labelledby="profile-tab"
    >
      Accepted
    </div>
    <div
      class="tab-pane fade"
      id="contact"
      role="tabpanel"
      aria-labelledby="contact-tab"
    >
      Refused
    </div>
    <div
      class="tab-pane fade"
      id="report"
      role="tabpanel"
      aria-labelledby="contact-tab"
    >
      Complete Report
    </div> --}}
  </div>
@endsection
@section('script')
<script>
   window.onload = function(){
    (function(){
      loadTable();
    })();


    function loadTable()
    {
      $("#investee-list").DataTable({
                  processing: true,
                  serverSide: true,
                  pagingType: 'full_numbers',
                  "bDestroy": true,
                  ajax: '{{ route('analyst.investee.list') }}',
                  columns: [
                      { data: 'name', name: 'name' },
                      { data: 'email', name: 'email' },
                      // { data: 'status', name: 'status' },
                      { data: 'action', name: 'action' },
                  ]
              });
    }

    $(document).on("click" , ".delete-investee" , function(){
      let investeeId = this.dataset.investeeId;
        Swal.fire({
                title: 'Are you sure?',
                text: 'All the data will be remove related to this Investee',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url : "{{route('analyst.delete.investee')}}",
                    type : "POST",
                    data : {
                      _token : "{{csrf_token()}}",
                      investeeId : investeeId
                    },
                    success : function(res){
                      if(res.success == true)
                      {
                        toastr.success(res.msg)
                        loadTable();
                      }else{
                        toastr.error(res.msg);
                      }
                    }
                  })
                }
            });
    })

  }


</script>
@endsection