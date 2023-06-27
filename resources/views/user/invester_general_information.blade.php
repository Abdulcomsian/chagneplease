@extends('user.main')
@section('main-content')
<div class="container">
    <div class="text_content text-center my-lg-5 my-3">
      <h2 class="section_title">General Information</h2>
      <p class="section_para">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
        maecenas aliquam aliquam non.
      </p>
    </div>

    <div class="form_box">
      <h2 class="form_box_title">Contact Details</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">Name</label>
              <input type="email" class="form-control form_box_input" id="exampleFormControlInput1">
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6 ps-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">Email</label>
              <input type="email" class="form-control form_box_input" id="exampleFormControlInput1">
            </div>
          </div>

          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">Phone Number</label>
              <div class="input-group mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  +54
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">+23</a></li>
                  <li>
                    <a class="dropdown-item" href="#">+30</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">+21</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">+23</a>
                  </li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6 ps-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">City</label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
        </div>
      </form>

      <h2 class="form_box_title mt-5">Interests</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">What sectors are you interested in?</label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6 ps-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">What markets are you interested in?</label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>

          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">What stage businesses are you interested in investing?
              </label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6 ps-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">What expertise are you interested in?</label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label">What level of investment are you looking at ?
              </label>
              <select class="form-select" aria-label="Default select example">
                <option selected=""></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 pe-lg-5 colL"></div>
          <!--  -->
          <div class="col-lg-6 pe-lg-5 colL">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label form_box_label d-block">Are you only interested in SEIS / EIS eligible investments ?
              </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- buttons -->

    <div class="form_bottom_links d-flex justify-content-between">
      <a href="#" class="save_link">Save</a>
      <div class="d-flex">
        <a href="#" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center">Previous Step</a>
        <a href="#" class="btn btn-blue">Next Step</a>
      </div>
    </div>
  </div>
@endsection