<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyApps</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            *{
                font-family: "Poppins", sans-serif;
                font-style: normal;
            }
            *::-webkit-scrollbar {
                width: 15px;
            }

            *::-webkit-scrollbar-track {
                background: #212529;
            }

            *::-webkit-scrollbar-thumb {
                background-color: grey;
                border-radius: 20px;
                border: 5px solid #212529;
            }
            .button{
                width: 120px;
                height: 50px;
                margin-right: 10px;
                margin-bottom: 10px;
                background-color: transparent;
                color: #fff;
                border-radius: 10px
            }
            .result{
                height: 70px;
                color: grey;
                background-color: transparent; 
                border-radius:10px;
                outline:none;
                text-align: right;
                border: none;
                font-size: 26pt;
                font-weight: bold;
                width: 100%;
            }
            a{
                text-decoration: none;
                color: grey;
            }
            a:hover{
                cursor: pointer;
                color: #fff;
            }
            .daftar-riwayat{
                display: flex;
                flex-direction: column;
                box-sizing: border-box;
                width: 100%;
                height: 250px;
                overflow-x: hidden;
                overflow-y: scroll;
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100" style="background-color:#000;">
            <img id="background"style="max-width:40%; position: absolute;" src="https://laravel.com/assets/img/welcome/background.svg"/>
                <div style="position:relative;" class="min-vh-100 d-flex flex-column align-items-center">
                    <nav class="p-5 d-flex justify-content-end align-items-center h-25 vw-100">
                        <a class="text-decoration-none text-white fw-bold">
                            Kalkulator App
                        </a>
                    </nav>

                    <form method="POST" action="/hitung" style="width:70%; box-sizing: border-box;">
                        @csrf
                        <div class="d-flex flex-column bg-dark text-secondary p-5" style="min-height:450px; border-radius:10px">
                            <div class="d-flex justify-content-end align-items-end border border-secondary" style="min-height:120px; box-sizing: border-box; border-radius:10px; padding-right:1rem; padding-bottom:1rem; padding-left:1rem;">
                           

                                <input id="result" type="text" name="result" class="result" autofocus readonly/> 
                            </div>

                            <div class="d-flex flex-row">
                                <div class="d-flex flex-column py-3">
                                    <div class="d-flex flex-row">
                                        <input class="button bg-secondary" type="button" onclick="clearScreen()" value="AC"/>
                                        <input class="button bg-secondary" type="button" onclick="display('%')" value="%"/>
                                        <button class="button bg-secondary" type="button" onclick="hapus()"><i class="fa-solid fa-delete-left"></i></button>
                                        <button class="button bg-secondary" type="button" onclick="appendOperator('/')"><i class="fa-solid fa-divide"></i></button>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <input class="button" type="button" onclick="display('7')" value="7"/>
                                        <input class="button" type="button" onclick="display('8')" value="8"/>
                                        <input class="button" type="button" onclick="display('9')" value="9"/>
                                        <button class="button bg-secondary" type="button" onclick="appendOperator('x')"><i class="fa-solid fa-x"></i></button>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <input class="button" type="button" onclick="display('4')" value="4"/>
                                        <input class="button" type="button" onclick="display('5')" value="5"/>
                                        <input class="button" type="button" onclick="display('6')" value="6"/>
                                        <button class="button bg-secondary" type="button" onclick="appendOperator('-')"><i class="fa-solid fa-minus"></i></button>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <input class="button" type="button" onclick="display('1')" value="1"/>
                                        <input class="button" type="button" onclick="display('2')" value="2"/>
                                        <input class="button" type="button" onclick="display('3')" value="3"/>
                                        <button class="button bg-secondary" type="button" onclick="appendOperator('+')"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <input class="button" type="button" onclick="display('00')" value="00"/> 
                                        <input class="button" type="button" onclick="display('0')" value="0"/>
                                        <input class="button" type="button" onclick="display('.')" value="."/>
                                        <input class="button bg-success" type="submit" value="="/>
                                    </div>
                                </div>
                            <div class="d-flex justify-content-start align-items-start border border-secondary my-3 flex-column" style="min-width:47%; box-sizing: content-box; border-radius:10px">
                                <div class="d-flex justify-content-between px-3 py-2 fs-6 border-bottom border-secondary w-100">
                                    <div>
                                        <i class="fa-solid fa-clock-rotate-left" ></i> 
                                        <span class="fs-5">History</span>
                                    </div>
                                    <a class="fs-5" onclick="clearRiwayat()">Clear</a>
                                </div>
                                <div class="daftar-riwayat">
                                    @foreach($data_riwayat as $item)
                                        <div class="ms-2 p-3 border-bottom border-secondary d-flex flex-column" onclick="display('{{ $item->hasil }}')"> 
                                            <a> {{ $item->operasi }} </a>
                                            <a class="text-white text-decoration-none fs-5"> = {{ $item->hasil }} </a>
                                        </div>
                                    @endforeach
                                <!-- {{ $data_riwayat }} -->
                                </div>
                            </div>
                            </div>

                        </div>
                    </form>

                    <footer class="py-4 text-center text-sm text-black dark:text-white/70">
                        Copyright@nurafiifalmasApps2024
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
var tambahOperator = false;
var tambahTitik = false;

function clearScreen() {
    tambahOperator = false;
    document.getElementById("result").value = "";
}

function display(value) {
   var resultValue = document.getElementById('result').value;
   if (resultValue.includes('.')) {
        if (value == ".") {
            if (!tambahTitik) {
                document.getElementById("result").value += value;
            }
        }else{
            document.getElementById("result").value += value;
        }
    }else{
        document.getElementById("result").value += value;
        tambahTitik = true;
    }
}

function appendOperator(operator) {
    var expression = document.getElementById("result").value;
    var lastChar = expression.slice(-1);

    if (lastChar == "+" || lastChar == "-" || lastChar == "x" || lastChar == "/") {
        if (lastChar !== operator) {
                expression = expression.slice(0, -1) + operator;
                document.getElementById("result").value = expression;
            }
        }else{
            document.getElementById("result").value += operator;
        }
}   

function hapus() {
   var resultValue = document.getElementById('result');
   resultValue.value = resultValue.value.slice(0,-1);
   if (
        resultValue.value.includes('+') || 
        resultValue.value.includes('-') || 
        resultValue.value.includes('*') || 
        resultValue.value.includes('/')
    ) {
        tambahOperator = true;
    }else{
        tambahOperator = false;
    }
}
function hitung() {
    var expression = document.getElementById("result").value;
    var result = eval(expression);
    document.getElementById("result").value = result;
}

function clearRiwayat() {
    $.ajax({
        type: "DELETE",
        url: "/hitung",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(data) {
            location.reload();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
</script>

@if(session('hasil'))
    <script>
        clearScreen();
        document.getElementById("result").value = '{{ session('hasil') }}';
    </script>
@endif
