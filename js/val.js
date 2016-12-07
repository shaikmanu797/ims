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
        var dec = confirm("Do you really want to update this product?");
        if (dec) {
            document.productForm.action = "update?tab=2";
            document.productForm.submit();
        }
        else {
            return false;
        }
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

function changeDescr(id) {
    var id = document.getElementById(id);
    var conf = confirm('Are you sure about changing the description?');
    var descr = document.getElementById('descriptionId');
    if(conf){
        id.innerHTML = '<input type="hidden" name="description" value="filevalue" /><iframe src="upload.php" height="70px" width="383px" scrolling="auto" frameborder="0"></iframe>';
        var preview = document.getElementById('preview');
        preview.innerHTML = '<th style="color: red;">Message</th><td style="color: red;">If you do not want to change the description click on Go Back link above!!</td>';
    }
    else{
        return false;
    }
}