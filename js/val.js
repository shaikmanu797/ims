/**
 * Created by arcizon on 12/6/2016.
 */

function validateUpdate(id) {
    if (id == 1) {
        var dec = confirm("Do you really want to update this category?");
        if (dec) {
            document.categoryForm.action = "update?tab=1";
            document.categoryForm.submit();
        }
        else {
            return false;
        }
    }
    else if(id == 2){

    }
    else{
        var dec = confirm("Do you really want to update this location?");
        if (dec) {
            document.locationForm.action = "update?tab=3";
            document.locationForm.submit();
        }
        else {
            return false;
        }
    }
}

function validateDelete(id){
    if (id == 1) {
        var dec = confirm("Do you really want to delete this category?");
        if (dec) {
            document.categoryForm.action = "delete?tab=1";
            document.categoryForm.submit();
        }
        else {
            return false;
        }
    }
    else if(id == 2){
        var dec = confirm("Do you really want to delete this category?");
        if (dec) {
            document.productForm.action = "delete?tab=2";
            document.productForm.submit();
        }
        else {
            return false;
        }
    }
    else{
        var dec = confirm("Do you really want to delete this location?");
        if (dec) {
            document.locationForm.action = "delete?tab=3";
            document.locationForm.submit();
        }
        else {
            return false;
        }
    }
}