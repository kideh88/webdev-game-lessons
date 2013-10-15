<!DOCTYPE html>
<html>

<head>
    <title>Awesome Game</title>

</head>


<body>

<div class="Game">

    <input type="hidden" value="9" id="myHiddenId" />
    <p>My enemy id:</p>
    <input type="text" value="7" id="enemyHiddenId" />
    <br/>
    <p>My input number:</p>
    <input type="text" value="" id="numberfield" />
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
    var teacherInterval;

    function runTeacherInterval() {
        teacherInterval = setInterval(function(){

            var intPlayerId = document.getElementById('myHiddenId').value;
            var intEnemyPlayerId = document.getElementById('enemyHiddenId').value;

            var strInputValue = document.getElementById('numberfield').value;
            var sMyGameXml = "<game><number>" + strInputValue + "</number></game>";
            $.ajax({
                type: 'post',
                url: 'bridge.php',
                data: {"iPlayerId" : intPlayerId, "iVsPlayerId" : intEnemyPlayerId, "theGame": sMyGameXml},
                success: function(data){
                    console.log(data);
                }
            });
        }, 500);
    }

    function stopTeacherInterval() {
        clearInterval(teacherInterval);
    }

//    var myCustomInterval = setInterval(function(){
//
//        var intPlayerId = document.getElementById('myHiddenId').value;
//        var intEnemyPlayerId = document.getElementById('enemyHiddenId').value;
//
//        var strInputValue = document.getElementById('numberfield').value;
//        var sMyGameXml = "<game><number>" + strInputValue + "</number></game>";
//        $.ajax({
//            type: 'post',
//            url: 'components/bridge.php',
//            data: {"intPlayerId" : intPlayerId, "intEnemyPlayerId" : intEnemyPlayerId, "theGame": sMyGameXml},
//            success: function(data){
//                console.log(data);
//            }
//        });
//    }, 500);

        </script>
    </body>


</html>



