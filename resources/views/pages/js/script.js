var url = window.location.protocol + '//' + window.location.host;
var a = document.getElementsByTagName('a');
// この辺りでクリックイベントを解除すると(target="_blank")の解除もうまくいくかもしれない。
for(var i = 0; i < a.length; i++) {
    a[i].addEventListener("click", function(event) {
        var href = this.href;
        var path = (href.replace(url, ''));
        if (path.match('#')) {
            return;
        };
        event.preventDefault();
        path = btoa(unescape(encodeURIComponent(path)));
        window.parent.postMessage(path, 'https://app-burdock.localhost');
    });
};
