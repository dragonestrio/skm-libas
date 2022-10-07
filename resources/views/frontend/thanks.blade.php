@extends('frontend.layouts.app')

@section('thanks')

<section>
    <div class="thanks">
        <img src="{{ asset('media/others/thanks.png') }}" alt="Terimakasih">
        <div class="btn-back">
            <a class="link" href="{{ url('survey') }}">
                <button class="btn-back-survey" role="button">Kembali Isi Survey</button>
            </a>
        </div>
    </div>

</section>

<style>
.link {
    text-decoration: none
}
.thanks {
    padding: 4.5rem 0;
    text-align: center;
    flex-direction: column;
    align-items: center;
}
.thanks img {
    max-width: 25rem;
}

.btn-back {
    bottom: 0;
    margin-bottom: 2rem;
    position: fixed;
    left: 50%;
    transform: translate(-50%, 0);

}
.btn-back-survey {
  /* margin: 10px; */
  padding: 15px 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  border-radius: 10px;
  display: block;
  border: 0px;
  font-weight: 700;
  box-shadow: 0px 0px 14px -7px #542C2B ;
  background-image: linear-gradient(45deg, #402220 0%, #542C2B  51%, #402220  100%);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.btn-back-survey:hover {
  background-position: right center;
  /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.btn-back-survey:active {
  transform: scale(0.95);
}


/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 768px) {
    .thanks {
        padding: 3rem 0;
    }
}

</style>

@endsection
