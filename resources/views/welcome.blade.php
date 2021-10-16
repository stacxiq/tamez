<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
        <style>
            h3,h4,p{
                font-family: 'Tajawal', sans-serif;
            }
            .card-header{
                font-size: 16px;
                font-family: 'Tajawal', sans-serif;
            }

            .center{
                display: flex;
    align-items: center;
    justify-content: center;
            }
            hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}
button{
    color: #fff;
}
#successAuth{
    font-size: 16px;
                font-family: 'Tajawal', sans-serif;
}
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
        <div class="container">
            <div class="alert alert-danger mt-3" id="error" style="display: none;"></div>
        </div>

            <div class="row center mt-5">

                <div class="col-md-10 ">

                <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                    <div class="card" id="verifyPhone">
                        <div class="card-header">
                
                            ادخل معلومات هاتفك للتئكيد 

                  
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" >رقم الهاتف</label>
                                    <input type="text" id="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div id="recaptcha-container"></div>
                                <br>
                                <button type="button" class="btn btn-primary text-white" onclick="sendOTP()">ارسال الكود</button>
                            </form>
                        </div>
                    </div>
                    <br> 

                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

                    <div class="card" id="verify" style="display:none">
                        <div class="card-header">
                
                            ادخل رمز التئكيد 

                  
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" > رمز التئكيد</label>
                                    <input type="text" id="verification" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <button type="button" class="btn btn-primary text-white" onclick="verify()">
                                تئكيد
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card" id="form" style="display:none">
                        <div class="card-header">
                            ادخل المعلومات الخاصه بك   
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" method="post" action="{{ route('participation.send') }}"> 
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" > الاسم </label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" > نوع الاشتراك </label>
                                    <select name="type" class="form-select" aria-label="Default select example">
                                        <option selected>
                                            اسبوعي
                                        </option>
                                        <option value="1">
                                            شهري
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" > البريد الالكتروني </label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" > رقم الهاتف  </label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary text-white">
                                ارسال
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>


    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAr4VUqc0IZ26_UKr7zthhAMMHMOgH1Zi8",
            authDomain: "youtupe-262308.firebaseapp.com",
            projectId: "youtupe-262308",
            storageBucket: "youtupe-262308.appspot.com",
            messagingSenderId: "600325069050",
            appId: "1:600325069050:web:85725d556ae30c82a99143"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
    setTimeout(() => {
        $("#successAuth").hide();
        $("#error").hide();
        $("#successOtpAuth").hide();
    }, 3000);

        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("تم ارسال الرساله ");
                $("#successAuth").show();
                $("#verifyPhone").hide();
                $("#verify").show();
                setTimeout(() => {
                    $("#successAuth").hide();
                    $("#error").hide();
                    $("#successOtpAuth").hide();
                }, 3000);
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("تم التئكد من صحه الكود");
                $("#successOtpAuth").show();
                $("#verify").hide();
                $("#form").show();

                setTimeout(() => {
                    $("#successAuth").hide();
                    $("#error").hide();
                    $("#successOtpAuth").hide();
                }, 3000);
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
    </body>
</html>
