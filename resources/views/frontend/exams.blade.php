@extends('layouts.app')

@section('exams')

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
    font-size: 1.1rem
  }


  .btn-group > form > h1 {
    font-size: 1.3rem
  }
  .btn-group > form > h4 {
  font-size: 1.15rem
  }
  .btn-radio {
    cursor: pointer;
    font-weight: 500;
    position: relative;
    overflow: hidden;
    padding-top: 2rem;
    margin-bottom: 0.375em;
    margin: 0 1rem
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
    padding: 0.38em 0em 0.38em 0.38em;
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

    }
    /* .isi-survey {
      margin: 0 14rem;
    } */


    @import url("https://fonts.googleapis.com/css?family=Mukta:700");

  .btn-prev button,
  .btn-next button {
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
  .btn-prev button.learn-more {
      width: 11rem;
      height: auto;
      position: fixed;
      bottom: 0;
      left: 0;
      margin: 2rem;
      display: flex;
      flex-direction: row-reverse;
  }

  .btn-next button.learn-more {
      width: 10rem;
      height: auto;
      position: fixed;
      bottom: 0;
      right: 0;
      margin: 2rem;
  }

  .btn-prev button.learn-more .circle,
  .btn-next button.learn-more .circle {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: relative;
      display: block;
      margin: 0;
      width: 3rem;
      height: 3rem;
      background: #282936;
      border-radius: 1.625rem;
  }

  .btn-prev button.learn-more .circle .icon,
  .btn-next button.learn-more .circle .icon {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: absolute;
      top: 0;
      bottom: 0;
      margin: auto;
      background: #fff;
  }
  .btn-prev button.learn-more .circle .icon.arrow {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      left: 1.225rem;
      width: 1.125rem;
      height: 0.125rem;
      background: none;
  }

    .btn-next button.learn-more .circle .icon.arrow {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      left: 0.625rem;
      width: 1.125rem;
      height: 0.125rem;
      background: none;
  }

  .btn-prev button.learn-more .circle .icon.arrow::before,
  .btn-next button.learn-more .circle .icon.arrow::before {
      position: absolute;
      content: "";
      top: -0.25rem;
      width: 0.625rem;
      height: 0.625rem;
      border-top: 0.125rem solid #fff;
      border-right: 0.125rem solid #fff;
  }

   .btn-prev button.learn-more .circle .icon.arrow::before{
      left: 0.0625rem;
      transform: rotate(225deg);
  }

   .btn-next button.learn-more .circle .icon.arrow::before{
      right: 0.0625rem;
      transform: rotate(45deg);
  }
  .btn-prev button.learn-more .button-text {
      transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      padding: 0.75rem 0;
      margin: 0 0 0 1.85rem;
      color: #282936;
      font-weight: 700;
      line-height: 1.6;
      text-align: center;
      text-transform: uppercase;
  }

    .btn-next button.learn-more .button-text {
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

  .btn-prev button:hover .circle,
  .btn-next button:hover .circle {
      width: 100%;
  }
  .btn-prev button:hover .circle .icon.arrow,
  .btn-next button:hover .circle .icon.arrow {
      background: #fff;
      transform: translate(7rem, 0);
  }
  .btn-prev button:hover .button-text {
      color: #fff;
  }

  .exam {
    margin-bottom: 7rem;
  }

  @media only screen and (min-width: 1200px) {
    .isi-survey #Exams {
      padding: 0 23rem
    }
  }

  @media only screen and (max-width: 1200px) {

    .btn-prev button.learn-more {
      width: 11rem;
    }
    .isi-survey #Exams {
      padding: 0 12rem
    }
  }


  @media only screen and (max-width: 992px) {
    .btn-prev button.learn-more {
      width: 11rem;
    }
    .title h1 {
      font-size: 2.6rem !important;

    }
    .isi-survey {
      padding: 0 9rem
    }

    .isi-survey #Exams {
    padding: 0rem;
    }

  }


  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (max-width: 768px) {
    .title h1 {
      font-size: 2.3rem !important;
    }
    .btn-prev button.learn-more {
      width: 11rem;
      margin: 2rem 1rem;
    }
    .isi-survey {
      padding: 0 8rem
    }


  }

  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (max-width: 600px) {
    .title h1 {
      font-size: 2rem !important;
    }
    .exam {
      margin-bottom: 5rem;
    }
    .btn-prev button.learn-more {
      margin: 1rem;
    }
    .btn-prev button.learn-more {
      width: 11rem;
    }
    .btn-group > form > h4 {
      font-size: 1.4rem;
    }
    .btn-group > form{
      font-size: 0.9rem;
    }
  }

    /* emot */

    .emoji {
    width: 120px;
    height: 120px;
    margin: 15px 15px 40px;
    background: #ffda6a;
    display: inline-block;
    border-radius: 50%;
    position: relative;
}
.emoji:after {
    position: absolute;
    bottom: -42px;
    font-size: 18px;
    width: 117px;
    left: calc(30% - 30px);
    color: #8a8a8a;
}

