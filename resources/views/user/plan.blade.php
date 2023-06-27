@extends('user.main')
@section('main-content')
<div class="container mt-5 mb-5">
  <div class="dash_table_text d-flex justify-content-between">
    <div>
      <h3>Plans</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae
        dictum congue viverra bibendum.
      </p>
    </div>
    <div>
      <a type="button" class="text-light btn btn-primary" href="{{route('user.general_information')}}">Add Company</a>
    </div>
  </div>
  <!-- =========== table tabs ========== -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button
        class="nav-link active"
        type="button"
        onClick="getPlans(null)"
      >
        All
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link"
        type="button"
        onClick="getPlans('accepted')"
      >
        Accepted
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link"
        type="button"
        onClick="getPlans('rejected')"
      >
        Refused
      </button>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">
    <div
      class="tab-pane fade show active"
      id="home"
      role="tabpanel"
      aria-labelledby="home-tab"
    >
      <div class="table-responsive dash_table">
        <table id="user-plan" class="table caption-top">
          <thead>
            <tr>
              <th scope="col">Company</th>
              <th scope="col">Size</th>
              <th scope="col">Category</th>
              <th scope="col">Logo</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
      </div>
    </div>
  
  </div>
</div>
@endsection
@section('script')
<script>
  window.onload = function(){
    (function(){
      $("#user-plan").DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                ajax: '{{ route('user.plan_list') }}',
                columns: [
                    { data: 'company', name: 'company' },
                    { data: 'size', name: 'size' },
                    { data: 'category', name: 'category' },
                    { data: 'logo', name: 'logo' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' },
                ]
            });
      })();
  }

  function getPlans(status)
  {
    $('#user-plan').DataTable().destroy()
    $("#user-plan").DataTable({
              processing: true,
              serverSide: true,
              pagingType: 'full_numbers',
              ajax: {
                url : '{{ route('user.plan_list') }}',
                method: 'GET',
                data: {status : status},
              },
              columns: [
                  { data: 'company', name: 'company' },
                  { data: 'size', name: 'size' },
                  { data: 'category', name: 'category' },
                  { data: 'logo', name: 'logo' },
                  { data: 'status', name: 'status' },
                  { data: 'action', name: 'action' },
              ]
          });
  }
    @if(Session::has('success'))
				toastr.success('{{Session::get('success')}}')
		@endif

		@if(Session::has('error'))
				toastr.error('{{Session::get('error')}}')
		@endif
</script>
@endsection
