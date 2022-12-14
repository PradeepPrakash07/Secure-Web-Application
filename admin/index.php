<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>

<body>
    <div id="wraper">
        <h1>Admin Login</h1>
        <hr>
        <form action="adminLogin.php" method="post">
        <div id="SSID">
            <div class="wifisvg">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 500 500" xml:space="preserve">

                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                        transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                        <path
                            d="M 36.137 34.78 c -9.589 0 -17.39 -7.801 -17.39 -17.39 C 18.747 7.801 26.548 0 36.137 0 s 17.39 7.801 17.39 17.39 C 53.527 26.979 45.726 34.78 36.137 34.78 z M 36.137 7 c -5.729 0 -10.39 4.661 -10.39 10.39 s 4.661 10.39 10.39 10.39 s 10.39 -4.661 10.39 -10.39 S 41.866 7 36.137 7 z"
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path
                            d="M 11.721 90 c -1.933 0 -3.5 -1.567 -3.5 -3.5 V 61.756 c 0 -11.14 9.063 -20.203 20.203 -20.203 h 15.427 c 6.92 0 13.29 3.505 17.039 9.375 c 1.084 1.698 1.904 3.539 2.438 5.471 c 0.516 1.862 -0.577 3.791 -2.44 4.306 c -1.86 0.519 -3.791 -0.576 -4.306 -2.44 c -0.349 -1.258 -0.884 -2.459 -1.593 -3.568 c -2.456 -3.847 -6.62 -6.143 -11.138 -6.143 H 28.424 c -7.28 0 -13.203 5.923 -13.203 13.203 V 86.5 C 15.221 88.433 13.654 90 11.721 90 z"
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path
                            d="M 60.554 90 c -1.933 0 -3.5 -1.567 -3.5 -3.5 v -2.236 c 0 -1.933 1.567 -3.5 3.5 -3.5 s 3.5 1.567 3.5 3.5 V 86.5 C 64.054 88.433 62.486 90 60.554 90 z"
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path
                            d="M 33.663 68.741 l 8.515 -8.515 c 1.367 -1.367 3.582 -1.367 4.949 0 c 1.367 1.366 1.367 3.583 0 4.949 l -2.54 2.54 h 33.693 c 1.933 0 3.5 1.567 3.5 3.5 s -1.567 3.5 -3.5 3.5 H 44.586 l 2.541 2.541 c 1.367 1.367 1.367 3.583 0 4.949 c -0.684 0.684 -1.579 1.025 -2.475 1.025 s -1.792 -0.342 -2.475 -1.025 l -8.515 -8.516 C 32.295 72.323 32.295 70.107 33.663 68.741 z"
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                </svg>
            </div>
            <input type="text" class="input" name="Name" id="SSIDform" placeholder="Name" required>
        </div>
        <div id="pass">
            <div class="locksvg">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500"
                    style="enable-background:new 0 0 470 470;" xml:space="preserve">
                    <g>
                        <circle cx="235" cy="312.5" r="157.5" />
                        <path d="M162.5,139.546V102.5c0-39.977,32.523-72.5,72.5-72.5s72.5,32.523,72.5,72.5v37.046c0.164,0.069,0.329,0.132,0.493,0.201
                c10.347,4.376,20.196,9.637,29.507,15.724V102.5C337.5,45.981,291.519,0,235,0S132.5,45.981,132.5,102.5v52.97
                c9.311-6.086,19.161-11.347,29.507-15.724C162.171,139.678,162.336,139.615,162.5,139.546z" />
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg>
            </div>
            <input type="password" class="input" name="pass" id="passform" required placeholder="Password">
        </div>
        <div id="submit_btns">

                <button type="submit" id="submitbtn" name = 'submit'>Submit</button>
            </form>
        </div>
    </div>
</body>

</html>