.emoji__face,
.emoji__eyebrows,
.emoji__eyes,
.emoji__mouth,
.emoji__tongue,
.emoji__heart,
.emoji__hand,
.emoji__thumb {
    position: absolute;
}
.emoji__face:before,
.emoji__face:after,
.emoji__eyebrows:before,
.emoji__eyebrows:after,
.emoji__eyes:before,
.emoji__eyes:after,
.emoji__mouth:before,
.emoji__mouth:after,
.emoji__tongue:before,
.emoji__tongue:after,
.emoji__heart:before,
.emoji__heart:after,
.emoji__hand:before,
.emoji__hand:after,
.emoji__thumb:before,
.emoji__thumb:after {
    position: absolute;
    content: "";
}

.emoji__face {
    width: inherit;
    height: inherit;
}

/* haha */

.emoji--haha {
    cursor: pointer;
}
.emoji--haha:after {
    content: "Cukup Puas";
}
.emoji--haha .emoji__face {
    -webkit-animation: haha-face 2s linear infinite;
    animation: haha-face 2s linear infinite;
}
.emoji--haha .emoji__eyes {
    width: 26px;
    height: 6px;
    border-radius: 2px;
    left: calc(50% - 13px);
    top: 35px;
    transform: rotate(20deg);
    background: transparent;
    box-shadow: -25px 5px 0 0 #000000, 25px -5px 0 0 #000000;
}
.emoji--haha .emoji__eyes:after {
    left: 0;
    top: 0;
    width: 26px;
    height: 6px;
    border-radius: 2px;
    transform: rotate(-40deg);
    background: transparent;
    box-shadow: -25px -5px 0 0 #000000, 25px 5px 0 0 #000000;
}
.emoji--haha .emoji__mouth {
    width: 80px;
    height: 40px;
    left: calc(50% - 40px);
    top: 50%;
    background: #000000;
    border-radius: 0 0 40px 40px;
    overflow: hidden;
    z-index: 1;
    -webkit-animation: haha-mouth 2s linear infinite;
    animation: haha-mouth 2s linear infinite;
}
.emoji--haha .emoji__tongue {
    width: 70px;
    height: 30px;
    background: #f55064;
    left: calc(50% - 35px);
    bottom: -10px;
    border-radius: 50%;
}


/* yay */

