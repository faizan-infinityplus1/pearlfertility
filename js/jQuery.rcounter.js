!(function (t) {
  "use strict";
  t.fn.rCounter = function (e) {
    var n = t.extend({ duration: 20, easing: "swing" }, e);
    return this.each(function () {
      var e = t(this);
      e.waypoint(
        function () {
          for (
            var t = [],
              i = (e.length, e.text()),
              r = /[,\-]/.test(i),
              o = /[,\-]/.test(i),
              s = ((i = i.replace(/,/g, "")), n.duration),
              a = o ? (i.split(".")[1] || []).length : 0,
              u = s;
            u >= 1;
            u--
          ) {
            var f = parseInt((i / s) * u);
            if (o) f = parseFloat((i / s) * u).toFixed(a);
            else if (r)
              for (; /(\d+)(\d{3})/.test(f.toString()); )
                f = f.toString().replace(/(\d+)(\d{3})/, "$1,$2");
            t.unshift(f);
          }
          var c = function () {
            e.text(t.shift()), setTimeout(c, n.duration);
          };
          setTimeout(c, n.duration);
        },
        { offset: "100%", triggerOnce: !0 }
      );
    });
  };
})(jQuery);
