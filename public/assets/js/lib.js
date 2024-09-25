/*! jQuery v2.1.1 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */ !(function (
    a,
    b,
) {
    "object" == typeof module && "object" == typeof module.exports
        ? (module.exports = a.document
              ? b(a, !0)
              : function (a) {
                    if (!a.document)
                        throw new Error(
                            "jQuery requires a window with a document",
                        );
                    return b(a);
                })
        : b(a);
})("undefined" != typeof window ? window : this, function (a, b) {
    var c = [],
        d = c.slice,
        e = c.concat,
        f = c.push,
        g = c.indexOf,
        h = {},
        i = h.toString,
        j = h.hasOwnProperty,
        k = {},
        l = a.document,
        m = "2.1.1",
        n = function (a, b) {
            return new n.fn.init(a, b);
        },
        o = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        p = /^-ms-/,
        q = /-([\da-z])/gi,
        r = function (a, b) {
            return b.toUpperCase();
        };
    (n.fn = n.prototype =
        {
            jquery: m,
            constructor: n,
            selector: "",
            length: 0,
            toArray: function () {
                return d.call(this);
            },
            get: function (a) {
                return null != a
                    ? 0 > a
                        ? this[a + this.length]
                        : this[a]
                    : d.call(this);
            },
            pushStack: function (a) {
                var b = n.merge(this.constructor(), a);
                return (b.prevObject = this), (b.context = this.context), b;
            },
            each: function (a, b) {
                return n.each(this, a, b);
            },
            map: function (a) {
                return this.pushStack(
                    n.map(this, function (b, c) {
                        return a.call(b, c, b);
                    }),
                );
            },
            slice: function () {
                return this.pushStack(d.apply(this, arguments));
            },
            first: function () {
                return this.eq(0);
            },
            last: function () {
                return this.eq(-1);
            },
            eq: function (a) {
                var b = this.length,
                    c = +a + (0 > a ? b : 0);
                return this.pushStack(c >= 0 && b > c ? [this[c]] : []);
            },
            end: function () {
                return this.prevObject || this.constructor(null);
            },
            push: f,
            sort: c.sort,
            splice: c.splice,
        }),
        (n.extend = n.fn.extend =
            function () {
                var a,
                    b,
                    c,
                    d,
                    e,
                    f,
                    g = arguments[0] || {},
                    h = 1,
                    i = arguments.length,
                    j = !1;
                for (
                    "boolean" == typeof g &&
                        ((j = g), (g = arguments[h] || {}), h++),
                        "object" == typeof g || n.isFunction(g) || (g = {}),
                        h === i && ((g = this), h--);
                    i > h;
                    h++
                )
                    if (null != (a = arguments[h]))
                        for (b in a)
                            (c = g[b]),
                                (d = a[b]),
                                g !== d &&
                                    (j &&
                                    d &&
                                    (n.isPlainObject(d) || (e = n.isArray(d)))
                                        ? (e
                                              ? ((e = !1),
                                                (f =
                                                    c && n.isArray(c) ? c : []))
                                              : (f =
                                                    c && n.isPlainObject(c)
                                                        ? c
                                                        : {}),
                                          (g[b] = n.extend(j, f, d)))
                                        : void 0 !== d && (g[b] = d));
                return g;
            }),
        n.extend({
            expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function (a) {
                throw new Error(a);
            },
            noop: function () {},
            isFunction: function (a) {
                return "function" === n.type(a);
            },
            isArray: Array.isArray,
            isWindow: function (a) {
                return null != a && a === a.window;
            },
            isNumeric: function (a) {
                return !n.isArray(a) && a - parseFloat(a) >= 0;
            },
            isPlainObject: function (a) {
                return "object" !== n.type(a) || a.nodeType || n.isWindow(a)
                    ? !1
                    : a.constructor &&
                        !j.call(a.constructor.prototype, "isPrototypeOf")
                      ? !1
                      : !0;
            },
            isEmptyObject: function (a) {
                var b;
                for (b in a) return !1;
                return !0;
            },
            type: function (a) {
                return null == a
                    ? a + ""
                    : "object" == typeof a || "function" == typeof a
                      ? h[i.call(a)] || "object"
                      : typeof a;
            },
            globalEval: function (a) {
                var b,
                    c = eval;
                (a = n.trim(a)),
                    a &&
                        (1 === a.indexOf("use strict")
                            ? ((b = l.createElement("script")),
                              (b.text = a),
                              l.head.appendChild(b).parentNode.removeChild(b))
                            : c(a));
            },
            camelCase: function (a) {
                return a.replace(p, "ms-").replace(q, r);
            },
            nodeName: function (a, b) {
                return (
                    a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase()
                );
            },
            each: function (a, b, c) {
                var d,
                    e = 0,
                    f = a.length,
                    g = s(a);
                if (c) {
                    if (g) {
                        for (; f > e; e++)
                            if (((d = b.apply(a[e], c)), d === !1)) break;
                    } else
                        for (e in a)
                            if (((d = b.apply(a[e], c)), d === !1)) break;
                } else if (g) {
                    for (; f > e; e++)
                        if (((d = b.call(a[e], e, a[e])), d === !1)) break;
                } else
                    for (e in a)
                        if (((d = b.call(a[e], e, a[e])), d === !1)) break;
                return a;
            },
            trim: function (a) {
                return null == a ? "" : (a + "").replace(o, "");
            },
            makeArray: function (a, b) {
                var c = b || [];
                return (
                    null != a &&
                        (s(Object(a))
                            ? n.merge(c, "string" == typeof a ? [a] : a)
                            : f.call(c, a)),
                    c
                );
            },
            inArray: function (a, b, c) {
                return null == b ? -1 : g.call(b, a, c);
            },
            merge: function (a, b) {
                for (var c = +b.length, d = 0, e = a.length; c > d; d++)
                    a[e++] = b[d];
                return (a.length = e), a;
            },
            grep: function (a, b, c) {
                for (var d, e = [], f = 0, g = a.length, h = !c; g > f; f++)
                    (d = !b(a[f], f)), d !== h && e.push(a[f]);
                return e;
            },
            map: function (a, b, c) {
                var d,
                    f = 0,
                    g = a.length,
                    h = s(a),
                    i = [];
                if (h)
                    for (; g > f; f++)
                        (d = b(a[f], f, c)), null != d && i.push(d);
                else for (f in a) (d = b(a[f], f, c)), null != d && i.push(d);
                return e.apply([], i);
            },
            guid: 1,
            proxy: function (a, b) {
                var c, e, f;
                return (
                    "string" == typeof b && ((c = a[b]), (b = a), (a = c)),
                    n.isFunction(a)
                        ? ((e = d.call(arguments, 2)),
                          (f = function () {
                              return a.apply(
                                  b || this,
                                  e.concat(d.call(arguments)),
                              );
                          }),
                          (f.guid = a.guid = a.guid || n.guid++),
                          f)
                        : void 0
                );
            },
            now: Date.now,
            support: k,
        }),
        n.each(
            "Boolean Number String Function Array Date RegExp Object Error".split(
                " ",
            ),
            function (a, b) {
                h["[object " + b + "]"] = b.toLowerCase();
            },
        );

    function s(a) {
        var b = a.length,
            c = n.type(a);
        return "function" === c || n.isWindow(a)
            ? !1
            : 1 === a.nodeType && b
              ? !0
              : "array" === c ||
                0 === b ||
                ("number" == typeof b && b > 0 && b - 1 in a);
    }
    var t = (function (a) {
        var b,
            c,
            d,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l,
            m,
            n,
            o,
            p,
            q,
            r,
            s,
            t,
            u = "sizzle" + -new Date(),
            v = a.document,
            w = 0,
            x = 0,
            y = gb(),
            z = gb(),
            A = gb(),
            B = function (a, b) {
                return a === b && (l = !0), 0;
            },
            C = "undefined",
            D = 1 << 31,
            E = {}.hasOwnProperty,
            F = [],
            G = F.pop,
            H = F.push,
            I = F.push,
            J = F.slice,
            K =
                F.indexOf ||
                function (a) {
                    for (var b = 0, c = this.length; c > b; b++)
                        if (this[b] === a) return b;
                    return -1;
                },
            L =
                "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            M = "[\\x20\\t\\r\\n\\f]",
            N = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            O = N.replace("w", "w#"),
            P =
                "\\[" +
                M +
                "*(" +
                N +
                ")(?:" +
                M +
                "*([*^$|!~]?=)" +
                M +
                "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
                O +
                "))|)" +
                M +
                "*\\]",
            Q =
                ":(" +
                N +
                ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
                P +
                ")*)|.*)\\)|)",
            R = new RegExp(
                "^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$",
                "g",
            ),
            S = new RegExp("^" + M + "*," + M + "*"),
            T = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
            U = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"),
            V = new RegExp(Q),
            W = new RegExp("^" + O + "$"),
            X = {
                ID: new RegExp("^#(" + N + ")"),
                CLASS: new RegExp("^\\.(" + N + ")"),
                TAG: new RegExp("^(" + N.replace("w", "w*") + ")"),
                ATTR: new RegExp("^" + P),
                PSEUDO: new RegExp("^" + Q),
                CHILD: new RegExp(
                    "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
                        M +
                        "*(even|odd|(([+-]|)(\\d*)n|)" +
                        M +
                        "*(?:([+-]|)" +
                        M +
                        "*(\\d+)|))" +
                        M +
                        "*\\)|)",
                    "i",
                ),
                bool: new RegExp("^(?:" + L + ")$", "i"),
                needsContext: new RegExp(
                    "^" +
                        M +
                        "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
                        M +
                        "*((?:-\\d)?\\d*)" +
                        M +
                        "*\\)|)(?=[^-]|$)",
                    "i",
                ),
            },
            Y = /^(?:input|select|textarea|button)$/i,
            Z = /^h\d$/i,
            $ = /^[^{]+\{\s*\[native \w/,
            _ = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            ab = /[+~]/,
            bb = /'|\\/g,
            cb = new RegExp(
                "\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)",
                "ig",
            ),
            db = function (a, b, c) {
                var d = "0x" + b - 65536;
                return d !== d || c
                    ? b
                    : 0 > d
                      ? String.fromCharCode(d + 65536)
                      : String.fromCharCode(
                            (d >> 10) | 55296,
                            (1023 & d) | 56320,
                        );
            };
        try {
            I.apply((F = J.call(v.childNodes)), v.childNodes),
                F[v.childNodes.length].nodeType;
        } catch (eb) {
            I = {
                apply: F.length
                    ? function (a, b) {
                          H.apply(a, J.call(b));
                      }
                    : function (a, b) {
                          var c = a.length,
                              d = 0;
                          while ((a[c++] = b[d++]));
                          a.length = c - 1;
                      },
            };
        }

        function fb(a, b, d, e) {
            var f, h, j, k, l, o, r, s, w, x;
            if (
                ((b ? b.ownerDocument || b : v) !== n && m(b),
                (b = b || n),
                (d = d || []),
                !a || "string" != typeof a)
            )
                return d;
            if (1 !== (k = b.nodeType) && 9 !== k) return [];
            if (p && !e) {
                if ((f = _.exec(a)))
                    if ((j = f[1])) {
                        if (9 === k) {
                            if (
                                ((h = b.getElementById(j)), !h || !h.parentNode)
                            )
                                return d;
                            if (h.id === j) return d.push(h), d;
                        } else if (
                            b.ownerDocument &&
                            (h = b.ownerDocument.getElementById(j)) &&
                            t(b, h) &&
                            h.id === j
                        )
                            return d.push(h), d;
                    } else {
                        if (f[2])
                            return I.apply(d, b.getElementsByTagName(a)), d;
                        if (
                            (j = f[3]) &&
                            c.getElementsByClassName &&
                            b.getElementsByClassName
                        )
                            return I.apply(d, b.getElementsByClassName(j)), d;
                    }
                if (c.qsa && (!q || !q.test(a))) {
                    if (
                        ((s = r = u),
                        (w = b),
                        (x = 9 === k && a),
                        1 === k && "object" !== b.nodeName.toLowerCase())
                    ) {
                        (o = g(a)),
                            (r = b.getAttribute("id"))
                                ? (s = r.replace(bb, "\\$&"))
                                : b.setAttribute("id", s),
                            (s = "[id='" + s + "'] "),
                            (l = o.length);
                        while (l--) o[l] = s + qb(o[l]);
                        (w = (ab.test(a) && ob(b.parentNode)) || b),
                            (x = o.join(","));
                    }
                    if (x)
                        try {
                            return I.apply(d, w.querySelectorAll(x)), d;
                        } catch (y) {
                        } finally {
                            r || b.removeAttribute("id");
                        }
                }
            }
            return i(a.replace(R, "$1"), b, d, e);
        }

        function gb() {
            var a = [];

            function b(c, e) {
                return (
                    a.push(c + " ") > d.cacheLength && delete b[a.shift()],
                    (b[c + " "] = e)
                );
            }
            return b;
        }

        function hb(a) {
            return (a[u] = !0), a;
        }

        function ib(a) {
            var b = n.createElement("div");
            try {
                return !!a(b);
            } catch (c) {
                return !1;
            } finally {
                b.parentNode && b.parentNode.removeChild(b), (b = null);
            }
        }

        function jb(a, b) {
            var c = a.split("|"),
                e = a.length;
            while (e--) d.attrHandle[c[e]] = b;
        }

        function kb(a, b) {
            var c = b && a,
                d =
                    c &&
                    1 === a.nodeType &&
                    1 === b.nodeType &&
                    (~b.sourceIndex || D) - (~a.sourceIndex || D);
            if (d) return d;
            if (c) while ((c = c.nextSibling)) if (c === b) return -1;
            return a ? 1 : -1;
        }

        function lb(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return "input" === c && b.type === a;
            };
        }

        function mb(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return ("input" === c || "button" === c) && b.type === a;
            };
        }

        function nb(a) {
            return hb(function (b) {
                return (
                    (b = +b),
                    hb(function (c, d) {
                        var e,
                            f = a([], c.length, b),
                            g = f.length;
                        while (g--) c[(e = f[g])] && (c[e] = !(d[e] = c[e]));
                    })
                );
            });
        }

        function ob(a) {
            return a && typeof a.getElementsByTagName !== C && a;
        }
        (c = fb.support = {}),
            (f = fb.isXML =
                function (a) {
                    var b = a && (a.ownerDocument || a).documentElement;
                    return b ? "HTML" !== b.nodeName : !1;
                }),
            (m = fb.setDocument =
                function (a) {
                    var b,
                        e = a ? a.ownerDocument || a : v,
                        g = e.defaultView;
                    return e !== n && 9 === e.nodeType && e.documentElement
                        ? ((n = e),
                          (o = e.documentElement),
                          (p = !f(e)),
                          g &&
                              g !== g.top &&
                              (g.addEventListener
                                  ? g.addEventListener(
                                        "unload",
                                        function () {
                                            m();
                                        },
                                        !1,
                                    )
                                  : g.attachEvent &&
                                    g.attachEvent("onunload", function () {
                                        m();
                                    })),
                          (c.attributes = ib(function (a) {
                              return (
                                  (a.className = "i"),
                                  !a.getAttribute("className")
                              );
                          })),
                          (c.getElementsByTagName = ib(function (a) {
                              return (
                                  a.appendChild(e.createComment("")),
                                  !a.getElementsByTagName("*").length
                              );
                          })),
                          (c.getElementsByClassName =
                              $.test(e.getElementsByClassName) &&
                              ib(function (a) {
                                  return (
                                      (a.innerHTML =
                                          "<div class='a'></div><div class='a i'></div>"),
                                      (a.firstChild.className = "i"),
                                      2 === a.getElementsByClassName("i").length
                                  );
                              })),
                          (c.getById = ib(function (a) {
                              return (
                                  (o.appendChild(a).id = u),
                                  !e.getElementsByName ||
                                      !e.getElementsByName(u).length
                              );
                          })),
                          c.getById
                              ? ((d.find.ID = function (a, b) {
                                    if (typeof b.getElementById !== C && p) {
                                        var c = b.getElementById(a);
                                        return c && c.parentNode ? [c] : [];
                                    }
                                }),
                                (d.filter.ID = function (a) {
                                    var b = a.replace(cb, db);
                                    return function (a) {
                                        return a.getAttribute("id") === b;
                                    };
                                }))
                              : (delete d.find.ID,
                                (d.filter.ID = function (a) {
                                    var b = a.replace(cb, db);
                                    return function (a) {
                                        var c =
                                            typeof a.getAttributeNode !== C &&
                                            a.getAttributeNode("id");
                                        return c && c.value === b;
                                    };
                                })),
                          (d.find.TAG = c.getElementsByTagName
                              ? function (a, b) {
                                    return typeof b.getElementsByTagName !== C
                                        ? b.getElementsByTagName(a)
                                        : void 0;
                                }
                              : function (a, b) {
                                    var c,
                                        d = [],
                                        e = 0,
                                        f = b.getElementsByTagName(a);
                                    if ("*" === a) {
                                        while ((c = f[e++]))
                                            1 === c.nodeType && d.push(c);
                                        return d;
                                    }
                                    return f;
                                }),
                          (d.find.CLASS =
                              c.getElementsByClassName &&
                              function (a, b) {
                                  return typeof b.getElementsByClassName !==
                                      C && p
                                      ? b.getElementsByClassName(a)
                                      : void 0;
                              }),
                          (r = []),
                          (q = []),
                          (c.qsa = $.test(e.querySelectorAll)) &&
                              (ib(function (a) {
                                  (a.innerHTML =
                                      "<select msallowclip=''><option selected=''></option></select>"),
                                      a.querySelectorAll("[msallowclip^='']")
                                          .length &&
                                          q.push("[*^$]=" + M + "*(?:''|\"\")"),
                                      a.querySelectorAll("[selected]").length ||
                                          q.push(
                                              "\\[" +
                                                  M +
                                                  "*(?:value|" +
                                                  L +
                                                  ")",
                                          ),
                                      a.querySelectorAll(":checked").length ||
                                          q.push(":checked");
                              }),
                              ib(function (a) {
                                  var b = e.createElement("input");
                                  b.setAttribute("type", "hidden"),
                                      a
                                          .appendChild(b)
                                          .setAttribute("name", "D"),
                                      a.querySelectorAll("[name=d]").length &&
                                          q.push("name" + M + "*[*^$|!~]?="),
                                      a.querySelectorAll(":enabled").length ||
                                          q.push(":enabled", ":disabled"),
                                      a.querySelectorAll("*,:x"),
                                      q.push(",.*:");
                              })),
                          (c.matchesSelector = $.test(
                              (s =
                                  o.matches ||
                                  o.webkitMatchesSelector ||
                                  o.mozMatchesSelector ||
                                  o.oMatchesSelector ||
                                  o.msMatchesSelector),
                          )) &&
                              ib(function (a) {
                                  (c.disconnectedMatch = s.call(a, "div")),
                                      s.call(a, "[s!='']:x"),
                                      r.push("!=", Q);
                              }),
                          (q = q.length && new RegExp(q.join("|"))),
                          (r = r.length && new RegExp(r.join("|"))),
                          (b = $.test(o.compareDocumentPosition)),
                          (t =
                              b || $.test(o.contains)
                                  ? function (a, b) {
                                        var c =
                                                9 === a.nodeType
                                                    ? a.documentElement
                                                    : a,
                                            d = b && b.parentNode;
                                        return (
                                            a === d ||
                                            !(
                                                !d ||
                                                1 !== d.nodeType ||
                                                !(c.contains
                                                    ? c.contains(d)
                                                    : a.compareDocumentPosition &&
                                                      16 &
                                                          a.compareDocumentPosition(
                                                              d,
                                                          ))
                                            )
                                        );
                                    }
                                  : function (a, b) {
                                        if (b)
                                            while ((b = b.parentNode))
                                                if (b === a) return !0;
                                        return !1;
                                    }),
                          (B = b
                              ? function (a, b) {
                                    if (a === b) return (l = !0), 0;
                                    var d =
                                        !a.compareDocumentPosition -
                                        !b.compareDocumentPosition;
                                    return d
                                        ? d
                                        : ((d =
                                              (a.ownerDocument || a) ===
                                              (b.ownerDocument || b)
                                                  ? a.compareDocumentPosition(b)
                                                  : 1),
                                          1 & d ||
                                          (!c.sortDetached &&
                                              b.compareDocumentPosition(a) ===
                                                  d)
                                              ? a === e ||
                                                (a.ownerDocument === v &&
                                                    t(v, a))
                                                  ? -1
                                                  : b === e ||
                                                      (b.ownerDocument === v &&
                                                          t(v, b))
                                                    ? 1
                                                    : k
                                                      ? K.call(k, a) -
                                                        K.call(k, b)
                                                      : 0
                                              : 4 & d
                                                ? -1
                                                : 1);
                                }
                              : function (a, b) {
                                    if (a === b) return (l = !0), 0;
                                    var c,
                                        d = 0,
                                        f = a.parentNode,
                                        g = b.parentNode,
                                        h = [a],
                                        i = [b];
                                    if (!f || !g)
                                        return a === e
                                            ? -1
                                            : b === e
                                              ? 1
                                              : f
                                                ? -1
                                                : g
                                                  ? 1
                                                  : k
                                                    ? K.call(k, a) -
                                                      K.call(k, b)
                                                    : 0;
                                    if (f === g) return kb(a, b);
                                    c = a;
                                    while ((c = c.parentNode)) h.unshift(c);
                                    c = b;
                                    while ((c = c.parentNode)) i.unshift(c);
                                    while (h[d] === i[d]) d++;
                                    return d
                                        ? kb(h[d], i[d])
                                        : h[d] === v
                                          ? -1
                                          : i[d] === v
                                            ? 1
                                            : 0;
                                }),
                          e)
                        : n;
                }),
            (fb.matches = function (a, b) {
                return fb(a, null, null, b);
            }),
            (fb.matchesSelector = function (a, b) {
                if (
                    ((a.ownerDocument || a) !== n && m(a),
                    (b = b.replace(U, "='$1']")),
                    !(
                        !c.matchesSelector ||
                        !p ||
                        (r && r.test(b)) ||
                        (q && q.test(b))
                    ))
                )
                    try {
                        var d = s.call(a, b);
                        if (
                            d ||
                            c.disconnectedMatch ||
                            (a.document && 11 !== a.document.nodeType)
                        )
                            return d;
                    } catch (e) {}
                return fb(b, n, null, [a]).length > 0;
            }),
            (fb.contains = function (a, b) {
                return (a.ownerDocument || a) !== n && m(a), t(a, b);
            }),
            (fb.attr = function (a, b) {
                (a.ownerDocument || a) !== n && m(a);
                var e = d.attrHandle[b.toLowerCase()],
                    f =
                        e && E.call(d.attrHandle, b.toLowerCase())
                            ? e(a, b, !p)
                            : void 0;
                return void 0 !== f
                    ? f
                    : c.attributes || !p
                      ? a.getAttribute(b)
                      : (f = a.getAttributeNode(b)) && f.specified
                        ? f.value
                        : null;
            }),
            (fb.error = function (a) {
                throw new Error("Syntax error, unrecognized expression: " + a);
            }),
            (fb.uniqueSort = function (a) {
                var b,
                    d = [],
                    e = 0,
                    f = 0;
                if (
                    ((l = !c.detectDuplicates),
                    (k = !c.sortStable && a.slice(0)),
                    a.sort(B),
                    l)
                ) {
                    while ((b = a[f++])) b === a[f] && (e = d.push(f));
                    while (e--) a.splice(d[e], 1);
                }
                return (k = null), a;
            }),
            (e = fb.getText =
                function (a) {
                    var b,
                        c = "",
                        d = 0,
                        f = a.nodeType;
                    if (f) {
                        if (1 === f || 9 === f || 11 === f) {
                            if ("string" == typeof a.textContent)
                                return a.textContent;
                            for (a = a.firstChild; a; a = a.nextSibling)
                                c += e(a);
                        } else if (3 === f || 4 === f) return a.nodeValue;
                    } else while ((b = a[d++])) c += e(b);
                    return c;
                }),
            (d = fb.selectors =
                {
                    cacheLength: 50,
                    createPseudo: hb,
                    match: X,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0,
                        },
                        " ": {
                            dir: "parentNode",
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0,
                        },
                        "~": {
                            dir: "previousSibling",
                        },
                    },
                    preFilter: {
                        ATTR: function (a) {
                            return (
                                (a[1] = a[1].replace(cb, db)),
                                (a[3] = (a[3] || a[4] || a[5] || "").replace(
                                    cb,
                                    db,
                                )),
                                "~=" === a[2] && (a[3] = " " + a[3] + " "),
                                a.slice(0, 4)
                            );
                        },
                        CHILD: function (a) {
                            return (
                                (a[1] = a[1].toLowerCase()),
                                "nth" === a[1].slice(0, 3)
                                    ? (a[3] || fb.error(a[0]),
                                      (a[4] = +(a[4]
                                          ? a[5] + (a[6] || 1)
                                          : 2 *
                                            ("even" === a[3] ||
                                                "odd" === a[3]))),
                                      (a[5] = +(a[7] + a[8] || "odd" === a[3])))
                                    : a[3] && fb.error(a[0]),
                                a
                            );
                        },
                        PSEUDO: function (a) {
                            var b,
                                c = !a[6] && a[2];
                            return X.CHILD.test(a[0])
                                ? null
                                : (a[3]
                                      ? (a[2] = a[4] || a[5] || "")
                                      : c &&
                                        V.test(c) &&
                                        (b = g(c, !0)) &&
                                        (b =
                                            c.indexOf(")", c.length - b) -
                                            c.length) &&
                                        ((a[0] = a[0].slice(0, b)),
                                        (a[2] = c.slice(0, b))),
                                  a.slice(0, 3));
                        },
                    },
                    filter: {
                        TAG: function (a) {
                            var b = a.replace(cb, db).toLowerCase();
                            return "*" === a
                                ? function () {
                                      return !0;
                                  }
                                : function (a) {
                                      return (
                                          a.nodeName &&
                                          a.nodeName.toLowerCase() === b
                                      );
                                  };
                        },
                        CLASS: function (a) {
                            var b = y[a + " "];
                            return (
                                b ||
                                ((b = new RegExp(
                                    "(^|" + M + ")" + a + "(" + M + "|$)",
                                )) &&
                                    y(a, function (a) {
                                        return b.test(
                                            ("string" == typeof a.className &&
                                                a.className) ||
                                                (typeof a.getAttribute !== C &&
                                                    a.getAttribute("class")) ||
                                                "",
                                        );
                                    }))
                            );
                        },
                        ATTR: function (a, b, c) {
                            return function (d) {
                                var e = fb.attr(d, a);
                                return null == e
                                    ? "!=" === b
                                    : b
                                      ? ((e += ""),
                                        "=" === b
                                            ? e === c
                                            : "!=" === b
                                              ? e !== c
                                              : "^=" === b
                                                ? c && 0 === e.indexOf(c)
                                                : "*=" === b
                                                  ? c && e.indexOf(c) > -1
                                                  : "$=" === b
                                                    ? c &&
                                                      e.slice(-c.length) === c
                                                    : "~=" === b
                                                      ? (" " + e + " ").indexOf(
                                                            c,
                                                        ) > -1
                                                      : "|=" === b
                                                        ? e === c ||
                                                          e.slice(
                                                              0,
                                                              c.length + 1,
                                                          ) ===
                                                              c + "-"
                                                        : !1)
                                      : !0;
                            };
                        },
                        CHILD: function (a, b, c, d, e) {
                            var f = "nth" !== a.slice(0, 3),
                                g = "last" !== a.slice(-4),
                                h = "of-type" === b;
                            return 1 === d && 0 === e
                                ? function (a) {
                                      return !!a.parentNode;
                                  }
                                : function (b, c, i) {
                                      var j,
                                          k,
                                          l,
                                          m,
                                          n,
                                          o,
                                          p =
                                              f !== g
                                                  ? "nextSibling"
                                                  : "previousSibling",
                                          q = b.parentNode,
                                          r = h && b.nodeName.toLowerCase(),
                                          s = !i && !h;
                                      if (q) {
                                          if (f) {
                                              while (p) {
                                                  l = b;
                                                  while ((l = l[p]))
                                                      if (
                                                          h
                                                              ? l.nodeName.toLowerCase() ===
                                                                r
                                                              : 1 === l.nodeType
                                                      )
                                                          return !1;
                                                  o = p =
                                                      "only" === a &&
                                                      !o &&
                                                      "nextSibling";
                                              }
                                              return !0;
                                          }
                                          if (
                                              ((o = [
                                                  g
                                                      ? q.firstChild
                                                      : q.lastChild,
                                              ]),
                                              g && s)
                                          ) {
                                              (k = q[u] || (q[u] = {})),
                                                  (j = k[a] || []),
                                                  (n = j[0] === w && j[1]),
                                                  (m = j[0] === w && j[2]),
                                                  (l = n && q.childNodes[n]);
                                              while (
                                                  (l =
                                                      (++n && l && l[p]) ||
                                                      (m = n = 0) ||
                                                      o.pop())
                                              )
                                                  if (
                                                      1 === l.nodeType &&
                                                      ++m &&
                                                      l === b
                                                  ) {
                                                      k[a] = [w, n, m];
                                                      break;
                                                  }
                                          } else if (
                                              s &&
                                              (j = (b[u] || (b[u] = {}))[a]) &&
                                              j[0] === w
                                          )
                                              m = j[1];
                                          else
                                              while (
                                                  (l =
                                                      (++n && l && l[p]) ||
                                                      (m = n = 0) ||
                                                      o.pop())
                                              )
                                                  if (
                                                      (h
                                                          ? l.nodeName.toLowerCase() ===
                                                            r
                                                          : 1 === l.nodeType) &&
                                                      ++m &&
                                                      (s &&
                                                          ((l[u] ||
                                                              (l[u] = {}))[a] =
                                                              [w, m]),
                                                      l === b)
                                                  )
                                                      break;
                                          return (
                                              (m -= e),
                                              m === d ||
                                                  (m % d === 0 && m / d >= 0)
                                          );
                                      }
                                  };
                        },
                        PSEUDO: function (a, b) {
                            var c,
                                e =
                                    d.pseudos[a] ||
                                    d.setFilters[a.toLowerCase()] ||
                                    fb.error("unsupported pseudo: " + a);
                            return e[u]
                                ? e(b)
                                : e.length > 1
                                  ? ((c = [a, a, "", b]),
                                    d.setFilters.hasOwnProperty(a.toLowerCase())
                                        ? hb(function (a, c) {
                                              var d,
                                                  f = e(a, b),
                                                  g = f.length;
                                              while (g--)
                                                  (d = K.call(a, f[g])),
                                                      (a[d] = !(c[d] = f[g]));
                                          })
                                        : function (a) {
                                              return e(a, 0, c);
                                          })
                                  : e;
                        },
                    },
                    pseudos: {
                        not: hb(function (a) {
                            var b = [],
                                c = [],
                                d = h(a.replace(R, "$1"));
                            return d[u]
                                ? hb(function (a, b, c, e) {
                                      var f,
                                          g = d(a, null, e, []),
                                          h = a.length;
                                      while (h--)
                                          (f = g[h]) && (a[h] = !(b[h] = f));
                                  })
                                : function (a, e, f) {
                                      return (
                                          (b[0] = a), d(b, null, f, c), !c.pop()
                                      );
                                  };
                        }),
                        has: hb(function (a) {
                            return function (b) {
                                return fb(a, b).length > 0;
                            };
                        }),
                        contains: hb(function (a) {
                            return function (b) {
                                return (
                                    (
                                        b.textContent ||
                                        b.innerText ||
                                        e(b)
                                    ).indexOf(a) > -1
                                );
                            };
                        }),
                        lang: hb(function (a) {
                            return (
                                W.test(a || "") ||
                                    fb.error("unsupported lang: " + a),
                                (a = a.replace(cb, db).toLowerCase()),
                                function (b) {
                                    var c;
                                    do
                                        if (
                                            (c = p
                                                ? b.lang
                                                : b.getAttribute("xml:lang") ||
                                                  b.getAttribute("lang"))
                                        )
                                            return (
                                                (c = c.toLowerCase()),
                                                c === a ||
                                                    0 === c.indexOf(a + "-")
                                            );
                                    while (
                                        (b = b.parentNode) &&
                                        1 === b.nodeType
                                    );
                                    return !1;
                                }
                            );
                        }),
                        target: function (b) {
                            var c = a.location && a.location.hash;
                            return c && c.slice(1) === b.id;
                        },
                        root: function (a) {
                            return a === o;
                        },
                        focus: function (a) {
                            return (
                                a === n.activeElement &&
                                (!n.hasFocus || n.hasFocus()) &&
                                !!(a.type || a.href || ~a.tabIndex)
                            );
                        },
                        enabled: function (a) {
                            return a.disabled === !1;
                        },
                        disabled: function (a) {
                            return a.disabled === !0;
                        },
                        checked: function (a) {
                            var b = a.nodeName.toLowerCase();
                            return (
                                ("input" === b && !!a.checked) ||
                                ("option" === b && !!a.selected)
                            );
                        },
                        selected: function (a) {
                            return (
                                a.parentNode && a.parentNode.selectedIndex,
                                a.selected === !0
                            );
                        },
                        empty: function (a) {
                            for (a = a.firstChild; a; a = a.nextSibling)
                                if (a.nodeType < 6) return !1;
                            return !0;
                        },
                        parent: function (a) {
                            return !d.pseudos.empty(a);
                        },
                        header: function (a) {
                            return Z.test(a.nodeName);
                        },
                        input: function (a) {
                            return Y.test(a.nodeName);
                        },
                        button: function (a) {
                            var b = a.nodeName.toLowerCase();
                            return (
                                ("input" === b && "button" === a.type) ||
                                "button" === b
                            );
                        },
                        text: function (a) {
                            var b;
                            return (
                                "input" === a.nodeName.toLowerCase() &&
                                "text" === a.type &&
                                (null == (b = a.getAttribute("type")) ||
                                    "text" === b.toLowerCase())
                            );
                        },
                        first: nb(function () {
                            return [0];
                        }),
                        last: nb(function (a, b) {
                            return [b - 1];
                        }),
                        eq: nb(function (a, b, c) {
                            return [0 > c ? c + b : c];
                        }),
                        even: nb(function (a, b) {
                            for (var c = 0; b > c; c += 2) a.push(c);
                            return a;
                        }),
                        odd: nb(function (a, b) {
                            for (var c = 1; b > c; c += 2) a.push(c);
                            return a;
                        }),
                        lt: nb(function (a, b, c) {
                            for (var d = 0 > c ? c + b : c; --d >= 0; )
                                a.push(d);
                            return a;
                        }),
                        gt: nb(function (a, b, c) {
                            for (var d = 0 > c ? c + b : c; ++d < b; )
                                a.push(d);
                            return a;
                        }),
                    },
                }),
            (d.pseudos.nth = d.pseudos.eq);
        for (b in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0,
        })
            d.pseudos[b] = lb(b);
        for (b in {
            submit: !0,
            reset: !0,
        })
            d.pseudos[b] = mb(b);

        function pb() {}
        (pb.prototype = d.filters = d.pseudos),
            (d.setFilters = new pb()),
            (g = fb.tokenize =
                function (a, b) {
                    var c,
                        e,
                        f,
                        g,
                        h,
                        i,
                        j,
                        k = z[a + " "];
                    if (k) return b ? 0 : k.slice(0);
                    (h = a), (i = []), (j = d.preFilter);
                    while (h) {
                        (!c || (e = S.exec(h))) &&
                            (e && (h = h.slice(e[0].length) || h),
                            i.push((f = []))),
                            (c = !1),
                            (e = T.exec(h)) &&
                                ((c = e.shift()),
                                f.push({
                                    value: c,
                                    type: e[0].replace(R, " "),
                                }),
                                (h = h.slice(c.length)));
                        for (g in d.filter)
                            !(e = X[g].exec(h)) ||
                                (j[g] && !(e = j[g](e))) ||
                                ((c = e.shift()),
                                f.push({
                                    value: c,
                                    type: g,
                                    matches: e,
                                }),
                                (h = h.slice(c.length)));
                        if (!c) break;
                    }
                    return b ? h.length : h ? fb.error(a) : z(a, i).slice(0);
                });

        function qb(a) {
            for (var b = 0, c = a.length, d = ""; c > b; b++) d += a[b].value;
            return d;
        }

        function rb(a, b, c) {
            var d = b.dir,
                e = c && "parentNode" === d,
                f = x++;
            return b.first
                ? function (b, c, f) {
                      while ((b = b[d]))
                          if (1 === b.nodeType || e) return a(b, c, f);
                  }
                : function (b, c, g) {
                      var h,
                          i,
                          j = [w, f];
                      if (g) {
                          while ((b = b[d]))
                              if ((1 === b.nodeType || e) && a(b, c, g))
                                  return !0;
                      } else
                          while ((b = b[d]))
                              if (1 === b.nodeType || e) {
                                  if (
                                      ((i = b[u] || (b[u] = {})),
                                      (h = i[d]) && h[0] === w && h[1] === f)
                                  )
                                      return (j[2] = h[2]);
                                  if (((i[d] = j), (j[2] = a(b, c, g))))
                                      return !0;
                              }
                  };
        }

        function sb(a) {
            return a.length > 1
                ? function (b, c, d) {
                      var e = a.length;
                      while (e--) if (!a[e](b, c, d)) return !1;
                      return !0;
                  }
                : a[0];
        }

        function tb(a, b, c) {
            for (var d = 0, e = b.length; e > d; d++) fb(a, b[d], c);
            return c;
        }

        function ub(a, b, c, d, e) {
            for (var f, g = [], h = 0, i = a.length, j = null != b; i > h; h++)
                (f = a[h]) && (!c || c(f, d, e)) && (g.push(f), j && b.push(h));
            return g;
        }

        function vb(a, b, c, d, e, f) {
            return (
                d && !d[u] && (d = vb(d)),
                e && !e[u] && (e = vb(e, f)),
                hb(function (f, g, h, i) {
                    var j,
                        k,
                        l,
                        m = [],
                        n = [],
                        o = g.length,
                        p = f || tb(b || "*", h.nodeType ? [h] : h, []),
                        q = !a || (!f && b) ? p : ub(p, m, a, h, i),
                        r = c ? (e || (f ? a : o || d) ? [] : g) : q;
                    if ((c && c(q, r, h, i), d)) {
                        (j = ub(r, n)), d(j, [], h, i), (k = j.length);
                        while (k--) (l = j[k]) && (r[n[k]] = !(q[n[k]] = l));
                    }
                    if (f) {
                        if (e || a) {
                            if (e) {
                                (j = []), (k = r.length);
                                while (k--) (l = r[k]) && j.push((q[k] = l));
                                e(null, (r = []), j, i);
                            }
                            k = r.length;
                            while (k--)
                                (l = r[k]) &&
                                    (j = e ? K.call(f, l) : m[k]) > -1 &&
                                    (f[j] = !(g[j] = l));
                        }
                    } else
                        (r = ub(r === g ? r.splice(o, r.length) : r)),
                            e ? e(null, g, r, i) : I.apply(g, r);
                })
            );
        }

        function wb(a) {
            for (
                var b,
                    c,
                    e,
                    f = a.length,
                    g = d.relative[a[0].type],
                    h = g || d.relative[" "],
                    i = g ? 1 : 0,
                    k = rb(
                        function (a) {
                            return a === b;
                        },
                        h,
                        !0,
                    ),
                    l = rb(
                        function (a) {
                            return K.call(b, a) > -1;
                        },
                        h,
                        !0,
                    ),
                    m = [
                        function (a, c, d) {
                            return (
                                (!g && (d || c !== j)) ||
                                ((b = c).nodeType ? k(a, c, d) : l(a, c, d))
                            );
                        },
                    ];
                f > i;
                i++
            )
                if ((c = d.relative[a[i].type])) m = [rb(sb(m), c)];
                else {
                    if (
                        ((c = d.filter[a[i].type].apply(null, a[i].matches)),
                        c[u])
                    ) {
                        for (e = ++i; f > e; e++)
                            if (d.relative[a[e].type]) break;
                        return vb(
                            i > 1 && sb(m),
                            i > 1 &&
                                qb(
                                    a.slice(0, i - 1).concat({
                                        value: " " === a[i - 2].type ? "*" : "",
                                    }),
                                ).replace(R, "$1"),
                            c,
                            e > i && wb(a.slice(i, e)),
                            f > e && wb((a = a.slice(e))),
                            f > e && qb(a),
                        );
                    }
                    m.push(c);
                }
            return sb(m);
        }

        function xb(a, b) {
            var c = b.length > 0,
                e = a.length > 0,
                f = function (f, g, h, i, k) {
                    var l,
                        m,
                        o,
                        p = 0,
                        q = "0",
                        r = f && [],
                        s = [],
                        t = j,
                        u = f || (e && d.find.TAG("*", k)),
                        v = (w += null == t ? 1 : Math.random() || 0.1),
                        x = u.length;
                    for (
                        k && (j = g !== n && g);
                        q !== x && null != (l = u[q]);
                        q++
                    ) {
                        if (e && l) {
                            m = 0;
                            while ((o = a[m++]))
                                if (o(l, g, h)) {
                                    i.push(l);
                                    break;
                                }
                            k && (w = v);
                        }
                        c && ((l = !o && l) && p--, f && r.push(l));
                    }
                    if (((p += q), c && q !== p)) {
                        m = 0;
                        while ((o = b[m++])) o(r, s, g, h);
                        if (f) {
                            if (p > 0)
                                while (q--) r[q] || s[q] || (s[q] = G.call(i));
                            s = ub(s);
                        }
                        I.apply(i, s),
                            k &&
                                !f &&
                                s.length > 0 &&
                                p + b.length > 1 &&
                                fb.uniqueSort(i);
                    }
                    return k && ((w = v), (j = t)), r;
                };
            return c ? hb(f) : f;
        }
        return (
            (h = fb.compile =
                function (a, b) {
                    var c,
                        d = [],
                        e = [],
                        f = A[a + " "];
                    if (!f) {
                        b || (b = g(a)), (c = b.length);
                        while (c--)
                            (f = wb(b[c])), f[u] ? d.push(f) : e.push(f);
                        (f = A(a, xb(e, d))), (f.selector = a);
                    }
                    return f;
                }),
            (i = fb.select =
                function (a, b, e, f) {
                    var i,
                        j,
                        k,
                        l,
                        m,
                        n = "function" == typeof a && a,
                        o = !f && g((a = n.selector || a));
                    if (((e = e || []), 1 === o.length)) {
                        if (
                            ((j = o[0] = o[0].slice(0)),
                            j.length > 2 &&
                                "ID" === (k = j[0]).type &&
                                c.getById &&
                                9 === b.nodeType &&
                                p &&
                                d.relative[j[1].type])
                        ) {
                            if (
                                ((b = (d.find.ID(
                                    k.matches[0].replace(cb, db),
                                    b,
                                ) || [])[0]),
                                !b)
                            )
                                return e;
                            n && (b = b.parentNode),
                                (a = a.slice(j.shift().value.length));
                        }
                        i = X.needsContext.test(a) ? 0 : j.length;
                        while (i--) {
                            if (((k = j[i]), d.relative[(l = k.type)])) break;
                            if (
                                (m = d.find[l]) &&
                                (f = m(
                                    k.matches[0].replace(cb, db),
                                    (ab.test(j[0].type) && ob(b.parentNode)) ||
                                        b,
                                ))
                            ) {
                                if (
                                    (j.splice(i, 1),
                                    (a = f.length && qb(j)),
                                    !a)
                                )
                                    return I.apply(e, f), e;
                                break;
                            }
                        }
                    }
                    return (
                        (n || h(a, o))(
                            f,
                            b,
                            !p,
                            e,
                            (ab.test(a) && ob(b.parentNode)) || b,
                        ),
                        e
                    );
                }),
            (c.sortStable = u.split("").sort(B).join("") === u),
            (c.detectDuplicates = !!l),
            m(),
            (c.sortDetached = ib(function (a) {
                return 1 & a.compareDocumentPosition(n.createElement("div"));
            })),
            ib(function (a) {
                return (
                    (a.innerHTML = "<a href='#'></a>"),
                    "#" === a.firstChild.getAttribute("href")
                );
            }) ||
                jb("type|href|height|width", function (a, b, c) {
                    return c
                        ? void 0
                        : a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2);
                }),
            (c.attributes &&
                ib(function (a) {
                    return (
                        (a.innerHTML = "<input/>"),
                        a.firstChild.setAttribute("value", ""),
                        "" === a.firstChild.getAttribute("value")
                    );
                })) ||
                jb("value", function (a, b, c) {
                    return c || "input" !== a.nodeName.toLowerCase()
                        ? void 0
                        : a.defaultValue;
                }),
            ib(function (a) {
                return null == a.getAttribute("disabled");
            }) ||
                jb(L, function (a, b, c) {
                    var d;
                    return c
                        ? void 0
                        : a[b] === !0
                          ? b.toLowerCase()
                          : (d = a.getAttributeNode(b)) && d.specified
                            ? d.value
                            : null;
                }),
            fb
        );
    })(a);
    (n.find = t),
        (n.expr = t.selectors),
        (n.expr[":"] = n.expr.pseudos),
        (n.unique = t.uniqueSort),
        (n.text = t.getText),
        (n.isXMLDoc = t.isXML),
        (n.contains = t.contains);
    var u = n.expr.match.needsContext,
        v = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        w = /^.[^:#\[\.,]*$/;

    function x(a, b, c) {
        if (n.isFunction(b))
            return n.grep(a, function (a, d) {
                return !!b.call(a, d, a) !== c;
            });
        if (b.nodeType)
            return n.grep(a, function (a) {
                return (a === b) !== c;
            });
        if ("string" == typeof b) {
            if (w.test(b)) return n.filter(b, a, c);
            b = n.filter(b, a);
        }
        return n.grep(a, function (a) {
            return g.call(b, a) >= 0 !== c;
        });
    }
    (n.filter = function (a, b, c) {
        var d = b[0];
        return (
            c && (a = ":not(" + a + ")"),
            1 === b.length && 1 === d.nodeType
                ? n.find.matchesSelector(d, a)
                    ? [d]
                    : []
                : n.find.matches(
                      a,
                      n.grep(b, function (a) {
                          return 1 === a.nodeType;
                      }),
                  )
        );
    }),
        n.fn.extend({
            find: function (a) {
                var b,
                    c = this.length,
                    d = [],
                    e = this;
                if ("string" != typeof a)
                    return this.pushStack(
                        n(a).filter(function () {
                            for (b = 0; c > b; b++)
                                if (n.contains(e[b], this)) return !0;
                        }),
                    );
                for (b = 0; c > b; b++) n.find(a, e[b], d);
                return (
                    (d = this.pushStack(c > 1 ? n.unique(d) : d)),
                    (d.selector = this.selector ? this.selector + " " + a : a),
                    d
                );
            },
            filter: function (a) {
                return this.pushStack(x(this, a || [], !1));
            },
            not: function (a) {
                return this.pushStack(x(this, a || [], !0));
            },
            is: function (a) {
                return !!x(
                    this,
                    "string" == typeof a && u.test(a) ? n(a) : a || [],
                    !1,
                ).length;
            },
        });
    var y,
        z = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        A = (n.fn.init = function (a, b) {
            var c, d;
            if (!a) return this;
            if ("string" == typeof a) {
                if (
                    ((c =
                        "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3
                            ? [null, a, null]
                            : z.exec(a)),
                    !c || (!c[1] && b))
                )
                    return !b || b.jquery
                        ? (b || y).find(a)
                        : this.constructor(b).find(a);
                if (c[1]) {
                    if (
                        ((b = b instanceof n ? b[0] : b),
                        n.merge(
                            this,
                            n.parseHTML(
                                c[1],
                                b && b.nodeType ? b.ownerDocument || b : l,
                                !0,
                            ),
                        ),
                        v.test(c[1]) && n.isPlainObject(b))
                    )
                        for (c in b)
                            n.isFunction(this[c])
                                ? this[c](b[c])
                                : this.attr(c, b[c]);
                    return this;
                }
                return (
                    (d = l.getElementById(c[2])),
                    d && d.parentNode && ((this.length = 1), (this[0] = d)),
                    (this.context = l),
                    (this.selector = a),
                    this
                );
            }
            return a.nodeType
                ? ((this.context = this[0] = a), (this.length = 1), this)
                : n.isFunction(a)
                  ? "undefined" != typeof y.ready
                      ? y.ready(a)
                      : a(n)
                  : (void 0 !== a.selector &&
                        ((this.selector = a.selector),
                        (this.context = a.context)),
                    n.makeArray(a, this));
        });
    (A.prototype = n.fn), (y = n(l));
    var B = /^(?:parents|prev(?:Until|All))/,
        C = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0,
        };
    n.extend({
        dir: function (a, b, c) {
            var d = [],
                e = void 0 !== c;
            while ((a = a[b]) && 9 !== a.nodeType)
                if (1 === a.nodeType) {
                    if (e && n(a).is(c)) break;
                    d.push(a);
                }
            return d;
        },
        sibling: function (a, b) {
            for (var c = []; a; a = a.nextSibling)
                1 === a.nodeType && a !== b && c.push(a);
            return c;
        },
    }),
        n.fn.extend({
            has: function (a) {
                var b = n(a, this),
                    c = b.length;
                return this.filter(function () {
                    for (var a = 0; c > a; a++)
                        if (n.contains(this, b[a])) return !0;
                });
            },
            closest: function (a, b) {
                for (
                    var c,
                        d = 0,
                        e = this.length,
                        f = [],
                        g =
                            u.test(a) || "string" != typeof a
                                ? n(a, b || this.context)
                                : 0;
                    e > d;
                    d++
                )
                    for (c = this[d]; c && c !== b; c = c.parentNode)
                        if (
                            c.nodeType < 11 &&
                            (g
                                ? g.index(c) > -1
                                : 1 === c.nodeType &&
                                  n.find.matchesSelector(c, a))
                        ) {
                            f.push(c);
                            break;
                        }
                return this.pushStack(f.length > 1 ? n.unique(f) : f);
            },
            index: function (a) {
                return a
                    ? "string" == typeof a
                        ? g.call(n(a), this[0])
                        : g.call(this, a.jquery ? a[0] : a)
                    : this[0] && this[0].parentNode
                      ? this.first().prevAll().length
                      : -1;
            },
            add: function (a, b) {
                return this.pushStack(n.unique(n.merge(this.get(), n(a, b))));
            },
            addBack: function (a) {
                return this.add(
                    null == a ? this.prevObject : this.prevObject.filter(a),
                );
            },
        });

    function D(a, b) {
        while ((a = a[b]) && 1 !== a.nodeType);
        return a;
    }
    n.each(
        {
            parent: function (a) {
                var b = a.parentNode;
                return b && 11 !== b.nodeType ? b : null;
            },
            parents: function (a) {
                return n.dir(a, "parentNode");
            },
            parentsUntil: function (a, b, c) {
                return n.dir(a, "parentNode", c);
            },
            next: function (a) {
                return D(a, "nextSibling");
            },
            prev: function (a) {
                return D(a, "previousSibling");
            },
            nextAll: function (a) {
                return n.dir(a, "nextSibling");
            },
            prevAll: function (a) {
                return n.dir(a, "previousSibling");
            },
            nextUntil: function (a, b, c) {
                return n.dir(a, "nextSibling", c);
            },
            prevUntil: function (a, b, c) {
                return n.dir(a, "previousSibling", c);
            },
            siblings: function (a) {
                return n.sibling((a.parentNode || {}).firstChild, a);
            },
            children: function (a) {
                return n.sibling(a.firstChild);
            },
            contents: function (a) {
                return a.contentDocument || n.merge([], a.childNodes);
            },
        },
        function (a, b) {
            n.fn[a] = function (c, d) {
                var e = n.map(this, b, c);
                return (
                    "Until" !== a.slice(-5) && (d = c),
                    d && "string" == typeof d && (e = n.filter(d, e)),
                    this.length > 1 &&
                        (C[a] || n.unique(e), B.test(a) && e.reverse()),
                    this.pushStack(e)
                );
            };
        },
    );
    var E = /\S+/g,
        F = {};

    function G(a) {
        var b = (F[a] = {});
        return (
            n.each(a.match(E) || [], function (a, c) {
                b[c] = !0;
            }),
            b
        );
    }
    (n.Callbacks = function (a) {
        a = "string" == typeof a ? F[a] || G(a) : n.extend({}, a);
        var b,
            c,
            d,
            e,
            f,
            g,
            h = [],
            i = !a.once && [],
            j = function (l) {
                for (
                    b = a.memory && l,
                        c = !0,
                        g = e || 0,
                        e = 0,
                        f = h.length,
                        d = !0;
                    h && f > g;
                    g++
                )
                    if (h[g].apply(l[0], l[1]) === !1 && a.stopOnFalse) {
                        b = !1;
                        break;
                    }
                (d = !1),
                    h &&
                        (i
                            ? i.length && j(i.shift())
                            : b
                              ? (h = [])
                              : k.disable());
            },
            k = {
                add: function () {
                    if (h) {
                        var c = h.length;
                        !(function g(b) {
                            n.each(b, function (b, c) {
                                var d = n.type(c);
                                "function" === d
                                    ? (a.unique && k.has(c)) || h.push(c)
                                    : c && c.length && "string" !== d && g(c);
                            });
                        })(arguments),
                            d ? (f = h.length) : b && ((e = c), j(b));
                    }
                    return this;
                },
                remove: function () {
                    return (
                        h &&
                            n.each(arguments, function (a, b) {
                                var c;
                                while ((c = n.inArray(b, h, c)) > -1)
                                    h.splice(c, 1),
                                        d && (f >= c && f--, g >= c && g--);
                            }),
                        this
                    );
                },
                has: function (a) {
                    return a ? n.inArray(a, h) > -1 : !(!h || !h.length);
                },
                empty: function () {
                    return (h = []), (f = 0), this;
                },
                disable: function () {
                    return (h = i = b = void 0), this;
                },
                disabled: function () {
                    return !h;
                },
                lock: function () {
                    return (i = void 0), b || k.disable(), this;
                },
                locked: function () {
                    return !i;
                },
                fireWith: function (a, b) {
                    return (
                        !h ||
                            (c && !i) ||
                            ((b = b || []),
                            (b = [a, b.slice ? b.slice() : b]),
                            d ? i.push(b) : j(b)),
                        this
                    );
                },
                fire: function () {
                    return k.fireWith(this, arguments), this;
                },
                fired: function () {
                    return !!c;
                },
            };
        return k;
    }),
        n.extend({
            Deferred: function (a) {
                var b = [
                        [
                            "resolve",
                            "done",
                            n.Callbacks("once memory"),
                            "resolved",
                        ],
                        [
                            "reject",
                            "fail",
                            n.Callbacks("once memory"),
                            "rejected",
                        ],
                        ["notify", "progress", n.Callbacks("memory")],
                    ],
                    c = "pending",
                    d = {
                        state: function () {
                            return c;
                        },
                        always: function () {
                            return e.done(arguments).fail(arguments), this;
                        },
                        then: function () {
                            var a = arguments;
                            return n
                                .Deferred(function (c) {
                                    n.each(b, function (b, f) {
                                        var g = n.isFunction(a[b]) && a[b];
                                        e[f[1]](function () {
                                            var a =
                                                g && g.apply(this, arguments);
                                            a && n.isFunction(a.promise)
                                                ? a
                                                      .promise()
                                                      .done(c.resolve)
                                                      .fail(c.reject)
                                                      .progress(c.notify)
                                                : c[f[0] + "With"](
                                                      this === d
                                                          ? c.promise()
                                                          : this,
                                                      g ? [a] : arguments,
                                                  );
                                        });
                                    }),
                                        (a = null);
                                })
                                .promise();
                        },
                        promise: function (a) {
                            return null != a ? n.extend(a, d) : d;
                        },
                    },
                    e = {};
                return (
                    (d.pipe = d.then),
                    n.each(b, function (a, f) {
                        var g = f[2],
                            h = f[3];
                        (d[f[1]] = g.add),
                            h &&
                                g.add(
                                    function () {
                                        c = h;
                                    },
                                    b[1 ^ a][2].disable,
                                    b[2][2].lock,
                                ),
                            (e[f[0]] = function () {
                                return (
                                    e[f[0] + "With"](
                                        this === e ? d : this,
                                        arguments,
                                    ),
                                    this
                                );
                            }),
                            (e[f[0] + "With"] = g.fireWith);
                    }),
                    d.promise(e),
                    a && a.call(e, e),
                    e
                );
            },
            when: function (a) {
                var b = 0,
                    c = d.call(arguments),
                    e = c.length,
                    f = 1 !== e || (a && n.isFunction(a.promise)) ? e : 0,
                    g = 1 === f ? a : n.Deferred(),
                    h = function (a, b, c) {
                        return function (e) {
                            (b[a] = this),
                                (c[a] =
                                    arguments.length > 1
                                        ? d.call(arguments)
                                        : e),
                                c === i
                                    ? g.notifyWith(b, c)
                                    : --f || g.resolveWith(b, c);
                        };
                    },
                    i,
                    j,
                    k;
                if (e > 1)
                    for (
                        i = new Array(e), j = new Array(e), k = new Array(e);
                        e > b;
                        b++
                    )
                        c[b] && n.isFunction(c[b].promise)
                            ? c[b]
                                  .promise()
                                  .done(h(b, k, c))
                                  .fail(g.reject)
                                  .progress(h(b, j, i))
                            : --f;
                return f || g.resolveWith(k, c), g.promise();
            },
        });
    var H;
    (n.fn.ready = function (a) {
        return n.ready.promise().done(a), this;
    }),
        n.extend({
            isReady: !1,
            readyWait: 1,
            holdReady: function (a) {
                a ? n.readyWait++ : n.ready(!0);
            },
            ready: function (a) {
                (a === !0 ? --n.readyWait : n.isReady) ||
                    ((n.isReady = !0),
                    (a !== !0 && --n.readyWait > 0) ||
                        (H.resolveWith(l, [n]),
                        n.fn.triggerHandler &&
                            (n(l).triggerHandler("ready"), n(l).off("ready"))));
            },
        });

    function I() {
        l.removeEventListener("DOMContentLoaded", I, !1),
            a.removeEventListener("load", I, !1),
            n.ready();
    }
    (n.ready.promise = function (b) {
        return (
            H ||
                ((H = n.Deferred()),
                "complete" === l.readyState
                    ? setTimeout(n.ready)
                    : (l.addEventListener("DOMContentLoaded", I, !1),
                      a.addEventListener("load", I, !1))),
            H.promise(b)
        );
    }),
        n.ready.promise();
    var J = (n.access = function (a, b, c, d, e, f, g) {
        var h = 0,
            i = a.length,
            j = null == c;
        if ("object" === n.type(c)) {
            e = !0;
            for (h in c) n.access(a, b, h, c[h], !0, f, g);
        } else if (
            void 0 !== d &&
            ((e = !0),
            n.isFunction(d) || (g = !0),
            j &&
                (g
                    ? (b.call(a, d), (b = null))
                    : ((j = b),
                      (b = function (a, b, c) {
                          return j.call(n(a), c);
                      }))),
            b)
        )
            for (; i > h; h++) b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
        return e ? a : j ? b.call(a) : i ? b(a[0], c) : f;
    });
    n.acceptData = function (a) {
        return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType;
    };

    function K() {
        Object.defineProperty((this.cache = {}), 0, {
            get: function () {
                return {};
            },
        }),
            (this.expando = n.expando + Math.random());
    }
    (K.uid = 1),
        (K.accepts = n.acceptData),
        (K.prototype = {
            key: function (a) {
                if (!K.accepts(a)) return 0;
                var b = {},
                    c = a[this.expando];
                if (!c) {
                    c = K.uid++;
                    try {
                        (b[this.expando] = {
                            value: c,
                        }),
                            Object.defineProperties(a, b);
                    } catch (d) {
                        (b[this.expando] = c), n.extend(a, b);
                    }
                }
                return this.cache[c] || (this.cache[c] = {}), c;
            },
            set: function (a, b, c) {
                var d,
                    e = this.key(a),
                    f = this.cache[e];
                if ("string" == typeof b) f[b] = c;
                else if (n.isEmptyObject(f)) n.extend(this.cache[e], b);
                else for (d in b) f[d] = b[d];
                return f;
            },
            get: function (a, b) {
                var c = this.cache[this.key(a)];
                return void 0 === b ? c : c[b];
            },
            access: function (a, b, c) {
                var d;
                return void 0 === b ||
                    (b && "string" == typeof b && void 0 === c)
                    ? ((d = this.get(a, b)),
                      void 0 !== d ? d : this.get(a, n.camelCase(b)))
                    : (this.set(a, b, c), void 0 !== c ? c : b);
            },
            remove: function (a, b) {
                var c,
                    d,
                    e,
                    f = this.key(a),
                    g = this.cache[f];
                if (void 0 === b) this.cache[f] = {};
                else {
                    n.isArray(b)
                        ? (d = b.concat(b.map(n.camelCase)))
                        : ((e = n.camelCase(b)),
                          b in g
                              ? (d = [b, e])
                              : ((d = e),
                                (d = d in g ? [d] : d.match(E) || []))),
                        (c = d.length);
                    while (c--) delete g[d[c]];
                }
            },
            hasData: function (a) {
                return !n.isEmptyObject(this.cache[a[this.expando]] || {});
            },
            discard: function (a) {
                a[this.expando] && delete this.cache[a[this.expando]];
            },
        });
    var L = new K(),
        M = new K(),
        N = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        O = /([A-Z])/g;

    function P(a, b, c) {
        var d;
        if (void 0 === c && 1 === a.nodeType)
            if (
                ((d = "data-" + b.replace(O, "-$1").toLowerCase()),
                (c = a.getAttribute(d)),
                "string" == typeof c)
            ) {
                try {
                    c =
                        "true" === c
                            ? !0
                            : "false" === c
                              ? !1
                              : "null" === c
                                ? null
                                : +c + "" === c
                                  ? +c
                                  : N.test(c)
                                    ? n.parseJSON(c)
                                    : c;
                } catch (e) {}
                M.set(a, b, c);
            } else c = void 0;
        return c;
    }
    n.extend({
        hasData: function (a) {
            return M.hasData(a) || L.hasData(a);
        },
        data: function (a, b, c) {
            return M.access(a, b, c);
        },
        removeData: function (a, b) {
            M.remove(a, b);
        },
        _data: function (a, b, c) {
            return L.access(a, b, c);
        },
        _removeData: function (a, b) {
            L.remove(a, b);
        },
    }),
        n.fn.extend({
            data: function (a, b) {
                var c,
                    d,
                    e,
                    f = this[0],
                    g = f && f.attributes;
                if (void 0 === a) {
                    if (
                        this.length &&
                        ((e = M.get(f)),
                        1 === f.nodeType && !L.get(f, "hasDataAttrs"))
                    ) {
                        c = g.length;
                        while (c--)
                            g[c] &&
                                ((d = g[c].name),
                                0 === d.indexOf("data-") &&
                                    ((d = n.camelCase(d.slice(5))),
                                    P(f, d, e[d])));
                        L.set(f, "hasDataAttrs", !0);
                    }
                    return e;
                }
                return "object" == typeof a
                    ? this.each(function () {
                          M.set(this, a);
                      })
                    : J(
                          this,
                          function (b) {
                              var c,
                                  d = n.camelCase(a);
                              if (f && void 0 === b) {
                                  if (((c = M.get(f, a)), void 0 !== c))
                                      return c;
                                  if (((c = M.get(f, d)), void 0 !== c))
                                      return c;
                                  if (((c = P(f, d, void 0)), void 0 !== c))
                                      return c;
                              } else
                                  this.each(function () {
                                      var c = M.get(this, d);
                                      M.set(this, d, b),
                                          -1 !== a.indexOf("-") &&
                                              void 0 !== c &&
                                              M.set(this, a, b);
                                  });
                          },
                          null,
                          b,
                          arguments.length > 1,
                          null,
                          !0,
                      );
            },
            removeData: function (a) {
                return this.each(function () {
                    M.remove(this, a);
                });
            },
        }),
        n.extend({
            queue: function (a, b, c) {
                var d;
                return a
                    ? ((b = (b || "fx") + "queue"),
                      (d = L.get(a, b)),
                      c &&
                          (!d || n.isArray(c)
                              ? (d = L.access(a, b, n.makeArray(c)))
                              : d.push(c)),
                      d || [])
                    : void 0;
            },
            dequeue: function (a, b) {
                b = b || "fx";
                var c = n.queue(a, b),
                    d = c.length,
                    e = c.shift(),
                    f = n._queueHooks(a, b),
                    g = function () {
                        n.dequeue(a, b);
                    };
                "inprogress" === e && ((e = c.shift()), d--),
                    e &&
                        ("fx" === b && c.unshift("inprogress"),
                        delete f.stop,
                        e.call(a, g, f)),
                    !d && f && f.empty.fire();
            },
            _queueHooks: function (a, b) {
                var c = b + "queueHooks";
                return (
                    L.get(a, c) ||
                    L.access(a, c, {
                        empty: n.Callbacks("once memory").add(function () {
                            L.remove(a, [b + "queue", c]);
                        }),
                    })
                );
            },
        }),
        n.fn.extend({
            queue: function (a, b) {
                var c = 2;
                return (
                    "string" != typeof a && ((b = a), (a = "fx"), c--),
                    arguments.length < c
                        ? n.queue(this[0], a)
                        : void 0 === b
                          ? this
                          : this.each(function () {
                                var c = n.queue(this, a, b);
                                n._queueHooks(this, a),
                                    "fx" === a &&
                                        "inprogress" !== c[0] &&
                                        n.dequeue(this, a);
                            })
                );
            },
            dequeue: function (a) {
                return this.each(function () {
                    n.dequeue(this, a);
                });
            },
            clearQueue: function (a) {
                return this.queue(a || "fx", []);
            },
            promise: function (a, b) {
                var c,
                    d = 1,
                    e = n.Deferred(),
                    f = this,
                    g = this.length,
                    h = function () {
                        --d || e.resolveWith(f, [f]);
                    };
                "string" != typeof a && ((b = a), (a = void 0)),
                    (a = a || "fx");
                while (g--)
                    (c = L.get(f[g], a + "queueHooks")),
                        c && c.empty && (d++, c.empty.add(h));
                return h(), e.promise(b);
            },
        });
    var Q = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        R = ["Top", "Right", "Bottom", "Left"],
        S = function (a, b) {
            return (
                (a = b || a),
                "none" === n.css(a, "display") ||
                    !n.contains(a.ownerDocument, a)
            );
        },
        T = /^(?:checkbox|radio)$/i;
    !(function () {
        var a = l.createDocumentFragment(),
            b = a.appendChild(l.createElement("div")),
            c = l.createElement("input");
        c.setAttribute("type", "radio"),
            c.setAttribute("checked", "checked"),
            c.setAttribute("name", "t"),
            b.appendChild(c),
            (k.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked),
            (b.innerHTML = "<textarea>x</textarea>"),
            (k.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue);
    })();
    var U = "undefined";
    k.focusinBubbles = "onfocusin" in a;
    var V = /^key/,
        W = /^(?:mouse|pointer|contextmenu)|click/,
        X = /^(?:focusinfocus|focusoutblur)$/,
        Y = /^([^.]*)(?:\.(.+)|)$/;

    function Z() {
        return !0;
    }

    function $() {
        return !1;
    }

    function _() {
        try {
            return l.activeElement;
        } catch (a) {}
    }
    (n.event = {
        global: {},
        add: function (a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                o,
                p,
                q,
                r = L.get(a);
            if (r) {
                c.handler && ((f = c), (c = f.handler), (e = f.selector)),
                    c.guid || (c.guid = n.guid++),
                    (i = r.events) || (i = r.events = {}),
                    (g = r.handle) ||
                        (g = r.handle =
                            function (b) {
                                return typeof n !== U &&
                                    n.event.triggered !== b.type
                                    ? n.event.dispatch.apply(a, arguments)
                                    : void 0;
                            }),
                    (b = (b || "").match(E) || [""]),
                    (j = b.length);
                while (j--)
                    (h = Y.exec(b[j]) || []),
                        (o = q = h[1]),
                        (p = (h[2] || "").split(".").sort()),
                        o &&
                            ((l = n.event.special[o] || {}),
                            (o = (e ? l.delegateType : l.bindType) || o),
                            (l = n.event.special[o] || {}),
                            (k = n.extend(
                                {
                                    type: o,
                                    origType: q,
                                    data: d,
                                    handler: c,
                                    guid: c.guid,
                                    selector: e,
                                    needsContext:
                                        e && n.expr.match.needsContext.test(e),
                                    namespace: p.join("."),
                                },
                                f,
                            )),
                            (m = i[o]) ||
                                ((m = i[o] = []),
                                (m.delegateCount = 0),
                                (l.setup && l.setup.call(a, d, p, g) !== !1) ||
                                    (a.addEventListener &&
                                        a.addEventListener(o, g, !1))),
                            l.add &&
                                (l.add.call(a, k),
                                k.handler.guid || (k.handler.guid = c.guid)),
                            e ? m.splice(m.delegateCount++, 0, k) : m.push(k),
                            (n.event.global[o] = !0));
            }
        },
        remove: function (a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                o,
                p,
                q,
                r = L.hasData(a) && L.get(a);
            if (r && (i = r.events)) {
                (b = (b || "").match(E) || [""]), (j = b.length);
                while (j--)
                    if (
                        ((h = Y.exec(b[j]) || []),
                        (o = q = h[1]),
                        (p = (h[2] || "").split(".").sort()),
                        o)
                    ) {
                        (l = n.event.special[o] || {}),
                            (o = (d ? l.delegateType : l.bindType) || o),
                            (m = i[o] || []),
                            (h =
                                h[2] &&
                                new RegExp(
                                    "(^|\\.)" +
                                        p.join("\\.(?:.*\\.|)") +
                                        "(\\.|$)",
                                )),
                            (g = f = m.length);
                        while (f--)
                            (k = m[f]),
                                (!e && q !== k.origType) ||
                                    (c && c.guid !== k.guid) ||
                                    (h && !h.test(k.namespace)) ||
                                    (d &&
                                        d !== k.selector &&
                                        ("**" !== d || !k.selector)) ||
                                    (m.splice(f, 1),
                                    k.selector && m.delegateCount--,
                                    l.remove && l.remove.call(a, k));
                        g &&
                            !m.length &&
                            ((l.teardown &&
                                l.teardown.call(a, p, r.handle) !== !1) ||
                                n.removeEvent(a, o, r.handle),
                            delete i[o]);
                    } else for (o in i) n.event.remove(a, o + b[j], c, d, !0);
                n.isEmptyObject(i) && (delete r.handle, L.remove(a, "events"));
            }
        },
        trigger: function (b, c, d, e) {
            var f,
                g,
                h,
                i,
                k,
                m,
                o,
                p = [d || l],
                q = j.call(b, "type") ? b.type : b,
                r = j.call(b, "namespace") ? b.namespace.split(".") : [];
            if (
                ((g = h = d = d || l),
                3 !== d.nodeType &&
                    8 !== d.nodeType &&
                    !X.test(q + n.event.triggered) &&
                    (q.indexOf(".") >= 0 &&
                        ((r = q.split(".")), (q = r.shift()), r.sort()),
                    (k = q.indexOf(":") < 0 && "on" + q),
                    (b = b[n.expando]
                        ? b
                        : new n.Event(q, "object" == typeof b && b)),
                    (b.isTrigger = e ? 2 : 3),
                    (b.namespace = r.join(".")),
                    (b.namespace_re = b.namespace
                        ? new RegExp(
                              "(^|\\.)" + r.join("\\.(?:.*\\.|)") + "(\\.|$)",
                          )
                        : null),
                    (b.result = void 0),
                    b.target || (b.target = d),
                    (c = null == c ? [b] : n.makeArray(c, [b])),
                    (o = n.event.special[q] || {}),
                    e || !o.trigger || o.trigger.apply(d, c) !== !1))
            ) {
                if (!e && !o.noBubble && !n.isWindow(d)) {
                    for (
                        i = o.delegateType || q,
                            X.test(i + q) || (g = g.parentNode);
                        g;
                        g = g.parentNode
                    )
                        p.push(g), (h = g);
                    h === (d.ownerDocument || l) &&
                        p.push(h.defaultView || h.parentWindow || a);
                }
                f = 0;
                while ((g = p[f++]) && !b.isPropagationStopped())
                    (b.type = f > 1 ? i : o.bindType || q),
                        (m =
                            (L.get(g, "events") || {})[b.type] &&
                            L.get(g, "handle")),
                        m && m.apply(g, c),
                        (m = k && g[k]),
                        m &&
                            m.apply &&
                            n.acceptData(g) &&
                            ((b.result = m.apply(g, c)),
                            b.result === !1 && b.preventDefault());
                return (
                    (b.type = q),
                    e ||
                        b.isDefaultPrevented() ||
                        (o._default && o._default.apply(p.pop(), c) !== !1) ||
                        !n.acceptData(d) ||
                        (k &&
                            n.isFunction(d[q]) &&
                            !n.isWindow(d) &&
                            ((h = d[k]),
                            h && (d[k] = null),
                            (n.event.triggered = q),
                            d[q](),
                            (n.event.triggered = void 0),
                            h && (d[k] = h))),
                    b.result
                );
            }
        },
        dispatch: function (a) {
            a = n.event.fix(a);
            var b,
                c,
                e,
                f,
                g,
                h = [],
                i = d.call(arguments),
                j = (L.get(this, "events") || {})[a.type] || [],
                k = n.event.special[a.type] || {};
            if (
                ((i[0] = a),
                (a.delegateTarget = this),
                !k.preDispatch || k.preDispatch.call(this, a) !== !1)
            ) {
                (h = n.event.handlers.call(this, a, j)), (b = 0);
                while ((f = h[b++]) && !a.isPropagationStopped()) {
                    (a.currentTarget = f.elem), (c = 0);
                    while (
                        (g = f.handlers[c++]) &&
                        !a.isImmediatePropagationStopped()
                    )
                        (!a.namespace_re || a.namespace_re.test(g.namespace)) &&
                            ((a.handleObj = g),
                            (a.data = g.data),
                            (e = (
                                (n.event.special[g.origType] || {}).handle ||
                                g.handler
                            ).apply(f.elem, i)),
                            void 0 !== e &&
                                (a.result = e) === !1 &&
                                (a.preventDefault(), a.stopPropagation()));
                }
                return k.postDispatch && k.postDispatch.call(this, a), a.result;
            }
        },
        handlers: function (a, b) {
            var c,
                d,
                e,
                f,
                g = [],
                h = b.delegateCount,
                i = a.target;
            if (h && i.nodeType && (!a.button || "click" !== a.type))
                for (; i !== this; i = i.parentNode || this)
                    if (i.disabled !== !0 || "click" !== a.type) {
                        for (d = [], c = 0; h > c; c++)
                            (f = b[c]),
                                (e = f.selector + " "),
                                void 0 === d[e] &&
                                    (d[e] = f.needsContext
                                        ? n(e, this).index(i) >= 0
                                        : n.find(e, this, null, [i]).length),
                                d[e] && d.push(f);
                        d.length &&
                            g.push({
                                elem: i,
                                handlers: d,
                            });
                    }
            return (
                h < b.length &&
                    g.push({
                        elem: this,
                        handlers: b.slice(h),
                    }),
                g
            );
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(
            " ",
        ),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function (a, b) {
                return (
                    null == a.which &&
                        (a.which = null != b.charCode ? b.charCode : b.keyCode),
                    a
                );
            },
        },
        mouseHooks: {
            props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(
                " ",
            ),
            filter: function (a, b) {
                var c,
                    d,
                    e,
                    f = b.button;
                return (
                    null == a.pageX &&
                        null != b.clientX &&
                        ((c = a.target.ownerDocument || l),
                        (d = c.documentElement),
                        (e = c.body),
                        (a.pageX =
                            b.clientX +
                            ((d && d.scrollLeft) || (e && e.scrollLeft) || 0) -
                            ((d && d.clientLeft) || (e && e.clientLeft) || 0)),
                        (a.pageY =
                            b.clientY +
                            ((d && d.scrollTop) || (e && e.scrollTop) || 0) -
                            ((d && d.clientTop) || (e && e.clientTop) || 0))),
                    a.which ||
                        void 0 === f ||
                        (a.which = 1 & f ? 1 : 2 & f ? 3 : 4 & f ? 2 : 0),
                    a
                );
            },
        },
        fix: function (a) {
            if (a[n.expando]) return a;
            var b,
                c,
                d,
                e = a.type,
                f = a,
                g = this.fixHooks[e];
            g ||
                (this.fixHooks[e] = g =
                    W.test(e)
                        ? this.mouseHooks
                        : V.test(e)
                          ? this.keyHooks
                          : {}),
                (d = g.props ? this.props.concat(g.props) : this.props),
                (a = new n.Event(f)),
                (b = d.length);
            while (b--) (c = d[b]), (a[c] = f[c]);
            return (
                a.target || (a.target = l),
                3 === a.target.nodeType && (a.target = a.target.parentNode),
                g.filter ? g.filter(a, f) : a
            );
        },
        special: {
            load: {
                noBubble: !0,
            },
            focus: {
                trigger: function () {
                    return this !== _() && this.focus
                        ? (this.focus(), !1)
                        : void 0;
                },
                delegateType: "focusin",
            },
            blur: {
                trigger: function () {
                    return this === _() && this.blur
                        ? (this.blur(), !1)
                        : void 0;
                },
                delegateType: "focusout",
            },
            click: {
                trigger: function () {
                    return "checkbox" === this.type &&
                        this.click &&
                        n.nodeName(this, "input")
                        ? (this.click(), !1)
                        : void 0;
                },
                _default: function (a) {
                    return n.nodeName(a.target, "a");
                },
            },
            beforeunload: {
                postDispatch: function (a) {
                    void 0 !== a.result &&
                        a.originalEvent &&
                        (a.originalEvent.returnValue = a.result);
                },
            },
        },
        simulate: function (a, b, c, d) {
            var e = n.extend(new n.Event(), c, {
                type: a,
                isSimulated: !0,
                originalEvent: {},
            });
            d ? n.event.trigger(e, null, b) : n.event.dispatch.call(b, e),
                e.isDefaultPrevented() && c.preventDefault();
        },
    }),
        (n.removeEvent = function (a, b, c) {
            a.removeEventListener && a.removeEventListener(b, c, !1);
        }),
        (n.Event = function (a, b) {
            return this instanceof n.Event
                ? (a && a.type
                      ? ((this.originalEvent = a),
                        (this.type = a.type),
                        (this.isDefaultPrevented =
                            a.defaultPrevented ||
                            (void 0 === a.defaultPrevented &&
                                a.returnValue === !1)
                                ? Z
                                : $))
                      : (this.type = a),
                  b && n.extend(this, b),
                  (this.timeStamp = (a && a.timeStamp) || n.now()),
                  void (this[n.expando] = !0))
                : new n.Event(a, b);
        }),
        (n.Event.prototype = {
            isDefaultPrevented: $,
            isPropagationStopped: $,
            isImmediatePropagationStopped: $,
            preventDefault: function () {
                var a = this.originalEvent;
                (this.isDefaultPrevented = Z),
                    a && a.preventDefault && a.preventDefault();
            },
            stopPropagation: function () {
                var a = this.originalEvent;
                (this.isPropagationStopped = Z),
                    a && a.stopPropagation && a.stopPropagation();
            },
            stopImmediatePropagation: function () {
                var a = this.originalEvent;
                (this.isImmediatePropagationStopped = Z),
                    a &&
                        a.stopImmediatePropagation &&
                        a.stopImmediatePropagation(),
                    this.stopPropagation();
            },
        }),
        n.each(
            {
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout",
            },
            function (a, b) {
                n.event.special[a] = {
                    delegateType: b,
                    bindType: b,
                    handle: function (a) {
                        var c,
                            d = this,
                            e = a.relatedTarget,
                            f = a.handleObj;
                        return (
                            (!e || (e !== d && !n.contains(d, e))) &&
                                ((a.type = f.origType),
                                (c = f.handler.apply(this, arguments)),
                                (a.type = b)),
                            c
                        );
                    },
                };
            },
        ),
        k.focusinBubbles ||
            n.each(
                {
                    focus: "focusin",
                    blur: "focusout",
                },
                function (a, b) {
                    var c = function (a) {
                        n.event.simulate(b, a.target, n.event.fix(a), !0);
                    };
                    n.event.special[b] = {
                        setup: function () {
                            var d = this.ownerDocument || this,
                                e = L.access(d, b);
                            e || d.addEventListener(a, c, !0),
                                L.access(d, b, (e || 0) + 1);
                        },
                        teardown: function () {
                            var d = this.ownerDocument || this,
                                e = L.access(d, b) - 1;
                            e
                                ? L.access(d, b, e)
                                : (d.removeEventListener(a, c, !0),
                                  L.remove(d, b));
                        },
                    };
                },
            ),
        n.fn.extend({
            on: function (a, b, c, d, e) {
                var f, g;
                if ("object" == typeof a) {
                    "string" != typeof b && ((c = c || b), (b = void 0));
                    for (g in a) this.on(g, b, c, a[g], e);
                    return this;
                }
                if (
                    (null == c && null == d
                        ? ((d = b), (c = b = void 0))
                        : null == d &&
                          ("string" == typeof b
                              ? ((d = c), (c = void 0))
                              : ((d = c), (c = b), (b = void 0))),
                    d === !1)
                )
                    d = $;
                else if (!d) return this;
                return (
                    1 === e &&
                        ((f = d),
                        (d = function (a) {
                            return n().off(a), f.apply(this, arguments);
                        }),
                        (d.guid = f.guid || (f.guid = n.guid++))),
                    this.each(function () {
                        n.event.add(this, a, d, c, b);
                    })
                );
            },
            one: function (a, b, c, d) {
                return this.on(a, b, c, d, 1);
            },
            off: function (a, b, c) {
                var d, e;
                if (a && a.preventDefault && a.handleObj)
                    return (
                        (d = a.handleObj),
                        n(a.delegateTarget).off(
                            d.namespace
                                ? d.origType + "." + d.namespace
                                : d.origType,
                            d.selector,
                            d.handler,
                        ),
                        this
                    );
                if ("object" == typeof a) {
                    for (e in a) this.off(e, b, a[e]);
                    return this;
                }
                return (
                    (b === !1 || "function" == typeof b) &&
                        ((c = b), (b = void 0)),
                    c === !1 && (c = $),
                    this.each(function () {
                        n.event.remove(this, a, c, b);
                    })
                );
            },
            trigger: function (a, b) {
                return this.each(function () {
                    n.event.trigger(a, b, this);
                });
            },
            triggerHandler: function (a, b) {
                var c = this[0];
                return c ? n.event.trigger(a, b, c, !0) : void 0;
            },
        });
    var ab =
            /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        bb = /<([\w:]+)/,
        cb = /<|&#?\w+;/,
        db = /<(?:script|style|link)/i,
        eb = /checked\s*(?:[^=]|=\s*.checked.)/i,
        fb = /^$|\/(?:java|ecma)script/i,
        gb = /^true\/(.*)/,
        hb = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        ib = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""],
        };
    (ib.optgroup = ib.option),
        (ib.tbody = ib.tfoot = ib.colgroup = ib.caption = ib.thead),
        (ib.th = ib.td);

    function jb(a, b) {
        return n.nodeName(a, "table") &&
            n.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr")
            ? a.getElementsByTagName("tbody")[0] ||
                  a.appendChild(a.ownerDocument.createElement("tbody"))
            : a;
    }

    function kb(a) {
        return (a.type = (null !== a.getAttribute("type")) + "/" + a.type), a;
    }

    function lb(a) {
        var b = gb.exec(a.type);
        return b ? (a.type = b[1]) : a.removeAttribute("type"), a;
    }

    function mb(a, b) {
        for (var c = 0, d = a.length; d > c; c++)
            L.set(a[c], "globalEval", !b || L.get(b[c], "globalEval"));
    }

    function nb(a, b) {
        var c, d, e, f, g, h, i, j;
        if (1 === b.nodeType) {
            if (
                L.hasData(a) &&
                ((f = L.access(a)), (g = L.set(b, f)), (j = f.events))
            ) {
                delete g.handle, (g.events = {});
                for (e in j)
                    for (c = 0, d = j[e].length; d > c; c++)
                        n.event.add(b, e, j[e][c]);
            }
            M.hasData(a) &&
                ((h = M.access(a)), (i = n.extend({}, h)), M.set(b, i));
        }
    }

    function ob(a, b) {
        var c = a.getElementsByTagName
            ? a.getElementsByTagName(b || "*")
            : a.querySelectorAll
              ? a.querySelectorAll(b || "*")
              : [];
        return void 0 === b || (b && n.nodeName(a, b)) ? n.merge([a], c) : c;
    }

    function pb(a, b) {
        var c = b.nodeName.toLowerCase();
        "input" === c && T.test(a.type)
            ? (b.checked = a.checked)
            : ("input" === c || "textarea" === c) &&
              (b.defaultValue = a.defaultValue);
    }
    n.extend({
        clone: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h = a.cloneNode(!0),
                i = n.contains(a.ownerDocument, a);
            if (
                !(
                    k.noCloneChecked ||
                    (1 !== a.nodeType && 11 !== a.nodeType) ||
                    n.isXMLDoc(a)
                )
            )
                for (g = ob(h), f = ob(a), d = 0, e = f.length; e > d; d++)
                    pb(f[d], g[d]);
            if (b)
                if (c)
                    for (
                        f = f || ob(a), g = g || ob(h), d = 0, e = f.length;
                        e > d;
                        d++
                    )
                        nb(f[d], g[d]);
                else nb(a, h);
            return (
                (g = ob(h, "script")),
                g.length > 0 && mb(g, !i && ob(a, "script")),
                h
            );
        },
        buildFragment: function (a, b, c, d) {
            for (
                var e,
                    f,
                    g,
                    h,
                    i,
                    j,
                    k = b.createDocumentFragment(),
                    l = [],
                    m = 0,
                    o = a.length;
                o > m;
                m++
            )
                if (((e = a[m]), e || 0 === e))
                    if ("object" === n.type(e))
                        n.merge(l, e.nodeType ? [e] : e);
                    else if (cb.test(e)) {
                        (f = f || k.appendChild(b.createElement("div"))),
                            (g = (bb.exec(e) || ["", ""])[1].toLowerCase()),
                            (h = ib[g] || ib._default),
                            (f.innerHTML =
                                h[1] + e.replace(ab, "<$1></$2>") + h[2]),
                            (j = h[0]);
                        while (j--) f = f.lastChild;
                        n.merge(l, f.childNodes),
                            (f = k.firstChild),
                            (f.textContent = "");
                    } else l.push(b.createTextNode(e));
            (k.textContent = ""), (m = 0);
            while ((e = l[m++]))
                if (
                    (!d || -1 === n.inArray(e, d)) &&
                    ((i = n.contains(e.ownerDocument, e)),
                    (f = ob(k.appendChild(e), "script")),
                    i && mb(f),
                    c)
                ) {
                    j = 0;
                    while ((e = f[j++])) fb.test(e.type || "") && c.push(e);
                }
            return k;
        },
        cleanData: function (a) {
            for (
                var b, c, d, e, f = n.event.special, g = 0;
                void 0 !== (c = a[g]);
                g++
            ) {
                if (
                    n.acceptData(c) &&
                    ((e = c[L.expando]), e && (b = L.cache[e]))
                ) {
                    if (b.events)
                        for (d in b.events)
                            f[d]
                                ? n.event.remove(c, d)
                                : n.removeEvent(c, d, b.handle);
                    L.cache[e] && delete L.cache[e];
                }
                delete M.cache[c[M.expando]];
            }
        },
    }),
        n.fn.extend({
            text: function (a) {
                return J(
                    this,
                    function (a) {
                        return void 0 === a
                            ? n.text(this)
                            : this.empty().each(function () {
                                  (1 === this.nodeType ||
                                      11 === this.nodeType ||
                                      9 === this.nodeType) &&
                                      (this.textContent = a);
                              });
                    },
                    null,
                    a,
                    arguments.length,
                );
            },
            append: function () {
                return this.domManip(arguments, function (a) {
                    if (
                        1 === this.nodeType ||
                        11 === this.nodeType ||
                        9 === this.nodeType
                    ) {
                        var b = jb(this, a);
                        b.appendChild(a);
                    }
                });
            },
            prepend: function () {
                return this.domManip(arguments, function (a) {
                    if (
                        1 === this.nodeType ||
                        11 === this.nodeType ||
                        9 === this.nodeType
                    ) {
                        var b = jb(this, a);
                        b.insertBefore(a, b.firstChild);
                    }
                });
            },
            before: function () {
                return this.domManip(arguments, function (a) {
                    this.parentNode && this.parentNode.insertBefore(a, this);
                });
            },
            after: function () {
                return this.domManip(arguments, function (a) {
                    this.parentNode &&
                        this.parentNode.insertBefore(a, this.nextSibling);
                });
            },
            remove: function (a, b) {
                for (
                    var c, d = a ? n.filter(a, this) : this, e = 0;
                    null != (c = d[e]);
                    e++
                )
                    b || 1 !== c.nodeType || n.cleanData(ob(c)),
                        c.parentNode &&
                            (b &&
                                n.contains(c.ownerDocument, c) &&
                                mb(ob(c, "script")),
                            c.parentNode.removeChild(c));
                return this;
            },
            empty: function () {
                for (var a, b = 0; null != (a = this[b]); b++)
                    1 === a.nodeType &&
                        (n.cleanData(ob(a, !1)), (a.textContent = ""));
                return this;
            },
            clone: function (a, b) {
                return (
                    (a = null == a ? !1 : a),
                    (b = null == b ? a : b),
                    this.map(function () {
                        return n.clone(this, a, b);
                    })
                );
            },
            html: function (a) {
                return J(
                    this,
                    function (a) {
                        var b = this[0] || {},
                            c = 0,
                            d = this.length;
                        if (void 0 === a && 1 === b.nodeType)
                            return b.innerHTML;
                        if (
                            "string" == typeof a &&
                            !db.test(a) &&
                            !ib[(bb.exec(a) || ["", ""])[1].toLowerCase()]
                        ) {
                            a = a.replace(ab, "<$1></$2>");
                            try {
                                for (; d > c; c++)
                                    (b = this[c] || {}),
                                        1 === b.nodeType &&
                                            (n.cleanData(ob(b, !1)),
                                            (b.innerHTML = a));
                                b = 0;
                            } catch (e) {}
                        }
                        b && this.empty().append(a);
                    },
                    null,
                    a,
                    arguments.length,
                );
            },
            replaceWith: function () {
                var a = arguments[0];
                return (
                    this.domManip(arguments, function (b) {
                        (a = this.parentNode),
                            n.cleanData(ob(this)),
                            a && a.replaceChild(b, this);
                    }),
                    a && (a.length || a.nodeType) ? this : this.remove()
                );
            },
            detach: function (a) {
                return this.remove(a, !0);
            },
            domManip: function (a, b) {
                a = e.apply([], a);
                var c,
                    d,
                    f,
                    g,
                    h,
                    i,
                    j = 0,
                    l = this.length,
                    m = this,
                    o = l - 1,
                    p = a[0],
                    q = n.isFunction(p);
                if (
                    q ||
                    (l > 1 &&
                        "string" == typeof p &&
                        !k.checkClone &&
                        eb.test(p))
                )
                    return this.each(function (c) {
                        var d = m.eq(c);
                        q && (a[0] = p.call(this, c, d.html())),
                            d.domManip(a, b);
                    });
                if (
                    l &&
                    ((c = n.buildFragment(a, this[0].ownerDocument, !1, this)),
                    (d = c.firstChild),
                    1 === c.childNodes.length && (c = d),
                    d)
                ) {
                    for (
                        f = n.map(ob(c, "script"), kb), g = f.length;
                        l > j;
                        j++
                    )
                        (h = c),
                            j !== o &&
                                ((h = n.clone(h, !0, !0)),
                                g && n.merge(f, ob(h, "script"))),
                            b.call(this[j], h, j);
                    if (g)
                        for (
                            i = f[f.length - 1].ownerDocument,
                                n.map(f, lb),
                                j = 0;
                            g > j;
                            j++
                        )
                            (h = f[j]),
                                fb.test(h.type || "") &&
                                    !L.access(h, "globalEval") &&
                                    n.contains(i, h) &&
                                    (h.src
                                        ? n._evalUrl && n._evalUrl(h.src)
                                        : n.globalEval(
                                              h.textContent.replace(hb, ""),
                                          ));
                }
                return this;
            },
        }),
        n.each(
            {
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith",
            },
            function (a, b) {
                n.fn[a] = function (a) {
                    for (
                        var c, d = [], e = n(a), g = e.length - 1, h = 0;
                        g >= h;
                        h++
                    )
                        (c = h === g ? this : this.clone(!0)),
                            n(e[h])[b](c),
                            f.apply(d, c.get());
                    return this.pushStack(d);
                };
            },
        );
    var qb,
        rb = {};

    function sb(b, c) {
        var d,
            e = n(c.createElement(b)).appendTo(c.body),
            f =
                a.getDefaultComputedStyle &&
                (d = a.getDefaultComputedStyle(e[0]))
                    ? d.display
                    : n.css(e[0], "display");
        return e.detach(), f;
    }

    function tb(a) {
        var b = l,
            c = rb[a];
        return (
            c ||
                ((c = sb(a, b)),
                ("none" !== c && c) ||
                    ((qb = (
                        qb ||
                        n("<iframe frameborder='0' width='0' height='0'/>")
                    ).appendTo(b.documentElement)),
                    (b = qb[0].contentDocument),
                    b.write(),
                    b.close(),
                    (c = sb(a, b)),
                    qb.detach()),
                (rb[a] = c)),
            c
        );
    }
    var ub = /^margin/,
        vb = new RegExp("^(" + Q + ")(?!px)[a-z%]+$", "i"),
        wb = function (a) {
            return a.ownerDocument.defaultView.getComputedStyle(a, null);
        };

    function xb(a, b, c) {
        var d,
            e,
            f,
            g,
            h = a.style;
        return (
            (c = c || wb(a)),
            c && (g = c.getPropertyValue(b) || c[b]),
            c &&
                ("" !== g ||
                    n.contains(a.ownerDocument, a) ||
                    (g = n.style(a, b)),
                vb.test(g) &&
                    ub.test(b) &&
                    ((d = h.width),
                    (e = h.minWidth),
                    (f = h.maxWidth),
                    (h.minWidth = h.maxWidth = h.width = g),
                    (g = c.width),
                    (h.width = d),
                    (h.minWidth = e),
                    (h.maxWidth = f))),
            void 0 !== g ? g + "" : g
        );
    }

    function yb(a, b) {
        return {
            get: function () {
                return a()
                    ? void delete this.get
                    : (this.get = b).apply(this, arguments);
            },
        };
    }
    !(function () {
        var b,
            c,
            d = l.documentElement,
            e = l.createElement("div"),
            f = l.createElement("div");
        if (f.style) {
            (f.style.backgroundClip = "content-box"),
                (f.cloneNode(!0).style.backgroundClip = ""),
                (k.clearCloneStyle = "content-box" === f.style.backgroundClip),
                (e.style.cssText =
                    "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute"),
                e.appendChild(f);

            function g() {
                (f.style.cssText =
                    "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute"),
                    (f.innerHTML = ""),
                    d.appendChild(e);
                var g = a.getComputedStyle(f, null);
                (b = "1%" !== g.top), (c = "4px" === g.width), d.removeChild(e);
            }
            a.getComputedStyle &&
                n.extend(k, {
                    pixelPosition: function () {
                        return g(), b;
                    },
                    boxSizingReliable: function () {
                        return null == c && g(), c;
                    },
                    reliableMarginRight: function () {
                        var b,
                            c = f.appendChild(l.createElement("div"));
                        return (
                            (c.style.cssText = f.style.cssText =
                                "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0"),
                            (c.style.marginRight = c.style.width = "0"),
                            (f.style.width = "1px"),
                            d.appendChild(e),
                            (b = !parseFloat(
                                a.getComputedStyle(c, null).marginRight,
                            )),
                            d.removeChild(e),
                            b
                        );
                    },
                });
        }
    })(),
        (n.swap = function (a, b, c, d) {
            var e,
                f,
                g = {};
            for (f in b) (g[f] = a.style[f]), (a.style[f] = b[f]);
            e = c.apply(a, d || []);
            for (f in b) a.style[f] = g[f];
            return e;
        });
    var zb = /^(none|table(?!-c[ea]).+)/,
        Ab = new RegExp("^(" + Q + ")(.*)$", "i"),
        Bb = new RegExp("^([+-])=(" + Q + ")", "i"),
        Cb = {
            position: "absolute",
            visibility: "hidden",
            display: "block",
        },
        Db = {
            letterSpacing: "0",
            fontWeight: "400",
        },
        Eb = ["Webkit", "O", "Moz", "ms"];

    function Fb(a, b) {
        if (b in a) return b;
        var c = b[0].toUpperCase() + b.slice(1),
            d = b,
            e = Eb.length;
        while (e--) if (((b = Eb[e] + c), b in a)) return b;
        return d;
    }

    function Gb(a, b, c) {
        var d = Ab.exec(b);
        return d ? Math.max(0, d[1] - (c || 0)) + (d[2] || "px") : b;
    }

    function Hb(a, b, c, d, e) {
        for (
            var f =
                    c === (d ? "border" : "content")
                        ? 4
                        : "width" === b
                          ? 1
                          : 0,
                g = 0;
            4 > f;
            f += 2
        )
            "margin" === c && (g += n.css(a, c + R[f], !0, e)),
                d
                    ? ("content" === c &&
                          (g -= n.css(a, "padding" + R[f], !0, e)),
                      "margin" !== c &&
                          (g -= n.css(a, "border" + R[f] + "Width", !0, e)))
                    : ((g += n.css(a, "padding" + R[f], !0, e)),
                      "padding" !== c &&
                          (g += n.css(a, "border" + R[f] + "Width", !0, e)));
        return g;
    }

    function Ib(a, b, c) {
        var d = !0,
            e = "width" === b ? a.offsetWidth : a.offsetHeight,
            f = wb(a),
            g = "border-box" === n.css(a, "boxSizing", !1, f);
        if (0 >= e || null == e) {
            if (
                ((e = xb(a, b, f)),
                (0 > e || null == e) && (e = a.style[b]),
                vb.test(e))
            )
                return e;
            (d = g && (k.boxSizingReliable() || e === a.style[b])),
                (e = parseFloat(e) || 0);
        }
        return e + Hb(a, b, c || (g ? "border" : "content"), d, f) + "px";
    }

    function Jb(a, b) {
        for (var c, d, e, f = [], g = 0, h = a.length; h > g; g++)
            (d = a[g]),
                d.style &&
                    ((f[g] = L.get(d, "olddisplay")),
                    (c = d.style.display),
                    b
                        ? (f[g] || "none" !== c || (d.style.display = ""),
                          "" === d.style.display &&
                              S(d) &&
                              (f[g] = L.access(
                                  d,
                                  "olddisplay",
                                  tb(d.nodeName),
                              )))
                        : ((e = S(d)),
                          ("none" === c && e) ||
                              L.set(
                                  d,
                                  "olddisplay",
                                  e ? c : n.css(d, "display"),
                              )));
        for (g = 0; h > g; g++)
            (d = a[g]),
                d.style &&
                    ((b &&
                        "none" !== d.style.display &&
                        "" !== d.style.display) ||
                        (d.style.display = b ? f[g] || "" : "none"));
        return a;
    }
    n.extend({
        cssHooks: {
            opacity: {
                get: function (a, b) {
                    if (b) {
                        var c = xb(a, "opacity");
                        return "" === c ? "1" : c;
                    }
                },
            },
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0,
        },
        cssProps: {
            float: "cssFloat",
        },
        style: function (a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e,
                    f,
                    g,
                    h = n.camelCase(b),
                    i = a.style;
                return (
                    (b = n.cssProps[h] || (n.cssProps[h] = Fb(i, h))),
                    (g = n.cssHooks[b] || n.cssHooks[h]),
                    void 0 === c
                        ? g && "get" in g && void 0 !== (e = g.get(a, !1, d))
                            ? e
                            : i[b]
                        : ((f = typeof c),
                          "string" === f &&
                              (e = Bb.exec(c)) &&
                              ((c =
                                  (e[1] + 1) * e[2] + parseFloat(n.css(a, b))),
                              (f = "number")),
                          null != c &&
                              c === c &&
                              ("number" !== f || n.cssNumber[h] || (c += "px"),
                              k.clearCloneStyle ||
                                  "" !== c ||
                                  0 !== b.indexOf("background") ||
                                  (i[b] = "inherit"),
                              (g &&
                                  "set" in g &&
                                  void 0 === (c = g.set(a, c, d))) ||
                                  (i[b] = c)),
                          void 0)
                );
            }
        },
        css: function (a, b, c, d) {
            var e,
                f,
                g,
                h = n.camelCase(b);
            return (
                (b = n.cssProps[h] || (n.cssProps[h] = Fb(a.style, h))),
                (g = n.cssHooks[b] || n.cssHooks[h]),
                g && "get" in g && (e = g.get(a, !0, c)),
                void 0 === e && (e = xb(a, b, d)),
                "normal" === e && b in Db && (e = Db[b]),
                "" === c || c
                    ? ((f = parseFloat(e)),
                      c === !0 || n.isNumeric(f) ? f || 0 : e)
                    : e
            );
        },
    }),
        n.each(["height", "width"], function (a, b) {
            n.cssHooks[b] = {
                get: function (a, c, d) {
                    return c
                        ? zb.test(n.css(a, "display")) && 0 === a.offsetWidth
                            ? n.swap(a, Cb, function () {
                                  return Ib(a, b, d);
                              })
                            : Ib(a, b, d)
                        : void 0;
                },
                set: function (a, c, d) {
                    var e = d && wb(a);
                    return Gb(
                        a,
                        c,
                        d
                            ? Hb(
                                  a,
                                  b,
                                  d,
                                  "border-box" === n.css(a, "boxSizing", !1, e),
                                  e,
                              )
                            : 0,
                    );
                },
            };
        }),
        (n.cssHooks.marginRight = yb(k.reliableMarginRight, function (a, b) {
            return b
                ? n.swap(
                      a,
                      {
                          display: "inline-block",
                      },
                      xb,
                      [a, "marginRight"],
                  )
                : void 0;
        })),
        n.each(
            {
                margin: "",
                padding: "",
                border: "Width",
            },
            function (a, b) {
                (n.cssHooks[a + b] = {
                    expand: function (c) {
                        for (
                            var d = 0,
                                e = {},
                                f = "string" == typeof c ? c.split(" ") : [c];
                            4 > d;
                            d++
                        )
                            e[a + R[d] + b] = f[d] || f[d - 2] || f[0];
                        return e;
                    },
                }),
                    ub.test(a) || (n.cssHooks[a + b].set = Gb);
            },
        ),
        n.fn.extend({
            css: function (a, b) {
                return J(
                    this,
                    function (a, b, c) {
                        var d,
                            e,
                            f = {},
                            g = 0;
                        if (n.isArray(b)) {
                            for (d = wb(a), e = b.length; e > g; g++)
                                f[b[g]] = n.css(a, b[g], !1, d);
                            return f;
                        }
                        return void 0 !== c ? n.style(a, b, c) : n.css(a, b);
                    },
                    a,
                    b,
                    arguments.length > 1,
                );
            },
            show: function () {
                return Jb(this, !0);
            },
            hide: function () {
                return Jb(this);
            },
            toggle: function (a) {
                return "boolean" == typeof a
                    ? a
                        ? this.show()
                        : this.hide()
                    : this.each(function () {
                          S(this) ? n(this).show() : n(this).hide();
                      });
            },
        });

    function Kb(a, b, c, d, e) {
        return new Kb.prototype.init(a, b, c, d, e);
    }
    (n.Tween = Kb),
        (Kb.prototype = {
            constructor: Kb,
            init: function (a, b, c, d, e, f) {
                (this.elem = a),
                    (this.prop = c),
                    (this.easing = e || "swing"),
                    (this.options = b),
                    (this.start = this.now = this.cur()),
                    (this.end = d),
                    (this.unit = f || (n.cssNumber[c] ? "" : "px"));
            },
            cur: function () {
                var a = Kb.propHooks[this.prop];
                return a && a.get
                    ? a.get(this)
                    : Kb.propHooks._default.get(this);
            },
            run: function (a) {
                var b,
                    c = Kb.propHooks[this.prop];
                return (
                    (this.pos = b =
                        this.options.duration
                            ? n.easing[this.easing](
                                  a,
                                  this.options.duration * a,
                                  0,
                                  1,
                                  this.options.duration,
                              )
                            : a),
                    (this.now = (this.end - this.start) * b + this.start),
                    this.options.step &&
                        this.options.step.call(this.elem, this.now, this),
                    c && c.set ? c.set(this) : Kb.propHooks._default.set(this),
                    this
                );
            },
        }),
        (Kb.prototype.init.prototype = Kb.prototype),
        (Kb.propHooks = {
            _default: {
                get: function (a) {
                    var b;
                    return null == a.elem[a.prop] ||
                        (a.elem.style && null != a.elem.style[a.prop])
                        ? ((b = n.css(a.elem, a.prop, "")),
                          b && "auto" !== b ? b : 0)
                        : a.elem[a.prop];
                },
                set: function (a) {
                    n.fx.step[a.prop]
                        ? n.fx.step[a.prop](a)
                        : a.elem.style &&
                            (null != a.elem.style[n.cssProps[a.prop]] ||
                                n.cssHooks[a.prop])
                          ? n.style(a.elem, a.prop, a.now + a.unit)
                          : (a.elem[a.prop] = a.now);
                },
            },
        }),
        (Kb.propHooks.scrollTop = Kb.propHooks.scrollLeft =
            {
                set: function (a) {
                    a.elem.nodeType &&
                        a.elem.parentNode &&
                        (a.elem[a.prop] = a.now);
                },
            }),
        (n.easing = {
            linear: function (a) {
                return a;
            },
            swing: function (a) {
                return 0.5 - Math.cos(a * Math.PI) / 2;
            },
        }),
        (n.fx = Kb.prototype.init),
        (n.fx.step = {});
    var Lb,
        Mb,
        Nb = /^(?:toggle|show|hide)$/,
        Ob = new RegExp("^(?:([+-])=|)(" + Q + ")([a-z%]*)$", "i"),
        Pb = /queueHooks$/,
        Qb = [Vb],
        Rb = {
            "*": [
                function (a, b) {
                    var c = this.createTween(a, b),
                        d = c.cur(),
                        e = Ob.exec(b),
                        f = (e && e[3]) || (n.cssNumber[a] ? "" : "px"),
                        g =
                            (n.cssNumber[a] || ("px" !== f && +d)) &&
                            Ob.exec(n.css(c.elem, a)),
                        h = 1,
                        i = 20;
                    if (g && g[3] !== f) {
                        (f = f || g[3]), (e = e || []), (g = +d || 1);
                        do (h = h || ".5"), (g /= h), n.style(c.elem, a, g + f);
                        while (h !== (h = c.cur() / d) && 1 !== h && --i);
                    }
                    return (
                        e &&
                            ((g = c.start = +g || +d || 0),
                            (c.unit = f),
                            (c.end = e[1] ? g + (e[1] + 1) * e[2] : +e[2])),
                        c
                    );
                },
            ],
        };

    function Sb() {
        return (
            setTimeout(function () {
                Lb = void 0;
            }),
            (Lb = n.now())
        );
    }

    function Tb(a, b) {
        var c,
            d = 0,
            e = {
                height: a,
            };
        for (b = b ? 1 : 0; 4 > d; d += 2 - b)
            (c = R[d]), (e["margin" + c] = e["padding" + c] = a);
        return b && (e.opacity = e.width = a), e;
    }

    function Ub(a, b, c) {
        for (
            var d, e = (Rb[b] || []).concat(Rb["*"]), f = 0, g = e.length;
            g > f;
            f++
        )
            if ((d = e[f].call(c, b, a))) return d;
    }

    function Vb(a, b, c) {
        var d,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l = this,
            m = {},
            o = a.style,
            p = a.nodeType && S(a),
            q = L.get(a, "fxshow");
        c.queue ||
            ((h = n._queueHooks(a, "fx")),
            null == h.unqueued &&
                ((h.unqueued = 0),
                (i = h.empty.fire),
                (h.empty.fire = function () {
                    h.unqueued || i();
                })),
            h.unqueued++,
            l.always(function () {
                l.always(function () {
                    h.unqueued--, n.queue(a, "fx").length || h.empty.fire();
                });
            })),
            1 === a.nodeType &&
                ("height" in b || "width" in b) &&
                ((c.overflow = [o.overflow, o.overflowX, o.overflowY]),
                (j = n.css(a, "display")),
                (k =
                    "none" === j
                        ? L.get(a, "olddisplay") || tb(a.nodeName)
                        : j),
                "inline" === k &&
                    "none" === n.css(a, "float") &&
                    (o.display = "inline-block")),
            c.overflow &&
                ((o.overflow = "hidden"),
                l.always(function () {
                    (o.overflow = c.overflow[0]),
                        (o.overflowX = c.overflow[1]),
                        (o.overflowY = c.overflow[2]);
                }));
        for (d in b)
            if (((e = b[d]), Nb.exec(e))) {
                if (
                    (delete b[d],
                    (f = f || "toggle" === e),
                    e === (p ? "hide" : "show"))
                ) {
                    if ("show" !== e || !q || void 0 === q[d]) continue;
                    p = !0;
                }
                m[d] = (q && q[d]) || n.style(a, d);
            } else j = void 0;
        if (n.isEmptyObject(m))
            "inline" === ("none" === j ? tb(a.nodeName) : j) && (o.display = j);
        else {
            q
                ? "hidden" in q && (p = q.hidden)
                : (q = L.access(a, "fxshow", {})),
                f && (q.hidden = !p),
                p
                    ? n(a).show()
                    : l.done(function () {
                          n(a).hide();
                      }),
                l.done(function () {
                    var b;
                    L.remove(a, "fxshow");
                    for (b in m) n.style(a, b, m[b]);
                });
            for (d in m)
                (g = Ub(p ? q[d] : 0, d, l)),
                    d in q ||
                        ((q[d] = g.start),
                        p &&
                            ((g.end = g.start),
                            (g.start =
                                "width" === d || "height" === d ? 1 : 0)));
        }
    }

    function Wb(a, b) {
        var c, d, e, f, g;
        for (c in a)
            if (
                ((d = n.camelCase(c)),
                (e = b[d]),
                (f = a[c]),
                n.isArray(f) && ((e = f[1]), (f = a[c] = f[0])),
                c !== d && ((a[d] = f), delete a[c]),
                (g = n.cssHooks[d]),
                g && "expand" in g)
            ) {
                (f = g.expand(f)), delete a[d];
                for (c in f) c in a || ((a[c] = f[c]), (b[c] = e));
            } else b[d] = e;
    }

    function Xb(a, b, c) {
        var d,
            e,
            f = 0,
            g = Qb.length,
            h = n.Deferred().always(function () {
                delete i.elem;
            }),
            i = function () {
                if (e) return !1;
                for (
                    var b = Lb || Sb(),
                        c = Math.max(0, j.startTime + j.duration - b),
                        d = c / j.duration || 0,
                        f = 1 - d,
                        g = 0,
                        i = j.tweens.length;
                    i > g;
                    g++
                )
                    j.tweens[g].run(f);
                return (
                    h.notifyWith(a, [j, f, c]),
                    1 > f && i ? c : (h.resolveWith(a, [j]), !1)
                );
            },
            j = h.promise({
                elem: a,
                props: n.extend({}, b),
                opts: n.extend(
                    !0,
                    {
                        specialEasing: {},
                    },
                    c,
                ),
                originalProperties: b,
                originalOptions: c,
                startTime: Lb || Sb(),
                duration: c.duration,
                tweens: [],
                createTween: function (b, c) {
                    var d = n.Tween(
                        a,
                        j.opts,
                        b,
                        c,
                        j.opts.specialEasing[b] || j.opts.easing,
                    );
                    return j.tweens.push(d), d;
                },
                stop: function (b) {
                    var c = 0,
                        d = b ? j.tweens.length : 0;
                    if (e) return this;
                    for (e = !0; d > c; c++) j.tweens[c].run(1);
                    return (
                        b ? h.resolveWith(a, [j, b]) : h.rejectWith(a, [j, b]),
                        this
                    );
                },
            }),
            k = j.props;
        for (Wb(k, j.opts.specialEasing); g > f; f++)
            if ((d = Qb[f].call(j, a, k, j.opts))) return d;
        return (
            n.map(k, Ub, j),
            n.isFunction(j.opts.start) && j.opts.start.call(a, j),
            n.fx.timer(
                n.extend(i, {
                    elem: a,
                    anim: j,
                    queue: j.opts.queue,
                }),
            ),
            j
                .progress(j.opts.progress)
                .done(j.opts.done, j.opts.complete)
                .fail(j.opts.fail)
                .always(j.opts.always)
        );
    }
    (n.Animation = n.extend(Xb, {
        tweener: function (a, b) {
            n.isFunction(a) ? ((b = a), (a = ["*"])) : (a = a.split(" "));
            for (var c, d = 0, e = a.length; e > d; d++)
                (c = a[d]), (Rb[c] = Rb[c] || []), Rb[c].unshift(b);
        },
        prefilter: function (a, b) {
            b ? Qb.unshift(a) : Qb.push(a);
        },
    })),
        (n.speed = function (a, b, c) {
            var d =
                a && "object" == typeof a
                    ? n.extend({}, a)
                    : {
                          complete: c || (!c && b) || (n.isFunction(a) && a),
                          duration: a,
                          easing: (c && b) || (b && !n.isFunction(b) && b),
                      };
            return (
                (d.duration = n.fx.off
                    ? 0
                    : "number" == typeof d.duration
                      ? d.duration
                      : d.duration in n.fx.speeds
                        ? n.fx.speeds[d.duration]
                        : n.fx.speeds._default),
                (null == d.queue || d.queue === !0) && (d.queue = "fx"),
                (d.old = d.complete),
                (d.complete = function () {
                    n.isFunction(d.old) && d.old.call(this),
                        d.queue && n.dequeue(this, d.queue);
                }),
                d
            );
        }),
        n.fn.extend({
            fadeTo: function (a, b, c, d) {
                return this.filter(S).css("opacity", 0).show().end().animate(
                    {
                        opacity: b,
                    },
                    a,
                    c,
                    d,
                );
            },
            animate: function (a, b, c, d) {
                var e = n.isEmptyObject(a),
                    f = n.speed(b, c, d),
                    g = function () {
                        var b = Xb(this, n.extend({}, a), f);
                        (e || L.get(this, "finish")) && b.stop(!0);
                    };
                return (
                    (g.finish = g),
                    e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g)
                );
            },
            stop: function (a, b, c) {
                var d = function (a) {
                    var b = a.stop;
                    delete a.stop, b(c);
                };
                return (
                    "string" != typeof a && ((c = b), (b = a), (a = void 0)),
                    b && a !== !1 && this.queue(a || "fx", []),
                    this.each(function () {
                        var b = !0,
                            e = null != a && a + "queueHooks",
                            f = n.timers,
                            g = L.get(this);
                        if (e) g[e] && g[e].stop && d(g[e]);
                        else
                            for (e in g)
                                g[e] && g[e].stop && Pb.test(e) && d(g[e]);
                        for (e = f.length; e--; )
                            f[e].elem !== this ||
                                (null != a && f[e].queue !== a) ||
                                (f[e].anim.stop(c), (b = !1), f.splice(e, 1));
                        (b || !c) && n.dequeue(this, a);
                    })
                );
            },
            finish: function (a) {
                return (
                    a !== !1 && (a = a || "fx"),
                    this.each(function () {
                        var b,
                            c = L.get(this),
                            d = c[a + "queue"],
                            e = c[a + "queueHooks"],
                            f = n.timers,
                            g = d ? d.length : 0;
                        for (
                            c.finish = !0,
                                n.queue(this, a, []),
                                e && e.stop && e.stop.call(this, !0),
                                b = f.length;
                            b--;

                        )
                            f[b].elem === this &&
                                f[b].queue === a &&
                                (f[b].anim.stop(!0), f.splice(b, 1));
                        for (b = 0; g > b; b++)
                            d[b] && d[b].finish && d[b].finish.call(this);
                        delete c.finish;
                    })
                );
            },
        }),
        n.each(["toggle", "show", "hide"], function (a, b) {
            var c = n.fn[b];
            n.fn[b] = function (a, d, e) {
                return null == a || "boolean" == typeof a
                    ? c.apply(this, arguments)
                    : this.animate(Tb(b, !0), a, d, e);
            };
        }),
        n.each(
            {
                slideDown: Tb("show"),
                slideUp: Tb("hide"),
                slideToggle: Tb("toggle"),
                fadeIn: {
                    opacity: "show",
                },
                fadeOut: {
                    opacity: "hide",
                },
                fadeToggle: {
                    opacity: "toggle",
                },
            },
            function (a, b) {
                n.fn[a] = function (a, c, d) {
                    return this.animate(b, a, c, d);
                };
            },
        ),
        (n.timers = []),
        (n.fx.tick = function () {
            var a,
                b = 0,
                c = n.timers;
            for (Lb = n.now(); b < c.length; b++)
                (a = c[b]), a() || c[b] !== a || c.splice(b--, 1);
            c.length || n.fx.stop(), (Lb = void 0);
        }),
        (n.fx.timer = function (a) {
            n.timers.push(a), a() ? n.fx.start() : n.timers.pop();
        }),
        (n.fx.interval = 13),
        (n.fx.start = function () {
            Mb || (Mb = setInterval(n.fx.tick, n.fx.interval));
        }),
        (n.fx.stop = function () {
            clearInterval(Mb), (Mb = null);
        }),
        (n.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400,
        }),
        (n.fn.delay = function (a, b) {
            return (
                (a = n.fx ? n.fx.speeds[a] || a : a),
                (b = b || "fx"),
                this.queue(b, function (b, c) {
                    var d = setTimeout(b, a);
                    c.stop = function () {
                        clearTimeout(d);
                    };
                })
            );
        }),
        (function () {
            var a = l.createElement("input"),
                b = l.createElement("select"),
                c = b.appendChild(l.createElement("option"));
            (a.type = "checkbox"),
                (k.checkOn = "" !== a.value),
                (k.optSelected = c.selected),
                (b.disabled = !0),
                (k.optDisabled = !c.disabled),
                (a = l.createElement("input")),
                (a.value = "t"),
                (a.type = "radio"),
                (k.radioValue = "t" === a.value);
        })();
    var Yb,
        Zb,
        $b = n.expr.attrHandle;
    n.fn.extend({
        attr: function (a, b) {
            return J(this, n.attr, a, b, arguments.length > 1);
        },
        removeAttr: function (a) {
            return this.each(function () {
                n.removeAttr(this, a);
            });
        },
    }),
        n.extend({
            attr: function (a, b, c) {
                var d,
                    e,
                    f = a.nodeType;
                if (a && 3 !== f && 8 !== f && 2 !== f)
                    return typeof a.getAttribute === U
                        ? n.prop(a, b, c)
                        : ((1 === f && n.isXMLDoc(a)) ||
                              ((b = b.toLowerCase()),
                              (d =
                                  n.attrHooks[b] ||
                                  (n.expr.match.bool.test(b) ? Zb : Yb))),
                          void 0 === c
                              ? d && "get" in d && null !== (e = d.get(a, b))
                                  ? e
                                  : ((e = n.find.attr(a, b)),
                                    null == e ? void 0 : e)
                              : null !== c
                                ? d &&
                                  "set" in d &&
                                  void 0 !== (e = d.set(a, c, b))
                                    ? e
                                    : (a.setAttribute(b, c + ""), c)
                                : void n.removeAttr(a, b));
            },
            removeAttr: function (a, b) {
                var c,
                    d,
                    e = 0,
                    f = b && b.match(E);
                if (f && 1 === a.nodeType)
                    while ((c = f[e++]))
                        (d = n.propFix[c] || c),
                            n.expr.match.bool.test(c) && (a[d] = !1),
                            a.removeAttribute(c);
            },
            attrHooks: {
                type: {
                    set: function (a, b) {
                        if (
                            !k.radioValue &&
                            "radio" === b &&
                            n.nodeName(a, "input")
                        ) {
                            var c = a.value;
                            return (
                                a.setAttribute("type", b), c && (a.value = c), b
                            );
                        }
                    },
                },
            },
        }),
        (Zb = {
            set: function (a, b, c) {
                return b === !1 ? n.removeAttr(a, c) : a.setAttribute(c, c), c;
            },
        }),
        n.each(n.expr.match.bool.source.match(/\w+/g), function (a, b) {
            var c = $b[b] || n.find.attr;
            $b[b] = function (a, b, d) {
                var e, f;
                return (
                    d ||
                        ((f = $b[b]),
                        ($b[b] = e),
                        (e = null != c(a, b, d) ? b.toLowerCase() : null),
                        ($b[b] = f)),
                    e
                );
            };
        });
    var _b = /^(?:input|select|textarea|button)$/i;
    n.fn.extend({
        prop: function (a, b) {
            return J(this, n.prop, a, b, arguments.length > 1);
        },
        removeProp: function (a) {
            return this.each(function () {
                delete this[n.propFix[a] || a];
            });
        },
    }),
        n.extend({
            propFix: {
                for: "htmlFor",
                class: "className",
            },
            prop: function (a, b, c) {
                var d,
                    e,
                    f,
                    g = a.nodeType;
                if (a && 3 !== g && 8 !== g && 2 !== g)
                    return (
                        (f = 1 !== g || !n.isXMLDoc(a)),
                        f && ((b = n.propFix[b] || b), (e = n.propHooks[b])),
                        void 0 !== c
                            ? e && "set" in e && void 0 !== (d = e.set(a, c, b))
                                ? d
                                : (a[b] = c)
                            : e && "get" in e && null !== (d = e.get(a, b))
                              ? d
                              : a[b]
                    );
            },
            propHooks: {
                tabIndex: {
                    get: function (a) {
                        return a.hasAttribute("tabindex") ||
                            _b.test(a.nodeName) ||
                            a.href
                            ? a.tabIndex
                            : -1;
                    },
                },
            },
        }),
        k.optSelected ||
            (n.propHooks.selected = {
                get: function (a) {
                    var b = a.parentNode;
                    return (
                        b && b.parentNode && b.parentNode.selectedIndex, null
                    );
                },
            }),
        n.each(
            [
                "tabIndex",
                "readOnly",
                "maxLength",
                "cellSpacing",
                "cellPadding",
                "rowSpan",
                "colSpan",
                "useMap",
                "frameBorder",
                "contentEditable",
            ],
            function () {
                n.propFix[this.toLowerCase()] = this;
            },
        );
    var ac = /[\t\r\n\f]/g;
    n.fn.extend({
        addClass: function (a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h = "string" == typeof a && a,
                i = 0,
                j = this.length;
            if (n.isFunction(a))
                return this.each(function (b) {
                    n(this).addClass(a.call(this, b, this.className));
                });
            if (h)
                for (b = (a || "").match(E) || []; j > i; i++)
                    if (
                        ((c = this[i]),
                        (d =
                            1 === c.nodeType &&
                            (c.className
                                ? (" " + c.className + " ").replace(ac, " ")
                                : " ")))
                    ) {
                        f = 0;
                        while ((e = b[f++]))
                            d.indexOf(" " + e + " ") < 0 && (d += e + " ");
                        (g = n.trim(d)), c.className !== g && (c.className = g);
                    }
            return this;
        },
        removeClass: function (a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h = 0 === arguments.length || ("string" == typeof a && a),
                i = 0,
                j = this.length;
            if (n.isFunction(a))
                return this.each(function (b) {
                    n(this).removeClass(a.call(this, b, this.className));
                });
            if (h)
                for (b = (a || "").match(E) || []; j > i; i++)
                    if (
                        ((c = this[i]),
                        (d =
                            1 === c.nodeType &&
                            (c.className
                                ? (" " + c.className + " ").replace(ac, " ")
                                : "")))
                    ) {
                        f = 0;
                        while ((e = b[f++]))
                            while (d.indexOf(" " + e + " ") >= 0)
                                d = d.replace(" " + e + " ", " ");
                        (g = a ? n.trim(d) : ""),
                            c.className !== g && (c.className = g);
                    }
            return this;
        },
        toggleClass: function (a, b) {
            var c = typeof a;
            return "boolean" == typeof b && "string" === c
                ? b
                    ? this.addClass(a)
                    : this.removeClass(a)
                : this.each(
                      n.isFunction(a)
                          ? function (c) {
                                n(this).toggleClass(
                                    a.call(this, c, this.className, b),
                                    b,
                                );
                            }
                          : function () {
                                if ("string" === c) {
                                    var b,
                                        d = 0,
                                        e = n(this),
                                        f = a.match(E) || [];
                                    while ((b = f[d++]))
                                        e.hasClass(b)
                                            ? e.removeClass(b)
                                            : e.addClass(b);
                                } else
                                    (c === U || "boolean" === c) &&
                                        (this.className &&
                                            L.set(
                                                this,
                                                "__className__",
                                                this.className,
                                            ),
                                        (this.className =
                                            this.className || a === !1
                                                ? ""
                                                : L.get(
                                                      this,
                                                      "__className__",
                                                  ) || ""));
                            },
                  );
        },
        hasClass: function (a) {
            for (var b = " " + a + " ", c = 0, d = this.length; d > c; c++)
                if (
                    1 === this[c].nodeType &&
                    (" " + this[c].className + " ")
                        .replace(ac, " ")
                        .indexOf(b) >= 0
                )
                    return !0;
            return !1;
        },
    });
    var bc = /\r/g;
    n.fn.extend({
        val: function (a) {
            var b,
                c,
                d,
                e = this[0];
            {
                if (arguments.length)
                    return (
                        (d = n.isFunction(a)),
                        this.each(function (c) {
                            var e;
                            1 === this.nodeType &&
                                ((e = d ? a.call(this, c, n(this).val()) : a),
                                null == e
                                    ? (e = "")
                                    : "number" == typeof e
                                      ? (e += "")
                                      : n.isArray(e) &&
                                        (e = n.map(e, function (a) {
                                            return null == a ? "" : a + "";
                                        })),
                                (b =
                                    n.valHooks[this.type] ||
                                    n.valHooks[this.nodeName.toLowerCase()]),
                                (b &&
                                    "set" in b &&
                                    void 0 !== b.set(this, e, "value")) ||
                                    (this.value = e));
                        })
                    );
                if (e)
                    return (
                        (b =
                            n.valHooks[e.type] ||
                            n.valHooks[e.nodeName.toLowerCase()]),
                        b && "get" in b && void 0 !== (c = b.get(e, "value"))
                            ? c
                            : ((c = e.value),
                              "string" == typeof c
                                  ? c.replace(bc, "")
                                  : null == c
                                    ? ""
                                    : c)
                    );
            }
        },
    }),
        n.extend({
            valHooks: {
                option: {
                    get: function (a) {
                        var b = n.find.attr(a, "value");
                        return null != b ? b : n.trim(n.text(a));
                    },
                },
                select: {
                    get: function (a) {
                        for (
                            var b,
                                c,
                                d = a.options,
                                e = a.selectedIndex,
                                f = "select-one" === a.type || 0 > e,
                                g = f ? null : [],
                                h = f ? e + 1 : d.length,
                                i = 0 > e ? h : f ? e : 0;
                            h > i;
                            i++
                        )
                            if (
                                ((c = d[i]),
                                !(
                                    (!c.selected && i !== e) ||
                                    (k.optDisabled
                                        ? c.disabled
                                        : null !==
                                          c.getAttribute("disabled")) ||
                                    (c.parentNode.disabled &&
                                        n.nodeName(c.parentNode, "optgroup"))
                                ))
                            ) {
                                if (((b = n(c).val()), f)) return b;
                                g.push(b);
                            }
                        return g;
                    },
                    set: function (a, b) {
                        var c,
                            d,
                            e = a.options,
                            f = n.makeArray(b),
                            g = e.length;
                        while (g--)
                            (d = e[g]),
                                (d.selected = n.inArray(d.value, f) >= 0) &&
                                    (c = !0);
                        return c || (a.selectedIndex = -1), f;
                    },
                },
            },
        }),
        n.each(["radio", "checkbox"], function () {
            (n.valHooks[this] = {
                set: function (a, b) {
                    return n.isArray(b)
                        ? (a.checked = n.inArray(n(a).val(), b) >= 0)
                        : void 0;
                },
            }),
                k.checkOn ||
                    (n.valHooks[this].get = function (a) {
                        return null === a.getAttribute("value")
                            ? "on"
                            : a.value;
                    });
        }),
        n.each(
            "blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(
                " ",
            ),
            function (a, b) {
                n.fn[b] = function (a, c) {
                    return arguments.length > 0
                        ? this.on(b, null, a, c)
                        : this.trigger(b);
                };
            },
        ),
        n.fn.extend({
            hover: function (a, b) {
                return this.mouseenter(a).mouseleave(b || a);
            },
            bind: function (a, b, c) {
                return this.on(a, null, b, c);
            },
            unbind: function (a, b) {
                return this.off(a, null, b);
            },
            delegate: function (a, b, c, d) {
                return this.on(b, a, c, d);
            },
            undelegate: function (a, b, c) {
                return 1 === arguments.length
                    ? this.off(a, "**")
                    : this.off(b, a || "**", c);
            },
        });
    var cc = n.now(),
        dc = /\?/;
    (n.parseJSON = function (a) {
        return JSON.parse(a + "");
    }),
        (n.parseXML = function (a) {
            var b, c;
            if (!a || "string" != typeof a) return null;
            try {
                (c = new DOMParser()), (b = c.parseFromString(a, "text/xml"));
            } catch (d) {
                b = void 0;
            }
            return (
                (!b || b.getElementsByTagName("parsererror").length) &&
                    n.error("Invalid XML: " + a),
                b
            );
        });
    var ec,
        fc,
        gc = /#.*$/,
        hc = /([?&])_=[^&]*/,
        ic = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        jc = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        kc = /^(?:GET|HEAD)$/,
        lc = /^\/\//,
        mc = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
        nc = {},
        oc = {},
        pc = "*/".concat("*");
    try {
        fc = location.href;
    } catch (qc) {
        (fc = l.createElement("a")), (fc.href = ""), (fc = fc.href);
    }
    ec = mc.exec(fc.toLowerCase()) || [];

    function rc(a) {
        return function (b, c) {
            "string" != typeof b && ((c = b), (b = "*"));
            var d,
                e = 0,
                f = b.toLowerCase().match(E) || [];
            if (n.isFunction(c))
                while ((d = f[e++]))
                    "+" === d[0]
                        ? ((d = d.slice(1) || "*"),
                          (a[d] = a[d] || []).unshift(c))
                        : (a[d] = a[d] || []).push(c);
        };
    }

    function sc(a, b, c, d) {
        var e = {},
            f = a === oc;

        function g(h) {
            var i;
            return (
                (e[h] = !0),
                n.each(a[h] || [], function (a, h) {
                    var j = h(b, c, d);
                    return "string" != typeof j || f || e[j]
                        ? f
                            ? !(i = j)
                            : void 0
                        : (b.dataTypes.unshift(j), g(j), !1);
                }),
                i
            );
        }
        return g(b.dataTypes[0]) || (!e["*"] && g("*"));
    }

    function tc(a, b) {
        var c,
            d,
            e = n.ajaxSettings.flatOptions || {};
        for (c in b) void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]);
        return d && n.extend(!0, a, d), a;
    }

    function uc(a, b, c) {
        var d,
            e,
            f,
            g,
            h = a.contents,
            i = a.dataTypes;
        while ("*" === i[0])
            i.shift(),
                void 0 === d &&
                    (d = a.mimeType || b.getResponseHeader("Content-Type"));
        if (d)
            for (e in h)
                if (h[e] && h[e].test(d)) {
                    i.unshift(e);
                    break;
                }
        if (i[0] in c) f = i[0];
        else {
            for (e in c) {
                if (!i[0] || a.converters[e + " " + i[0]]) {
                    f = e;
                    break;
                }
                g || (g = e);
            }
            f = f || g;
        }
        return f ? (f !== i[0] && i.unshift(f), c[f]) : void 0;
    }

    function vc(a, b, c, d) {
        var e,
            f,
            g,
            h,
            i,
            j = {},
            k = a.dataTypes.slice();
        if (k[1]) for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
        f = k.shift();
        while (f)
            if (
                (a.responseFields[f] && (c[a.responseFields[f]] = b),
                !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)),
                (i = f),
                (f = k.shift()))
            )
                if ("*" === f) f = i;
                else if ("*" !== i && i !== f) {
                    if (((g = j[i + " " + f] || j["* " + f]), !g))
                        for (e in j)
                            if (
                                ((h = e.split(" ")),
                                h[1] === f &&
                                    (g = j[i + " " + h[0]] || j["* " + h[0]]))
                            ) {
                                g === !0
                                    ? (g = j[e])
                                    : j[e] !== !0 &&
                                      ((f = h[0]), k.unshift(h[1]));
                                break;
                            }
                    if (g !== !0)
                        if (g && a["throws"]) b = g(b);
                        else
                            try {
                                b = g(b);
                            } catch (l) {
                                return {
                                    state: "parsererror",
                                    error: g
                                        ? l
                                        : "No conversion from " +
                                          i +
                                          " to " +
                                          f,
                                };
                            }
                }
        return {
            state: "success",
            data: b,
        };
    }
    n.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: fc,
            type: "GET",
            isLocal: jc.test(ec[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": pc,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript",
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/,
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON",
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": n.parseJSON,
                "text xml": n.parseXML,
            },
            flatOptions: {
                url: !0,
                context: !0,
            },
        },
        ajaxSetup: function (a, b) {
            return b ? tc(tc(a, n.ajaxSettings), b) : tc(n.ajaxSettings, a);
        },
        ajaxPrefilter: rc(nc),
        ajaxTransport: rc(oc),
        ajax: function (a, b) {
            "object" == typeof a && ((b = a), (a = void 0)), (b = b || {});
            var c,
                d,
                e,
                f,
                g,
                h,
                i,
                j,
                k = n.ajaxSetup({}, b),
                l = k.context || k,
                m = k.context && (l.nodeType || l.jquery) ? n(l) : n.event,
                o = n.Deferred(),
                p = n.Callbacks("once memory"),
                q = k.statusCode || {},
                r = {},
                s = {},
                t = 0,
                u = "canceled",
                v = {
                    readyState: 0,
                    getResponseHeader: function (a) {
                        var b;
                        if (2 === t) {
                            if (!f) {
                                f = {};
                                while ((b = ic.exec(e)))
                                    f[b[1].toLowerCase()] = b[2];
                            }
                            b = f[a.toLowerCase()];
                        }
                        return null == b ? null : b;
                    },
                    getAllResponseHeaders: function () {
                        return 2 === t ? e : null;
                    },
                    setRequestHeader: function (a, b) {
                        var c = a.toLowerCase();
                        return t || ((a = s[c] = s[c] || a), (r[a] = b)), this;
                    },
                    overrideMimeType: function (a) {
                        return t || (k.mimeType = a), this;
                    },
                    statusCode: function (a) {
                        var b;
                        if (a)
                            if (2 > t) for (b in a) q[b] = [q[b], a[b]];
                            else v.always(a[v.status]);
                        return this;
                    },
                    abort: function (a) {
                        var b = a || u;
                        return c && c.abort(b), x(0, b), this;
                    },
                };
            if (
                ((o.promise(v).complete = p.add),
                (v.success = v.done),
                (v.error = v.fail),
                (k.url = ((a || k.url || fc) + "")
                    .replace(gc, "")
                    .replace(lc, ec[1] + "//")),
                (k.type = b.method || b.type || k.method || k.type),
                (k.dataTypes = n
                    .trim(k.dataType || "*")
                    .toLowerCase()
                    .match(E) || [""]),
                null == k.crossDomain &&
                    ((h = mc.exec(k.url.toLowerCase())),
                    (k.crossDomain = !(
                        !h ||
                        (h[1] === ec[1] &&
                            h[2] === ec[2] &&
                            (h[3] || ("http:" === h[1] ? "80" : "443")) ===
                                (ec[3] || ("http:" === ec[1] ? "80" : "443")))
                    ))),
                k.data &&
                    k.processData &&
                    "string" != typeof k.data &&
                    (k.data = n.param(k.data, k.traditional)),
                sc(nc, k, b, v),
                2 === t)
            )
                return v;
            (i = k.global),
                i && 0 === n.active++ && n.event.trigger("ajaxStart"),
                (k.type = k.type.toUpperCase()),
                (k.hasContent = !kc.test(k.type)),
                (d = k.url),
                k.hasContent ||
                    (k.data &&
                        ((d = k.url += (dc.test(d) ? "&" : "?") + k.data),
                        delete k.data),
                    k.cache === !1 &&
                        (k.url = hc.test(d)
                            ? d.replace(hc, "$1_=" + cc++)
                            : d + (dc.test(d) ? "&" : "?") + "_=" + cc++)),
                k.ifModified &&
                    (n.lastModified[d] &&
                        v.setRequestHeader(
                            "If-Modified-Since",
                            n.lastModified[d],
                        ),
                    n.etag[d] &&
                        v.setRequestHeader("If-None-Match", n.etag[d])),
                ((k.data && k.hasContent && k.contentType !== !1) ||
                    b.contentType) &&
                    v.setRequestHeader("Content-Type", k.contentType),
                v.setRequestHeader(
                    "Accept",
                    k.dataTypes[0] && k.accepts[k.dataTypes[0]]
                        ? k.accepts[k.dataTypes[0]] +
                              ("*" !== k.dataTypes[0]
                                  ? ", " + pc + "; q=0.01"
                                  : "")
                        : k.accepts["*"],
                );
            for (j in k.headers) v.setRequestHeader(j, k.headers[j]);
            if (k.beforeSend && (k.beforeSend.call(l, v, k) === !1 || 2 === t))
                return v.abort();
            u = "abort";
            for (j in {
                success: 1,
                error: 1,
                complete: 1,
            })
                v[j](k[j]);
            if ((c = sc(oc, k, b, v))) {
                (v.readyState = 1),
                    i && m.trigger("ajaxSend", [v, k]),
                    k.async &&
                        k.timeout > 0 &&
                        (g = setTimeout(function () {
                            v.abort("timeout");
                        }, k.timeout));
                try {
                    (t = 1), c.send(r, x);
                } catch (w) {
                    if (!(2 > t)) throw w;
                    x(-1, w);
                }
            } else x(-1, "No Transport");

            function x(a, b, f, h) {
                var j,
                    r,
                    s,
                    u,
                    w,
                    x = b;
                2 !== t &&
                    ((t = 2),
                    g && clearTimeout(g),
                    (c = void 0),
                    (e = h || ""),
                    (v.readyState = a > 0 ? 4 : 0),
                    (j = (a >= 200 && 300 > a) || 304 === a),
                    f && (u = uc(k, v, f)),
                    (u = vc(k, u, v, j)),
                    j
                        ? (k.ifModified &&
                              ((w = v.getResponseHeader("Last-Modified")),
                              w && (n.lastModified[d] = w),
                              (w = v.getResponseHeader("etag")),
                              w && (n.etag[d] = w)),
                          204 === a || "HEAD" === k.type
                              ? (x = "nocontent")
                              : 304 === a
                                ? (x = "notmodified")
                                : ((x = u.state),
                                  (r = u.data),
                                  (s = u.error),
                                  (j = !s)))
                        : ((s = x),
                          (a || !x) && ((x = "error"), 0 > a && (a = 0))),
                    (v.status = a),
                    (v.statusText = (b || x) + ""),
                    j
                        ? o.resolveWith(l, [r, x, v])
                        : o.rejectWith(l, [v, x, s]),
                    v.statusCode(q),
                    (q = void 0),
                    i &&
                        m.trigger(j ? "ajaxSuccess" : "ajaxError", [
                            v,
                            k,
                            j ? r : s,
                        ]),
                    p.fireWith(l, [v, x]),
                    i &&
                        (m.trigger("ajaxComplete", [v, k]),
                        --n.active || n.event.trigger("ajaxStop")));
            }
            return v;
        },
        getJSON: function (a, b, c) {
            return n.get(a, b, c, "json");
        },
        getScript: function (a, b) {
            return n.get(a, void 0, b, "script");
        },
    }),
        n.each(["get", "post"], function (a, b) {
            n[b] = function (a, c, d, e) {
                return (
                    n.isFunction(c) && ((e = e || d), (d = c), (c = void 0)),
                    n.ajax({
                        url: a,
                        type: b,
                        dataType: e,
                        data: c,
                        success: d,
                    })
                );
            };
        }),
        n.each(
            [
                "ajaxStart",
                "ajaxStop",
                "ajaxComplete",
                "ajaxError",
                "ajaxSuccess",
                "ajaxSend",
            ],
            function (a, b) {
                n.fn[b] = function (a) {
                    return this.on(b, a);
                };
            },
        ),
        (n._evalUrl = function (a) {
            return n.ajax({
                url: a,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                throws: !0,
            });
        }),
        n.fn.extend({
            wrapAll: function (a) {
                var b;
                return n.isFunction(a)
                    ? this.each(function (b) {
                          n(this).wrapAll(a.call(this, b));
                      })
                    : (this[0] &&
                          ((b = n(a, this[0].ownerDocument).eq(0).clone(!0)),
                          this[0].parentNode && b.insertBefore(this[0]),
                          b
                              .map(function () {
                                  var a = this;
                                  while (a.firstElementChild)
                                      a = a.firstElementChild;
                                  return a;
                              })
                              .append(this)),
                      this);
            },
            wrapInner: function (a) {
                return this.each(
                    n.isFunction(a)
                        ? function (b) {
                              n(this).wrapInner(a.call(this, b));
                          }
                        : function () {
                              var b = n(this),
                                  c = b.contents();
                              c.length ? c.wrapAll(a) : b.append(a);
                          },
                );
            },
            wrap: function (a) {
                var b = n.isFunction(a);
                return this.each(function (c) {
                    n(this).wrapAll(b ? a.call(this, c) : a);
                });
            },
            unwrap: function () {
                return this.parent()
                    .each(function () {
                        n.nodeName(this, "body") ||
                            n(this).replaceWith(this.childNodes);
                    })
                    .end();
            },
        }),
        (n.expr.filters.hidden = function (a) {
            return a.offsetWidth <= 0 && a.offsetHeight <= 0;
        }),
        (n.expr.filters.visible = function (a) {
            return !n.expr.filters.hidden(a);
        });
    var wc = /%20/g,
        xc = /\[\]$/,
        yc = /\r?\n/g,
        zc = /^(?:submit|button|image|reset|file)$/i,
        Ac = /^(?:input|select|textarea|keygen)/i;

    function Bc(a, b, c, d) {
        var e;
        if (n.isArray(b))
            n.each(b, function (b, e) {
                c || xc.test(a)
                    ? d(a, e)
                    : Bc(
                          a + "[" + ("object" == typeof e ? b : "") + "]",
                          e,
                          c,
                          d,
                      );
            });
        else if (c || "object" !== n.type(b)) d(a, b);
        else for (e in b) Bc(a + "[" + e + "]", b[e], c, d);
    }
    (n.param = function (a, b) {
        var c,
            d = [],
            e = function (a, b) {
                (b = n.isFunction(b) ? b() : null == b ? "" : b),
                    (d[d.length] =
                        encodeURIComponent(a) + "=" + encodeURIComponent(b));
            };
        if (
            (void 0 === b && (b = n.ajaxSettings && n.ajaxSettings.traditional),
            n.isArray(a) || (a.jquery && !n.isPlainObject(a)))
        )
            n.each(a, function () {
                e(this.name, this.value);
            });
        else for (c in a) Bc(c, a[c], b, e);
        return d.join("&").replace(wc, "+");
    }),
        n.fn.extend({
            serialize: function () {
                return n.param(this.serializeArray());
            },
            serializeArray: function () {
                return this.map(function () {
                    var a = n.prop(this, "elements");
                    return a ? n.makeArray(a) : this;
                })
                    .filter(function () {
                        var a = this.type;
                        return (
                            this.name &&
                            !n(this).is(":disabled") &&
                            Ac.test(this.nodeName) &&
                            !zc.test(a) &&
                            (this.checked || !T.test(a))
                        );
                    })
                    .map(function (a, b) {
                        var c = n(this).val();
                        return null == c
                            ? null
                            : n.isArray(c)
                              ? n.map(c, function (a) {
                                    return {
                                        name: b.name,
                                        value: a.replace(yc, "\r\n"),
                                    };
                                })
                              : {
                                    name: b.name,
                                    value: c.replace(yc, "\r\n"),
                                };
                    })
                    .get();
            },
        }),
        (n.ajaxSettings.xhr = function () {
            try {
                return new XMLHttpRequest();
            } catch (a) {}
        });
    var Cc = 0,
        Dc = {},
        Ec = {
            0: 200,
            1223: 204,
        },
        Fc = n.ajaxSettings.xhr();
    a.ActiveXObject &&
        n(a).on("unload", function () {
            for (var a in Dc) Dc[a]();
        }),
        (k.cors = !!Fc && "withCredentials" in Fc),
        (k.ajax = Fc = !!Fc),
        n.ajaxTransport(function (a) {
            var b;
            return k.cors || (Fc && !a.crossDomain)
                ? {
                      send: function (c, d) {
                          var e,
                              f = a.xhr(),
                              g = ++Cc;
                          if (
                              (f.open(
                                  a.type,
                                  a.url,
                                  a.async,
                                  a.username,
                                  a.password,
                              ),
                              a.xhrFields)
                          )
                              for (e in a.xhrFields) f[e] = a.xhrFields[e];
                          a.mimeType &&
                              f.overrideMimeType &&
                              f.overrideMimeType(a.mimeType),
                              a.crossDomain ||
                                  c["X-Requested-With"] ||
                                  (c["X-Requested-With"] = "XMLHttpRequest");
                          for (e in c) f.setRequestHeader(e, c[e]);
                          (b = function (a) {
                              return function () {
                                  b &&
                                      (delete Dc[g],
                                      (b = f.onload = f.onerror = null),
                                      "abort" === a
                                          ? f.abort()
                                          : "error" === a
                                            ? d(f.status, f.statusText)
                                            : d(
                                                  Ec[f.status] || f.status,
                                                  f.statusText,
                                                  "string" ==
                                                      typeof f.responseText
                                                      ? {
                                                            text: f.responseText,
                                                        }
                                                      : void 0,
                                                  f.getAllResponseHeaders(),
                                              ));
                              };
                          }),
                              (f.onload = b()),
                              (f.onerror = b("error")),
                              (b = Dc[g] = b("abort"));
                          try {
                              f.send((a.hasContent && a.data) || null);
                          } catch (h) {
                              if (b) throw h;
                          }
                      },
                      abort: function () {
                          b && b();
                      },
                  }
                : void 0;
        }),
        n.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
            },
            contents: {
                script: /(?:java|ecma)script/,
            },
            converters: {
                "text script": function (a) {
                    return n.globalEval(a), a;
                },
            },
        }),
        n.ajaxPrefilter("script", function (a) {
            void 0 === a.cache && (a.cache = !1),
                a.crossDomain && (a.type = "GET");
        }),
        n.ajaxTransport("script", function (a) {
            if (a.crossDomain) {
                var b, c;
                return {
                    send: function (d, e) {
                        (b = n("<script>")
                            .prop({
                                async: !0,
                                charset: a.scriptCharset,
                                src: a.url,
                            })
                            .on(
                                "load error",
                                (c = function (a) {
                                    b.remove(),
                                        (c = null),
                                        a &&
                                            e(
                                                "error" === a.type ? 404 : 200,
                                                a.type,
                                            );
                                }),
                            )),
                            l.head.appendChild(b[0]);
                    },
                    abort: function () {
                        c && c();
                    },
                };
            }
        });
    var Gc = [],
        Hc = /(=)\?(?=&|$)|\?\?/;
    n.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            var a = Gc.pop() || n.expando + "_" + cc++;
            return (this[a] = !0), a;
        },
    }),
        n.ajaxPrefilter("json jsonp", function (b, c, d) {
            var e,
                f,
                g,
                h =
                    b.jsonp !== !1 &&
                    (Hc.test(b.url)
                        ? "url"
                        : "string" == typeof b.data &&
                          !(b.contentType || "").indexOf(
                              "application/x-www-form-urlencoded",
                          ) &&
                          Hc.test(b.data) &&
                          "data");
            return h || "jsonp" === b.dataTypes[0]
                ? ((e = b.jsonpCallback =
                      n.isFunction(b.jsonpCallback)
                          ? b.jsonpCallback()
                          : b.jsonpCallback),
                  h
                      ? (b[h] = b[h].replace(Hc, "$1" + e))
                      : b.jsonp !== !1 &&
                        (b.url +=
                            (dc.test(b.url) ? "&" : "?") + b.jsonp + "=" + e),
                  (b.converters["script json"] = function () {
                      return g || n.error(e + " was not called"), g[0];
                  }),
                  (b.dataTypes[0] = "json"),
                  (f = a[e]),
                  (a[e] = function () {
                      g = arguments;
                  }),
                  d.always(function () {
                      (a[e] = f),
                          b[e] &&
                              ((b.jsonpCallback = c.jsonpCallback), Gc.push(e)),
                          g && n.isFunction(f) && f(g[0]),
                          (g = f = void 0);
                  }),
                  "script")
                : void 0;
        }),
        (n.parseHTML = function (a, b, c) {
            if (!a || "string" != typeof a) return null;
            "boolean" == typeof b && ((c = b), (b = !1)), (b = b || l);
            var d = v.exec(a),
                e = !c && [];
            return d
                ? [b.createElement(d[1])]
                : ((d = n.buildFragment([a], b, e)),
                  e && e.length && n(e).remove(),
                  n.merge([], d.childNodes));
        });
    var Ic = n.fn.load;
    (n.fn.load = function (a, b, c) {
        if ("string" != typeof a && Ic) return Ic.apply(this, arguments);
        var d,
            e,
            f,
            g = this,
            h = a.indexOf(" ");
        return (
            h >= 0 && ((d = n.trim(a.slice(h))), (a = a.slice(0, h))),
            n.isFunction(b)
                ? ((c = b), (b = void 0))
                : b && "object" == typeof b && (e = "POST"),
            g.length > 0 &&
                n
                    .ajax({
                        url: a,
                        type: e,
                        dataType: "html",
                        data: b,
                    })
                    .done(function (a) {
                        (f = arguments),
                            g.html(
                                d
                                    ? n("<div>").append(n.parseHTML(a)).find(d)
                                    : a,
                            );
                    })
                    .complete(
                        c &&
                            function (a, b) {
                                g.each(c, f || [a.responseText, b, a]);
                            },
                    ),
            this
        );
    }),
        (n.expr.filters.animated = function (a) {
            return n.grep(n.timers, function (b) {
                return a === b.elem;
            }).length;
        });
    var Jc = a.document.documentElement;

    function Kc(a) {
        return n.isWindow(a) ? a : 9 === a.nodeType && a.defaultView;
    }
    (n.offset = {
        setOffset: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i,
                j,
                k = n.css(a, "position"),
                l = n(a),
                m = {};
            "static" === k && (a.style.position = "relative"),
                (h = l.offset()),
                (f = n.css(a, "top")),
                (i = n.css(a, "left")),
                (j =
                    ("absolute" === k || "fixed" === k) &&
                    (f + i).indexOf("auto") > -1),
                j
                    ? ((d = l.position()), (g = d.top), (e = d.left))
                    : ((g = parseFloat(f) || 0), (e = parseFloat(i) || 0)),
                n.isFunction(b) && (b = b.call(a, c, h)),
                null != b.top && (m.top = b.top - h.top + g),
                null != b.left && (m.left = b.left - h.left + e),
                "using" in b ? b.using.call(a, m) : l.css(m);
        },
    }),
        n.fn.extend({
            offset: function (a) {
                if (arguments.length)
                    return void 0 === a
                        ? this
                        : this.each(function (b) {
                              n.offset.setOffset(this, a, b);
                          });
                var b,
                    c,
                    d = this[0],
                    e = {
                        top: 0,
                        left: 0,
                    },
                    f = d && d.ownerDocument;
                if (f)
                    return (
                        (b = f.documentElement),
                        n.contains(b, d)
                            ? (typeof d.getBoundingClientRect !== U &&
                                  (e = d.getBoundingClientRect()),
                              (c = Kc(f)),
                              {
                                  top: e.top + c.pageYOffset - b.clientTop,
                                  left: e.left + c.pageXOffset - b.clientLeft,
                              })
                            : e
                    );
            },
            position: function () {
                if (this[0]) {
                    var a,
                        b,
                        c = this[0],
                        d = {
                            top: 0,
                            left: 0,
                        };
                    return (
                        "fixed" === n.css(c, "position")
                            ? (b = c.getBoundingClientRect())
                            : ((a = this.offsetParent()),
                              (b = this.offset()),
                              n.nodeName(a[0], "html") || (d = a.offset()),
                              (d.top += n.css(a[0], "borderTopWidth", !0)),
                              (d.left += n.css(a[0], "borderLeftWidth", !0))),
                        {
                            top: b.top - d.top - n.css(c, "marginTop", !0),
                            left: b.left - d.left - n.css(c, "marginLeft", !0),
                        }
                    );
                }
            },
            offsetParent: function () {
                return this.map(function () {
                    var a = this.offsetParent || Jc;
                    while (
                        a &&
                        !n.nodeName(a, "html") &&
                        "static" === n.css(a, "position")
                    )
                        a = a.offsetParent;
                    return a || Jc;
                });
            },
        }),
        n.each(
            {
                scrollLeft: "pageXOffset",
                scrollTop: "pageYOffset",
            },
            function (b, c) {
                var d = "pageYOffset" === c;
                n.fn[b] = function (e) {
                    return J(
                        this,
                        function (b, e, f) {
                            var g = Kc(b);
                            return void 0 === f
                                ? g
                                    ? g[c]
                                    : b[e]
                                : void (g
                                      ? g.scrollTo(
                                            d ? a.pageXOffset : f,
                                            d ? f : a.pageYOffset,
                                        )
                                      : (b[e] = f));
                        },
                        b,
                        e,
                        arguments.length,
                        null,
                    );
                };
            },
        ),
        n.each(["top", "left"], function (a, b) {
            n.cssHooks[b] = yb(k.pixelPosition, function (a, c) {
                return c
                    ? ((c = xb(a, b)),
                      vb.test(c) ? n(a).position()[b] + "px" : c)
                    : void 0;
            });
        }),
        n.each(
            {
                Height: "height",
                Width: "width",
            },
            function (a, b) {
                n.each(
                    {
                        padding: "inner" + a,
                        content: b,
                        "": "outer" + a,
                    },
                    function (c, d) {
                        n.fn[d] = function (d, e) {
                            var f =
                                    arguments.length &&
                                    (c || "boolean" != typeof d),
                                g =
                                    c ||
                                    (d === !0 || e === !0
                                        ? "margin"
                                        : "border");
                            return J(
                                this,
                                function (b, c, d) {
                                    var e;
                                    return n.isWindow(b)
                                        ? b.document.documentElement[
                                              "client" + a
                                          ]
                                        : 9 === b.nodeType
                                          ? ((e = b.documentElement),
                                            Math.max(
                                                b.body["scroll" + a],
                                                e["scroll" + a],
                                                b.body["offset" + a],
                                                e["offset" + a],
                                                e["client" + a],
                                            ))
                                          : void 0 === d
                                            ? n.css(b, c, g)
                                            : n.style(b, c, d, g);
                                },
                                b,
                                f ? d : void 0,
                                f,
                                null,
                            );
                        };
                    },
                );
            },
        ),
        (n.fn.size = function () {
            return this.length;
        }),
        (n.fn.andSelf = n.fn.addBack),
        "function" == typeof define &&
            define.amd &&
            define("jquery", [], function () {
                return n;
            });
    var Lc = a.jQuery,
        Mc = a.$;
    return (
        (n.noConflict = function (b) {
            return (
                a.$ === n && (a.$ = Mc),
                b && a.jQuery === n && (a.jQuery = Lc),
                n
            );
        }),
        typeof b === U && (a.jQuery = a.$ = n),
        n
    );
});

