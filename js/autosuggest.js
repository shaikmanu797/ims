/**
 * Created by arcizon on 12/2/2016.
 */

function category(){
    $('#catId').keyup(function() {
        $('#catId').autocomplete({
            source:'../model/programs/searchCategory'
        });
    });
}

function loc(){
    $('#locId').keyup(function() {
        $('#locId').autocomplete({
            source:'../model/programs/searchLocation'
        });
    });
}