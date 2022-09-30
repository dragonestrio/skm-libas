@extends('layouts.app')

@section('content')

<style>

  @import url('http://fonts.cdnfonts.com/css/frutiger?styles=28198,15520');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap');
  
  .title h1{
       margin-top: 2rem;
       font-family: 'Frutiger', sans-serif;
       font-weight: bold;
       font-size: 2.8rem !important; 
       margin-bottom: 3rem;
  }
  
  .btn-group > form {
    display: inline-block;
    flex-wrap: wrap;
    margin-bottom: 2rem;
  }
  
  .btn-group > form > h4 { 
  font-size: 1.3rem
  }
  .btn-radio {
    cursor: pointer;
    font-weight: 500;
    position: relative;
    overflow: hidden;
    margin-bottom: 0.375em;
  }
  .btn-radio input {
    position: absolute;
    left: -9999px;
  }
  .btn-radio input:checked + span {
    background-color: #d6d6e5;
  }
  .btn-radio input:checked + span:before {
    box-shadow: inset 0 0 0 0.4375em #00005c;
  }
  .btn-radio span {
    display: flex;
    align-items: center;
    padding: 0.375em 0.75em 0.375em 0.375em;
    border-radius: 99em;
    transition: 0.25s ease;
  }
  .btn-radio span:hover {
    background-color: #d6d6e5;
  }
  .btn-radio span:before {
    display: flex;
    flex-shrink: 0;
    content: "";
    background-color: #fff;
    width: 1.5em;
    height: 1.5em;
    border-radius: 50%;
    margin-right: 0.375em;
    transition: 0.25s ease;
    box-shadow: inset 0 0 0 0.125em #00005c;
  }
  
    /* .btn-group {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      
    } */
  
    .btn-wrap {
      display: flex;
      flex-direction: column;
      margin: 0 14rem;
    }
  
    
  
    @import url("https://fonts.googleapis.com/css?family=Mukta:700");
  
  .btn-next-prev button {
      font-family: "Mukta", sans-serif !important;
      font-size: 1rem;
      position: relative;
      display: inline-block;
      cursor: pointer;
      outline: none;
      border: 0;
      vertical-align: middle;
      text-decoration: none;
      background: transparent;
      padding: 0;
      font-size: inherit;
      font-family: inherit;
  }
  .btn-next-prev button.learn-more {
      width: 10rem;
      height: auto;
      position: fixed;
      bottom: 0;
      right: 0;
      margin: 2rem;
  
  
  }
  .btn-next-prev button.learn-more .circle {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: relative;
      display: block;
      margin: 0;
      width: 3rem;
      height: 3rem;
      background: #282936;
      border-radius: 1.625rem;
  }
  .btn-next-prev button.learn-more .circle .icon {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: absolute;
      top: 0;
      bottom: 0;
      margin: auto;
      background: #fff;
    }
    .btn-next-prev button.learn-more .circle .icon.arrow {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      left: 0.625rem;
      width: 1.125rem;
      height: 0.125rem;
      background: none;
  }
  .btn-next-prev button.learn-more .circle .icon.arrow::before {
      position: absolute;
      content: "";
      top: -0.25rem;
      right: 0.0625rem;
      width: 0.625rem;
      height: 0.625rem;
      border-top: 0.125rem solid #fff;
      border-right: 0.125rem solid #fff;
      transform: rotate(45deg);
  }
  .btn-next-prev button.learn-more .button-text {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      padding: 0.75rem 0;
      margin: 0 0 0 1.85rem;
      color: #282936;
      font-weight: 700;
      line-height: 1.6;
      text-align: center;
      text-transform: uppercase;
  }
  .btn-next-prev button:hover .circle {
      width: 100%;
  }
  .btn-next-prev button:hover .circle .icon.arrow {
      background: #fff;
      transform: translate(1rem, 0);
  }
  .btn-next-prev button:hover .button-text {
      color: #fff;
  }
  
  .skm {
    margin-bottom: 7rem;
    font-family: 'Poppins', sans-serif;
  }
  
  
  @media only screen and (min-width: 1200px) { 
    .btn-wrap { 
      margin: 0 18rem;
    }
  }
  
  @media only screen and (max-width: 1200px) {
    .btn-wrap {
      margin: 0 12rem; 
    }
  }
  
  
  @media only screen and (max-width: 992px) {
    .btn-next-prev button.learn-more {
      width: 9rem;
    }
    .btn-wrap {
      margin: 0 10rem; 
    }
    .title h1 {
      font-size: 2.6rem !important;
  
    }
  
  }
  
  
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (max-width: 768px) {
    .title h1 {
      font-size: 2.3rem !important;
    }
    .btn-wrap {
      margin: 0 8rem;
    }
    .btn-next-prev button.learn-more {
      width: 9rem;
      margin: 2rem 1rem;
    }
  
  }
  
  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (max-width: 600px) {
    .title h1 {
      font-size: 2rem !important;
    }
    .skm {
      margin-bottom: 5rem;
    }
    .btn-next-prev button.learn-more {
      margin: 1rem;
    }
    .btn-next-prev button.learn-more {
      width: 9rem;
    }
    .btn-wrap {
      margin: 0 7rem;
    }
    .btn-group > form > h4 {
      font-size: 1.3rem;
    }
    .btn-group > form{ 
      font-size: 0.9rem;
    }
  }
  </style>
