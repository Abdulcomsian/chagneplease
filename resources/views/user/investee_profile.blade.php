@extends('user.main')
@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4 justify-center d-flex-wrap p-2" >
                <div class="col-md-12 card shadow">
                    <div class="pt-4 pb-4 d-flex flex-column">
                        <div class="profile-image d-flex justify-content-center">
                            <img src="{{asset('img/sl.png')}}" alt="sl">
                        </div>
                        <div class="username d-flex justify-content-center mt-2">
                            <h3><b>JOHN DOE</b></h3>
                        </div>
                        <div class="position d-flex justify-content-center">
                            <h6 class="text-secondary">(Project Manager)</h6>
                        </div>
                    </div>
                    
                    <div class="col-12 pt-2 p-4">
                        <div class="d-flex justify-content-between">
                            <div><i class="fa-solid fa-check-double"></i> Country:</div>
                            <div>Pakistan</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><i class="fa-solid fa-check-double"></i> Date Founded:</div>
                            <div>2022</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><i class="fa-solid fa-check-double"></i> Stage of Maturity:</div>
                            <div>Start-up</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><i class="fa-solid fa-check-double"></i> <a href="#">Link To Profile Video > ></a></div>
                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <div class="d-flex b-1 mt-3 card shadow justify-content-between" style="height: 100px">
                        <div class="d-flex justify-content-between" style="height: 100%">
                            <div class="w-30 text-center bg-secondary text-light p-2" style="line-heigh:100%">
                                <b>Funding Request</b>
                            </div>
                            <div class="text-end p-2"  style="line-heigh:100%">
                                <span>$400,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex b-1 mt-3 card shadow justify-content-between" style="height: 100px">
                        <div class="d-flex justify-content-between" style="height: 100%">
                            <div class="w-30 text-center bg-secondary text-light p-2" style="line-heigh:100%">
                                <b>Existing Funding</b>
                            </div>
                            <div class="text-end p-2"  style="line-heigh:100%">
                                <span>$400,000</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 mt-2">
                    <div class="d-flex justify-content-between">
                        <div><i class="fa-solid fa-user"></i> Number of customers</div>
                        <div>50</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa-solid fa-user"></i> Full Time Employee</div>
                        <div>10</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa-solid fa-check-double"></i> Annual Revenue 2021</div>
                        <div>$9,929</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa-solid fa-check-double"></i> Net Profit 2021</div>
                        <div>$0</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa-solid fa-check-double"></i> Cach Balance (1/jan/2022)</div>
                        <div>-$3,213</div>
                    </div>
                </div>



            </div>


            <div class="col-md-8 pt-4 pb-4">
                <div class="col-md-12 pt-2 pb-4 card shadow p-3">
                    <h1>The Problem</h1>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, neque? Ipsum qui aut labore vel sunt maxime aspernatur nulla fuga blanditiis, possimus optio ab cum culpa rerum, nesciunt amet. Cumque.
                </div>
                <div class="col-md-12 pt-4 pb-4 card shadow mt-3 p-3">
                    <h1>The Solution</h1>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, neque? Ipsum qui aut labore vel sunt maxime aspernatur nulla fuga blanditiis, possimus optio ab cum culpa rerum, nesciunt amet. Cumque.
                </div>
                <div class="col-md-12 pt-4 pb-4 card shadow mt-3 p-3">
                    <h1>Proposed Use Of Funding</h1>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, neque? Ipsum qui aut labore vel sunt maxime aspernatur nulla fuga blanditiis, possimus optio ab cum culpa rerum, nesciunt amet. Cumque.
                </div>
                <div class="col-md-12 pt-2 pb-2 card shadow mt-3 p-3">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Funding Request(US$)</th>
                            <th scope="col">Description / Justification</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>300,000</td>
                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus veritatis dignissimos officia qui inventore fugiat, sint perferendis ab amet cupiditate quia cumque illum recusandae? Tempora voluptas illum distinctio necessitatibus labore.</td>
                          </tr>
                          <tr>
                            <td>300,000</td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, consectetur fugit! Nemo quisquam, blanditiis alias debitis magnam quo, natus necessitatibus voluptas quasi in sed atque vitae ipsa laborum aut quis?</td>
                          </tr>
                          <tr>
                            <td>400,000</td>
                            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis cum omnis aut magnam non aliquam quas dolorem rem, repudiandae, maxime ipsum! Natus iure ipsum ea perferendis, dolor ducimus eius quam?</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12 p-3 card shadow mt-2">
                    <h2>Suggested Question for investors</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius distinctio corporis odio totam id optio ipsam eos, ipsa ex architecto nulla quia sunt libero ipsum dolores reprehenderit necessitatibus praesentium voluptatum?</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius distinctio corporis odio totam id optio ipsam eos, ipsa ex architecto nulla quia sunt libero ipsum dolores reprehenderit necessitatibus praesentium voluptatum?</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius distinctio corporis odio totam id optio ipsam eos, ipsa ex architecto nulla quia sunt libero ipsum dolores reprehenderit necessitatibus praesentium voluptatum?</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection