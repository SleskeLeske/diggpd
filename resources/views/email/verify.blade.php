<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body style="background-color: #f6f6f6;">
        <h2 style="text-align:center; text-transform: uppercase; color: orange;">Bekreft kontoen din!</h2>

        <div>
            <p style="text-align:center;">Takk for at du registrerte deg hos Digg På Døren! <br> Vennligst følg linken under for å bekrefte kontoen din.</p>
            <div style="width:100%; margin-left: auto; margin-right: auto; height:auto;">
              <a style="width:40px; margin-left: auto; margin-right: auto; text-align:center; background-color: lightblue; color:blue;" href="{{ URL::to('register/verify/' . $confirmation_code) }}">Klikk her for å bekrefte!</a>.<br/>
            </div>
            <p style="text-align:center;">Hvis dette ikke er deg kan du ignorere denne mailen. <br> Vi takker for din tålmodighet og får å hjelpe oss å holde Digg På Døren nettsiden trygg! :)</p>
        </div>

    </body>
</html>
