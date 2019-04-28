<!DOCTYPE html>

<html>
    <head>
        <title> View Favorites </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script>
        /* global $*/
        function displayFavorites(keywordLink){
            // alert($(keywordLink).html());
            var keyword = $(keywordLink).html();
            // alert(keyword);
            $.ajax({
                    method: "get",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: {
                      "action": "favorites",
                      "keyword": keyword
                    },
                    success: function(data, status) {
                        // alert(data[0].iamgeURL);
                        $("#favorites").html("");
                        data.forEach(function(i){
                            $("#favorites").append("<img width='200' src='" +i.imageURL + "'></br>");
                        });    
                    
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                    //   alert(status);
                    }
                  });//ajax
            
            
        }
        
        $(document).ready(function(){
             $.ajax({
                    method: "get",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: {
                      "action": "keyword"
                    },
                    success: function(data, status) {
                        // alert(data[0].keyword);
                    
                        data.forEach(function(i){
                            // $("#keywords").append("<a onclick='displayFavorites(this)' href='#'>" +i.keyword + "</a></br>");
                            
                            $("#keywords").append("<a class='favorites' href='#'>" + i.keyword + "</a></br>");
                        });    
                    
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                      //alert(status);
                    }
                  });//ajax
                  
                  $("#keywords").on("click", ".favorites",function(){
                      
                      displayFavorites(this);
                      
                  });
        });
        </script>

    </head>
    <body>
        
        <h1>My Favorites</h1>
        
        <div id="keywords"></div>
        <div id="favorites"></div>
        
    </body>
</html>




