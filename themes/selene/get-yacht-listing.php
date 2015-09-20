<?php /* Template Name: Get Yacht Listing */
ini_set('max_execution_time', 0);
save_yacht_listing('http://www.yachtworld.com/privatelabel/listing/cache/pl_search_results.jsp?slim=pp289556&cit=true&sm=3&is=false&man=Selene&fromLength=&toLength=&luom=126&fromYear=&toYear=&fromPrice=&toPrice=&currencyid=100&hmid=&ftid=&enid=&city=&spid=&rid=&cint=&msint=&ps=100&ErrorMessage=Please%20check%20one%20or%20more%20boats.', 0);

save_yacht_listing('http://www.yachtworld.com/core/listing/cache/pl_search_results.jsp?ywo=seleneyachtsnorthwest&ps=50&type=&new=&luom=126&hosturl=seleneyachtsnorthwest&page=broker&slim=pp289556&lineonly', 1);

fetch_yachtworld_detail();
fetch_yachtworld_images();