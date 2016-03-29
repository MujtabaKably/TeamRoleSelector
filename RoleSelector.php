<?php
phpinfo()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Role Selector</title>
    <script type="text/javascript" src="Include/jquery/jquery-2.2.2.min.js" language="JavaScript"/>
    <script type="text/javascript" src="Include/bootstrap/js/bootstrap.min.js" language="JavaScript"></script>
    <link rel="stylesheet" href="Include/bootstrap/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="Include/MyStyles.css" type="text/css"/>
    <script type="text/javascript" language="javascript">
        var PlayerNames = [];
        $(document).ready(function () {
            $(".Add").click(function(){
                AddNewPlayer(this);
            });
            $(".Refresh").click(function () {
                $(".MyClass").html("");
                PlayerNames = [];
            });
            $(".ShuffleRoles").click(function () {
                shufflePlayers();
            });
        });
        function AddNewPlayer(btn){
            var PlayerName = $($(btn).parent().parent().find(".form-control")).val();
            if(PlayerName.trim() != "" && $(".MyClass").children().length < 5 ){
                var NewPlayerHTML = '<li class="list-group-item">';
                NewPlayerHTML += "" + PlayerName.toUpperCase() + "";
                NewPlayerHTML += "</li>";
                PlayerNames.push(PlayerName.toUpperCase());
                $(".MyClass").append(NewPlayerHTML);
                $($(btn).parent().parent().find(".form-control")).val("");
                $($(btn).parent().parent().find(".form-control")).focus();
            }
        }
        function shufflePlayers() {
            if ($(".MyClass").children().length == 5){
                var ColorArray = ["success", "info", "primary", "warning", "danger"];
                var RoleArray = ["Position 1 (HARD Carry)","Position 2 (Mid / Semi-Carry)","Position 3 (Off-Laner)","Position 4 (Support)","Position 5 (HARD SUPPORT)"];
                var PositionArray = [1, 2, 3, 4, 5];
                PositionArray = ShufflePositions(PositionArray);
                for(var i = 0;i < 5;i++){
                    $($(".MyClass").children()[i]).removeClass();
                    $($(".MyClass").children()[i]).addClass("list-group-item");
                    $($(".MyClass").children()[i]).addClass("list-group-item-" + ColorArray[PositionArray[i]-1]);
                    $($(".MyClass").children()[i]).html("");
                    $($(".MyClass").children()[i]).html( "<h6>" + PlayerNames[i] + '  <span class="FontSize16 pull-right label label-' + ColorArray[PositionArray[i]-1] + '">' + RoleArray[PositionArray[i]-1] + "</span></h6>");
                }
            }
        }
        function ShufflePositions(Array){
            var counter = Array.length;
            while (counter > 0) {
                var index = Math.floor(Math.random() * counter);
                counter--;
                var temp = Array[counter];
                Array[counter] = Array[index];
                Array[index] = temp;
            }
            return Array;
        }
    </script>
</head>
<body>
    <div class="container-fluid" >
        <div class="page-header">
            <h2>Role Selector</h2>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><b>Player Name</b></span>
                    <input type="text" class="form-control" placeholder="Player Name"/>
                    <span class="input-group-btn">
                        <button class="btn btn-default Add" type="button" >
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        <button class="btn btn-default Refresh" type="button" >
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
                <ul class="list-group MyClass">

                </ul>
            </div>
        </div>
        <div class="row AlignCenter Margin25px" >
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10   col-xs-12">
                <button type="button" class="btn btn-primary ShuffleRoles">
                    <span class="glyphicon glyphicon-refresh"></span>
                    Shuffle Roles
                </button>
            </div>
        </div>
    </div>
</body>
</html>