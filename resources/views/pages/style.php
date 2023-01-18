<style>

    .section-bg {
        background-color: #f7fbfe;
        padding-top: 30px;
    }

    /* Jumbotron */
    .jumbotron {
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/assets/dist/img/DSCF0253.JPG');
        background-size: cover;
        height: 540px;
        text-align: center;
        position: relative;
    }
    .status-merah {
            padding: 8px;
            border-radius: 5px;
            background-color: #f44336;
            color: black;
        }

        .status-kuning {
            padding: 8px;
            border-radius: 5px;
            background-color: #ffc400;
            color: black;
        }

        .status-oren {
            padding: 8px;
            border-radius: 5px;
            background-color: #ff9933;
            color: black;
        }

        .status-hijau {
            padding: 8px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: black;
        }

    /* .jumbotron::after {
    content: '';
    display: block;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
    position: absolute;
    bottom: 0;
  } */

    .jumbotron .display-4 {
        color: white !important;
        margin-top: 150px;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        font-size: 32px;
        margin-bottom: 30px;
    }

    .jumbotron .display-4 span {
        font-weight: 500;
    }


    /* what wedo */

    .section-title {
        text-align: center;
        /* padding-bottom: 30px; */
    }

    .section-title h2 {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 20px;
        position: relative;
    }

    /* .section-title h2::before {
        content: "";
        position: absolute;
        display: block;
        width: 120px;
        height: 1px;
        background: #ddd;
        bottom: 1px;
        left: calc(50% - 60px);
    } */

    /* .section-title h2::after {
        content: "";
        position: absolute;
        display: block;
        width: 40px;
        height: 3px;
        background: #6cc643;
        bottom: 0;
        left: calc(50% - 20px);
    } */

    .section-title p {
        margin-bottom: 0;
    }

    .fasilitas .icon-box {
        text-align: center;
        padding: 30px 20px;
        transition: all ease-in-out 0.3s;
        background: #fff;
        height: 160px;
    }

    .fasilitas .icon-box .icon {
        margin: 0 auto;
        width: 64px;
        height: 64px;
        background: #eeffe6;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        transition: ease-in-out 0.3s;
    }

    .fasilitas .icon-box .icon i {
        /* color: #6cc643; */
        color: #33b62e;
        font-size: 28px;
    }

    .fasilitas .icon-box h4 {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 24px;
    }

    .fasilitas .icon-box h4 a {
        color: #384046;
        transition: ease-in-out 0.3s;
    }


    .fasilitas .icon-box:hover {
        border-color: #fff;
        box-shadow: 0px 0 25px 0 rgba(0, 0, 0, 0.1);
    }

    .fasilitas .icon-box:hover h4 a,
    .fasilitas .icon-box:hover .icon i {
        color: #33b62e;
        text-decoration: none;
    }

    /* last what we do */
    /*--------------------------------------------------------------
# spesifikasi Us Section
--------------------------------------------------------------*/
    .spesifikasi .content h3 {
        font-weight: 700;
        font-size: 32px;
        font-family: var(--font-secondary);
        color: #384046;
    }

    .spesifikasi .content ul {
        list-style: none;
        padding: 0;
    }

    .spesifikasi .content ul li {
        display: flex;
        align-items: flex-start;
        margin-top: 40px;
    }

    .spesifikasi .content ul i {
        flex-shrink: 0;
        font-size: 48px;
        color: #6cc643;
        margin-right: 20px;
        line-height: 0;
    }

    .spesifikasi .content ul h5 {
        font-size: 24px;
        font-weight: 700;
        color: #384046;
        margin-top: -10px;
    }

    .spesifikasi .content ul p {
        font-size: 15px;
    }

    .spesifikasi .content p:last-child {
        margin-bottom: 0;
    }

    .spesifikasi .play-btn {
        width: 94px;
        height: 94px;
        background: radial-gradient(var(--color-primary) 50%, rgba(13, 66, 255, 0.4) 52%);
        border-radius: 50%;
        display: block;
        position: absolute;
        left: calc(50% - 47px);
        top: calc(50% - 47px);
        overflow: hidden;
    }

    .spesifikasi .play-btn:before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
        -webkit-animation: pulsate-btn 2s;
        animation: pulsate-btn 2s;
        -webkit-animation-direction: forwards;
        animation-direction: forwards;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: steps;
        animation-timing-function: steps;
        opacity: 1;
        border-radius: 50%;
        border: 5px solid rgba(13, 66, 255, 0.7);
        top: -15%;
        left: -15%;
        background: rgba(198, 16, 0, 0);
    }

    .spesifikasi .play-btn:after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 100;
        transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    .spesifikasi .play-btn:hover:before {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border: none;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 200;
        -webkit-animation: none;
        animation: none;
        border-radius: 0;
    }

    @-webkit-keyframes pulsate-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }

    @keyframes pulsate-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }

    /*--------------------------------------------------------------
# harga
--------------------------------------------------------------*/
    .harga .icon-box {
        padding: 70px;
        margin: 10;
        border-radius: 6px;
        background: #fff;
        transition: ease-in-out 0.3s;
        box-shadow: 0px 2px 22px rgba(0, 0, 0, 0.2);
    }

    /* .harga .icon-box i {
        float: left;
        color: #33b62e;
        font-size: 40px;
        line-height: 0;

    } */

    .harga .icon-box h3 {
        font-weight: 700;
        margin-bottom: 20px;
        margin-top: -25px;
        margin-left: 22px;
        font-size: 25px;
    }

    .harga .icon-box p {
        margin-top: -20px;
        margin-left: 5px;
        margin-left: 22px;
    }

    .harga .icon-box h4 {
        float: left;
        font-size: 48px;
        margin-left: 30px;
        line-height: 24px;
        margin-bottom: 25px;
        text-align: center;
        color: #33b62e;
    }

    .harga .icon-box h4 sup {
        font-size: 28px;
        margin-left: -40px;
    }

    .harga .icon-box h4 sub {
        font-size: 20px;
        color: #384046;
    }

    .harga .icon-box:hover {
        box-shadow: 0px 2px 22px rgba(0, 0, 0, 0.08);
    }

    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 4px solid #2980b9;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
    }

    /* top left*/
    .ribbon-top-left {
        top: -5px;
        left: 12px;
    }

    .ribbon-top-left::before,
    .ribbon-top-left::after {
        border-top-color: transparent;
        border-left-color: transparent;
    }

    .ribbon-top-left::before {
        top: 0;
        right: 0;
    }

    .ribbon-top-left::after {
        bottom: 0;
        left: 0;
    }

    .ribbon-top-left span {
        right: -25px;
        top: 30px;
        transform: rotate(-45deg);
    }

    /* Utility */
    .btn.tombol {
        border-color: none;
        background-color: #33b62e;
        color: #fff;
        letter-spacing: 0.2ch;
        text-transform: uppercase;


    }


    /* DESKTOP VERSION */
    @media (min-width: 992px) {
        .navbar {
            z-index: 99;
        }
        
        .nav-link {
            text-transform: uppercase;
            margin-right: 30px;
            

        }

        /* .nav-link:hover::after {
            content: '';
            display: block;
            border-bottom: 3px solid #33b62e;
            width: 50%;
            margin: auto;
            padding-bottom: 5px;
            margin-bottom: -8px;
        } */

        .jumbotron {
            margin-top: -10px;
            height: 650px;
        }

        .jumbotron .display-4 {
            margin-bottom: 50px;
            font-size: 60px;
        }
    }

    /* END DESKTOP VERSION */
</style>