.emoji--yay {
    cursor: pointer;
}
.emoji--yay:after {
    content: "Sangat Puas";
    -webkit-animation: yay-reverse 1s linear infinite;
    animation: yay-reverse 1s linear infinite;
}
.emoji--yay .emoji__face {
    -webkit-animation: yay 1s linear infinite alternate;
    animation: yay 1s linear infinite alternate;
}
.emoji--yay .emoji__eyebrows {
    left: calc(50% - 3px);
    top: 30px;
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background: transparent;
    box-shadow: -6px 0 0 0 #000000, -36px 0 0 0px #000000, 6px 0 0 0 #000000, 36px 0 0 0px #000000;
}
.emoji--yay .emoji__eyebrows:before,
.emoji--yay .emoji__eyebrows:after {
    width: 36px;
    height: 18px;
    border-radius: 60px 60px 0 0;
    background: transparent;
    border: 6px solid black;
    box-sizing: border-box;
    border-bottom: 0;
    bottom: 3px;
    left: calc(50% - 18px);
}
.emoji--yay .emoji__eyebrows:before {
    margin-left: -21px;
}
.emoji--yay .emoji__eyebrows:after {
    margin-left: 21px;
}
.emoji--yay .emoji__mouth {
    top: 60px;
    background: transparent;
    left: 50%;
}
.emoji--yay .emoji__mouth:after {
    width: 80px;
    height: 80px;
    left: calc(50% - 40px);
    top: -75px;
    border-radius: 50%;
    background: transparent;
    border: 6px solid #000000;
    box-sizing: border-box;
    border-top-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    z-index: 1;
}
.emoji--yay .emoji__mouth:before {
    width: 6px;
    height: 6px;
    background: transparent;
    border-radius: 50%;
    bottom: 5px;
    left: calc(50% - 3px);
    box-shadow: -25px 0 0 0 #000000, 25px 0 0 0 #000000, -35px -2px 30px 10px #d5234c, 35px -2px 30px 10px #d5234c;
}

/* wow */

.emoji--wow {
    cursor: pointer;
}

.emoji--wow:after {
    content: "Puas";
}
.emoji--wow .emoji__face {
    -webkit-animation: wow-face 3s linear infinite;
    animation: wow-face 3s linear infinite;
}
.emoji--wow .emoji__eyebrows {
    left: calc(50% - 3px);
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background: transparent;
    box-shadow: -18px 0 0 0 #000000, -33px 0 0 0 #000000, 18px 0 0 0 #000000, 33px 0 0 0 #000000;
    -webkit-animation: wow-brow 3s linear infinite;
    animation: wow-brow 3s linear infinite;
}
.emoji--wow .emoji__eyebrows:before,
.emoji--wow .emoji__eyebrows:after {
    width: 24px;
    height: 20px;
    border: 6px solid #000000;
    box-sizing: border-box;
    border-radius: 50%;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    top: -3px;
    left: calc(50% - 12px);
}
.emoji--wow .emoji__eyebrows:before {
    margin-left: -25px;
}
.emoji--wow .emoji__eyebrows:after {
    margin-left: 25px;
}
.emoji--wow .emoji__eyes {
    width: 16px;
    height: 24px;
    left: calc(50% - 8px);
    top: 35px;
    border-radius: 50%;
    background: transparent;
    box-shadow: 25px 0 0 0 #000000, -25px 0 0 0 #000000;
}
.emoji--wow .emoji__mouth {
    width: 30px;
    height: 45px;
    left: calc(50% - 15px);
    top: 50%;
    border-radius: 50%;
    background: #000000;
    -webkit-animation: wow-mouth 3s linear infinite;
    animation: wow-mouth 3s linear infinite;
}

/* sad */

.emoji--sad {
    cursor: pointer;
}

