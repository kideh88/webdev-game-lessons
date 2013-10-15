
var iTotalGold = 0;
var iTotalFood = 0;
var iTotalWood = 0;

var oSelectedElement = null;

$('.Resource').draggable({
    delay: 300
});

$('.Worker').click(function(event){
    event.stopPropagation();
    $parent = $(this).parent();
    if($parent.hasClass('Resource') == true)
    {
        $(this).appendTo(".Game");
        $(this).css({top: $parent.position().top, left: $parent.position().left});
    }
    oSelectedElement = $(this);
    $(this).addClass('Selected');
});


$('.Resource').click(function(){
    var iPositionX = $(this).position().left;
    var iPositionY = $(this).position().top;
    var theResource = $(this);
    if(oSelectedElement != null)
    {
        console.log('Yes, ge the worker here');
        $(oSelectedElement).animate({
            top: iPositionY,
            left: iPositionX
        }, 3000, function(){

            if($(theResource).hasClass('GoldMine'))
            {
                $(this).removeClass('Selected').addClass('GoldMiner');
            }
            if($(theResource).hasClass('Farm'))
            {
                $(this).removeClass('Selected').addClass('Farmer');
            }
            if($(theResource).hasClass('Forest'))
            {
                $(this).removeClass('Selected').addClass('Choppers');
            }



            $(this).css({top: 0, left: 0});
            $(this).appendTo($(theResource));
        });
    }
});


function SetTotalResources() {
    $('.Resource').each(function(){
        switch($(this).attr('data-type'))
        {
            case 'GoldMine':
            {
                var iNumberOfGoldMiners = $('.GoldMine').children().length;
                iTotalGold = iTotalGold + iNumberOfGoldMiners;
                $('#LblTotalGold').text(iTotalGold);
                break;
            }
            case 'Farm':
            {
                var iNumberOfFarmers = $('.Farm').children().length;
                iTotalFood = iTotalFood + iNumberOfFarmers;
                $('#LblTotalFood').text(iTotalFood);
                break;
            }
            case 'Forest':
            {
                var iNumberOfChoppers = $('.Forest').children().length;
                iTotalWood = iTotalWood + iNumberOfChoppers;
                $('#LblTotalWood').text(iTotalWood);

                break;
            }
        }
    });
}

setInterval(function(){
    SetTotalResources();
}, 2000);


function getWorkersXml() {
    var strWorkersXml = '<workers>';
    var intI = 1;
    $('.Worker').each(function() {
        if(!$(this).parent().hasClass('Game')){
            objElement = $(this).parent();
        }
        else{
            objElement = $(this);
        }
        strWorkersXml += '<worker>';
        strWorkersXml += '<id>W' + intI + '</id>';
        strWorkersXml += '<x>' + objElement.position().left + '</x>';
        strWorkersXml += '<y>' + objElement.position().top + '</y>';
        strWorkersXml += '</worker>';
        intI += 1;
    });
    strWorkersXml += '</workers>';

    return strWorkersXml;
}

function getResourceXml() {
    var strResourceXml = '<resources>';
    strResourceXml += '<gold>' + iTotalGold + '</gold>';
    strResourceXml += '<food>' + iTotalFood + '</food>';
    strResourceXml += '<wood>' + iTotalWood + '</wood>';
    strResourceXml += '</resources>';

    return strResourceXml;
}

var teacherInterval;
var intPlayerId = document.getElementById('myHiddenId').value;
function runTeacherInterval() {
    teacherInterval = setInterval(function(){

        var intEnemyPlayerId = document.getElementById('enemyHiddenId').value;

        var sMyGameXml = getWorkersXml() + getResourceXml();
//        console.log(sMyGameXml);
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