/**
 * Created by arcizon on 12/2/2016.
 */
function iframeLoaded(frameid) {
        var iFrameID = document.getElementById(frameid);
        if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
        }
}