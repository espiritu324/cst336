/*global $*/
var partyNames, numPeople, mealPlan, mealPrice, mealChoice;
var lunchBuffet = 50, dinnerBuffet = 120, lunchPlate = 35, dinnerPlate = 75;

             let q5_response = "";
                   $(".active").on( "click", function() {
                          $(".active").css("background-color","");
                          $(this).css("background-color","yellow");
                          $(this).css("padding","10px");
                          alert($(this).attr("id"));
                          q5_response = $(this).attr("id");
                    });
        
 $("#submitButton").on( "click", function() {
     
    partyNames = $("#q1").val() + " & " + $("#q2").val() + "'s Wedding Plans";
     $("#party").html("<h2>"+partyNames+"</h2>");
     
     numPeople = $("input[name=q3]:checked").val();
     //alert(numPeople);
     
     mealPlan =  $("#q4").val();
     if(mealPlan=="Casual Lunch Buffet"){
         mealPrice = lunchBuffet * numPeople;
     }else if(mealPlan=="Fancy Dinner Buffet"){
         mealPrice = dinnerBuffet * numPeople;
     }else if(mealPlan=="Casual Lunch Plated Meal"){
         mealPrice = lunchPlate * numPeople;
     }else if(mealPlan=="Fancy Dinner Plated Meal"){
         mealPrice = dinnerPlate * numPeople;
     }
     //alert(mealPrice);
      mealChoice = "You selected: " + mealPlan + " at the price of $" + mealPrice/numPeople + " each with a total of $" + 
      mealPrice + " for you recepetion";
       $("#mealSelection").html(mealChoice);
      
      
 });