/*--session.js--*/
(function ($) {
    $.session = {
        _id: null,
        _cookieCache: undefined,
        _init: function () {
            if (!window.name) {
                window.name = Math.random();
            }
            this._id = window.name;
            this._initCache();
            var matches = new RegExp(this._generatePrefix() + "=([^;]+);").exec(
                document.cookie,
            );
            if (matches && document.location.protocol !== matches[1]) {
                this._clearSession();
                for (var key in this._cookieCache) {
                    try {
                        window.sessionStorage.setItem(
                            key,
                            this._cookieCache[key],
                        );
                    } catch (e) {}
                }
            }
            document.cookie =
                this._generatePrefix() +
                "=" +
                document.location.protocol +
                ";path=/;expires=" +
                new Date(new Date().getTime() + 120000).toUTCString();
        },
        _generatePrefix: function () {
            return "__session:" + this._id + ":";
        },
        _initCache: function () {
            var cookies = document.cookie.split(";");
            this._cookieCache = {};
            for (var i in cookies) {
                var kv = cookies[i].split("=");
                if (
                    new RegExp(this._generatePrefix() + ".+").test(kv[0]) &&
                    kv[1]
                ) {
                    this._cookieCache[kv[0].split(":", 3)[2]] = kv[1];
                }
            }
        },
        _setFallback: function (key, value, onceOnly) {
            var cookie =
                this._generatePrefix() + key + "=" + value + "; path=/";
            if (onceOnly) {
                cookie +=
                    "; expires=" + new Date(Date.now() + 120000).toUTCString();
            }
            document.cookie = cookie;
            this._cookieCache[key] = value;
            return this;
        },
        _getFallback: function (key) {
            if (!this._cookieCache) {
                this._initCache();
            }
            return this._cookieCache[key];
        },
        _clearFallback: function () {
            for (var i in this._cookieCache) {
                document.cookie =
                    this._generatePrefix() +
                    i +
                    "=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
            }
            this._cookieCache = {};
        },
        _deleteFallback: function (key) {
            document.cookie =
                this._generatePrefix() +
                key +
                "=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
            delete this._cookieCache[key];
        },
        get: function (key) {
            return window.sessionStorage.getItem(key) || this._getFallback(key);
        },
        set: function (key, value, onceOnly) {
            try {
                window.sessionStorage.setItem(key, value);
            } catch (e) {}
            this._setFallback(key, value, onceOnly || false);
            return this;
        },
        delete: function (key) {
            return this.remove(key);
        },
        remove: function (key) {
            try {
                window.sessionStorage.removeItem(key);
            } catch (e) {}
            this._deleteFallback(key);
            return this;
        },
        _clearSession: function () {
            try {
                window.sessionStorage.clear();
            } catch (e) {
                for (var i in window.sessionStorage) {
                    window.sessionStorage.removeItem(i);
                }
            }
        },
        clear: function () {
            this._clearSession();
            this._clearFallback();
            return this;
        },
    };
    $.session._init();
})(jQuery);