.emoji--sad:after {
    content: "Kurang Puas";
}
.emoji--sad .emoji__face {
    -webkit-animation: sad-face 2s ease-in infinite;
    animation: sad-face 2s ease-in infinite;
}
.emoji--sad .emoji__eyebrows {
    left: calc(50% - 3px);
    top: 35px;
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background: transparent;
    box-shadow: -40px 9px 0 0 #000000, -25px 0 0 0 #000000, 25px 0 0 0 #000000, 40px 9px 0 0 #000000;
}
.emoji--sad .emoji__eyebrows:before,
.emoji--sad .emoji__eyebrows:after {
    width: 30px;
    height: 20px;
    border: 6px solid #000000;
    box-sizing: border-box;
    border-radius: 50%;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    top: 2px;
    left: calc(50% - 15px);
}
.emoji--sad .emoji__eyebrows:before {
    margin-left: -30px;
    transform: rotate(-30deg);
}
.emoji--sad .emoji__eyebrows:after {
    margin-left: 30px;
    transform: rotate(30deg);
}
.emoji--sad .emoji__eyes {
    width: 14px;
    height: 16px;
    left: calc(50% - 7px);
    top: 50px;
    border-radius: 50%;
    background: transparent;
    box-shadow: 25px 0 0 0 #000000, -25px 0 0 0 #000000;
}
.emoji--sad .emoji__eyes:after {
    background: #548dff;
    width: 12px;
    height: 12px;
    margin-left: 6px;
    border-radius: 0 100% 40% 50%/0 50% 40% 100%;
    transform-origin: 0% 0%;
    -webkit-animation: tear-drop 2s ease-in infinite;
    animation: tear-drop 2s ease-in infinite;
}
.emoji--sad .emoji__mouth {
    width: 60px;
    height: 80px;
    left: calc(50% - 30px);
    top: 80px;
    box-sizing: border-box;
    border: 6px solid #000000;
    border-radius: 50%;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    background: transparent;
    -webkit-animation: sad-mouth 2s ease-in infinite;
    animation: sad-mouth 2s ease-in infinite;
}
.emoji--sad .emoji__mouth:after {
    width: 6px;
    height: 6px;
    background: transparent;
    border-radius: 50%;
    top: 4px;
    left: calc(50% - 3px);
    box-shadow: -18px 0 0 0 #000000, 18px 0 0 0 #000000;
}

/* angry */

