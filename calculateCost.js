
"use strict"
var $ = function(id){
    return document.getElementById(id);
};
var calculateCost = function(miles,gallons,price){
   var cost = (miles/gallons)*price;
   cost = cost.toFixed(1);
   return cost;
};
