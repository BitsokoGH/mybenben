

(function() {
    // Adding docReady
    // https://github.com/jfriend00/docReady
    (function(e,t){function s(){if(!r){r=true;for(var e=0;e<n.length;e++){n[e].fn.call(window,n[e].ctx)}n=[]}}function o(){if(document.readyState==="complete"){s()}}e=e||"docReady";t=t||window;var n=[];var r=false;var i=false;t[e]=function(e,t){if(r){setTimeout(function(){e(t)},1);return}else{n.push({fn:e,ctx:t})}if(document.readyState==="complete"){setTimeout(s,1)}else if(!i){if(document.addEventListener){document.addEventListener("DOMContentLoaded",s,false);window.addEventListener("load",s,false)}else{document.attachEvent("onreadystatechange",o);window.attachEvent("onload",s)}i=true}}})("docReady",window)

    // When the DOM is ready
    docReady(function(){
        

        // Add the noscript tag to the DOM
        var noscriptHtml = '<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=577436002379856&amp;ev=NoScript" /></noscript>',
            noscriptDiv = document.createElement( "div" );
        noscriptDiv.innerHTML = noscriptHtml;
        document.querySelector( "body" ).appendChild( noscriptDiv.firstChild );

        var _fbq = window._fbq || (window._fbq = []);
        if (!_fbq.loaded) {
            var fbds = document.createElement('script');
            fbds.async = true;
            fbds.src = '//connect.facebook.net/en_US/fbds.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(fbds, s);
            _fbq.loaded = true;
        }
        _fbq.push(['addPixelId', 577436002379856]);
        _fbq.push(['track', 'PixelInitialized', {}]);

        
    });
})();