<section class="skm">
    <div class="title">
      <h1 class="text-center">FORM SURVEY <br>KEPUASAAN MASYARAKAT</h1>
    </div>
    <div class="btn-wrap row">
      
        <div class="btn-group row">
            <h4>Jenis Kelamin</h4>
            <div >
              <label class="btn-radio">
                  <input onchange="gender('M')" type="radio" name="gender"  />
                  <span>Laki - laki</span>
              </label>
              <label class="btn-radio">
                  <input onchange="gender('F')" type="radio" name="gender" />
                  <span>Perempuan</span>
                </label>
            </div>
        </div>
        <div class="btn-group row">
            <h4>Pendidikan</h4>
            <div>
              <label class="btn-radio">
                  <input onchange="education('SD')" type="radio" name="education" />
                  <span>SD</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('SMP')" type="radio" name="education" />
                  <span>SMP</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('SMA')" type="radio" name="education" />
                  <span>SMA</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('D3')" type="radio" name="education" />
                  <span>D3</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('S1')" type="radio" name="education" />
                  <span>S1</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('S2')" type="radio" name="education" />
                  <span>S2</span>
              </label>
              <label class="btn-radio">
                  <input onchange="education('S3')" type="radio" name="education" />
                  <span>S3</span>
              </label>
            </div>
        </div>
        <div class="btn-group row">
            <h4>Unit Fokus</h4>
            <div id="Unit-list">
            </div>
          </div>
      </div>
    <div class="btn-next-prev">
      <button onclick="getalldata()" class="learn-more">
          <span class="circle" aria-hidden="true">
              <span class="icon arrow"></span>
          </span>
          <span class="button-text">Next</span>
      </button>
  </div>
</section>

<script> 

let data = { }



// get unit fokus

  const listUnit = document.querySelector('#Unit-list');

  const getlistUnit = () => {
    fetch(('https://admin.skm.pcctabessmg.xyz/api/unit'))
     .then((response) => {
       return response.json();
    }).then((responseJson) => {
      console.log(responseJson.data);
      showListUnit(responseJson.data)
    }).catch((err) => {
      console.error(err);
    });
  }

  const showListUnit = Units => {
    listUnit.innerHTML = "";
      Units.forEach(item => {
        listUnit.innerHTML += `
        <label class="btn-radio">
                  <input onchange="getidunit(${item.id})" type="radio" name="unit"  />
                  <span>${item.name}</span>
        </label>
        `
      });
  }

  // button radio

  const gender = (value) => {
    data.gender = value
  }

  
  const getalldata = () => {
    console.log(data)

    localStorage.setItem("data", JSON.stringify(data))
    window.location.href = '/exams';
  }


  const education = (value) => {
    data.education = value
  }

  const getidunit = (value) => {
    data.unit_id = value
  }

  // 

  document.addEventListener('DOMContentLoaded', getlistUnit);
</script>
<script type="text/javascript" src="js/materialize.min.js"></script>
@endsection