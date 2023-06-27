@extends('user.main')
@section('main-content')
    <div class="d-flex ref_main p-5 w-100 justify-content-around">
      
      <div class="p-3 w-50">
        <div class="card p-3">
              <form id="username-form" action="{{route('update.username')}}">
                  <input type="hidden" name="id" value="{{auth()->user()->id}}">
                  <div class="form-group mt-3">
                      <label for="Email">Email</label>
                      <input type="Email" name="email" class="form-control" id="email" placeholder="Email" value="{{auth()->user()->email}}" readonly>
                    </div>
                    <div class="form-group mt-3">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{auth()->user()->name}}">
                    </div>
                    <div class="form-group mt-3">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
              </form>
          </div>

      </div>
      

        <div class="p-3 w-50">
          
                  <div class="card p-3">
                      <form id="password-form" action="{{route('update.password')}}">
                          <input type="hidden" name="id" value="{{auth()->user()->id}}">
                          <div class="form-group mt-3">
                              <label for="Email">Password</label>
                              <input type="password" name="old_password" class="form-control" id="password" placeholder="Your Password">
                            </div>
                            <div class="form-group mt-3">
                              <label for="name">New Password</label>
                              <input type="password" name="password" class="form-control" id="new_password" placeholder="New Password">
                            </div>
                            <div class="form-group mt-3">
                              <label for="name">Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mt-3">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                      </form>
                  </div>

        </div>
    </div>
@endsection

@section('script')
<script>
    document.getElementById("username-form").addEventListener("submit", function(e) {
      e.preventDefault();
      let token = '{{csrf_token()}}';
      let currentForm = this;
      let formData = new FormData(currentForm);
      formData.append('_token', token); 
      $.ajax({
        type: 'POST',
        url: currentForm.getAttribute('action'),
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: function(res) {
          if(res.success == true)
          {
            toastr.success(res.msg);
          }else{
            let error = res.error;
            let check = [null , undefined , "" ];
            toastr.error(res.msg);
            if(!check.includes(error))
            {
              for(const [ key , value ] of Object.entries(error))
              {
                toastr.error(value);
              }
            }
          }
        }
      });
  });

  document.getElementById("password-form").addEventListener("submit", function(e) {
      e.preventDefault();
      let token = '{{csrf_token()}}';
      let currentForm = this;
      let formData = new FormData(currentForm);
      formData.append('_token', token); 
      $.ajax({
        type: 'POST',
        url: currentForm.getAttribute('action'),
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: function(res) {
          if(res.success == true)
          {
            toastr.success(res.msg);
            currentForm.reset();
          }else{
            let error = res.error;
            let check = [null , undefined , "" ];
            toastr.error(res.msg);
            if(!check.includes(error))
            {
              for(const [ key , value ] of Object.entries(error))
              {
                toastr.error(value);
              }
            }
          }
        }
      });
  });


</script>
@endsection