.emoji--angry {
    cursor: pointer;
}
.emoji--angry {
    background: linear-gradient(#d5234c -10%, #ffda6a);
    background-size: 100%;
    -webkit-animation: angry-color 2s ease-in infinite;
    animation: angry-color 2s ease-in infinite;
}
.emoji--angry:after {
    content: "Tidak Puas";
}
.emoji--angry .emoji__face {
    -webkit-animation: angry-face 2s ease-in infinite;
    animation: angry-face 2s ease-in infinite;
}
.emoji--angry .emoji__eyebrows {
    left: calc(50% - 3px);
    top: 55px;
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background: transparent;
    box-shadow: -44px 5px 0 0 #000000, -7px 16px 0 0 #000000, 7px 16px 0 0 #000000, 44px 5px 0 0 #000000;
}
.emoji--angry .emoji__eyebrows:before,
.emoji--angry .emoji__eyebrows:after {
    width: 50px;
    height: 20px;
    border: 6px solid #000000;
    box-sizing: border-box;
    border-radius: 50%;
    border-top-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    top: 0;
    left: calc(50% - 25px);
}
.emoji--angry .emoji__eyebrows:before {
    margin-left: -25px;
    transform: rotate(15deg);
}
.emoji--angry .emoji__eyebrows:after {
    margin-left: 25px;
    transform: rotate(-15deg);
}
.emoji--angry .emoji__eyes {
    width: 12px;
    height: 12px;
    left: calc(50% - 6px);
    top: 70px;
    border-radius: 50%;
    background: transparent;
    box-shadow: 25px 0 0 0 #000000, -25px 0 0 0 #000000;
}
.emoji--angry .emoji__mouth {
    width: 36px;
    height: 18px;
    left: calc(50% - 18px);
    bottom: 15px;
    background: #000000;
    border-radius: 50%;
    -webkit-animation: angry-mouth 2s ease-in infinite;
    animation: angry-mouth 2s ease-in infinite;
}

@-webkit-keyframes heart-beat {
    25% {
        transform: scale(1.1);
    }
    75% {
        transform: scale(0.6);
    }
}

@keyframes heart-beat {
    25% {
        transform: scale(1.1);
    }
    75% {
        transform: scale(0.6);
    }
}
@-webkit-keyframes haha-face {
    10% {
        transform: translateY(25px);
    }
    20% {
        transform: translateY(15px);
    }
    30% {
        transform: translateY(25px);
    }
    40% {
        transform: translateY(15px);
    }
    50% {
        transform: translateY(25px);
    }
    60% {
        transform: translateY(0);
    }
    70% {
        transform: translateY(-10px);
    }
    80% {
        transform: translateY(0);
    }
    90% {
        transform: translateY(-10px);
    }
}
@keyframes haha-face {
    10% {
        transform: translateY(25px);
    }
    20% {
        transform: translateY(15px);
    }
    30% {
        transform: translateY(25px);
    }
    40% {
        transform: translateY(15px);
    }
    50% {
        transform: translateY(25px);
    }
    60% {
        transform: translateY(0);
    }
    70% {
        transform: translateY(-10px);
    }
    80% {
        transform: translateY(0);
    }
    90% {
        transform: translateY(-10px);
    }
}
@-webkit-keyframes haha-mouth {
    10% {
        transform: scale(0.6);
        top: 45%;
    }
    20% {
        transform: scale(0.8);
        top: 45%;
    }
    30% {
        transform: scale(0.6);
        top: 45%;
    }
    40% {
        transform: scale(0.8);
        top: 45%;
    }
    50% {
        transform: scale(0.6);
        top: 45%;
    }
    60% {
        transform: scale(1);
        top: 50%;
    }
    70% {
        transform: scale(1.2);
        top: 50%;
    }
    80% {
        transform: scale(1);
        top: 50%;
    }
    90% {
        transform: scale(1.1);
        top: 50%;
    }
}
@keyframes haha-mouth {
    10% {
        transform: scale(0.6);
        top: 45%;
    }
    20% {
        transform: scale(0.8);
        top: 45%;
    }
    30% {
        transform: scale(0.6);
        top: 45%;
    }
    40% {
        transform: scale(0.8);
        top: 45%;
    }
    50% {
        transform: scale(0.6);
        top: 45%;
    }
    60% {
        transform: scale(1);
        top: 50%;
    }
    70% {
        transform: scale(1.2);
        top: 50%;
    }
    80% {
        transform: scale(1);
        top: 50%;
    }
    90% {
        transform: scale(1.1);
        top: 50%;
    }
}
@-webkit-keyframes yay {
    25% {
        transform: rotate(-15deg);
    }
    75% {
        transform: rotate(15deg);
    }
}
@keyframes yay {
    25% {
        transform: rotate(-15deg);
    }
    75% {
        transform: rotate(15deg);
    }
}
@-webkit-keyframes wow-face {
    15%,
    25% {
        transform: rotate(20deg) translateX(-25px);
    }
    45%,
    65% {
        transform: rotate(-20deg) translateX(25px);
    }
    75%,
    100% {
        transform: rotate(0deg) translateX(0);
    }
}
@keyframes wow-face {
    15%,
    25% {
        transform: rotate(20deg) translateX(-25px);
    }
    45%,
    65% {
        transform: rotate(-20deg) translateX(25px);
    }
    75%,
    100% {
        transform: rotate(0deg) translateX(0);
    }
}
@-webkit-keyframes wow-brow {
    15%,
    65% {
        top: 25px;
    }
    75%,
    100%,
    0% {
        top: 15px;
    }
}
@keyframes wow-brow {
    15%,
    65% {
        top: 25px;
    }
    75%,
    100%,
    0% {
        top: 15px;
    }
}
@-webkit-keyframes wow-mouth {
    10%,
    30% {
        width: 20px;
        height: 20px;
        left: calc(50% - 10px);
    }
    50%,
    70% {
        width: 30px;
        height: 40px;
        left: calc(50% - 15px);
    }
    75%,
    100% {
        height: 50px;
    }
}
@keyframes wow-mouth {
    10%,
    30% {
        width: 20px;
        height: 20px;
        left: calc(50% - 10px);
    }
    50%,
    70% {
        width: 30px;
        height: 40px;
        left: calc(50% - 15px);
    }
    75%,
    100% {
        height: 50px;
    }
}
@-webkit-keyframes sad-face {
    25%,
    35% {
        top: -15px;
    }
    55%,
    95% {
        top: 10px;
    }
    100%,
    0% {
        top: 0;
    }
}
@keyframes sad-face {
    25%,
    35% {
        top: -15px;
    }
    55%,
    95% {
        top: 10px;
    }
    100%,
    0% {
        top: 0;
    }
}
@-webkit-keyframes sad-mouth {
    25%,
    35% {
        transform: scale(0.85);
        top: 70px;
    }
    55%,
    100%,
    0% {
        transform: scale(1);
        top: 80px;
    }
}
@keyframes sad-mouth {
    25%,
    35% {
        transform: scale(0.85);
        top: 70px;
    }
    55%,
    100%,
    0% {
        transform: scale(1);
        top: 80px;
    }
}
@-webkit-keyframes tear-drop {
    0%,
    100% {
        display: block;
        left: 35px;
        top: 15px;
        transform: rotate(45deg) scale(0);
    }
    25% {
        display: block;
        left: 35px;
        transform: rotate(45deg) scale(2);
    }
    49.9% {
        display: block;
        left: 35px;
        top: 65px;
        transform: rotate(45deg) scale(0);
    }
    50% {
        display: block;
        left: -35px;
        top: 15px;
        transform: rotate(45deg) scale(0);
    }
    75% {
        display: block;
        left: -35px;
        transform: rotate(45deg) scale(2);
    }
    99.9% {
        display: block;
        left: -35px;
        top: 65px;
        transform: rotate(45deg) scale(0);
    }
}
@keyframes tear-drop {
    0%,
    100% {
        display: block;
        left: 35px;
        top: 15px;
        transform: rotate(45deg) scale(0);
    }
    25% {
        display: block;
        left: 35px;
        transform: rotate(45deg) scale(2);
    }
    49.9% {
        display: block;
        left: 35px;
        top: 65px;
        transform: rotate(45deg) scale(0);
    }
    50% {
        display: block;
        left: -35px;
        top: 15px;
        transform: rotate(45deg) scale(0);
    }
    75% {
        display: block;
        left: -35px;
        transform: rotate(45deg) scale(2);
    }
    99.9% {
        display: block;
        left: -35px;
        top: 65px;
        transform: rotate(45deg) scale(0);
    }
}
@-webkit-keyframes hands-up {
    25% {
        transform: rotate(15deg);
    }
    50% {
        transform: rotate(-15deg) translateY(-10px);
    }
    75%,
    100% {
        transform: rotate(0deg);
    }
}
@keyframes hands-up {
    25% {
        transform: rotate(15deg);
    }
    50% {
        transform: rotate(-15deg) translateY(-10px);
    }
    75%,
    100% {
        transform: rotate(0deg);
    }
}
@-webkit-keyframes thumbs-up {
    25% {
        transform: rotate(20deg);
    }
    50%,
    100% {
        transform: rotate(5deg);
    }
}
@keyframes thumbs-up {
    25% {
        transform: rotate(20deg);
    }
    50%,
    100% {
        transform: rotate(5deg);
    }
}
@-webkit-keyframes angry-color {
    45%,
    60% {
        background-size: 250%;
    }
    85%,
    100%,
    0% {
        background-size: 100%;
    }
}
@keyframes angry-color {
    45%,
    60% {
        background-size: 250%;
    }
    85%,
    100%,
    0% {
        background-size: 100%;
    }
}
@-webkit-keyframes angry-face {
    35%,
    60% {
        transform: translateX(0) translateY(10px) scale(0.9);
    }
    40% {
        transform: translateX(-5px) translateY(10px) scale(0.9);
    }
    45% {
        transform: translateX(5px) translateY(10px) scale(0.9);
    }
    50% {
        transform: translateX(-5px) translateY(10px) scale(0.9);
    }
    55% {
        transform: translateX(5px) translateY(10px) scale(0.9);
    }
}
@keyframes angry-face {
    35%,
    60% {
        transform: translateX(0) translateY(10px) scale(0.9);
    }
    40% {
        transform: translateX(-5px) translateY(10px) scale(0.9);
    }
    45% {
        transform: translateX(5px) translateY(10px) scale(0.9);
    }
    50% {
        transform: translateX(-5px) translateY(10px) scale(0.9);
    }
    55% {
        transform: translateX(5px) translateY(10px) scale(0.9);
    }
}
@-webkit-keyframes angry-mouth {
    25%,
    50% {
        height: 6px;
        bottom: 25px;
    }
}
@keyframes angry-mouth {
    25%,
    50% {
        height: 6px;
        bottom: 25px;
    }
}

  </style>
<section class="exam">
    <div class="title">
      <h1 class="text-center">FORM SURVEY <br>KEPUASAAN MASYARAKAT</h1>
    </div>
    <div class="isi-survey">
    <div class="btn-wrap">
        <div id="Exams"></div>
      <div class="text-center">
        <div onclick="getAnswer(5)" class="emoji emoji--yay">
          <div class="emoji__face">
              <div class="emoji__eyebrows"></div>
              <div class="emoji__mouth"></div>
          </div>
      </div>
      <div onclick="getAnswer(4)" class="emoji emoji--haha">
          <div class="emoji__face">
              <div class="emoji__eyes"></div>
              <div class="emoji__mouth">
                  <div class="emoji__tongue"></div>
              </div>
          </div>
      </div>

      <div onclick="getAnswer(3)" class="emoji emoji--wow">
          <div class="emoji__face">
              <div class="emoji__eyebrows"></div>
              <div class="emoji__eyes"></div>
              <div class="emoji__mouth"></div>
          </div>
      </div>
      <div onclick="getAnswer(2)" class="emoji emoji--sad">
          <div class="emoji__face">
              <div class="emoji__eyebrows"></div>
              <div class="emoji__eyes"></div>
              <div class="emoji__mouth"></div>
          </div>
      </div>
      <div onclick="getAnswer(1)" class="emoji emoji--angry">
          <div class="emoji__face">
              <div class="emoji__eyebrows"></div>
              <div class="emoji__eyes"></div>
              <div class="emoji__mouth"></div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-between">
      <div class="btn-prev">
        <a href="/">
            <button class="learn-more">
                <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                </span>
                <span class="button-text">Previous</span>
            </button>
        </a>
    </div>
    {{-- <div>
      <div class="btn-next">
        <button onclick="sendData()" id="myBtn" class="learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="button-text">Finish</span>
        </button>
      </div>
    </div> --}}
  </div>
</section>
<script>
  let answers = []
  let question_id = null
  let currentQuestion = 1
  let isLastPage = false
  let data = JSON.parse(localStorage.getItem('data'))
  const listExam = document.querySelector('#Exams')

  const getlistExam = () => {
    fetch((`https://admin.skm.pcctabessmg.xyz/api/questions?page=${currentQuestion}`))
    .then((response) => {
       return response.json();
    }).then((responseJson) => {
        const data = responseJson.data.data[0]
        question_id = data.id
        isLastPage = responseJson.data.next_page_url ? false : true
        showListExam(data)
    }).catch((err) => {
      console.error(err);
    });
  }


  const showListExam = Exams => {
    listExam.innerHTML = "";
        listExam.innerHTML += `
        <h4 class="mb-4">KATEGORI : ${Exams.category.name}</h4>
        <h1 class="mb-4 text-center">${Exams.name}</h1>
       `
      };

    const getAnswer = value => {
        answers.push({question_id: question_id, answer: value})
        if (!isLastPage) {
            currentQuestion++
            getlistExam()
        } else {
            sendData()
        }
    }

    const sendData = () => {
        data.answers = answers

        fetch('https://admin.skm.pcctabessmg.xyz/api/respondent/add', {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => window.location.href = '/thanks');
        }

    document.addEventListener('DOMContentLoaded', getlistExam);

</script>
<style>
  .btn-wrap h1 {
    font-size: 18px;
    line-height: 30px;
}
.btn-wrap h4 {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}
</style>

@endsection
