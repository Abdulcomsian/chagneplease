@extends('user.main');
@section('style')
<style>
.wrapper {
  position: relative;
  width: 80%;
  background-color: #ffffff;
  border-radius: 10px;
}
.container {
  position: relative;
  width: 100%;
  height: 50px;
  margin-top: 30px;
}
input[type="range"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 100%;
  outline: none;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  background-color: transparent;
  pointer-events: none;
}
.slider-track {
  width: 100%;
  height: 5px;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  border-radius: 5px;
}
input[type="range"]::-webkit-slider-runnable-track {
  -webkit-appearance: none;
  height: 5px;
}
input[type="range"]::-moz-range-track {
  -moz-appearance: none;
  height: 5px;
}
input[type="range"]::-ms-track {
  appearance: none;
  height: 5px;
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  height: 1.7em;
  width: 1.7em;
  background-color: #0D6EFD;
  cursor: pointer;
  margin-top: -9px;
  pointer-events: auto;
  border-radius: 50%;
}
input[type="range"]::-moz-range-thumb {
  -webkit-appearance: none;
  height: 1.7em;
  width: 1.7em;
  cursor: pointer;
  border-radius: 50%;
  background-color: #0D6EFD;
  pointer-events: auto;
  border: none;
}
input[type="range"]::-ms-thumb {
  appearance: none;
  height: 1.7em;
  width: 1.7em;
  cursor: pointer;
  border-radius: 50%;
  background-color: #0D6EFD;
  pointer-events: auto;
}
input[type="range"]:active::-webkit-slider-thumb {
  background-color: #ffffff;
  border: 1px solid #0D6EFD;
}
.values {
  background-color: #0D6EFD;
  width: 100%;
  position: relative;
  margin: auto;
  padding: 5px 0;
  border-radius: 5px;
  text-align: center;
  font-weight: 500;
  font-size: 13px;
  color: #ffffff;
  transform: translate(24px, 10px);
}
.values:before {
  content: "";
  position: absolute;
  height: 0;
  width: 0;
  border-top: 15px solid #0D6EFD;
  border-left: 15px solid transparent;
  border-right: 15px solid transparent;
  margin: auto;
  bottom: -14px;
  left: 0;
  right: 0;
}

.statistic-box.card {
    margin-top: 30px;
    position: absolute;
    width: 95%;
    z-index: 1;
    bottom : -100%;
    transition: bottom 0.3s ease;
}

.plan:hover .statistic-box.card{
  bottom: 2px;
}

.plan {
    position: relative;
    overflow: hidden;
    height: 735px;
}

.card-logo{
  height: 380px;
}

.card-logo img.card-img-top {
  max-height: 350px;
  height: auto;
}


.circular-progress-bar {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100px;
  height: 92px;
  border-radius: 50%;
  
}

.section_2 .card-body{
  padding: 24px!important;
}

p.rating-holder {
    padding: 3px 11px;
    width: 60px;
    border-radius: 12px;
    text-align: center;
}

</style>
@endsection
@section('main-content')
  <livewire:project-filter/>
@endsection
@section('script')
<script>
  window.onload = function () {
  slideOne();
  slideTwo();
};

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-1").max;

function slideOne() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  displayValOne.textContent = "$"+sliderOne.value;
  fillColor();
}
function slideTwo() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  displayValTwo.textContent = "$"+sliderTwo.value;
  fillColor();
}
function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
}

</script>
@endsection