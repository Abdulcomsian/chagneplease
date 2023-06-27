@extends('analyst.main')
@section('title')
    <title>Investee</title>
@endsection
@section('main-content')
<div class="dash_table_text">
    <h3>Plan Detail</h3>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vitae
      dictum congue viverra bibendum.
    </p>
  </div>
  <!-- =========== table tabs ========== -->
 
  <div class="tab-content" id="myTabContent">
    <input type="hidden" name="plan_id" id="planId" value="{{$plan->id}}">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="table-responsive dash_table my-2">
        <div class="container p-0 m-0">
            <div class="row">
                <div class="col-12">
                    <img src="" alt="">
                </div>
                <div class="col-6 my-2">
                    <input type="text" class="form-control" placeholder="User Name" value="{{$plan->investee->name}}" readonly>
                </div>
                <div class="col-6 my-2">
                    <input type="text" class="form-control" placeholder="Company Name" value="{{$plan->company_name}}" readonly>
                </div>
                <div class="col-3 my-2">
                    <input type="text" class="form-control" placeholder="size" value="{{$plan->size}}" readonly>
                </div>
                <div class="col-3 my-2">
                    <input type="text" class="form-control" placeholder="investment" value="{{$plan->investment}}" readonly>
                </div>
                <div class="col-3 my-2">
                    <input type="text" class="form-control" placeholder="amount" value="{{$plan->amount}}" readonly>
                </div>
                <div class="col-3 my-2">
                    <input type="text" class="form-control" placeholder="category" value="{{$plan->category}}" readonly>
                </div>
                <div class="col-4 my-2">
                    <input type="text" class="form-control" placeholder="country" value="{{$plan->country}}" readonly>
                </div>
                <div class="col-4 my-2">
                    <input type="text" class="form-control" placeholder="city" value="{{$plan->city}}" readonly>
                </div>
                <div class="col-4 my-2">
                    <input type="text" class="form-control" placeholder="postal code" value="{{$plan->postal_code}}" readonly>
                </div>
                <div class="col-12 my-2">
                    <input type="text" class="form-control" placeholder="address" value="{{$plan->address}}" readonly>
                </div>
                <div class="col-12 my-2">
                    <textarea class="form-control" id="description" rows="3" readonly>{{$plan->description}}</textarea>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label for="status">Update Status</label>
                        <select class="form-control" id="status">
                            <option value="pending" @if($plan->status == "pending") selected @endif >Pending</option>
                            <option value="accepted" @if($plan->status == "accepted") selected @endif>Accepted</option>
                            <option value="rejected" @if($plan->status == "rejected") selected @endif>Rejected</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
   window.onload = function(){
    let status = document.getElementById("status");
    status.addEventListener("change" , function(e){
        let changeStatus = this.value;
        let planId = document.getElementById("planId").value;
        $.ajax({
            url : "{{route('update.analyst.status')}}",
            type : "POST",
            data : {
                _token : "{{csrf_token()}}",
                planId : planId,
                value : changeStatus
            },
            success : function(res){
                if(res.success == true)
                {
                    toastr.success(res.msg);
                }else{
                    toastr.error(res.msg);
                }
            }
        })
    })

  }
</script>
@endsection