/**
 * Owl Carousel v2.3.4
 * Copyright 2013-2018 David Deutsch
 * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
 */
!(function (a, b, c, d) {
    function e(b, c) {
        (this.settings = null),
            (this.options = a.extend({}, e.Defaults, c)),
            (this.$element = a(b)),
            (this._handlers = {}),
            (this._plugins = {}),
            (this._supress = {}),
            (this._current = null),
            (this._speed = null),
            (this._coordinates = []),
            (this._breakpoint = null),
            (this._width = null),
            (this._items = []),
            (this._clones = []),
            (this._mergers = []),
            (this._widths = []),
            (this._invalidated = {}),
            (this._pipe = []),
            (this._drag = {
                time: null,
                target: null,
                pointer: null,
                stage: {
                    start: null,
                    current: null,
                },
                direction: null,
            }),
            (this._states = {
                current: {},
                tags: {
                    initializing: ["busy"],
                    animating: ["busy"],
                    dragging: ["interacting"],
                },
            }),
            a.each(
                ["onResize", "onThrottledResize"],
                a.proxy(function (b, c) {
                    this._handlers[c] = a.proxy(this[c], this);
                }, this),
            ),
            a.each(
                e.Plugins,
                a.proxy(function (a, b) {
                    this._plugins[a.charAt(0).toLowerCase() + a.slice(1)] =
                        new b(this);
                }, this),
            ),
            a.each(
                e.Workers,
                a.proxy(function (b, c) {
                    this._pipe.push({
                        filter: c.filter,
                        run: a.proxy(c.run, this),
                    });
                }, this),
            ),
            this.setup(),
            this.initialize();
    }
    (e.Defaults = {
        items: 3,
        loop: !1,
        center: !1,
        rewind: !1,
        checkVisibility: !0,
        mouseDrag: !0,
        touchDrag: !0,
        pullDrag: !0,
        freeDrag: !1,
        margin: 0,
        stagePadding: 0,
        merge: !1,
        mergeFit: !0,
        autoWidth: !1,
        startPosition: 0,
        rtl: !1,
        smartSpeed: 250,
        fluidSpeed: !1,
        dragEndSpeed: !1,
        responsive: {},
        responsiveRefreshRate: 200,
        responsiveBaseElement: b,
        fallbackEasing: "swing",
        slideTransition: "",
        info: !1,
        nestedItemSelector: !1,
        itemElement: "div",
        stageElement: "div",
        refreshClass: "owl-refresh",
        loadedClass: "owl-loaded",
        loadingClass: "owl-loading",
        rtlClass: "owl-rtl",
        responsiveClass: "owl-responsive",
        dragClass: "owl-drag",
        itemClass: "owl-item",
        stageClass: "owl-stage",
        stageOuterClass: "owl-stage-outer",
        grabClass: "owl-grab",
    }),
        (e.Width = {
            Default: "default",
            Inner: "inner",
            Outer: "outer",
        }),
        (e.Type = {
            Event: "event",
            State: "state",
        }),
        (e.Plugins = {}),
        (e.Workers = [
            {
                filter: ["width", "settings"],
                run: function () {
                    this._width = this.$element.width();
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function (a) {
                    a.current =
                        this._items &&
                        this._items[this.relative(this._current)];
                },
            },
            {
                filter: ["items", "settings"],
                run: function () {
                    this.$stage.children(".cloned").remove();
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function (a) {
                    var b = this.settings.margin || "",
                        c = !this.settings.autoWidth,
                        d = this.settings.rtl,
                        e = {
                            width: "auto",
                            "margin-left": d ? b : "",
                            "margin-right": d ? "" : b,
                        };
                    !c && this.$stage.children().css(e), (a.css = e);
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function (a) {
                    var b =
                            (this.width() / this.settings.items).toFixed(3) -
                            this.settings.margin,
                        c = null,
                        d = this._items.length,
                        e = !this.settings.autoWidth,
                        f = [];
                    for (
                        a.items = {
                            merge: !1,
                            width: b,
                        };
                        d--;

                    )
                        (c = this._mergers[d]),
                            (c =
                                (this.settings.mergeFit &&
                                    Math.min(c, this.settings.items)) ||
                                c),
                            (a.items.merge = c > 1 || a.items.merge),
                            (f[d] = e ? b * c : this._items[d].width());
                    this._widths = f;
                },
            },
            {
                filter: ["items", "settings"],
                run: function () {
                    var b = [],
                        c = this._items,
                        d = this.settings,
                        e = Math.max(2 * d.items, 4),
                        f = 2 * Math.ceil(c.length / 2),
                        g =
                            d.loop && c.length
                                ? d.rewind
                                    ? e
                                    : Math.max(e, f)
                                : 0,
                        h = "",
                        i = "";
                    for (g /= 2; g > 0; )
                        b.push(this.normalize(b.length / 2, !0)),
                            (h += c[b[b.length - 1]][0].outerHTML),
                            b.push(
                                this.normalize(
                                    c.length - 1 - (b.length - 1) / 2,
                                    !0,
                                ),
                            ),
                            (i = c[b[b.length - 1]][0].outerHTML + i),
                            (g -= 1);
                    (this._clones = b),
                        a(h).addClass("cloned").appendTo(this.$stage),
                        a(i).addClass("cloned").prependTo(this.$stage);
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function () {
                    for (
                        var a = this.settings.rtl ? 1 : -1,
                            b = this._clones.length + this._items.length,
                            c = -1,
                            d = 0,
                            e = 0,
                            f = [];
                        ++c < b;

                    )
                        (d = f[c - 1] || 0),
                            (e =
                                this._widths[this.relative(c)] +
                                this.settings.margin),
                            f.push(d + e * a);
                    this._coordinates = f;
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function () {
                    var a = this.settings.stagePadding,
                        b = this._coordinates,
                        c = {
                            width: Math.ceil(Math.abs(b[b.length - 1])) + 2 * a,
                            "padding-left": a || "",
                            "padding-right": a || "",
                        };
                    this.$stage.css(c);
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function (a) {
                    var b = this._coordinates.length,
                        c = !this.settings.autoWidth,
                        d = this.$stage.children();
                    if (c && a.items.merge)
                        for (; b--; )
                            (a.css.width = this._widths[this.relative(b)]),
                                d.eq(b).css(a.css);
                    else c && ((a.css.width = a.items.width), d.css(a.css));
                },
            },
            {
                filter: ["items"],
                run: function () {
                    this._coordinates.length < 1 &&
                        this.$stage.removeAttr("style");
                },
            },
            {
                filter: ["width", "items", "settings"],
                run: function (a) {
                    (a.current = a.current
                        ? this.$stage.children().index(a.current)
                        : 0),
                        (a.current = Math.max(
                            this.minimum(),
                            Math.min(this.maximum(), a.current),
                        )),
                        this.reset(a.current);
                },
            },
            {
                filter: ["position"],
                run: function () {
                    this.animate(this.coordinates(this._current));
                },
            },
            {
                filter: ["width", "position", "items", "settings"],
                run: function () {
                    var a,
                        b,
                        c,
                        d,
                        e = this.settings.rtl ? 1 : -1,
                        f = 2 * this.settings.stagePadding,
                        g = this.coordinates(this.current()) + f,
                        h = g + this.width() * e,
                        i = [];
                    for (c = 0, d = this._coordinates.length; c < d; c++)
                        (a = this._coordinates[c - 1] || 0),
                            (b = Math.abs(this._coordinates[c]) + f * e),
                            ((this.op(a, "<=", g) && this.op(a, ">", h)) ||
                                (this.op(b, "<", g) && this.op(b, ">", h))) &&
                                i.push(c);
                    this.$stage.children(".active").removeClass("active"),
                        this.$stage
                            .children(":eq(" + i.join("), :eq(") + ")")
                            .addClass("active"),
                        this.$stage.children(".center").removeClass("center"),
                        this.settings.center &&
                            this.$stage
                                .children()
                                .eq(this.current())
                                .addClass("center");
                },
            },
        ]),
        (e.prototype.initializeStage = function () {
            (this.$stage = this.$element.find("." + this.settings.stageClass)),
                this.$stage.length ||
                    (this.$element.addClass(this.options.loadingClass),
                    (this.$stage = a("<" + this.settings.stageElement + ">", {
                        class: this.settings.stageClass,
                    }).wrap(
                        a("<div/>", {
                            class: this.settings.stageOuterClass,
                        }),
                    )),
                    this.$element.append(this.$stage.parent()));
        }),
        (e.prototype.initializeItems = function () {
            var b = this.$element.find(".owl-item");
            if (b.length)
                return (
                    (this._items = b.get().map(function (b) {
                        return a(b);
                    })),
                    (this._mergers = this._items.map(function () {
                        return 1;
                    })),
                    void this.refresh()
                );
            this.replace(this.$element.children().not(this.$stage.parent())),
                this.isVisible() ? this.refresh() : this.invalidate("width"),
                this.$element
                    .removeClass(this.options.loadingClass)
                    .addClass(this.options.loadedClass);
        }),
        (e.prototype.initialize = function () {
            if (
                (this.enter("initializing"),
                this.trigger("initialize"),
                this.$element.toggleClass(
                    this.settings.rtlClass,
                    this.settings.rtl,
                ),
                this.settings.autoWidth && !this.is("pre-loading"))
            ) {
                var a, b, c;
                (a = this.$element.find("img")),
                    (b = this.settings.nestedItemSelector
                        ? "." + this.settings.nestedItemSelector
                        : d),
                    (c = this.$element.children(b).width()),
                    a.length && c <= 0 && this.preloadAutoWidthImages(a);
            }
            this.initializeStage(),
                this.initializeItems(),
                this.registerEventHandlers(),
                this.leave("initializing"),
                this.trigger("initialized");
        }),
        (e.prototype.isVisible = function () {
            return (
                !this.settings.checkVisibility || this.$element.is(":visible")
            );
        }),
        (e.prototype.setup = function () {
            var b = this.viewport(),
                c = this.options.responsive,
                d = -1,
                e = null;
            c
                ? (a.each(c, function (a) {
                      a <= b && a > d && (d = Number(a));
                  }),
                  (e = a.extend({}, this.options, c[d])),
                  "function" == typeof e.stagePadding &&
                      (e.stagePadding = e.stagePadding()),
                  delete e.responsive,
                  e.responsiveClass &&
                      this.$element.attr(
                          "class",
                          this.$element
                              .attr("class")
                              .replace(
                                  new RegExp(
                                      "(" +
                                          this.options.responsiveClass +
                                          "-)\\S+\\s",
                                      "g",
                                  ),
                                  "$1" + d,
                              ),
                      ))
                : (e = a.extend({}, this.options)),
                this.trigger("change", {
                    property: {
                        name: "settings",
                        value: e,
                    },
                }),
                (this._breakpoint = d),
                (this.settings = e),
                this.invalidate("settings"),
                this.trigger("changed", {
                    property: {
                        name: "settings",
                        value: this.settings,
                    },
                });
        }),
        (e.prototype.optionsLogic = function () {
            this.settings.autoWidth &&
                ((this.settings.stagePadding = !1), (this.settings.merge = !1));
        }),
        (e.prototype.prepare = function (b) {
            var c = this.trigger("prepare", {
                content: b,
            });
            return (
                c.data ||
                    (c.data = a("<" + this.settings.itemElement + "/>")
                        .addClass(this.options.itemClass)
                        .append(b)),
                this.trigger("prepared", {
                    content: c.data,
                }),
                c.data
            );
        }),
        (e.prototype.update = function () {
            for (
                var b = 0,
                    c = this._pipe.length,
                    d = a.proxy(function (a) {
                        return this[a];
                    }, this._invalidated),
                    e = {};
                b < c;

            )
                (this._invalidated.all ||
                    a.grep(this._pipe[b].filter, d).length > 0) &&
                    this._pipe[b].run(e),
                    b++;
            (this._invalidated = {}), !this.is("valid") && this.enter("valid");
        }),
        (e.prototype.width = function (a) {
            switch ((a = a || e.Width.Default)) {
                case e.Width.Inner:
                case e.Width.Outer:
                    return this._width;
                default:
                    return (
                        this._width -
                        2 * this.settings.stagePadding +
                        this.settings.margin
                    );
            }
        }),
        (e.prototype.refresh = function () {
            this.enter("refreshing"),
                this.trigger("refresh"),
                this.setup(),
                this.optionsLogic(),
                this.$element.addClass(this.options.refreshClass),
                this.update(),
                this.$element.removeClass(this.options.refreshClass),
                this.leave("refreshing"),
                this.trigger("refreshed");
        }),
        (e.prototype.onThrottledResize = function () {
            b.clearTimeout(this.resizeTimer),
                (this.resizeTimer = b.setTimeout(
                    this._handlers.onResize,
                    this.settings.responsiveRefreshRate,
                ));
        }),
        (e.prototype.onResize = function () {
            return (
                !!this._items.length &&
                this._width !== this.$element.width() &&
                !!this.isVisible() &&
                (this.enter("resizing"),
                this.trigger("resize").isDefaultPrevented()
                    ? (this.leave("resizing"), !1)
                    : (this.invalidate("width"),
                      this.refresh(),
                      this.leave("resizing"),
                      void this.trigger("resized")))
            );
        }),
        (e.prototype.registerEventHandlers = function () {
            a.support.transition &&
                this.$stage.on(
                    a.support.transition.end + ".owl.core",
                    a.proxy(this.onTransitionEnd, this),
                ),
                !1 !== this.settings.responsive &&
                    this.on(b, "resize", this._handlers.onThrottledResize),
                this.settings.mouseDrag &&
                    (this.$element.addClass(this.options.dragClass),
                    this.$stage.on(
                        "mousedown.owl.core",
                        a.proxy(this.onDragStart, this),
                    ),
                    this.$stage.on(
                        "dragstart.owl.core selectstart.owl.core",
                        function () {
                            return !1;
                        },
                    )),
                this.settings.touchDrag &&
                    (this.$stage.on(
                        "touchstart.owl.core",
                        a.proxy(this.onDragStart, this),
                    ),
                    this.$stage.on(
                        "touchcancel.owl.core",
                        a.proxy(this.onDragEnd, this),
                    ));
        }),
        (e.prototype.onDragStart = function (b) {
            var d = null;
            3 !== b.which &&
                (a.support.transform
                    ? ((d = this.$stage
                          .css("transform")
                          .replace(/.*\(|\)| /g, "")
                          .split(",")),
                      (d = {
                          x: d[16 === d.length ? 12 : 4],
                          y: d[16 === d.length ? 13 : 5],
                      }))
                    : ((d = this.$stage.position()),
                      (d = {
                          x: this.settings.rtl
                              ? d.left +
                                this.$stage.width() -
                                this.width() +
                                this.settings.margin
                              : d.left,
                          y: d.top,
                      })),
                this.is("animating") &&
                    (a.support.transform
                        ? this.animate(d.x)
                        : this.$stage.stop(),
                    this.invalidate("position")),
                this.$element.toggleClass(
                    this.options.grabClass,
                    "mousedown" === b.type,
                ),
                this.speed(0),
                (this._drag.time = new Date().getTime()),
                (this._drag.target = a(b.target)),
                (this._drag.stage.start = d),
                (this._drag.stage.current = d),
                (this._drag.pointer = this.pointer(b)),
                a(c).on(
                    "mouseup.owl.core touchend.owl.core",
                    a.proxy(this.onDragEnd, this),
                ),
                a(c).one(
                    "mousemove.owl.core touchmove.owl.core",
                    a.proxy(function (b) {
                        var d = this.difference(
                            this._drag.pointer,
                            this.pointer(b),
                        );
                        a(c).on(
                            "mousemove.owl.core touchmove.owl.core",
                            a.proxy(this.onDragMove, this),
                        ),
                            (Math.abs(d.x) < Math.abs(d.y) &&
                                this.is("valid")) ||
                                (b.preventDefault(),
                                this.enter("dragging"),
                                this.trigger("drag"));
                    }, this),
                ));
        }),
        (e.prototype.onDragMove = function (a) {
            var b = null,
                c = null,
                d = null,
                e = this.difference(this._drag.pointer, this.pointer(a)),
                f = this.difference(this._drag.stage.start, e);
            this.is("dragging") &&
                (a.preventDefault(),
                this.settings.loop
                    ? ((b = this.coordinates(this.minimum())),
                      (c = this.coordinates(this.maximum() + 1) - b),
                      (f.x = ((((f.x - b) % c) + c) % c) + b))
                    : ((b = this.settings.rtl
                          ? this.coordinates(this.maximum())
                          : this.coordinates(this.minimum())),
                      (c = this.settings.rtl
                          ? this.coordinates(this.minimum())
                          : this.coordinates(this.maximum())),
                      (d = this.settings.pullDrag ? (-1 * e.x) / 5 : 0),
                      (f.x = Math.max(Math.min(f.x, b + d), c + d))),
                (this._drag.stage.current = f),
                this.animate(f.x));
        }),
        (e.prototype.onDragEnd = function (b) {
            var d = this.difference(this._drag.pointer, this.pointer(b)),
                e = this._drag.stage.current,
                f = (d.x > 0) ^ this.settings.rtl ? "left" : "right";
            a(c).off(".owl.core"),
                this.$element.removeClass(this.options.grabClass),
                ((0 !== d.x && this.is("dragging")) || !this.is("valid")) &&
                    (this.speed(
                        this.settings.dragEndSpeed || this.settings.smartSpeed,
                    ),
                    this.current(
                        this.closest(e.x, 0 !== d.x ? f : this._drag.direction),
                    ),
                    this.invalidate("position"),
                    this.update(),
                    (this._drag.direction = f),
                    (Math.abs(d.x) > 3 ||
                        new Date().getTime() - this._drag.time > 300) &&
                        this._drag.target.one("click.owl.core", function () {
                            return !1;
                        })),
                this.is("dragging") &&
                    (this.leave("dragging"), this.trigger("dragged"));
        }),
        (e.prototype.closest = function (b, c) {
            var e = -1,
                f = 30,
                g = this.width(),
                h = this.coordinates();
            return (
                this.settings.freeDrag ||
                    a.each(
                        h,
                        a.proxy(function (a, i) {
                            return (
                                "left" === c && b > i - f && b < i + f
                                    ? (e = a)
                                    : "right" === c &&
                                        b > i - g - f &&
                                        b < i - g + f
                                      ? (e = a + 1)
                                      : this.op(b, "<", i) &&
                                        this.op(
                                            b,
                                            ">",
                                            h[a + 1] !== d ? h[a + 1] : i - g,
                                        ) &&
                                        (e = "left" === c ? a + 1 : a),
                                -1 === e
                            );
                        }, this),
                    ),
                this.settings.loop ||
                    (this.op(b, ">", h[this.minimum()])
                        ? (e = b = this.minimum())
                        : this.op(b, "<", h[this.maximum()]) &&
                          (e = b = this.maximum())),
                e
            );
        }),
        (e.prototype.animate = function (b) {
            var c = this.speed() > 0;
            this.is("animating") && this.onTransitionEnd(),
                c && (this.enter("animating"), this.trigger("translate")),
                a.support.transform3d && a.support.transition
                    ? this.$stage.css({
                          transform: "translate3d(" + b + "px,0px,0px)",
                          transition:
                              this.speed() / 1e3 +
                              "s" +
                              (this.settings.slideTransition
                                  ? " " + this.settings.slideTransition
                                  : ""),
                      })
                    : c
                      ? this.$stage.animate(
                            {
                                left: b + "px",
                            },
                            this.speed(),
                            this.settings.fallbackEasing,
                            a.proxy(this.onTransitionEnd, this),
                        )
                      : this.$stage.css({
                            left: b + "px",
                        });
        }),
        (e.prototype.is = function (a) {
            return this._states.current[a] && this._states.current[a] > 0;
        }),
        (e.prototype.current = function (a) {
            if (a === d) return this._current;
            if (0 === this._items.length) return d;
            if (((a = this.normalize(a)), this._current !== a)) {
                var b = this.trigger("change", {
                    property: {
                        name: "position",
                        value: a,
                    },
                });
                b.data !== d && (a = this.normalize(b.data)),
                    (this._current = a),
                    this.invalidate("position"),
                    this.trigger("changed", {
                        property: {
                            name: "position",
                            value: this._current,
                        },
                    });
            }
            return this._current;
        }),
        (e.prototype.invalidate = function (b) {
            return (
                "string" === a.type(b) &&
                    ((this._invalidated[b] = !0),
                    this.is("valid") && this.leave("valid")),
                a.map(this._invalidated, function (a, b) {
                    return b;
                })
            );
        }),
        (e.prototype.reset = function (a) {
            (a = this.normalize(a)) !== d &&
                ((this._speed = 0),
                (this._current = a),
                this.suppress(["translate", "translated"]),
                this.animate(this.coordinates(a)),
                this.release(["translate", "translated"]));
        }),
        (e.prototype.normalize = function (a, b) {
            var c = this._items.length,
                e = b ? 0 : this._clones.length;
            return (
                !this.isNumeric(a) || c < 1
                    ? (a = d)
                    : (a < 0 || a >= c + e) &&
                      (a = ((((a - e / 2) % c) + c) % c) + e / 2),
                a
            );
        }),
        (e.prototype.relative = function (a) {
            return (a -= this._clones.length / 2), this.normalize(a, !0);
        }),
        (e.prototype.maximum = function (a) {
            var b,
                c,
                d,
                e = this.settings,
                f = this._coordinates.length;
            if (e.loop) f = this._clones.length / 2 + this._items.length - 1;
            else if (e.autoWidth || e.merge) {
                if ((b = this._items.length))
                    for (
                        c = this._items[--b].width(), d = this.$element.width();
                        b-- &&
                        !(
                            (c +=
                                this._items[b].width() + this.settings.margin) >
                            d
                        );

                    );
                f = b + 1;
            } else
                f = e.center
                    ? this._items.length - 1
                    : this._items.length - e.items;
            return a && (f -= this._clones.length / 2), Math.max(f, 0);
        }),
        (e.prototype.minimum = function (a) {
            return a ? 0 : this._clones.length / 2;
        }),
        (e.prototype.items = function (a) {
            return a === d
                ? this._items.slice()
                : ((a = this.normalize(a, !0)), this._items[a]);
        }),
        (e.prototype.mergers = function (a) {
            return a === d
                ? this._mergers.slice()
                : ((a = this.normalize(a, !0)), this._mergers[a]);
        }),
        (e.prototype.clones = function (b) {
            var c = this._clones.length / 2,
                e = c + this._items.length,
                f = function (a) {
                    return a % 2 == 0 ? e + a / 2 : c - (a + 1) / 2;
                };
            return b === d
                ? a.map(this._clones, function (a, b) {
                      return f(b);
                  })
                : a.map(this._clones, function (a, c) {
                      return a === b ? f(c) : null;
                  });
        }),
        (e.prototype.speed = function (a) {
            return a !== d && (this._speed = a), this._speed;
        }),
        (e.prototype.coordinates = function (b) {
            var c,
                e = 1,
                f = b - 1;
            return b === d
                ? a.map(
                      this._coordinates,
                      a.proxy(function (a, b) {
                          return this.coordinates(b);
                      }, this),
                  )
                : (this.settings.center
                      ? (this.settings.rtl && ((e = -1), (f = b + 1)),
                        (c = this._coordinates[b]),
                        (c +=
                            ((this.width() - c + (this._coordinates[f] || 0)) /
                                2) *
                            e))
                      : (c = this._coordinates[f] || 0),
                  (c = Math.ceil(c)));
        }),
        (e.prototype.duration = function (a, b, c) {
            return 0 === c
                ? 0
                : Math.min(Math.max(Math.abs(b - a), 1), 6) *
                      Math.abs(c || this.settings.smartSpeed);
        }),
        (e.prototype.to = function (a, b) {
            var c = this.current(),
                d = null,
                e = a - this.relative(c),
                f = (e > 0) - (e < 0),
                g = this._items.length,
                h = this.minimum(),
                i = this.maximum();
            this.settings.loop
                ? (!this.settings.rewind &&
                      Math.abs(e) > g / 2 &&
                      (e += -1 * f * g),
                  (a = c + e),
                  (d = ((((a - h) % g) + g) % g) + h) !== a &&
                      d - e <= i &&
                      d - e > 0 &&
                      ((c = d - e), (a = d), this.reset(c)))
                : this.settings.rewind
                  ? ((i += 1), (a = ((a % i) + i) % i))
                  : (a = Math.max(h, Math.min(i, a))),
                this.speed(this.duration(c, a, b)),
                this.current(a),
                this.isVisible() && this.update();
        }),
        (e.prototype.next = function (a) {
            (a = a || !1), this.to(this.relative(this.current()) + 1, a);
        }),
        (e.prototype.prev = function (a) {
            (a = a || !1), this.to(this.relative(this.current()) - 1, a);
        }),
        (e.prototype.onTransitionEnd = function (a) {
            if (
                a !== d &&
                (a.stopPropagation(),
                (a.target || a.srcElement || a.originalTarget) !==
                    this.$stage.get(0))
            )
                return !1;
            this.leave("animating"), this.trigger("translated");
        }),
        (e.prototype.viewport = function () {
            var d;
            return (
                this.options.responsiveBaseElement !== b
                    ? (d = a(this.options.responsiveBaseElement).width())
                    : b.innerWidth
                      ? (d = b.innerWidth)
                      : c.documentElement && c.documentElement.clientWidth
                        ? (d = c.documentElement.clientWidth)
                        : console.warn("Can not detect viewport width."),
                d
            );
        }),
        (e.prototype.replace = function (b) {
            this.$stage.empty(),
                (this._items = []),
                b && (b = b instanceof jQuery ? b : a(b)),
                this.settings.nestedItemSelector &&
                    (b = b.find("." + this.settings.nestedItemSelector)),
                b
                    .filter(function () {
                        return 1 === this.nodeType;
                    })
                    .each(
                        a.proxy(function (a, b) {
                            (b = this.prepare(b)),
                                this.$stage.append(b),
                                this._items.push(b),
                                this._mergers.push(
                                    1 *
                                        b
                                            .find("[data-merge]")
                                            .addBack("[data-merge]")
                                            .attr("data-merge") || 1,
                                );
                        }, this),
                    ),
                this.reset(
                    this.isNumeric(this.settings.startPosition)
                        ? this.settings.startPosition
                        : 0,
                ),
                this.invalidate("items");
        }),
        (e.prototype.add = function (b, c) {
            var e = this.relative(this._current);
            (c = c === d ? this._items.length : this.normalize(c, !0)),
                (b = b instanceof jQuery ? b : a(b)),
                this.trigger("add", {
                    content: b,
                    position: c,
                }),
                (b = this.prepare(b)),
                0 === this._items.length || c === this._items.length
                    ? (0 === this._items.length && this.$stage.append(b),
                      0 !== this._items.length && this._items[c - 1].after(b),
                      this._items.push(b),
                      this._mergers.push(
                          1 *
                              b
                                  .find("[data-merge]")
                                  .addBack("[data-merge]")
                                  .attr("data-merge") || 1,
                      ))
                    : (this._items[c].before(b),
                      this._items.splice(c, 0, b),
                      this._mergers.splice(
                          c,
                          0,
                          1 *
                              b
                                  .find("[data-merge]")
                                  .addBack("[data-merge]")
                                  .attr("data-merge") || 1,
                      )),
                this._items[e] && this.reset(this._items[e].index()),
                this.invalidate("items"),
                this.trigger("added", {
                    content: b,
                    position: c,
                });
        }),
        (e.prototype.remove = function (a) {
            (a = this.normalize(a, !0)) !== d &&
                (this.trigger("remove", {
                    content: this._items[a],
                    position: a,
                }),
                this._items[a].remove(),
                this._items.splice(a, 1),
                this._mergers.splice(a, 1),
                this.invalidate("items"),
                this.trigger("removed", {
                    content: null,
                    position: a,
                }));
        }),
        (e.prototype.preloadAutoWidthImages = function (b) {
            b.each(
                a.proxy(function (b, c) {
                    this.enter("pre-loading"),
                        (c = a(c)),
                        a(new Image())
                            .one(
                                "load",
                                a.proxy(function (a) {
                                    c.attr("src", a.target.src),
                                        c.css("opacity", 1),
                                        this.leave("pre-loading"),
                                        !this.is("pre-loading") &&
                                            !this.is("initializing") &&
                                            this.refresh();
                                }, this),
                            )
                            .attr(
                                "src",
                                c.attr("src") ||
                                    c.attr("data-src") ||
                                    c.attr("data-src-retina"),
                            );
                }, this),
            );
        }),
        (e.prototype.destroy = function () {
            this.$element.off(".owl.core"),
                this.$stage.off(".owl.core"),
                a(c).off(".owl.core"),
                !1 !== this.settings.responsive &&
                    (b.clearTimeout(this.resizeTimer),
                    this.off(b, "resize", this._handlers.onThrottledResize));
            for (var d in this._plugins) this._plugins[d].destroy();
            this.$stage.children(".cloned").remove(),
                this.$stage.unwrap(),
                this.$stage.children().contents().unwrap(),
                this.$stage.children().unwrap(),
                this.$stage.remove(),
                this.$element
                    .removeClass(this.options.refreshClass)
                    .removeClass(this.options.loadingClass)
                    .removeClass(this.options.loadedClass)
                    .removeClass(this.options.rtlClass)
                    .removeClass(this.options.dragClass)
                    .removeClass(this.options.grabClass)
                    .attr(
                        "class",
                        this.$element
                            .attr("class")
                            .replace(
                                new RegExp(
                                    this.options.responsiveClass + "-\\S+\\s",
                                    "g",
                                ),
                                "",
                            ),
                    )
                    .removeData("owl.carousel");
        }),
        (e.prototype.op = function (a, b, c) {
            var d = this.settings.rtl;
            switch (b) {
                case "<":
                    return d ? a > c : a < c;
                case ">":
                    return d ? a < c : a > c;
                case ">=":
                    return d ? a <= c : a >= c;
                case "<=":
                    return d ? a >= c : a <= c;
            }
        }),
        (e.prototype.on = function (a, b, c, d) {
            a.addEventListener
                ? a.addEventListener(b, c, d)
                : a.attachEvent && a.attachEvent("on" + b, c);
        }),
        (e.prototype.off = function (a, b, c, d) {
            a.removeEventListener
                ? a.removeEventListener(b, c, d)
                : a.detachEvent && a.detachEvent("on" + b, c);
        }),
        (e.prototype.trigger = function (b, c, d, f, g) {
            var h = {
                    item: {
                        count: this._items.length,
                        index: this.current(),
                    },
                },
                i = a.camelCase(
                    a
                        .grep(["on", b, d], function (a) {
                            return a;
                        })
                        .join("-")
                        .toLowerCase(),
                ),
                j = a.Event(
                    [b, "owl", d || "carousel"].join(".").toLowerCase(),
                    a.extend(
                        {
                            relatedTarget: this,
                        },
                        h,
                        c,
                    ),
                );
            return (
                this._supress[b] ||
                    (a.each(this._plugins, function (a, b) {
                        b.onTrigger && b.onTrigger(j);
                    }),
                    this.register({
                        type: e.Type.Event,
                        name: b,
                    }),
                    this.$element.trigger(j),
                    this.settings &&
                        "function" == typeof this.settings[i] &&
                        this.settings[i].call(this, j)),
                j
            );
        }),
        (e.prototype.enter = function (b) {
            a.each(
                [b].concat(this._states.tags[b] || []),
                a.proxy(function (a, b) {
                    this._states.current[b] === d &&
                        (this._states.current[b] = 0),
                        this._states.current[b]++;
                }, this),
            );
        }),
        (e.prototype.leave = function (b) {
            a.each(
                [b].concat(this._states.tags[b] || []),
                a.proxy(function (a, b) {
                    this._states.current[b]--;
                }, this),
            );
        }),
        (e.prototype.register = function (b) {
            if (b.type === e.Type.Event) {
                if (
                    (a.event.special[b.name] || (a.event.special[b.name] = {}),
                    !a.event.special[b.name].owl)
                ) {
                    var c = a.event.special[b.name]._default;
                    (a.event.special[b.name]._default = function (a) {
                        return !c ||
                            !c.apply ||
                            (a.namespace && -1 !== a.namespace.indexOf("owl"))
                            ? a.namespace && a.namespace.indexOf("owl") > -1
                            : c.apply(this, arguments);
                    }),
                        (a.event.special[b.name].owl = !0);
                }
            } else
                b.type === e.Type.State &&
                    (this._states.tags[b.name]
                        ? (this._states.tags[b.name] = this._states.tags[
                              b.name
                          ].concat(b.tags))
                        : (this._states.tags[b.name] = b.tags),
                    (this._states.tags[b.name] = a.grep(
                        this._states.tags[b.name],
                        a.proxy(function (c, d) {
                            return (
                                a.inArray(c, this._states.tags[b.name]) === d
                            );
                        }, this),
                    )));
        }),
        (e.prototype.suppress = function (b) {
            a.each(
                b,
                a.proxy(function (a, b) {
                    this._supress[b] = !0;
                }, this),
            );
        }),
        (e.prototype.release = function (b) {
            a.each(
                b,
                a.proxy(function (a, b) {
                    delete this._supress[b];
                }, this),
            );
        }),
        (e.prototype.pointer = function (a) {
            var c = {
                x: null,
                y: null,
            };
            return (
                (a = a.originalEvent || a || b.event),
                (a =
                    a.touches && a.touches.length
                        ? a.touches[0]
                        : a.changedTouches && a.changedTouches.length
                          ? a.changedTouches[0]
                          : a),
                a.pageX
                    ? ((c.x = a.pageX), (c.y = a.pageY))
                    : ((c.x = a.clientX), (c.y = a.clientY)),
                c
            );
        }),
        (e.prototype.isNumeric = function (a) {
            return !isNaN(parseFloat(a));
        }),
        (e.prototype.difference = function (a, b) {
            return {
                x: a.x - b.x,
                y: a.y - b.y,
            };
        }),
        (a.fn.owlCarousel = function (b) {
            var c = Array.prototype.slice.call(arguments, 1);
            return this.each(function () {
                var d = a(this),
                    f = d.data("owl.carousel");
                f ||
                    ((f = new e(this, "object" == typeof b && b)),
                    d.data("owl.carousel", f),
                    a.each(
                        [
                            "next",
                            "prev",
                            "to",
                            "destroy",
                            "refresh",
                            "replace",
                            "add",
                            "remove",
                        ],
                        function (b, c) {
                            f.register({
                                type: e.Type.Event,
                                name: c,
                            }),
                                f.$element.on(
                                    c + ".owl.carousel.core",
                                    a.proxy(function (a) {
                                        a.namespace &&
                                            a.relatedTarget !== this &&
                                            (this.suppress([c]),
                                            f[c].apply(
                                                this,
                                                [].slice.call(arguments, 1),
                                            ),
                                            this.release([c]));
                                    }, f),
                                );
                        },
                    )),
                    "string" == typeof b &&
                        "_" !== b.charAt(0) &&
                        f[b].apply(f, c);
            });
        }),
        (a.fn.owlCarousel.Constructor = e);
})(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (b) {
            (this._core = b),
                (this._interval = null),
                (this._visible = null),
                (this._handlers = {
                    "initialized.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.autoRefresh &&
                            this.watch();
                    }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this._core.$element.on(this._handlers);
        };
        (e.Defaults = {
            autoRefresh: !0,
            autoRefreshInterval: 500,
        }),
            (e.prototype.watch = function () {
                this._interval ||
                    ((this._visible = this._core.isVisible()),
                    (this._interval = b.setInterval(
                        a.proxy(this.refresh, this),
                        this._core.settings.autoRefreshInterval,
                    )));
            }),
            (e.prototype.refresh = function () {
                this._core.isVisible() !== this._visible &&
                    ((this._visible = !this._visible),
                    this._core.$element.toggleClass(
                        "owl-hidden",
                        !this._visible,
                    ),
                    this._visible &&
                        this._core.invalidate("width") &&
                        this._core.refresh());
            }),
            (e.prototype.destroy = function () {
                var a, c;
                b.clearInterval(this._interval);
                for (a in this._handlers)
                    this._core.$element.off(a, this._handlers[a]);
                for (c in Object.getOwnPropertyNames(this))
                    "function" != typeof this[c] && (this[c] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.AutoRefresh = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (b) {
            (this._core = b),
                (this._loaded = []),
                (this._handlers = {
                    "initialized.owl.carousel change.owl.carousel resized.owl.carousel":
                        a.proxy(function (b) {
                            if (
                                b.namespace &&
                                this._core.settings &&
                                this._core.settings.lazyLoad &&
                                ((b.property &&
                                    "position" == b.property.name) ||
                                    "initialized" == b.type)
                            ) {
                                var c = this._core.settings,
                                    e =
                                        (c.center && Math.ceil(c.items / 2)) ||
                                        c.items,
                                    f = (c.center && -1 * e) || 0,
                                    g =
                                        (b.property && b.property.value !== d
                                            ? b.property.value
                                            : this._core.current()) + f,
                                    h = this._core.clones().length,
                                    i = a.proxy(function (a, b) {
                                        this.load(b);
                                    }, this);
                                for (
                                    c.lazyLoadEager > 0 &&
                                    ((e += c.lazyLoadEager),
                                    c.loop && ((g -= c.lazyLoadEager), e++));
                                    f++ < e;

                                )
                                    this.load(h / 2 + this._core.relative(g)),
                                        h &&
                                            a.each(
                                                this._core.clones(
                                                    this._core.relative(g),
                                                ),
                                                i,
                                            ),
                                        g++;
                            }
                        }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this._core.$element.on(this._handlers);
        };
        (e.Defaults = {
            lazyLoad: !1,
            lazyLoadEager: 0,
        }),
            (e.prototype.load = function (c) {
                var d = this._core.$stage.children().eq(c),
                    e = d && d.find(".owl-lazy");
                !e ||
                    a.inArray(d.get(0), this._loaded) > -1 ||
                    (e.each(
                        a.proxy(function (c, d) {
                            var e,
                                f = a(d),
                                g =
                                    (b.devicePixelRatio > 1 &&
                                        f.attr("data-src-retina")) ||
                                    f.attr("data-src") ||
                                    f.attr("data-srcset");
                            this._core.trigger(
                                "load",
                                {
                                    element: f,
                                    url: g,
                                },
                                "lazy",
                            ),
                                f.is("img")
                                    ? f
                                          .one(
                                              "load.owl.lazy",
                                              a.proxy(function () {
                                                  f.css("opacity", 1),
                                                      this._core.trigger(
                                                          "loaded",
                                                          {
                                                              element: f,
                                                              url: g,
                                                          },
                                                          "lazy",
                                                      );
                                              }, this),
                                          )
                                          .attr("src", g)
                                    : f.is("source")
                                      ? f
                                            .one(
                                                "load.owl.lazy",
                                                a.proxy(function () {
                                                    this._core.trigger(
                                                        "loaded",
                                                        {
                                                            element: f,
                                                            url: g,
                                                        },
                                                        "lazy",
                                                    );
                                                }, this),
                                            )
                                            .attr("srcset", g)
                                      : ((e = new Image()),
                                        (e.onload = a.proxy(function () {
                                            f.css({
                                                "background-image":
                                                    'url("' + g + '")',
                                                opacity: "1",
                                            }),
                                                this._core.trigger(
                                                    "loaded",
                                                    {
                                                        element: f,
                                                        url: g,
                                                    },
                                                    "lazy",
                                                );
                                        }, this)),
                                        (e.src = g));
                        }, this),
                    ),
                    this._loaded.push(d.get(0)));
            }),
            (e.prototype.destroy = function () {
                var a, b;
                for (a in this.handlers)
                    this._core.$element.off(a, this.handlers[a]);
                for (b in Object.getOwnPropertyNames(this))
                    "function" != typeof this[b] && (this[b] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.Lazy = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (c) {
            (this._core = c),
                (this._previousHeight = null),
                (this._handlers = {
                    "initialized.owl.carousel refreshed.owl.carousel": a.proxy(
                        function (a) {
                            a.namespace &&
                                this._core.settings.autoHeight &&
                                this.update();
                        },
                        this,
                    ),
                    "changed.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.autoHeight &&
                            "position" === a.property.name &&
                            this.update();
                    }, this),
                    "loaded.owl.lazy": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.autoHeight &&
                            a.element
                                .closest("." + this._core.settings.itemClass)
                                .index() === this._core.current() &&
                            this.update();
                    }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this._core.$element.on(this._handlers),
                (this._intervalId = null);
            var d = this;
            a(b).on("load", function () {
                d._core.settings.autoHeight && d.update();
            }),
                a(b).resize(function () {
                    d._core.settings.autoHeight &&
                        (null != d._intervalId && clearTimeout(d._intervalId),
                        (d._intervalId = setTimeout(function () {
                            d.update();
                        }, 250)));
                });
        };
        (e.Defaults = {
            autoHeight: !1,
            autoHeightClass: "owl-height",
        }),
            (e.prototype.update = function () {
                var b = this._core._current,
                    c = b + this._core.settings.items,
                    d = this._core.settings.lazyLoad,
                    e = this._core.$stage.children().toArray().slice(b, c),
                    f = [],
                    g = 0;
                a.each(e, function (b, c) {
                    f.push(a(c).height());
                }),
                    (g = Math.max.apply(null, f)),
                    g <= 1 &&
                        d &&
                        this._previousHeight &&
                        (g = this._previousHeight),
                    (this._previousHeight = g),
                    this._core.$stage
                        .parent()
                        .height(g)
                        .addClass(this._core.settings.autoHeightClass);
            }),
            (e.prototype.destroy = function () {
                var a, b;
                for (a in this._handlers)
                    this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this))
                    "function" != typeof this[b] && (this[b] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.AutoHeight = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (b) {
            (this._core = b),
                (this._videos = {}),
                (this._playing = null),
                (this._handlers = {
                    "initialized.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.register({
                                type: "state",
                                name: "playing",
                                tags: ["interacting"],
                            });
                    }, this),
                    "resize.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.video &&
                            this.isInFullScreen() &&
                            a.preventDefault();
                    }, this),
                    "refreshed.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.is("resizing") &&
                            this._core.$stage
                                .find(".cloned .owl-video-frame")
                                .remove();
                    }, this),
                    "changed.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            "position" === a.property.name &&
                            this._playing &&
                            this.stop();
                    }, this),
                    "prepared.owl.carousel": a.proxy(function (b) {
                        if (b.namespace) {
                            var c = a(b.content).find(".owl-video");
                            c.length &&
                                (c.css("display", "none"),
                                this.fetch(c, a(b.content)));
                        }
                    }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this._core.$element.on(this._handlers),
                this._core.$element.on(
                    "click.owl.video",
                    ".owl-video-play-icon",
                    a.proxy(function (a) {
                        this.play(a);
                    }, this),
                );
        };
        (e.Defaults = {
            video: !1,
            videoHeight: !1,
            videoWidth: !1,
        }),
            (e.prototype.fetch = function (a, b) {
                var c = (function () {
                        return a.attr("data-vimeo-id")
                            ? "vimeo"
                            : a.attr("data-vzaar-id")
                              ? "vzaar"
                              : "youtube";
                    })(),
                    d =
                        a.attr("data-vimeo-id") ||
                        a.attr("data-youtube-id") ||
                        a.attr("data-vzaar-id"),
                    e = a.attr("data-width") || this._core.settings.videoWidth,
                    f =
                        a.attr("data-height") ||
                        this._core.settings.videoHeight,
                    g = a.attr("href");
                if (!g) throw new Error("Missing video URL.");
                if (
                    ((d = g.match(
                        /(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com|be\-nocookie\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/,
                    )),
                    d[3].indexOf("youtu") > -1)
                )
                    c = "youtube";
                else if (d[3].indexOf("vimeo") > -1) c = "vimeo";
                else {
                    if (!(d[3].indexOf("vzaar") > -1))
                        throw new Error("Video URL not supported.");
                    c = "vzaar";
                }
                (d = d[6]),
                    (this._videos[g] = {
                        type: c,
                        id: d,
                        width: e,
                        height: f,
                    }),
                    b.attr("data-video", g),
                    this.thumbnail(a, this._videos[g]);
            }),
            (e.prototype.thumbnail = function (b, c) {
                var d,
                    e,
                    f,
                    g =
                        c.width && c.height
                            ? "width:" +
                              c.width +
                              "px;height:" +
                              c.height +
                              "px;"
                            : "",
                    h = b.find("img"),
                    i = "src",
                    j = "",
                    k = this._core.settings,
                    l = function (c) {
                        (e = '<div class="owl-video-play-icon"></div>'),
                            (d = k.lazyLoad
                                ? a("<div/>", {
                                      class: "owl-video-tn " + j,
                                      srcType: c,
                                  })
                                : a("<div/>", {
                                      class: "owl-video-tn",
                                      style:
                                          "opacity:1;background-image:url(" +
                                          c +
                                          ")",
                                  })),
                            b.after(d),
                            b.after(e);
                    };
                if (
                    (b.wrap(
                        a("<div/>", {
                            class: "owl-video-wrapper",
                            style: g,
                        }),
                    ),
                    this._core.settings.lazyLoad &&
                        ((i = "data-src"), (j = "owl-lazy")),
                    h.length)
                )
                    return l(h.attr(i)), h.remove(), !1;
                "youtube" === c.type
                    ? ((f = "//img.youtube.com/vi/" + c.id + "/hqdefault.jpg"),
                      l(f))
                    : "vimeo" === c.type
                      ? a.ajax({
                            type: "GET",
                            url: "//vimeo.com/api/v2/video/" + c.id + ".json",
                            jsonp: "callback",
                            dataType: "jsonp",
                            success: function (a) {
                                (f = a[0].thumbnail_large), l(f);
                            },
                        })
                      : "vzaar" === c.type &&
                        a.ajax({
                            type: "GET",
                            url: "//vzaar.com/api/videos/" + c.id + ".json",
                            jsonp: "callback",
                            dataType: "jsonp",
                            success: function (a) {
                                (f = a.framegrab_url), l(f);
                            },
                        });
            }),
            (e.prototype.stop = function () {
                this._core.trigger("stop", null, "video"),
                    this._playing.find(".owl-video-frame").remove(),
                    this._playing.removeClass("owl-video-playing"),
                    (this._playing = null),
                    this._core.leave("playing"),
                    this._core.trigger("stopped", null, "video");
            }),
            (e.prototype.play = function (b) {
                var c,
                    d = a(b.target),
                    e = d.closest("." + this._core.settings.itemClass),
                    f = this._videos[e.attr("data-video")],
                    g = f.width || "100%",
                    h = f.height || this._core.$stage.height();
                this._playing ||
                    (this._core.enter("playing"),
                    this._core.trigger("play", null, "video"),
                    (e = this._core.items(this._core.relative(e.index()))),
                    this._core.reset(e.index()),
                    (c = a(
                        '<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>',
                    )),
                    c.attr("height", h),
                    c.attr("width", g),
                    "youtube" === f.type
                        ? c.attr(
                              "src",
                              "//www.youtube.com/embed/" +
                                  f.id +
                                  "?autoplay=1&rel=0&v=" +
                                  f.id,
                          )
                        : "vimeo" === f.type
                          ? c.attr(
                                "src",
                                "//player.vimeo.com/video/" +
                                    f.id +
                                    "?autoplay=1",
                            )
                          : "vzaar" === f.type &&
                            c.attr(
                                "src",
                                "//view.vzaar.com/" +
                                    f.id +
                                    "/player?autoplay=true",
                            ),
                    a(c)
                        .wrap('<div class="owl-video-frame" />')
                        .insertAfter(e.find(".owl-video")),
                    (this._playing = e.addClass("owl-video-playing")));
            }),
            (e.prototype.isInFullScreen = function () {
                var b =
                    c.fullscreenElement ||
                    c.mozFullScreenElement ||
                    c.webkitFullscreenElement;
                return b && a(b).parent().hasClass("owl-video-frame");
            }),
            (e.prototype.destroy = function () {
                var a, b;
                this._core.$element.off("click.owl.video");
                for (a in this._handlers)
                    this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this))
                    "function" != typeof this[b] && (this[b] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.Video = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (b) {
            (this.core = b),
                (this.core.options = a.extend(
                    {},
                    e.Defaults,
                    this.core.options,
                )),
                (this.swapping = !0),
                (this.previous = d),
                (this.next = d),
                (this.handlers = {
                    "change.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            "position" == a.property.name &&
                            ((this.previous = this.core.current()),
                            (this.next = a.property.value));
                    }, this),
                    "drag.owl.carousel dragged.owl.carousel translated.owl.carousel":
                        a.proxy(function (a) {
                            a.namespace &&
                                (this.swapping = "translated" == a.type);
                        }, this),
                    "translate.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this.swapping &&
                            (this.core.options.animateOut ||
                                this.core.options.animateIn) &&
                            this.swap();
                    }, this),
                }),
                this.core.$element.on(this.handlers);
        };
        (e.Defaults = {
            animateOut: !1,
            animateIn: !1,
        }),
            (e.prototype.swap = function () {
                if (
                    1 === this.core.settings.items &&
                    a.support.animation &&
                    a.support.transition
                ) {
                    this.core.speed(0);
                    var b,
                        c = a.proxy(this.clear, this),
                        d = this.core.$stage.children().eq(this.previous),
                        e = this.core.$stage.children().eq(this.next),
                        f = this.core.settings.animateIn,
                        g = this.core.settings.animateOut;
                    this.core.current() !== this.previous &&
                        (g &&
                            ((b =
                                this.core.coordinates(this.previous) -
                                this.core.coordinates(this.next)),
                            d
                                .one(a.support.animation.end, c)
                                .css({
                                    left: b + "px",
                                })
                                .addClass("animated owl-animated-out")
                                .addClass(g)),
                        f &&
                            e
                                .one(a.support.animation.end, c)
                                .addClass("animated owl-animated-in")
                                .addClass(f));
                }
            }),
            (e.prototype.clear = function (b) {
                a(b.target)
                    .css({
                        left: "",
                    })
                    .removeClass("animated owl-animated-out owl-animated-in")
                    .removeClass(this.core.settings.animateIn)
                    .removeClass(this.core.settings.animateOut),
                    this.core.onTransitionEnd();
            }),
            (e.prototype.destroy = function () {
                var a, b;
                for (a in this.handlers)
                    this.core.$element.off(a, this.handlers[a]);
                for (b in Object.getOwnPropertyNames(this))
                    "function" != typeof this[b] && (this[b] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.Animate = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        var e = function (b) {
            (this._core = b),
                (this._call = null),
                (this._time = 0),
                (this._timeout = 0),
                (this._paused = !0),
                (this._handlers = {
                    "changed.owl.carousel": a.proxy(function (a) {
                        a.namespace && "settings" === a.property.name
                            ? this._core.settings.autoplay
                                ? this.play()
                                : this.stop()
                            : a.namespace &&
                              "position" === a.property.name &&
                              this._paused &&
                              (this._time = 0);
                    }, this),
                    "initialized.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.autoplay &&
                            this.play();
                    }, this),
                    "play.owl.autoplay": a.proxy(function (a, b, c) {
                        a.namespace && this.play(b, c);
                    }, this),
                    "stop.owl.autoplay": a.proxy(function (a) {
                        a.namespace && this.stop();
                    }, this),
                    "mouseover.owl.autoplay": a.proxy(function () {
                        this._core.settings.autoplayHoverPause &&
                            this._core.is("rotating") &&
                            this.pause();
                    }, this),
                    "mouseleave.owl.autoplay": a.proxy(function () {
                        this._core.settings.autoplayHoverPause &&
                            this._core.is("rotating") &&
                            this.play();
                    }, this),
                    "touchstart.owl.core": a.proxy(function () {
                        this._core.settings.autoplayHoverPause &&
                            this._core.is("rotating") &&
                            this.pause();
                    }, this),
                    "touchend.owl.core": a.proxy(function () {
                        this._core.settings.autoplayHoverPause && this.play();
                    }, this),
                }),
                this._core.$element.on(this._handlers),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                ));
        };
        (e.Defaults = {
            autoplay: !1,
            autoplayTimeout: 5e3,
            autoplayHoverPause: !1,
            autoplaySpeed: !1,
        }),
            (e.prototype._next = function (d) {
                (this._call = b.setTimeout(
                    a.proxy(this._next, this, d),
                    this._timeout *
                        (Math.round(this.read() / this._timeout) + 1) -
                        this.read(),
                )),
                    this._core.is("interacting") ||
                        c.hidden ||
                        this._core.next(d || this._core.settings.autoplaySpeed);
            }),
            (e.prototype.read = function () {
                return new Date().getTime() - this._time;
            }),
            (e.prototype.play = function (c, d) {
                var e;
                this._core.is("rotating") || this._core.enter("rotating"),
                    (c = c || this._core.settings.autoplayTimeout),
                    (e = Math.min(this._time % (this._timeout || c), c)),
                    this._paused
                        ? ((this._time = this.read()), (this._paused = !1))
                        : b.clearTimeout(this._call),
                    (this._time += (this.read() % c) - e),
                    (this._timeout = c),
                    (this._call = b.setTimeout(
                        a.proxy(this._next, this, d),
                        c - e,
                    ));
            }),
            (e.prototype.stop = function () {
                this._core.is("rotating") &&
                    ((this._time = 0),
                    (this._paused = !0),
                    b.clearTimeout(this._call),
                    this._core.leave("rotating"));
            }),
            (e.prototype.pause = function () {
                this._core.is("rotating") &&
                    !this._paused &&
                    ((this._time = this.read()),
                    (this._paused = !0),
                    b.clearTimeout(this._call));
            }),
            (e.prototype.destroy = function () {
                var a, b;
                this.stop();
                for (a in this._handlers)
                    this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this))
                    "function" != typeof this[b] && (this[b] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.autoplay = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        "use strict";
        var e = function (b) {
            (this._core = b),
                (this._initialized = !1),
                (this._pages = []),
                (this._controls = {}),
                (this._templates = []),
                (this.$element = this._core.$element),
                (this._overrides = {
                    next: this._core.next,
                    prev: this._core.prev,
                    to: this._core.to,
                }),
                (this._handlers = {
                    "prepared.owl.carousel": a.proxy(function (b) {
                        b.namespace &&
                            this._core.settings.dotsData &&
                            this._templates.push(
                                '<div class="' +
                                    this._core.settings.dotClass +
                                    '">' +
                                    a(b.content)
                                        .find("[data-dot]")
                                        .addBack("[data-dot]")
                                        .attr("data-dot") +
                                    "</div>",
                            );
                    }, this),
                    "added.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.dotsData &&
                            this._templates.splice(
                                a.position,
                                0,
                                this._templates.pop(),
                            );
                    }, this),
                    "remove.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._core.settings.dotsData &&
                            this._templates.splice(a.position, 1);
                    }, this),
                    "changed.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            "position" == a.property.name &&
                            this.draw();
                    }, this),
                    "initialized.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            !this._initialized &&
                            (this._core.trigger(
                                "initialize",
                                null,
                                "navigation",
                            ),
                            this.initialize(),
                            this.update(),
                            this.draw(),
                            (this._initialized = !0),
                            this._core.trigger(
                                "initialized",
                                null,
                                "navigation",
                            ));
                    }, this),
                    "refreshed.owl.carousel": a.proxy(function (a) {
                        a.namespace &&
                            this._initialized &&
                            (this._core.trigger("refresh", null, "navigation"),
                            this.update(),
                            this.draw(),
                            this._core.trigger(
                                "refreshed",
                                null,
                                "navigation",
                            ));
                    }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this.$element.on(this._handlers);
        };
        (e.Defaults = {
            nav: !1,
            navText: [
                '<span aria-label="Previous">&#x2039;</span>',
                '<span aria-label="Next">&#x203a;</span>',
            ],
            navSpeed: !1,
            navElement: 'button type="button" role="presentation"',
            navContainer: !1,
            navContainerClass: "owl-nav",
            navClass: ["owl-prev", "owl-next"],
            slideBy: 1,
            dotClass: "owl-dot",
            dotsClass: "owl-dots",
            dots: !0,
            dotsEach: !1,
            dotsData: !1,
            dotsSpeed: !1,
            dotsContainer: !1,
        }),
            (e.prototype.initialize = function () {
                var b,
                    c = this._core.settings;
                (this._controls.$relative = (
                    c.navContainer
                        ? a(c.navContainer)
                        : a("<div>")
                              .addClass(c.navContainerClass)
                              .appendTo(this.$element)
                ).addClass("disabled")),
                    (this._controls.$previous = a("<" + c.navElement + ">")
                        .addClass(c.navClass[0])
                        .html(c.navText[0])
                        .prependTo(this._controls.$relative)
                        .on(
                            "click",
                            a.proxy(function (a) {
                                this.prev(c.navSpeed);
                            }, this),
                        )),
                    (this._controls.$next = a("<" + c.navElement + ">")
                        .addClass(c.navClass[1])
                        .html(c.navText[1])
                        .appendTo(this._controls.$relative)
                        .on(
                            "click",
                            a.proxy(function (a) {
                                this.next(c.navSpeed);
                            }, this),
                        )),
                    c.dotsData ||
                        (this._templates = [
                            a('<button role="button">')
                                .addClass(c.dotClass)
                                .append(a("<span>"))
                                .prop("outerHTML"),
                        ]),
                    (this._controls.$absolute = (
                        c.dotsContainer
                            ? a(c.dotsContainer)
                            : a("<div>")
                                  .addClass(c.dotsClass)
                                  .appendTo(this.$element)
                    ).addClass("disabled")),
                    this._controls.$absolute.on(
                        "click",
                        "button",
                        a.proxy(function (b) {
                            var d = a(b.target)
                                .parent()
                                .is(this._controls.$absolute)
                                ? a(b.target).index()
                                : a(b.target).parent().index();
                            b.preventDefault(), this.to(d, c.dotsSpeed);
                        }, this),
                    );
                for (b in this._overrides)
                    this._core[b] = a.proxy(this[b], this);
            }),
            (e.prototype.destroy = function () {
                var a, b, c, d, e;
                e = this._core.settings;
                for (a in this._handlers)
                    this.$element.off(a, this._handlers[a]);
                for (b in this._controls)
                    "$relative" === b && e.navContainer
                        ? this._controls[b].html("")
                        : this._controls[b].remove();
                for (d in this.overides) this._core[d] = this._overrides[d];
                for (c in Object.getOwnPropertyNames(this))
                    "function" != typeof this[c] && (this[c] = null);
            }),
            (e.prototype.update = function () {
                var a,
                    b,
                    c,
                    d = this._core.clones().length / 2,
                    e = d + this._core.items().length,
                    f = this._core.maximum(!0),
                    g = this._core.settings,
                    h =
                        g.center || g.autoWidth || g.dotsData
                            ? 1
                            : g.dotsEach || g.items;
                if (
                    ("page" !== g.slideBy &&
                        (g.slideBy = Math.min(g.slideBy, g.items)),
                    g.dots || "page" == g.slideBy)
                )
                    for (this._pages = [], a = d, b = 0, c = 0; a < e; a++) {
                        if (b >= h || 0 === b) {
                            if (
                                (this._pages.push({
                                    start: Math.min(f, a - d),
                                    end: a - d + h - 1,
                                }),
                                Math.min(f, a - d) === f)
                            )
                                break;
                            (b = 0), ++c;
                        }
                        b += this._core.mergers(this._core.relative(a));
                    }
            }),
            (e.prototype.draw = function () {
                var b,
                    c = this._core.settings,
                    d = this._core.items().length <= c.items,
                    e = this._core.relative(this._core.current()),
                    f = c.loop || c.rewind;
                this._controls.$relative.toggleClass("disabled", !c.nav || d),
                    c.nav &&
                        (this._controls.$previous.toggleClass(
                            "disabled",
                            !f && e <= this._core.minimum(!0),
                        ),
                        this._controls.$next.toggleClass(
                            "disabled",
                            !f && e >= this._core.maximum(!0),
                        )),
                    this._controls.$absolute.toggleClass(
                        "disabled",
                        !c.dots || d,
                    ),
                    c.dots &&
                        ((b =
                            this._pages.length -
                            this._controls.$absolute.children().length),
                        c.dotsData && 0 !== b
                            ? this._controls.$absolute.html(
                                  this._templates.join(""),
                              )
                            : b > 0
                              ? this._controls.$absolute.append(
                                    new Array(b + 1).join(this._templates[0]),
                                )
                              : b < 0 &&
                                this._controls.$absolute
                                    .children()
                                    .slice(b)
                                    .remove(),
                        this._controls.$absolute
                            .find(".active")
                            .removeClass("active"),
                        this._controls.$absolute
                            .children()
                            .eq(a.inArray(this.current(), this._pages))
                            .addClass("active"));
            }),
            (e.prototype.onTrigger = function (b) {
                var c = this._core.settings;
                b.page = {
                    index: a.inArray(this.current(), this._pages),
                    count: this._pages.length,
                    size:
                        c &&
                        (c.center || c.autoWidth || c.dotsData
                            ? 1
                            : c.dotsEach || c.items),
                };
            }),
            (e.prototype.current = function () {
                var b = this._core.relative(this._core.current());
                return a
                    .grep(
                        this._pages,
                        a.proxy(function (a, c) {
                            return a.start <= b && a.end >= b;
                        }, this),
                    )
                    .pop();
            }),
            (e.prototype.getPosition = function (b) {
                var c,
                    d,
                    e = this._core.settings;
                return (
                    "page" == e.slideBy
                        ? ((c = a.inArray(this.current(), this._pages)),
                          (d = this._pages.length),
                          b ? ++c : --c,
                          (c = this._pages[((c % d) + d) % d].start))
                        : ((c = this._core.relative(this._core.current())),
                          (d = this._core.items().length),
                          b ? (c += e.slideBy) : (c -= e.slideBy)),
                    c
                );
            }),
            (e.prototype.next = function (b) {
                a.proxy(this._overrides.to, this._core)(
                    this.getPosition(!0),
                    b,
                );
            }),
            (e.prototype.prev = function (b) {
                a.proxy(this._overrides.to, this._core)(
                    this.getPosition(!1),
                    b,
                );
            }),
            (e.prototype.to = function (b, c, d) {
                var e;
                !d && this._pages.length
                    ? ((e = this._pages.length),
                      a.proxy(this._overrides.to, this._core)(
                          this._pages[((b % e) + e) % e].start,
                          c,
                      ))
                    : a.proxy(this._overrides.to, this._core)(b, c);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.Navigation = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        "use strict";
        var e = function (c) {
            (this._core = c),
                (this._hashes = {}),
                (this.$element = this._core.$element),
                (this._handlers = {
                    "initialized.owl.carousel": a.proxy(function (c) {
                        c.namespace &&
                            "URLHash" === this._core.settings.startPosition &&
                            a(b).trigger("hashchange.owl.navigation");
                    }, this),
                    "prepared.owl.carousel": a.proxy(function (b) {
                        if (b.namespace) {
                            var c = a(b.content)
                                .find("[data-hash]")
                                .addBack("[data-hash]")
                                .attr("data-hash");
                            if (!c) return;
                            this._hashes[c] = b.content;
                        }
                    }, this),
                    "changed.owl.carousel": a.proxy(function (c) {
                        if (c.namespace && "position" === c.property.name) {
                            var d = this._core.items(
                                    this._core.relative(this._core.current()),
                                ),
                                e = a
                                    .map(this._hashes, function (a, b) {
                                        return a === d ? b : null;
                                    })
                                    .join();
                            if (!e || b.location.hash.slice(1) === e) return;
                            b.location.hash = e;
                        }
                    }, this),
                }),
                (this._core.options = a.extend(
                    {},
                    e.Defaults,
                    this._core.options,
                )),
                this.$element.on(this._handlers),
                a(b).on(
                    "hashchange.owl.navigation",
                    a.proxy(function (a) {
                        var c = b.location.hash.substring(1),
                            e = this._core.$stage.children(),
                            f = this._hashes[c] && e.index(this._hashes[c]);
                        f !== d &&
                            f !== this._core.current() &&
                            this._core.to(this._core.relative(f), !1, !0);
                    }, this),
                );
        };
        (e.Defaults = {
            URLhashListener: !1,
        }),
            (e.prototype.destroy = function () {
                var c, d;
                a(b).off("hashchange.owl.navigation");
                for (c in this._handlers)
                    this._core.$element.off(c, this._handlers[c]);
                for (d in Object.getOwnPropertyNames(this))
                    "function" != typeof this[d] && (this[d] = null);
            }),
            (a.fn.owlCarousel.Constructor.Plugins.Hash = e);
    })(window.Zepto || window.jQuery, window, document),
    (function (a, b, c, d) {
        function e(b, c) {
            var e = !1,
                f = b.charAt(0).toUpperCase() + b.slice(1);
            return (
                a.each(
                    (b + " " + h.join(f + " ") + f).split(" "),
                    function (a, b) {
                        if (g[b] !== d) return (e = !c || b), !1;
                    },
                ),
                e
            );
        }

        function f(a) {
            return e(a, !0);
        }
        var g = a("<support>").get(0).style,
            h = "Webkit Moz O ms".split(" "),
            i = {
                transition: {
                    end: {
                        WebkitTransition: "webkitTransitionEnd",
                        MozTransition: "transitionend",
                        OTransition: "oTransitionEnd",
                        transition: "transitionend",
                    },
                },
                animation: {
                    end: {
                        WebkitAnimation: "webkitAnimationEnd",
                        MozAnimation: "animationend",
                        OAnimation: "oAnimationEnd",
                        animation: "animationend",
                    },
                },
            },
            j = {
                csstransforms: function () {
                    return !!e("transform");
                },
                csstransforms3d: function () {
                    return !!e("perspective");
                },
                csstransitions: function () {
                    return !!e("transition");
                },
                cssanimations: function () {
                    return !!e("animation");
                },
            };
        j.csstransitions() &&
            ((a.support.transition = new String(f("transition"))),
            (a.support.transition.end =
                i.transition.end[a.support.transition])),
            j.cssanimations() &&
                ((a.support.animation = new String(f("animation"))),
                (a.support.animation.end =
                    i.animation.end[a.support.animation])),
            j.csstransforms() &&
                ((a.support.transform = new String(f("transform"))),
                (a.support.transform3d = j.csstransforms3d()));
    })(window.Zepto || window.jQuery, window, document);
/* ========================================================== */

/*! owl.carousel2.thumbs - v0.1.8 | (c) 2016 @gijsroge | MIT license | https://github.com/gijsroge/OwlCarousel2-Thumbs */
!(function (a, b, c, d) {
    "use strict";
    var e = function (b) {
        (this.owl = b),
            (this._thumbcontent = []),
            (this._identifier = 0),
            (this.owl_currentitem = this.owl.options.startPosition),
            (this.$element = this.owl.$element),
            (this._handlers = {
                "prepared.owl.carousel": a.proxy(function (b) {
                    if (
                        !b.namespace ||
                        !this.owl.options.thumbs ||
                        this.owl.options.thumbImage ||
                        this.owl.options.thumbsPrerendered ||
                        this.owl.options.thumbImage
                    ) {
                        if (
                            b.namespace &&
                            this.owl.options.thumbs &&
                            this.owl.options.thumbImage
                        ) {
                            var c = a(b.content).find("img");
                            this._thumbcontent.push(c);
                        }
                    } else
                        a(b.content).find("[data-thumb]").attr("data-thumb") !==
                            d &&
                            this._thumbcontent.push(
                                a(b.content)
                                    .find("[data-thumb]")
                                    .attr("data-thumb"),
                            );
                }, this),
                "initialized.owl.carousel": a.proxy(function (a) {
                    a.namespace &&
                        this.owl.options.thumbs &&
                        (this.render(),
                        this.listen(),
                        (this._identifier =
                            this.owl.$element.data("slider-id")),
                        this.setActive());
                }, this),
                "changed.owl.carousel": a.proxy(function (a) {
                    a.namespace &&
                        "position" === a.property.name &&
                        this.owl.options.thumbs &&
                        ((this._identifier =
                            this.owl.$element.data("slider-id")),
                        this.setActive());
                }, this),
            }),
            (this.owl.options = a.extend({}, e.Defaults, this.owl.options)),
            this.owl.$element.on(this._handlers);
    };
    (e.Defaults = {
        thumbs: !0,
        thumbImage: !1,
        thumbContainerClass: "owl-thumbs",
        thumbItemClass: "owl-thumb-item",
        moveThumbsInside: !1,
    }),
        (e.prototype.listen = function () {
            var b = this.owl.options;
            b.thumbsPrerendered &&
                (this._thumbcontent._thumbcontainer = a(
                    "." + b.thumbContainerClass,
                )),
                a(this._thumbcontent._thumbcontainer).on(
                    "click",
                    this._thumbcontent._thumbcontainer.children(),
                    a.proxy(function (c) {
                        this._identifier = a(c.target)
                            .closest("." + b.thumbContainerClass)
                            .data("slider-id");
                        var d = a(c.target)
                            .parent()
                            .is(this._thumbcontent._thumbcontainer)
                            ? a(c.target).index()
                            : a(c.target)
                                  .closest("." + b.thumbItemClass)
                                  .index();
                        b.thumbsPrerendered
                            ? a(
                                  "[data-slider-id=" + this._identifier + "]",
                              ).trigger("to.owl.carousel", [d, b.dotsSpeed, !0])
                            : this.owl.to(d, b.dotsSpeed),
                            c.preventDefault();
                    }, this),
                );
        }),
        (e.prototype.render = function () {
            var b = this.owl.options;
            b.thumbsPrerendered
                ? ((this._thumbcontent._thumbcontainer = a(
                      "." + b.thumbContainerClass,
                  )),
                  b.moveThumbsInside &&
                      this._thumbcontent._thumbcontainer.appendTo(
                          this.$element,
                      ))
                : (this._thumbcontent._thumbcontainer = a("<div>")
                      .addClass(b.thumbContainerClass)
                      .appendTo(this.$element));
            var c;
            if (b.thumbImage)
                for (c = 0; c < this._thumbcontent.length; ++c)
                    this._thumbcontent._thumbcontainer.append(
                        "<button class=" +
                            b.thumbItemClass +
                            '><img src="' +
                            this._thumbcontent[c].attr("src") +
                            '" alt="' +
                            this._thumbcontent[c].attr("alt") +
                            '" /></button>',
                    );
            else
                for (c = 0; c < this._thumbcontent.length; ++c)
                    this._thumbcontent._thumbcontainer.append(
                        "<button class=" +
                            b.thumbItemClass +
                            ">" +
                            this._thumbcontent[c] +
                            "</button>",
                    );
        }),
        (e.prototype.setActive = function () {
            (this.owl_currentitem =
                this.owl._current - this.owl._clones.length / 2),
                this.owl_currentitem === this.owl._items.length &&
                    (this.owl_currentitem = 0);
            var b = this.owl.options,
                c = b.thumbsPrerendered
                    ? a(
                          "." +
                              b.thumbContainerClass +
                              '[data-slider-id="' +
                              this._identifier +
                              '"]',
                      )
                    : this._thumbcontent._thumbcontainer;
            c.children().filter(".active").removeClass("active"),
                c.children().eq(this.owl_currentitem).addClass("active");
        }),
        (e.prototype.destroy = function () {
            var a, b;
            for (a in this._handlers)
                this.owl.$element.off(a, this._handlers[a]);
            for (b in Object.getOwnPropertyNames(this))
                "function" != typeof this[b] && (this[b] = null);
        }),
        (a.fn.owlCarousel.Constructor.Plugins.Thumbs = e);
})(window.Zepto || window.jQuery, window, document);

function _extends() {
    return (_extends =
        Object.assign ||
        function (t) {
            for (var e = 1; e < arguments.length; e++) {
                var n = arguments[e];
                for (var o in n)
                    Object.prototype.hasOwnProperty.call(n, o) && (t[o] = n[o]);
            }
            return t;
        }).apply(this, arguments);
}

function _typeof(t) {
    return (_typeof =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (t) {
                  return typeof t;
              }
            : function (t) {
                  return t &&
                      "function" == typeof Symbol &&
                      t.constructor === Symbol &&
                      t !== Symbol.prototype
                      ? "symbol"
                      : typeof t;
              })(t);
}
!(function (t, e) {
    "object" ===
        ("undefined" == typeof exports ? "undefined" : _typeof(exports)) &&
    "undefined" != typeof module
        ? (module.exports = e())
        : "function" == typeof define && define.amd
          ? define(e)
          : (t.LazyLoad = e());
})(this, function () {
    "use strict";
    var t = "undefined" != typeof window,
        e =
            (t && !("onscroll" in window)) ||
            ("undefined" != typeof navigator &&
                /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent)),
        n = t && "IntersectionObserver" in window,
        o = t && "classList" in document.createElement("p"),
        r = {
            elements_selector: "img",
            container: e || t ? document : null,
            threshold: 300,
            thresholds: null,
            data_src: "src",
            data_srcset: "srcset",
            data_sizes: "sizes",
            data_bg: "bg",
            class_loading: "loading",
            class_loaded: "loaded",
            class_error: "error",
            load_delay: 0,
            auto_unobserve: !0,
            callback_enter: null,
            callback_exit: null,
            callback_reveal: null,
            callback_loaded: null,
            callback_error: null,
            callback_finish: null,
        },
        a = function (t, e) {
            return t.getAttribute("data-" + e);
        },
        s = function (t, e, n) {
            var o = "data-" + e;
            null !== n ? t.setAttribute(o, n) : t.removeAttribute(o);
        },
        i = function (t) {
            return "true" === a(t, "was-processed");
        },
        c = function (t, e) {
            return s(t, "ll-timeout", e);
        },
        l = function (t) {
            return a(t, "ll-timeout");
        },
        u = function (t, e) {
            var n,
                o = new t(e);
            try {
                n = new CustomEvent("LazyLoad::Initialized", {
                    detail: {
                        instance: o,
                    },
                });
            } catch (t) {
                (n = document.createEvent("CustomEvent")).initCustomEvent(
                    "LazyLoad::Initialized",
                    !1,
                    !1,
                    {
                        instance: o,
                    },
                );
            }
            window.dispatchEvent(n);
        };
    var d = function (t, e) {
            t && t(e);
        },
        f = function (t, e) {
            (t._loadingCount += e),
                0 === t._elements.length &&
                    0 === t._loadingCount &&
                    d(t._settings.callback_finish);
        },
        _ = function (t) {
            for (var e, n = [], o = 0; (e = t.children[o]); o += 1)
                "SOURCE" === e.tagName && n.push(e);
            return n;
        },
        v = function (t, e, n) {
            n && t.setAttribute(e, n);
        },
        b = function (t, e) {
            v(t, "sizes", a(t, e.data_sizes)),
                v(t, "srcset", a(t, e.data_srcset)),
                v(t, "src", a(t, e.data_src));
        },
        g = {
            IMG: function (t, e) {
                var n = t.parentNode;
                n &&
                    "PICTURE" === n.tagName &&
                    _(n).forEach(function (t) {
                        b(t, e);
                    });
                b(t, e);
            },
            IFRAME: function (t, e) {
                v(t, "src", a(t, e.data_src));
            },
            VIDEO: function (t, e) {
                _(t).forEach(function (t) {
                    v(t, "src", a(t, e.data_src));
                }),
                    v(t, "src", a(t, e.data_src)),
                    t.load();
            },
        },
        m = function (t, e) {
            var n,
                o,
                r = e._settings,
                s = t.tagName,
                i = g[s];
            if (i)
                return (
                    i(t, r),
                    f(e, 1),
                    void (e._elements =
                        ((n = e._elements),
                        (o = t),
                        n.filter(function (t) {
                            return t !== o;
                        })))
                );
            !(function (t, e) {
                var n = a(t, e.data_src),
                    o = a(t, e.data_bg);
                n && (t.style.backgroundImage = 'url("'.concat(n, '")')),
                    o && (t.style.backgroundImage = o);
            })(t, r);
        },
        h = function (t, e) {
            o
                ? t.classList.add(e)
                : (t.className += (t.className ? " " : "") + e);
        },
        p = function (t, e, n) {
            t.addEventListener(e, n);
        },
        y = function (t, e, n) {
            t.removeEventListener(e, n);
        },
        E = function (t, e, n) {
            y(t, "load", e), y(t, "loadeddata", e), y(t, "error", n);
        },
        w = function (t, e, n) {
            var r = n._settings,
                a = e ? r.class_loaded : r.class_error,
                s = e ? r.callback_loaded : r.callback_error,
                i = t.target;
            !(function (t, e) {
                o
                    ? t.classList.remove(e)
                    : (t.className = t.className
                          .replace(new RegExp("(^|\\s+)" + e + "(\\s+|$)"), " ")
                          .replace(/^\s+/, "")
                          .replace(/\s+$/, ""));
            })(i, r.class_loading),
                h(i, a),
                d(s, i),
                f(n, -1);
        },
        k = function (t, e) {
            var n = function n(r) {
                    w(r, !0, e), E(t, n, o);
                },
                o = function o(r) {
                    w(r, !1, e), E(t, n, o);
                };
            !(function (t, e, n) {
                p(t, "load", e), p(t, "loadeddata", e), p(t, "error", n);
            })(t, n, o);
        },
        I = ["IMG", "IFRAME", "VIDEO"],
        L = function (t, e) {
            var n = e._observer;
            z(t, e), n && e._settings.auto_unobserve && n.unobserve(t);
        },
        x = function (t) {
            var e = l(t);
            e && (clearTimeout(e), c(t, null));
        },
        A = function (t, e) {
            var n = e._settings.load_delay,
                o = l(t);
            o ||
                ((o = setTimeout(function () {
                    L(t, e), x(t);
                }, n)),
                c(t, o));
        },
        z = function (t, e, n) {
            var o = e._settings;
            (!n && i(t)) ||
                (I.indexOf(t.tagName) > -1 && (k(t, e), h(t, o.class_loading)),
                m(t, e),
                (function (t) {
                    s(t, "was-processed", "true");
                })(t),
                d(o.callback_reveal, t),
                d(o.callback_set, t));
        },
        O = function (t) {
            return (
                !!n &&
                ((t._observer = new IntersectionObserver(
                    function (e) {
                        e.forEach(function (e) {
                            return (function (t) {
                                return (
                                    t.isIntersecting || t.intersectionRatio > 0
                                );
                            })(e)
                                ? (function (t, e) {
                                      var n = e._settings;
                                      d(n.callback_enter, t),
                                          n.load_delay ? A(t, e) : L(t, e);
                                  })(e.target, t)
                                : (function (t, e) {
                                      var n = e._settings;
                                      d(n.callback_exit, t),
                                          n.load_delay && x(t);
                                  })(e.target, t);
                        });
                    },
                    {
                        root:
                            (e = t._settings).container === document
                                ? null
                                : e.container,
                        rootMargin: e.thresholds || e.threshold + "px",
                    },
                )),
                !0)
            );
            var e;
        },
        N = function (t, e) {
            (this._settings = (function (t) {
                return _extends({}, r, t);
            })(t)),
                (this._loadingCount = 0),
                O(this),
                this.update(e);
        };
    return (
        (N.prototype = {
            update: function (t) {
                var n = this,
                    o = this._settings,
                    r = t || o.container.querySelectorAll(o.elements_selector);
                (this._elements = (function (t) {
                    return t.filter(function (t) {
                        return !i(t);
                    });
                })(Array.prototype.slice.call(r))),
                    !e && this._observer
                        ? this._elements.forEach(function (t) {
                              n._observer.observe(t);
                          })
                        : this.loadAll();
            },
            destroy: function () {
                var t = this;
                this._observer &&
                    (this._elements.forEach(function (e) {
                        t._observer.unobserve(e);
                    }),
                    (this._observer = null)),
                    (this._elements = null),
                    (this._settings = null);
            },
            load: function (t, e) {
                z(t, this, e);
            },
            loadAll: function () {
                var t = this;
                this._elements.forEach(function (e) {
                    L(e, t);
                });
            },
        }),
        t &&
            (function (t, e) {
                if (e)
                    if (e.length)
                        for (var n, o = 0; (n = e[o]); o += 1) u(t, n);
                    else u(t, e);
            })(N, window.lazyLoadOptions),
        N
    );
});
//# sourceMappingURL=lazyload.min.js.map

//Cookie
!(function (a) {
    "function" == typeof define && define.amd
        ? define(["jquery"], a)
        : "object" == typeof exports
          ? a(require("jquery"))
          : a(jQuery);
})(function (a) {
    function b(a) {
        return h.raw ? a : encodeURIComponent(a);
    }

    function c(a) {
        return h.raw ? a : decodeURIComponent(a);
    }

    function d(a) {
        return b(h.json ? JSON.stringify(a) : String(a));
    }

    function e(a) {
        0 === a.indexOf('"') &&
            (a = a.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return (
                (a = decodeURIComponent(a.replace(g, " "))),
                h.json ? JSON.parse(a) : a
            );
        } catch (b) {}
    }

    function f(b, c) {
        var d = h.raw ? b : e(b);
        return a.isFunction(c) ? c(d) : d;
    }
    var g = /\+/g,
        h = (a.cookie = function (e, g, i) {
            if (void 0 !== g && !a.isFunction(g)) {
                if (
                    ((i = a.extend({}, h.defaults, i)),
                    "number" == typeof i.expires)
                ) {
                    var j = i.expires,
                        k = (i.expires = new Date());
                    k.setTime(+k + 864e5 * j);
                }
                return (document.cookie = [
                    b(e),
                    "=",
                    d(g),
                    i.expires ? "; expires=" + i.expires.toUTCString() : "",
                    i.path ? "; path=" + i.path : "",
                    i.domain ? "; domain=" + i.domain : "",
                    i.secure ? "; secure" : "",
                ].join(""));
            }
            for (
                var l = e ? void 0 : {},
                    m = document.cookie ? document.cookie.split("; ") : [],
                    n = 0,
                    o = m.length;
                o > n;
                n++
            ) {
                var p = m[n].split("="),
                    q = c(p.shift()),
                    r = p.join("=");
                if (e && e === q) {
                    l = f(r, g);
                    break;
                }
                e || void 0 === (r = f(r)) || (l[q] = r);
            }
            return l;
        });
    (h.defaults = {}),
        (a.removeCookie = function (b, c) {
            return void 0 === a.cookie(b)
                ? !1
                : (a.cookie(
                      b,
                      "",
                      a.extend({}, c, {
                          expires: -1,
                      }),
                  ),
                  !a.cookie(b));
        });
});

// Search Product
function _run_search() {
    //search
    var curr_text = "";
    var count_select = 0;
    var curr_element = "";

    var textarea = document.getElementById("js-search");

    detectPaste(textarea, function (pasteInfo) {
        inputString = pasteInfo.text;
        search(inputString);
    });

    $("#js-search").keyup(
        debounce(function () {
            inputString = $(this).val();
            search(inputString);
        }, 500),
    );

    $("body").click(function () {
        $(".autocomplete-suggestions").hide();
    });
    // end search
}

function search(inputString) {
    var htmlResult = [];
    $("#js-search").html(inputString);
    if (inputString.trim() != "") {
        urlSearch =
            "/ajax/get_json.php?action=search&action_type=fast-search&content=product&q=" +
            encodeURIComponent(inputString);

        $.getJSON(urlSearch, function (result) {
            var data = result;
            Object.keys(data).forEach(function (key, keyIndex) {
                if (key < 10) {
                    var price = Hura.Util.writeStringToPrice(
                        data[keyIndex].price,
                    );
                    if (price != 0) price = price + " VNĐ";
                    else price = "Liên hệ";

                    htmlResult.push(`
                        <div class="list">
                            <a href="${data[keyIndex].url}">
                                <img src="${data[keyIndex].image}" />

                                <span class="info">
                                  <span class="name">${data[keyIndex].title}</span>
                                  <span class="price">${price}</span>
                                </span>
                            </a>
                        </div>
                    `);
                }
            });
            $(".autocomplete-suggestions").html(htmlResult.join(""));
            $(".autocomplete-suggestions").show();
        });
    } else {
        $(".autocomplete-suggestions").hide();
    }
}

function getTextAreaSelection(textarea) {
    var start = textarea.selectionStart,
        end = textarea.selectionEnd;
    return {
        start: start,
        end: end,
        length: end - start,
        text: textarea.value.slice(start, end),
    };
}

function detectPaste(textarea, callback) {
    textarea.onpaste = function () {
        var sel = getTextAreaSelection(textarea);
        var initialLength = textarea.value.length;
        window.setTimeout(function () {
            var val = textarea.value;
            var pastedTextLength = val.length - (initialLength - sel.length);
            var end = sel.start + pastedTextLength;
            callback({
                start: sel.start,
                end: end,
                length: pastedTextLength,
                text: val.slice(sel.start, end),
            });
        }, 1);
    };
}

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}
// Search Product

function showCartSummary() {
    var $status_container = $(".js-cart-count");
    $status_container.html("...");
    Hura.Cart.getSummary().then((summary) => {
        $status_container.html(summary.total_item);
    });
}

function translateTemplate(key_value, tpl) {
    var translated_tpl = tpl;
    for (var key in key_value) {
        if (key_value.hasOwnProperty(key)) {
            translated_tpl = translated_tpl.replace(
                new RegExp("{{" + key + "}}", "g"),
                key_value[key],
            );
        }
    }
    return translated_tpl;
}

function formatCurrency(a) {
    var b = parseFloat(a)
        .toFixed(2)
        .replace(/(\d)(?=(\d{3})+\.)/g, "$1.")
        .toString();
    var len = b.length;
    b = b.substring(0, len - 3);
    return b;
}

function isOnScreen(elem) {
    // if the element doesn't exist, abort
    if (elem.length == 0) {
        return;
    }
    var $window = jQuery(window);
    var viewport_top = $window.scrollTop();
    var viewport_height = $window.height();
    var viewport_bottom = viewport_top + viewport_height;
    var $elem = jQuery(elem);
    var top = $elem.offset().top;
    var height = $elem.height();
    var bottom = top + height;

    return (
        (top >= viewport_top && top < viewport_bottom) ||
        (bottom > viewport_top && bottom <= viewport_bottom) ||
        (height > viewport_height &&
            top <= viewport_top &&
            bottom >= viewport_bottom)
    );
}

function setUserOption(key, value, return_url) {
    window.location =
        "/ajax/user_set_option.php?key=" +
        key +
        "&value=" +
        value +
        "&return_url=" +
        encodeURIComponent(return_url);
}

function open_oauth(service) {
    var CURRENT_DOMAIN = "https://www.anphatpc.com.vn/dang-nhap";
    window.open(
        "/oauth/login.php?service=" + service + "&return_url=" + CURRENT_DOMAIN,
        "Login_OAuth",
        "width=600, height=500",
    );
    //window.open("/login_oauth.php?service="+service+"&return_url=https://www.anphatpc.com.vn/dang-nhap", "Login_OAuth", "width=600, height=500");
}

function validateEmail(sEmail) {
    var filter =
        /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

function validatePhoneNumber(a) {
    var number_regex1 = /^[0]\d{9}$/i;
    var number_regex2 = /^[0]\d{10}$/i;

    if (number_regex1.test(a) == false && number_regex2.test(a) == false)
        return false;
    return true;
}

function subscribe_newsletter(a) {
    var email = $(a).val();
    if (email.length > 3) {
        $.post(
            "/ajax/post.php",
            {
                action: "customer",
                action_type: "register-for-newsletter",
                full_name: "Khách hàng nhận bản tin",
                email: email,
            },
            function (data) {
                if (data == "success") {
                    alert("- Quý khách đã đăng ký thành công !");
                    $(a).val("");
                } else if (data == "exist") {
                    alert("- Email này đã tồn tại");
                } else {
                    alert("- Lỗi xảy ra, vui lòng kiểm tra lại");
                }
            },
        );
    } else {
        alert("- Vui lòng nhập địa chỉ email");
    }
}

function check_form_contact() {
    var error = "";
    var check_name = document.getElementById("contact_name").value;
    var check_email = document.getElementById("contact_email").value;
    var check_tel = document.getElementById("contact_tel").value;
    var check_message = document.getElementById("contact_message").value;

    if (check_name.length < 4) error += "- Bạn chưa nhập tên\n";
    if (check_email.length < 4) error += "- Bạn chưa nhập email\n";
    if (check_message.length < 4) error += "- Bạn chưa nhập nội dung\n";

    if (error == "") {
        $.post(
            "/ajax/customer_contact.php",
            {
                from: "ajax",
                contact_name: check_name,
                contact_email: check_email,
                contact_tel: check_tel,
                contact_message: check_message,
            },
            function (data) {
                alert("Bạn đã gửi liên hệ thành công");
                location.reload();
                return true;
            },
        );
    } else alert(error);
    return false;
}

function GetCount(ddate, iid, type) {
    amount = ddate; //calc milliseconds between dates
    hours = 0;
    mins = 0;
    secs = 0;
    html = "";

    hours = Math.floor(amount / 3600);
    amount = amount % 3600;
    mins = Math.floor(amount / 60);
    amount = amount % 60;
    secs = Math.floor(amount);

    if (type == "deal") {
        html =
            `Kết thúc sau
            <span class='js-hour'> ` +
            hours +
            ` </span> 
            <span class='js-minute'> ` +
            mins +
            ` </span> 
            <span class='js-seconds'> ` +
            secs +
            ` </span>
        `;
    } else if (type == "promotion_price") {
        html =
            `
            <span style="vertical-align: super;">Còn</span>
            <p class="d-inline-block">
                <span class="d-block js-hour"> ` +
            hours +
            ` </span>
                <span style="font-size: 9px"> GIỜ </span>
            </p>

            <p class="d-inline-block">
                <span class="d-block js-minute"> ` +
            mins +
            ` </span>
                <span style="font-size: 9px"> PHÚT </span>
            </p>

            <p class="d-inline-block">
                <span class="d-block js-seconds"> ` +
            secs +
            ` </span>
                <span style="font-size: 9px"> GIÂY </span>
            </p>
        `;
    } else {
        html = hours + ` -` + mins + ` - ` + secs;
    }

    $(iid).html(html);

    setTimeout(function () {
        GetCount(ddate - 1, iid, type);
    }, 1000);
}

function change_captcha(holder) {
    var unixtime_ms = new Date().getTime();
    $("#" + holder).attr(
        "src",
        "/includes/captcha/captcha.php?v=" + unixtime_ms,
    );
}

function check_user_captcha_contact(captcha, id) {
    $("#check_captcha_contact").html("... Đang kiểm tra");
    $.post(
        "/ajax/check_user.php",
        {
            action: "check-captcha",
            captcha: captcha,
        },
        function (data) {
            $("#" + id).html(data);
        },
    );
}

//TOOLTIP
function tooltip() {
    var w_tooltip = $("#tooltip").width();
    var h_tooltip = 0;
    var pad = 10;
    var x_mouse = 0;
    var y_mouse = 0;
    var wrap_left = 0;
    var wrap_right = 0;
    var wrap_top = 0;
    var wrap_bottom = 0;

    $(".p-item .p-img").mousemove(function (e) {
        //Khi di chuột vào sp lấy nội dung của tooltip sp đó add vào #tooltip dưới <body>
        content_tooltip = $(this).parents(".p-item").find(".p-tooltip");
        if (content_tooltip.length == 0) {
            return;
            $("#tooltip").hide();
        }

        $("#tooltip").html(content_tooltip.html());

        wrap_left = 0;
        wrap_top = $(window).scrollTop();
        wrap_bottom = $(window).height();
        wrap_right = $(window).width();
        x_mouse = e.pageX;
        y_mouse = e.pageY;
        h_tooltip = $("#tooltip").height();

        //Kiểm tra tooltip chạm cạnh phải màn hình
        if (x_mouse + w_tooltip > wrap_right)
            $("#tooltip").css("left", x_mouse - w_tooltip - pad);
        else $("#tooltip").css("left", x_mouse + pad);

        //Kiểm tra tooltip chạm cạnh trên màn hình:
        if (y_mouse - h_tooltip < wrap_top) $("#tooltip").css("top", wrap_top);
        else $("#tooltip").css("top", y_mouse - h_tooltip - pad);

        $("#tooltip").show();
    });

    $(".p-item .p-img").mouseout(function () {
        $("#tooltip").hide();
    });
}

function _getPathName() {
    var pathname = location.pathname;

    if (pathname == "/tim") {
        if (GetURLParameter("q")) {
            pathname = "/tim?q=" + GetURLParameter("q");
        } else {
            pathname = "/tim?q=";
        }
    }

    $(".js-pathName").attr("href", pathname);
    $(".js-select-path").val(pathname);
}

function checkContentHeight(height) {
    $(".js-static-content").each(function () {
        var $row = $(this);
        var $row_height = $row.height();

        if ($row_height > height) {
            $row.css("max-height", height);
            $row.addClass("bg-content");
            $(".js-showmore-button").css("display", "block");
        }
    });

    $(".js-showmore-button").click(function () {
        $(this)
            .parents(".js-static-container")
            .find(".js-static-content")
            .css("max-height", "unset");
        $(this)
            .parents(".js-static-container")
            .find(".js-static-content")
            .removeClass("bg-content");
        $(this)
            .parents(".js-static-container")
            .find(".js-showless-button")
            .css({
                display: "block",
                "margin-top": "15px",
            });
        $(this).hide();

        $("html, body").animate(
            {
                scrollTop:
                    $(this)
                        .parents(".js-static-container")
                        .find(".js-static-content")
                        .offset().top - 160,
            },
            500,
        );
    });

    $(".js-showless-button").click(function () {
        $(this)
            .parents(".js-static-container")
            .find(".js-static-content")
            .css("max-height", height);
        $(this)
            .parents(".js-static-container")
            .find(".js-static-content")
            .addClass("bg-content");
        $(this)
            .parents(".js-static-container")
            .find(".js-showmore-button")
            .css("display", "block");
        $(this).hide();

        $("html, body").animate(
            {
                scrollTop:
                    $(this)
                        .parents(".js-static-container")
                        .find(".js-static-content")
                        .offset().top - 160,
            },
            800,
        );
    });
}

function alertInput(errorArray, color) {
    errorArray.forEach(function (input) {
        input.style.borderColor = color;
    });
}

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split("&");
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split("=");
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}
