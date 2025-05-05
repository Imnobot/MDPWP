(function (_0x272674) {
    var _0x20941e = function () {};
    _0x20941e.test = document.createElement("div");
    _0x20941e.isEmpty = function (_0x429fcb) {
      return _0x429fcb.replace(/^\s+|\s+$/g, '').length == 0x0;
    };
    _0x20941e.strip = function (_0xc2f81d) {
      return _0xc2f81d.replace(/^\s+|\s+$/g, '');
    };
    _0x20941e.isNumber = function (_0x3df2fa) {
      return !isNaN(parseFloat(_0x3df2fa)) && isFinite(_0x3df2fa);
    };
    _0x20941e.isMobile = function () {
      return /Android|webOS|iPhone|iPad|iPod|sony|BlackBerry/i.test(navigator.userAgent);
    };
    _0x20941e.isIE = function () {
      var _0x3bda8f = _0x20941e.getInternetExplorerVersion();
      if (_0x3bda8f != -0x1) {
        return true;
      } else {
        return false;
      }
    };
    _0x20941e.isChrome = function () {
      var _0x5a4f57 = navigator.userAgent.toLowerCase();
      if (_0x5a4f57.match(/browser/ig)) {
        return;
      }
      return _0x5a4f57.match(/chrome/ig);
    };
    _0x20941e.isSafari = function () {
      return navigator.vendor && navigator.vendor.indexOf('Apple') > -0x1 && navigator.userAgent && navigator.userAgent.indexOf("CriOS") == -0x1 && navigator.userAgent.indexOf("FxiOS") == -0x1;
    };
    _0x20941e.hasLocalStorage = function () {
      try {
        return 'localStorage' in _0x272674 && _0x272674.localStorage !== null;
      } catch (_0x4e9404) {
        return false;
      }
    };
    _0x20941e.getInternetExplorerVersion = function () {
      var _0x55fada = -0x1;
      if (navigator.appName == "Microsoft Internet Explorer") {
        var _0x2a8c87 = navigator.userAgent;
        var _0x2fc2c2 = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
        if (_0x2fc2c2.exec(_0x2a8c87) != null) {
          _0x55fada = parseFloat(RegExp.$1);
        }
      } else {
        if (navigator.appName == 'Netscape') {
          var _0x2a8c87 = navigator.userAgent;
          var _0x2fc2c2 = new RegExp("Trident/.*rv:([0-9]{1,}[.0-9]{0,})");
          if (_0x2fc2c2.exec(_0x2a8c87) != null) {
            _0x55fada = parseFloat(RegExp.$1);
          }
        }
      }
      return _0x55fada;
    };
    _0x20941e.isIOS = function () {
      return navigator.userAgent.match(/(iPad|iPhone|iPod)/g);
    };
    _0x20941e.isiPhoneIpod = function () {
      var _0x3e1cd0 = navigator.userAgent;
      return _0x3e1cd0.indexOf("iPhone") > -0x1 || _0x3e1cd0.indexOf("iPod") > -0x1;
    };
    _0x20941e.isAndroid = function () {
      return navigator.userAgent.indexOf('Android') > -0x1;
    };
    _0x20941e.hasHistory = function () {
      return !!(_0x272674.history && history.pushState);
    };
    _0x20941e.hasDownloadSupport = function () {
      return "download" in document.createElement('a');
    };
    _0x20941e.b64DecodeUnicode = function (_0x36bf7d) {
      return decodeURIComponent(atob(_0x36bf7d).split('').map(function (_0x48ba21) {
        return '%' + ('00' + _0x48ba21.charCodeAt(0x0).toString(0x10)).slice(-0x2);
      }).join(''));
    };
    _0x20941e.volumeCanBeSet = function () {
      var _0x2c2003 = document.createElement('audio');
      if (!_0x2c2003) {
        return false;
      }
      _0x2c2003.volume = 0x0;
      return !!(_0x2c2003.volume == 0x0);
    };
    _0x20941e.supportsWebGL = function () {
      try {
        return !!_0x272674.WebGLRenderingContext && !!document.createElement("canvas").getContext('experimental-webgl');
      } catch (_0xe615fe) {
        return false;
      }
    };
    _0x20941e.canPlayMp4 = function () {
      var _0x37248d = document.createElement('video');
      return !!(_0x37248d.canPlayType && _0x37248d.canPlayType("video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"").replace(/no/, ''));
    };
    _0x20941e.canPlayMp3 = function () {
      var _0x3ea259 = document.createElement("audio");
      return !!(_0x3ea259.canPlayType && _0x3ea259.canPlayType("audio/mpeg;").replace(/no/, ''));
    };
    _0x20941e.canPlayWav = function () {
      var _0x530b36 = document.createElement("audio");
      return !!(_0x530b36.canPlayType && _0x530b36.canPlayType("audio/wav;").replace(/no/, ''));
    };
    _0x20941e.relativePath = function (_0x446dce) {
      var _0x356253 = new RegExp("^(?:[a-z]+:)?//", 'i');
      return _0x356253.test(_0x446dce);
    };
    _0x20941e.qualifyURL = function (_0xc64fb5) {
      var _0x2b526b = document.createElement('a');
      _0x2b526b.href = _0xc64fb5;
      return _0x2b526b.href;
    };
    _0x20941e.hasFullscreen = function () {
      return _0x20941e.test.requestFullscreen || _0x20941e.test.mozRequestFullScreen || _0x20941e.test.msRequestFullscreen || _0x20941e.test.oRequestFullscreen || _0x20941e.test.webkitRequestFullScreen;
    };
    _0x20941e.selectText = function (_0x1f43d8) {
      var _0x9fd598;
      var _0x343bd7;
      if (document.body.createTextRange) {
        _0x9fd598 = document.body.createTextRange();
        _0x9fd598.moveToElementText(_0x1f43d8);
        _0x9fd598.select();
      } else if (_0x272674.getSelection) {
        _0x343bd7 = _0x272674.getSelection();
        _0x9fd598 = document.createRange();
        _0x9fd598.selectNodeContents(_0x1f43d8);
        _0x343bd7.removeAllRanges();
        _0x343bd7.addRange(_0x9fd598);
      }
    };
    _0x20941e.randomiseArray = function (_0x2fd1b5) {
      var _0xbfc1 = [];
      var _0x19df79 = [];
      var _0x27997;
      var _0x195884;
      var _0x174a7d;
      for (_0x27997 = 0x0; _0x27997 < _0x2fd1b5; _0x27997++) {
        _0xbfc1[_0x27997] = _0x27997;
      }
      for (_0x195884 = 0x0; _0x195884 < _0x2fd1b5; _0x195884++) {
        _0x174a7d = Math.round(Math.random() * (_0xbfc1.length - 0x1));
        _0x19df79[_0x195884] = _0xbfc1[_0x174a7d];
        _0xbfc1.splice(_0x174a7d, 0x1);
      }
      return _0x19df79;
    };
    _0x20941e.shuffleArray = function (_0x11a707) {
      var _0x4f286e;
      var _0x680024;
      var _0x492711;
      for (_0x492711 = _0x11a707.length - 0x1; _0x492711 > 0x0; _0x492711--) {
        _0x4f286e = Math.floor(Math.random() * (_0x492711 + 0x1));
        _0x680024 = _0x11a707[_0x492711];
        _0x11a707[_0x492711] = _0x11a707[_0x4f286e];
        _0x11a707[_0x4f286e] = _0x680024;
      }
      return _0x11a707;
    };
    _0x20941e.sortArray = function (_0x38df44, _0x5bac0c) {
      var _0x9845d5;
      var _0x56fbe5 = _0x38df44.length;
      var _0x23cc97 = [];
      for (_0x9845d5 = 0x0; _0x9845d5 < _0x56fbe5; _0x9845d5++) {
        _0x23cc97[_0x9845d5] = _0x38df44[_0x5bac0c[_0x9845d5]];
      }
      return _0x23cc97;
    };
    _0x20941e.arrayContainsAnotherArray = function (_0x4895bf, _0x34bc94) {
      var _0x1900d6;
      var _0x2d7297 = _0x4895bf.length;
      for (_0x1900d6 = 0x0; _0x1900d6 < _0x2d7297; _0x1900d6++) {
        if (_0x34bc94.indexOf(_0x4895bf[_0x1900d6]) > -0x1) {
          return true;
        }
      }
      return false;
    };
    _0x20941e.regroupArray = function (_0x259837) {
      var _0x29cfbe = _0x259837.reduce((_0x66a733, {
        key: _0xdc3647,
        value: _0x2ee172
      }) => {
        let [, _0x4be29a, _0x3f227f] = _0xdc3647.split('-');
        _0x66a733[_0x4be29a] = _0x66a733[_0x4be29a] || [];
        _0x2ee172.forEach((_0x42408b, _0x5a708a) => (_0x66a733[_0x4be29a][_0x5a708a] = _0x66a733[_0x4be29a][_0x5a708a] || {})[_0x3f227f] = _0x42408b);
        return _0x66a733;
      }, []);
      return _0x29cfbe;
    };
    _0x20941e.keysrt = function (_0x2370ac, _0x3bd61f, _0x29a818) {
      var _0x3be3fe = 0x1;
      if (_0x29a818) {
        _0x3be3fe = -0x1;
      }
      return _0x2370ac.sort(function (_0xb0f263, _0x41cfc1) {
        var _0x143535 = _0xb0f263[_0x3bd61f];
        var _0x27c281 = _0x41cfc1[_0x3bd61f];
        return _0x3be3fe * (_0x143535 < _0x27c281 ? -0x1 : _0x143535 > _0x27c281 ? 0x1 : 0x0);
      });
    };
    _0x20941e.keysrt2 = function (_0x415a00, _0x102350, _0x55444a, _0x194f79) {
      var _0x41f9ae = 0x1;
      if (_0x194f79) {
        _0x41f9ae = -0x1;
      }
      return _0x415a00.sort(function (_0x2c2b4e, _0x243390) {
        var _0x42cf4c = _0x2c2b4e[_0x102350][_0x55444a];
        var _0xd5f7e9 = _0x243390[_0x102350][_0x55444a];
        return _0x41f9ae * (_0x42cf4c < _0xd5f7e9 ? -0x1 : _0x42cf4c > _0xd5f7e9 ? 0x1 : 0x0);
      });
    };
    _0x20941e.formatTime = function (_0x4d4cad) {
      var _0x1d2847 = parseInt(_0x4d4cad, 0xa);
      var _0xd4278f = Math.floor(_0x1d2847 / 0xe10);
      var _0x338e1b = Math.floor((_0x1d2847 - _0xd4278f * 0xe10) / 0x3c);
      var _0x4d4cad = _0x1d2847 - _0xd4278f * 0xe10 - _0x338e1b * 0x3c;
      return _0xd4278f > 0x0 ? (_0xd4278f < 0xa && (_0xd4278f = '0' + _0xd4278f), _0x338e1b < 0xa && (_0x338e1b = '0' + _0x338e1b), _0x4d4cad < 0xa && (_0x4d4cad = '0' + _0x4d4cad), _0xd4278f + ':' + _0x338e1b + ':' + _0x4d4cad) : (_0x338e1b < 0xa && (_0x338e1b = '0' + _0x338e1b), _0x4d4cad < 0xa && (_0x4d4cad = '0' + _0x4d4cad), _0x338e1b + ':' + _0x4d4cad);
    };
    _0x20941e.toSeconds = function (_0x477fb5) {
      var _0x3b1e8e = _0x477fb5.split(/[\.:,]+/);
      var _0x58e3d5 = +_0x3b1e8e[0x0] * 0x3c * 0x3c + +_0x3b1e8e[0x1] * 0x3c + +_0x3b1e8e[0x2];
      return Number(_0x58e3d5);
    };
    _0x20941e.getViewportSize = function (_0xc8f6fd) {
      if (_0xc8f6fd) {
        return {
          'w': _0x272674.innerWidth,
          'h': _0x272674.innerHeight
        };
      } else {
        return {
          'w': document.documentElement.clientWidth || _0x272674.innerWidth,
          'h': document.documentElement.clientHeight || _0x272674.innerHeight
        };
      }
    };
    _0x20941e.isScrolledIntoView = function (_0x596149) {
      var _0x19206c = _0x596149.getBoundingClientRect();
      var _0x266a08 = _0x19206c.top;
      var _0x2db18f = _0x19206c.bottom;
      var _0x11ee71 = _0x266a08 + _0x19206c.height / 0x2 >= 0x0 && _0x2db18f - _0x19206c.height / 0x2 <= _0x272674.innerHeight;
      return _0x11ee71;
    };
    _0x20941e.getElementOffsetTop = function (_0xbb350b) {
      var _0x559f5a = _0xbb350b.getBoundingClientRect();
      var _0x217858 = document.body;
      var _0x25631d = document.documentElement;
      var _0x52d3f0 = _0x272674.pageYOffset || _0x25631d.scrollTop || _0x217858.scrollTop;
      var _0x2adbc7 = _0x25631d.clientTop || _0x217858.clientTop || 0x0;
      return Math.round(_0x559f5a.bottom - 0x64 + _0x52d3f0 - _0x2adbc7);
    };
    _0x20941e.getScrollTop = function (_0x23d0ee) {
      var _0x2fe364 = document.documentElement;
      return (_0x272674.pageYOffset || _0x2fe364.scrollTop) - (_0x2fe364.clientTop || 0x0);
    };
    _0x20941e.rgbToHex = function (_0x1ddde0) {
      var _0x39b966 = /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(_0x1ddde0);
      return _0x39b966 ? _0x1ddde0 : (_0x1ddde0 = _0x1ddde0.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i), _0x1ddde0 && _0x1ddde0.length === 0x4 ? '#' + ('0' + parseInt(_0x1ddde0[0x1], 0xa).toString(0x10)).slice(-0x2) + ('0' + parseInt(_0x1ddde0[0x2], 0xa).toString(0x10)).slice(-0x2) + ('0' + parseInt(_0x1ddde0[0x3], 0xa).toString(0x10)).slice(-0x2) : '');
    };
    _0x20941e.getUrlParameter = function (_0x219b5a) {
      var _0x5a83c3 = {};
      _0x272674.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (_0x3056ba, _0x5a2ca5, _0x3bca7b) {
        _0x5a83c3[_0x5a2ca5] = _0x3bca7b;
      });
      return _0x219b5a ? _0x5a83c3[_0x219b5a] : _0x5a83c3;
    };
    _0x20941e.checkCssExist = function (_0x349c92) {
      var _0x147823 = document.styleSheets;
      var _0x16d905 = 0x0;
      for (var _0x490f31 = _0x147823.length; _0x16d905 < _0x490f31; _0x16d905++) {
        if (_0x147823[_0x16d905].href == _0x349c92) {
          return;
        }
      }
      var _0x335085 = document.createElement("link");
      _0x335085.rel = 'stylesheet';
      _0x335085.href = _0x349c92;
      document.getElementsByTagName('head')[0x0].appendChild(_0x335085);
    };
    _0x272674.MVPUtils = _0x20941e;
  })(window);
  (function (_0x1a3606, _0x328ae8) {
    'use strict';
  
    var _0x48f6b0 = function (_0x3897ad) {
      var _0x528849 = this;
      var _0x3b1929 = _0x3897ad.holder;
      var _0x2d76e5;
      var _0x1dba51;
      var _0x36b152 = _0x3897ad.settings.aspectRatio;
      var _0xc59010;
      var _0x3c57d3 = _0x3897ad.settings.slideshowDuration ? parseInt(_0x3897ad.settings.slideshowDuration, 0xa) : 0xa;
      var _0x4b4541 = _0x3897ad.settings.slideshowRandom;
      var _0x482fd2;
      var _0x10eaa5;
      var _0x542638 = [];
      var _0x15cd4e;
      var _0x1bf948;
      var _0x4576ea;
      var _0x51cfc5;
      var _0x3cb51e = _0x3897ad.settings.autoPlay;
      this.initMedia = function () {
        if (_0x3b1929.children().length > 0x0) {
          _0x1bf948 = _0x3b1929.children().eq(0x0);
        }
        console.log("initMedia");
        _0x15cd4e++;
        if (_0x15cd4e > _0x542638.length - 0x1) {
          _0x15cd4e = 0x0;
        }
        var _0x51758b = _0x542638[_0x15cd4e];
        _0x328ae8(new Image()).css({
          'display': "block"
        }).addClass("mvp-media").appendTo(_0x3b1929).on("load", function () {
          _0x1dba51 = _0x328ae8(this);
          _0x528849.resize();
          if (_0x1bf948) {
            _0x1bf948.removeClass("mvp-slideshow-visible");
          }
          _0x10eaa5 = false;
          _0x1dba51.one("transitionend", function () {
            _0x4acbb7();
          }).addClass("mvp-slideshow-visible");
          _0x482fd2 = parseFloat(_0x1dba51.css("transition-duration"), 0xa);
          setTimeout(function () {
            _0x4acbb7();
          }, _0x482fd2 * 0x3e8);
        }).attr("src", _0x51758b);
      };
      function _0x4acbb7() {
        if (!_0x10eaa5) {
          _0x10eaa5 = true;
          if (_0x1bf948) {
            _0x1bf948.remove();
            _0x1bf948 = null;
          }
          _0xc59010 = _0x3c57d3 * 0x3e8;
          if (_0x3cb51e) {
            _0x528849.play();
          }
        }
      }
      this.pause = function () {
        if (_0x2d76e5) {
          clearTimeout(_0x2d76e5);
        }
        var _0x23dd2c = new Date().getTime() - _0x51cfc5;
        _0xc59010 -= _0x23dd2c;
        if (_0xc59010 < 0x0) {
          _0xc59010 = 0x0;
        }
        _0x4576ea = false;
      };
      this.play = function () {
        _0x3cb51e = true;
        if (_0x2d76e5) {
          clearTimeout(_0x2d76e5);
        }
        _0x51cfc5 = new Date().getTime();
        _0x2d76e5 = setTimeout(_0x528849.ended, _0xc59010);
        _0x4576ea = true;
      };
      this.ended = function () {
        _0x528849.initMedia();
      };
      this.dispose = function () {
        if (_0x2d76e5) {
          clearTimeout(_0x2d76e5);
        }
        _0x3b1929.empty();
        _0x1dba51 = null;
      };
      this.resize = function () {
        if (_0x1dba51) {
          MVPAspectRatio.resizeMedia('image', _0x36b152, _0x3b1929, _0x1dba51);
        }
      };
      this.setData = function (_0x40b07f) {
        _0x15cd4e = -0x1;
        _0x542638 = _0x40b07f.slideshowImages;
        if (_0x4b4541) {
          MVPUtils.shuffleArray(_0x542638);
        }
        _0x528849.initMedia();
      };
    };
    _0x1a3606.MVPImageSlideshow = _0x48f6b0;
  })(window, jQuery);
  (function (_0x5e0c8b) {
    'use strict';
  
    var _0x4559b1 = function (_0x2aa5ee) {
      var _0x997890 = _0x2aa5ee.mediaHolder[0x0];
      var _0x1ad29e = 0x1;
      var _0x5e8aec = 0x0;
      var _0x1000d3 = 0x0;
      var _0x24298c = 0x0;
      var _0x1afae8 = ["transform", 'WebkitTransform', 'MozTransform', "msTransform", "OTransform"];
      var _0x28a529 = _0x1afae8[0x0];
      var _0x345678;
      var _0x5cec09;
      _0x345678 = 0x0;
      for (_0x5cec09 = _0x1afae8.length; _0x345678 < _0x5cec09; _0x345678++) {
        if (typeof _0x997890.style[_0x1afae8[_0x345678]] !== "undefined") {
          _0x28a529 = _0x1afae8[_0x345678];
          break;
        }
      }
      if (_0x2aa5ee.settings.saveTransformState && localStorage.getItem(_0x2aa5ee.settings.transformKey)) {
        var _0x581525 = JSON.parse(localStorage.getItem(_0x2aa5ee.settings.transformKey));
        _0x1ad29e = _0x581525.zoom || 0x1;
        _0x5e8aec = _0x581525.rotate || 0x0;
        _0x1000d3 = _0x581525.left || 0x0;
        _0x24298c = _0x581525.top || 0x0;
        _0x997890.style.left = _0x1000d3 + 'px';
        _0x997890.style.top = _0x24298c + 'px';
        _0x997890.style[_0x28a529] = 'rotate(' + _0x5e8aec + "deg) scale(" + _0x1ad29e + ')';
      }
      this.transform = function (_0x33768d) {
        switch (_0x33768d) {
          case 'zoom-in':
            _0x1ad29e = _0x1ad29e + 0.1;
            _0x997890.style[_0x28a529] = "scale(" + _0x1ad29e + ") rotate(" + _0x5e8aec + "deg)";
            break;
          case "zoom-out":
            _0x1ad29e = _0x1ad29e - 0.1;
            _0x997890.style[_0x28a529] = 'scale(' + _0x1ad29e + ") rotate(" + _0x5e8aec + "deg)";
            break;
          case "rotate-left":
            _0x5e8aec -= 0x5;
            _0x997890.style[_0x28a529] = "rotate(" + _0x5e8aec + "deg) scale(" + _0x1ad29e + ')';
            break;
          case 'rotate-right':
            _0x5e8aec += 0x5;
            _0x997890.style[_0x28a529] = "rotate(" + _0x5e8aec + "deg) scale(" + _0x1ad29e + ')';
            break;
          case "move-left":
            _0x1000d3 -= 0x5;
            _0x997890.style.left = _0x1000d3 + 'px';
            break;
          case "move-right":
            _0x1000d3 += 0x5;
            _0x997890.style.left = _0x1000d3 + 'px';
            break;
          case "move-up":
            _0x24298c -= 0x5;
            _0x997890.style.top = _0x24298c + 'px';
            break;
          case "move-down":
            _0x24298c += 0x5;
            _0x997890.style.top = _0x24298c + 'px';
            break;
          case "reset":
            _0x1ad29e = 0x1;
            _0x5e8aec = 0x0;
            _0x24298c = 0x0;
            _0x1000d3 = 0x0;
            _0x997890.style.top = "0px";
            _0x997890.style.left = "0px";
            _0x997890.style[_0x28a529] = 'rotate(' + _0x5e8aec + "deg) scale(" + _0x1ad29e + ')';
            break;
        }
        if (_0x2aa5ee.settings.saveTransformState) {
          _0xfb27e1();
        }
      };
      function _0xfb27e1() {
        var _0x20dfb7 = {
          'zoom': _0x1ad29e,
          'rotate': _0x5e8aec,
          'left': _0x1000d3,
          'top': _0x24298c
        };
        localStorage.setItem(_0x2aa5ee.settings.transformKey, JSON.stringify(_0x20dfb7));
      }
    };
    _0x5e0c8b.MVPTransformManager = _0x4559b1;
  })(window);
  (function (_0x251704, _0x36d9c0) {
    'use strict';
  
    var _0x3b8679 = function (_0x105fa3) {
      var _0xe5cc5d = this;
      var _0x47ca21 = _0x105fa3.loopingOn;
      var _0x128335 = _0x105fa3.randomPlay;
      var _0x45fcc7;
      var _0x22ee60 = false;
      var _0x57b3d6 = -0x1;
      var _0x326728;
      var _0x4ec05c;
      var _0x4b1724 = false;
      var _0xbb1463 = [];
      var _0xc73084;
      var _0x9738f3 = false;
      setTimeout(function () {
        clearTimeout(this);
        _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.RANDOM_CHANGE", _0x128335);
        _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.LOOP_CHANGE", _0x47ca21);
      }, 0x32);
      this.setCounter = function (_0x3eff13, _0x2811e5) {
        if (typeof _0x2811e5 === "undefined") {
          _0x2811e5 = true;
        }
        if (_0x2811e5) {
          _0x57b3d6 += parseInt(_0x3eff13, 0xa);
        } else {
          _0x57b3d6 = parseInt(_0x3eff13, 0xa);
        }
        _0x3fe9f9();
      };
      this.getCounter = function () {
        var _0x3b2ce8;
        if (_0x128335) {
          if (!_0x9738f3) {
            _0x3b2ce8 = _0xbb1463[_0x57b3d6];
          } else {
            _0x3b2ce8 = _0x57b3d6;
          }
        } else {
          _0x3b2ce8 = _0x57b3d6;
        }
        return _0x3b2ce8;
      };
      this.getNextCounter = function (_0x5f0b0d) {
        var _0x4da4d4 = _0x57b3d6 + _0x5f0b0d;
        _0x22ee60 = false;
        if (_0x47ca21) {
          if (_0x128335) {
            if (_0x4da4d4 > _0x45fcc7 - 0x1) {
              _0x4da4d4 = _0xbb1463[_0x45fcc7 - 0x1];
              _0xc73084 = MVPUtils.randomiseArray(_0x45fcc7);
              _0x56baca(_0xc73084, _0x4da4d4);
              _0x4da4d4 = 0x0;
            } else if (_0x4da4d4 < 0x0) {
              _0x4da4d4 = _0xbb1463[0x0];
              _0xc73084 = MVPUtils.randomiseArray(_0x45fcc7);
              _0x5a4e4f(_0xc73084, _0x4da4d4);
              _0x4da4d4 = _0x45fcc7 - 0x1;
            }
          } else {
            if (_0x4da4d4 > _0x45fcc7 - 0x1) {
              _0x4da4d4 = 0x0;
            } else if (_0x4da4d4 < 0x0) {
              _0x4da4d4 = _0x45fcc7 - 0x1;
            }
          }
        } else {
          if (_0x4da4d4 > _0x45fcc7 - 0x1) {
            _0x22ee60 = true;
            _0x4da4d4 = _0x45fcc7 - 0x1;
          } else if (_0x4da4d4 < 0x0) {
            _0x22ee60 = true;
            _0x4da4d4 = 0x0;
          }
          if (_0x22ee60) {
            return undefined;
          }
        }
        var _0x56235a;
        if (_0x128335) {
          if (!_0x9738f3) {
            var _0x3b2eb7 = _0xc73084 || _0xbb1463;
            _0x56235a = _0x3b2eb7[_0x4da4d4];
          } else {
            _0x56235a = _0x4da4d4;
          }
        } else {
          _0x56235a = _0x4da4d4;
        }
        return _0x56235a;
      };
      this.advanceHandler = function (_0x2d3e45) {
        _0x9738f3 = false;
        if (_0x4b1724) {
          _0x392be1(_0x2d3e45);
        } else {
          _0xe5cc5d.setCounter(_0x2d3e45);
        }
      };
      this.processPlaylistRequest = function (_0x49c04c) {
        _0x9738f3 = false;
        if (_0x128335) {
          _0x9738f3 = true;
          _0x326728 = _0x49c04c;
          if (!_0x4b1724) {
            _0x4ec05c = _0x57b3d6;
            _0x4b1724 = true;
          }
        }
        _0xe5cc5d.setCounter(_0x49c04c, false);
      };
      this.setPlaylistItems = function (_0x2ac73d, _0x4f06a5) {
        if (typeof _0x4f06a5 === "undefined") {
          _0x4f06a5 = true;
        }
        if (_0x4f06a5) {
          _0x57b3d6 = -0x1;
        }
        _0x45fcc7 = _0x2ac73d;
        if (_0x128335) {
          _0x235da4();
        }
      };
      this.reSetCounter = function (_0x29847c) {
        if (typeof _0x29847c === "undefined") {
          _0x57b3d6 = -0x1;
        } else {
          var _0x2d58a3 = parseInt(_0x29847c, 0xa);
          if (_0x45fcc7) {
            if (_0x2d58a3 > _0x45fcc7 - 0x1) {
              _0x2d58a3 = _0x45fcc7 - 0x1;
            } else if (_0x2d58a3 < 0x0) {
              _0x2d58a3 = 0x0;
            }
            _0x57b3d6 = _0x2d58a3;
          } else {
            _0x57b3d6 = -0x1;
          }
        }
      };
      this.setRandom = function (_0x1bf946) {
        if (typeof _0x1bf946 !== "undefined") {
          _0x128335 = _0x1bf946;
        } else {
          _0x128335 = !_0x128335;
        }
        if (_0x45fcc7 < 0x3) {
          _0x128335 = false;
        }
        if (_0x128335) {
          _0x235da4();
        }
        _0x7fce0b();
        _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.RANDOM_CHANGE", _0x128335);
      };
      this.getRandom = function (_0x56bd7b) {
        return _0x128335;
      };
      this.setLooping = function (_0x28a986) {
        if (typeof _0x28a986 !== "undefined") {
          _0x47ca21 = _0x28a986;
        } else {
          _0x47ca21 = !_0x47ca21;
        }
        _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.LOOP_CHANGE", _0x47ca21);
      };
      this.getLooping = function (_0x5cfe5a) {
        return _0x47ca21;
      };
      this.getPosition = function (_0x2520da) {
        return _0xbb1463.indexOf(_0x2520da);
      };
      function _0x392be1(_0xe1aa39) {
        _0x4b1724 = false;
        if (_0x4ec05c + _0xe1aa39 > _0x45fcc7 - 0x1) {
          _0x57b3d6 = _0x45fcc7 - 0x1;
          _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.COUNTER_READY", _0xe5cc5d.getCounter());
          return;
        } else {
          if (_0x4ec05c + _0xe1aa39 < 0x0) {
            _0x57b3d6 = 0x0;
            _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.COUNTER_READY", _0xe5cc5d.getCounter());
            return;
          }
        }
        _0xe5cc5d.setCounter(_0x4ec05c + _0xe1aa39, false);
      }
      function _0x7fce0b() {
        if (_0x128335) {
          _0x4a4e81();
          _0x57b3d6 = 0x0;
        } else if (_0x4b1724) {
          _0x57b3d6 = _0x326728;
          _0x4b1724 = false;
        } else {
          _0x57b3d6 = _0xbb1463[_0x57b3d6];
        }
      }
      function _0x3fe9f9() {
        if (isNaN(_0x57b3d6)) {
          alert("MVPPlaylistManager message: No active media, counter = " + _0x57b3d6);
          return;
        }
        _0x22ee60 = false;
        if (_0x47ca21) {
          if (_0x128335) {
            if (_0x57b3d6 > _0x45fcc7 - 0x1) {
              _0x57b3d6 = _0xbb1463[_0x45fcc7 - 0x1];
              _0x235da4();
              _0x56baca(_0xbb1463, _0x57b3d6);
              _0x57b3d6 = 0x0;
            } else if (_0x57b3d6 < 0x0) {
              _0x57b3d6 = _0xbb1463[0x0];
              _0x235da4();
              _0x5a4e4f(_0xbb1463, _0x57b3d6);
              _0x57b3d6 = _0x45fcc7 - 0x1;
            }
          } else {
            if (_0x57b3d6 > _0x45fcc7 - 0x1) {
              _0x57b3d6 = 0x0;
            } else if (_0x57b3d6 < 0x0) {
              _0x57b3d6 = _0x45fcc7 - 0x1;
            }
          }
          _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.COUNTER_READY", _0xe5cc5d.getCounter());
        } else {
          if (_0x57b3d6 > _0x45fcc7 - 0x1) {
            _0x57b3d6 = _0x45fcc7 - 0x1;
            _0x22ee60 = true;
          } else if (_0x57b3d6 < 0x0) {
            _0x22ee60 = true;
            _0x57b3d6 = 0x0;
          }
          if (!_0x22ee60) {
            _0x36d9c0(_0xe5cc5d).trigger('MVPPlaylistManager.COUNTER_READY', _0xe5cc5d.getCounter());
          } else {
            _0x36d9c0(_0xe5cc5d).trigger("MVPPlaylistManager.PLAYLIST_END");
          }
        }
      }
      function _0x235da4() {
        if (_0xc73084) {
          _0xbb1463 = _0xc73084.slice();
          _0xc73084 = null;
        } else {
          _0xbb1463 = MVPUtils.randomiseArray(_0x45fcc7);
        }
        console.log(_0xbb1463);
      }
      function _0x56baca(_0x100f40, _0x4837a5) {
        if (_0x100f40[0x0] == _0x4837a5) {
          var _0xadfb7f = _0x100f40.splice(0x0, 0x1);
          _0x100f40.push(_0xadfb7f);
        }
      }
      function _0x5a4e4f(_0x59db39, _0xa47cae) {
        if (_0x59db39[_0x45fcc7 - 0x1] == _0xa47cae) {
          var _0x184d18 = _0x59db39.splice(_0x45fcc7 - 0x1, 0x1);
          _0x59db39.unshift(_0x184d18);
        }
      }
      function _0x4a4e81() {
        var _0x186ba6;
        var _0x25633f = _0xbb1463.length;
        var _0x4e5da8;
        for (_0x186ba6 = 0x0; _0x186ba6 < _0x25633f; _0x186ba6++) {
          if (_0xbb1463[_0x186ba6] == _0x57b3d6) {
            if (_0x186ba6 == 0x0) {
              break;
            }
            _0x4e5da8 = _0xbb1463.splice(_0x186ba6, 0x1);
            _0xbb1463.unshift(parseInt(_0x4e5da8, 0xa));
            break;
          }
        }
      }
    };
    _0x251704.MVPPlaylistManager = _0x3b8679;
  })(window, jQuery);
  (function (_0x2f9ce3, _0x5590a0) {
    var _0xa8032c = function () {};
    _0xa8032c.resizeMedia = function (_0x292825, _0x247934, _0x26603f, _0x461400) {
      var _0x5d0c23;
      var _0x10b74e;
      var _0x5d8ac3;
      var _0x53d8f1 = _0x26603f.width();
      var _0x1ffb85 = _0x26603f.height();
      if (_0x247934 == 0x0) {
        _0x5d0c23 = _0x20b4f1(_0x292825, _0x461400);
      } else {
        if (_0x247934 == 0x1) {
          _0x5d0c23 = _0x27afd1(true, _0x292825, _0x26603f, _0x461400);
        } else if (_0x247934 == 0x2) {
          _0x5d0c23 = _0x27afd1(false, _0x292825, _0x26603f, _0x461400);
        }
      }
      _0x10b74e = parseInt((_0x53d8f1 - _0x5d0c23.width) / 0x2, 0xa);
      _0x5d8ac3 = parseInt((_0x1ffb85 - _0x5d0c23.height) / 0x2, 0xa);
      _0x461400.css({
        'width': _0x5d0c23.width + 'px',
        'height': _0x5d0c23.height + 'px',
        'left': _0x10b74e + 'px',
        'top': _0x5d8ac3 + 'px'
      });
    };
    function _0x27afd1(_0x10c2da, _0x3d9ea5, _0xe4e24a, _0x36b46d) {
      var _0x3404bf = {};
      var _0x10d573 = _0xe4e24a.width();
      var _0x6b482c = _0xe4e24a.height();
      var _0x1c2416 = _0x20b4f1(_0x3d9ea5, _0x36b46d);
      var _0x3420b7 = _0x1c2416.width;
      var _0x275a46 = _0x1c2416.height;
      var _0x27dbd1 = (_0x10d573 - 0x0) / (_0x6b482c - 0x0);
      var _0x3442bf = _0x3420b7 / _0x275a46;
      if (_0x3442bf < _0x27dbd1) {
        if (!_0x10c2da) {
          _0x3404bf.height = (_0x10d573 - 0x0) / _0x3420b7 * _0x275a46;
          _0x3404bf.width = _0x10d573 - 0x0;
        } else {
          _0x3404bf.width = (_0x6b482c - 0x0) / _0x275a46 * _0x3420b7;
          _0x3404bf.height = _0x6b482c - 0x0;
        }
      } else if (_0x3442bf > _0x27dbd1) {
        if (_0x10c2da) {
          _0x3404bf.height = (_0x10d573 - 0x0) / _0x3420b7 * _0x275a46;
          _0x3404bf.width = _0x10d573 - 0x0;
        } else {
          _0x3404bf.width = (_0x6b482c - 0x0) / _0x275a46 * _0x3420b7;
          _0x3404bf.height = _0x6b482c - 0x0;
        }
      } else {
        _0x3404bf.width = _0x10d573 - 0x0;
        _0x3404bf.height = _0x6b482c - 0x0;
      }
      return _0x3404bf;
    }
    function _0x20b4f1(_0x28d225, _0x5f2453) {
      var _0x270f29 = {};
      if (_0x28d225 == 'video') {
        if (_0x5f2453[0x0] && _0x5f2453[0x0].videoWidth && _0x5f2453[0x0].videoHeight) {
          _0x270f29.width = _0x5f2453[0x0].videoWidth;
          _0x270f29.height = _0x5f2453[0x0].videoHeight;
        } else {
          _0x270f29.width = 0x10;
          _0x270f29.height = 0x9;
        }
      } else {
        if (_0x28d225 == "iframe") {
          if (_0x5f2453.sw && _0x5f2453.sh) {
            _0x270f29.width = _0x5f2453.sw;
            _0x270f29.height = _0x5f2453.sh;
          } else {
            _0x270f29.width = 0x10;
            _0x270f29.height = 0x9;
          }
        } else if (_0x28d225 == 'image') {
          _0x270f29.width = _0x5f2453.width();
          _0x270f29.height = _0x5f2453.height();
        }
      }
      return _0x270f29;
    }
    _0x2f9ce3.MVPAspectRatio = _0xa8032c;
  })(window, jQuery);
  (function (_0x2c8ffb) {
    _0x2c8ffb.fn.mvp = function (_0x49c9b1) {
      'use strict';
  
      var _0x5d3237 = {
        'vimeo_js': "https://player.vimeo.com/api/player.js",
        'vimeoLoader_js': "js/vimeoLoader.js",
        'youtube_js': "https://www.youtube.com/iframe_api",
        'youtubeLoader_js': 'js/youtubeLoader.js',
        'mCustomScrollbar_js': 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js',
        'mCustomScrollbar_css': 'css/jquery.mCustomScrollbar.min.css',
        'perfectScrollbar_js': "https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js",
        'perfectScrollbar_css': "css/perfect-scrollbar.css",
        'hls_js': "https://cdn.jsdelivr.net/npm/hls.js@latest",
        'dash_js': 'https://cdn.dashjs.org/latest/dash.all.min.js',
        'mediatags_js': "https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.9.0/jsmediatags.min.js",
        'jquery_touchSwipe': "https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js",
        'adsbygoogle_js': "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",
        'three_js': 'js/three.min.js',
        'orbitControls_js': "https://unpkg.com/three@0.85.0/examples/js/controls/OrbitControls.js",
        'md5_js': "https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.10.0/js/md5.min.js",
        'equalizer_js': "js/equalizer.js",
        'rel_js': "js/rel_pagination.js",
        'share_js': "js/share_manager.js",
        'cache_js': "js/cache.js",
        'playlist_navigation_js': "js/playlist_navigation.js",
        'cast_js': "js/cast.js",
        'vast_js': "js/vast.js",
        'imaLoader_js': "js/ima.js?49",
        'ima_js': "//imasdk.googleapis.com/js/sdkloader/ima3.js?2",
        'sourcePath': '',
        'playlistList': "#mvp-playlist-list",
        'instanceName': '',
        'queryInstance': '',
        'playerType': "normal",
        'createPlayer': true,
        'rememeberCaptionState': true,
        'youtubePlayerType': "chromeless",
        'blockYoutubeEvents': true,
        'vimeoPlayerType': "default",
        'vimeoPlayerColor': "#00adef",
        'blockVimeoEvents': true,
        'playerRatio': 1.7777777,
        'combinePlayerRatio': true,
        'playlistBottomHeight': 0x12c,
        'playlistSideWidth': 0x140,
        'volume': 0.5,
        'preload': 'auto',
        's3UrlExpireTime': "+15 seconds",
        's3ThumbExtension': "jpg",
        's3Region': 'us-east-1',
        'autoPlay': false,
        'autoPlayAfterFirst': false,
        'autoPlayInViewport': false,
        'addResizeEvent': true,
        'mediaEndAction': 'next',
        'useShare': true,
        'adUpcomingMsgTime': 0x5,
        'thumbScrollValue': 0x32,
        'youtubePlayerColor': 'red',
        'verticalBottomSepearator': 0x2ee,
        'subtitleOffText': "Disabled",
        'useMobileNativePlayer': false,
        'hideQualityMenuOnSingleQuality': true,
        'useLightboxAdvanceButtons': true,
        'minimizeOnScroll': false,
        'minimizeOnScrollOnlyIfPlaying': false,
        'aspectRatio': 0x2,
        'gridType': "javascript",
        'adUpcomingTime': 0x5,
        'randomPlay': false,
        'transformKey': "mvp-video-transform",
        'playlistScrollType': "mcustomscrollbar",
        'loopingOn': true,
        'captionStateKey': "mvp-caption-state",
        'hidePlaylistOnFullscreenEnter': true,
        'useAirPlay': true,
        'focusVideoInTheater': true,
        'hidePlaylistOnTheaterEnter': true,
        'playlistItemContent': "thumb,title,description",
        'playbackPositionKey': "mvp-playback-position",
        'rightClickContextMenu': "custom",
        'tooltipClose': "Close",
        'tooltipLightboxPrevious': 'Previous',
        'tooltipLightboxNext': "Next",
        'closeSettingsMenuOnSelect': true,
        'playlistOpened': true,
        'hidePlaylistOnMinimize': true,
        'clickOnBackgroundClosesLightbox': true,
        'limitDescriptionText': 0x2,
        'togglePlaybackOnMultipleInstances': true,
        'showStreamVideoBitrateMenu': true,
        'showStreamAudioBitrateMenu': true,
        'useKeyboardNavigationForPlayback': false,
        'keyboardControls': [],
        'seekTime': 0xa,
        'scrollToPlayer': 0x0,
        'seekToChapterStart': true,
        'autoOpenChapterMenu': true,
        'hideChapterMenuOnChapterSelect': false,
        'useSwipeNavigation': false,
        'forceAdMutedOnIos': true,
        'autoPlaylistStyleVrbSwitch': true,
        'createAdMarkers': true,
        'showPrevNextVideoThumb': true,
        'playAdsOnlyOnce': false,
        'showAnnotationsOnlyOnce': false,
        'displayWatchedPercentage': false,
        'autoRotateSpeed': 0.5,
        'autoRotatePanorama': true,
        'enablePerspectiveWhenVrNotAvailable': true,
        'addPlaylistEvents': true,
        'idleTimeout': 0x7d0,
        'caption_breakPointArr': [{
          'width': 0x0,
          'size': 0x12
        }, {
          'width': 0x1e0,
          'size': 0x14
        }, {
          'width': 0x300,
          'size': 0x16
        }, {
          'width': 0x400,
          'size': 0x18
        }, {
          'width': 0x500,
          'size': 0x24
        }],
        'youtubeAppId': '',
        'youtubeThumbSize': "medium",
        'castConnectingMsg': "Connecting to Chromecast",
        'embedSrc': "Embed url goes here",
        'textTrackStyle': {
          'fontScale': 0x1,
          'foregroundColor': '#FFFFFFFF',
          'backgroundColor': "#00000000",
          'edgeColor': "#00000066",
          'edgeType': "DROP_SHADOW",
          'fontStyle': "NORMAL",
          'fontFamily': "Serif",
          'fontGenericFamily': "CURSIVE"
        },
        'vimeoThumbSize': "295x166",
        'searchDescriptionInPlaylist': true,
        'minimizeClass': "mvp-minimize-br",
        'whatsAppWarning': "Please share this content on mobile device!",
        'comingnextTime': 0xa,
        'showControlsBeforeStart': false,
        'useStatistics': false,
        'disableVideoSkip': false,
        'keepCaptionFontSizeAfterManualResize': false,
        'percentToCountAsPlay': 0x19,
        'requirePosterFromFolder': true,
        'requireThumbnailsFromFolder': true,
        'useAudioEqualizer': false,
        'playbackPositionTime': null,
        'mediaId': null,
        'mediaTitle': null,
        'paginationPreviousBtnTitle': "Previous",
        'paginationPreviousBtnText': "Prev",
        'paginationNextBtnTitle': "Next",
        'paginationNextBtnText': "Next",
        'closeIcon': "<svg fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path d=\"M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z\"></path></svg>"
      };
      var _0x49c9b1 = _0x2c8ffb.extend(true, {}, _0x5d3237, _0x49c9b1);
      var _0x66517 = MVPUtils.getUrlParameter();
      var _0x44f387 = [];
      var _0x4bcbda = [];
      var _0x2ed7b4 = [];
      var _0x31b1fe = [];
      if (decodeURIComponent(_0x66517["mvp-query-instance"]) == _0x49c9b1.instanceName) {
        Object.keys(_0x66517).forEach(function (_0x3b94e1) {
          if (_0x3b94e1.indexOf('mvp-') == 0x0) {
            var _0x246060 = _0x3b94e1.substr(0x4);
            var _0x16b579 = _0x246060;
            var _0x57cec6 = decodeURIComponent(_0x66517[_0x3b94e1]).replace(/\+/g, " ");
            if (_0x246060.indexOf('path-') == -0x1 && _0x246060.indexOf("subtitle-") == -0x1) {
              _0x16b579 = _0x246060.replace(/-([a-z])/g, function (_0x5bf270) {
                return _0x5bf270[0x1].toUpperCase();
              });
            }
            if (_0x57cec6) {
              if (_0x49c9b1.hasOwnProperty(_0x16b579)) {
                if (_0x57cec6 === "true") {
                  _0x57cec6 = true;
                } else {
                  if (_0x57cec6 === "false") {
                    _0x57cec6 = false;
                  }
                }
                _0x49c9b1[_0x16b579] = _0x57cec6;
              } else {
                _0x57cec6 = _0x57cec6.split(',').map(function (_0xd042c) {
                  return _0xd042c.trim();
                });
                if (_0x16b579.indexOf("path-") > -0x1) {
                  _0x2ed7b4.push({
                    'key': _0x16b579,
                    'value': _0x57cec6
                  });
                } else if (_0x16b579.indexOf("subtitle-") > -0x1) {
                  _0x31b1fe.push({
                    'key': _0x16b579,
                    'value': _0x57cec6
                  });
                } else {
                  _0x44f387.push({
                    'key': _0x16b579,
                    'value': _0x57cec6
                  });
                }
              }
            }
          }
        });
        if (_0x2ed7b4.length) {
          _0x2ed7b4 = MVPUtils.regroupArray(_0x2ed7b4);
          _0x44f387.push({
            'key': "path",
            'value': _0x2ed7b4
          });
        }
        if (_0x31b1fe.length) {
          _0x31b1fe = MVPUtils.regroupArray(_0x31b1fe);
          _0x44f387.push({
            'key': "subtitles",
            'value': _0x31b1fe
          });
        }
        _0x2ed7b4 = null;
        _0x31b1fe = null;
        if (_0x44f387.length) {
          var _0x9176dd;
          var _0x2b87dc;
          var _0x17a62f = _0x44f387.length;
          var _0x59d6d9 = _0x44f387[0x0].value.length;
          var _0xcb2d5d;
          var _0x167e24;
          var _0x4df7a0;
          for (_0x2b87dc = 0x0; _0x2b87dc < _0x59d6d9; _0x2b87dc++) {
            _0x167e24 = {};
            for (_0x9176dd = 0x0; _0x9176dd < _0x17a62f; _0x9176dd++) {
              _0xcb2d5d = _0x44f387[_0x9176dd];
              _0x4df7a0 = _0xcb2d5d.value[_0x2b87dc];
              if (_0xcb2d5d.key.indexOf("path-") == -0x1 && _0xcb2d5d.key.indexOf("subtitle-") == -0x1) {
                if (_0x4df7a0 === "true") {
                  _0x4df7a0 = true;
                } else {
                  if (_0x4df7a0 === "false") {
                    _0x4df7a0 = false;
                  }
                }
                _0x167e24[_0xcb2d5d.key] = _0x4df7a0;
                if (_0xcb2d5d.key === "type") {
                  _0x167e24.origtype = _0x4df7a0;
                }
              }
            }
            _0x4bcbda.push(_0x167e24);
          }
        }
      }
      _0x66517 = null;
      var _0x5ca0d3 = this;
      var _0x36b677 = MVPUtils.isMobile();
      var _0x252083 = _0x49c9b1.useSwipeNavigation && "ontouchstart" in window;
      var _0x116683 = true;
      if (_0x49c9b1.playlistPosition == "vlb") {
        _0x49c9b1.playlistPosition = "vrb";
      } else {
        if (_0x49c9b1.playlistPosition == 'ht') {
          _0x49c9b1.playlistPosition = 'hb';
        }
      }
      var _0x550351 = _0x2c8ffb(this).css("display", "block");
      var _0x14ff68;
      var _0x5d2f80;
      var _0x33917e;
      var _0x20ec37;
      var _0x3ed710;
      var _0x2bf661;
      var _0x24e52b;
      var _0x490e7f;
      var _0x2629f6 = 0x0;
      if (_0x49c9b1.playlistPosition == "wall" || _0x49c9b1.playerType == "lightbox") {
        var _0x406423 = "<div class=\"mvp-lightbox-wrap\"><div class=\"mvp-lightbox\"><div class=\"mvp-lightbox-inner\"><div class=\"mvp-lightbox-content-inner\"><div class=\"mvp-lightbox-close\" title=\"" + _0x49c9b1.tooltipClose + "\">" + "<svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 384 512\"><path d=\"M217.5 256l137.2-137.2c4.7-4.7 4.7-12.3 0-17l-8.5-8.5c-4.7-4.7-12.3-4.7-17 0L192 230.5 54.8 93.4c-4.7-4.7-12.3-4.7-17 0l-8.5 8.5c-4.7 4.7-4.7 12.3 0 17L166.5 256 29.4 393.2c-4.7 4.7-4.7 12.3 0 17l8.5 8.5c4.7 4.7 12.3 4.7 17 0L192 281.5l137.2 137.2c4.7 4.7 12.3 4.7 17 0l8.5-8.5c4.7-4.7 4.7-12.3 0-17L217.5 256z\"></path></svg>" + "</div>";
        if (_0x49c9b1.useLightboxAdvanceButtons) {
          _0x406423 += "<div class=\"mvp-lightbox-prev\" title=\"" + _0x49c9b1.tooltipLightboxPrevious + "\">" + "<svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 256 512\"><path d=\"M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z\"></path></svg>" + "</div>" + "<div class=\"mvp-lightbox-next\" title=\"" + _0x49c9b1.tooltipLightboxNext + "\">" + "<svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 256 512\"><path d=\"M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z\"></path></svg>" + "</div>";
        }
        _0x406423 += "</div></div></div>";
        _0x14ff68 = _0x2c8ffb(_0x406423);
        if (_0x49c9b1.playlistPosition == 'wall') {
          _0x14ff68.addClass(_0x550351.attr('id')).prependTo(_0x550351);
          _0x20ec37 = _0x14ff68.find('.mvp-lightbox-content-inner').append(_0x550351.find('.mvp-player-wrap'));
          _0x550351.find(".mvp-playlist-holder").prependTo(_0x550351);
        } else if (_0x49c9b1.playerType == "lightbox") {
          _0x14ff68.addClass(_0x550351.attr('id')).appendTo(_0x2c8ffb("body"));
          _0x20ec37 = _0x14ff68.find('.mvp-lightbox-content-inner').append(_0x550351.addClass("mvp-is-lightbox"));
        }
        _0x5d2f80 = _0x14ff68.find(".mvp-lightbox");
        _0x33917e = _0x14ff68.find(".mvp-lightbox-content");
        _0x3ed710 = _0x14ff68.find(".mvp-lightbox-inner");
        _0x2bf661 = _0x14ff68.find(".mvp-lightbox-close");
        _0x24e52b = _0x14ff68.find(".mvp-lightbox-prev");
        _0x490e7f = _0x14ff68.find(".mvp-lightbox-next");
        _0x2629f6 = parseInt(_0x20ec37.css("padding"), 0xa) * 0x2;
      }
      var _0x40300f = _0x550351.find('.mvp-player-wrap');
      var _0x139c5b = _0x550351.find(".mvp-media-holder").show();
      var _0x349f0e = _0x550351.find(".mvp-playlist-holder");
      var _0x2b0f45 = _0x550351.find(".mvp-playlist-inner");
      var _0x223a1c = _0x550351.find(".mvp-playlist-content");
      var _0x368208 = _0x550351.find('.mvp-playlist-filter-msg');
      var _0x107649 = _0x550351.find('.mvp-subtitle-holder').css("display", "none");
      var _0x2a65bd = _0x550351.find(".mvp-subtitle-holder-inner").attr("aria-hidden", true);
      var _0x474086 = _0x550351.find('.mvp-annotation-holder').css('display', "none");
      var _0x93b161 = _0x550351.find(".mvp-player-holder").show();
      var _0x4e54ec;
      var _0x395d2f;
      var _0x40f633;
      var _0x37c5c2;
      var _0xc3f128;
      var _0x30f341;
      var _0x3ccccf;
      var _0x137aae;
      var _0x456d4f;
      var _0x2fc352 = _0x550351.find(".mvp-player-controls");
      var _0x150ab5 = _0x550351.find(".mvp-player-controls-bottom");
      var _0x8f9621 = _0x550351.find(".mvp-playback-toggle");
      var _0x40d4b4 = _0x550351.find(".mvp-media-time-current").html("00:00");
      var _0x5ec4e4 = _0x550351.find(".mvp-media-time-separator");
      var _0xc5351f = _0x550351.find(".mvp-media-time-total").html("00:00");
      var _0x4afc0f = _0x550351.find(".mvp-preview-seek-wrap");
      var _0x33e7c8 = _0x550351.find(".mvp-preview-seek-inner");
      var _0x4a3e7d = _0x550351.find(".mvp-preview-seek-info");
      var _0xd5f952 = _0x550351.find(".mvp-seekbar");
      var _0x8083b8 = _0x550351.find(".mvp-progress-bg");
      var _0x583d93 = _0x550351.find(".mvp-load-level");
      var _0x1808b1 = _0x550351.find(".mvp-progress-level");
      var _0x3e24c7 = _0x550351.find('.mvp-solo-seekbar');
      var _0x381e37 = _0x550351.find(".mvp-solo-progress-bg");
      var _0x134a79 = _0x550351.find(".mvp-solo-progress-level");
      var _0x19b5b0 = _0x550351.find(".mvp-volume-wrapper");
      var _0x59a813 = _0x550351.find('.mvp-volume-toggle');
      var _0xb23a7f = _0x550351.find('.mvp-volume-seekbar');
      var _0x42f6a9 = _0x550351.find('.mvp-volume-bg');
      var _0x21669c = _0x550351.find(".mvp-volume-level");
      var _0x54beb6 = _0x550351.find(".mvp-info-holder");
      var _0x43145f = _0x550351.find('.mvp-info-toggle').hide();
      var _0x557762;
      var _0x41586a = _0x550351.find('.mvp-player-title');
      var _0x5bc14f = _0x550351.find(".mvp-player-desc");
      var _0x2a430a = _0x550351.find(".mvp-pwd-holder");
      var _0x6880b5 = _0x550351.find(".mvp-pwd-field");
      var _0x5da6f7 = _0x550351.find(".mvp-pwd-error").text();
      var _0x2f574b = _0x550351.find(".mvp-playlist-toggle");
      var _0x43db09 = _0x550351.find(".mvp-player-loader").show();
      var _0x105ccb = _0x550351.find('.mvp-big-play');
      var _0x2cccd5 = _0x550351.find(".mvp-loop-toggle");
      var _0x58a309 = _0x550351.find(".mvp-shuffle-toggle");
      var _0x54ba97 = _0x550351.find(".mvp-download-toggle").hide();
      var _0x4d7e30 = _0x550351.find('.mvp-share-toggle');
      var _0x170382 = _0x550351.find(".mvp-share-holder");
      var _0x5298b7 = _0x550351.find(".mvp-embed-toggle");
      var _0x2f0466 = _0x550351.find(".mvp-embed-holder");
      var _0x4f6174 = _0x550351.find(".mvp-age-verify-holder");
      var _0x45b7ac = _0x550351.find(".mvp-resume-holder");
      var _0x328347 = _0x550351.find(".mvp-resume-header-title");
      var _0x4b9c93;
      var _0x253de7 = _0x550351.find(".mvp-live-note");
      var _0x6abeef = _0x550351.find(".mvp-upnext-wrap");
      var _0x37f960 = _0x6abeef.find('.mvp-upnext-thumb');
      var _0x5b7298 = _0x6abeef.find(".mvp-upnext-title");
      var _0xe29369 = _0x6abeef.find(".mvp-upnext-duration");
      var _0x30553b = _0x550351.find(".mvp-upnext-wrap2");
      var _0xbd16b4 = _0x30553b.find(".mvp-upnext-thumb");
      var _0x3fba55 = _0x30553b.find(".mvp-upnext-header");
      var _0x2b9734 = _0x30553b.find(".mvp-upnext-title");
      var _0x5cf8bf = _0x30553b.find(".mvp-upnext-duration");
      var _0x276f15 = _0x550351.find(".mvp-next-toggle");
      var _0x376393 = _0x550351.find('.mvp-previous-toggle');
      var _0xc5e786 = _0x550351.find(".mvp-rewind-toggle");
      var _0xf7f71 = _0x550351.find(".mvp-skip-backward-toggle");
      var _0xf39bf5 = _0x550351.find(".mvp-skip-forward-toggle");
      var _0x5dbf79 = _0x550351.find(".mvp-settings-toggle");
      var _0x14c00e = _0x550351.find(".mvp-playback-rate-menu");
      var _0x4098c6 = _0x550351.find(".mvp-quality-menu");
      var _0xb4a765 = _0x550351.find('.mvp-quality-settings-menu');
      var _0x2fbe78 = _0x550351.find(".mvp-subtitle-menu");
      var _0x173279 = _0x550351.find(".mvp-subtitle-settings-menu");
      var _0xde9b71 = _0x550351.find(".mvp-audio-language-menu");
      var _0x1cfeb1 = _0x550351.find('.mvp-audio-language-toggle').hide();
      var _0x184606 = _0x550351.find(".mvp-audio-language-settings-menu");
      var _0xc54ce2 = _0x550351.find(".mvp-pip-toggle").hide();
      var _0xcc1b36 = _0x550351.find('.mvp-cc-toggle').hide();
      var _0x225e48;
      var _0x290120 = _0x550351.find(".mvp-vr-toggle").hide();
      var _0x4fa334 = _0x550351.find(".mvp-theater-toggle");
      var _0x3594f0 = _0x550351.find(".mvp-unmute-toggle");
      var _0x591853 = _0x550351.find(".mvp-airplay-toggle").hide();
      var _0x1391aa = _0x550351.find(".mvp-comingnext-holder");
      var _0x4abb38 = _0x550351.find(".mvp-comingnext-poster-holder");
      var _0x8254b4 = _0x550351.find(".mvp-comingnext-data-title");
      var _0x6d4734 = _0x550351.find('.mvp-comingnext-timer-circle-stroke');
      var _0x2c13d5 = _0x550351.find(".mvp-comingnext-timer-wrap");
      var _0x6a660f = _0x550351.find(".mvp-comingnext-cancel");
      var _0x5da90c = _0x550351.find(".mvp-redirect-login-holder-download");
      var _0x3abc2b = _0x550351.find(".mvp-redirect-login-holder-watch");
      var _0x5e0ad8;
      var _0x181688 = _0x550351.find(".mvp-rel-holder");
      var _0x192b7c = _0x550351.find('.mvp-chapter-toggle').hide();
      var _0x1fb1a7 = _0x550351.find(".mvp-next-chapter-toggle").hide();
      var _0x482062 = _0x550351.find(".mvp-prev-chapter-toggle").hide();
      var _0x24730b = _0x550351.find(".mvp-chapter-menu-holder");
      var _0xe72265 = _0x550351.find(".mvp-chapter-menu");
      var _0x3c9582 = _0x550351.find(".mvp-chapters-holder");
      var _0x43ed9f = _0x3c9582.find(".mvp-chapters-container");
      var _0x40f459 = _0x550351.find('.mvp-transcript-toggle').hide();
      var _0x5d6224 = _0x49c9b1.transcriptHolder ? _0x2c8ffb(_0x49c9b1.transcriptHolder) : _0x550351.find(".mvp-transcript-holder");
      var _0x9bf06b = _0x5d6224.find(".mvp-transcript-header-title");
      var _0x47df84 = _0x5d6224.find('.mvp-transcript-container-wrap');
      var _0x22585a = _0x5d6224.find(".mvp-transcript-container");
      var _0xde616a = _0x5d6224.find(".mvp-transcript-language-selector-wrap");
      var _0x407a4a = _0x5d6224.find(".mvp-transcript-language-selector");
      var _0x14c769 = _0x550351.find(".mvp-playlist-selector-holder");
      var _0xe082c5 = _0x550351.find('.mvp-playlist-selector-container');
      var _0x42ed3c = _0x550351.find(".mvp-playlist-selector-header-title");
      var _0x311cf2 = _0x550351.find('.mvp-playlist-selector-header-icon');
      var _0x777f09 = _0x550351.find(".mvp-ad-seekbar");
      var _0x184401 = _0x550351.find(".mvp-ad-progress-bg");
      var _0x4f3fc8 = _0x550351.find(".mvp-ad-load-level");
      var _0xd6cb33 = _0x550351.find(".mvp-ad-progress-level");
      var _0x2ed8f8 = _0x550351.find(".mvp-ad-info-time");
      var _0x32f14f = _0x550351.find(".mvp-ad-skip-btn");
      var _0xe0388 = _0x550351.find(".mvp-ad-skip-msg");
      var _0x2fa554 = _0x550351.find(".mvp-ad-skip-msg-text");
      var _0x3ae78e = _0x2fa554.html();
      var _0x56e131 = _0x550351.find(".mvp-ad-skip-msg-end");
      var _0x20f53c = _0x550351.find(".mvp-ad-skip-thumb");
      var _0x55a107 = _0x550351.find(".mvp-ad-controls");
      var _0x247928 = _0x550351.find(".mvp-ad-info-start");
      var _0x131d9c = _0x550351.find(".mvp-ad-info-start-time");
      var _0x521020;
      if (_0x49c9b1.playerClass) {
        var _0x3f257f = _0x49c9b1.playerClass;
      } else {
        var _0x123da8 = _0x49c9b1.skin;
        var _0x2b1fae = _0x49c9b1.navigationType || '';
        var _0x59a538 = _0x49c9b1.playlistPosition || '';
        var _0x58851f = '';
        var _0x157e29 = _0x49c9b1.playlistStyle || '';
        var _0x4c0592 = _0x49c9b1.playerShadow || '';
        if (_0x59a538 == 'hb') {
          if (_0x2b1fae == "buttons") {
            if (_0x157e29 == "dot" || _0x157e29 == "drot") {
              _0x58851f = _0x49c9b1.navigationStyle;
            }
          }
        }
        if (_0x59a538 == "no-playlist") {
          _0x157e29 = '';
        }
        if (_0x59a538 == "vrb" || _0x59a538 == 'vb' || _0x59a538 == 'hb') {} else {
          _0x2b1fae = '';
          _0x58851f = '';
        }
        if (_0x59a538 == "vrb" || _0x59a538 == 'vb' || _0x59a538 == 'hb' || _0x59a538 == "no-playlist") {} else {
          _0x4c0592 = '';
        }
        if (_0x59a538 == "outer" || _0x59a538 == "wall") {
          if (_0x157e29 != 'gdot' && _0x157e29 != "gdbt" && _0x157e29 != "gdrot") {
            _0x157e29 = "gdot";
          }
        } else {
          if (_0x59a538 == 'vrb' || _0x59a538 == 'vb' || _0x59a538 == 'hb') {
            if (_0x157e29 != 'dot' && _0x157e29 != "drot") {
              _0x157e29 = "drot";
            }
          }
        }
        var _0x1898dd = 'v';
        if (_0x59a538 == 'hb') {
          _0x1898dd = 'h';
        }
        var _0x3f257f = "mvp-player mvp-skin-" + _0x123da8 + '';
        if (!MVPUtils.isEmpty(_0x59a538)) {
          _0x3f257f += " mvp-" + _0x59a538;
        }
        if (!MVPUtils.isEmpty(_0x2b1fae)) {
          if (_0x2b1fae == "scroll-browser") {
            _0x3f257f += " mvp-nt-scroll";
          } else {
            _0x3f257f += " mvp-nt-" + _0x2b1fae;
          }
        }
        if (!MVPUtils.isEmpty(_0x58851f)) {
          _0x3f257f += " mvp-ns-" + _0x58851f;
        }
        if (!MVPUtils.isEmpty(_0x157e29)) {
          _0x3f257f += " mvp-ps-" + _0x157e29;
          if (_0x157e29 == 'dot' && _0x49c9b1.autoPlaylistStyleVrbSwitch) {
            _0x521020 = true;
          }
        }
        if (!MVPUtils.isEmpty(_0x4c0592)) {
          _0x3f257f += " mvp-" + _0x4c0592 + " mvp-shadow-effect-hidden";
        }
        _0x49c9b1.navigationDirection = _0x1898dd;
        _0x49c9b1.navigationType = _0x2b1fae;
      }
      if (_0x58851f == "spaced") {
        if (_0x349f0e.find(".mvp-nav-backward-horizontal").length == 0x0) {
          _0x2c8ffb("<div class=\"mvp-nav-backward mvp-nav-backward-horizontal mvp-contr-btn\"><svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 192 512\"><path d=\"M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z\"></path></svg></div><div class=\"mvp-nav-forward mvp-nav-backward-horizontal mvp-contr-btn\"><svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 192 512\"><path d=\"M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z\"></path></svg></div></div>").appendTo(_0x349f0e);
        }
      }
      if (_0x2b1fae == "scroll-browser") {
        if (_0x59a538 == "vrb" || _0x59a538 == 'vb') {
          _0x2b0f45.addClass("mvp-scroll-content mvp-scrollable-y");
        } else if (_0x59a538 == 'hb') {
          _0x2b0f45.addClass("mvp-scroll-content mvp-scrollable-x");
        }
      }
      _0x550351.addClass(_0x3f257f);
      if (_0x59a538 == "wall") {
        _0x49c9b1.playerType = 'lightbox';
        _0x49c9b1.playlistOpened = true;
        _0x2f574b.remove();
      } else {
        if (_0x59a538 == "outer") {
          _0x49c9b1.playerType = 'normal';
          _0x49c9b1.minimizeOnScroll = false;
          _0x49c9b1.hidePlaylistOnFullscreenEnter = false;
        } else if (_0x59a538 == "no-playlist") {
          _0x116683 = false;
          _0x349f0e.remove();
          _0x2f574b.remove();
        }
      }
      if (_0x49c9b1.playerType == "lightbox") {
        _0x49c9b1.autoPlayInViewport = false;
        _0x49c9b1.minimizeOnScroll = false;
        _0x49c9b1.hidePlaylistOnFullscreenEnter = false;
        _0x4fa334.remove();
      }
      if (_0x49c9b1.minimizeOnScroll && _0x49c9b1.useMinimizeCloseBtn) {
        _0x40300f.append("<div class=\"mvp-minimize-close mvp-contr-btn\" title=\"" + _0x49c9b1.tooltipClose + "\"><svg aria-hidden=\"true\" focusable=\"false\" role=\"img\" viewBox=\"0 0 320 512\"><path d=\"M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z\"></path></svg></div>");
      }
      if (_0x550351.find(".mvp-playlist-bar").length) {
        if (_0x59a538 == "wall" || _0x59a538 == "outer") {
          _0x550351.find('.mvp-playlist-bar').prependTo(_0x2b0f45);
        }
      }
      if (_0x49c9b1.youtubePlayerType == "default") {
        _0x49c9b1.blockYoutubeEvents = false;
      } else {
        if (_0x252083) {
          _0x49c9b1.blockYoutubeEvents = true;
        }
      }
      if (_0x49c9b1.gridType != "javascript") {
        _0x49c9b1.breakPointArr = null;
        _0x550351.addClass("mvp-grid mvp-" + _0x49c9b1.gridType);
      }
      if (_0x49c9b1.breakPointArr && _0x49c9b1.breakPointArr.length) {
        MVPUtils.keysrt(_0x49c9b1.breakPointArr, "width");
      }
      if (_0x49c9b1.elementsVisibilityArr && _0x49c9b1.elementsVisibilityArr.length) {
        MVPUtils.keysrt(_0x49c9b1.elementsVisibilityArr, "width");
      }
      if (_0x49c9b1.caption_breakPointArr && _0x49c9b1.caption_breakPointArr.length) {
        MVPUtils.keysrt(_0x49c9b1.caption_breakPointArr, "width");
      }
      if (_0x49c9b1.wrapperMaxWidth) {
        if (_0x49c9b1.playerType == "lightbox") {
          _0x3ed710.css("max-width", _0x49c9b1.wrapperMaxWidth);
        } else {
          _0x550351.css("max-width", _0x49c9b1.wrapperMaxWidth);
        }
      }
      var _0x2de201 = MVPUtils.isIOS();
      var _0x521c3e = MVPUtils.isiPhoneIpod();
      var _0xf476e5 = MVPUtils.hasFullscreen();
      var _0x463a00 = MVPUtils.hasDownloadSupport();
      var _0x921a94 = MVPUtils.volumeCanBeSet();
      var _0x4fde8d = MVPUtils.supportsWebGL();
      var _0x4ad22a = MVPUtils.canPlayMp4();
      var _0x5383a4 = MVPUtils.canPlayMp3();
      var _0x460122 = MVPUtils.canPlayWav();
      var _0x2185b0 = MVPUtils.isChrome();
      var _0x181123 = MVPUtils.hasLocalStorage();
      var _0x31e808 = document.pictureInPictureEnabled;
      var _0x241405 = _0x49c9b1.useGa && _0x49c9b1.gaTrackingId;
      var _0x40ddc8 = _0x49c9b1.playbackPositionKey + _0x49c9b1.instanceName;
      var _0xffd6ad = _0x49c9b1.instanceName + _0x49c9b1.captionStateKey;
      var _0x1de04b = _0x49c9b1.playlistItemContent.replace(/\s+/g, '').split(',');
      var _0x18ce02 = _0x49c9b1.vimeoThumbSize.substr(0x0, _0x49c9b1.vimeoThumbSize.indexOf('x'));
      var _0x442e51 = !!(!_0x2de201 && _0x49c9b1.useAudioEqualizer && (window.AudioContext || window.webkitAudioContext));
      var _0x208e6f = _0x2c8ffb(_0x49c9b1.playlistList);
      var _0x4d248d = _0x49c9b1.autoPlay;
      var _0x1ac3d7 = _0x49c9b1.volume;
      var _0x41a8e7 = _0x49c9b1.volume;
      var _0x34efa1 = _0x49c9b1.volume || 0.5;
      var _0x588042;
      var _0x18e092;
      var _0x3a2359;
      var _0x10a096;
      var _0x588a79 = false;
      var _0x547090 = true;
      var _0x58b362;
      var _0x3174a1;
      var _0x3d4743;
      var _0x1d04e3;
      var _0x2d0ff2;
      var _0x1c7baf;
      var _0x196418;
      var _0x3e776d;
      var _0x5bea3f;
      var _0x24d23e;
      var _0x1d567f;
      var _0x20063;
      var _0x2d3b7c = _0x49c9b1.addMoreOnTotalScroll;
      var _0x5ca0d3 = this;
      var _0x5215aa = _0x2c8ffb("body");
      var _0x48f7fc = _0x2c8ffb(window);
      var _0x1e590e = _0x2c8ffb(document);
      var _0x2c0825 = _0x2c8ffb("html");
      var _0xe7c29a = 0x0;
      var _0x4de4d8 = 0x0;
      var _0x4e5836;
      var _0xda4773;
      var _0x295725;
      var _0x4ac7b1;
      var _0x107c46;
      var _0x4b0daf = [];
      var _0xb63b8e;
      var _0x1a96c8;
      var _0x48707c;
      var _0xca3476;
      var _0x15885c;
      var _0x5a3ed3;
      var _0x31f22e;
      var _0x34f818;
      var _0x1450dc;
      var _0x465438;
      var _0x200cb8;
      var _0x2aa7b0;
      var _0x142a3d;
      var _0x28982f = 'scroll.minimize' + _0x49c9b1.instanceName;
      var _0x454d29 = "scroll.autoplay" + _0x49c9b1.instanceName;
      var _0x14ea2c;
      var _0x5777b3;
      var _0x3bc623;
      var _0x3ea903;
      var _0x2cb5ab;
      var _0x5a295c;
      var _0x34e44f;
      var _0x3fd320;
      var _0x482aec = [];
      var _0x59f04a;
      var _0x93df37;
      var _0x4b39ef = ["audio", 'video', "image", "youtube_single", 'vimeo_single', 'hls', 'dash'];
      var _0x25274f;
      var _0x253f76;
      var _0x3ddf01;
      var _0x150a20;
      var _0x15d7aa;
      var _0x7d70e4;
      var _0xc2740a;
      var _0x230bed;
      var _0x19a052;
      var _0x52ee22 = window.MediaSource;
      var _0x24e723;
      var _0x597437;
      var _0x102548;
      var _0xc91741;
      var _0x14af6d;
      var _0x30e28d;
      var _0x143642;
      var _0x4a6fa4;
      var _0xb8e3f0;
      var _0x5cecc4;
      var _0x39440f;
      var _0x29a19c;
      var _0x27da1e;
      var _0x4bdd56;
      var _0x153050;
      var _0x27703d;
      var _0x326462;
      var _0x5ac143;
      var _0x305a54;
      var _0x5ab3f4;
      var _0x350714;
      var _0x44abc3;
      var _0x589fef;
      var _0x51f1e6;
      var _0x1a0066;
      var _0x13e949;
      var _0x5839b0;
      var _0x51d4a7;
      var _0x5c7de9;
      var _0xaa9921;
      var _0x24e760;
      var _0x404808;
      var _0x4f5c87 = _0x49c9b1.vimeoPlayerType;
      var _0x1a10e0;
      var _0x3242a7;
      var _0x4a0ad6;
      var _0xca0949;
      var _0x3e4b12;
      var _0x3562ec;
      var _0x2f1036;
      var _0x6c4700;
      var _0x1e793d;
      var _0x5b30dc;
      var _0x17e176 = 0x0;
      var _0x34dba9 = 0x0;
      var _0x34c8d8 = 0x0;
      var _0x1cfe6a;
      var _0x5ee613 = true;
      var _0x3b71ee;
      var _0x395fdc;
      var _0x65bc27;
      var _0x1e5081;
      var _0x5a34d3;
      var _0x58a9f1;
      var _0x63d6ae;
      var _0x45dc47;
      var _0x54d105;
      var _0x1ced73;
      var _0x2f9a71;
      var _0x1717e3;
      var _0x136c1a;
      var _0x4bb4f5;
      var _0x1a12a5;
      var _0x5438f1;
      var _0x57d2e3;
      var _0x1b0251;
      var _0x12a6ec;
      var _0x247878;
      var _0x5e604f;
      var _0x27eae9 = [];
      var _0x50fbba;
      var _0x195faa;
      var _0x3861a2;
      var _0xa5b163;
      var _0x3fc13f;
      var _0x428281;
      var _0x42fcc0;
      var _0x27a4c3;
      var _0x5e4188;
      var _0x5b8150;
      var _0x1dd13b;
      var _0x10eb38;
      var _0x35ea59;
      var _0x3f8d85;
      var _0x59c0f8;
      var _0x341968;
      var _0x223ac1;
      var _0x54dec0 = [];
      var _0x53e109;
      var _0x2aa1b2;
      var _0x1fab36;
      var _0x24fb02 = [];
      var _0x19ddcc;
      var _0x266764;
      var _0x3d30f6;
      var _0x511fa7;
      var _0x5b8e61;
      var _0x4d273c;
      var _0x52d665;
      var _0x1085bb;
      var _0x8a1273 = [];
      var _0x4b8613;
      var _0xaad07c;
      var _0x225c56;
      var _0x1667c6;
      var _0x1f950b;
      var _0x1bc84b;
      var _0xd5157e;
      var _0x31c70b;
      var _0x4204d7;
      var _0x2f08fa;
      var _0xb138fb;
      var _0x544686 = "mvp-av-key-" + _0x49c9b1.instanceName;
      var _0x1b10ac;
      var _0x17ac30 = true;
      var _0xac8d7e;
      var _0x9808af;
      var _0x5af44a;
      var _0x5390c3;
      var _0x4f5c86;
      var _0x3d64b6;
      var _0xd3a404;
      var _0x3f2b4f;
      var _0x5561a0 = -0x1;
      var _0x1eed68 = [];
      var _0x234582 = [];
      var _0x2a1553 = [];
      var _0x4a08ff = [];
      var _0x2a1113;
      var _0x55db69;
      var _0x33f920;
      var _0x2e785a;
      var _0x99f1ea;
      var _0x2d202a;
      var _0x26ae05;
      var _0x50dbc5;
      var _0x4c6cc5;
      var _0xda6036;
      var _0x5e09b9;
      var _0x5de40b;
      var _0x3d45f3;
      var _0x2185d8;
      var _0x387696;
      var _0x529d63 = [];
      var _0x5d71e2 = [];
      var _0x275e34;
      var _0x5bab07;
      var _0x2c4751;
      var _0x494165;
      var _0x929f53;
      var _0x54c3c8;
      var _0x360693;
      var _0x5ec64c;
      var _0x33a975;
      var _0x2f3da0;
      var _0x357692;
      var _0x457ad4;
      var _0x32d922;
      var _0x2060ea;
      var _0x4a105b;
      var _0x53f505;
      var _0x20c1ed;
      var _0x1cedbb;
      var _0x182de3;
      var _0x3deea2;
      var _0x37cc09;
      var _0x153025;
      var _0x2804ba;
      var _0xfaf57a;
      var _0x8bc5df;
      var _0x50164f;
      var _0x124dbc;
      var _0x482968;
      var _0x44187c;
      var _0x5d120f;
      var _0xf5f6c0;
      var _0x18208a;
      var _0x6b9097;
      var _0x3c1510;
      var _0x576097;
      var _0x389602 = 0x0;
      var _0x1b6859;
      var _0x5e08d1 = [];
      var _0x488eee;
      var _0x5e7bb7;
      var _0x5589a0;
      var _0x5b9357;
      var _0x2cfea7;
      var _0x126d5c;
      var _0x956980;
      var _0x2ccb1a;
      var _0xa19aec;
      var _0x5d4070;
      var _0x1dcb4a;
      var _0x484953;
      var _0x114c06;
      var _0x3911a2 = 0x0;
      var _0x1baffa;
      var _0x4859b1;
      var _0x395507;
      var _0x319b1b = [];
      var _0x28e3ab;
      var _0x450dd1 = [];
      var _0x420869 = [];
      var _0x3e7915;
      var _0x329c6d;
      var _0x35e6d6;
      var _0x9f0b79;
      var _0x2cec26;
      var _0x52e080 = [];
      var _0x6a32cc = null;
      var _0x415799;
      var _0x4fa790;
      var _0xfe5fe6;
      var _0x8aad2e;
      var _0xd32047;
      var _0x2cc5c3;
      var _0x183900;
      var _0x4a9ebf;
      var _0x3f7bc0;
      var _0x27d391;
      var _0x56995a;
      var _0x247c95;
      var _0x298f2c;
      var _0x5560e8 = _0x49c9b1.useCache && 'indexedDB' in window && typeof _0x49c9b1.cacheTime != undefined;
      var _0x4ba915;
      var _0x455de6;
      var _0x3d3884;
      var _0x2bfc70 = true;
      var _0x5d5562;
      var _0x19562e = true;
      if (_0x49c9b1.showVideoTitle || _0x49c9b1.showChapterTitle) {
        _0x557762 = _0x2c8ffb("<div class=\"mvp-video-title\"></div>").insertAfter(_0x139c5b);
      }
      if (!_0x181123) {
        _0x49c9b1.rememberPlaybackPosition = false;
      }
      if (_0x49c9b1.currentUserRoles) {
        _0x4ba915 = _0x49c9b1.currentUserRoles.split(',');
      }
      if (_0x49c9b1.downloadVideoUserRoles) {
        _0x455de6 = _0x49c9b1.downloadVideoUserRoles.split(',');
      }
      if (_0x4ba915 && _0x455de6) {
        _0x2bfc70 = MVPUtils.arrayContainsAnotherArray(_0x455de6, _0x4ba915);
      }
      if (_0x49c9b1.viewVideoWithoutAdsUserRoles) {
        _0x5d5562 = _0x49c9b1.viewVideoWithoutAdsUserRoles.split(',');
      }
      if (_0x49c9b1.viewVideoWithoutAdsForLoggedInUser && _0x49c9b1.isUserLoggedIn) {
        _0x19562e = false;
      }
      if (_0x4ba915 && _0x5d5562) {
        _0x19562e = !MVPUtils.arrayContainsAnotherArray(_0x5d5562, _0x4ba915);
      }
      if (_0x49c9b1.playlistContent) {
        _0x223a1c = _0x2c8ffb(_0x49c9b1.playlistContent);
      }
      if (_0x1ac3d7 < 0x0) {
        _0x1ac3d7 = 0x0;
      } else {
        if (_0x1ac3d7 > 0x1) {
          _0x1ac3d7 = 0x1;
        }
      }
      _0x49c9b1.volume = _0x1ac3d7;
      window.playlistScrollLoading = false;
      if (typeof window.ap_mediaArr === 'undefined') {
        window.ap_mediaArr = [];
      }
      ap_mediaArr.push({
        'inst': _0x5ca0d3,
        'id': _0x49c9b1.instanceName
      });
      if (_0x223a1c.length == 0x0) {
        _0x223a1c = _0x2c8ffb("<div style=\"display:none;\"></div>");
        _0x59a538 = "no-playlist";
        _0x116683 = false;
        _0x2b1fae = '';
      }
      if (_0x49c9b1.playlistPosition == "outer" || _0x49c9b1.playlistPosition == "wall") {
        if (_0x550351.find(".mvp-load-more-btn").length == 0x0) {
          _0x349f0e.append("<div class=\"mvp-load-more-btn\">LOAD MORE</div>");
        }
      }
      var _0x45d18d = _0x550351.find(".mvp-load-more-btn").on("click", function () {
        if (!_0x588a79) {
          return false;
        }
        if (_0x58b362) {
          return false;
        }
        if (_0x20063) {
          _0x5ca0d3.loadMore();
        } else if (_0x2d3b7c) {
          _0x3859ca();
        }
        _0x45d18d.css("opacity", 0x0);
      });
      if (_0x252083) {
        if (typeof _0x2c8ffb.fn.swipe === "undefined") {
          var _0xdcb1d = document.createElement("script");
          _0xdcb1d.type = "text/javascript";
          if (!MVPUtils.relativePath(_0x49c9b1.jquery_touchSwipe)) {
            var _0x42a698 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.jquery_touchSwipe);
          } else {
            var _0x42a698 = _0x49c9b1.jquery_touchSwipe;
          }
          _0xdcb1d.src = _0x42a698;
          _0xdcb1d.onload = _0xdcb1d.onreadystatechange = function () {
            if (!this.readyState || this.readyState == 'complete') {
              _0x364117();
            }
          };
          _0xdcb1d.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x654e32 = document.getElementsByTagName("script")[0x0];
          _0x654e32.parentNode.insertBefore(_0xdcb1d, _0x654e32);
        } else {
          _0x364117();
        }
      }
      function _0x364117() {
        _0x139c5b.swipe({
          'swipeLeft': function (_0x319f3b, _0x5497ba, _0x443be4, _0x50087e, _0x2883a8, _0x53e832) {
            if (!_0x588a79) {
              return false;
            }
            if (_0xaad07c == "audio" || _0xaad07c == "video" && !_0x1450dc.is360 || _0xaad07c == "image" && !_0x1450dc.is360 || _0xaad07c == 'youtube' && _0x49c9b1.youtubePlayerType == "chromeless" && !_0x1450dc.is360 || _0xaad07c == 'vimeo' && _0x4f5c87 == "chromeless" && !_0x1450dc.is360) {
              _0x3199b6();
            }
          },
          'swipeRight': function (_0x159d75, _0x5ebba3, _0x4a4b6e, _0x274c72, _0x3a6e3a, _0x13c024) {
            if (!_0x588a79) {
              return false;
            }
            if (_0xaad07c == 'audio' || _0xaad07c == "video" && !_0x1450dc.is360 || _0xaad07c == "image" && !_0x1450dc.is360 || _0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == 'chromeless' && !_0x1450dc.is360 || _0xaad07c == "vimeo" && _0x4f5c87 == 'chromeless' && !_0x1450dc.is360) {
              _0x37d09c();
            }
          }
        });
      }
      if (_0x49c9b1.playerType == "lightbox") {
        _0x2bf661.on('click', function () {
          _0x5ca0d3.closeLightbox();
        });
        if (_0x49c9b1.clickOnBackgroundClosesLightbox) {
          _0x5d2f80.on("click", function (_0x8e9d69) {
            if (_0x8e9d69.target == this) {
              _0x5ca0d3.closeLightbox();
            }
          });
        }
        _0x24e52b.on("click", function (_0x431768) {
          _0x431768.stopImmediatePropagation();
          _0x37d09c();
        });
        _0x490e7f.on('click', function (_0x1ae3b8) {
          _0x1ae3b8.stopImmediatePropagation();
          _0x3199b6();
        });
      }
      if (_0x49c9b1.useVideoTransform) {
        _0x56995a = new MVPTransformManager({
          'settings': _0x49c9b1,
          'mediaHolder': _0x139c5b
        });
      }
      _0x54ba97.on('click', function (_0x566579) {
        _0x2c8ffb(_0x5ca0d3).trigger("mediaDownload", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'media': _0x1450dc
        });
        if (_0x241405 && typeof ga !== "undefined") {
          ga('send', {
            'hitType': "event",
            'eventCategory': "Modern video player: " + _0x49c9b1.instanceName,
            'eventAction': "downloaded",
            'eventLabel': "Video title: " + _0x1450dc.title,
            'nonInteraction': true
          });
        }
        if (_0x49c9b1.restrictDownloadForLoggedInUser && !_0x49c9b1.isUserLoggedIn || !_0x2bfc70) {
          _0x45aac9("download");
          return false;
        }
        if (_0x49c9b1.useStatistics) {
          _0x145691('mvp_download_count', _0x48707c);
        }
      });
      if (_0x241405) {
        if (!window.ga) {
          (function (_0x260415, _0x7bcc87, _0x2c62f3, _0x44b9e6, _0x5e2fa0, _0x19612f, _0x54f539) {
            _0x260415.GoogleAnalyticsObject = _0x5e2fa0;
            _0x260415[_0x5e2fa0] = _0x260415[_0x5e2fa0] || function () {
              (_0x260415[_0x5e2fa0].q = _0x260415[_0x5e2fa0].q || []).push(arguments);
            };
            _0x260415[_0x5e2fa0].l = 0x1 * new Date();
            _0x19612f = _0x7bcc87.createElement(_0x2c62f3);
            _0x54f539 = _0x7bcc87.getElementsByTagName(_0x2c62f3)[0x0];
            _0x19612f.async = 0x1;
            _0x19612f.src = _0x44b9e6;
            _0x54f539.parentNode.insertBefore(_0x19612f, _0x54f539);
          })(window, document, "script", "https://www.google-analytics.com/analytics.js", 'ga');
        }
        ga("create", _0x49c9b1.gaTrackingId, "auto");
        ga("send", "pageview");
      }
      if (!(_0x49c9b1.theaterElement && !MVPUtils.isEmpty(_0x49c9b1.theaterElement) && _0x49c9b1.theaterElementClass && !MVPUtils.isEmpty(_0x49c9b1.theaterElementClass))) {
        delete _0x49c9b1.theaterElement;
      }
      if (_0x49c9b1.autoPlayInViewport || _0x49c9b1.autoPlayAfterFirst) {
        _0x4d248d = false;
      }
      if (_0x4d248d || _0x49c9b1.autoPlayInViewport) {
        _0x1ac3d7 = 0x0;
        _0x49c9b1.volume = 0x0;
        if (_0x49c9b1.autoPlayInViewport && _0x41a8e7 != 0x0) {
          _0x1e590e.on("mousedown.apmvp, keydown.apmvp", function () {
            _0x1e590e.off("mousedown.apmvp, keydown.apmvp");
            if (!_0x5777b3) {
              _0x5777b3 = true;
              if (!_0x511fa7) {
                if (_0x326462) {
                  _0x367db0();
                }
              }
            }
          });
        }
      }
      if (_0x36b677) {
        if (_0x49c9b1.displayPosterOnMobile) {
          _0x4d248d = false;
          _0x49c9b1.autoPlayInViewport = false;
        }
      } else {
        _0x49c9b1.displayPosterOnMobile = false;
      }
      if (location.href.indexOf("apmvp/includes/embed.php?") > -0x1 && _0x49c9b1.hideEmbedFunctionWhenEmbeded) {
        _0x5298b7.remove();
        _0x2f0466.remove();
      }
      if (!_0x116683) {
        _0x49c9b1.playlistOpened = false;
        _0x349f0e.remove();
      }
      if (_0x521c3e) {
        _0xc54ce2.remove();
      }
      if (!_0x4fde8d) {
        _0x5ee613 = false;
        if (_0x2185b0) {
          console.log("Turn Hardware Acceleration On Within Chrome Browser to enable 360 videos!");
        }
      } else {
        if (_0x49c9b1.vrInfoImage) {
          _0x4b9c93 = _0x2c8ffb("<img class=\"mvp-vr-info\" src=\"" + _0x49c9b1.vrInfoImage + "\" alt=\"drag\">").insertAfter(_0x139c5b);
        }
      }
      if (location.href.indexOf("https:") != -0x1 && 'xr' in navigator) {
        navigator.xr.isSessionSupported("immersive-vr").then(function (_0x380ef5) {
          if (_0x380ef5) {
            _0x1a12a5 = true;
          } else {
            _0x1a12a5 = false;
          }
        });
      } else {
        if (window.isSecureContext === false) {} else {}
      }
      async function _0x22632b(_0x226635) {
        _0x226635.addEventListener("end", _0x3b8b54);
        await _0x54d105.xr.setSession(_0x226635);
        _0x4bb4f5 = _0x226635;
      }
      function _0x3b8b54() {
        _0x4bb4f5.removeEventListener("end", _0x3b8b54);
        _0x4bb4f5 = null;
      }
      if (_0x59a538 == 'hb' && _0x1898dd == 'v') {
        _0x349f0e.css({
          'height': _0x49c9b1.playlistBottomHeight
        });
      }
      var _0x38d31a = _0x2de201 ? 'pagehide' : "beforeunload";
      var _0x507d3f = window.attachEvent || window.addEventListener;
      if (_0x49c9b1.rememberPlaybackPosition) {
        _0x507d3f(_0x38d31a, function (_0x3ffa34) {
          if (window.event) {
            window.event.cancelBubble = true;
          }
          _0x2010bb();
        });
      }
      function _0x2010bb() {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        var _0x5a6195 = {
          'activePlaylist': _0x200cb8,
          'volume': _0x1ac3d7,
          'activeItem': _0x48707c,
          'playbackPositionTime': parseInt(_0x5ca0d3.getCurrentTime(), 0xa)
        };
        if (_0x49c9b1.rememberPlaybackPosition == "all") {
          var _0x5c6d50;
          var _0x4109cb = [];
          var _0x4f690c;
          for (_0x5c6d50 = 0x0; _0x5c6d50 < _0x142a3d; _0x5c6d50++) {
            _0x4f690c = _0x1eed68[_0x5c6d50].data;
            if (_0x4f690c.start) {
              _0x4109cb.push({
                'active_playlist': _0x200cb8,
                'title': _0x4f690c.title,
                'start': _0x4f690c.start
              });
            }
          }
          _0x5a6195.lastPositionArr = _0x4109cb;
        }
        localStorage.setItem(_0x40ddc8, JSON.stringify(_0x5a6195));
      }
      _0x6abeef.find(".mvp-upnext-close").on("click", function () {
        _0x6abeef.removeClass("mvp-upnext-on mvp-upnext-visible");
        _0x33f920 = true;
      });
      _0x37f960.on("click", function () {
        _0x6abeef.removeClass("mvp-upnext-on mvp-upnext-visible");
        _0x3199b6();
      });
      _0x5b7298.on("click", function () {
        _0x6abeef.removeClass("mvp-upnext-on mvp-upnext-visible");
        _0x3199b6();
      });
      _0x32f14f.on("click", function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0x395507 || !_0x35e6d6) {
          return false;
        }
        if (_0x395507) {
          if (_0x1450dc.TrackingEvents) {
            _0x58e9d8("skip");
          }
          _0x2c8ffb(_0x5ca0d3).trigger("adSkip", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        }
        _0x2af768();
      });
      _0x474086.on("click", ".mvp-annotation-close", function () {
        if (_0x49c9b1.showAnnotationsOnlyOnce) {
          var _0x596b77 = _0x2c8ffb(this).closest(".mvp-annotation");
          var _0x4e2609 = _0x596b77.attr("data-id");
          var _0x3d1f21;
          var _0x40a70f = _0x52e080.length;
          _0x596b77.remove();
          for (_0x3d1f21 = 0x0; _0x3d1f21 < _0x40a70f; _0x3d1f21++) {
            if (_0x4e2609 == _0x52e080[_0x3d1f21].id) {
              _0x52e080.splice(_0x3d1f21, 0x1);
              break;
            }
          }
        } else {
          _0x2c8ffb(this).closest(".mvp-annotation").hide();
        }
      });
      _0x474086.on("click", '.mvp-annotation-non-linear', function () {
        if (_0x1f950b) {
          _0x5ca0d3.pauseMedia();
        }
      });
      _0x2c13d5.on("click", function () {
        _0x3199b6();
      });
      _0x6a660f.on("click", function () {
        _0x57fdf0();
        _0x51e834();
      });
      if (_0x2185b0 && window.location.protocol != 'file:' && location.href.indexOf('https:') != -0x1) {
        _0x1b6859 = true;
        _0x225e48 = _0x550351.find(".mvp-cast-toggle").hide();
        _0x49c9b1.disableRemotePlayback = 'disableRemotePlayback';
        if (_0x225e48.length) {
          _0x4626e6();
        }
      } else {
        _0x550351.find(".mvp-cast-toggle").remove();
      }
      function _0x4626e6() {
        _0x49c9b1.showPosterOnPause = true;
        _0x225e48.find(".mvp-cast-off").show();
        _0x225e48.find(".mvp-cast-on").hide();
        var _0x1da3da = document.createElement("script");
        _0x1da3da.type = 'text/javascript';
        _0x1da3da.src = 'https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1';
        _0x1da3da.onload = _0x1da3da.onreadystatechange = function () {
          if (!this.readyState || this.readyState == "complete") {
            _0x389602++;
          }
        };
        _0x1da3da.onerror = function () {
          console.log("Error loading " + this.src);
        };
        var _0x400646 = document.getElementsByTagName("script")[0x0];
        _0x400646.parentNode.insertBefore(_0x1da3da, _0x400646);
        var _0x3936b6 = document.createElement("script");
        _0x3936b6.type = "text/javascript";
        _0x3936b6.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.cast_js + "?rand=" + Math.random() * 0x5f5e0ff);
        _0x3936b6.onload = _0x1da3da.onreadystatechange = function () {
          if (!this.readyState || this.readyState == "complete") {
            _0x389602++;
          }
        };
        _0x3936b6.onerror = function () {
          console.log("Error loading " + this.src);
        };
        _0x400646.parentNode.insertBefore(_0x3936b6, _0x400646);
        var _0x4e67b3 = setInterval(function () {
          if (_0x389602 >= 0x2) {
            clearInterval(_0x4e67b3);
            _0x3c1510 = new MVPCast({
              'parent': _0x5ca0d3,
              'wrapper': _0x550351,
              'settings': _0x49c9b1,
              'btn': _0x225e48
            });
          }
        }, 0x64);
      }
      this.setIsCasting = function (_0x510aba) {
        _0x576097 = _0x510aba;
        if (_0x576097) {
          _0x550351.addClass("mvp-player-casting");
        } else {
          _0x550351.removeClass("mvp-player-casting");
        }
      };
      function _0x31275a(_0x5c17f4) {
        if (typeof MVPVastLoader === "undefined") {
          var _0x21d4fb = document.createElement('script');
          _0x21d4fb.type = "text/javascript";
          _0x21d4fb.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.vast_js);
          _0x21d4fb.onload = _0x21d4fb.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "complete") {
              _0x31275a();
            }
          };
          _0x21d4fb.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x1e9863 = document.getElementsByTagName("script")[0x0];
          _0x1e9863.parentNode.insertBefore(_0x21d4fb, _0x1e9863);
          return;
        }
        _0x35ea59 = new MVPVastLoader(_0x49c9b1);
        _0x2c8ffb(_0x35ea59).on("MVPVastLoader.END_LOAD", function (_0x214b6a, _0x1e19fc) {
          if (!_0x223ac1) {
            return;
          }
          var _0x337857;
          var _0xabc102 = _0x1e19fc.linear.length;
          var _0x8ffcca;
          for (_0x337857 = 0x0; _0x337857 < _0xabc102; _0x337857++) {
            _0x8ffcca = _0x1e19fc.linear[_0x337857];
            if (_0x8ffcca.adPre) {
              _0x319b1b.push(_0x8ffcca);
            } else {
              if (_0x8ffcca.adMid) {
                _0x420869.push({
                  'begin': _0x8ffcca.begin,
                  'data': _0x8ffcca
                });
              } else if (_0x8ffcca.adEnd) {
                _0x450dd1.push(_0x8ffcca);
              }
            }
          }
          var _0x337857;
          var _0xabc102 = _0x1e19fc.nonlinear.length;
          var _0x8ffcca;
          var _0x134e53;
          for (_0x337857 = 0x0; _0x337857 < _0xabc102; _0x337857++) {
            _0x8ffcca = _0x1e19fc.nonlinear[_0x337857];
            _0x134e53 = _0x2c8ffb("<div class=\"mvp-annotation mvp-annotation-position-bc\" data-id=\"" + _0x337857 + "\">" + "<a class=\"mvp-annotation-non-linear\" href=\"" + _0x8ffcca.link + "\" target=\"" + _0x8ffcca.target + "\">" + "<img class=\"mvp-vast-nonlinear\" src=\"" + _0x8ffcca.path + "\" alt=\"image\">" + "</a>" + "<div class=\"mvp-annotation-close mvp-annotation-close-tr\" title=\"" + _0x49c9b1.tooltipClose + "\">" + _0x49c9b1.closeIcon + '</div>' + "</div>").appendTo(_0x474086);
            _0x52e080.push({
              'id': _0x337857,
              'start': _0x8ffcca.start,
              'end': _0x8ffcca.end,
              'item': _0x134e53
            });
          }
          if (_0x52e080.length) {
            _0x474086.show();
          }
          if (_0x319b1b.length) {
            _0x28e3ab = 0x0;
            if (_0x319b1b[_0x28e3ab].type) {
              if (_0x319b1b[_0x28e3ab].data) {
                _0x1450dc = _0x319b1b[_0x28e3ab].data;
              } else {
                _0x1450dc = _0x319b1b[_0x28e3ab];
              }
            } else {
              _0x1450dc = _0x35278d(_0x319b1b[_0x28e3ab]);
            }
            _0x395507 = true;
          } else if (_0x450dd1.length) {
            _0x28e3ab = -0x1;
          }
          _0x1f4eb8();
        });
        _0x2c8ffb(_0x35ea59).on("MVPVastLoader.ERROR", function (_0x4d9cc5, _0x2c3d10) {
          console.log("MVPVastLoader.ERROR: ", _0x2c3d10);
        });
        var _0x5c17f4 = _0x1450dc.vast;
        if (_0x5c17f4.substr(-0xb) == "correlator=") {
          var _0x2ba008 = Math.floor(Math.random() * 9999999).toString();
          _0x5c17f4 += _0x2ba008;
        }
        _0x35ea59.load(_0x5c17f4);
      }
      function _0x58e9d8(_0x1395bc) {
        var _0x2adb57;
        var _0x38e89c;
        var _0x52e308 = _0x1450dc.TrackingEvents.length;
        var _0x1a961e;
        for (_0x38e89c = 0x0; _0x38e89c < _0x52e308; _0x38e89c++) {
          _0x1a961e = _0x1450dc.TrackingEvents[_0x38e89c];
          if (_0x1395bc == _0x1a961e.event) {
            _0x2adb57 = _0x1a961e.URI;
            break;
          }
        }
        if (_0x2adb57) {
          _0x2edba4(_0x2adb57);
        }
      }
      function _0x2edba4(_0x231ae7) {
        if (!_0x231ae7) {
          return;
        }
        var _0x439e5a = new Image();
        _0x439e5a.src = _0x231ae7;
      }
      function _0x458694() {
        var _0x557004;
        var _0x2694c5;
        var _0x2a2ee4 = document.createElement("script");
        _0x2a2ee4.type = 'text/javascript';
        _0x2a2ee4.src = _0x49c9b1.ima_js;
        _0x2a2ee4.onload = _0x2a2ee4.onreadystatechange = function () {
          if (!this.readyState || this.readyState == "complete") {
            _0x557004 = true;
          }
        };
        _0x2a2ee4.onerror = function () {
          console.log("Error loading " + this.src);
        };
        var _0x929c5a = document.getElementsByTagName("script")[0x0];
        _0x929c5a.parentNode.insertBefore(_0x2a2ee4, _0x929c5a);
        if (typeof MVPImaLoader === "undefined") {
          var _0x2a2ee4 = document.createElement("script");
          _0x2a2ee4.type = "text/javascript";
          _0x2a2ee4.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.imaLoader_js);
          _0x2a2ee4.onload = _0x2a2ee4.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "complete") {
              _0x2694c5 = true;
            }
          };
          _0x2a2ee4.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x929c5a = document.getElementsByTagName("script")[0x0];
          _0x929c5a.parentNode.insertBefore(_0x2a2ee4, _0x929c5a);
        } else {
          _0x2694c5 = true;
        }
        var _0x4a88d6 = setInterval(function () {
          if (_0x557004 && _0x2694c5) {
            clearInterval(_0x4a88d6);
            _0x266764 = true;
            _0x31e1bc();
          }
        }, 0x64);
      }
      function _0x31e1bc() {
        if (!_0x4e54ec) {
          _0x4e54ec = _0x2c8ffb("<div class=\"mvp-ima-holder\"></div>").appendTo(_0x139c5b);
        }
        if (!_0x19ddcc) {
          _0x19ddcc = new MVPImaLoader(_0x49c9b1, _0x5ca0d3, _0x139c5b, _0x4e54ec);
        }
      }
      var _0x444cea;
      var _0x5376a7;
      var _0x7d9674;
      var _0x40a4df;
      if ("ontouchstart" in window) {
        _0x444cea = true;
        _0x5376a7 = "touchstart.ap mousedown.ap";
        _0x7d9674 = "touchmove.ap mousemove.ap";
        _0x40a4df = "touchend.ap mouseup.ap";
      } else if (window.PointerEvent) {
        _0x5376a7 = 'pointerdown.ap';
        _0x7d9674 = 'pointermove.ap';
        _0x40a4df = "pointerup.ap";
      } else {
        _0x5376a7 = "mousedown.ap";
        _0x7d9674 = "mousemove.ap";
        _0x40a4df = 'mouseup.ap';
      }
      _0x139c5b.on("click", function (_0x368f83) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x49c9b1.displayPosterOnMobile) {
          return false;
        }
        if (_0x2aa1b2 && (_0x395507 || !_0x1fab36)) {
          return false;
        }
        if (_0xaad07c == "image") {
          if (_0x395507) {
            if (_0x1450dc.link) {
              if (_0x1450dc.ClickTracking) {
                _0x2edba4(_0x1450dc.ClickTracking);
              }
              if (_0x1450dc.target && _0x1450dc.target == "_blank") {
                window.open(_0x1450dc.link);
              } else {
                var _0x2a026c = _0x1450dc.link;
                _0x47cba3();
                window.location = _0x2a026c;
                return;
              }
            }
          }
          return false;
        }
        if (_0x1450dc.is360) {
          return false;
        }
        if (!_0x17ac30) {
          _0x5ca0d3.togglePlayback();
        } else {
          if (!_0x1a96c8) {
            _0x5ca0d3.togglePlayback();
          } else {
            if (_0x395507) {
              _0x5ca0d3.togglePlayback();
            }
          }
        }
      });
      if (_0x550351.find('.mvp-search-field').length) {
        _0x550351.addClass("mvp-has-search-bar");
      }
      var _0xa78a33;
      var _0x439e41 = _0x550351.find(".mvp-search-field").on("keyup", function () {
        if (_0x5d4070) {
          var _0x26198b = _0xe082c5.find(".mvp-playlist-selector-item").length;
          if (_0x26198b == 0x0) {
            return false;
          }
          var _0x5760f9 = _0x2c8ffb(this).val().toLowerCase();
          var _0x54a7f9;
          var _0x105693 = 0x0;
          var _0x5efb8c;
          var _0x3d90ce;
          for (_0x54a7f9 = 0x0; _0x54a7f9 < _0x26198b; _0x54a7f9++) {
            _0x5efb8c = _0xe082c5.find(".mvp-playlist-selector-item").eq(_0x54a7f9);
            _0x3d90ce = _0x5efb8c.find(".mvp-playlist-selector-item-title").html().toLowerCase();
            if (_0x5efb8c.find('.mvp-playlist-selector-item-description')) {
              _0x3d90ce += _0x5efb8c.find(".mvp-playlist-selector-item-description").html().toLowerCase();
            }
            if (_0x3d90ce.indexOf(_0x5760f9) > -0x1) {
              _0xe082c5.find('.mvp-playlist-selector-item').eq(_0x54a7f9).fadeIn(0xc8);
            } else {
              _0xe082c5.find(".mvp-playlist-selector-item").eq(_0x54a7f9).fadeOut(0xc8);
              _0x105693++;
            }
          }
          if (_0x105693 == _0x26198b) {
            _0x368208.show();
          } else {
            _0x368208.hide();
          }
        } else {
          if (_0x142a3d == 0x0) {
            return false;
          }
          var _0x5760f9 = _0x2c8ffb(this).val().toLowerCase();
          var _0x54a7f9;
          var _0x105693 = 0x0;
          var _0x5efb8c;
          var _0x3d90ce;
          for (_0x54a7f9 = 0x0; _0x54a7f9 < _0x142a3d; _0x54a7f9++) {
            _0x5efb8c = _0x223a1c.children(".mvp-playlist-item").eq(_0x54a7f9);
            if (_0x5efb8c.find('.mvp-playlist-title').length) {
              _0x3d90ce = _0x5efb8c.find('.mvp-playlist-title').html().toLowerCase();
            } else {
              _0x3d90ce = '';
            }
            if (_0x49c9b1.searchDescriptionInPlaylist) {
              if (_0x5efb8c.find(".mvp-playlist-description").length) {
                _0x3d90ce += _0x5efb8c.find(".mvp-playlist-description").html().toLowerCase();
              }
            }
            if (_0x3d90ce.indexOf(_0x5760f9) > -0x1) {
              _0x223a1c.children(".mvp-playlist-item").eq(_0x54a7f9).removeClass("mvp-filter-hidden").fadeIn(0xc8);
            } else {
              _0x223a1c.children(".mvp-playlist-item").eq(_0x54a7f9).addClass('mvp-filter-hidden').fadeOut(0xc8);
              _0x105693++;
            }
          }
          if (_0x105693 == _0x142a3d) {
            _0x368208.show();
            _0xa78a33 = false;
            if (_0x45d18d) {
              _0x45d18d.addClass("mvp-force-hide");
            }
          } else {
            _0x368208.hide();
            _0xa78a33 = true;
            if (_0x49c9b1.navigationType == "scroll" && _0x2cb5ab) {
              _0x2cb5ab.updatePosition();
            }
            if (_0x45d18d) {
              _0x45d18d.removeClass("mvp-force-hide");
            }
          }
        }
      });
      if (_0x49c9b1.makePlaylistSelector) {
        _0x550351.addClass('mvp-playlist-selector');
        _0x3cdcc5();
      }
      var _0x2e3f69 = "normal";
      var _0x1ff9ff;
      _0x1e590e.on("fullscreenchange.mvp mozfullscreenchange.mvp MSFullscreenChange.mvp webkitfullscreenchange.mvp", function (_0x26d81d) {
        if (_0x1ff9ff == _0x49c9b1.instanceName) {
          if (_0x2e3f69 == "fullscreen") {
            _0x35476b();
          } else {
            _0x2c46c1();
          }
        }
      });
      var _0x2cc853 = _0x550351.find(".mvp-fullscreen-toggle").on("click", function () {
        _0x4eaebf();
      });
      function _0x4eaebf() {
        _0x3ea903 = false;
        _0x550351.removeClass('mvp-theater');
        if (_0x49c9b1.theaterElement) {
          _0x2c8ffb(_0x49c9b1.theaterElement).removeClass(_0x49c9b1.theaterElementClass);
        }
        if (_0x3ed710) {
          _0x3ed710.removeClass("mvp-lightbox-center");
        }
        _0x1ff9ff = _0x49c9b1.instanceName;
        var _0x1ad073 = _0x550351[0x0];
        if (_0x2e3f69 == "normal") {
          var _0x3ef76b = document.documentElement;
          var _0x34134c = document.body;
          _0xe7c29a = _0x3ef76b.scrollLeft || _0x34134c.scrollLeft || 0x0;
          _0x4de4d8 = _0x3ef76b.scrollTop || _0x34134c.scrollTop || 0x0;
          _0x2c8ffb(_0x5ca0d3).trigger("fullscreenBeforeEnter", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        }
        if (_0xf476e5) {
          if (_0x1ad073.requestFullscreen) {
            if (document.fullscreenElement) {
              document.exitFullscreen();
            } else {
              _0x1ad073.requestFullscreen();
            }
          } else {
            if (_0x1ad073.webkitRequestFullScreen) {
              if (document.webkitIsFullScreen) {
                document.webkitCancelFullScreen();
              } else {
                _0x1ad073.webkitRequestFullScreen();
              }
            } else {
              if (_0x1ad073.msRequestFullscreen) {
                if (document.msIsFullscreen || document.msFullscreenElement) {
                  document.msExitFullscreen();
                } else {
                  _0x1ad073.msRequestFullscreen();
                }
              } else if (_0x1ad073.mozRequestFullScreen) {
                if (document.fullscreenElement || document.mozFullScreenElement) {
                  document.mozCancelFullScreen();
                } else {
                  _0x1ad073.mozRequestFullScreen();
                }
              }
            }
          }
        } else if (_0x2e3f69 == "fullscreen") {
          _0x35476b();
        } else {
          _0x2c46c1();
        }
        setTimeout(function () {
          _0x31d45c();
        }, 0xfa);
      }
      function _0x2c46c1() {
        _0x2e3f69 = "fullscreen";
        _0x40300f.removeClass(_0x49c9b1.minimizeClass);
        _0x2c0825.addClass("mvp-fs-overflow");
        _0x550351.addClass('mvp-fs');
        if (_0x49c9b1.playerType == 'lightbox') {
          _0x20ec37.addClass("mvp-fs");
        }
        _0x2cc853.find(".mvp-btn-fullscreen").hide();
        _0x2cc853.find(".mvp-btn-normal").show();
        _0x4fa334.hide();
        document.body.style.cursor = "default";
        if (_0x49c9b1.rightClickContextMenu == "custom") {
          _0x32d922.find(".mvp-context-fullscreen-enter").hide();
          _0x32d922.find(".mvp-context-fullscreen-exit").show();
        }
        if (_0x49c9b1.hidePlaylistOnFullscreenEnter && _0x49c9b1.playlistOpened) {
          _0x18e092 = true;
          _0x49c9b1.playlistOpened = false;
        }
        if (_0x59a538 == "outer") {
          _0x2f574b.hide();
        }
        if (_0x1450dc.TrackingEvents) {
          _0x58e9d8('playerExpand');
        }
        _0x2c8ffb(_0x5ca0d3).trigger("fullscreenEnter", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'media': _0x1450dc
        });
      }
      function _0x35476b() {
        _0x2e3f69 = "normal";
        _0x2c0825.removeClass("mvp-fs-overflow");
        _0x550351.removeClass("mvp-fs");
        if (_0x49c9b1.playerType == "lightbox") {
          _0x20ec37.removeClass("mvp-fs");
        }
        _0x2cc853.find(".mvp-btn-fullscreen").show();
        _0x2cc853.find(".mvp-btn-normal").hide();
        _0x4fa334.show();
        document.body.style.cursor = 'default';
        if (_0x49c9b1.rightClickContextMenu == "custom") {
          _0x32d922.find(".mvp-context-fullscreen-enter").show();
          _0x32d922.find(".mvp-context-fullscreen-exit").hide();
        }
        if (_0x18e092 && !_0x49c9b1.playlistOpened) {
          _0x18e092 = false;
          _0x49c9b1.playlistOpened = true;
        }
        if (_0x59a538 == "outer") {
          _0x2f574b.show();
        }
        window.scrollTo(_0xe7c29a, _0x4de4d8);
        if (_0x49c9b1.minimizeOnScroll) {
          if (_0x49c9b1.minimizeOnScrollOnlyIfPlaying) {
            if (_0x1f950b) {
              _0x3bc0ca();
            }
          } else {
            _0x3bc0ca();
          }
        }
        _0x1ff9ff = null;
        if (_0x1450dc.TrackingEvents) {
          _0x58e9d8("playerCollapse");
        }
        _0x2c8ffb(_0x5ca0d3).trigger("fullscreenExit", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'media': _0x1450dc
        });
      }
      _0x2cc853.find(".mvp-btn-normal").hide();
      _0x2cc853.find('.mvp-btn-fullscreen').show();
      if (_0x49c9b1.rightClickContextMenu == "disabled") {
        _0x550351.on('contextmenu', function () {
          return false;
        });
      } else {
        if (_0x49c9b1.rightClickContextMenu == "custom") {
          _0x357692 = _0x550351.find(".mvp-context-menu").on("contextmenu", function (_0x2184ab) {
            return false;
          });
          _0x457ad4 = _0x357692.find(".mvp-context-copy-video-url").on("click", function (_0x1036d8) {
            var _0x3f1f51 = window.location.href + _0x5ca0d3.getCurrentMediaUrl();
            var _0x18c6b7 = document.createElement('input');
            _0x18c6b7.setAttribute('id', "mvp-copy-url");
            document.body.appendChild(_0x18c6b7);
            document.getElementById("mvp-copy-url").value = _0x3f1f51;
            _0x18c6b7.select();
            try {
              document.execCommand("copy");
            } catch (_0x2e50fc) {}
            document.body.removeChild(_0x18c6b7);
          });
          _0x32d922 = _0x357692.find(".mvp-context-fullscreen").on("click", function (_0x3a6558) {
            _0x4eaebf();
          });
          function _0x45f06d() {
            _0x5215aa.off("click.apcc", _0x45f06d);
            _0x357692.hide();
          }
          function _0xa1f64(_0x792980) {
            if (_0x49c9b1.displayPosterOnMobile) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass('mvp-player-title')) {
              return true;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-player-desc")) {
              return true;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-volume-level")) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass('mvp-volume-level')) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-volume-bg")) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-progress-level")) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-progress-bg")) {
              return false;
            }
            if (_0x2c8ffb(_0x792980.target).hasClass("mvp-load-level")) {
              return false;
            }
            if (_0x2a430a.css("display") == "block") {
              return false;
            }
            if (_0x395507) {
              return false;
            }
            _0x792980.preventDefault();
            _0x792980.stopPropagation();
            var _0x1bd31b = _0x93b161[0x0].getBoundingClientRect();
            var _0x3f26f8 = _0x357692.outerWidth(true);
            var _0x5c116e = _0x357692.outerHeight(true);
            var _0x52acf2 = parseInt(_0x792980.pageX - _0x48f7fc.scrollLeft() - _0x1bd31b.left, 0xa);
            var _0x1cb920 = parseInt(_0x792980.pageY - _0x48f7fc.scrollTop() - _0x1bd31b.top, 0xa);
            if (_0x52acf2 > _0x93b161.width() - _0x3f26f8) {
              _0x52acf2 -= _0x3f26f8;
            }
            if (_0x1cb920 > _0x93b161.height() - _0x5c116e) {
              _0x1cb920 -= _0x5c116e;
            }
            _0x357692.css({
              'left': _0x52acf2 + 'px',
              'top': _0x1cb920 + 'px'
            }).show();
            _0x5215aa.one('click.apcc', _0x45f06d);
          }
          _0x93b161.on("contextmenu", _0xa1f64).on("mouseleave", _0x45f06d);
          _0x5215aa.on("mouseleave.mvp", _0x45f06d);
          _0x1e590e.on('contextmenu.mvp', _0x45f06d).keyup(function (_0x2d3b73) {
            if (_0x2d3b73.keyCode == 0x1b) {
              _0x45f06d();
            }
          });
        }
      }
      var _0xb361ff = _0x550351.find(".mvp-tooltip");
      if (!_0x36b677) {
        _0x550351.on("mouseenter", "[data-tooltip]", function (_0x26ee46) {
          var _0x5022e5 = _0x2c8ffb(this);
          var _0x1b72fb = _0x5022e5.attr("data-tooltip");
          if (MVPUtils.isEmpty(_0x1b72fb)) {
            return false;
          }
          if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
            var _0x1a7715 = _0x40300f;
          } else {
            if (_0x34e44f) {
              var _0x1a7715 = _0x40300f;
            } else {
              _0x1a7715 = _0x550351;
            }
          }
          var _0x1488a6 = _0x1a7715[0x0].getBoundingClientRect();
          var _0x2ff4da = _0x5022e5[0x0].getBoundingClientRect();
          _0xb361ff.text(_0x1b72fb);
          if (_0x5022e5.attr('data-tooltip-position') != undefined) {
            if (_0x5022e5.attr("data-tooltip-position") == "left") {
              var _0x353170 = parseInt(_0x2ff4da.top - _0x1488a6.top - _0xb361ff.outerHeight() / 0x2 + _0x5022e5.outerHeight() / 0x2);
              var _0x3c8503 = parseInt(_0x2ff4da.left - _0x1488a6.left - _0xb361ff.outerWidth() - 0x3);
            } else {
              if (_0x5022e5.attr('data-tooltip-position') == "bottom") {
                var _0x353170 = parseInt(_0x2ff4da.top - _0x1488a6.top + _0x5022e5.outerHeight());
                var _0x3c8503 = parseInt(_0x2ff4da.left - _0x1488a6.left - _0xb361ff.outerWidth() / 0x2 + _0x5022e5.outerWidth() / 0x2);
              }
            }
          } else {
            var _0x353170 = parseInt(_0x2ff4da.top - _0x1488a6.top - _0xb361ff.outerHeight());
            var _0x3c8503 = parseInt(_0x2ff4da.left - _0x1488a6.left - _0xb361ff.outerWidth() / 0x2 + _0x5022e5.outerWidth() / 0x2);
          }
          if (_0x3c8503 < 0x0) {
            _0x3c8503 = 0x0;
          } else {
            if (_0x3c8503 + _0xb361ff.outerWidth() > _0x1a7715.width()) {
              _0x3c8503 = _0x1a7715.width() - _0xb361ff.outerWidth();
            }
          }
          if (_0x353170 + _0x1488a6.top < 0x0) {
            _0x353170 = parseInt(_0x2ff4da.top - _0x1488a6.top + _0xb361ff.outerHeight() + 0xf);
          }
          _0xb361ff.css({
            'left': _0x3c8503 + 'px',
            'top': _0x353170 + 'px'
          }).show();
        }).on("mouseleave", "[data-tooltip]", function (_0x2c824c) {
          _0xb361ff.hide();
        });
      }
      var _0x3202d5;
      var _0x1a31d5;
      _0xd5f952.on(_0x5376a7, function (_0x4f8f33) {
        if (!_0x588a79) {
          return;
        }
        if (_0x49c9b1.disableSeekbar) {
          return false;
        }
        if (_0x49c9b1.disableVideoSkip) {
          return false;
        }
        if (_0x49c9b1.seekToChapterStart && _0x5e08d1.length) {
          return false;
        }
        if (_0x395507) {
          return false;
        }
        if (_0x39440f) {
          return false;
        }
        _0x1d336a(_0x4f8f33);
        return false;
      });
      function _0x1d336a(_0x487521) {
        if (!_0x3202d5) {
          var _0x290d22;
          if (_0x487521.type == "touchstart") {
            var _0x5c856d = _0x487521.originalEvent.touches;
            if (_0x5c856d && _0x5c856d.length > 0x0) {
              _0x290d22 = _0x5c856d[0x0];
            } else {
              return false;
            }
          } else {
            _0x290d22 = _0x487521;
            _0x487521.preventDefault();
          }
          _0x3202d5 = true;
          if (_0x576097) {
            if (_0x3c1510) {
              _0x3c1510.startSeeking();
            }
          }
          _0x1e590e.on(_0x7d9674, function (_0x1fe24e) {
            _0x37d2d5(_0x1fe24e);
          }).on(_0x40a4df, function (_0x3f7e9d) {
            _0x540cb0(_0x3f7e9d);
          });
        }
        return false;
      }
      function _0x37d2d5(_0x1caa7f) {
        var _0x5361fe;
        if (_0x1caa7f.type == 'touchmove') {
          var _0x153d47;
          if (_0x1caa7f.originalEvent.touches && _0x1caa7f.originalEvent.touches.length) {
            _0x153d47 = _0x1caa7f.originalEvent.touches;
          } else {
            if (_0x1caa7f.originalEvent.changedTouches && _0x1caa7f.originalEvent.changedTouches.length) {
              _0x153d47 = _0x1caa7f.originalEvent.changedTouches;
            } else {
              return false;
            }
          }
          if (_0x153d47.length > 0x1) {
            return false;
          }
          _0x5361fe = _0x153d47[0x0];
          _0x1caa7f.preventDefault();
        } else {
          _0x5361fe = _0x1caa7f;
          _0x1caa7f.preventDefault();
        }
        _0x488251(_0x5361fe);
        return false;
      }
      function _0x540cb0(_0x5996e8) {
        if (_0x3202d5) {
          _0x3202d5 = false;
          _0x1e590e.off(_0x7d9674).off(_0x40a4df);
          if (_0x576097) {
            if (_0x3c1510) {
              _0x3c1510.stopSeeking();
            }
          }
          var _0x2898b0;
          if (_0x5996e8.type == 'touchend') {
            var _0x14f3c4;
            if (_0x5996e8.originalEvent.touches && _0x5996e8.originalEvent.touches.length) {
              _0x14f3c4 = _0x5996e8.originalEvent.touches;
            } else {
              if (_0x5996e8.originalEvent.changedTouches && _0x5996e8.originalEvent.changedTouches.length) {
                _0x14f3c4 = _0x5996e8.originalEvent.changedTouches;
              } else {
                return false;
              }
            }
            if (_0x14f3c4.length > 0x1) {
              return false;
            }
            _0x2898b0 = _0x14f3c4[0x0];
            _0x5996e8.preventDefault();
          } else {
            _0x2898b0 = _0x5996e8;
            _0x5996e8.preventDefault();
          }
          _0x488251(_0x2898b0);
        }
        return false;
      }
      function _0x488251(_0x2a8025) {
        var _0x37924b = _0x2a8025.pageX - _0x8083b8.offset().left;
        if (_0x37924b < 0x0) {
          _0x37924b = 0x0;
        } else {
          if (_0x37924b > _0x1a31d5) {
            _0x37924b = _0x1a31d5;
          }
        }
        _0x1a31d5 = _0x8083b8.width();
        var _0x178c2b = Math.max(0x0, Math.min(0x1, _0x37924b / _0x1a31d5));
        if (_0x1a96c8) {
          if (_0x576097) {
            _0x3c1510.seek(_0x178c2b);
            return;
          }
          var _0x4f8073;
          var _0x55c2c2;
          if (_0xaad07c == 'audio' && !isNaN(_0x143642.duration)) {
            _0x55c2c2 = _0x143642.duration;
            _0x4f8073 = _0x178c2b * _0x55c2c2;
            if (_0x4f8073 > _0x55c2c2 - 0x2) {
              _0x4f8073 = _0x55c2c2 - 0x2;
            }
            if (_0x49c9b1.disableSeekingPastWatchedPoint) {
              if (_0x4f8073 > _0xac8d7e) {
                return false;
              }
            }
            try {
              _0x143642.currentTime = _0x4f8073.toFixed(0x1);
            } catch (_0x397955) {}
          } else {
            if (_0xaad07c == 'video' && !isNaN(_0x326462.duration)) {
              _0x55c2c2 = _0x326462.duration;
              _0x4f8073 = _0x178c2b * _0x55c2c2;
              if (_0x4f8073 > _0x55c2c2 - 0x2) {
                _0x4f8073 = _0x55c2c2 - 0x2;
              }
              if (_0x49c9b1.disableSeekingPastWatchedPoint) {
                if (_0x4f8073 > _0xac8d7e) {
                  return false;
                }
              }
              try {
                _0x326462.currentTime = _0x4f8073.toFixed(0x1);
              } catch (_0xff4aa0) {}
            } else {
              if (_0xaad07c == "youtube") {
                _0x55c2c2 = _0x589fef.getDuration();
                _0x4f8073 = _0x178c2b * _0x55c2c2;
                if (_0x4f8073 > _0x55c2c2 - 0x2) {
                  _0x4f8073 = _0x55c2c2 - 0x2;
                }
                if (_0x49c9b1.disableSeekingPastWatchedPoint) {
                  if (_0x4f8073 > _0xac8d7e) {
                    return false;
                  }
                }
                if (_0x49c9b1.disableSeekingPastWatchedPoint) {
                  if (_0x4f8073 > _0xac8d7e) {
                    return false;
                  }
                }
                _0x589fef.seekTo(_0x4f8073);
              } else {
                if (_0xaad07c == "vimeo") {
                  if (_0x4f5c87 == "chromeless") {
                    _0x43db09.show();
                  }
                  if (_0x17e176 != 0x0) {
                    _0x55c2c2 = _0x17e176;
                    _0x4f8073 = _0x178c2b * _0x55c2c2;
                    if (_0x4f8073 > _0x55c2c2 - 0x2) {
                      _0x4f8073 = _0x55c2c2 - 0x2;
                    }
                    if (_0x49c9b1.disableSeekingPastWatchedPoint) {
                      if (_0x4f8073 > _0xac8d7e) {
                        return false;
                      }
                    }
                    _0x24e760.setCurrentTime(_0x4f8073);
                  } else {
                    _0x24e760.getDuration().then(function (_0x3de9cc) {
                      _0x55c2c2 = _0x3de9cc;
                      _0x4f8073 = _0x178c2b * _0x55c2c2;
                      if (_0x4f8073 > _0x55c2c2 - 0x2) {
                        _0x4f8073 = _0x55c2c2 - 0x2;
                      }
                      if (_0x49c9b1.disableSeekingPastWatchedPoint) {
                        if (_0x4f8073 > _0xac8d7e) {
                          return false;
                        }
                      }
                      _0x24e760.setCurrentTime(_0x4f8073);
                    });
                  }
                }
              }
            }
          }
          if (!_0x1f950b) {
            _0x6a32cc = null;
            _0x150da0(true);
          }
        } else if (_0x1450dc.duration) {
          _0x4f8073 = _0x178c2b * _0x1450dc.duration;
          _0x1450dc.start = _0x4f8073;
          _0x1808b1.width(_0x4f8073 / _0x1450dc.duration * _0x8083b8.width());
          _0x134a79.width(_0x4f8073 / _0x1450dc.duration * _0x381e37.width());
        }
      }
      if (!_0x36b677) {
        _0xd5f952.on("mouseover", function _0x33b14d() {
          if (!_0x1a96c8 && !_0x1450dc && !_0x1450dc.duration) {
            return;
          }
          _0xd5f952.on(_0x7d9674, _0x1a1c10).on("mouseout", _0x1b9cae);
          _0x1e590e.on("mouseout.mvp", _0x1b9cae);
        });
        function _0x1b9cae() {
          if (!_0x1a96c8 && !_0x1450dc && !_0x1450dc.duration) {
            return;
          }
          _0xd5f952.off(_0x7d9674, _0x1a1c10).off("mouseout", _0x1b9cae);
          _0x1e590e.off("mouseout.mvp", _0x1b9cae);
          if (_0x1450dc.previewSeek) {
            _0x4afc0f.hide();
            if (_0xfaf57a) {
              _0x12cc74();
            }
          }
          _0xb361ff.hide();
          _0x93df37 = null;
        }
      }
      function _0x1a1c10(_0x1e9a13) {
        var _0x2d86c5 = _0x1e9a13.pageX - _0x8083b8.offset().left;
        if (!MVPUtils.isNumber(_0x2d86c5)) {
          return false;
        }
        _0x1a31d5 = _0x8083b8.width();
        if (_0x2d86c5 < 0x0) {
          _0x2d86c5 = 0x0;
        } else {
          if (_0x2d86c5 > _0x1a31d5) {
            _0x2d86c5 = _0x1a31d5;
          }
        }
        var _0x578075 = Math.max(0x0, Math.min(0x1, _0x2d86c5 / _0x1a31d5));
        if (!MVPUtils.isNumber(_0x578075)) {
          return false;
        }
        if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
          var _0x51fabf = _0x40300f;
        } else {
          if (_0x34e44f) {
            var _0x51fabf = _0x40300f;
          } else {
            _0x51fabf = _0x550351;
          }
        }
        var _0x582618 = _0x51fabf[0x0].getBoundingClientRect();
        var _0x4438ce = _0xd5f952[0x0].getBoundingClientRect();
        if (_0x1450dc.duration) {
          var _0x56592c = _0x1450dc.duration;
        } else {
          if (_0xaad07c == "audio") {
            var _0x56592c = _0x143642.duration;
          } else {
            if (_0xaad07c == "video") {
              var _0x56592c = _0x326462.duration;
            } else {
              if (_0xaad07c == "youtube") {
                var _0x56592c = _0x589fef.getDuration();
              } else {
                if (_0xaad07c == "vimeo") {
                  var _0x56592c = _0x17e176;
                }
              }
            }
          }
        }
        if (_0x1450dc.previewSeek) {
          var _0x1e7b37 = _0x56592c * _0x578075;
          if (MVPUtils.isNumber(_0x56592c)) {
            var _0x4ab027 = _0x473a4f(_0x1e7b37);
            if (_0x4ab027) {
              var _0xc675ec = "<div class=\"mvp-preview-seek-chapter-title\">" + _0x4ab027 + "</div><div class=\"mvp-preview-seek-chapter-time\">" + MVPUtils.formatTime(_0x1e7b37) + '</div>';
              _0x4a3e7d.html(_0xc675ec);
            } else {
              var _0xc675ec = "<div class=\"mvp-preview-seek-chapter-time\">" + MVPUtils.formatTime(_0x1e7b37) + "</div>";
              _0x4a3e7d.html(_0xc675ec);
            }
          }
          if (_0x482aec.length) {
            var _0x193579;
            var _0x39567d = _0x482aec.length;
            var _0x4404ea;
            var _0x1abb57;
            var _0xd6253;
            for (_0x193579 = 0x0; _0x193579 < _0x39567d; _0x193579++) {
              _0x4404ea = _0x482aec[_0x193579];
              _0x1abb57 = _0x4404ea.start;
              _0xd6253 = _0x4404ea.end;
              if (_0x1e7b37 >= _0x1abb57 && _0x1e7b37 <= _0xd6253) {
                if (!_0x3fd320) {
                  var _0x25a5f2 = _0x4404ea.url;
                  var _0x4a1c38 = _0x25a5f2.substr(_0x25a5f2.lastIndexOf('=') + 0x1);
                  var _0x4f5136 = _0x4a1c38.split(',');
                  var _0x14d34f = '-' + _0x4f5136[0x0] + 'px' + " " + '-' + _0x4f5136[0x1] + 'px';
                  _0x25a5f2 = encodeURI(_0x25a5f2);
                  _0x3fd320 = {};
                  _0x3fd320.start = _0x1abb57;
                  _0x3fd320.end = _0xd6253;
                  _0x33e7c8.css({
                    'background-image': "url(" + _0x25a5f2 + ')',
                    'background-position': _0x14d34f
                  });
                }
              } else if (_0x3fd320) {
                if (_0x1e7b37 < _0x3fd320.start || _0x1e7b37 > _0x3fd320.end) {
                  _0x3fd320 = null;
                }
              }
            }
          }
          var _0x4dc054 = _0x1e9a13.pageX - _0x48f7fc.scrollLeft() - _0x582618.left - _0x4afc0f.outerWidth() / 0x2;
          var _0x1692d7 = _0x4438ce.top - _0x582618.top - _0x4afc0f.outerHeight() - 0x5;
          if (_0x93df37) {
            if (_0x1692d7 + 0x2 > _0x93df37 || _0x1692d7 - 0x2 < _0x93df37) {
              _0x93df37 = _0x1692d7;
            }
          } else {
            _0x93df37 = _0x1692d7;
          }
          if (_0x49c9b1.playerType != "lightbox") {
            if (_0x4dc054 < 0x0) {
              _0x4dc054 = 0x0;
            } else {
              if (_0x4dc054 + _0x4afc0f.outerWidth() > _0x51fabf.width()) {
                _0x4dc054 = _0x51fabf.width() - _0x4afc0f.outerWidth();
              }
            }
          }
          if (_0xfaf57a) {
            _0x159e68(_0x1e7b37);
          }
          _0x4afc0f.css({
            'left': parseInt(_0x4dc054, 0xa) + 'px',
            'top': _0x93df37 + 'px'
          }).show();
        } else {
          var _0x4dc054 = _0x1e9a13.pageX - _0x48f7fc.scrollLeft() - _0x582618.left - _0xb361ff.outerWidth() / 0x2;
          var _0x1692d7 = _0x4438ce.top - _0x582618.top - _0xb361ff.outerHeight();
          if (_0x49c9b1.playerType != "lightbox") {
            if (_0x4dc054 < 0x0) {
              _0x4dc054 = 0x0;
            } else {
              if (_0x4dc054 + _0xb361ff.outerWidth() > _0x51fabf.width()) {
                _0x4dc054 = _0x51fabf.width() - _0xb361ff.outerWidth();
              }
            }
          }
          _0xb361ff.css({
            'left': parseInt(_0x4dc054, 0xa) + 'px',
            'top': parseInt(_0x1692d7, 0xa) + 'px'
          }).show();
          if (MVPUtils.isNumber(_0x56592c)) {
            _0xb361ff.text(MVPUtils.formatTime(_0x56592c * _0x578075) + " / " + MVPUtils.formatTime(_0x56592c));
          }
        }
      }
      var _0x2735b0 = _0xb23a7f.hasClass("mvp-volume-horizontal");
      var _0x21db60 = _0x2735b0 ? _0x42f6a9.width() : _0x42f6a9.height();
      var _0x29490e;
      if (!_0x921a94 || _0x36b677) {
        _0xb23a7f.remove();
        _0x59a813.on("click", function (_0x54d6d0) {
          _0x367db0();
        });
      } else {
        _0x59a813.on("click", function (_0x956ebe) {
          if (!_0x36b677 || _0xb23a7f.length == 0x0 || _0xb23a7f.hasClass('mvp-force-hide')) {
            _0x367db0();
          }
        });
      }
      _0xb23a7f.on(_0x5376a7, function (_0x1c574c) {
        _0x4136c8(_0x1c574c);
        return false;
      });
      function _0x4136c8(_0x13482e) {
        if (!_0x588a79) {
          return;
        }
        if (!_0x29490e) {
          var _0x7b44c9;
          if (_0x13482e.type == "touchstart") {
            var _0x1fc29c = _0x13482e.originalEvent.touches;
            if (_0x1fc29c && _0x1fc29c.length > 0x0) {
              _0x7b44c9 = _0x1fc29c[0x0];
            } else {
              return false;
            }
          } else {
            _0x7b44c9 = _0x13482e;
            _0x13482e.preventDefault();
          }
          _0x29490e = true;
          _0x1e590e.on(_0x7d9674, function (_0x3c520e) {
            _0xdabb75(_0x3c520e);
          }).on(_0x40a4df, function (_0x21e2ee) {
            _0x531b58(_0x21e2ee);
          });
        }
        return false;
      }
      function _0xdabb75(_0x391cee) {
        var _0x5df48b;
        if (_0x391cee.type == "touchmove") {
          var _0x5d77e2;
          if (_0x391cee.originalEvent.touches && _0x391cee.originalEvent.touches.length) {
            _0x5d77e2 = _0x391cee.originalEvent.touches;
          } else {
            if (_0x391cee.originalEvent.changedTouches && _0x391cee.originalEvent.changedTouches.length) {
              _0x5d77e2 = _0x391cee.originalEvent.changedTouches;
            } else {
              return false;
            }
          }
          if (_0x5d77e2.length > 0x1) {
            return false;
          }
          _0x5df48b = _0x5d77e2[0x0];
          _0x391cee.preventDefault();
        } else {
          _0x5df48b = _0x391cee;
          _0x391cee.preventDefault();
        }
        _0x5cc538(_0x5df48b);
        return false;
      }
      function _0x531b58(_0x263540) {
        if (_0x29490e) {
          _0x29490e = false;
          _0x1e590e.off(_0x7d9674).off(_0x40a4df);
          var _0xbf0029;
          if (_0x263540.type == "touchend") {
            var _0x31e733;
            if (_0x263540.originalEvent.touches && _0x263540.originalEvent.touches.length) {
              _0x31e733 = _0x263540.originalEvent.touches;
            } else {
              if (_0x263540.originalEvent.changedTouches && _0x263540.originalEvent.changedTouches.length) {
                _0x31e733 = _0x263540.originalEvent.changedTouches;
              } else {
                return false;
              }
            }
            if (_0x31e733.length > 0x1) {
              return false;
            }
            _0xbf0029 = _0x31e733[0x0];
            _0x263540.preventDefault();
          } else {
            _0xbf0029 = _0x263540;
            _0x263540.preventDefault();
          }
          _0x5cc538(_0xbf0029);
        }
        return false;
      }
      function _0x367db0() {
        if (!_0x588a79) {
          return false;
        }
        if (_0x1ac3d7 > 0x0) {
          _0x34efa1 = _0x1ac3d7;
          _0x1ac3d7 = 0x0;
          if (_0x1450dc && _0x1450dc.TrackingEvents) {
            _0x58e9d8("mute");
          }
        } else {
          _0x1ac3d7 = _0x34efa1;
          if (_0x1450dc && _0x1450dc.TrackingEvents) {
            _0x58e9d8("unmute");
          }
        }
        _0x50f193();
      }
      function _0x5cc538(_0x20c879) {
        if (_0x2735b0) {
          _0x1ac3d7 = Math.max(0x0, Math.min(0x1, (_0x20c879.pageX - _0x42f6a9.offset().left) / _0x21db60));
        } else {
          _0x1ac3d7 = Math.max(0x0, Math.min(0x1, (_0x20c879.pageY - _0x42f6a9.offset().top) / _0x21db60));
          _0x1ac3d7 = 0x1 - _0x1ac3d7;
        }
        _0x50f193();
      }
      function _0x50f193(_0xa3e407) {
        if (typeof _0xa3e407 !== "undefined") {
          _0x1ac3d7 = _0xa3e407;
        }
        if (typeof _0x1ac3d7 !== "undefined") {
          if (_0x2aa1b2) {
            if (_0x19ddcc) {
              _0x19ddcc.setVolume(_0x1ac3d7);
            }
          }
          if (_0x576097) {
            if (_0x3c1510) {
              _0x3c1510.setVolume(_0x1ac3d7);
            }
          } else {
            if (_0xaad07c == 'audio') {
              if (_0x143642) {
                _0x143642.volume = _0x1ac3d7;
                if (_0x1ac3d7 == 0x0) {
                  _0x143642.muted = true;
                } else {
                  _0x143642.muted = false;
                }
              }
            } else {
              if (_0xaad07c == "video") {
                if (_0x326462) {
                  _0x326462.volume = _0x1ac3d7;
                  if (_0x1ac3d7 == 0x0) {
                    _0x326462.muted = true;
                  } else {
                    _0x326462.muted = false;
                  }
                }
              } else {
                if (_0xaad07c == 'youtube') {
                  if (_0x589fef) {
                    _0x589fef.setVolume(_0x1ac3d7 * 0x64);
                    if (_0x1ac3d7 == 0x0) {
                      _0x589fef.mute();
                    } else {
                      _0x589fef.unMute();
                    }
                  }
                } else {
                  if (_0xaad07c == "vimeo") {
                    if (_0x24e760) {
                      _0x24e760.setVolume(_0x1ac3d7);
                    }
                  }
                }
              }
            }
          }
        }
        _0x59a813.children().hide();
        if (_0x1ac3d7 == 0x0) {
          _0x59a813.find(".mvp-btn-volume-off").show();
        } else {
          if (_0x1ac3d7 > 0x0 && _0x1ac3d7 < 0.5) {
            _0x59a813.find(".mvp-btn-volume-down").show();
          } else if (_0x1ac3d7 >= 0.5 && _0x1ac3d7 <= 0x1) {
            _0x59a813.find(".mvp-btn-volume-up").show();
          }
        }
        if (_0x1ac3d7 > 0x0) {
          if (_0x3594f0) {
            _0x3594f0.remove();
            _0x3594f0 = null;
          }
        }
        var _0x333356 = _0x2735b0 ? "width" : "height";
        _0x21669c.css(_0x333356, _0x1ac3d7 * _0x21db60 + 'px');
        _0x2c8ffb(_0x5ca0d3).trigger("volumeChange", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'volume': _0x1ac3d7
        });
      }
      _0x5ca0d3.setVolumeExternal = function (_0x3a56ec) {
        _0x1ac3d7 = _0x3a56ec;
        _0x59a813.children().hide();
        if (_0x1ac3d7 == 0x0) {
          _0x59a813.find(".mvp-btn-volume-off").show();
        } else {
          if (_0x1ac3d7 > 0x0 && _0x1ac3d7 < 0.5) {
            _0x59a813.find(".mvp-btn-volume-down").show();
          } else if (_0x1ac3d7 >= 0.5 && _0x1ac3d7 <= 0x1) {
            _0x59a813.find('.mvp-btn-volume-up').show();
          }
        }
        if (_0x1ac3d7 > 0x0) {
          if (_0x3594f0) {
            _0x3594f0.remove();
            _0x3594f0 = null;
          }
        }
        var _0x5b09e0 = _0x2735b0 ? "width" : "height";
        _0x21669c.css(_0x5b09e0, _0x1ac3d7 * _0x21db60 + 'px');
        _0x2c8ffb(_0x5ca0d3).trigger('volumeChange', {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'volume': _0x1ac3d7
        });
      };
      if (!_0x36b677) {
        _0xb23a7f.on('mouseover', function _0x4e70ab() {
          _0xb23a7f.on(_0x7d9674, _0x384e66).on("mouseout", _0x4503f4);
          _0x1e590e.on("mouseout.mvp", _0x4503f4);
        });
        function _0x4503f4() {
          _0xb23a7f.off(_0x7d9674, _0x384e66).off("mouseout", _0x4503f4);
          _0x1e590e.off('mouseout.mvp', _0x4503f4);
          _0xb361ff.hide();
        }
      }
      function _0x384e66(_0x379087) {
        if (_0x2735b0) {
          var _0x4e155a = _0x379087.pageX - _0x42f6a9.offset().left;
        } else {
          var _0x4e155a = _0x379087.pageY - _0x42f6a9.offset().top;
        }
        if (_0x4e155a < 0x0) {
          _0x4e155a = 0x0;
        } else {
          if (_0x4e155a > _0x21db60) {
            _0x4e155a = _0x21db60;
          }
        }
        var _0x450522 = Math.max(0x0, Math.min(0x1, _0x4e155a / _0x21db60));
        if (!MVPUtils.isNumber(_0x450522)) {
          return false;
        }
        if (!_0x2735b0) {
          _0x450522 = 0x1 - _0x450522;
        }
        var _0x8ad275 = parseInt(_0x450522 * 0x64, 0xa);
        _0xb361ff.text(_0x8ad275 + " %");
        if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
          var _0x21ac71 = _0x40300f;
        } else {
          if (_0x34e44f) {
            var _0x21ac71 = _0x40300f;
          } else {
            _0x21ac71 = _0x550351;
          }
        }
        var _0x1b9f4 = _0x21ac71[0x0].getBoundingClientRect();
        var _0x1b8639 = _0xb23a7f[0x0].getBoundingClientRect();
        if (_0x2735b0) {
          var _0x3430a8 = parseInt(_0x379087.pageX - _0x48f7fc.scrollLeft() - _0x1b9f4.left - _0xb361ff.outerWidth() / 0x2);
          var _0x3a1368 = parseInt(_0x1b8639.top - _0x1b9f4.top - _0xb361ff.outerHeight());
        } else {
          var _0x3430a8 = parseInt(_0x1b8639.left - _0x1b9f4.left - _0xb361ff.outerWidth() / 0x2 + _0xb23a7f.outerWidth() / 0x2);
          var _0x3a1368 = parseInt(_0x379087.pageY - _0x48f7fc.scrollTop() - _0x1b9f4.top - _0xb361ff.outerHeight() - 0xa);
        }
        _0xb361ff.css({
          'left': _0x3430a8 + 'px',
          'top': _0x3a1368 + 'px'
        }).show();
      }
      if (_0x49c9b1.useShare) {
        if (typeof MVPShareManager === "undefined") {
          var _0xdcb1d = document.createElement("script");
          _0xdcb1d.type = "text/javascript";
          _0xdcb1d.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.share_js);
          _0xdcb1d.onload = _0xdcb1d.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "complete") {
              _0x27d391 = new MVPShareManager(_0x49c9b1);
            }
          };
          _0xdcb1d.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x654e32 = document.getElementsByTagName("script")[0x0];
          _0x654e32.parentNode.insertBefore(_0xdcb1d, _0x654e32);
        } else {
          _0x27d391 = new MVPShareManager(_0x49c9b1);
        }
      }
      var _0x2cd9a4 = _0x550351.find(".mvp-settings-wrap");
      var _0xbddf8b = _0x550351.find(".mvp-settings-holder");
      var _0x5524aa = _0x550351.find('.mvp-settings-home');
      _0x5dbf79.on("click", function () {
        if (_0xbddf8b.hasClass("mvp-holder-visible")) {
          _0xbddf8b.one("transitionend", function () {
            _0xbddf8b.css({
              'display': 'none',
              'width': 'auto',
              'height': "auto"
            });
            _0xbddf8b.find(".mvp-settings-menu").css("display", "none");
            _0x5524aa.css("display", "block");
            _0xbddf8b.css("maxHeight", 'none').removeClass('mvp-settings-holder-scrollable');
          }).removeClass("mvp-holder-visible");
        } else {
          _0xbddf8b.css("display", 'block');
          setTimeout(function () {
            _0xbddf8b.addClass('mvp-holder-visible');
          }, 0x14);
          if (_0x126d5c && !_0x49c9b1.useChapterWindow) {
            _0x86233(false);
          }
        }
      });
      _0x5524aa.find(".mvp-menu-item").on("click", function () {
        var _0x380059 = _0x2c8ffb(this).attr("data-target");
        var _0x357923 = _0xbddf8b.width();
        var _0x48ef12 = _0xbddf8b.height();
        _0x5524aa.css("display", 'none');
        _0xbddf8b.find(".mvp-settings-menu").css('display', "none");
        _0xbddf8b.css("maxHeight", "none").removeClass("mvp-settings-holder-scrollable");
        _0xbddf8b.css({
          'width': "auto",
          'height': 'auto'
        });
        var _0x20dee7 = _0xbddf8b.find('.' + _0x380059).css("display", 'block');
        var _0x395ceb = _0x20dee7.width();
        var _0x20e6df = _0x20dee7.height();
        if (_0x20e6df > _0x93b161.height() - 0x3c) {
          _0xbddf8b.css('maxHeight', _0x93b161.height() - 0x3c).addClass("mvp-settings-holder-scrollable");
        }
        _0xbddf8b.css({
          'width': _0x357923 + 'px',
          'height': _0x48ef12 + 'px'
        });
        setTimeout(function () {
          _0xbddf8b.css({
            'width': _0x395ceb + 'px',
            'height': _0x20e6df + 'px'
          });
        }, 0x14);
      });
      _0xbddf8b.find(".mvp-menu-header").on("click", function () {
        _0x2ee620();
      });
      function _0x2ee620() {
        _0xbddf8b.find(".mvp-settings-menu").css('display', 'none');
        var _0x50ff7e = _0xbddf8b.width();
        var _0xfa1bbd = _0xbddf8b.height();
        _0xbddf8b.css({
          'width': "auto",
          'height': "auto"
        });
        _0x5524aa.css("display", "block");
        var _0x46ca2f = _0x5524aa.width();
        var _0x5c9bea = _0x5524aa.height();
        _0xbddf8b.css({
          'width': _0x50ff7e + 'px',
          'height': _0xfa1bbd + 'px'
        });
        setTimeout(function () {
          _0xbddf8b.css({
            'width': _0x46ca2f + 'px',
            'height': _0x5c9bea + 'px'
          });
        }, 0x14);
      }
      _0x14c00e.find('.mvp-menu-item').on("click", function () {
        if (_0x576097) {
          return false;
        }
        if (_0x2c8ffb(this).hasClass("mvp-menu-active")) {
          if (_0x49c9b1.closeSettingsMenuOnSelect) {
            _0x5dbf79.click();
          } else {
            _0x2ee620();
          }
          return false;
        }
        var _0x159fb6 = _0x2c8ffb(this).attr("data-value");
        _0x1450dc.playbackRate = _0x159fb6;
        _0x2cba97(_0x159fb6);
        if (_0x1a96c8) {
          _0x5ca0d3.setPlaybackRate(_0x159fb6);
        }
        if (_0x49c9b1.closeSettingsMenuOnSelect) {
          _0x5dbf79.click();
        } else {
          _0x2ee620();
        }
      });
      function _0x2cba97(_0x492c32) {
        if (_0x5e09b9) {
          _0x5e09b9.removeClass("mvp-menu-active");
        }
        _0x5e09b9 = _0x14c00e.find(".mvp-menu-item[data-value='" + _0x492c32 + "']").addClass("mvp-menu-active");
        _0xbddf8b.find(".mvp-playback-rate-menu-value").text(_0x5e09b9.text());
      }
      function _0x114191(_0x375e9a, _0x24f9c9) {
        var _0xc594d3;
        var _0x33d9bd = _0x375e9a.length;
        var _0x535994;
        var _0x10248e;
        for (_0xc594d3 = 0x0; _0xc594d3 < _0x33d9bd; _0xc594d3++) {
          _0x535994 = _0x375e9a[_0xc594d3];
          if (_0x535994.label) {
            _0x10248e = _0x2c8ffb("<li/>").addClass('mvp-menu-item').attr({
              'data-value': _0x535994.value,
              'data-label': _0x535994.label
            }).text(_0x535994.label).on('click', _0x38315a).appendTo(_0x4098c6);
          } else {
            _0x10248e = _0x2c8ffb('<li/>').addClass("mvp-menu-item").attr("data-value", _0x535994).text(_0x535994).on("click", _0x38315a).appendTo(_0x4098c6);
          }
        }
        _0x225308(_0x24f9c9);
        _0xb4a765.removeClass('mvp-force-hide');
      }
      function _0x38315a() {
        if (_0x576097) {
          return false;
        }
        if (_0x2c8ffb(this).hasClass("mvp-menu-active")) {
          if (_0x49c9b1.closeSettingsMenuOnSelect) {
            _0x5dbf79.click();
          } else {
            _0x2ee620();
          }
          return false;
        }
        var _0x180c37 = _0x2c8ffb(this).attr('data-value');
        _0x1450dc.quality = _0x180c37;
        _0x225308(_0x180c37);
        if (_0x1a96c8) {
          _0x5ca0d3.setPlaybackQuality(_0x180c37);
        } else {
          _0x30fc93();
        }
        if (_0x49c9b1.closeSettingsMenuOnSelect) {
          _0x5dbf79.click();
        } else {
          _0x2ee620();
        }
      }
      function _0x225308(_0x2736c4) {
        if (_0x5de40b) {
          _0x5de40b.removeClass("mvp-menu-active");
        }
        _0x5de40b = _0x4098c6.find(".mvp-menu-item[data-value='" + _0x2736c4 + "']").addClass('mvp-menu-active');
        _0xbddf8b.find(".mvp-quality-menu-value").text(_0x5de40b.text());
      }
      function _0x5731e6() {
        if (_0x576097) {
          return false;
        }
        var _0x29a30d = _0x2c8ffb(this).attr('data-value');
        if (_0x225c56 == "hls") {
          _0x25274f.audioTrack = _0x29a30d;
        }
        if (_0x49c9b1.closeSettingsMenuOnSelect) {
          _0x5dbf79.click();
        } else {
          _0x2ee620();
        }
      }
      function _0x5e18f9(_0x4b16c5) {
        if (_0x3d45f3) {
          _0x3d45f3.removeClass("mvp-menu-active");
        }
        _0x3d45f3 = _0xde9b71.find(".mvp-menu-item[data-value='" + _0x4b16c5 + "']").addClass('mvp-menu-active');
        _0xbddf8b.find(".mvp-audio-language-menu-value").text(_0x3d45f3.text());
      }
      function _0x3012bc() {
        var _0x287942;
        var _0x6f5e1b = _0x1450dc.subtitles.length;
        var _0x14f302;
        var _0x5496dd;
        var _0x459893;
        var _0x4c68fa;
        var _0x1ca31a;
        var _0x4f0772 = "<ul class=\"mvp-transcript-language-menu\">";
        if (_0x49c9b1.rememeberCaptionState && _0x181123 && localStorage.getItem(_0xffd6ad)) {
          _0x1ca31a = JSON.parse(localStorage.getItem(_0xffd6ad));
        }
        for (_0x287942 = 0x0; _0x287942 < _0x6f5e1b; _0x287942++) {
          _0x14f302 = _0x1450dc.subtitles[_0x287942];
          _0x5496dd = _0x2c8ffb("<li/>").addClass("mvp-menu-item").attr({
            'data-value': _0x14f302.value,
            'data-label': _0x14f302.label,
            'data-id': _0x287942.toString()
          }).text(_0x14f302.label).on("click", _0x2aabff).appendTo(_0x2fbe78);
          if (_0x1ca31a) {
            if (_0x1ca31a.active && _0x1ca31a.value == _0x14f302.label) {
              _0x459893 = _0x14f302.label;
            }
          } else if (_0x14f302["default"]) {
            _0x459893 = _0x14f302.label;
            _0x4c68fa = _0x14f302.label;
          }
          if (_0x14f302.label != _0x49c9b1.subtitleOffText) {
            _0x4f0772 += "<li class=\"mvp-menu-item\" data-label=\"" + _0x14f302.label + "\" data-value=\"" + _0x14f302.value + "\">" + _0x14f302.label + "</li>";
          }
        }
        _0x4f0772 += "</ul>";
        _0x407a4a.html(_0x4f0772);
        if (!_0x459893) {
          _0x459893 = _0x49c9b1.subtitleOffText;
        }
        _0x5ca0d3.setSubtitle(_0x459893);
        _0x173279.removeClass("mvp-force-hide");
        _0xcc1b36.show();
        _0x40f459.show();
        _0x2c4751 = true;
      }
      function _0x2aabff() {
        if (_0x2c8ffb(this).hasClass('mvp-menu-active')) {
          if (_0x49c9b1.closeSettingsMenuOnSelect) {
            _0x5dbf79.click();
          } else {
            _0x2ee620();
          }
          return false;
        }
        var _0x49fc73 = _0x2c8ffb(this).attr("data-label");
        if (_0x576097) {
          var _0x31dc97 = parseInt(_0x2c8ffb(this).attr("data-id"), 0xa);
          _0x3c1510.loadSubtitle(_0x31dc97);
          if (_0x2185d8) {
            _0x2185d8.removeClass("mvp-menu-active");
          }
          _0x2185d8 = _0x2fbe78.find(".mvp-menu-item[data-label='" + _0x49fc73 + "']").addClass("mvp-menu-active");
        } else {
          _0x5ca0d3.setSubtitle(_0x49fc73);
        }
        if (_0x49c9b1.closeSettingsMenuOnSelect) {
          _0x5dbf79.click();
        } else {
          _0x2ee620();
        }
      }
      this.toggleSubtitle = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x1450dc && _0x1450dc.subtitles) {
          var _0x1aa4dd;
          var _0x324a93;
          if (_0x49c9b1.rememeberCaptionState && _0x181123 && localStorage.getItem(_0xffd6ad)) {
            _0x324a93 = JSON.parse(localStorage.getItem(_0xffd6ad));
            if (_0x324a93.active) {
              _0x1aa4dd = _0x49c9b1.subtitleOffText;
            } else {
              _0x1aa4dd = _0x324a93.value;
            }
            if (_0x1aa4dd) {
              _0x5ca0d3.setSubtitle(_0x1aa4dd);
            }
          }
        }
      };
      this.setSubtitle = function (_0x49b4b8) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        _0x2a65bd.empty();
        _0x107649.show();
        _0x929f53 = _0x49b4b8;
        if (_0x49b4b8 == _0x49c9b1.subtitleOffText || _0x49b4b8 == '') {
          if (_0x49b4b8 == '') {
            _0x49b4b8 = _0x49c9b1.subtitleOffText;
          }
          _0x387696 = false;
          _0x275e34 = null;
          if (_0x2185d8) {
            _0x2185d8.removeClass('mvp-menu-active');
          }
          _0x2185d8 = _0x2fbe78.find(".mvp-menu-item[data-label='" + _0x49b4b8 + "']").addClass('mvp-menu-active');
          _0xcc1b36.addClass('mvp-btn-disabled');
          if (_0x49c9b1.autoLoadTranscript && !_0x5ec64c) {
            _0x8b46f9();
          }
        } else {
          if (_0x529d63[_0x49b4b8]) {
            _0x387696 = true;
            _0x275e34 = null;
            if (_0x2185d8) {
              _0x2185d8.removeClass("mvp-menu-active");
            }
            _0x2185d8 = _0x2fbe78.find(".mvp-menu-item[data-label='" + _0x49b4b8 + "']").addClass("mvp-menu-active");
            _0x5d71e2 = _0x529d63[_0x49b4b8];
            _0x6a32cc = null;
            _0x150da0(true);
          } else {
            var _0x42655f;
            var _0x32ce73 = _0x1450dc.subtitles.length;
            var _0x8a77d3;
            for (_0x42655f = 0x0; _0x42655f < _0x32ce73; _0x42655f++) {
              _0x8a77d3 = _0x1450dc.subtitles[_0x42655f];
              if (_0x8a77d3.label == _0x49b4b8) {
                _0x387696 = false;
                _0x275e34 = null;
                if (_0x2185d8) {
                  _0x2185d8.removeClass("mvp-menu-active");
                }
                _0x2185d8 = _0x2fbe78.find(".mvp-menu-item[data-label='" + _0x49b4b8 + "']").addClass("mvp-menu-active");
                if (_0x230bed) {
                  _0x445f7f(_0x8a77d3);
                } else {
                  _0x1fe6c9(_0x8a77d3);
                }
                break;
              }
            }
          }
          _0xcc1b36.removeClass('mvp-btn-disabled');
        }
        var _0x42655f = 0x0;
        var _0x32ce73 = _0x1450dc.subtitles.length;
        for (_0x42655f = 0x0; _0x42655f < _0x32ce73; _0x42655f++) {
          _0x8a77d3 = _0x1450dc.subtitles[_0x42655f];
          delete _0x8a77d3["default"];
          if (_0x8a77d3.value == _0x49b4b8) {
            _0x8a77d3["default"] = true;
          }
        }
        _0xbddf8b.find(".mvp-subtitle-menu-value").text(_0x49b4b8);
        if (_0x49c9b1.rememeberCaptionState && _0x181123) {
          if (localStorage.getItem(_0xffd6ad)) {
            var _0x58d81a = JSON.parse(localStorage.getItem(_0xffd6ad));
          } else {
            var _0x58d81a = {};
          }
          if (_0x49b4b8 == _0x49c9b1.subtitleOffText) {
            _0x58d81a.active = false;
          } else {
            _0x58d81a.active = true;
            _0x58d81a.value = _0x49b4b8;
          }
          localStorage.setItem(_0xffd6ad, JSON.stringify(_0x58d81a));
        }
      };
      function _0x445f7f(_0x1ada31) {
        _0x2c8ffb.ajax({
          'url': _0x1ada31.src
        }).done(function (_0x10d3e8) {
          var _0x49c734 = _0x10d3e8.split(/[\r\n]/);
          var _0x2e8513;
          for (var _0x514e5f in _0x49c734) {
            var _0x183097 = _0x49c734[_0x514e5f];
            if (/.vtt/.test(_0x183097)) {
              _0x1ada31.src = _0x1ada31.src.substr(0x0, _0x1ada31.src.lastIndexOf('/') + 0x1) + _0x183097;
              _0x2e8513 = true;
              break;
            }
          }
          if (_0x2e8513) {
            _0x1fe6c9(_0x1ada31);
          } else {
            console.log("Error loading subtitle!");
          }
        }).fail(function (_0x2096e5, _0x389cf5, _0x175fbf) {
          console.log(_0x2096e5, _0x389cf5, _0x175fbf);
        });
      }
      function _0x1fe6c9(_0x343f19) {
        if (window.location.protocol == "file:") {
          console.log("Getting subtitle requires server connection.");
          return false;
        }
        var _0x17cfa3 = _0x343f19.src;
        if (_0x17cfa3.indexOf("ebsfm:") != -0x1) {
          _0x17cfa3 = MVPUtils.b64DecodeUnicode(_0x17cfa3.substr(0x6));
        }
        if (_0x343f19.cors && _0x49c9b1.cors) {
          _0x17cfa3 = _0x49c9b1.cors + _0x17cfa3;
          console.log(_0x17cfa3);
        }
        _0x2c8ffb.ajax({
          'url': _0x17cfa3
        }).done(function (_0x4ea016) {
          var _0x362339 = _0x4ea016.replace(/\r\n|\r|\n/g, "\n");
          var _0x5d2826 = [];
          _0x362339 = MVPUtils.strip(_0x362339);
          var _0xdc98ee = _0x362339.split("\n\n");
          var _0x79acdf;
          var _0x3449df;
          var _0xf97b5a = 0x0;
          var _0x467295;
          var _0x29a1b6;
          var _0x185312;
          var _0x19c5ef;
          for (_0x79acdf in _0xdc98ee) {
            _0x3449df = _0xdc98ee[_0x79acdf].split("\n");
            if (_0x3449df == 'WEBVTT') {
              continue;
            }
            if (_0x3449df.length >= 0x2) {
              if (_0x3449df[0x0] == 'WEBVTT') {
                continue;
              }
              if (_0x3449df.length > 0x2) {
                if (_0x3449df[0x0] == '') {
                  _0x3449df.shift();
                }
                _0x29a1b6 = MVPUtils.strip(_0x3449df[0x1].split(" --> ")[0x0]);
                _0x185312 = MVPUtils.strip(_0x3449df[0x1].split(" --> ")[0x1]);
                _0x19c5ef = _0x3449df[0x2];
                if (_0x3449df.length > 0x3) {
                  for (_0x467295 = 0x3; _0x467295 < _0x3449df.length; _0x467295++) {
                    _0x19c5ef += "\n" + _0x3449df[_0x467295];
                  }
                }
              } else {
                _0x29a1b6 = MVPUtils.strip(_0x3449df[0x0].split(" --> ")[0x0]);
                _0x185312 = MVPUtils.strip(_0x3449df[0x0].split(" --> ")[0x1]);
                _0x19c5ef = _0x3449df[0x1];
              }
              _0x5d2826[_0xf97b5a] = {};
              _0x5d2826[_0xf97b5a].start = MVPUtils.toSeconds(_0x29a1b6);
              _0x5d2826[_0xf97b5a].end = MVPUtils.toSeconds(_0x185312);
              _0x5d2826[_0xf97b5a].text = _0x19c5ef;
              _0xf97b5a++;
            }
          }
          if (_0x33a975) {
            var _0x7981e3 = _0x2185d8.attr("data-label");
            _0x5e3e48(_0x7981e3, _0x5d2826);
          } else {
            _0x5d71e2 = _0x5d2826;
            _0x387696 = true;
            if (_0x1a96c8) {
              _0x6a32cc = null;
              _0x150da0(true);
            }
            if (_0x49c9b1.autoLoadTranscript && !_0x5ec64c) {
              _0x8b46f9();
            }
          }
          _0x529d63[_0x343f19.label] = _0x5d2826;
        }).fail(function (_0x4e02a0, _0x41a657, _0x1e2a38) {
          console.log(_0x4e02a0, _0x41a657, _0x1e2a38);
        });
      }
      function _0x86233(_0x251e30) {
        if (typeof _0x251e30 !== "undefined") {
          if (_0x126d5c && _0x251e30 == true) {
            return false;
          } else {
            if (!_0x126d5c && _0x251e30 == false) {
              return false;
            }
          }
          _0x126d5c = !_0x251e30;
        }
        if (_0x49c9b1.useChapterWindow) {
          if (_0x126d5c) {
            if (_0x2e3f69 == "fullscreen" && !_0x49c9b1.playlistOpened) {
              _0x5ca0d3.togglePlaylist();
            } else {
              _0x3c9582.hide();
              _0x126d5c = false;
              _0x23875e.val('');
            }
          } else {
            if (_0x1898dd == 'h' && !_0x3deea2) {
              _0x3deea2 = true;
              _0x349f0e.height(_0x349f0e.height() + 0x23);
              _0x31d45c();
            }
            if (_0x2e3f69 == "fullscreen" && !_0x49c9b1.playlistOpened) {
              _0x5ca0d3.togglePlaylist();
            } else {
              _0x3c9582.show();
              _0x126d5c = true;
            }
          }
        } else if (_0x126d5c) {
          _0x24730b.one("transitionend", function () {
            _0x24730b.css('display', "none");
            _0x126d5c = false;
          }).removeClass("mvp-holder-visible");
        } else {
          _0x24730b.css("display", 'block');
          setTimeout(function () {
            _0x24730b.addClass("mvp-holder-visible");
            _0x126d5c = true;
          }, 0x14);
        }
      }
      function _0x473a4f(_0x2a1482) {
        var _0x4cb0e5;
        var _0x44a3a6 = _0x5e08d1.length;
        var _0x379900;
        var _0x59658b;
        for (_0x4cb0e5 = 0x0; _0x4cb0e5 < _0x44a3a6; _0x4cb0e5++) {
          _0x379900 = _0x5e08d1[_0x4cb0e5];
          if (_0x379900.start <= _0x2a1482 && _0x379900.end >= _0x2a1482) {
            _0x59658b = _0x379900.text;
            break;
          }
        }
        return _0x59658b;
      }
      function _0xb6e1c7() {
        _0x5e08d1 = [];
        var _0x170049 = _0x1450dc.chapters;
        if (_0x1450dc.chaptersCors && _0x49c9b1.cors) {
          _0x170049 = _0x49c9b1.cors + _0x170049;
          console.log(_0x170049);
        }
        _0x2c8ffb.ajax({
          'url': _0x170049
        }).done(function (_0x26eec2) {
          var _0x290ea8 = _0x26eec2.replace(/\r\n|\r|\n/g, "\n");
          _0x290ea8 = MVPUtils.strip(_0x290ea8);
          var _0x400a84 = _0x290ea8.split("\n\n");
          var _0x2e5011;
          var _0x322571;
          var _0x582a72 = 0x0;
          var _0x46e292;
          var _0x48fbde;
          var _0x262bd7;
          var _0x1f15c2;
          var _0x505a2d;
          var _0xd5a95e;
          for (_0x2e5011 in _0x400a84) {
            _0x322571 = _0x400a84[_0x2e5011].split("\n");
            if (_0x322571 == "WEBVTT") {
              continue;
            }
            if (_0x322571.length >= 0x2) {
              _0x505a2d = null;
              if (_0x322571.length > 0x2) {
                if (_0x322571[0x0] == '') {
                  _0x322571.shift();
                }
                _0x48fbde = MVPUtils.strip(_0x322571[0x1].split(" --> ")[0x0]);
                _0x262bd7 = MVPUtils.strip(_0x322571[0x1].split(" --> ")[0x1]);
                _0x1f15c2 = _0x322571[0x2];
                if (_0x1f15c2.indexOf("#img=") > -0x1) {
                  _0xd5a95e = _0x1f15c2.split("#img=");
                  _0x1f15c2 = _0xd5a95e[0x0];
                  _0x505a2d = _0xd5a95e[0x1];
                } else {
                  if (_0x322571.length > 0x2) {
                    for (_0x46e292 = 0x3; _0x46e292 < _0x322571.length; _0x46e292++) {
                      _0x1f15c2 += "\n" + _0x322571[_0x46e292];
                    }
                  }
                }
              } else {
                _0x48fbde = MVPUtils.strip(_0x322571[0x0].split(" --> ")[0x0]);
                _0x262bd7 = MVPUtils.strip(_0x322571[0x0].split(" --> ")[0x1]);
                _0x1f15c2 = _0x322571[0x1];
                if (_0x1f15c2.indexOf('#img=') > -0x1) {
                  _0xd5a95e = _0x1f15c2.split("#img=");
                  _0x1f15c2 = _0xd5a95e[0x0];
                  _0x505a2d = _0xd5a95e[0x1];
                }
              }
            }
            _0x5e08d1[_0x582a72] = {};
            _0x5e08d1[_0x582a72].id = _0x582a72;
            _0x5e08d1[_0x582a72].start = MVPUtils.toSeconds(_0x48fbde);
            _0x5e08d1[_0x582a72].end = MVPUtils.toSeconds(_0x262bd7);
            _0x5e08d1[_0x582a72].text = _0x1f15c2;
            if (_0x505a2d) {
              _0x5e08d1[_0x582a72].img = _0x505a2d;
            }
            _0x582a72++;
          }
          if (_0x1450dc.duration && _0x49c9b1.showControlsBeforeStart) {
            _0x2bfa95(_0x1450dc.duration);
          }
          _0x5e7bb7 = true;
        }).fail(function (_0x156074, _0x52fa67, _0x1b6e62) {
          console.log("Error loading chapters: ", _0x156074.responseText, _0x52fa67, _0x1b6e62);
        });
      }
      if (_0x49c9b1.seekToChapterStart) {
        _0x550351.on('click', ".mvp-chapter-indicator", function () {
          var _0x5e1482 = _0x2c8ffb(this);
          var _0x25396c = _0x5e1482.attr("data-id");
          _0x3b7564(_0x25396c);
          var _0x434178 = Number(_0x5e1482.attr('data-start'));
          if (_0x1a96c8) {
            _0x5ca0d3.seek(_0x434178);
            if (!_0x1f950b) {
              _0x6a32cc = null;
              _0x150da0(true);
            }
          } else {
            _0x1450dc.start = _0x434178;
            if (_0x1450dc.duration) {
              _0x1a31d5 = _0x8083b8.width();
              _0x1808b1.width(_0x434178 / _0x1450dc.duration * _0x8083b8.width());
              _0x134a79.width(_0x434178 / _0x1450dc.duration * _0x381e37.width());
            }
          }
        });
      }
      if (!_0x36b677) {
        _0x550351.on("mouseenter", ".mvp-chapter-indicator", function () {
          if (!_0x588a79) {
            return false;
          }
          var _0x2e9292 = _0x2c8ffb(this);
          var _0x175250 = _0x2e9292.attr('data-id');
          _0x2e9292.find(".mvp-chapter-indicator-highlight").addClass("mvp-chapter-indicator-highlight-visible");
          _0xe72265.find(".mvp-chapter-menu-item[data-id=\"" + _0x175250 + "\"]").addClass("mvp-chapter-menu-item-active");
        }).on("mouseleave", '.mvp-chapter-indicator', function () {
          if (!_0x588a79) {
            return false;
          }
          var _0x3fe3e8 = _0x2c8ffb(this);
          var _0xfb0fe7 = _0x3fe3e8.attr('data-id');
          if (_0x956980 && _0x956980.id == _0xfb0fe7) {
            return;
          }
          _0x3fe3e8.find(".mvp-chapter-indicator-highlight").removeClass("mvp-chapter-indicator-highlight-visible");
          _0xe72265.find(".mvp-chapter-menu-item[data-id=\"" + _0xfb0fe7 + "\"]").removeClass("mvp-chapter-menu-item-active");
        });
      }
      _0x550351.on("click", ".mvp-chapter-menu-item", function () {
        var _0x1ab0f5 = _0x2c8ffb(this);
        var _0x970d3c = _0x1ab0f5.attr("data-id");
        _0x3b7564(_0x970d3c);
        var _0x5bb4ea = Number(_0x1ab0f5.attr("data-start"));
        if (_0x1a96c8) {
          _0x5ca0d3.seek(_0x5bb4ea);
          if (!_0x1f950b) {
            _0x6a32cc = null;
            _0x150da0(true);
          }
        } else {
          _0x1450dc.start = _0x5bb4ea;
          if (_0x1450dc.duration) {
            _0x1a31d5 = _0x8083b8.width();
            _0x1808b1.width(_0x5bb4ea / _0x1450dc.duration * _0x8083b8.width());
            _0x134a79.width(_0x5bb4ea / _0x1450dc.duration * _0x381e37.width());
          }
          _0x5ca0d3.togglePlayback();
        }
        if (_0x49c9b1.hideChapterMenuOnChapterSelect) {
          _0x86233(false);
        }
      });
      if (!_0x36b677) {
        _0x550351.on("mouseenter", ".mvp-chapter-menu-item, .mvp-chapter-item", function () {
          var _0x314e46 = _0x2c8ffb(this);
          var _0x124d26 = _0x314e46.attr('data-id');
          _0x8083b8.find(".mvp-chapter-indicator[data-id=\"" + _0x124d26 + "\"]").find(".mvp-chapter-indicator-highlight").addClass("mvp-chapter-indicator-highlight-visible");
          if (_0x314e46.hasClass("mvp-chapter-menu-item")) {
            _0x314e46.addClass("mvp-chapter-menu-item-active");
          }
        }).on("mouseleave", ".mvp-chapter-menu-item, .mvp-chapter-item", function () {
          var _0x24a5dc = _0x2c8ffb(this);
          var _0x18ca46 = _0x24a5dc.attr("data-id");
          if (_0x956980 && _0x956980.id == _0x18ca46) {
            return;
          }
          _0x8083b8.find(".mvp-chapter-indicator[data-id=\"" + _0x18ca46 + "\"]").find(".mvp-chapter-indicator-highlight").removeClass("mvp-chapter-indicator-highlight-visible");
          if (_0x24a5dc.hasClass("mvp-chapter-menu-item")) {
            _0x24a5dc.removeClass('mvp-chapter-menu-item-active');
          }
        });
      }
      _0x3c9582.on("click", '.mvp-chapter-item', function () {
        var _0x64f4dc = _0x2c8ffb(this);
        var _0x592621 = _0x64f4dc.attr('data-id');
        _0x3b7564(_0x592621);
        var _0x1379d0 = Number(_0x64f4dc.attr("data-start"));
        if (_0x1a96c8) {
          _0x5ca0d3.seek(_0x1379d0);
          if (!_0x1f950b) {
            _0x6a32cc = null;
            _0x150da0(true);
          }
        } else {
          _0x1450dc.start = _0x1379d0;
          if (_0x1450dc.duration) {
            _0x1a31d5 = _0x8083b8.width();
            _0x1808b1.width(_0x1379d0 / _0x1450dc.duration * _0x1a31d5);
            _0x134a79.width(_0x1379d0 / _0x1450dc.duration * _0x1a31d5);
          }
        }
      });
      var _0x23875e = _0x3c9582.find(".mvp-chapters-search-input").on('keyup', function () {
        var _0x21ed49 = _0x43ed9f.find(".mvp-chapter-item").length;
        if (_0x21ed49 == 0x0) {
          return false;
        }
        var _0x2251f1 = _0x2c8ffb(this).val().toLowerCase();
        var _0x5a4947;
        var _0x3eacef = 0x0;
        var _0x262c8e;
        var _0x46e3fd;
        for (_0x5a4947 = 0x0; _0x5a4947 < _0x21ed49; _0x5a4947++) {
          _0x262c8e = _0x43ed9f.find(".mvp-chapter-item").eq(_0x5a4947);
          _0x46e3fd = _0x262c8e.find(".mvp-chapter-item-text").html().toLowerCase();
          if (_0x46e3fd.indexOf(_0x2251f1) > -0x1) {
            _0x43ed9f.find(".mvp-chapter-item").eq(_0x5a4947).fadeIn(0xc8);
          } else {
            _0x43ed9f.find('.mvp-chapter-item').eq(_0x5a4947).fadeOut(0xc8);
            _0x3eacef++;
          }
        }
        if (_0x3eacef == _0x21ed49) {
          _0x368208.show();
        } else {
          _0x368208.hide();
        }
      });
      function _0x2bfa95(_0x9eede3) {
        var _0x3b6764;
        var _0x3919cd = _0x5e08d1.length;
        var _0xcf384f;
        var _0x138f9e;
        var _0x2a7390;
        var _0x2b08a9;
        var _0x66e514;
        var _0xeb28b0;
        var _0x4d71cc = '';
        for (_0x3b6764 = 0x0; _0x3b6764 < _0x3919cd; _0x3b6764++) {
          _0xcf384f = _0x5e08d1[_0x3b6764];
          _0x66e514 = Math.abs(_0xcf384f.end - _0xcf384f.start);
          _0x138f9e = _0x66e514 / _0x9eede3 * 0x64;
          _0xeb28b0 = _0xcf384f.start / _0x9eede3 * 0x64;
          _0x2a7390 = _0x2c8ffb("<div class=\"mvp-chapter-indicator\"><div class=\"mvp-chapter-indicator-highlight\"></div></div>").css({
            'width': _0x138f9e + '%',
            'left': _0xeb28b0 + '%'
          }).attr({
            'data-id': _0x3b6764,
            'data-title': _0xcf384f.text,
            'data-start': _0xcf384f.start,
            'data-end': _0xcf384f.end
          }).appendTo(_0x8083b8);
          var _0x344266 = MVPUtils.formatTime(_0xcf384f.start);
          if (_0x49c9b1.useChapterWindow) {
            _0x4d71cc += "<div class=\"mvp-chapter-item\" role=\"button\" tabindex=\"0\" data-start=\"" + _0xcf384f.start + "\" data-end=\"" + _0xcf384f.end + "\" data-id=\"" + _0x3b6764 + "\">";
            if (_0xcf384f.img) {
              var _0xf936dc = _0xcf384f.text.replace(/"/g, "'");
              _0x4d71cc += "<div class=\"mvp-chapter-item-thumb\"><img class=\"mvp-chapter-item-thumb-img\" src=\"" + _0xcf384f.img + "\" alt=\"" + _0xf936dc + "\"/></div>";
            }
            _0x4d71cc += "<div class=\"mvp-chapter-item-info\">";
            _0x4d71cc += "<div class=\"mvp-chapter-item-text\">" + _0xcf384f.text + '</div>';
            _0x4d71cc += "<div class=\"mvp-chapter-item-time\">" + _0x344266 + '</div>';
            _0x4d71cc += '</div>';
            _0x4d71cc += "</div>";
            _0x43ed9f.html(_0x4d71cc);
          } else {
            _0x2b08a9 = _0x2c8ffb("<li class=\"mvp-chapter-menu-item\"><span class=\"mvp-chapter-menu-item-title\">" + _0xcf384f.text + "</span><span class=\"mvp-chapter-menu-item-start\">" + _0x344266 + "</span></li>").attr({
              'data-id': _0x3b6764,
              'title': _0xcf384f.text,
              'data-start': _0xcf384f.start
            }).appendTo(_0xe72265);
          }
        }
        if (_0x49c9b1.useChapterWindow) {
          if (_0x1898dd == 'h') {
            var _0x1b78c6 = _0x2c8ffb("<div class=\"mvp-chapter-item\" style=\"opacity:0;\"></div>").prependTo(_0x550351);
            var _0x405b04 = _0x1b78c6.outerWidth(true);
            _0x1b78c6.remove();
            _0x1b78c6 = null;
            _0x43ed9f.width(_0x3919cd * _0x405b04);
          }
        }
        _0x488eee = true;
        _0x192b7c.show();
        _0x1fb1a7.show();
        _0x482062.show();
        if (_0x49c9b1.autoOpenChapterMenu) {
          _0x86233();
        }
      }
      function _0x3b7564(_0x38f9c0) {
        if (_0x5589a0) {
          _0x5589a0.removeClass("mvp-chapter-menu-item-active");
        }
        _0x5589a0 = _0xe72265.find(".mvp-chapter-menu-item[data-id='" + _0x38f9c0 + "']").addClass('mvp-chapter-menu-item-active');
        if (_0x2cfea7) {
          _0x2cfea7.removeClass("mvp-chapter-indicator-highlight-visible");
        }
        _0x2cfea7 = _0x8083b8.find(".mvp-chapter-indicator[data-id='" + _0x38f9c0 + "']").find(".mvp-chapter-indicator-highlight").addClass("mvp-chapter-indicator-highlight-visible");
        _0x956980 = _0x5e08d1[_0x38f9c0];
        if (_0x49c9b1.useChapterWindow) {
          if (_0x5b9357) {
            _0x5b9357.removeClass("mvp-chapter-item-active");
          }
          _0x5b9357 = _0x43ed9f.find(".mvp-chapter-item[data-id='" + _0x38f9c0 + "']").addClass("mvp-chapter-item-active");
        }
        if (_0x49c9b1.showChapterTitle) {
          _0x557762.html(_0x956980.text).addClass("mvp-visible");
        }
      }
      function _0x3cdcc5() {
        var _0x2d4f45;
        var _0x4b0e7e = '';
        var _0x1b4f4e = 0x0;
        _0x208e6f.children().each(function () {
          _0x1b4f4e++;
          _0x2d4f45 = _0x2c8ffb(this);
          _0x4b0e7e += "<div class=\"mvp-playlist-selector-item\" role=\"button\" tabindex=\"0\" data-id=\"" + _0x2d4f45.attr("class") + "\">";
          if (_0x2d4f45.attr("data-thumb")) {
            _0x4b0e7e += "<div class=\"mvp-playlist-selector-item-thumb\"><img class=\"mvp-chapter-item-thumb-img\" src=\"" + _0x2d4f45.attr('data-thumb') + "\"/></div>";
          }
          _0x4b0e7e += "<div class=\"mvp-playlist-selector-item-info\">";
          if (_0x2d4f45.attr("data-title")) {
            _0x4b0e7e += "<div class=\"mvp-playlist-selector-item-title\">" + _0x2d4f45.attr("data-title") + "</div>";
          }
          if (_0x2d4f45.attr("data-description")) {
            _0x4b0e7e += "<div class=\"mvp-playlist-selector-item-description\">" + _0x2d4f45.attr("data-description") + '</div>';
          }
          _0x4b0e7e += "</div>";
          _0x4b0e7e += "</div>";
        });
        _0xe082c5.html(_0x4b0e7e);
        _0x550351.on('click', ".mvp-playlist-selector-header-inner", function () {
          _0x4fc65d();
        });
        if (_0x1898dd == 'h') {
          var _0x3bdce6 = _0x2c8ffb("<div class=\"mvp-playlist-selector-item\" style=\"opacity:0;\"></div>").prependTo(_0x550351);
          var _0x273725 = _0x3bdce6.outerWidth(true);
          _0x3bdce6.remove();
          _0x3bdce6 = null;
          _0xe082c5.width(_0x1b4f4e * _0x273725);
        }
        if (_0x49c9b1.autoOpenPlaylistSelector) {
          _0x4fc65d();
        }
      }
      _0xe082c5.on("click", '.mvp-playlist-selector-item', function () {
        var _0x454e5a = _0x2c8ffb(this);
        if (_0x454e5a.hasClass("mvp-playlist-selector-item-active")) {
          return false;
        }
        if (_0x1dcb4a) {
          _0x1dcb4a.removeClass("mvp-playlist-selector-item-active");
        }
        _0x1dcb4a = _0x454e5a.addClass('mvp-playlist-selector-item-active');
        var _0x27856c = _0x454e5a.attr("data-id");
        _0x5ca0d3.loadPlaylist('.' + _0x27856c);
      });
      function _0x4fc65d(_0x551d39) {
        if (typeof _0x551d39 !== "undefined") {
          if (_0x5d4070 && _0x551d39 == true) {
            return false;
          } else {
            if (!_0x5d4070 && _0x551d39 == false) {
              return false;
            }
          }
          _0x5d4070 = !_0x551d39;
        }
        _0x439e41.val('').trigger("keyup");
        if (_0x5d4070) {
          _0x14c769.hide();
          _0x5d4070 = false;
          _0x311cf2.removeClass("mvp-playlist-selector-header-inner-opened");
          _0x2b0f45.show();
        } else {
          _0x2b0f45.hide();
          _0x311cf2.addClass("mvp-playlist-selector-header-inner-opened");
          _0x14c769.show();
          _0x5d4070 = true;
        }
      }
      function _0x3cdaec(_0x25af9b) {
        var _0x2f0d20;
        var _0x4d15a3 = _0x420869.length;
        var _0xd78b27;
        var _0x2fee50;
        for (_0x2f0d20 = 0x0; _0x2f0d20 < _0x4d15a3; _0x2f0d20++) {
          _0xd78b27 = _0x420869[_0x2f0d20];
          _0x2fee50 = Math.round(_0xd78b27.begin / _0x25af9b * 0x64);
          _0xd78b27.marker = _0x2c8ffb("<div class=\"mvp-ad-indicator\"></div>").css({
            'left': _0x2fee50 + '%'
          }).appendTo(_0x8083b8);
        }
        if (_0x450dd1.length) {
          _0x2c8ffb("<div class=\"mvp-ad-indicator\"></div>").css({
            'right': 0x0
          }).appendTo(_0x8083b8);
        }
      }
      this.makeAdMarkersIma = function (_0x439e06) {
        var _0x12750b;
        var _0x351845 = _0x439e06.length;
        var _0x3b82c7;
        var _0x3ef17d;
        var _0x447053;
        var _0x5e553a = _0x5ca0d3.getDuration();
        for (_0x12750b = 0x0; _0x12750b < _0x351845; _0x12750b++) {
          _0x3ef17d = _0x439e06[_0x12750b];
          if (_0x3ef17d > 0x0) {
            _0x447053 = Math.round(_0x3ef17d / _0x5e553a * 0x64);
            _0x3b82c7 = _0x2c8ffb("<div class=\"mvp-ad-indicator\" data-start=\"" + _0x3ef17d + "\"></div>").css({
              'left': _0x447053 + '%'
            }).appendTo(_0x8083b8);
            _0x24fb02.push({
              'marker': _0x3b82c7,
              'begin': _0x3ef17d
            });
          } else if (_0x3ef17d == -0x1) {
            _0x3ef17d = _0x5e553a;
            _0x3b82c7 = _0x2c8ffb("<div class=\"mvp-ad-indicator\" data-start=\"" + _0x3ef17d + "\"></div>").css({
              'right': 0x0
            }).appendTo(_0x8083b8);
            _0x24fb02.push({
              'marker': _0x3b82c7,
              'begin': _0x5e553a
            });
          }
        }
      };
      function _0x3cfe19() {
        if (!_0x5d120f) {
          _0x5d120f = document.createElement('canvas');
          _0x5d120f.className = "mvp-preview-seek-canvas";
          _0x18208a = _0x4afc0f.width();
          _0x6b9097 = _0x4afc0f.height();
          _0x5d120f.width = _0x18208a;
          _0x5d120f.height = _0x6b9097;
          _0xf5f6c0 = _0x5d120f.getContext('2d');
          _0x33e7c8.append(_0x5d120f);
          _0x50164f = document.createElement("video");
          _0x50164f.muted = true;
          _0x50164f.playsinline = true;
          _0x50164f.setAttribute("playsinline", "playsinline");
          _0x50164f.setAttribute("muted", "muted");
          _0x50164f.addEventListener('seeked', function () {
            if (!_0x8bc5df) {
              _0x8bc5df = true;
              _0xf5f6c0.drawImage(_0x50164f, 0x0, 0x0, _0x18208a, _0x6b9097);
            }
          });
        }
        if (_0x225c56 == "hls") {
          if (_0x253f76) {
            _0x124dbc = new Hls();
            _0x124dbc.on(Hls.Events.MEDIA_ATTACHED, function () {
              _0x124dbc.loadSource(_0x1667c6);
            });
          }
        } else {
          if (_0x225c56 == 'dash') {
            if (!_0x482968) {
              _0x482968 = dashjs.MediaPlayer().create();
            }
          }
        }
      }
      function _0x186eb3() {
        if (_0x225c56 == "hls") {
          if (_0x253f76) {
            _0x124dbc.attachMedia(_0x50164f);
          } else {
            if (_0x50164f.canPlayType("application/vnd.apple.mpegurl") == 'true') {
              _0x50164f.src = _0x1667c6;
            } else {
              if (_0x1450dc.mp4) {
                _0x50164f.src = _0x1450dc.mp4;
                _0x50164f.load();
              } else {
                try {
                  _0x50164f.src = _0x1667c6;
                  _0x50164f.load();
                } catch (_0x1eea59) {
                  console.log("This browser or device does not support HLS extension. Please use mp4 video for playback!");
                }
              }
            }
          }
        } else if (_0x225c56 == 'dash') {
          if (_0x52ee22) {
            if (!_0x44187c) {
              _0x482968.initialize(_0x50164f, _0x1667c6, true);
              _0x44187c = true;
            } else {
              _0x482968.attachSource(_0x1667c6);
            }
          } else if (_0x1450dc.mp4) {
            _0x50164f.src = _0x1450dc.mp4;
            _0x50164f.load();
          } else {
            console.log("This browser or device does not support MPEG-DASH extension. Please use mp4 video for playback!");
          }
        } else {
          _0x50164f.src = _0x1667c6;
          _0x50164f.load();
        }
      }
      function _0x159e68(_0x5e42d4) {
        _0x8bc5df = false;
        var _0x596f2c = _0x50164f.play();
        if (_0x596f2c !== undefined) {
          _0x596f2c.then(function () {})["catch"](function (_0x2aed3f) {});
        }
        try {
          _0x50164f.currentTime = _0x5e42d4;
        } catch (_0x23d0da) {}
      }
      function _0x12cc74() {
        if (_0x50164f) {
          _0x50164f.pause();
        }
        if (_0xf5f6c0) {
          _0xf5f6c0.clearRect(0x0, 0x0, _0x18208a, _0x6b9097);
        }
      }
      function _0x4dfd59() {
        if (window.location.protocol == "file:") {
          console.log("Getting preview seek requires server connection.");
          return false;
        }
        _0x482aec = [];
        _0x2c8ffb.ajax({
          'url': _0x1450dc.previewSeek
        }).done(function (_0xa140b5) {
          var _0x52e33c = _0xa140b5.replace(/\r\n|\r|\n/g, "\n");
          _0x52e33c = MVPUtils.strip(_0x52e33c);
          var _0x554089 = _0x52e33c.split("\n\n");
          var _0x5dff41;
          var _0x28eb79;
          var _0x3cf3a8 = 0x0;
          var _0x40bde3;
          var _0x3a8040;
          var _0x3c65fc;
          for (_0x5dff41 in _0x554089) {
            _0x28eb79 = _0x554089[_0x5dff41].split("\n");
            if (_0x28eb79 == "WEBVTT") {
              continue;
            }
            if (_0x28eb79.length >= 0x2) {
              _0x40bde3 = MVPUtils.strip(_0x28eb79[0x0].split(" --> ")[0x0]);
              _0x3a8040 = MVPUtils.strip(_0x28eb79[0x0].split(" --> ")[0x1]);
              _0x3c65fc = _0x28eb79[0x1];
              _0x482aec[_0x3cf3a8] = {};
              _0x482aec[_0x3cf3a8].start = MVPUtils.toSeconds(_0x40bde3);
              _0x482aec[_0x3cf3a8].end = MVPUtils.toSeconds(_0x3a8040);
              _0x482aec[_0x3cf3a8].url = _0x3c65fc;
            }
            _0x3cf3a8++;
          }
          _0x59f04a = true;
        }).fail(function (_0x7395dc, _0x312694, _0x3e4cc2) {
          console.log(_0x7395dc, _0x312694, _0x3e4cc2);
        });
      }
      if (_0x49c9b1.useKeyboardNavigationForPlayback && _0x49c9b1.keyboardControls.length) {
        if (!Array.isArray(_0x49c9b1.keyboardControls)) {
          _0x49c9b1.keyboardControls = _0x49c9b1.keyboardControls.split(';');
        }
        if (_0x49c9b1.useGlobalKeyboardControls) {
          _0x1e590e.on("keydown.mvp", function (_0x364962) {
            return _0x174296(_0x364962);
          });
        } else {
          _0x550351.hover(function () {
            _0x1e590e.on("keydown", function (_0x962406) {
              return _0x174296(_0x962406);
            });
          }, function () {
            _0x1e590e.off('keydown');
          });
        }
      }
      function _0x174296(_0x5a1e90) {
        if (!_0x588a79) {
          return false;
        }
        var _0x2cf536 = _0x5a1e90.keyCode;
        var _0x1ac2a4 = _0x2c8ffb(_0x5a1e90.target);
        if (_0x1ac2a4.hasClass("mvp-input-field")) {
          return true;
        }
        if (_0x49c9b1.modifierKey) {
          var _0x11f1f2;
          var _0x1014ef = _0x49c9b1.keyboardControls.length;
          var _0x29a239;
          for (_0x11f1f2 = 0x0; _0x11f1f2 < _0x1014ef; _0x11f1f2++) {
            _0x29a239 = _0x49c9b1.keyboardControls[_0x11f1f2];
            if (_0x5a1e90[_0x49c9b1.modifierKey] && _0x2cf536 == _0x29a239.keycode) {
              if (_0x29a239.action == "seekBackward") {
                _0x5ca0d3.seekBackward(_0x49c9b1.seekTime);
              } else {
                if (_0x29a239.action == "seekForward") {
                  _0x5ca0d3.seekForward(_0x49c9b1.seekTime);
                } else {
                  if (_0x29a239.action == "togglePlayback") {
                    _0x5ca0d3.togglePlayback();
                  } else {
                    if (_0x29a239.action == "volumeUp") {
                      _0x49c9b1.volume += 0.1;
                      if (_0x49c9b1.volume > 0x1) {
                        _0x49c9b1.volume = 0x1;
                      }
                      _0x5ca0d3.setVolume(_0x49c9b1.volume);
                    } else {
                      if (_0x29a239.action == "volumeDown") {
                        _0x49c9b1.volume -= 0.1;
                        if (_0x49c9b1.volume < 0x0) {
                          _0x49c9b1.volume = 0x0;
                        }
                        _0x5ca0d3.setVolume(_0x49c9b1.volume);
                      } else {
                        if (_0x29a239.action == "toggleMute") {
                          _0x367db0();
                        } else {
                          if (_0x29a239.action == "nextMedia") {
                            _0x5ca0d3.nextMedia();
                          } else {
                            if (_0x29a239.action == "previousMedia") {
                              _0x5ca0d3.previousMedia();
                            } else {
                              if (_0x29a239.action == "rewind") {
                                _0x5ca0d3.seek(0x0);
                              } else {
                                if (_0x29a239.action == "toggleFullscreen") {
                                  _0x4eaebf();
                                } else {
                                  if (_0x29a239.action == "toggleTheater") {
                                    if (_0x2e3f69 == "fullscreen") {
                                      return false;
                                    }
                                    _0x4fa334.click();
                                  } else {
                                    if (_0x29a239.action == "toggleSubtitle") {
                                      _0x5ca0d3.toggleSubtitle();
                                    } else {
                                      if (_0x29a239.action == 'subtitleSizeUp') {
                                        if (_0x275e34) {
                                          var _0x19935d = parseInt(_0x2a65bd.css("fontSize"), 0xa) + 0x1;
                                          _0x2a65bd.css("fontSize", _0x19935d + 'px');
                                        }
                                      } else {
                                        if (_0x29a239.action == "subtitleSizeDown") {
                                          if (_0x275e34) {
                                            var _0x19935d = parseInt(_0x2a65bd.css("fontSize"), 0xa) - 0x1;
                                            if (_0x19935d < 0xa) {
                                              _0x19935d = 0xa;
                                            }
                                            _0x2a65bd.css('fontSize', _0x19935d + 'px');
                                          }
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
              break;
            }
          }
        } else {
          var _0x11f1f2;
          var _0x1014ef = _0x49c9b1.keyboardControls.length;
          var _0x29a239;
          for (_0x11f1f2 = 0x0; _0x11f1f2 < _0x1014ef; _0x11f1f2++) {
            _0x29a239 = _0x49c9b1.keyboardControls[_0x11f1f2];
            if (_0x2cf536 == _0x29a239.keycode) {
              if (_0x29a239.action == 'seekBackward') {
                _0x5ca0d3.seekBackward(_0x49c9b1.seekTime);
              } else {
                if (_0x29a239.action == "seekForward") {
                  _0x5ca0d3.seekForward(_0x49c9b1.seekTime);
                } else {
                  if (_0x29a239.action == "togglePlayback") {
                    _0x5ca0d3.togglePlayback();
                  } else {
                    if (_0x29a239.action == 'volumeUp') {
                      _0x49c9b1.volume += 0.1;
                      if (_0x49c9b1.volume > 0x1) {
                        _0x49c9b1.volume = 0x1;
                      }
                      _0x5ca0d3.setVolume(_0x49c9b1.volume);
                    } else {
                      if (_0x29a239.action == "volumeDown") {
                        _0x49c9b1.volume -= 0.1;
                        if (_0x49c9b1.volume < 0x0) {
                          _0x49c9b1.volume = 0x0;
                        }
                        _0x5ca0d3.setVolume(_0x49c9b1.volume);
                      } else {
                        if (_0x29a239.action == "toggleMute") {
                          _0x367db0();
                        } else {
                          if (_0x29a239.action == "nextMedia") {
                            _0x5ca0d3.nextMedia();
                          } else {
                            if (_0x29a239.action == 'previousMedia') {
                              _0x5ca0d3.previousMedia();
                            } else {
                              if (_0x29a239.action == "rewind") {
                                _0x5ca0d3.seek(0x0);
                              } else {
                                if (_0x29a239.action == 'toggleFullscreen') {
                                  _0x4eaebf();
                                } else {
                                  if (_0x29a239.action == "toggleTheater") {
                                    if (_0x2e3f69 == 'fullscreen') {
                                      return false;
                                    }
                                    _0x4fa334.click();
                                  } else {
                                    if (_0x29a239.action == "toggleSubtitle") {
                                      _0x5ca0d3.toggleSubtitle();
                                    } else {
                                      if (_0x29a239.action == "subtitleSizeUp") {
                                        if (_0x275e34) {
                                          var _0x19935d = parseInt(_0x2a65bd.css('fontSize'), 0xa) + 0x1;
                                          _0x2a65bd.css('fontSize', _0x19935d + 'px');
                                        }
                                      } else {
                                        if (_0x29a239.action == "subtitleSizeDown") {
                                          if (_0x275e34) {
                                            var _0x19935d = parseInt(_0x2a65bd.css("fontSize"), 0xa) - 0x1;
                                            if (_0x19935d < 0xa) {
                                              _0x19935d = 0xa;
                                            }
                                            _0x2a65bd.css("fontSize", _0x19935d + 'px');
                                          }
                                        } else {
                                          return true;
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
              break;
            }
          }
        }
        return false;
      }
      var _0x1dda8e = [_0x8f9621, _0x2f574b, _0x105ccb, _0x19b5b0, _0x43145f, _0x4d7e30, _0x5298b7, _0x2cccd5, _0x58a309, _0x276f15, _0x376393, _0xc5e786, _0xf7f71, _0xf39bf5, _0xc54ce2, _0x4fa334, _0xcc1b36, _0x290120, _0x192b7c, _0x40f459, _0x225e48, _0x1fb1a7, _0x482062, _0x591853, _0x550351.find(".mvp-chapter-menu-close"), _0x550351.find(".mvp-pwd-confirm"), _0x550351.find(".mvp-info-close"), _0x550351.find(".mvp-transcript-close"), _0x550351.find(".mvp-share-item"), _0x550351.find(".mvp-share-close"), _0x550351.find(".mvp-redirect-login-cancel"), _0x550351.find(".mvp-minimize-close"), _0x550351.find('.mvp-resume-continue'), _0x550351.find('.mvp-resume-restart'), _0x550351.find(".mvp-embed-close"), _0x550351.find(".mvp-chapters-close"), _0x550351.find(".mvp-transform-toggle"), _0x550351.find('.mvp-transform-move-left'), _0x550351.find(".mvp-transform-move-right"), _0x550351.find(".mvp-transform-move-up"), _0x550351.find('.mvp-transform-move-down'), _0x550351.find(".mvp-transform-zoom-in"), _0x550351.find(".mvp-transform-zoom-out"), _0x550351.find('.mvp-transform-rotate-left'), _0x550351.find(".mvp-transform-rotate-right"), _0x550351.find(".mvp-transform-reset")];
      var _0x5d230d;
      var _0x17a62f = _0x1dda8e.length;
      var _0x9176dd;
      for (_0x9176dd = 0x0; _0x9176dd < _0x17a62f; _0x9176dd++) {
        _0x5d230d = _0x2c8ffb(_0x1dda8e[_0x9176dd]).css("cursor", "pointer").on('click', _0x1a2306);
      }
      function _0x1a2306(_0x1e0ba0) {
        _0x1e0ba0.preventDefault();
        if (!_0x588a79) {
          return false;
        }
        var _0x5ef68a = _0x2c8ffb(_0x1e0ba0.currentTarget);
        if (_0x5ef68a.hasClass('mvp-playback-toggle')) {
          _0x5ca0d3.togglePlayback();
        } else {
          if (_0x5ef68a.hasClass("mvp-big-play")) {
            _0x105ccb.hide();
            _0x5ca0d3.togglePlayback();
          } else {
            if (_0x5ef68a.hasClass("mvp-playlist-toggle")) {
              _0x4d8ee1();
            } else {
              if (_0x5ef68a.hasClass("mvp-resume-continue")) {
                _0x21ff2c(false);
                if (_0x41a8e7 != 0x0 && _0x1ac3d7 == 0x0 && !_0x5777b3) {
                  _0x5777b3 = true;
                  _0x1ac3d7 = _0x41a8e7;
                }
                _0x3a8faa();
              } else {
                if (_0x5ef68a.hasClass("mvp-resume-restart")) {
                  _0x21ff2c(false);
                  if (_0x41a8e7 != 0x0 && _0x1ac3d7 == 0x0 && !_0x5777b3) {
                    _0x5777b3 = true;
                    _0x1ac3d7 = _0x41a8e7;
                  }
                  _0x4b8613 = 0x0;
                  _0x3a8faa();
                } else {
                  if (_0x5ef68a.hasClass('mvp-cc-toggle')) {
                    _0x5ca0d3.toggleSubtitle();
                  } else {
                    if (_0x5ef68a.hasClass("mvp-vr-toggle")) {
                      if (!_0x4bb4f5) {
                        const _0x505667 = {
                          'optionalFeatures': ['local-floor', "bounded-floor", "hand-tracking"]
                        };
                        navigator.xr.requestSession("immersive-vr", _0x505667).then(_0x22632b);
                      } else {
                        _0x4bb4f5.end();
                      }
                    } else {
                      if (_0x5ef68a.hasClass("mvp-info-toggle")) {
                        _0x5603f5();
                      } else {
                        if (_0x5ef68a.hasClass('mvp-info-close')) {
                          _0x5603f5(false);
                        } else {
                          if (_0x5ef68a.hasClass('mvp-redirect-login-cancel')) {
                            _0x45aac9();
                          } else {
                            if (_0x5ef68a.hasClass("mvp-share-close")) {
                              _0x2dd698(false);
                            } else {
                              if (_0x5ef68a.hasClass("mvp-embed-close")) {
                                _0x27c5aa(false);
                              } else {
                                if (_0x5ef68a.hasClass('mvp-chapter-toggle')) {
                                  _0x86233();
                                } else {
                                  if (_0x5ef68a.hasClass("mvp-chapters-close")) {
                                    _0x86233(false);
                                  } else {
                                    if (_0x5ef68a.hasClass("mvp-next-chapter-toggle")) {
                                      if (_0x956980) {
                                        var _0x16c59d = _0x956980.id;
                                        _0x16c59d++;
                                        if (_0x16c59d > _0x5e08d1.length - 0x1) {
                                          _0x16c59d = 0x0;
                                        }
                                        if (_0x49c9b1.useChapterWindow) {
                                          _0x43ed9f.find(".mvp-chapter-item[data-id=" + _0x16c59d + ']').trigger("click");
                                        } else {
                                          _0xe72265.find('.mvp-chapter-menu-item[data-id=' + _0x16c59d + ']').trigger("click");
                                        }
                                      } else {
                                        _0xe72265.find(".mvp-chapter-menu-item[data-id=0]").trigger("click");
                                      }
                                    } else {
                                      if (_0x5ef68a.hasClass("mvp-prev-chapter-toggle")) {
                                        if (_0x956980) {
                                          var _0x16c59d = _0x956980.id;
                                          _0x16c59d--;
                                          if (_0x16c59d < 0x0) {
                                            _0x16c59d = _0x5e08d1.length - 0x1;
                                          }
                                          if (_0x49c9b1.useChapterWindow) {
                                            _0x43ed9f.find(".mvp-chapter-item[data-id=" + _0x16c59d + ']').trigger("click");
                                          } else {
                                            _0xe72265.find(".mvp-chapter-menu-item[data-id=" + _0x16c59d + ']').trigger("click");
                                          }
                                        } else {
                                          _0xe72265.find(".mvp-chapter-menu-item[data-id=0]").trigger("click");
                                        }
                                      } else {
                                        if (_0x5ef68a.hasClass("mvp-transcript-toggle")) {
                                          _0x8b46f9();
                                        } else {
                                          if (_0x5ef68a.hasClass("mvp-transcript-close")) {
                                            _0x8b46f9(false);
                                          } else {
                                            if (_0x5ef68a.hasClass("mvp-cast-toggle")) {
                                              if (_0x576097) {
                                                _0x3c1510.stopCasting();
                                                _0x576097 = false;
                                              }
                                            } else {
                                              if (_0x5ef68a.hasClass("mvp-airplay-toggle")) {
                                                _0x326462.webkitShowPlaybackTargetPicker();
                                              } else {
                                                if (_0x5ef68a.hasClass("mvp-chapter-menu-close")) {
                                                  _0x86233(false);
                                                } else {
                                                  if (_0x5ef68a.hasClass("mvp-minimize-close")) {
                                                    _0x48f7fc.off(_0x28982f);
                                                    _0x3bc0ca(true);
                                                    _0x49c9b1.minimizeOnScroll = false;
                                                  } else {
                                                    if (_0x5ef68a.hasClass("mvp-pwd-confirm")) {
                                                      var _0x19adaf = _0x6880b5.val();
                                                      if (MVPUtils.isEmpty(_0x19adaf)) {
                                                        alert(_0x5da6f7);
                                                      } else {
                                                        if (typeof md5 === "undefined") {
                                                          var _0x450d73 = document.createElement("script");
                                                          _0x450d73.type = 'text/javascript';
                                                          if (!MVPUtils.relativePath(_0x49c9b1.md5_js)) {
                                                            var _0x3ae8f7 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.md5_js);
                                                          } else {
                                                            var _0x3ae8f7 = _0x49c9b1.md5_js;
                                                          }
                                                          _0x450d73.src = _0x3ae8f7;
                                                          _0x450d73.onload = _0x450d73.onreadystatechange = function () {
                                                            if (!this.readyState || this.readyState == "complete") {
                                                              if (md5(_0x19adaf) != _0x1450dc.pwd) {
                                                                alert(_0x5da6f7);
                                                              } else {
                                                                delete _0x1450dc.pwd;
                                                                _0x2a430a.one("transitionend", function () {
                                                                  _0x2a430a.css("display", "none");
                                                                }).removeClass('mvp-holder-visible');
                                                                _0x6880b5.val('');
                                                                if (_0x1450dc.lockTime == '0' && !_0x3d3884) {
                                                                  _0x45aac9("watch");
                                                                } else {
                                                                  _0x3a8faa();
                                                                }
                                                              }
                                                            }
                                                          };
                                                          _0x450d73.onerror = function () {
                                                            console.log("Error loading " + this.src);
                                                          };
                                                          var _0x4e7213 = document.getElementsByTagName("script")[0x0];
                                                          _0x4e7213.parentNode.insertBefore(_0x450d73, _0x4e7213);
                                                        } else if (md5(_0x19adaf) != _0x1450dc.pwd) {
                                                          alert(_0x5da6f7);
                                                        } else {
                                                          delete _0x1450dc.pwd;
                                                          _0x2a430a.one("transitionend", function () {
                                                            _0x2a430a.css("display", "none");
                                                          }).removeClass('mvp-holder-visible');
                                                          _0x6880b5.val('');
                                                          if (_0x1450dc.lockTime == '0' && !_0x3d3884) {
                                                            _0x45aac9("watch");
                                                          } else {
                                                            _0x3a8faa();
                                                          }
                                                        }
                                                      }
                                                    } else {
                                                      if (_0x5ef68a.hasClass("mvp-previous-toggle")) {
                                                        if (_0x49c9b1.disableVideoSkip) {
                                                          return false;
                                                        }
                                                        _0x37d09c();
                                                      } else {
                                                        if (_0x5ef68a.hasClass("mvp-next-toggle")) {
                                                          if (_0x49c9b1.disableVideoSkip) {
                                                            return false;
                                                          }
                                                          _0x3199b6();
                                                        } else {
                                                          if (_0x5ef68a.hasClass("mvp-rewind-toggle")) {
                                                            _0x5ca0d3.seek(0x0);
                                                          } else {
                                                            if (_0x5ef68a.hasClass('mvp-skip-backward-toggle')) {
                                                              _0x5ca0d3.seekBackward();
                                                            } else {
                                                              if (_0x5ef68a.hasClass("mvp-skip-forward-toggle")) {
                                                                _0x5ca0d3.seekForward();
                                                              } else {
                                                                if (_0x5ef68a.hasClass("mvp-loop-toggle")) {
                                                                  _0x453856.setLooping();
                                                                } else {
                                                                  if (_0x5ef68a.hasClass("mvp-shuffle-toggle")) {
                                                                    _0x453856.setRandom();
                                                                  } else {
                                                                    if (_0x5ef68a.hasClass("mvp-share-toggle")) {
                                                                      _0x2dd698();
                                                                    } else {
                                                                      if (_0x5ef68a.hasClass("mvp-embed-toggle")) {
                                                                        _0x27c5aa();
                                                                      } else {
                                                                        if (_0x5ef68a.hasClass("mvp-pip-toggle")) {
                                                                          if (_0x31e808) {
                                                                            if (!document.pictureInPictureElement) {
                                                                              try {
                                                                                _0x326462.requestPictureInPicture();
                                                                              } catch (_0x5633f8) {}
                                                                            } else {
                                                                              try {
                                                                                document.exitPictureInPicture();
                                                                              } catch (_0x12daf4) {}
                                                                            }
                                                                          } else if (_0x326462.webkitSupportsPresentationMode && typeof _0x326462.webkitSetPresentationMode === "function") {
                                                                            _0x326462.webkitSetPresentationMode(_0x326462.webkitPresentationMode === "picture-in-picture" ? "inline" : "picture-in-picture");
                                                                          }
                                                                        } else {
                                                                          if (_0x5ef68a.hasClass('mvp-theater-toggle')) {
                                                                            if (_0x3ea903) {
                                                                              if (_0x49c9b1.theaterElement) {
                                                                                _0x2c8ffb(_0x49c9b1.theaterElement).removeClass(_0x49c9b1.theaterElementClass);
                                                                              }
                                                                              _0x2c8ffb(_0x5ca0d3).trigger('beforeTheaterExit', {
                                                                                'instance': _0x5ca0d3,
                                                                                'instanceName': _0x49c9b1.instanceName,
                                                                                'media': _0x1450dc
                                                                              });
                                                                              if (_0x3a2359 && !_0x49c9b1.playlistOpened) {
                                                                                _0x3a2359 = false;
                                                                                _0x49c9b1.playlistOpened = true;
                                                                              }
                                                                              _0x550351.removeClass("mvp-theater");
                                                                              _0x31d45c();
                                                                            } else {
                                                                              if (_0x49c9b1.theaterElement) {
                                                                                _0x2c8ffb(_0x49c9b1.theaterElement).addClass(_0x49c9b1.theaterElementClass);
                                                                              }
                                                                              _0x2c8ffb(_0x5ca0d3).trigger("beforeTheaterEnter", {
                                                                                'instance': _0x5ca0d3,
                                                                                'instanceName': _0x49c9b1.instanceName,
                                                                                'media': _0x1450dc
                                                                              });
                                                                              if (_0x49c9b1.hidePlaylistOnTheaterEnter && _0x49c9b1.playlistOpened) {
                                                                                _0x3a2359 = true;
                                                                                _0x49c9b1.playlistOpened = false;
                                                                              }
                                                                              _0x550351.addClass("mvp-theater");
                                                                              _0x31d45c();
                                                                              setTimeout(function () {
                                                                                _0x31d45c();
                                                                              }, 0xfa);
                                                                              if (_0x49c9b1.focusVideoInTheater) {
                                                                                var _0x18df8f = _0x93b161.offset().top;
                                                                                _0x2c8ffb("html,body").animate({
                                                                                  'scrollTop': _0x18df8f
                                                                                }, 0x1f4);
                                                                              }
                                                                            }
                                                                            _0x3ea903 = !_0x3ea903;
                                                                          } else {
                                                                            if (_0x5ef68a.hasClass("mvp-share-item")) {
                                                                              if (!_0xaad07c) {
                                                                                return false;
                                                                              }
                                                                              if (_0x27d391) {
                                                                                _0x27d391.share(_0x5ef68a.attr("data-type").toLowerCase(), _0x1450dc, _0x5ca0d3.getCurrentMediaUrl());
                                                                              }
                                                                            } else {
                                                                              if (_0x5ef68a.hasClass("mvp-transform-toggle")) {
                                                                                _0x550351.find(".mvp-transform-controls-inner").toggleClass("mvp-transform-controls-hidden");
                                                                              } else {
                                                                                if (_0x5ef68a.hasClass('mvp-transform-move-left')) {
                                                                                  if (_0x56995a) {
                                                                                    _0x56995a.transform("move-left");
                                                                                  }
                                                                                } else {
                                                                                  if (_0x5ef68a.hasClass("mvp-transform-move-right")) {
                                                                                    if (_0x56995a) {
                                                                                      _0x56995a.transform("move-right");
                                                                                    }
                                                                                  } else {
                                                                                    if (_0x5ef68a.hasClass('mvp-transform-move-up')) {
                                                                                      if (_0x56995a) {
                                                                                        _0x56995a.transform('move-up');
                                                                                      }
                                                                                    } else {
                                                                                      if (_0x5ef68a.hasClass("mvp-transform-move-down")) {
                                                                                        if (_0x56995a) {
                                                                                          _0x56995a.transform("move-down");
                                                                                        }
                                                                                      } else {
                                                                                        if (_0x5ef68a.hasClass('mvp-transform-zoom-in')) {
                                                                                          if (_0x56995a) {
                                                                                            _0x56995a.transform('zoom-in');
                                                                                          }
                                                                                        } else {
                                                                                          if (_0x5ef68a.hasClass("mvp-transform-zoom-out")) {
                                                                                            if (_0x56995a) {
                                                                                              _0x56995a.transform("zoom-out");
                                                                                            }
                                                                                          } else {
                                                                                            if (_0x5ef68a.hasClass('mvp-transform-rotate-left')) {
                                                                                              if (_0x56995a) {
                                                                                                _0x56995a.transform('rotate-left');
                                                                                              }
                                                                                            } else {
                                                                                              if (_0x5ef68a.hasClass("mvp-transform-rotate-right")) {
                                                                                                if (_0x56995a) {
                                                                                                  _0x56995a.transform('rotate-right');
                                                                                                }
                                                                                              } else {
                                                                                                if (_0x5ef68a.hasClass("mvp-transform-reset")) {
                                                                                                  if (_0x56995a) {
                                                                                                    _0x56995a.transform("reset");
                                                                                                  }
                                                                                                }
                                                                                              }
                                                                                            }
                                                                                          }
                                                                                        }
                                                                                      }
                                                                                    }
                                                                                  }
                                                                                }
                                                                              }
                                                                            }
                                                                          }
                                                                        }
                                                                      }
                                                                    }
                                                                  }
                                                                }
                                                              }
                                                            }
                                                          }
                                                        }
                                                      }
                                                    }
                                                  }
                                                }
                                              }
                                            }
                                          }
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
      function _0x33ac4b(_0x239c47) {
        _0x239c47.preventDefault();
        if (!_0x588a79) {
          return false;
        }
        if (_0x49c9b1.disableVideoSkip) {
          return false;
        }
        var _0x376075 = _0x2c8ffb(_0x239c47.currentTarget);
        _0x1bc84b = true;
        if (_0x1450dc) {
          _0x57fdf0();
        }
        var _0x50ca02;
        if (_0x49c9b1.playlistItemClickTrigger) {
          if (_0x49c9b1.playlistItemClickTrigger == ".mvp-playlist-item") {
            _0x50ca02 = _0x376075.attr("data-id");
          } else {
            _0x50ca02 = _0x376075.closest(".mvp-playlist-item").attr("data-id");
          }
        } else {
          _0x50ca02 = _0x376075.attr('data-id');
        }
        console.log(_0x50ca02);
        _0x453856.processPlaylistRequest(_0x50ca02);
        _0x2c8ffb(_0x5ca0d3).trigger("clickPlaylistItem", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName
        });
        if (_0x59a538 == 'outer') {
          var _0x563a64 = _0x93b161.offset().top;
          if (_0x48f7fc.scrollTop() > _0x563a64) {
            _0x2c8ffb('html,body').animate({
              'scrollTop': _0x563a64
            }, 0x1f4);
          }
        } else {
          if (_0x36b677 && _0x349f0e.hasClass('mvp-playlist-holder-bottom')) {
            var _0x563a64 = _0x93b161.offset().top;
            if (_0x48f7fc.scrollTop() > _0x563a64) {
              _0x2c8ffb("html,body").animate({
                'scrollTop': _0x563a64
              }, 0x1f4);
            }
          }
        }
      }
      function _0xa040f3(_0x37c50a) {
        _0x37c50a.preventDefault();
        if (!_0x588a79) {
          return false;
        }
        var _0x3104be = _0x2c8ffb(_0x37c50a.currentTarget);
        var _0x4e93 = _0x3104be.attr('data-id');
        var _0x3700c7 = _0x1eed68[_0x4e93].data;
        if (!_0x36b677) {
          if (_0x3700c7.hoverPreviewImg) {
            var _0x3dd0d6 = _0x3104be.find(".mvp-thumbimg");
            _0x3dd0d6.attr('data-src', _0x3dd0d6.attr("src")).attr("src", _0x3700c7.hoverPreviewImg);
          } else {
            if (_0x3700c7.hoverPreviewVideo) {
              var _0x3c3f31 = _0x3104be.find('.mvp-playlist-thumb-preview').addClass("mvp-playlist-thumb-preview-visible");
              var _0x571057 = _0x3c3f31.find(".mvp-playlist-thumb-preview-video")[0x0];
              _0x571057.src = _0x3700c7.hoverPreviewVideo;
              _0x571057.load();
            }
          }
        }
        if (_0x2aa7b0 && _0x2aa7b0.is(_0x3104be)) {
          return false;
        }
        _0x3104be.addClass('mvp-playlist-item-selected');
      }
      function _0x5ae7a7(_0x23bc14) {
        _0x23bc14.preventDefault();
        if (!_0x588a79) {
          return false;
        }
        var _0x1f12e1 = _0x2c8ffb(_0x23bc14.currentTarget);
        var _0x3a849f = _0x1f12e1.attr("data-id");
        var _0x57010b = _0x1eed68[_0x3a849f].data;
        if (!_0x36b677) {
          if (_0x57010b.hoverPreviewImg) {
            var _0x3756c1 = _0x1f12e1.find(".mvp-thumbimg");
            _0x3756c1.attr("src", _0x3756c1.attr('data-src'));
          } else {
            if (_0x57010b.hoverPreviewVideo) {
              var _0x45b8e1 = _0x1f12e1.find('.mvp-playlist-thumb-preview').removeClass("mvp-playlist-thumb-preview-visible");
              var _0x54eabf = _0x45b8e1.find(".mvp-playlist-thumb-preview-video")[0x0];
              _0x54eabf.src = '';
            }
          }
        }
        if (_0x2aa7b0 && _0x2aa7b0.is(_0x1f12e1)) {
          return false;
        }
        _0x1f12e1.removeClass("mvp-playlist-item-selected");
      }
      function _0x4c9596() {
        _0x2aa7b0.removeClass("mvp-playlist-item-selected");
        _0x2c8ffb(_0x5ca0d3).trigger("playlistItemEnabled", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName
        });
        _0x2aa7b0 = null;
      }
      function _0x4cf9d5() {
        if (_0x2aa7b0) {
          _0x4c9596();
        }
        _0x2aa7b0 = _0x223a1c.children(".mvp-playlist-item").eq(_0x48707c);
        if (_0x2aa7b0.length) {
          _0x2aa7b0.addClass('mvp-playlist-item-selected');
          if (_0x116683 && _0x142a3d > 0x0) {
            if (!_0x1bc84b) {
              if (_0x2b1fae == "buttons" || _0x2b1fae == "scroll") {
                if (_0x2cb5ab) {
                  _0x2cb5ab.scrollTo(_0x2aa7b0);
                } else {
                  var _0x5cd2d8 = setInterval(function () {
                    if (_0x2cb5ab) {
                      clearInterval(_0x5cd2d8);
                      _0x2cb5ab.scrollTo(_0x2aa7b0);
                    }
                  }, 0x64);
                }
              }
            }
            _0x1bc84b = false;
          }
          _0x2c8ffb(_0x5ca0d3).trigger("playlistItemDisabled", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName
          });
        }
      }
      if (!_0x36b677 && _0x49c9b1.showPrevNextVideoThumb) {
        _0x276f15.on("mouseenter", function () {
          if (_0x142a3d == 0x1) {
            return;
          }
          _0x3fba55.html(_0x3fba55.attr("data-next-title"));
          _0x499b77(_0x276f15, 0x1);
        }).on("mouseleave", function () {
          _0x30553b.removeClass("mvp-upnext-wrap2-visible");
        });
        _0x376393.on("mouseenter", function () {
          if (_0x142a3d == 0x1) {
            return;
          }
          _0x3fba55.html(_0x3fba55.attr('data-prev-title'));
          _0x499b77(_0x376393, -0x1);
        }).on('mouseleave', function () {
          _0x30553b.removeClass('mvp-upnext-wrap2-visible');
        });
      } else {
        _0x30553b.remove();
      }
      function _0x499b77(_0x24268e, _0x4bb7ae) {
        var _0x12c98a = _0x453856.getNextCounter(_0x4bb7ae);
        var _0xcb9d4d;
        if (typeof _0x12c98a !== "undefined") {
          _0xcb9d4d = _0x1eed68[_0x12c98a].data;
          if (_0xcb9d4d.thumb || _0xcb9d4d.title) {
            if (_0xcb9d4d.thumb) {
              _0xbd16b4.css({
                'background-image': "url(" + encodeURI(_0xcb9d4d.thumb) + ')'
              }).closest('.mvp-upnext-thumb-wrap').css("display", 'block');
            } else {
              _0xbd16b4.closest(".mvp-upnext-thumb-wrap").css('display', "none");
            }
            if (_0xcb9d4d.title) {
              _0x2b9734.html(_0xcb9d4d.title);
            } else {
              _0x2b9734.html('');
            }
            if (_0xcb9d4d.duration) {
              _0x5cf8bf.show().html(MVPUtils.formatTime(_0xcb9d4d.duration));
            } else {
              _0x5cf8bf.hide().html('');
            }
          }
        } else {
          return false;
        }
        if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
          var _0x3af483 = _0x40300f;
        } else {
          if (_0x34e44f) {
            var _0x3af483 = _0x40300f;
          } else {
            _0x3af483 = _0x550351;
          }
        }
        var _0x5b2768 = _0x3af483[0x0].getBoundingClientRect();
        var _0x49f2a4 = _0x24268e[0x0].getBoundingClientRect();
        var _0x52207c = _0x150ab5[0x0].getBoundingClientRect();
        if (_0x30553b.hasClass("mvp-upnext-l-side")) {
          if (_0x4bb7ae == 0x1) {
            var _0x201173 = parseInt(_0x49f2a4.left - _0x5b2768.left - _0x30553b.width() - 0xa);
          } else {
            var _0x201173 = parseInt(_0x49f2a4.left - _0x5b2768.left + _0x49f2a4.width + 0xa);
          }
        } else {
          if (_0x30553b.hasClass("mvp-upnext-l-center")) {
            var _0x201173 = parseInt(_0x49f2a4.left - _0x5b2768.left - _0x30553b.width() / 0x2 + _0x49f2a4.width / 0x2);
          } else {
            var _0x201173 = parseInt(_0x49f2a4.left - _0x5b2768.left);
          }
        }
        if (_0x30553b.hasClass('mvp-upnext-t-center')) {
          var _0x5676ae = parseInt(_0x49f2a4.top - _0x5b2768.top + _0x49f2a4.height / 0x2 - _0x30553b.height() / 0x2);
        } else {
          var _0x5676ae = parseInt(_0x52207c.top - _0x5b2768.top - _0x30553b.height() - 0xa);
        }
        _0x30553b.addClass('mvp-upnext-wrap2-visible').css({
          'left': _0x201173 + 'px',
          'top': _0x5676ae + 'px'
        });
      }
      function _0x59ab82() {
        if (!_0xaad07c) {
          return;
        }
        if (_0x395507) {
          return;
        }
        if (_0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == 'default' || _0xaad07c == 'vimeo' && _0x4f5c87 == 'default' || _0xaad07c == 'custom' || _0xaad07c == "custom_html") {
          return;
        }
        _0x4f5c86 = window.setTimeout(function () {
          if (_0x1f950b) {
            _0x2fc352.one("transitionend", function () {
              _0x17ac30 = true;
            }).removeClass("mvp-player-controls-visible");
            if (_0x275e34) {
              _0x2a65bd.removeClass("mvp-subtitle-visible");
            }
            _0x247928.removeClass("mvp-ad-info-start-controls-align");
            if (_0x2e3f69 == "fullscreen") {
              document.body.style.cursor = "none";
            }
            _0xb361ff.hide();
            if (_0x1450dc.previewSeek) {
              _0x4afc0f.hide();
              if (_0xfaf57a) {
                _0x12cc74();
              }
            }
            if (_0x126d5c) {
              _0x24730b.removeClass('mvp-holder-visible');
            }
            _0x3e24c7.addClass("mvp-solo-seekbar-visible");
          }
        }, _0x49c9b1.idleTimeout);
      }
      function _0x33d37e(_0x1b4a43) {
        if (!_0xaad07c) {
          return;
        }
        if (_0x395507) {
          return;
        }
        if (_0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == 'default' || _0xaad07c == "vimeo" && _0x4f5c87 == "default" || _0xaad07c == 'custom' || _0xaad07c == "custom_html") {
          return;
        }
        if (_0x4f5c86) {
          clearTimeout(_0x4f5c86);
        }
        if (_0x1a96c8) {
          if (_0x17ac30) {
            _0x3e24c7.removeClass("mvp-solo-seekbar-visible");
            _0x2fc352.one("transitionend", function () {
              _0x17ac30 = false;
            }).addClass('mvp-player-controls-visible');
            if (_0x275e34) {
              _0x2a65bd.addClass("mvp-subtitle-visible");
            }
            if (_0x247928.hasClass("mvp-ad-info-start-visible") && _0x2fc352.length) {
              _0x247928.addClass("mvp-ad-info-start-controls-align");
            }
            if (_0x126d5c) {
              _0x24730b.addClass("mvp-holder-visible");
            }
            if (_0x2e3f69 == "fullscreen") {
              document.body.style.cursor = 'default';
            }
          }
        }
        if (_0x1f950b) {
          _0x59ab82();
        }
      }
      function _0x5603f5(_0xf2afe7) {
        if (typeof _0xf2afe7 !== "undefined") {
          if (_0x31c70b && _0xf2afe7 == true) {
            return false;
          } else {
            if (!_0x31c70b && _0xf2afe7 == false) {
              return false;
            }
          }
          _0x31c70b = !_0xf2afe7;
        }
        if (_0x31c70b) {
          _0x54beb6.one("transitionend", function () {
            _0x54beb6.css("display", "none");
            _0x31c70b = false;
            _0x545a13();
          }).removeClass("mvp-holder-visible");
        } else {
          if (_0x49c9b1.pauseVideoOnDialogOpen && _0x1f950b && !_0x576097) {
            _0x5ca0d3.pauseMedia();
            _0xd5157e = true;
          }
          _0x54beb6.css("display", "block");
          setTimeout(function () {
            _0x54beb6.addClass('mvp-holder-visible');
            _0x31c70b = true;
          }, 0x14);
        }
      }
      function _0x27c5aa(_0x364a13) {
        if (typeof _0x364a13 !== "undefined") {
          if (_0x2f08fa && _0x364a13 == true) {
            return false;
          } else {
            if (!_0x2f08fa && _0x364a13 == false) {
              return false;
            }
          }
          _0x2f08fa = !_0x364a13;
        }
        if (_0x2f08fa) {
          _0x2f0466.one("transitionend", function () {
            _0x2f0466.css("display", "none");
            _0x2f08fa = false;
            _0x2f0466.find('.mvp-embed-field-wrap').removeClass("mvp-embed-field-wrap-selected");
            var _0x5681fb = _0x2f0466.find(".mvp-embed-copy");
            var _0x1098d9 = _0x5681fb.attr("data-copy-text") || "Copy";
            _0x5681fb.html(_0x1098d9);
            _0x545a13();
          }).removeClass("mvp-holder-visible");
        } else {
          if (_0x49c9b1.pauseVideoOnDialogOpen && _0x1f950b && !_0x576097) {
            _0x5ca0d3.pauseMedia();
            _0xd5157e = true;
          }
          _0x2f0466.find(".mvp-embed-field-wrap").removeClass('mvp-embed-field-wrap-selected');
          if (_0x49c9b1.wpEmbedUrl) {
            var _0x11be89 = _0x49c9b1.wpEmbedUrl + "includes/embed.php?";
            var _0x3e73a0;
            if (_0x49c9b1.playerId != null && _0x49c9b1.playerId != -0x1) {
              _0x11be89 += "player_id=" + _0x49c9b1.playerId;
              _0x3e73a0 = true;
            } else {}
            if (_0x49c9b1.useSingleVideoEmbed) {
              var _0xff6367 = encodeURIComponent(_0x4a6d78());
              if (!_0x3e73a0 && _0xff6367.charAt(0x0) == '&') {
                _0xff6367 = _0xff6367.substr(0x1);
              }
              _0x11be89 += _0xff6367;
            } else {
              if (_0x3e73a0) {
                _0x11be89 += '&';
              }
              if (_0xd3a404 != null) {
                _0x11be89 += 'playlist_id=' + _0xd3a404 + '&active_item=' + _0x48707c;
              } else {
                var _0x50e3f7 = _0x208e6f.find(".mvp-playlist-anon").html().replace(/\n/g, '');
                var _0x364a13 = encodeURIComponent(_0x50e3f7);
                _0x11be89 += "plhtml=" + _0x364a13;
              }
            }
            if (_0x142a3d == 0x1 || _0x49c9b1.useSingleVideoEmbed) {
              _0x11be89 += '&playlist_position=no-playlist';
            }
          } else {
            var _0x11be89 = '';
            if (_0x49c9b1.embedSrc) {
              _0x11be89 = _0x49c9b1.embedSrc;
            }
          }
          var _0x4342de = "<iframe width=\"100%\" height=\"100%\" src=\"" + _0x11be89 + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
          _0x550351.find(".mvp-video-embed").text(_0x4342de);
          var _0x15f25c = window.location.href + _0x5ca0d3.getCurrentMediaUrl();
          _0x550351.find(".mvp-video-link").text(_0x15f25c);
          _0x2f0466.css("display", "block");
          setTimeout(function () {
            _0x2f0466.addClass("mvp-holder-visible");
            _0x2f08fa = true;
          }, 0x14);
        }
      }
      function _0x4a6d78() {
        var _0xd02d6 = ['playlistId', "mediaPath", "safeTitle"];
        var _0x17df59 = '';
        _0x2c8ffb.each(_0x1450dc, function (_0x43ba93, _0x20fb17) {
          if (typeof _0x20fb17 === 'string') {
            if (_0xd02d6.indexOf(_0x43ba93) > 0x0) {
              return;
            }
            _0x43ba93 = _0x43ba93.split(/(?=[A-Z])/).join('_').toLowerCase();
            _0x17df59 += '&' + _0x43ba93 + '=' + _0x20fb17;
          }
        });
        if ((_0x1450dc.type == "video" || _0x1450dc.type == "audio") && _0x1450dc.path) {
          var _0x4af359 = '';
          var _0x3f6c5e = '';
          var _0x35a398;
          var _0x2f0c97 = _0x1450dc.path.length;
          var _0x2bae6c;
          for (_0x35a398 = 0x0; _0x35a398 < _0x2f0c97; _0x35a398++) {
            _0x2bae6c = _0x1450dc.path[_0x35a398];
            _0x2c8ffb.each(_0x2bae6c, function (_0x479b67, _0xff1a7c) {
              if (_0x479b67 == "quality") {
                _0x3f6c5e += _0xff1a7c + ',';
              } else {
                _0x4af359 += _0xff1a7c + ',';
              }
            });
          }
          _0x4af359 = _0x4af359.substr(0x0, _0x4af359.length - 0x1);
          _0x3f6c5e = _0x3f6c5e.substr(0x0, _0x3f6c5e.length - 0x1);
          _0x17df59 += "&path=" + _0x4af359 + "&quality_title=" + _0x3f6c5e;
        }
        if (_0x1450dc.subtitles) {
          var _0x35a398;
          var _0x2f0c97 = _0x1450dc.subtitles.length;
          var _0x2bae6c;
          var _0x19c476 = '';
          var _0x444e7b = '';
          var _0x782e78;
          for (_0x35a398 = 0x0; _0x35a398 < _0x2f0c97; _0x35a398++) {
            _0x2bae6c = _0x1450dc.subtitles[_0x35a398];
            if (_0x2bae6c.label == _0x49c9b1.subtitleOffText) {
              continue;
            }
            _0x19c476 += _0x2bae6c.src + ',';
            _0x444e7b += _0x2bae6c.label + ',';
            if (_0x2bae6c["default"]) {
              _0x782e78 = _0x2bae6c.label;
            }
          }
          _0x19c476 = _0x19c476.substr(0x0, _0x19c476.length - 0x1);
          _0x444e7b = _0x444e7b.substr(0x0, _0x444e7b.length - 0x1);
          _0x17df59 += "&subtitle_src=" + _0x19c476 + "&subtitle_label=" + _0x444e7b;
          if (_0x782e78) {
            _0x17df59 += "&subtitle_active=" + _0x782e78;
          }
        }
        return _0x17df59;
      }
      _0x2f0466.on('click', ".mvp-embed-copy", function () {
        _0x2f0466.find(".mvp-embed-field-wrap").removeClass("mvp-embed-field-wrap-selected");
        var _0xdc546c = _0x2f0466.find('.mvp-embed-copy');
        var _0x4d14cc = _0xdc546c.attr("data-copy-text") || "Copy";
        _0xdc546c.html(_0x4d14cc);
        var _0xdc546c = _0x2c8ffb(this);
        var _0x1daa57 = _0xdc546c.attr("data-copied-text") || "Copied!";
        _0xdc546c.html(_0x1daa57);
        var _0x13daf0 = _0xdc546c.closest(".mvp-embed-box").find('.mvp-embed-field-wrap').addClass("mvp-embed-field-wrap-selected");
        var _0x599a47 = _0x2c8ffb.trim(_0x13daf0.text());
        var _0x55cdce = document.createElement('input');
        _0x55cdce.setAttribute('id', "mvp-copy-url");
        document.body.appendChild(_0x55cdce);
        document.getElementById('mvp-copy-url').value = _0x599a47;
        _0x55cdce.select();
        try {
          document.execCommand("copy");
        } catch (_0x1d926e) {}
        document.body.removeChild(_0x55cdce);
      });
      function _0x545a13() {
        if (_0x4204d7) {
          return false;
        }
        if (_0x31c70b) {
          return false;
        }
        if (_0x2f08fa) {
          return false;
        }
        if (_0x1b10ac) {
          return false;
        }
        if (_0xd5157e) {
          _0x5ca0d3.playMedia();
          _0xd5157e = false;
        }
      }
      function _0x2dd698(_0x4fcfa4) {
        if (typeof _0x4fcfa4 !== "undefined") {
          if (_0x4204d7 && _0x4fcfa4 == true) {
            return false;
          } else {
            if (!_0x4204d7 && _0x4fcfa4 == false) {
              return false;
            }
          }
          _0x4204d7 = !_0x4fcfa4;
        }
        if (_0x4204d7) {
          _0x170382.one("transitionend", function () {
            _0x170382.css("display", "none");
            _0x4204d7 = false;
            _0x545a13();
          }).removeClass("mvp-holder-visible");
        } else {
          if (_0x49c9b1.pauseVideoOnDialogOpen && _0x1f950b && !_0x576097) {
            _0x5ca0d3.pauseMedia();
            _0xd5157e = true;
          }
          _0x170382.css('display', "block");
          setTimeout(function () {
            _0x170382.addClass('mvp-holder-visible');
            _0x4204d7 = true;
          }, 0x14);
        }
      }
      _0x550351.on('click', '.mvp-age-verify-enter', function () {
        if (_0x181123 && _0x49c9b1.ageVerifyExpireTime) {
          var _0x12ec40 = parseInt(_0x49c9b1.ageVerifyExpireTime, 0xa) + Date.now() * 0.001;
          localStorage.setItem(_0x544686, _0x12ec40);
        }
        _0x5e4d67(false);
        _0x1f57c7();
      });
      _0x550351.on("click", ".mvp-age-verify-exit", function () {
        _0x5e4d67(false);
      });
      function _0x4f4426() {
        var _0x5046f1 = localStorage.getItem(_0x544686);
        return _0x5046f1 ? Date.now() * 0.001 < _0x5046f1 : false;
      }
      function _0x5e4d67(_0x1f9da2) {
        if (typeof _0x1f9da2 !== "undefined") {
          if (_0xb138fb && _0x1f9da2 == true) {
            return false;
          } else {
            if (!_0xb138fb && _0x1f9da2 == false) {
              return false;
            }
          }
          _0xb138fb = !_0x1f9da2;
        }
        if (_0xb138fb) {
          _0x4f6174.one("transitionend", function () {
            _0x4f6174.css('display', "none");
            _0xb138fb = false;
          }).removeClass('mvp-holder-visible');
        } else {
          _0x4f6174.css("display", "block");
          setTimeout(function () {
            _0x4f6174.addClass('mvp-holder-visible');
            _0xb138fb = true;
          }, 0x14);
        }
      }
      function _0x8b46f9(_0x2a4bca) {
        if (typeof _0x2a4bca !== "undefined") {
          if (_0x54c3c8 && _0x2a4bca == true) {
            return false;
          } else {
            if (!_0x54c3c8 && _0x2a4bca == false) {
              return false;
            }
          }
          _0x54c3c8 = !_0x2a4bca;
        }
        if (_0x54c3c8) {
          if (_0x2e3f69 == "fullscreen" && !_0x49c9b1.playlistOpened) {
            _0x5ca0d3.togglePlaylist();
          } else {
            _0x5d6224.hide();
            _0x54c3c8 = false;
            _0xde616a.css("display", "none").removeClass('mvp-holder-visible');
            _0x2f3da0 = false;
            _0x245b29.val('');
          }
        } else {
          if (_0x2e3f69 == 'fullscreen' && !_0x49c9b1.playlistOpened) {
            _0x5ca0d3.togglePlaylist();
          } else {
            if (!_0x5ec64c) {
              _0x1d2112();
            }
            _0x5d6224.show();
            _0x54c3c8 = true;
          }
        }
      }
      function _0x1d2112() {
        var _0x24d041;
        var _0x386b46 = _0x1450dc.subtitles.length;
        var _0x486b55;
        for (_0x24d041 = 0x0; _0x24d041 < _0x386b46; _0x24d041++) {
          _0xcb2d5d = _0x1450dc.subtitles[_0x24d041];
          if (_0xcb2d5d["default"] && _0xcb2d5d.label != _0x49c9b1.subtitleOffText) {
            _0x486b55 = _0xcb2d5d.label;
            break;
          }
        }
        if (!_0x486b55) {
          _0x486b55 = _0x1450dc.subtitles[0x0].label;
        }
        if (_0x529d63[_0x486b55]) {
          var _0x8234ad = _0x529d63[_0x486b55];
          _0x5e3e48(_0x486b55, _0x8234ad);
        } else {
          _0x407a4a.find(".mvp-menu-item").eq(0x0).trigger("click");
        }
      }
      function _0x5e3e48(_0x5393d6, _0x3a8d9c) {
        var _0x200202;
        var _0x15b6f0 = _0x3a8d9c.length;
        var _0x1db189 = '';
        for (_0x200202 = 0x0; _0x200202 < _0x15b6f0; _0x200202++) {
          _0xcb2d5d = _0x3a8d9c[_0x200202];
          _0x1db189 += "<div class=\"mvp-transcript-item\" role=\"button\" tabindex=\"0\" data-start=\"" + _0xcb2d5d.start + "\" data-end=\"" + _0xcb2d5d.end + "\">";
          _0x1db189 += "<div class=\"mvp-transcript-item-time\">" + MVPUtils.formatTime(_0xcb2d5d.start) + "</div>";
          _0x1db189 += "<div class=\"mvp-transcript-item-text\">" + _0xcb2d5d.text + "</div>";
          _0x1db189 += "</div>";
        }
        _0x22585a.html(_0x1db189);
        if (!_0x494165) {
          _0x494165 = _0x407a4a.find(".mvp-menu-item[data-label='" + _0x929f53 + "']").addClass("mvp-menu-active");
        }
        _0x9bf06b.html(_0x929f53);
        _0x5ec64c = true;
        _0x33a975 = false;
        _0x360693 = true;
      }
      _0x5d6224.find('.mvp-transcript-header-inner').on("click", function () {
        _0x48795f();
      });
      function _0x48795f() {
        if (typeof v !== "undefined") {
          if (_0x2f3da0 && v == true) {
            return false;
          } else {
            if (!_0x2f3da0 && v == false) {
              return false;
            }
          }
          _0x2f3da0 = !v;
        }
        if (_0x2f3da0) {
          _0xde616a.one("transitionend", function () {
            _0xde616a.css({
              'display': "none"
            });
            _0x2f3da0 = false;
          }).removeClass("mvp-holder-visible");
        } else {
          _0xde616a.css("display", "block");
          setTimeout(function () {
            _0xde616a.addClass("mvp-holder-visible");
            _0x2f3da0 = true;
          }, 0x14);
        }
      }
      var _0x245b29 = _0x5d6224.find(".mvp-transcript-search-input").on("keyup", function () {
        var _0x27ed47 = _0x22585a.find(".mvp-transcript-item").length;
        if (_0x27ed47 == 0x0) {
          return false;
        }
        var _0x2a8e41 = _0x2c8ffb(this).val().toLowerCase();
        var _0x3395f3;
        var _0x748ae9 = 0x0;
        var _0x50d705;
        var _0x47e498;
        for (_0x3395f3 = 0x0; _0x3395f3 < _0x27ed47; _0x3395f3++) {
          _0x50d705 = _0x22585a.find('.mvp-transcript-item').eq(_0x3395f3);
          _0x47e498 = _0x50d705.find(".mvp-transcript-item-text").html().toLowerCase();
          if (_0x47e498.indexOf(_0x2a8e41) > -0x1) {
            _0x22585a.find(".mvp-transcript-item").eq(_0x3395f3).fadeIn(0xc8);
          } else {
            _0x22585a.find('.mvp-transcript-item').eq(_0x3395f3).fadeOut(0xc8);
            _0x748ae9++;
          }
        }
        if (_0x748ae9 == _0x27ed47) {
          _0x368208.show();
        } else {
          _0x368208.hide();
        }
      });
      _0x22585a.on('click', ".mvp-transcript-item", function () {
        if (!_0x588a79) {
          return false;
        }
        var _0x29bfe7 = Number(_0x2c8ffb(this).attr('data-start'));
        _0x5ca0d3.seek(_0x29bfe7);
        if (!_0x1f950b) {
          _0x6a32cc = null;
          _0x150da0(true);
        }
      });
      _0x407a4a.on("click", ".mvp-menu-item", function () {
        if (!_0x588a79) {
          return false;
        }
        if (_0x33a975) {
          return false;
        }
        if (_0x2c8ffb(this).hasClass("mvp-menu-active")) {
          return false;
        }
        if (_0x494165) {
          _0x494165.removeClass('mvp-menu-active');
        }
        _0x494165 = _0x2c8ffb(this).addClass("mvp-menu-active");
        _0x33a975 = true;
        if (_0x2f3da0) {
          _0x48795f(false);
        }
        var _0x2c4739 = _0x2c8ffb(this).attr('data-label');
        _0x9bf06b.html(_0x2c4739);
        _0x929f53 = _0x2c4739;
        if (_0x529d63[_0x2c4739]) {
          var _0x4a963a = _0x529d63[_0x2c4739];
          _0x5e3e48(_0x929f53, _0x4a963a);
        } else {
          var _0x193e37;
          var _0x158b65 = _0x1450dc.subtitles.length;
          var _0x35f80b;
          for (_0x193e37 = 0x0; _0x193e37 < _0x158b65; _0x193e37++) {
            _0x35f80b = _0x1450dc.subtitles[_0x193e37];
            if (_0x35f80b.label == _0x2c4739) {
              if (_0x230bed) {
                _0x445f7f(_0x35f80b);
              } else {
                _0x1fe6c9(_0x35f80b);
              }
              break;
            }
          }
        }
      });
      function _0x590237(_0x889a4c) {
        _0x22585a.find(".mvp-transcript-item").each(function () {
          var _0x24383e = parseFloat(_0x2c8ffb(this).attr("data-start"));
          var _0x5c4517 = parseFloat(_0x2c8ffb(this).attr("data-end"));
          if (_0x889a4c >= _0x24383e && _0x889a4c <= _0x5c4517) {
            if (!_0x2c8ffb(this).hasClass("mvp-transcript-item-active")) {
              _0x22585a.find(".mvp-transcript-item").removeClass("mvp-transcript-item-active");
              _0x2c8ffb(this).addClass("mvp-transcript-item-active");
              _0x22585a.movingHighlight = true;
            }
            return false;
          }
        });
        _0x22585a.currentHighlight = _0x22585a.find(".mvp-transcript-item-active");
        if (_0x22585a.currentHighlight.length == 0x0) {
          _0x22585a.currentHighlight = null;
        }
        if (_0x22585a.currentHighlight) {
          var _0x39bdea = Math.floor(_0x47df84.scrollTop() + _0x22585a.currentHighlight.position().top - (_0x47df84.height() / 0x2 + _0x22585a.currentHighlight.height() / 0x2));
          if (_0x39bdea != Math.floor(_0x47df84.scrollTop())) {
            if (_0x22585a.movingHighlight) {
              _0x22585a.currentHighlight[0x0].scrollIntoView({
                'behavior': "smooth"
              });
              _0x22585a.movingHighlight = false;
            }
          }
        }
      }
      function _0x45aac9(_0x29a55e) {
        if (_0x1b10ac) {
          _0x5e0ad8.one("transitionend", function () {
            _0x5e0ad8.css("display", "none");
            _0x1b10ac = false;
            _0x545a13();
          }).removeClass("mvp-holder-visible");
        } else {
          _0x2c8ffb(_0x5ca0d3).trigger("beforeLoginScreen", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
          if (_0x1f950b) {
            _0x5ca0d3.pauseMedia();
            _0xd5157e = true;
          }
          _0x5e0ad8 = _0x29a55e == "download" ? _0x5da90c : _0x3abc2b;
          _0x5e0ad8.css("display", "block");
          setTimeout(function () {
            _0x5e0ad8.addClass("mvp-holder-visible");
            _0x1b10ac = true;
          }, 0x14);
        }
      }
      function _0x21ff2c(_0x36b9fb) {
        if (typeof _0x36b9fb !== "undefined") {
          if (_0x55db69 && _0x36b9fb == true) {
            return false;
          } else {
            if (!_0x55db69 && _0x36b9fb == false) {
              return false;
            }
          }
          _0x55db69 = !_0x36b9fb;
        }
        if (_0x55db69) {
          _0x45b7ac.one('transitionend', function () {
            _0x45b7ac.css('display', "none");
            _0x55db69 = false;
          }).removeClass("mvp-holder-visible");
        } else {
          _0x328347.html(_0x1450dc.title);
          _0x45b7ac.css("display", "block");
          setTimeout(function () {
            _0x45b7ac.addClass("mvp-holder-visible");
            _0x55db69 = true;
          }, 0x14);
        }
      }
      function _0x1b42bc(_0x411499) {
        _0x547090 = true;
        _0x43db09.show();
        if (_0x3d64b6) {
          _0x372383();
        }
        if (_0x208e6f.length) {
          var _0x3e36aa = _0x208e6f.find(_0x411499);
        } else {
          var _0x3e36aa = _0x2c8ffb(_0x411499);
        }
        if (_0x3e36aa.length == 0x0) {
          console.log("Failed playlist selection! Playlist - " + _0x411499 + " does not exist. Check activePlaylist option in settings!");
          _0x547090 = false;
          _0x43db09.hide();
          _0x200cb8 = null;
          return false;
        }
        if (_0x49c9b1.makePlaylistSelector) {
          var _0x2735fa = _0x411499.substr(0x1);
          var _0x38b59a = _0xe082c5.find(".mvp-playlist-selector-item[data-id=\"" + _0x2735fa + "\"]");
          if (_0x38b59a.length) {
            _0x1dcb4a = _0x38b59a.addClass("mvp-playlist-selector-item-active");
            if (_0x38b59a.find(".mvp-playlist-selector-item-title")) {
              _0x42ed3c.html(_0x38b59a.find(".mvp-playlist-selector-item-title").html());
            }
          }
        }
        if (_0x3e36aa.attr("data-playlist-id") != undefined) {
          _0xd3a404 = _0x3e36aa.attr("data-playlist-id");
        } else {
          _0xd3a404 = null;
        }
        _0x200cb8 = _0x411499;
        _0x2c8ffb(_0x5ca0d3).trigger("playlistStartLoad", {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName
        });
        _0x5561a0 = -0x1;
        _0x2a1553 = [];
        _0x4a08ff = [];
        if (_0x3e36aa.find(".mvp-global-playlist-data").length) {
          _0x2a1113 = _0x3e36aa.find(".mvp-global-playlist-data").css("display", "none").clone().prependTo(_0x223a1c);
          if (_0x2a1113.find(".mvp-ad-section").length) {
            _0x114c06 = _0x2a1113.find(".mvp-ad-section");
          }
          if (_0x2a1113.find('.mvp-annotation-section').length) {
            _0xfe5fe6 = _0x2a1113.find(".mvp-annotation-section");
          }
          if (_0x2a1113.attr("data-pwd") != undefined) {
            _0x196418 = _0x2a1113.attr("data-pwd");
          }
          if (_0x2a1113.attr('data-start') != undefined && !MVPUtils.isEmpty(_0x2a1113.attr("data-start"))) {
            _0x2d202a = Number(_0x2a1113.attr("data-start"));
          }
          if (_0x2a1113.attr('data-end') != undefined && !MVPUtils.isEmpty(_0x2a1113.attr("data-end"))) {
            _0x26ae05 = Number(_0x2a1113.attr("data-end"));
          }
          if (_0x2a1113.attr("data-playback-rate") != undefined && !MVPUtils.isEmpty(_0x2a1113.attr("data-playback-rate"))) {
            _0x50dbc5 = Number(_0x2a1113.attr("data-playback-rate"));
          }
          if (_0x2a1113.attr("data-lock-time") != undefined) {
            _0x2e785a = Number(_0x2a1113.attr('data-lock-time'));
          }
          if (_0x2a1113.attr("data-lock-video-user-roles") != undefined && !MVPUtils.isEmpty(_0x2a1113.attr("data-lock-video-user-roles"))) {
            _0x99f1ea = _0x2a1113.attr("data-lock-video-user-roles").split(',');
          }
          if (_0x2a1113.attr("data-vast") != undefined) {
            _0x4c6cc5 = _0x2a1113.attr("data-vast");
          }
          if (_0x2a1113.attr("data-get-embed-details") != undefined) {
            _0xda6036 = true;
          }
        }
        _0x3e36aa.children(".mvp-playlist-item").each(function () {
          _0x4a08ff.push(_0x54cd1f(_0x2c8ffb(this)));
        });
        _0x142a3d = _0x4a08ff.length;
        if (_0xda6036) {
          _0x25dd83 = _0x142a3d;
          _0x38018c();
        } else {
          _0x388bd8();
        }
      }
      function _0x15e4c0(_0xc48dbc) {
        if (_0xc48dbc == "youtube") {
          if (typeof MVPYoutubeLoader === "undefined") {
            var _0x572965 = document.createElement("script");
            _0x572965.type = "text/javascript";
            _0x572965.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.youtubeLoader_js);
            _0x572965.onload = _0x572965.onreadystatechange = function () {
              if (!this.readyState || this.readyState == "complete") {
                _0x15e4c0(_0xc48dbc);
              }
            };
            _0x572965.onerror = function () {
              console.log("Error loading " + this.src);
            };
            var _0x5c3e4a = document.getElementsByTagName("script")[0x0];
            _0x5c3e4a.parentNode.insertBefore(_0x572965, _0x5c3e4a);
            return;
          }
          _0x350714 = new MVPYoutubeLoader(_0x49c9b1);
          _0x2c8ffb(_0x350714).on("MVPYoutubeLoader.END_LOAD", function (_0x25f6b4, _0x3e271e) {
            var _0x4641ed;
            var _0x4908d0 = _0x3e271e.data.length;
            var _0x4f7620;
            for (_0x4641ed = 0x0; _0x4641ed < _0x4908d0; _0x4641ed++) {
              _0x4f7620 = _0x3e271e.data[_0x4641ed];
              _0x2a1553.push(_0x4f7620);
            }
            _0x1d567f = _0x3e271e.nextPageToken;
            if (_0x58b362) {
              _0x55ad20();
            } else {
              _0x388bd8();
            }
          });
          _0x2c8ffb(_0x350714).on("MVPYoutubeLoader.QUOTA_ERROR", function (_0x46f0e1, _0x1746bc) {
            _0x2c8ffb("<div class=\"mvp-yt-quota\">" + _0x1746bc.er + "</div>").on("click", function () {
              _0x2c8ffb(this).remove();
            }).appendTo(_0x139c5b);
          });
          if (_0x24d23e && _0x1d567f) {
            _0x350714.setDataFromCache(_0x54cd1f(_0x2c8ffb(_0x24d23e)));
            _0x298f2c = false;
          }
        } else {
          if (_0xc48dbc == "vimeo") {
            if (typeof MVPVimeoLoader === "undefined") {
              var _0x572965 = document.createElement('script');
              _0x572965.type = "text/javascript";
              _0x572965.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.vimeoLoader_js);
              _0x572965.onload = _0x572965.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "complete") {
                  _0x15e4c0(_0xc48dbc);
                }
              };
              _0x572965.onerror = function () {
                console.log("Error loading " + this.src);
              };
              var _0x5c3e4a = document.getElementsByTagName("script")[0x0];
              _0x5c3e4a.parentNode.insertBefore(_0x572965, _0x5c3e4a);
              return;
            }
            _0x5c7de9 = new MVPVimeoLoader(_0x49c9b1);
            _0x2c8ffb(_0x5c7de9).on("MVPVimeoLoader.END_LOAD", function (_0x30277a, _0x59e1bd) {
              var _0x3311aa;
              var _0x488bc6 = _0x59e1bd.data.length;
              var _0x2d27b2;
              for (_0x3311aa = 0x0; _0x3311aa < _0x488bc6; _0x3311aa++) {
                _0x2d27b2 = _0x59e1bd.data[_0x3311aa];
                _0x2a1553.push(_0x2d27b2);
              }
              _0x1d567f = _0x59e1bd.nextPageToken;
              if (_0x58b362) {
                _0x55ad20();
              } else {
                _0x388bd8();
              }
            });
            if (_0x24d23e && _0x1d567f) {
              _0x5c7de9.setDataFromCache(_0x54cd1f(_0x2c8ffb(_0x24d23e)));
              _0x298f2c = false;
            }
          }
        }
      }
      var _0x25dd83;
      function _0x38018c() {
        _0x25dd83--;
        if (_0x25dd83 > -0x1) {
          var _0x418449 = _0x4a08ff[_0x25dd83];
          var _0x1e899d = _0x418449.type;
          if (_0x1e899d == "youtube_single") {
            var _0x5e04da = "https://www.youtube.com/watch?v=" + _0x418449.path;
            _0x418449.type = "youtube";
          } else {
            if (_0x1e899d == 'vimeo_single') {
              var _0x5e04da = "https://vimeo.com/" + _0x418449.path;
              _0x418449.type = "vimeo";
            } else {
              _0x38018c();
            }
          }
          _0x2c8ffb.getJSON("https://noembed.com/embed", {
            'format': "json",
            'url': _0x5e04da
          }, function (_0x1c5527) {
            if (_0x1c5527.title) {
              _0x418449.title = _0x1c5527.title;
            }
            if (_0x1c5527.thumbnail_url) {
              _0x418449.thumb = _0x1c5527.thumbnail_url;
              _0x418449.poster = _0x1c5527.thumbnail_url;
            }
            if (_0x1c5527.description) {
              _0x418449.description = _0x1c5527.description;
            }
            if (_0x1c5527.duration) {
              _0x418449.duration = _0x1c5527.duration;
            }
            if (_0x1c5527.account_type) {
              _0x418449.userAccount = _0x1c5527.account_type;
            }
            if (_0x1c5527.upload_date) {
              var _0x4493da = _0x1c5527.upload_date.split(" ");
              _0x418449.date = _0x4493da[0x0];
            }
            _0x2a1553.push(_0x418449);
            _0x38018c();
          });
        } else {
          _0x55ad20();
        }
      }
      function _0x388bd8() {
        _0x5561a0++;
        if (_0x5561a0 > _0x142a3d - 0x1) {
          _0x55ad20();
        } else {
          var _0x5d4f4e = _0x4a08ff[_0x5561a0];
          var _0x2ee607 = _0x5d4f4e.type;
          if (RegExp(/^youtube/).test(_0x2ee607)) {
            if (_0x5d4f4e.noApi) {
              _0x2a1553.push(_0x5d4f4e);
              _0x388bd8();
            } else {
              _0x3174a1 = 'youtube';
              if (_0x5d4f4e.loadMore) {
                _0x20063 = true;
              }
              if (!_0x350714) {
                _0x15e4c0('youtube');
                var _0x1156b9 = setInterval(function () {
                  if (_0x350714) {
                    clearInterval(_0x1156b9);
                    _0x350714.setData(_0x5d4f4e);
                  }
                }, 0x64);
              } else {
                _0x350714.setData(_0x5d4f4e);
              }
            }
          } else {
            if (RegExp(/^vimeo/).test(_0x2ee607)) {
              if (_0x5d4f4e.noApi) {
                _0x2a1553.push(_0x5d4f4e);
                _0x388bd8();
              } else {
                _0x3174a1 = "vimeo";
                if (_0x5d4f4e.loadMore) {
                  _0x20063 = true;
                }
                if (!_0x5c7de9) {
                  _0x15e4c0('vimeo');
                  var _0x1156b9 = setInterval(function () {
                    if (_0x5c7de9) {
                      clearInterval(_0x1156b9);
                      _0x5c7de9.setData(_0x5d4f4e);
                    }
                  }, 0x64);
                } else {
                  _0x5c7de9.setData(_0x5d4f4e);
                }
              }
            } else {
              if (_0x2ee607 == "gdrive_folder") {
                _0x5a699a(_0x5d4f4e);
              } else {
                if (_0x2ee607 == "onedrive_folder") {
                  _0x4e9806(_0x5d4f4e);
                } else {
                  if (RegExp(/^folder/).test(_0x2ee607)) {
                    _0x171f33(_0x5d4f4e);
                  } else {
                    if (RegExp(/^audio|^video|^image|^hls|^dash|^custom/).test(_0x2ee607)) {
                      _0x2a1553.push(_0x5d4f4e);
                      _0x388bd8();
                    } else {
                      if (_0x2ee607 == "s3_video" || _0x2ee607 == 's3_audio') {
                        _0x2a1553.push(_0x5d4f4e);
                        _0x388bd8();
                      } else {
                        if (_0x2ee607 == "s3_bucket_video" || _0x2ee607 == "s3_bucket_audio") {
                          _0x32be6b(_0x5d4f4e);
                        } else {
                          if (_0x2ee607 == "xml") {
                            _0x2b2687(_0x5d4f4e);
                          } else if (_0x2ee607 == "json") {
                            _0x50867c(_0x5d4f4e);
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
      function _0x2b2687(_0xa5c937) {
        _0x2c8ffb.ajax({
          'type': "GET",
          'url': _0xa5c937.path,
          'dataType': "html"
        }).done(function (_0x33c404) {
          _0x2c8ffb(_0x33c404).children('.mvp-playlist-item').each(function () {
            _0x4a08ff.push(_0x54cd1f(_0x2c8ffb(this)));
          });
          _0x142a3d = _0x4a08ff.length;
          _0x388bd8();
        }).fail(function (_0x376c0a, _0x1ac877, _0x2a2455) {
          console.log(_0x376c0a, _0x1ac877, _0x2a2455);
          _0x388bd8();
        });
      }
      function _0x50867c(_0x2ccf03) {
        _0x2c8ffb.ajax({
          'type': 'GET',
          'url': _0x2ccf03.path,
          'dataType': "json"
        }).done(function (_0xf4fd2d) {
          _0x5561a0 = -0x1;
          _0x2a1553 = [];
          _0x4a08ff = [];
          _0x3d64b6 = _0x223a1c;
          if (Array.isArray(_0xf4fd2d)) {
            _0x4a08ff = _0xf4fd2d;
          } else {
            _0x4a08ff.push(_0xf4fd2d);
          }
          _0x142a3d = _0x4a08ff.length;
          _0x388bd8();
        }).fail(function (_0xaa3cf9, _0x335566, _0x2cfa92) {
          console.log("Error processJson: " + _0xaa3cf9, _0x335566, _0x2cfa92);
          _0x388bd8();
        });
      }
      function _0x32be6b(_0x3211e8) {
        if (window.location.protocol == "file:") {
          console.log("Reading folders requires server connection.");
          return false;
        }
        var _0xdc9d5b = _0x49c9b1.sourcePath + "includes/aws/aws.php";
        var _0x39999f = {
          'bucket': _0x3211e8.bucket,
          'action': "list_bucket",
          'region': _0x49c9b1.s3Region,
          'cred': _0x49c9b1.s3
        };
        _0x2c8ffb.ajax({
          'type': "GET",
          'url': _0xdc9d5b,
          'data': _0x39999f,
          'dataType': "json"
        }).done(function (_0x482da8) {
          var _0x7d46d7;
          var _0xad522f = _0x482da8.length;
          var _0x428279;
          var _0x101d04;
          if (_0x3211e8.sort) {
            if (_0x3211e8.sort == 'filename-asc') {
              MVPUtils.keysrt(_0x482da8, 'filename');
            } else {
              if (_0x3211e8.sort == "filename-desc") {
                MVPUtils.keysrt(_0x482da8, "filename", true);
              }
            }
          }
          for (_0x7d46d7 = 0x0; _0x7d46d7 < _0xad522f; _0x7d46d7++) {
            _0x428279 = _0x482da8[_0x7d46d7];
            if (/mp4/.test(_0x428279)) {
              _0x101d04 = _0x2c8ffb.extend(true, {}, _0x3211e8);
              if (_0x3211e8.origtype == "s3_bucket_video") {
                _0x101d04.type = _0x101d04.origtype = 's3_video';
              }
              if (_0x3211e8.origtype == "s3_bucket_audio") {
                _0x101d04.type = _0x101d04.origtype = "s3_audio";
              }
              _0x101d04.key = _0x428279;
              _0x101d04.title = _0x428279.substr(0x0, _0x428279.lastIndexOf('.'));
              _0x101d04.poster = "poster/" + _0x101d04.title + '.' + _0x49c9b1.s3ThumbExtension;
              _0x101d04.thumb = "thumb/" + _0x101d04.title + '.' + _0x49c9b1.s3ThumbExtension;
              _0x2a1553.push(_0x101d04);
            }
          }
          _0x388bd8();
        }).fail(function (_0x2cae00, _0x3823c4, _0x26418a) {
          console.log("Error processS3Bucket: " + _0x2cae00.responseText, _0x3823c4, _0x26418a);
          _0x388bd8();
        });
      }
      function _0x171f33(_0x20de73) {
        if (window.location.protocol == "file:") {
          console.log("Reading files from folders locally is not possible! This requires online server connection.");
          _0x388bd8();
          return false;
        }
        var _0x2aaed2 = _0x20de73.type;
        if (_0x2aaed2 == "folder_video") {
          var _0x5bc4bc = ['mp4'];
        } else {
          if (_0x2aaed2 == 'folder_audio') {
            if (_0x20de73.id3) {
              _0xc91741 = _0x102548 = _0x2a1553.length - 0x1;
            }
            var _0x5bc4bc = ["mp3", "wav", 'flac', "aac"];
          } else {
            if (_0x2aaed2 == "folder_image") {
              var _0x5bc4bc = ["jpg", "jpeg", "png", "gif", "webp"];
            }
          }
        }
        var _0x3f5d89 = {
          'type': _0x5bc4bc,
          'dir': _0x20de73.path,
          'content_url': _0x20de73.contentUrl,
          'limit': _0x20de73.limit || 0x64
        };
        _0x2c8ffb.ajax({
          'type': "GET",
          'url': _0x49c9b1.sourcePath + "includes/folder_parser.php",
          'data': _0x3f5d89,
          'dataType': "json"
        }).done(function (_0x167439) {
          console.log(_0x167439);
          if (_0x20de73.sort) {
            if (_0x20de73.sort == 'filename-asc') {
              MVPUtils.keysrt(_0x167439, "filename");
            } else {
              if (_0x20de73.sort == "filename-desc") {
                MVPUtils.keysrt(_0x167439, "filename", true);
              } else {
                if (_0x20de73.sort == 'date-asc') {
                  MVPUtils.keysrt(_0x167439, "filemtime");
                } else {
                  if (_0x20de73.sort == 'date-desc') {
                    MVPUtils.keysrt(_0x167439, "filemtime", true);
                  }
                }
              }
            }
          }
          var _0x1c888a;
          var _0x3ec196 = _0x167439.length;
          var _0x598dd7;
          var _0x3314e2;
          var _0x23147d;
          for (_0x1c888a = 0x0; _0x1c888a < _0x3ec196; _0x1c888a++) {
            _0x598dd7 = _0x167439[_0x1c888a];
            if (_0x2aaed2 == "folder_audio") {
              if (/mp3|wav|aac|flac/.test(_0x598dd7.basename)) {
                _0x3314e2 = _0x2c8ffb.extend(true, {}, _0x20de73);
                _0x3314e2.type = "audio";
                _0x23147d = _0x598dd7.fullpath;
                if (_0x598dd7.extension == "mp3") {
                  _0x3314e2.path = [{
                    'quality': "default",
                    'mp3': _0x23147d
                  }];
                } else {
                  if (_0x598dd7.extension == "wav") {
                    _0x3314e2.path = [{
                      'quality': "default",
                      'wav': _0x23147d
                    }];
                  }
                }
                if (_0x49c9b1.requirePosterFromFolder) {
                  _0x3314e2.poster = _0x23147d.substr(0x0, _0x23147d.lastIndexOf('/') + 0x1) + "poster/" + _0x598dd7.filename + ".jpg";
                }
                if (_0x49c9b1.requireThumbnailsFromFolder) {
                  if (!_0x3314e2.thumb) {
                    _0x3314e2.thumb = _0x23147d.substr(0x0, _0x23147d.lastIndexOf('/') + 0x1) + "thumb/" + _0x598dd7.filename + ".jpg";
                  }
                }
                if (!_0x3314e2.share) {
                  _0x3314e2.share = _0x23147d;
                }
                if (!_0x3314e2.title) {
                  _0x3314e2.title = _0x598dd7.filename;
                }
                _0x2a1553.push(_0x3314e2);
                _0x102548++;
              }
            } else {
              if (_0x2aaed2 == 'folder_video') {
                if (/mp4/.test(_0x598dd7.basename)) {
                  _0x3314e2 = _0x2c8ffb.extend(true, {}, _0x20de73);
                  _0x3314e2.type = "video";
                  _0x23147d = _0x598dd7.fullpath;
                  _0x3314e2.path = [{
                    'quality': "default",
                    'mp4': _0x23147d
                  }];
                  if (_0x49c9b1.requirePosterFromFolder) {
                    _0x3314e2.poster = _0x23147d.substr(0x0, _0x23147d.lastIndexOf('/') + 0x1) + 'poster/' + _0x598dd7.filename + '.jpg';
                  }
                  if (_0x49c9b1.requireThumbnailsFromFolder) {
                    if (!_0x3314e2.thumb) {
                      _0x3314e2.thumb = _0x23147d.substr(0x0, _0x23147d.lastIndexOf('/') + 0x1) + "thumb/" + _0x598dd7.filename + '.jpg';
                    }
                  }
                  if (!_0x3314e2.share) {
                    _0x3314e2.share = _0x23147d;
                  }
                  if (!_0x3314e2.title) {
                    _0x3314e2.title = _0x598dd7.filename;
                  }
                  _0x2a1553.push(_0x3314e2);
                }
              } else {
                if (_0x2aaed2 == 'folder_image') {
                  if (/jpg|jpeg|png|gif/.test(_0x598dd7.basename)) {
                    _0x3314e2 = _0x2c8ffb.extend(true, {}, _0x20de73);
                    _0x3314e2.type = 'image';
                    _0x23147d = _0x598dd7.fullpath;
                    _0x3314e2.path = _0x23147d;
                    if (_0x49c9b1.requireThumbnailsFromFolder) {
                      if (!_0x3314e2.thumb) {
                        _0x3314e2.thumb = _0x23147d.substr(0x0, _0x23147d.lastIndexOf('/') + 0x1) + "thumb/" + _0x598dd7.filename + ".jpg";
                      }
                    }
                    if (!_0x3314e2.share) {
                      _0x3314e2.share = _0x23147d;
                    }
                    if (!_0x3314e2.title) {
                      _0x3314e2.title = _0x598dd7.filename;
                    }
                    _0x2a1553.push(_0x3314e2);
                  }
                }
              }
            }
          }
          if (_0x2aaed2 == 'folder_audio') {
            if (_0x20de73.id3) {
              _0x2d9dcd();
            } else {
              _0x388bd8();
            }
          } else {
            _0x388bd8();
          }
        }).fail(function (_0x1bdad1, _0xf4eadf, _0x5c4083) {
          console.log(_0x1bdad1, _0xf4eadf, _0x5c4083);
          _0x388bd8();
        });
      }
      function _0x2d9dcd() {
        if (typeof jsmediatags === "undefined") {
          var _0x421a61 = document.createElement('script');
          _0x421a61.type = "text/javascript";
          if (!MVPUtils.relativePath(_0x49c9b1.mediatags_js)) {
            var _0x3f4112 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.mediatags_js);
          } else {
            var _0x3f4112 = _0x49c9b1.mediatags_js;
          }
          _0x421a61.src = _0x3f4112;
          _0x421a61.onload = _0x421a61.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "complete") {
              _0x2d9dcd();
            }
          };
          _0x421a61.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x2b56d4 = document.getElementsByTagName("script")[0x0];
          _0x2b56d4.parentNode.insertBefore(_0x421a61, _0x2b56d4);
        } else {
          var _0x4f1e96 = _0x2a1553[_0x102548];
          var _0x1ff635 = _0x4f1e96.path[0x0].mp3 || _0x4f1e96.path[0x0].wav;
          jsmediatags.read(_0x1ff635, {
            'onSuccess': function (_0x3247d6) {
              var _0x47b67b = _0x3247d6.tags;
              var _0x4de7c4 = _0x47b67b.picture;
              if (_0x47b67b.artist) {
                _0x4f1e96.artist = _0x47b67b.artist;
              }
              if (_0x47b67b.title) {
                _0x4f1e96.title = _0x47b67b.title;
              }
              if (_0x47b67b.album) {
                _0x4f1e96.album = _0x47b67b.album;
              }
              if (_0x4de7c4) {
                var _0x1b8d68 = '';
                var _0x587cc1;
                var _0x506d21 = _0x4de7c4.data.length;
                for (_0x587cc1 = 0x0; _0x587cc1 < _0x506d21; _0x587cc1++) {
                  _0x1b8d68 += String.fromCharCode(_0x4de7c4.data[_0x587cc1]);
                }
                _0x4f1e96.thumb = "data:" + _0x4de7c4.format + ";base64," + window.btoa(_0x1b8d68);
              }
              _0x102548--;
              if (_0x102548 > _0xc91741) {
                _0x2d9dcd();
              } else {
                _0x388bd8();
              }
            },
            'onError': function (_0x174352) {
              console.log("ID3 error: ", _0x174352.type, _0x174352.info);
              _0x102548--;
              if (_0x102548 > _0xc91741) {
                _0x2d9dcd();
              } else {
                _0x388bd8();
              }
            }
          });
        }
      }
      function _0x5a699a(_0x48efa8) {
        if (window.location.protocol == "file:") {
          console.log("Reading files from folders locally is not possible! This requires server connection.");
          return false;
        }
        if (MVPUtils.isEmpty(_0x49c9b1.gDriveAppId)) {
          console.log("gDriveAppId has not been set in settings!");
          return false;
        }
        var _0x7c83ba = "https://www.googleapis.com/drive/v3/files?q='" + _0x48efa8.path + "'+in+parents&pageSize=1000&key=" + _0x49c9b1.gDriveAppId;
        console.log(_0x7c83ba);
        _0x2c8ffb.ajax({
          'url': _0x7c83ba,
          'dataType': "jsonp"
        }).done(function (_0x4ed25b) {
          console.log(_0x4ed25b);
          var _0x5b906b;
          var _0x4aad88 = _0x4ed25b.files.length;
          var _0x109d81;
          var _0x32948e;
          var _0x2b00c1 = [];
          var _0x32aa59 = [];
          for (_0x5b906b = 0x0; _0x5b906b < _0x4aad88; _0x5b906b++) {
            _0x109d81 = _0x4ed25b.files[_0x5b906b];
            if (/video/.test(_0x109d81.mimeType)) {
              _0x32aa59.push(_0x109d81);
            } else if (/image/.test(_0x109d81.mimeType)) {
              _0x2b00c1.push(_0x109d81);
            }
          }
          if (_0x48efa8.sort) {
            if (_0x48efa8.sort == "filename-asc") {
              MVPUtils.keysrt(_0x32aa59, "name");
              MVPUtils.keysrt(_0x2b00c1, "name");
            } else if (_0x48efa8.sort == "filename-desc") {
              MVPUtils.keysrt(_0x32aa59, 'name', true);
              MVPUtils.keysrt(_0x2b00c1, "name", true);
            }
          }
          _0x4aad88 = _0x32aa59.length;
          for (_0x5b906b = 0x0; _0x5b906b < _0x4aad88; _0x5b906b++) {
            _0x109d81 = _0x32aa59[_0x5b906b];
            _0x32948e = _0x2c8ffb.extend(true, {}, _0x48efa8);
            _0x32948e.type = 'video';
            _0x32948e.path = "https://drive.google.com/uc?export=view&id=" + _0x109d81.id;
            if (_0x49c9b1.createDownloadIconsInPlaylist) {
              if (!_0x32948e.download) {
                _0x32948e.download = "https://drive.google.com/uc?export=download&id=" + _0x109d81.id;
              }
            }
            if (_0x49c9b1.createLinkIconsInPlaylist) {
              if (!_0x32948e.link) {
                _0x32948e.link = 'https://drive.google.com/open?id=' + _0x109d81.id;
              }
            }
            if (_0x49c9b1.requireThumbnailsFromFolder) {
              if (!_0x32948e.thumb && _0x2b00c1[_0x5b906b]) {
                _0x32948e.thumb = 'https://drive.google.com/uc?export=view&id=' + _0x2b00c1[_0x5b906b].id;
              }
            }
            if (_0x49c9b1.requirePosterFromFolder) {
              if (!_0x32948e.poster && _0x2b00c1[_0x5b906b]) {
                _0x32948e.poster = 'https://drive.google.com/uc?export=view&id=' + _0x2b00c1[_0x5b906b].id;
              }
            }
            if (!_0x32948e.title) {
              _0x32948e.title = _0x109d81.name.substr(0x0, _0x109d81.name.lastIndexOf('.'));
            }
            _0x2a1553.push(_0x32948e);
          }
          _0x388bd8();
        }).fail(function (_0x44e26d, _0x1f0819, _0x5e23bd) {
          console.log("Error processGdriveFolder: " + _0x44e26d, _0x1f0819, _0x5e23bd);
          _0x388bd8();
        });
      }
      function _0x4e9806(_0x32df5d) {
        if (window.location.protocol == "file:") {
          console.log("Reading files from folders locally is not possible! This requires server connection.");
          return false;
        }
        var _0x53f258 = _0x32df5d.path;
        if (_0x53f258.indexOf('?') > -0x1) {
          _0x53f258 = _0x53f258.substr(0x0, _0x53f258.indexOf('?'));
        }
        var _0x27ac12 = btoa(_0x53f258);
        var _0x109b81 = "https://api.onedrive.com/v1.0/shares/u!" + _0x27ac12 + "/root?expand=children";
        _0x2c8ffb.ajax({
          'url': _0x109b81,
          'dataType': "json"
        }).done(function (_0x590af4) {
          var _0x25b395;
          var _0x1668a5 = _0x590af4.children.length;
          var _0x3800ad;
          var _0x1a8453;
          var _0x2c96f9 = [];
          var _0x267f7f = [];
          for (_0x25b395 = 0x0; _0x25b395 < _0x1668a5; _0x25b395++) {
            _0x3800ad = _0x590af4.children[_0x25b395];
            if (_0x3800ad.file) {
              if (_0x32df5d.sort == "date-asc" || _0x32df5d.sort == "date-desc") {
                var _0x871644 = new Date(_0x3800ad.fileSystemInfo.lastModifiedDateTime);
                _0x3800ad.fileSystemInfo.lastModifiedDateTime = _0x871644.getTime();
              } else {
                if (_0x32df5d.sort == "created-date-asc" || _0x32df5d.sort == "created-date-desc") {
                  var _0x871644 = new Date(_0x3800ad.fileSystemInfo.createdDateTime);
                  _0x3800ad.fileSystemInfo.createdDateTime = _0x871644.getTime();
                }
              }
              if (/video/.test(_0x3800ad.file.mimeType)) {
                _0x267f7f.push(_0x3800ad);
              } else if (/image/.test(_0x3800ad.file.mimeType)) {
                _0x2c96f9.push(_0x3800ad);
              }
            }
          }
          if (_0x32df5d.sort) {
            if (_0x32df5d.sort == 'filename-asc') {
              MVPUtils.keysrt(_0x267f7f, "name");
              MVPUtils.keysrt(_0x2c96f9, "name");
            } else {
              if (_0x32df5d.sort == "filename-desc") {
                MVPUtils.keysrt(_0x267f7f, "name", true);
                MVPUtils.keysrt(_0x2c96f9, "name", true);
              } else {
                if (_0x32df5d.sort == "date-asc") {
                  MVPUtils.keysrt2(_0x267f7f, "fileSystemInfo", "lastModifiedDateTime");
                  MVPUtils.keysrt2(_0x2c96f9, 'fileSystemInfo', "lastModifiedDateTime");
                } else {
                  if (_0x32df5d.sort == 'date-desc') {
                    MVPUtils.keysrt2(_0x267f7f, 'fileSystemInfo', "lastModifiedDateTime", true);
                    MVPUtils.keysrt2(_0x2c96f9, "fileSystemInfo", 'lastModifiedDateTime', true);
                  } else {
                    if (_0x32df5d.sort == "created-date-asc") {
                      MVPUtils.keysrt2(_0x267f7f, "fileSystemInfo", "createdDateTime");
                      MVPUtils.keysrt2(_0x2c96f9, "fileSystemInfo", "createdDateTime");
                    } else if (_0x32df5d.sort == "created-date-desc") {
                      MVPUtils.keysrt2(_0x267f7f, 'fileSystemInfo', "createdDateTime", true);
                      MVPUtils.keysrt2(_0x2c96f9, 'fileSystemInfo', "createdDateTime", true);
                    }
                  }
                }
              }
            }
          }
          _0x1668a5 = _0x267f7f.length;
          for (_0x25b395 = 0x0; _0x25b395 < _0x1668a5; _0x25b395++) {
            _0x3800ad = _0x267f7f[_0x25b395];
            _0x1a8453 = _0x2c8ffb.extend(true, {}, _0x32df5d);
            _0x1a8453.type = "video";
            if (!_0x1a8453.title) {
              _0x1a8453.title = _0x3800ad.name.substr(0x0, _0x3800ad.name.lastIndexOf('.'));
            }
            _0x1a8453.path = _0x3800ad["@content.downloadUrl"];
            if (_0x49c9b1.requireThumbnailsFromFolder) {
              if (!_0x1a8453.thumb && _0x2c96f9[_0x25b395]) {
                _0x1a8453.thumb = _0x2c96f9[_0x25b395]["@content.downloadUrl"];
              }
            }
            if (_0x49c9b1.requirePosterFromFolder) {
              if (!_0x1a8453.poster && _0x2c96f9[_0x25b395]) {
                _0x1a8453.poster = _0x2c96f9[_0x25b395]["@content.downloadUrl"];
              }
            }
            _0x2a1553.push(_0x1a8453);
          }
          _0x388bd8();
        }).fail(function (_0x1ddcc6, _0x2d77ad, _0x123182) {
          console.log("Error processOnedriveFolder: " + _0x1ddcc6, _0x2d77ad, _0x123182);
          _0x388bd8();
        });
      }
      function _0x55ad20() {
        var _0x45f63f;
        var _0x2a3c0e;
        var _0x3c1cb1 = !_0x20c1ed ? _0x1eed68.length : _0x53f505;
        var _0xa0984f = _0x2a1553.length;
        var _0x5b47a3;
        var _0x62e27b;
        var _0x20ff28;
        var _0x518f38;
        var _0x9bbc17;
        var _0x19b8f7;
        var _0x231ae3;
        var _0x35356d;
        var _0x1d7c78;
        var _0x9e85f6;
        var _0x488e4f = 0x0;
        var _0x2ac4e8;
        _0x234582 = [];
        _0x27eae9 = [];
        for (_0x2a3c0e = 0x0; _0x2a3c0e < _0xa0984f; _0x2a3c0e++) {
          _0x45f63f = _0x2a3c0e + _0x3c1cb1;
          if (_0x20c1ed) {
            _0x488e4f++;
          }
          _0x20ff28 = _0x2a1553[_0x2a3c0e];
          _0x5b47a3 = _0x20ff28.type;
          if (_0x116683) {
            if (!_0x20ff28.origclasses) {
              _0x20ff28.origclasses = 'mvp-playlist-item';
            }
            _0x62e27b = _0x2c8ffb("<div class=\"" + _0x20ff28.origclasses + "\"/>").attr("data-type", _0x5b47a3);
            delete _0x20ff28.origclasses;
            if (_0x1de04b.indexOf("thumb") != -0x1) {
              _0x518f38 = null;
              if (_0x20ff28.type == "youtube") {
                if (_0x20ff28.thumbnails) {
                  _0x2c8ffb.each(_0x20ff28.thumbnails, function (_0x3ffab4, _0x1d7f8e) {
                    if (_0x3ffab4 == _0x49c9b1.youtubeThumbSize) {
                      _0x518f38 = _0x1d7f8e.url;
                      return false;
                    }
                  });
                  if (!_0x518f38) {
                    if (_0x20ff28.thumbnails.medium) {
                      _0x518f38 = _0x20ff28.thumbnails.medium.url;
                    } else {
                      if (_0x20ff28.thumbnails.high) {
                        _0x518f38 = _0x20ff28.thumbnails.high.url;
                      } else {
                        if (_0x20ff28.thumbnails.standard) {
                          _0x518f38 = _0x20ff28.thumbnails.standard.url;
                        }
                      }
                    }
                  }
                  if (_0x49c9b1.showControlsBeforeStart && !_0x20ff28.poster) {
                    if (_0x20ff28.thumbnails.maxres) {
                      _0x20ff28.poster = _0x20ff28.thumbnails.maxres.url;
                    } else {
                      if (_0x20ff28.thumbnails.high) {
                        _0x20ff28.poster = _0x20ff28.thumbnails.high.url;
                      } else {
                        if (_0x20ff28.thumbnails.standard) {
                          _0x20ff28.poster = _0x20ff28.thumbnails.standard.url;
                        }
                      }
                    }
                  }
                }
              } else {
                if (_0x20ff28.type == "vimeo") {
                  if (_0x20ff28.pictures) {
                    _0x9bbc17 = _0x20ff28.pictures.sizes;
                    _0x19b8f7 = _0x9bbc17.length;
                    var _0x11ba2a;
                    for (_0x11ba2a = 0x0; _0x11ba2a < _0x19b8f7; _0x11ba2a++) {
                      if (_0x9bbc17[_0x11ba2a].width == _0x18ce02) {
                        _0x518f38 = _0x9bbc17[_0x11ba2a].link;
                        break;
                      }
                    }
                    if (!_0x518f38) {
                      for (_0x11ba2a = 0x0; _0x11ba2a < _0x19b8f7; _0x11ba2a++) {
                        if (_0x9bbc17[_0x11ba2a].width == 0x127 || _0x9bbc17[_0x11ba2a].width == 0x280) {
                          _0x518f38 = _0x9bbc17[_0x11ba2a].link;
                          break;
                        }
                      }
                    }
                    if (_0x49c9b1.showControlsBeforeStart && !_0x20ff28.poster) {
                      for (_0x11ba2a = 0x0; _0x11ba2a < _0x19b8f7; _0x11ba2a++) {
                        if (_0x9bbc17[_0x11ba2a].width == 0x500 || _0x9bbc17[_0x11ba2a].width == 0x780) {
                          _0x20ff28.poster = _0x9bbc17[_0x11ba2a].link;
                          break;
                        }
                      }
                    }
                  }
                }
              }
              if (!_0x518f38) {
                _0x518f38 = _0x20ff28.thumb || _0x20ff28.thumbDefault;
              }
              if (_0x518f38) {
                _0x35356d = _0x2c8ffb("<div/>").addClass("mvp-playlist-thumb").appendTo(_0x62e27b);
                if (_0x20ff28.alt) {
                  _0x231ae3 = _0x20ff28.alt;
                } else {
                  if (_0x20ff28.title) {
                    _0x231ae3 = _0x20ff28.title.replace(/"/g, "'");
                  } else {
                    _0x231ae3 = "image";
                  }
                }
                var _0xfff259 = _0x2c8ffb(new Image()).addClass("mvp-thumbimg").appendTo(_0x35356d).attr({
                  'alt': _0x231ae3
                });
                if ((_0x20ff28.origtype == "s3_video" || _0x20ff28.origtype == "s3_audio") && _0x49c9b1.getThumbFromBucket) {
                  _0x27eae9.push({
                    'isrc': _0xfff259,
                    'thumb': _0x518f38,
                    'bucket': _0x20ff28.bucket
                  });
                  _0xfff259.attr("src", "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=");
                } else {
                  _0xfff259.attr("src", _0x518f38);
                }
                if (_0x20ff28.hoverPreview) {
                  if (_0x20ff28.hoverPreview.indexOf(".gif") > -0x1) {
                    _0x20ff28.hoverPreviewImg = _0x20ff28.hoverPreview;
                  } else {
                    _0x20ff28.hoverPreviewVideo = _0x20ff28.hoverPreview;
                    _0x2c8ffb("<div class=\"mvp-playlist-thumb-preview\"><video class=\"mvp-playlist-thumb-preview-video\" loop=\"true\" playsinline=\"true\" preload=\"auto\" muted=\"true\" autoplay=\"true\" src=\"\"></video></div>").appendTo(_0x35356d);
                  }
                }
                _0x20ff28.thumb = _0x518f38;
                if (_0x1de04b.indexOf("duration") > -0x1) {
                  if (_0x20ff28.duration) {
                    _0x2c8ffb("<span class=\"mvp-playlist-duration\">" + MVPUtils.formatTime(_0x20ff28.duration) + "</span>").appendTo(_0x35356d);
                  }
                }
                if (_0x49c9b1.displayWatchedPercentage) {
                  _0x2c8ffb("<div class=\"mvp-media-watched-bg mvp-hidden\"><div class=\"mvp-media-watched-progress\"></div></div>").appendTo(_0x35356d);
                }
              }
            }
            if (_0x20ff28.title || _0x20ff28.description || _0x20ff28.publishedAt) {
              _0x1d7c78 = _0x2c8ffb("<div class=\"mvp-playlist-info\"></div>").appendTo(_0x62e27b);
              var _0x11ba2a;
              var _0x1e746a = _0x1de04b.length;
              var _0x32ab08;
              for (_0x11ba2a = 0x0; _0x11ba2a < _0x1e746a; _0x11ba2a++) {
                _0x32ab08 = _0x1de04b[_0x11ba2a];
                if (_0x32ab08 == "title" && _0x20ff28.title) {
                  _0x9e85f6 = _0x20ff28.title.replace(/"/g, "'");
                  _0x62e27b.attr("title", _0x9e85f6);
                  _0x2c8ffb("<span class=\"mvp-playlist-title\">" + _0x9e85f6 + "</span>").appendTo(_0x1d7c78);
                } else {
                  if (_0x32ab08 == "date" && _0x20ff28.date) {
                    var _0x40979f = new Date(_0x20ff28.date);
                    var _0x567e00 = _0x40979f.getMonth() + 0x1 + '/' + _0x40979f.getDate() + '/' + _0x40979f.getFullYear();
                    _0x2c8ffb("<span class=\"mvp-playlist-published-date\">" + _0x567e00 + "</span>").appendTo(_0x1d7c78);
                  } else {
                    if (_0x32ab08 == 'description' && _0x20ff28.description) {
                      var _0xdff951 = _0x20ff28.description.replace(/"/g, "'");
                      _0x62e27b.attr('data-description', _0xdff951);
                      var _0x2e0585 = '';
                      if (_0x49c9b1.limitDescriptionText) {
                        _0x2e0585 = " mvp-playlist-description-clamp";
                      }
                      _0x2c8ffb("<div class=\"mvp-playlist-description" + _0x2e0585 + "\">" + _0xdff951 + "</div>").appendTo(_0x1d7c78);
                    }
                  }
                }
              }
            }
            if (_0x20ff28.mediaId != undefined) {
              _0x62e27b.attr("data-media-id", _0x20ff28.mediaId);
            } else {
              if (_0x20ff28.path) {
                if (_0x49c9b1.getWatchedPercentage) {
                  _0x62e27b.attr('data-media-url', _0x20ff28.path);
                }
              }
            }
            if (_0x20ff28.title) {
              var _0x3065fe = _0x20ff28.title.replace(/['"\|]/g, '');
              _0x3065fe = _0x3065fe.replace(/[^a-z\d,\s\.]+/gi, '');
              _0x3065fe = _0x3065fe.replace(/\s+/g, " ");
              _0x62e27b.attr("data-safe-title", _0x3065fe);
              _0x20ff28.safeTitle = _0x3065fe;
            }
            if (_0x20ff28.playlistIcons) {
              var _0x3c98cb;
              if (_0x49c9b1.playlistIconContainer) {
                if (_0x49c9b1.playlistIconContainer == ".mvp-playlist-item") {
                  _0x3c98cb = _0x62e27b;
                } else {
                  _0x3c98cb = _0x62e27b.find(_0x49c9b1.playlistIconContainer);
                }
              } else {
                _0x3c98cb = _0x1d7c78;
              }
              var _0x460bb8 = _0x2c8ffb("<div class=\"mvp-playlist-icons\"></div>").appendTo(_0x3c98cb);
              var _0x3c1cb1;
              var _0x973dcc = _0x20ff28.playlistIcons.length;
              var _0xf27596;
              var _0x1ca304;
              for (_0x3c1cb1 = 0x0; _0x3c1cb1 < _0x973dcc; _0x3c1cb1++) {
                _0xf27596 = _0x20ff28.playlistIcons[_0x3c1cb1];
                if (_0xf27596.icon) {
                  if (_0xf27596["class"]) {
                    _0x1ca304 = " " + _0xf27596['class'];
                  } else {
                    _0x1ca304 = '';
                  }
                  var _0x32abf8 = "<a class=\"mvp-playlist-icon" + _0x1ca304 + "\"";
                  if (_0xf27596.url) {
                    _0x32abf8 += " href=\"" + _0xf27596.url + "\"";
                  }
                  if (_0xf27596.target) {
                    _0x32abf8 += " target=\"" + _0xf27596.target + "\"";
                  }
                  if (_0xf27596.title) {
                    _0x32abf8 += " title=\"" + _0xf27596.title + "\"";
                  }
                  if (_0xf27596.rel) {
                    _0x32abf8 += " rel=\"" + _0xf27596.rel + "\"";
                  }
                  _0x32abf8 += '>' + _0xf27596.icon + '</a>';
                }
                _0x460bb8.append(_0x32abf8);
              }
            }
            if (_0x20ff28.customContent) {
              _0x62e27b.append(_0x20ff28.customContent);
              delete _0x20ff28.customContent;
            }
            if (!_0x20c1ed) {
              _0x62e27b.appendTo(_0x223a1c);
            } else {
              if (!_0x2ac4e8) {
                if (_0x4a105b) {
                  _0x62e27b.appendTo(_0x223a1c);
                } else {
                  _0x223a1c.children("div").eq(_0x53f505).before(_0x62e27b);
                }
              } else {
                _0x2ac4e8.after(_0x62e27b);
              }
              _0x2ac4e8 = _0x62e27b;
            }
            if (_0x116683 && _0x49c9b1.addPlaylistEvents) {
              if (_0x49c9b1.playlistItemClickTrigger) {
                if (_0x49c9b1.playlistItemClickTrigger == ".mvp-playlist-item") {
                  _0x62e27b.on("click", _0x33ac4b);
                } else {
                  _0x62e27b.find(_0x49c9b1.playlistItemClickTrigger).on("click", _0x33ac4b);
                }
              } else {
                _0x62e27b.on('click', _0x33ac4b);
              }
              _0x62e27b.find('.mvp-playlist-icon').click(function (_0x32c1d5) {
                _0x32c1d5.stopPropagation();
              });
              if (!_0x36b677) {
                _0x62e27b.on("mouseenter", _0xa040f3).on('mouseleave', _0x5ae7a7);
              }
            }
          } else {
            if (_0x49c9b1.useStatistics) {
              if (_0x20ff28.mediaId != undefined) {
                if (_0x20ff28.title) {
                  var _0x3065fe = _0x20ff28.title.replace(/['"\|]/g, '');
                  _0x20ff28.safeTitle = _0x3065fe;
                }
              }
            }
          }
          if (_0xd3a404 != undefined) {
            _0x20ff28.playlistId = _0xd3a404;
          }
          _0x1eed68.splice(_0x45f63f, 0x0, {
            'id': _0x45f63f,
            'type': _0x5b47a3,
            'data': _0x20ff28
          });
          _0x234582.push({
            'id': _0x45f63f,
            'type': _0x5b47a3,
            'data': _0x20ff28
          });
        }
        _0x3d64b6 = _0x223a1c;
        _0x2a5ee9();
        if (!_0x20c1ed) {
          _0x453856.setPlaylistItems(_0x142a3d);
        } else {
          var _0x5e36a8 = _0x453856.getCounter();
          _0x453856.setPlaylistItems(_0x142a3d, false);
          if (_0x53f505 <= _0x5e36a8) {
            if (!_0x4a105b) {
              _0x453856.reSetCounter(_0x5e36a8 + _0x488e4f);
            }
          }
          if (_0x1cedbb && !_0x36b677) {
            _0x4d248d = true;
            _0x49c9b1.autoPlay = true;
          }
          if (_0x1cedbb) {
            _0x4bdd56 = false;
            _0x453856.setCounter(_0x53f505, false);
          }
        }
        _0x179bd6();
      }
      function _0x2a5ee9() {
        _0x142a3d = _0x1eed68.length;
        if (_0x116683) {
          var _0xb50931 = 0x0;
          _0x223a1c.find(".mvp-playlist-item").each(function () {
            _0x2c8ffb(this).attr("data-id", _0xb50931);
            _0x1eed68[_0xb50931].id = _0xb50931;
            _0xb50931++;
          });
        } else {
          var _0xb50931;
          for (_0xb50931 = 0x0; _0xb50931 < _0x142a3d; _0xb50931++) {
            _0x1eed68[_0xb50931].id = _0xb50931;
          }
        }
      }
      function _0x179bd6() {
        _0x547090 = false;
        if (!_0x588a79) {
          _0x588a79 = true;
          if (_0x2a1113) {
            _0x3d4743 = parseInt(_0x2a1113.attr('data-add-more-limit'), 0xa);
            _0x1d04e3 = parseInt(_0x2a1113.attr("data-add-more-num-results"), 0xa);
            _0x2d0ff2 = parseInt(_0x2a1113.attr("data-add-more-offset"), 0xa);
            _0x3e776d = _0x2a1113.attr('data-add-more-sort-order');
            _0x5bea3f = _0x2a1113.attr('data-add-more-sort-direction');
            _0x1c7baf = _0x2a1113.attr("data-encrypt-media-paths");
            if (_0x2a1113.attr("data-add-more-on-total-scroll") != undefined) {
              _0x2d3b7c = true;
            }
            if (_0x2a1113.attr('data-use-pagination') != undefined) {
              _0x4ac7b1 = Math.ceil(_0x1d04e3 / _0x3d4743);
              if (_0x1d04e3 > _0x3d4743) {
                _0x107c46 = 0x0;
                _0x3bde0b(_0x107c46);
                var _0x4c5fed;
                var _0x4f2075;
                for (_0x4c5fed = 0x0; _0x4c5fed < _0x4ac7b1; _0x4c5fed++) {
                  _0x4f2075 = _0x4c5fed == 0x0 ? {
                    'page': 0x0
                  } : {
                    'page': null
                  };
                  _0x4b0daf.push(_0x4f2075);
                }
                _0x4b0f7c(_0x107c46);
              }
            }
          }
          if (_0x116683 && (_0x2b1fae == "scroll" || _0x2b1fae == 'buttons' || _0x2b1fae == "hover") && !_0x182de3) {
            if (typeof MVPPlaylistNavigation === 'undefined') {
              var _0x16a5ea = document.createElement("script");
              _0x16a5ea.type = "text/javascript";
              _0x16a5ea.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.playlist_navigation_js);
              _0x16a5ea.onload = _0x16a5ea.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "complete") {
                  _0x473868();
                }
              };
              _0x16a5ea.onerror = function () {
                console.log("Error loading " + this.src);
              };
              var _0x1141c9 = document.getElementsByTagName("script")[0x0];
              _0x1141c9.parentNode.insertBefore(_0x16a5ea, _0x1141c9);
            } else {
              _0x473868();
            }
            _0x182de3 = true;
          }
          if (_0x49c9b1.offlineImage) {
            _0x5ca0d3.setOfflineImage(_0x49c9b1.offlineImage);
          }
          _0x93b161.on("mousemove mousedown keypress DOMMouseScroll mousewheel touchmove MSPointerMove", _0x33d37e);
          _0x2c8ffb(_0x5ca0d3).trigger("setupDone", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName
          });
          _0x43db09.hide();
          if (_0x49c9b1.createPlayer) {
            _0x43db09.appendTo(_0x93b161);
          }
          _0x31d45c();
          _0x40300f.css("opacity", 0x1);
          if (_0x49c9b1.minimizeOnScroll) {
            _0x4d273c = MVPUtils.getElementOffsetTop(_0x550351[0x0]);
            _0x48f7fc.on(_0x28982f, function () {
              if (_0x52d665) {
                return;
              }
              _0x52d665 = true;
              if (_0x49c9b1.minimizeOnScrollOnlyIfPlaying) {
                if (_0x1f950b) {
                  _0x3bc0ca();
                }
              } else {
                _0x3bc0ca();
              }
              setTimeout(function () {
                _0x52d665 = false;
              }, 0x64);
            });
          }
        }
        if (_0x5560e8 && !_0x298f2c) {
          _0x1b620a();
        }
        if (_0x116683 && _0x142a3d > 0x0) {
          if (_0x49c9b1.gridType == "javascript" && _0x49c9b1.breakPointArr) {
            _0x2516e4();
            _0x2804ba = _0x37cc09;
            _0x223a1c.find('.mvp-playlist-item').each(function () {
              if (_0x153025 > 0x0) {
                var _0x41061d = 0x64 / _0x37cc09;
                _0x2c8ffb(this).css({
                  'marginLeft': 0x0,
                  'marginTop': 0x0,
                  'marginRight': _0x153025 + 'px',
                  'marginBottom': _0x153025 + 'px',
                  'width': "calc(" + _0x41061d + "% - " + _0x153025 + "px)"
                });
              } else {
                _0x2c8ffb(this).css({
                  'marginLeft': 0x0,
                  'marginTop': 0x0,
                  'marginRight': _0x153025 + 'px',
                  'marginBottom': _0x153025 + 'px',
                  'width': 0x64 / _0x37cc09 + '%'
                });
              }
            });
          }
          if (_0x1898dd == 'h') {
            _0x223a1c.width(_0x142a3d * _0x49c9b1.pi_size);
          }
          if (_0x27eae9.length) {
            _0x42cedb(_0x27eae9[0x0]);
          } else {
            _0x397002();
          }
          if (_0x49c9b1.displayWatchedPercentage && _0x116683) {
            _0x11ddd6();
          }
          if (_0x2b1fae == "scroll" && _0x49c9b1.playlistScrollType == 'perfect-scrollbar') {
            if (_0x2cb5ab) {
              _0x2cb5ab.updateScrollPosition();
            }
          }
        }
        if (!_0x3f2b4f) {
          if (!_0x20c1ed && _0x142a3d > 0x0) {
            if (_0x49c9b1.mediaId != undefined) {
              if (_0x49c9b1.mediaTitle) {
                var _0x4a93d5 = _0x223a1c.find(".mvp-playlist-item[data-media-id=" + _0x49c9b1.mediaId + "][title=\"" + _0x49c9b1.mediaTitle + "\"]");
                if (_0x4a93d5.length == 0x0) {
                  var _0x4a93d5 = _0x223a1c.find(".mvp-playlist-item[data-media-id=" + _0x49c9b1.mediaId + ']');
                }
                delete _0x49c9b1.mediaTitle;
              } else {
                var _0x4a93d5 = _0x223a1c.find('.mvp-playlist-item[data-media-id=' + _0x49c9b1.mediaId + ']');
              }
              var _0x594cd2 = _0x223a1c.children(".mvp-playlist-item").index(_0x4a93d5);
              if (_0x594cd2 == undefined || _0x594cd2 == -0x1) {
                alert("No media with ID to load! LoadMedia failed.");
                return false;
              }
              delete _0x49c9b1.mediaId;
              _0x453856.processPlaylistRequest(_0x594cd2);
            } else {
              var _0x49bc25 = _0x49c9b1.activeItem;
              if (_0x49bc25 > _0x142a3d - 0x1) {
                _0x49bc25 = _0x142a3d - 0x1;
              }
              if (_0x49bc25 > -0x1) {
                _0x453856.setCounter(_0x49bc25, false);
              }
            }
            _0x3f2b4f = true;
          }
        }
        _0x20c1ed = false;
        _0x43db09.hide();
        if (_0x58b362) {
          _0x58b362 = false;
          if (_0x2b1fae == "buttons") {
            if (_0x2cb5ab) {
              _0x2cb5ab.showButtons("forward");
            }
          }
        }
        if (_0x45d18d) {
          if (_0x20063) {
            if (_0x1d567f) {
              _0x45d18d.css("opacity", 0x1);
            } else {
              _0x45d18d.remove();
              _0x45d18d = null;
              _0x20063 = false;
            }
          } else if (_0x2d3b7c) {
            if (_0x1d04e3 > 0x0) {
              if (_0x1d04e3 > _0x2d0ff2) {
                _0x45d18d.css('opacity', 0x1);
              } else {
                _0x45d18d.remove();
                _0x45d18d = null;
                _0x2d3b7c = false;
              }
            }
          } else {
            _0x45d18d.remove();
            _0x45d18d = null;
          }
        }
        _0x2c8ffb(_0x5ca0d3).trigger('playlistEndLoad', {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'loadMoreOnTotalScroll': _0x20063,
          'addMoreOnTotalScroll': _0x2d3b7c
        });
        if (_0x49c9b1.gridType == "masonry") {
          if (!_0x5b8e61) {
            _0x223a1c.prepend("<div class=\"mvp-grid-sizer\"></div>");
            _0x550351.addClass("mvp-masonry");
            if (typeof _0x2c8ffb.fn.masonry === "undefined") {
              console.log("Link to masonry.pkgd.min.js file missing in head tag!");
            }
            if (typeof imagesLoaded !== 'function') {
              console.log("Link to imagesloaded.pkgd.min file missing in head tag!");
            }
            _0x5b8e61 = _0x223a1c.masonry({
              'itemSelector': ".mvp-playlist-item"
            });
            _0x223a1c.imagesLoaded(function () {
              _0x5b8e61.masonry("layout");
            });
          } else {
            _0x223a1c.masonry("reloadItems");
            _0x223a1c.imagesLoaded(function () {
              _0x5b8e61.masonry('layout');
            });
          }
        }
      }
      function _0x397002() {
        var _0x3440ae = [];
        _0x223a1c.find(".mvp-thumbimg:not(.mvp-visible)").each(function () {
          _0x3440ae.push(_0x2c8ffb(this));
        });
        var _0x1d8c1f = 0x0;
        var _0x2ebfbf = _0x3440ae.length;
        var _0x3f63ff;
        for (_0x3f63ff = 0x0; _0x3f63ff < _0x2ebfbf; _0x3f63ff++) {
          setTimeout(function () {
            clearTimeout(this);
            _0x3440ae[_0x1d8c1f].addClass('mvp-visible');
            _0x1d8c1f++;
          }, 0x32 + _0x3f63ff * 0x32);
        }
      }
      function _0x2516e4() {
        var _0x48dd0e = _0x550351.width();
        var _0x54d5c9;
        var _0xefdb00 = _0x49c9b1.breakPointArr.length;
        var _0xd10d9f;
        for (_0x54d5c9 = 0x0; _0x54d5c9 < _0xefdb00; _0x54d5c9++) {
          _0xd10d9f = _0x49c9b1.breakPointArr[_0x54d5c9];
          if (_0x48dd0e > _0xd10d9f.width) {
            _0x37cc09 = _0xd10d9f.column;
            _0x153025 = _0xd10d9f.gutter;
          }
        }
        _0x2b0f45.css({
          'paddingTop': _0x153025 + 'px',
          'paddingLeft': _0x153025 + 'px'
        });
      }
      function _0x473868() {
        _0x49c9b1.parent = _0x5ca0d3;
        _0x49c9b1.wrapper = _0x550351;
        _0x49c9b1.playlistHolder = _0x349f0e;
        _0x49c9b1.playlistInner = _0x2b0f45;
        _0x49c9b1.playlistContent = _0x223a1c;
        _0x2cb5ab = new MVPPlaylistNavigation(_0x49c9b1);
      }
      function _0x70f010() {
        if (MVPUtils.isScrolledIntoView(_0x550351[0x0])) {
          _0x511fa7 = true;
          _0x4d248d = true;
          _0x49c9b1.autoPlay = true;
          _0x5ca0d3.playMedia();
        } else {
          _0x48f7fc.on(_0x454d29, function () {
            if (_0x52d665) {
              return;
            }
            _0x52d665 = true;
            if (MVPUtils.isScrolledIntoView(_0x550351[0x0])) {
              _0x511fa7 = true;
              _0x4d248d = true;
              _0x49c9b1.autoPlay = true;
              _0x5ca0d3.playMedia();
            } else {
              _0x5ca0d3.pauseMedia();
            }
            setTimeout(function () {
              _0x52d665 = false;
            }, 0xfa);
          });
        }
      }
      function _0x3bc0ca(_0x4f2bba) {
        if (_0x2e3f69 == "fullscreen") {
          return;
        }
        if (!_0x4f2bba && MVPUtils.getScrollTop() > _0x4d273c) {
          if (!_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
            _0x40300f.addClass(_0x49c9b1.minimizeClass);
            if (_0x49c9b1.hidePlaylistOnMinimize && _0x49c9b1.playlistOpened) {
              _0x10a096 = true;
              _0x49c9b1.playlistOpened = false;
            }
          }
        } else if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
          _0x40300f.removeClass(_0x49c9b1.minimizeClass);
          if (_0x49c9b1.hidePlaylistOnMinimize && !_0x49c9b1.playlistOpened) {
            _0x10a096 = false;
            _0x49c9b1.playlistOpened = true;
          }
        }
        _0x31d45c();
      }
      if (_0x49c9b1.autoAdvanceToNextPlaylist) {
        _0x49c9b1.loopingOn = false;
      }
      var _0x453856 = new MVPPlaylistManager(_0x49c9b1);
      _0x2c8ffb(_0x453856).on('MVPPlaylistManager.COUNTER_READY', function (_0x2d1850, _0x549a4a) {
        _0x465438 = null;
        _0x4bdd56 = false;
        _0x3bc623 = false;
        _0x33f920 = false;
        _0xac8d7e = 0x0;
        _0x4859b1 = false;
        _0x1baffa = null;
        _0x28e3ab = 0x0;
        _0x319b1b = [];
        _0x420869 = [];
        _0x3e7915 = null;
        _0x450dd1 = [];
        _0x484953 = null;
        _0x8083b8.find(".mvp-ad-indicator").remove();
        _0x2cec26 = false;
        _0x53e109 = false;
        _0x54dec0 = [];
        _0x2aa1b2 = false;
        _0x24fb02 = [];
        _0x3d30f6 = false;
        _0x8083b8.find('.mvp-chapter-indicator').remove();
        _0x5e08d1 = [];
        _0x488eee = false;
        _0x5e7bb7 = false;
        _0x5589a0 = null;
        _0x5b9357 = null;
        _0x2cfea7 = null;
        _0xd5f952.removeClass('mvp-seekbar-chapters');
        _0x415799 = false;
        _0x4fa790 = null;
        _0x31f22e = null;
        _0x34f818 = null;
        _0x1808b1.removeClass("mvp-progress-sizing");
        _0x134a79.removeClass("mvp-progress-sizing");
        if (_0xaad07c) {
          _0x537dc7();
        }
        _0x48707c = _0x549a4a;
        _0x1450dc = _0x1eed68[_0x48707c].data;
        if (_0x49c9b1.rememberPlaybackPosition == "all") {
          if (_0x49c9b1.lastPositionArr) {
            var _0x4246aa;
            var _0x5a1409 = _0x49c9b1.lastPositionArr.length;
            var _0x4d6cfe;
            for (_0x4246aa = 0x0; _0x4246aa < _0x5a1409; _0x4246aa++) {
              _0x4d6cfe = _0x49c9b1.lastPositionArr[_0x4246aa];
              if (_0x1450dc.title == _0x4d6cfe.title) {
                _0x1450dc.start = _0x4d6cfe.start;
                _0x49c9b1.playbackPositionTime = _0x1450dc.start;
                break;
              }
            }
          }
        }
        _0x4cf9d5();
        _0x3d3884 = true;
        if (_0x49c9b1.isUserLoggedIn) {
          if (typeof _0x1450dc.lockTime != undefined) {
            if (_0x4ba915 && _0x1450dc.lockVideoUserRoles) {
              _0x3d3884 = MVPUtils.arrayContainsAnotherArray(_0x1450dc.lockVideoUserRoles, _0x4ba915);
            }
          }
        } else {
          _0x3d3884 = false;
        }
        if (!_0x415799) {
          _0x415799 = true;
          if (_0x1450dc.annotationSection) {
            _0x4fa790 = _0x1450dc.annotationSection;
            if (_0x4fa790 instanceof _0x2c8ffb == false) {
              _0x4fa790 = _0x2c8ffb(_0x4fa790);
            }
          }
        }
        _0x465438 = _0x1450dc;
        if (_0x19562e) {
          if (_0x1450dc.vast) {
            if (_0x49c9b1.useImaLoader) {
              if (!(_0x1450dc.type != "video" || _0x1450dc.type != "audio")) {
                delete _0x1450dc.vast;
              } else {
                _0x2aa1b2 = true;
                _0x4859b1 = true;
              }
            }
          }
          if (!_0x4859b1) {
            _0x4859b1 = true;
            if (_0x1450dc.adPre || _0x1450dc.adMid || _0x1450dc.adEnd) {
              if (_0x1450dc.adMid) {
                var _0x35f04e;
                var _0x5a1409 = _0x1450dc.adMid.length;
                var _0x207c72;
                for (_0x4246aa = 0x0; _0x4246aa < _0x5a1409; _0x4246aa++) {
                  _0x207c72 = _0x1450dc.adMid[_0x4246aa];
                  _0x420869.push({
                    'begin': _0x207c72.begin,
                    'data': _0x207c72,
                    'type': _0x207c72.type
                  });
                }
              }
              if (_0x1450dc.adEnd) {
                var _0x35f04e;
                var _0x5a1409 = _0x1450dc.adEnd.length;
                var _0x207c72;
                for (_0x4246aa = 0x0; _0x4246aa < _0x5a1409; _0x4246aa++) {
                  _0x207c72 = _0x1450dc.adEnd[_0x4246aa];
                  _0x450dd1.push({
                    'data': _0x207c72,
                    'type': _0x207c72.type
                  });
                }
                _0x28e3ab = -0x1;
              }
              if (_0x1450dc.adPre) {
                var _0x35f04e;
                var _0x5a1409 = _0x1450dc.adPre.length;
                var _0x207c72;
                for (_0x4246aa = 0x0; _0x4246aa < _0x5a1409; _0x4246aa++) {
                  _0x207c72 = _0x1450dc.adPre[_0x4246aa];
                  _0x319b1b.push({
                    'data': _0x207c72,
                    'type': _0x207c72.type
                  });
                }
                _0x28e3ab = 0x0;
                _0x1450dc = _0x319b1b[_0x28e3ab].data;
                _0x395507 = true;
              }
            } else {
              if (_0x1450dc.adSection) {
                _0x484953 = _0x1450dc.adSection;
                if (_0x484953 instanceof _0x2c8ffb == false) {
                  _0x484953 = _0x2c8ffb(_0x484953);
                }
                _0x484953.find(".mvp-ad").each(function () {
                  var _0x436f52 = _0x2c8ffb(this);
                  if (_0x436f52.hasClass("mvp-ad-pre")) {
                    _0x319b1b.push(_0x436f52);
                  } else {
                    if (_0x436f52.hasClass('mvp-ad-mid')) {
                      var _0x3c457d = _0x436f52.attr("data-begin");
                      _0x420869.push({
                        'begin': _0x3c457d,
                        'data': _0x436f52
                      });
                    } else if (_0x436f52.hasClass("mvp-ad-end")) {
                      _0x450dd1.push(_0x436f52);
                    }
                  }
                });
                if (_0x1450dc.vast) {} else {
                  if (_0x319b1b.length) {
                    _0x28e3ab = 0x0;
                    _0x1450dc = _0x35278d(_0x319b1b[_0x28e3ab]);
                    console.log(_0x1450dc);
                    _0x395507 = true;
                  } else if (_0x450dd1.length) {
                    _0x28e3ab = -0x1;
                  }
                }
              }
            }
          }
        }
        _0x2c8ffb(_0x5ca0d3).trigger('mediaRequest', {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'media': _0x1450dc
        });
        if (_0x1450dc.origtype == 's3_video' || _0x1450dc.origtype == "s3_audio") {
          _0xe718f4(_0x1450dc);
        } else {
          if (_0x1450dc.vast) {
            _0x223ac1 = true;
            _0x1450dc.origtype = _0x1450dc.type;
            if (_0x2aa1b2) {
              if (!_0x266764) {
                _0x458694();
              }
            } else {
              _0x31275a();
              return;
            }
          }
          _0x1f4eb8();
        }
      }).on('MVPPlaylistManager.RANDOM_CHANGE', function (_0x149833, _0x5f3786) {
        if (_0x5f3786) {
          _0x58a309.addClass("mvp-contr-btn-hover");
        } else {
          _0x58a309.removeClass('mvp-contr-btn-hover');
        }
      }).on("MVPPlaylistManager.LOOP_CHANGE", function (_0x49c4d5, _0x5eee65) {
        if (_0x5eee65) {
          _0x2cccd5.addClass('mvp-contr-btn-hover');
        } else {
          _0x2cccd5.removeClass("mvp-contr-btn-hover");
        }
      }).on("MVPPlaylistManager.PLAYLIST_END", function (_0x2cd045, _0x8d6ab8) {
        if (_0x49c9b1.autoAdvanceToNextPlaylist) {
          if (_0x49c9b1.makePlaylistSelector) {
            var _0x1d4502 = _0xe082c5.find('.mvp-playlist-selector-item-active');
            if (_0x1d4502.length) {
              var _0x2a8ece = _0x1d4502.next();
              if (_0x2a8ece.length) {
                _0x2a8ece.trigger("click");
              } else {
                _0xe082c5.find(".mvp-playlist-selector-item").eq(0x0).trigger("click");
              }
            } else {
              _0xe082c5.find(".mvp-playlist-selector-item").eq(0x0).trigger('click');
            }
          } else {
            if (_0x200cb8) {
              var _0x1bcbc4 = _0x208e6f.find(_0x200cb8);
              if (_0x1bcbc4.length) {
                var _0x2a8ece = _0x1bcbc4.next();
                if (_0x2a8ece.length) {
                  _0x1b42bc('.' + _0x2a8ece.attr("class"));
                }
              }
            }
          }
        }
      });
      function _0xe718f4(_0x47b5ac) {
        if (_0x47b5ac.key.indexOf("ebsfm:") != -0x1) {
          _0x47b5ac.key = MVPUtils.b64DecodeUnicode(_0x47b5ac.key.substr(0x6));
        }
        var _0x187499 = _0x49c9b1.sourcePath + 'includes/aws/aws.php';
        var _0x25c57b = {
          'object_key': _0x47b5ac.key,
          'bucket': _0x47b5ac.bucket,
          'action': "get_url",
          'region': _0x49c9b1.s3Region,
          'expire': _0x49c9b1.s3UrlExpireTime,
          'cred': _0x49c9b1.s3
        };
        _0x2c8ffb.ajax({
          'type': 'GET',
          'url': _0x187499,
          'data': _0x25c57b,
          'dataType': 'json'
        }).done(function (_0x1c3dfe) {
          _0xaad07c = _0x47b5ac.origtype == "s3_video" ? "video" : 'audio';
          _0x1450dc.path = _0x1c3dfe;
          _0x1f4eb8();
        }).fail(function (_0x3878cc, _0x20eacc, _0x109599) {
          console.log(_0x3878cc, _0x20eacc, _0x109599);
          _0x2c8ffb(_0x5ca0d3).trigger("getAws_error:", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc,
            'error': _0x109599
          });
        });
      }
      function _0x58770e(_0x1c34b8) {
        if (_0x1c34b8.key.indexOf("ebsfm:") != -0x1) {
          _0x1c34b8.key = MVPUtils.b64DecodeUnicode(_0x1c34b8.key.substr(0x6));
        }
        var _0x18aa27 = _0x49c9b1.sourcePath + "includes/aws/aws.php";
        var _0x5625af = {
          'object_key': _0x1c34b8.key,
          'bucket': _0x1c34b8.bucket,
          'action': "get_url",
          'region': _0x49c9b1.s3Region,
          'expire': _0x49c9b1.s3UrlExpireTime,
          'cred': _0x49c9b1.s3
        };
        _0x2c8ffb.ajax({
          'type': 'GET',
          'url': _0x18aa27,
          'data': _0x5625af,
          'dataType': 'json'
        }).done(function (_0x158cbb) {
          if (_0x1c34b8.origtype == "s3_video") {
            _0x326462.src = _0x158cbb;
            var _0x6697cd = _0x326462.play();
            if (_0x6697cd !== undefined) {
              _0x6697cd.then(function () {})["catch"](function (_0x386d33) {
                _0x105ccb.show();
                _0x43db09.hide();
              });
            }
          } else {
            if (_0x1c34b8.origtype == 's3_audio') {
              _0x143642.src = _0x158cbb;
              var _0x6697cd = _0x143642.play();
              if (_0x6697cd !== undefined) {
                _0x6697cd.then(function () {})['catch'](function (_0x7cfe37) {
                  _0x105ccb.show();
                  _0x43db09.hide();
                });
              }
            }
          }
        }).fail(function (_0x23dc04, _0x7cdda9, _0x5490f5) {
          console.log(_0x23dc04, _0x7cdda9, _0x5490f5);
          _0x2c8ffb(_0x5ca0d3).trigger('getAws_error:', {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc,
            'error': _0x5490f5
          });
        });
      }
      function _0xebb7c6(_0x52801d) {
        _0x43db09.show();
        var _0x5c5931 = _0x49c9b1.sourcePath + "includes/aws/aws.php";
        var _0x28b59 = {
          'object_key': _0x52801d.poster,
          'bucket': _0x52801d.bucket,
          'action': "get_url_thumb",
          'region': _0x49c9b1.s3Region,
          'expire': _0x49c9b1.s3UrlExpireTime,
          'cred': _0x49c9b1.s3
        };
        _0x2c8ffb.ajax({
          'type': "GET",
          'url': _0x5c5931,
          'data': _0x28b59,
          'dataType': "json"
        }).done(function (_0x4255c5) {
          _0x1450dc.poster = _0x4255c5;
          _0x1450dc.posterFetch = true;
          _0x203a19();
        }).fail(function (_0x36a5de, _0x6a5e86, _0x3d1bb4) {
          console.log(_0x36a5de, _0x6a5e86, _0x3d1bb4);
          _0x2c8ffb(_0x5ca0d3).trigger('getAwsPoster_error', {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc,
            'error': _0x3d1bb4
          });
        });
      }
      function _0x42cedb(_0x4a60c1) {
        var _0x140c4a = _0x49c9b1.sourcePath + "includes/aws/aws.php";
        var _0x5299f1 = {
          'object_key': _0x4a60c1.thumb,
          'bucket': _0x4a60c1.bucket,
          'action': "get_url_thumb",
          'region': _0x49c9b1.s3Region,
          'expire': _0x49c9b1.s3UrlExpireTime,
          'cred': _0x49c9b1.s3
        };
        _0x2c8ffb.ajax({
          'type': "GET",
          'url': _0x140c4a,
          'data': _0x5299f1,
          'dataType': 'json'
        }).done(function (_0x1c9ddb) {
          _0x27eae9[0x0].isrc.attr("src", _0x1c9ddb);
          _0x27eae9.shift();
          if (_0x27eae9.length) {
            _0x42cedb(_0x27eae9[0x0]);
          } else {
            _0x397002();
          }
        }).fail(function (_0xba3b46, _0x40cb1e, _0x3ad4fa) {
          console.log(_0xba3b46, _0x40cb1e, _0x3ad4fa);
          _0x2c8ffb(_0x5ca0d3).trigger("getAwsThumb_error", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc,
            'error': _0x3ad4fa
          });
          _0x27eae9.shift();
          if (_0x27eae9.length) {
            _0x42cedb(_0x27eae9[0x0]);
          } else {
            _0x397002();
          }
        });
      }
      function _0x1f4eb8() {
        _0x1085bb = false;
        if (_0x1450dc.type == "youtube_single") {
          _0x1450dc.type = 'youtube';
        } else {
          if (_0x1450dc.type == "vimeo_single") {
            _0x1450dc.type = 'vimeo';
          } else {
            _0xaad07c = _0x1450dc.type;
          }
        }
        _0xaad07c = _0x1450dc.type;
        if (_0x576097) {
          if (!_0x5ca0d3.isCastSupportedMedia()) {
            _0x3c1510.stopCasting();
            _0x576097 = false;
          }
        }
        var _0x34960c = ["audio", "video", "folder_video", "folder_audio"];
        if ((_0x34960c.indexOf(_0x1450dc.type) > -0x1 || _0x34960c.indexOf(_0x1450dc.origtype) > -0x1) && Array.isArray(_0x1450dc.path)) {
          _0x30fc93();
          if (_0x49c9b1.hideQualityMenuOnSingleQuality && _0x8a1273.length == 0x1) {} else {
            if (_0x8a1273.length) {
              _0x114191(_0x8a1273, _0x1450dc.quality);
            }
          }
        } else {
          _0x1667c6 = _0x1450dc.path;
        }
        if (_0x1667c6.indexOf("ebsfm:") != -0x1) {
          _0x1667c6 = MVPUtils.b64DecodeUnicode(_0x1667c6.substr(0x6));
        }
        _0x1450dc.mediaPath = _0x1667c6;
        if (_0xaad07c == 'hls') {
          _0xaad07c = "video";
          _0x225c56 = "hls";
        } else {
          if (_0xaad07c == "dash") {
            _0xaad07c = "video";
            _0x225c56 = "dash";
          } else {
            if (_0xaad07c == "s3_video") {
              _0xaad07c = "video";
            } else if (_0xaad07c == "s3_audio") {
              _0xaad07c = 'audio';
            }
          }
        }
        _0x153050 = false;
        if (!_0x395507 && !_0x1baffa) {
          if (_0xaad07c == 'audio') {
            if (_0x442e51 && !_0x49c9b1.displayPosterOnMobile) {} else {
              if (_0x1450dc.slideshowImages) {
                _0x153050 = true;
              } else if (_0x1450dc.poster) {
                _0x153050 = true;
              }
            }
          } else {
            if (_0xaad07c == "video" || _0xaad07c == "youtube" || _0xaad07c == "vimeo") {
              if (_0x1450dc.poster && !_0x49c9b1.autoPlayInViewport) {
                _0x153050 = true;
              }
            } else if (_0xaad07c == "custom" || _0xaad07c == 'custom_html') {
              if (_0x1450dc.poster) {
                _0x153050 = true;
              }
            }
          }
        } else if (_0xaad07c == "audio") {
          if (_0x1450dc.poster) {
            _0x153050 = true;
          }
        }
        if (_0x1450dc.aspectRatio != undefined) {
          _0x588042 = Number(_0x1450dc.aspectRatio);
        } else {
          _0x588042 = Number(_0x49c9b1.aspectRatio);
        }
        if (_0x1450dc.ageVerify && !_0x4f4426()) {
          _0x5e4d67();
        } else {
          _0x1f57c7();
        }
        if (_0x49c9b1.playerType == 'lightbox' && !_0x34e44f) {
          _0x34e44f = true;
          _0x14ff68.css('display', "block");
          _0x31d45c();
          if (_0x14ff68.css("opacity") != 0x1) {
            setTimeout(function () {
              clearTimeout(this);
              _0x14ff68.css("opacity", 0x1);
            }, 0x32);
          }
        }
        if (_0x49c9b1.scrollToPlayer && _0x49c9b1.playerType != "lightbox") {
          delete _0x49c9b1.scrollToPlayer;
          var _0x28d7a4 = _0x93b161.offset().top;
          _0x2c8ffb("html,body").animate({
            'scrollTop': _0x28d7a4
          }, 0x1f4);
        }
      }
      function _0x1f57c7() {
        if (_0x1450dc.pwd) {
          if (!_0x4d248d && _0x153050) {
            _0x203a19();
          } else {
            _0x2a430a.css("display", "block");
            setTimeout(function () {
              _0x2a430a.addClass("mvp-holder-visible");
            }, 0x14);
          }
        } else {
          if (_0x1450dc.lockTime == '0' && !_0x3d3884) {
            _0x45aac9('watch');
          } else {
            if (_0xaad07c == 'audio') {
              if (_0x153050) {
                _0x203a19();
              } else {
                _0x3a8faa();
              }
            } else {
              if (!_0x4d248d && _0x153050) {
                _0x203a19();
              } else {
                _0x3a8faa();
              }
            }
          }
        }
      }
      function _0x30fc93() {
        _0x8a1273 = [];
        var _0x3d5b56;
        var _0x32b65f = _0x1450dc.path.length;
        var _0x29da68;
        var _0x48cce1;
        if (_0x32b65f > 0x1) {
          _0x48cce1 = _0x1450dc.quality;
          if (_0x36b677 && _0x1450dc.qualityMobile) {
            _0x48cce1 = _0x1450dc.qualityMobile;
          }
        }
        if (!_0x48cce1) {
          _0x48cce1 = _0x1450dc.path[0x0].quality;
        }
        _0x1450dc.quality = _0x48cce1;
        for (_0x3d5b56 = 0x0; _0x3d5b56 < _0x32b65f; _0x3d5b56++) {
          _0x29da68 = _0x1450dc.path[_0x3d5b56];
          _0x8a1273.push(_0x29da68.quality);
          _0x4e1d5e: for (var _0xb7424d in _0x29da68) {
            if (_0x29da68[_0xb7424d] == _0x48cce1) {
              if (_0xaad07c == "audio") {
                if (_0x460122 && _0x29da68.wav) {
                  _0x1667c6 = _0x29da68.wav;
                } else {
                  if (_0x460122 && _0x29da68.ext == "wav") {
                    _0x1667c6 = _0x29da68.src;
                  } else {
                    if (_0x5383a4 && _0x29da68.mp3) {
                      _0x1667c6 = _0x29da68.mp3;
                    } else if (_0x5383a4 && _0x29da68.ext == "mp3") {
                      _0x1667c6 = _0x29da68.src;
                    }
                  }
                }
              } else {
                if (_0xaad07c == "video") {
                  if (_0x4ad22a && _0x29da68.mp4) {
                    _0x1667c6 = _0x29da68.mp4;
                  } else if (_0x4ad22a && _0x29da68.ext == 'mp4') {
                    _0x1667c6 = _0x29da68.src;
                  }
                }
              }
              break _0x4e1d5e;
            }
          }
        }
        if (_0x1667c6.indexOf("ebsfm:") != -0x1) {
          _0x1667c6 = MVPUtils.b64DecodeUnicode(_0x1667c6.substr(0x6));
        }
      }
      function _0x203a19() {
        if ((_0x1450dc.origtype == "s3_video" || _0x1450dc.origtype == "s3_audio") && _0x49c9b1.getPosterFromBucket && !_0x1450dc.posterFetch) {
          _0xebb7c6(_0x1450dc);
          return;
        }
        if (!_0x30f341) {
          _0x30f341 = _0x2c8ffb("<div class=\"mvp-poster-holder\"/>").appendTo(_0x139c5b);
        }
        if (_0xaad07c == "audio") {
          _0x4bdd56 = true;
          if (_0x1450dc.slideshowImages) {
            _0x30f341.empty().show();
            if (!_0x2060ea) {
              _0x2060ea = new MVPImageSlideshow({
                'holder': _0x30f341,
                'settings': _0x49c9b1,
                'media': _0x1450dc
              });
            }
            _0x2060ea.setData(_0x1450dc);
            if (!_0x4d248d) {
              _0x105ccb.show();
            } else {
              _0x3a8faa();
            }
          } else {
            _0x2c8ffb(new Image()).addClass("mvp-media").appendTo(_0x30f341.empty().show()).on("load", function () {
              _0x27da1e = _0x2c8ffb(this);
              MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x27da1e);
              _0x27da1e.addClass("mvp-visible");
              _0x27703d = true;
              if (!_0x49c9b1.displayPosterOnMobile) {
                if (!_0x4d248d) {
                  _0x105ccb.show();
                  if (_0x395507) {
                    _0x55a107.show();
                    setTimeout(function () {
                      _0x55a107.addClass("mvp-visible-fast");
                    }, 0x14);
                  }
                } else {
                  _0x3a8faa();
                }
              }
            }).on("error", function (_0x541feb) {
              console.log(_0x541feb);
            }).attr({
              'src': _0x1450dc.poster,
              'alt': _0x1450dc.title
            });
          }
        } else {
          if (_0xaad07c == "video" || _0xaad07c == "youtube" || _0xaad07c == "vimeo") {
            _0x2fc352.css("display", 'none').removeClass("mvp-player-controls-visible");
            _0x17ac30 = true;
            _0x4bdd56 = true;
            _0x2c8ffb(new Image()).addClass("mvp-media").appendTo(_0x30f341.empty().show()).on("load", function () {
              _0x27da1e = _0x2c8ffb(this);
              MVPAspectRatio.resizeMedia('image', _0x588042, _0x93b161, _0x27da1e);
              _0x27da1e.addClass("mvp-visible");
              _0x43db09.hide();
              _0x27703d = true;
              if (!_0x49c9b1.displayPosterOnMobile) {
                _0x105ccb.show();
                if (_0x395507) {
                  _0x55a107.show();
                  setTimeout(function () {
                    _0x55a107.addClass("mvp-visible-fast");
                  }, 0x14);
                }
              }
            }).on("error", function (_0x499266) {
              console.log(_0x499266);
            }).attr({
              'src': _0x1450dc.poster,
              'alt': _0x1450dc.title
            });
          } else if (_0xaad07c == "custom" || _0xaad07c == 'custom_html') {
            _0x2fc352.css('display', "none").removeClass("mvp-player-controls-visible");
            _0x17ac30 = true;
            _0x4bdd56 = true;
            _0x2c8ffb(new Image()).addClass('mvp-media').appendTo(_0x30f341.empty().show()).on("load", function () {
              _0x27da1e = _0x2c8ffb(this);
              MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x27da1e);
              _0x27da1e.addClass("mvp-visible");
              _0x43db09.hide();
              _0x27703d = true;
              _0x105ccb.show();
            }).on("error", function (_0x25f8ce) {
              console.log(_0x25f8ce);
            }).attr({
              'src': _0x1450dc.poster,
              'alt': _0x1450dc.title
            });
          }
        }
        if (_0x49c9b1.showControlsBeforeStart) {
          _0x5f10f7();
          if (_0x1450dc.duration) {
            if (!_0x395507) {
              if (!_0x2cec26) {
                if (_0x49c9b1.createAdMarkers && _0x420869.length) {
                  if (!_0x53e109) {
                    _0x152e7e(_0x1450dc.duration);
                  }
                  _0x3cdaec(_0x1450dc.duration);
                  _0x2cec26 = true;
                }
              }
              _0xc5351f.html(MVPUtils.formatTime(_0x1450dc.duration));
              _0x2cba97(_0x1450dc.playbackRate || 0x1);
              var _0x4de07f = setInterval(function () {
                if (_0x2c4751 && _0x5e7bb7 && _0x59f04a) {
                  clearInterval(_0x4de07f);
                  _0x2fc352.css("display", "block");
                  _0x2fc352.one("transitionend", function () {
                    _0x17ac30 = false;
                  }).addClass("mvp-player-controls-visible");
                  if (_0x126d5c) {
                    _0x24730b.addClass("mvp-holder-visible");
                  }
                }
              }, 0x64);
            }
          }
        }
      }
      function _0x3078fd() {
        if (!_0x30f341) {
          _0x30f341 = _0x2c8ffb("<div class=\"mvp-poster-holder\"/>").appendTo(_0x139c5b);
        }
        _0x2c8ffb(new Image()).addClass("mvp-media").appendTo(_0x30f341.empty().show()).on("load", function () {
          _0x27da1e = _0x2c8ffb(this);
          _0x27da1e.addClass("mvp-visible");
        }).on("error", function (_0x5d70bd) {
          console.log(_0x5d70bd);
        }).attr({
          'src': _0x1450dc.poster,
          'alt': _0x1450dc.title
        });
      }
      function _0x3a8faa() {
        if (_0xaad07c != "audio") {
          if ((_0x27da1e || _0x1450dc.slideshowImages) && !_0x1a96c8) {
            _0x30f341.hide();
            _0x105ccb.hide();
            _0x43db09.show();
          }
        }
        if (_0x1450dc.is360) {
          if (typeof THREE === "undefined") {
            var _0x36f406 = document.createElement("script");
            _0x36f406.type = "text/javascript";
            if (!MVPUtils.relativePath(_0x49c9b1.three_js)) {
              var _0x444ad7 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.three_js);
            } else {
              var _0x444ad7 = _0x49c9b1.three_js;
            }
            _0x36f406.src = _0x444ad7;
            _0x36f406.onload = _0x36f406.onreadystatechange = function () {
              if (!this.readyState || this.readyState == "complete") {
                if (typeof THREE.OrbitControls === "undefined") {
                  var _0x5a1ae7 = document.createElement("script");
                  _0x5a1ae7.type = "text/javascript";
                  if (!MVPUtils.relativePath(_0x49c9b1.orbitControls_js)) {
                    var _0x2772ae = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.orbitControls_js);
                  } else {
                    var _0x2772ae = _0x49c9b1.orbitControls_js;
                  }
                  _0x5a1ae7.src = _0x2772ae;
                  _0x5a1ae7.onload = _0x5a1ae7.onreadystatechange = function () {
                    if (!this.readyState || this.readyState == "complete") {
                      _0x3a8faa();
                    }
                  };
                  _0x5a1ae7.onerror = function () {
                    console.log("Error loading " + this.src);
                  };
                  var _0x1d8684 = document.getElementsByTagName("script")[0x0];
                  _0x1d8684.parentNode.insertBefore(_0x5a1ae7, _0x1d8684);
                } else {
                  _0x3a8faa();
                }
              }
            };
            _0x36f406.onerror = function () {
              console.log("Error loading " + this.src);
            };
            var _0x44134e = document.getElementsByTagName('script')[0x0];
            _0x44134e.parentNode.insertBefore(_0x36f406, _0x44134e);
            return;
          } else {
            if (typeof THREE.OrbitControls === "undefined") {
              var _0xb1a452 = document.createElement("script");
              _0xb1a452.type = "text/javascript";
              if (!MVPUtils.relativePath(_0x49c9b1.orbitControls_js)) {
                var _0x444ad7 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.orbitControls_js);
              } else {
                var _0x444ad7 = _0x49c9b1.orbitControls_js;
              }
              _0xb1a452.src = _0x444ad7;
              _0xb1a452.onload = _0xb1a452.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "complete") {
                  _0x3a8faa();
                }
              };
              _0xb1a452.onerror = function () {
                console.log("Error loading " + this.src);
              };
              var _0x4f61ac = document.getElementsByTagName('script')[0x0];
              _0x4f61ac.parentNode.insertBefore(_0xb1a452, _0x4f61ac);
              return;
            }
          }
        }
        if (_0x225c56 == "hls") {
          if (!_0x150a20) {
            if (typeof Hls === "undefined") {
              var _0x36f406 = document.createElement("script");
              _0x36f406.type = "text/javascript";
              if (!MVPUtils.relativePath(_0x49c9b1.hls_js)) {
                var _0x444ad7 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.hls_js);
              } else {
                var _0x444ad7 = _0x49c9b1.hls_js;
              }
              _0x36f406.src = _0x444ad7;
              _0x36f406.onload = _0x36f406.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "complete") {
                  _0x3a3968();
                  _0x3a8faa();
                }
              };
              _0x36f406.onerror = function () {
                console.log("Error loading " + this.src);
              };
              var _0x44134e = document.getElementsByTagName('script')[0x0];
              _0x44134e.parentNode.insertBefore(_0x36f406, _0x44134e);
            } else {
              _0x3a3968();
              _0x3a8faa();
            }
            return;
          }
        }
        if (_0x225c56 == "dash") {
          if (!_0x24e723) {
            if (typeof dashjs === 'undefined') {
              var _0x36f406 = document.createElement("script");
              _0x36f406.type = 'text/javascript';
              if (!MVPUtils.relativePath(_0x49c9b1.dash_js)) {
                var _0x444ad7 = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.dash_js);
              } else {
                var _0x444ad7 = _0x49c9b1.dash_js;
              }
              _0x36f406.src = _0x444ad7;
              _0x36f406.onload = _0x36f406.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "complete") {
                  _0x32100e();
                  _0x3a8faa();
                }
              };
              _0x36f406.onerror = function () {
                console.log("Error loading " + this.src);
              };
              var _0x44134e = document.getElementsByTagName("script")[0x0];
              _0x44134e.parentNode.insertBefore(_0x36f406, _0x44134e);
            } else {
              _0x32100e();
              _0x3a8faa();
            }
            return;
          }
        } else {
          if (_0xaad07c == "audio") {
            if (_0x442e51 && !_0x49c9b1.displayPosterOnMobile) {
              if (typeof MVPAudioEqualizer === 'undefined') {
                if (!_0x5cecc4) {
                  _0x5cecc4 = _0x2c8ffb("<canvas class=\"mvp-canvas-audio mvp-media\"/>").prependTo(_0x139c5b);
                }
                var _0x36f406 = document.createElement("script");
                _0x36f406.type = 'text/javascript';
                _0x36f406.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.equalizer_js) + '?=' + Math.random();
                _0x36f406.onload = _0x36f406.onreadystatechange = function () {
                  if (!this.readyState || this.readyState == "complete") {
                    _0xb8e3f0 = new MVPAudioEqualizer({
                      'holder': _0x139c5b,
                      'canvas': _0x5cecc4[0x0]
                    });
                    _0x3a8faa();
                  }
                };
                _0x36f406.onerror = function () {
                  console.log("Error loading " + this.src);
                };
                var _0x44134e = document.getElementsByTagName("script")[0x0];
                _0x44134e.parentNode.insertBefore(_0x36f406, _0x44134e);
                return;
              }
            }
          }
        }
        if (_0x4bdd56) {
          _0x4b8613 = _0x1450dc.start || 0x0;
          _0x4bdd56 = false;
        }
        if (_0x1baffa && !_0x395507) {
          _0x4b8613 = _0x1baffa;
          _0x1baffa = null;
        }
        if (_0x49c9b1.playbackPositionTime != undefined && !_0x395507) {
          _0x4b8613 = _0x49c9b1.playbackPositionTime;
          delete _0x49c9b1.playbackPositionTime;
          _0x43db09.hide();
          if (_0x55db69) {
            _0x21ff2c(false);
          } else {
            _0x21ff2c();
            return;
          }
        }
        if (_0xaad07c == "audio" || _0xaad07c == 'video' || _0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == "chromeless" && _0x4d248d && _0x5839b0 || _0xaad07c == 'vimeo' && _0x4f5c87 == "chromeless" && _0x4d248d && _0x5b30dc) {
          _0x43db09.show();
        }
        if (_0xaad07c == "audio") {
          if (!_0x14af6d) {
            _0x30e28d = _0x2c8ffb(document.createElement('audio')).attr("preload", _0x49c9b1.preload);
            _0x143642 = _0x30e28d[0x0];
            _0x14af6d = true;
          }
          _0x4a6fa4 = false;
          _0x143642.src = _0x1667c6;
          _0x30e28d.on("ended", function () {
            _0x2af768();
          }).on('loadedmetadata', function () {
            setTimeout(function () {
              if (!_0x4a6fa4) {
                _0x30e28d.trigger('canplay');
              }
            }, 0x64);
          }).on('canplay', function () {
            if (!_0x4a6fa4) {
              _0x4a6fa4 = true;
              _0x50f193();
              if (_0x1450dc.playbackRate) {
                _0x143642.playbackRate = Number(_0x1450dc.playbackRate);
              }
              _0x2cba97(_0x143642.playbackRate);
              if (_0x4b8613) {
                _0x143642.currentTime = _0x4b8613;
              } else {
                if (_0x1450dc.start) {
                  _0x143642.currentTime = _0x1450dc.start;
                }
              }
              if (_0x2aa1b2 && !_0x3d30f6) {
                _0x43db09.hide();
                _0x3c0bec();
              } else {
                if (_0x4d248d || _0x4b8613 != null) {
                  var _0x33df4f = _0x143642.play();
                  if (_0x33df4f !== undefined) {
                    _0x33df4f.then(function () {})["catch"](function (_0x556584) {
                      _0x105ccb.show();
                      _0x43db09.hide();
                    });
                  }
                } else {
                  _0x105ccb.show();
                  _0x43db09.hide();
                }
              }
              if (_0x395507) {
                _0x55a107.show();
                setTimeout(function () {
                  _0x55a107.addClass("mvp-visible-fast");
                }, 0x14);
              }
              _0x4b8613 = null;
              if (_0x49c9b1.autoPlayInViewport && !_0x511fa7) {
                _0x70f010();
              }
            } else if (_0x49c9b1.resumeTime) {
              _0x143642.currentTime = _0x49c9b1.resumeTime;
              _0x49c9b1.resumeTime = null;
            }
          }).on("play", function () {
            _0x148530();
          }).on('pause', function () {
            _0x1fcacb();
          }).on("ratechange", function () {
            _0x2cba97(_0x143642.playbackRate);
          }).on("error", function (_0x5f28e6) {
            console.log(_0x5f28e6);
            _0x2c8ffb(_0x5ca0d3).trigger('mediaError', {
              'instance': _0x5ca0d3,
              'instanceName': _0x49c9b1.instanceName,
              'media': _0x1450dc
            });
            if (_0x1450dc.origtype == "s3_audio" && _0x143642.error && _0x143642.error.message && _0x143642.error.message.indexOf("PIPELINE_ERROR_READ") > -0x1) {
              if (_0x143642.currentTime) {
                _0x49c9b1.resumeTime = _0x143642.currentTime;
              }
              _0x58770e(_0x1450dc);
            }
          });
          if (_0x4d248d) {
            _0x143642.load();
          }
        } else {
          if (_0xaad07c == 'video') {
            if (_0x1450dc.posterFrameTime) {
              _0x1667c6 += "#t=" + _0x1450dc.posterFrameTime;
            }
            _0x5ab3f4 = false;
            if (!_0x305a54) {
              if (!_0x395d2f) {
                _0x395d2f = _0x2c8ffb("<div class=\"mvp-video-holder\"/>").prependTo(_0x139c5b);
              }
              var _0x274fc5 = " playsinline";
              if (_0x49c9b1.useMobileNativePlayer) {
                _0x274fc5 = '';
              }
              var _0x285e99 = '';
              if (_0x49c9b1.useAirPlay) {
                _0x285e99 = "x-webkit-airplay=\"allow\"";
              }
              var _0x1d83c1 = _0x49c9b1.disableRemotePlayback || '';
              var _0x51045f = "<video class=\"mvp-media\" crossorigin=\"anonymous\" " + _0x1d83c1 + " " + _0x285e99 + " preload=\"" + _0x49c9b1.preload + "\"" + _0x274fc5 + '>';
              _0x51045f += "</video>";
              _0x395d2f.html(_0x51045f);
            }
            _0x305a54 = true;
            _0x5ac143 = _0x395d2f.find(".mvp-media");
            _0x326462 = _0x5ac143[0x0];
            if (!_0x1450dc.is360) {
              _0x395d2f.show();
            } else {
              _0x395d2f.hide();
            }
            if (_0x5ee613 && _0x1450dc.is360) {
              if (window.location.protocol == "file:") {
                console.log("Playing 360 videos requires online server connection!");
              }
              if (_0x1450dc.vrMode == 'monoscopic') {
                if (!_0x395fdc) {
                  _0x395fdc = true;
                  _0x5a34d3 = new THREE.WebGLRenderer({
                    'antialias': true
                  });
                  _0x5a34d3.setPixelRatio(window.devicePixelRatio);
                  _0x5a34d3.setSize(0x280, 0x168);
                  _0x5a34d3.domElement.className += "mvp-canvas-video mvp-canvas-video-m mvp-media";
                  _0x139c5b.prepend(_0x2c8ffb(_0x5a34d3.domElement));
                  _0x1e5081 = _0x139c5b.find(".mvp-canvas-video-m");
                  _0x58a9f1 = new THREE.Texture(_0x326462);
                  _0x63d6ae = new THREE.Scene();
                  var _0x17eb29 = new THREE.SphereGeometry(0x1f4, 0x3c, 0x28);
                  _0x17eb29.scale(-0x1, 0x1, 0x1);
                  var _0x50d76a = new THREE.MeshBasicMaterial({
                    'map': _0x58a9f1
                  });
                  var _0x54843 = new THREE.Mesh(_0x17eb29, _0x50d76a);
                  _0x63d6ae.add(_0x54843);
                  if (!_0x12a6ec) {
                    _0x12a6ec = true;
                    _0x5438f1 = new THREE.PerspectiveCamera(0x4b, 1.7777777777777777, 0x1, 0x44c);
                    _0x5438f1.position.x = _0x5438f1.position.x + 0.1;
                    if (!_0x1a12a5 && _0x36b677 && _0x1450dc.vrModeOrig == "stereoscopic" && _0x49c9b1.enablePerspectiveWhenVrNotAvailable) {
                      if (typeof THREE.DeviceOrientationControls !== "function") {
                        _0x1717e3 = new THREE.DeviceOrientationControls(_0x5438f1);
                      } else {
                        alert("DeviceOrientationControls missing");
                      }
                    }
                  }
                  if (!_0x5e604f) {
                    _0x5e604f = true;
                    _0x1b0251 = new THREE.OrbitControls(_0x5438f1, _0x139c5b[0x0]);
                    _0x1b0251.enableZoom = false;
                    _0x1b0251.enableKeys = false;
                  }
                }
              } else {
                if (_0x1450dc.vrMode == "stereoscopic") {
                  if (!_0x65bc27) {
                    _0x65bc27 = true;
                    _0x54d105 = new THREE.WebGLRenderer({
                      'antialias': true
                    });
                    _0x54d105.setPixelRatio(window.devicePixelRatio);
                    _0x54d105.setSize(0x280, 0x168);
                    _0x54d105.xr.enabled = true;
                    _0x54d105.xr.setReferenceSpaceType("local");
                    _0x54d105.domElement.className += "mvp-canvas-video mvp-canvas-video-s mvp-media";
                    _0x139c5b.prepend(_0x2c8ffb(_0x54d105.domElement));
                    _0x45dc47 = _0x139c5b.find(".mvp-canvas-video-s");
                    _0x1ced73 = new THREE.Texture(_0x326462);
                    _0x2f9a71 = new THREE.Scene();
                    var _0x17eb29 = new THREE.SphereGeometry(0x1f4, 0x3c, 0x28);
                    _0x17eb29.scale(-0x1, 0x1, 0x1);
                    const _0x1ab84d = _0x17eb29.attributes.uv.array;
                    for (let _0x4391f6 = 0x0; _0x4391f6 < _0x1ab84d.length; _0x4391f6 += 0x2) {
                      _0x1ab84d[_0x4391f6] *= 0.5;
                    }
                    var _0x50d76a = new THREE.MeshBasicMaterial({
                      'map': _0x1ced73
                    });
                    var _0x54843 = new THREE.Mesh(_0x17eb29, _0x50d76a);
                    _0x54843.rotation.y = -Math.PI / 0x2;
                    _0x54843.layers.set(0x1);
                    _0x2f9a71.add(_0x54843);
                    var _0x65be9c = new THREE.SphereGeometry(0x1f4, 0x3c, 0x28);
                    _0x65be9c.scale(-0x1, 0x1, 0x1);
                    const _0x326da8 = _0x65be9c.attributes.uv.array;
                    for (let _0xb84947 = 0x0; _0xb84947 < _0x326da8.length; _0xb84947 += 0x2) {
                      _0x326da8[_0xb84947] *= 0.5;
                      _0x326da8[_0xb84947] += 0.5;
                    }
                    var _0x4855c5 = new THREE.MeshBasicMaterial({
                      'map': _0x1ced73
                    });
                    const _0x54e0b9 = new THREE.Mesh(_0x65be9c, _0x4855c5);
                    _0x54e0b9.rotation.y = -Math.PI / 0x2;
                    _0x54e0b9.layers.set(0x2);
                    _0x2f9a71.add(_0x54e0b9);
                    if (!_0x247878) {
                      _0x247878 = true;
                      _0x57d2e3 = new THREE.PerspectiveCamera(0x46, 1.7777777777777777, 0x1, 0x7d0);
                      _0x57d2e3.layers.enable(0x1);
                      if (typeof THREE.DeviceOrientationControls !== "function") {
                        _0x1717e3 = new THREE.DeviceOrientationControls(_0x57d2e3);
                      } else {
                        alert("DeviceOrientationControls missing");
                      }
                    }
                  }
                }
              }
            }
            _0x5ac143.on("ended", function () {
              _0x2af768();
            }).on("loadedmetadata", function () {
              setTimeout(function () {
                if (!_0x5ab3f4) {
                  _0x5ac143.trigger("canplay");
                }
              }, 0x64);
            }).on('canplay', function () {
              if (!_0x5ab3f4) {
                _0x5ab3f4 = true;
                if (_0x49c9b1.selectorInit && !_0x5777b3) {
                  _0x1ac3d7 = _0x41a8e7;
                  _0x5777b3 = true;
                }
                _0x50f193();
                if (_0x5ee613 && _0x1450dc.is360) {} else {
                  MVPAspectRatio.resizeMedia("video", _0x588042, _0x93b161, _0x5ac143);
                }
                if (_0x1450dc.playbackRate) {
                  _0x326462.playbackRate = Number(_0x1450dc.playbackRate);
                }
                _0x2cba97(_0x326462.playbackRate);
                if (_0x4b8613) {
                  _0x326462.currentTime = _0x4b8613;
                } else {
                  if (_0x1450dc.start) {
                    _0x326462.currentTime = _0x1450dc.start;
                  }
                }
                if (!_0x576097) {
                  if (_0x2aa1b2) {
                    _0x43db09.hide();
                    if (_0x4d248d) {
                      _0x3c0bec();
                    } else if (!_0x1450dc.poster) {
                      _0x5ac143.addClass("mvp-visible");
                      _0x105ccb.show();
                    } else {
                      _0x3c0bec();
                    }
                  } else {
                    if (_0x4d248d || _0x4b8613 != null) {
                      var _0x1cf3b2 = _0x326462.play();
                      if (_0x1cf3b2 !== undefined) {
                        _0x1cf3b2.then(function () {})["catch"](function (_0x3e51d3) {
                          _0x105ccb.show();
                          _0x43db09.hide();
                        });
                      }
                    } else {
                      _0x105ccb.show();
                      _0x43db09.hide();
                    }
                  }
                } else {
                  if (_0x27da1e) {
                    _0x30f341.show();
                    setTimeout(function () {
                      _0x27da1e.addClass("mvp-visible");
                    }, 0x14);
                  } else if (_0x153050) {
                    _0x3078fd();
                  }
                  _0x1a96c8 = true;
                }
                if (_0x395507) {
                  _0x55a107.show();
                  setTimeout(function () {
                    _0x55a107.addClass("mvp-visible-fast");
                  }, 0x14);
                }
                _0x4b8613 = null;
                if (_0x49c9b1.autoPlayInViewport && !_0x511fa7) {
                  _0x70f010();
                }
                if (_0x31e808 || _0x326462.webkitSupportsPresentationMode && typeof _0x326462.webkitSetPresentationMode === 'function') {
                  _0xc54ce2.show();
                }
                if (_0xfaf57a) {
                  _0x186eb3();
                }
                var _0x448058;
                if (window.WebKitPlaybackTargetAvailabilityEvent) {
                  _0x326462.addEventListener("webkitplaybacktargetavailabilitychanged", function (_0x2adc22) {
                    switch (_0x2adc22.availability) {
                      case 'available':
                        _0x591853.show();
                        _0x448058 = true;
                        break;
                      case "not-available":
                        _0x591853.hide();
                        break;
                    }
                  });
                }
              } else if (_0x49c9b1.resumeTime) {
                _0x326462.currentTime = _0x49c9b1.resumeTime;
                _0x49c9b1.resumeTime = null;
              }
            }).on("canplaythrough", function () {
              if (!_0x2aa1b2) {
                _0x5ac143.addClass("mvp-visible");
              }
              MVPAspectRatio.resizeMedia("video", _0x588042, _0x93b161, _0x5ac143);
            }).on("waiting", function () {
              if (_0x225c56 == "hls" || _0x225c56 == "dash") {} else {}
            }).on("playing", function () {
              _0x43db09.hide();
            }).on("play", function () {
              _0x148530();
            }).on("pause", function () {
              if (!(_0x326462.currentTime >= _0x326462.duration)) {
                _0x1fcacb();
              }
            }).on("seeking", function () {
              if (_0x1f950b) {
                _0x43db09.show();
              }
            }).on("seeked", function () {
              _0x43db09.hide();
              if (_0x5ee613 && _0x1450dc.is360) {
                _0x136c1a = true;
              }
            }).on('ratechange', function () {
              _0x2cba97(_0x326462.playbackRate);
            }).on("error", function (_0x4ca0bd) {
              if (_0x1450dc.origtype == "s3_video") {
                if (_0x326462.currentTime) {
                  _0x49c9b1.resumeTime = _0x326462.currentTime;
                }
                if (!_0x1a96c8) {
                  _0x5ab3f4 = false;
                }
                _0x58770e(_0x1450dc);
              }
              switch (_0x4ca0bd.target.error.code) {
                case _0x4ca0bd.target.error.MEDIA_ERR_ABORTED:
                  console.log("You aborted the video playback.");
                  break;
                case _0x4ca0bd.target.error.MEDIA_ERR_NETWORK:
                  console.log("A network error caused the video download to fail part-way.");
                  break;
                case _0x4ca0bd.target.error.MEDIA_ERR_DECODE:
                  console.log("The video playback was aborted due to a corruption problem or because the video used features your browser did not support.");
                  break;
                case _0x4ca0bd.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
                  console.log("The video could not be loaded, either because the server or network failed or because the format is not supported.");
                  break;
                default:
                  console.log("An unknown error occurred.");
                  break;
              }
            });
            if (_0x225c56 == "hls") {
              if (_0x253f76) {
                _0x25274f.attachMedia(_0x326462);
              } else {
                if (_0x326462.canPlayType("application/vnd.apple.mpegurl") == "true") {
                  _0x326462.src = _0x1667c6;
                } else {
                  if (_0x1450dc.mp4) {
                    _0x326462.src = _0x1450dc.mp4;
                    _0x326462.load();
                  } else {
                    try {
                      _0x326462.src = _0x1667c6;
                      _0x326462.load();
                    } catch (_0x15d221) {
                      alert("This browser or device does not support HLS extension. Please use mp4 video for playback!");
                    }
                  }
                }
              }
            } else if (_0x225c56 == 'dash') {
              if (_0x52ee22) {
                if (!_0x597437) {
                  _0x19a052.initialize(_0x326462, _0x1667c6, _0x4d248d);
                  _0x597437 = true;
                } else {
                  _0x19a052.attachSource(_0x1667c6);
                }
              } else if (_0x1450dc.mp4) {
                _0x326462.src = _0x1450dc.mp4;
                _0x326462.load();
              } else {
                alert("This browser or device does not support MPEG-DASH extension. Please use mp4 video for playback!");
              }
            } else {
              _0x326462.src = _0x1667c6;
              _0x326462.load();
            }
          } else {
            if (_0xaad07c == "image") {
              if (!_0x137aae) {
                _0x137aae = _0x2c8ffb("<div class=\"mvp-image-holder\"/>").prependTo(_0x139c5b).hide();
              }
              if (_0x1450dc.is360) {
                if (window.location.protocol == "file:") {
                  console.log("Playing 360 video and images requires online server connection!");
                }
                if (!_0x3fc13f) {
                  _0x5b8150 = new THREE.Scene();
                  var _0x3fed35 = new THREE.SphereBufferGeometry(0x1f4, 0x3c, 0x28);
                  _0x3fed35.scale(-0x1, 0x1, 0x1);
                  _0x27a4c3 = new THREE.TextureLoader();
                  _0x5e4188 = new THREE.MeshBasicMaterial({
                    'map': _0x27a4c3
                  });
                  _0x10eb38 = new THREE.Mesh(_0x3fed35, _0x5e4188);
                  _0x5b8150.add(_0x10eb38);
                  _0x1dd13b = new THREE.WebGLRenderer();
                  _0x1dd13b.setPixelRatio(window.devicePixelRatio);
                  _0x1dd13b.setSize(0x280, 0x168);
                  _0x1dd13b.domElement.className += "mvp-canvas-image mvp-media";
                  _0x139c5b.prepend(_0x2c8ffb(_0x1dd13b.domElement));
                  _0x42fcc0 = _0x139c5b.find(".mvp-canvas-image");
                  if (!_0x12a6ec) {
                    _0x12a6ec = true;
                    _0x5438f1 = new THREE.PerspectiveCamera(0x5a, 1.7777777777777777, 0.1, 0x2710);
                    _0x5438f1.position.x = _0x5438f1.position.x + 0.1;
                  }
                  if (!_0x5e604f) {
                    _0x5e604f = true;
                    _0x1b0251 = new THREE.OrbitControls(_0x5438f1, _0x139c5b[0x0]);
                    _0x1b0251.enableZoom = false;
                    _0x1b0251.enableKeys = false;
                  }
                  _0x3fc13f = true;
                }
                _0x27a4c3.load(_0x1667c6, function (_0x32fcfe) {
                  _0x42fcc0.show();
                  _0x42fcc0.addClass("mvp-visible");
                  _0x5e4188.map = _0x32fcfe;
                  var _0x16eb46 = _0x139c5b.width();
                  var _0x29119d = _0x139c5b.height();
                  _0x1dd13b.setSize(_0x16eb46, _0x29119d);
                  _0x5438f1.aspect = _0x16eb46 / _0x29119d;
                  _0x5438f1.updateProjectionMatrix();
                  _0x1b0251.addEventListener('change', _0x5b2753);
                  _0x1dd13b.render(_0x5b8150, _0x5438f1);
                  _0x1a96c8 = true;
                  _0x1f950b = true;
                  if (_0x49c9b1.autoRotatePanorama) {
                    _0x1b0251.autoRotate = true;
                    _0x1b0251.autoRotateSpeed = _0x49c9b1.autoRotateSpeed;
                    _0x136c1a = true;
                    if (_0x15885c) {
                      cancelAnimationFrame(_0x15885c);
                    }
                    _0x15885c = requestAnimationFrame(_0x58cb39);
                  }
                  if (_0x4b9c93) {
                    setTimeout(function () {
                      _0x4b9c93.show(0x12c);
                      _0x3b71ee = true;
                    }, 0x3e8);
                  }
                  _0x428281 = true;
                  if (_0x1450dc.duration) {
                    _0x195faa = new Date().getTime();
                    _0x3861a2 = _0x1450dc.duration * 0x3e8;
                    if (_0xa5b163) {
                      clearTimeout(_0xa5b163);
                    }
                    _0xa5b163 = setTimeout(function () {
                      clearTimeout(this);
                      if (!_0x31c70b && !_0x4204d7) {
                        _0x2af768();
                      }
                    }, _0x3861a2);
                  }
                }, function (_0x4a3d19) {}, function (_0x153173) {});
              } else {
                _0x43db09.show();
                _0x2c8ffb(new Image()).addClass("mvp-media").prependTo(_0x137aae.show()).on("load", function () {
                  _0x43db09.hide();
                  _0x50fbba = _0x2c8ffb(this);
                  MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x50fbba);
                  _0x50fbba.addClass('mvp-visible');
                  _0x1a96c8 = true;
                  _0x1f950b = true;
                  if (_0x1450dc.duration) {
                    _0x195faa = new Date().getTime();
                    _0x3861a2 = _0x1450dc.duration * 0x3e8;
                    if (_0xa5b163) {
                      clearTimeout(_0xa5b163);
                    }
                    _0xa5b163 = setTimeout(function () {
                      clearTimeout(this);
                      if (!_0x31c70b && !_0x4204d7) {
                        _0x2af768();
                      }
                    }, _0x3861a2);
                  }
                }).on("error", function (_0x4fbf0c) {
                  console.log(_0x4fbf0c);
                }).attr({
                  'src': _0x1667c6,
                  'alt': _0x1667c6
                });
              }
              if (_0x395507) {
                if (_0x1450dc.duration) {
                  _0x777f09.show();
                  setTimeout(function () {
                    _0x777f09.addClass("mvp-visible-fast");
                  }, 0x14);
                  _0x3911a2 = _0x184401.width();
                  _0x55a107.find(".mvp-volume-toggle").hide();
                  _0x55a107.show();
                  setTimeout(function () {
                    _0x55a107.addClass("mvp-visible-fast");
                  }, 0x14);
                  if (_0xca3476) {
                    clearInterval(_0xca3476);
                    _0xca3476 = null;
                  }
                  _0xca3476 = setInterval(_0x150da0, 0x1f4);
                }
              } else {
                _0x2fc352.css('display', "block");
                if (_0x4f5c86) {
                  clearTimeout(_0x4f5c86);
                }
                _0x33d37e();
              }
            } else {
              if (_0xaad07c == "youtube") {
                if (!_0x51f1e6) {
                  var _0x1ae4c7 = 'ytplayer' + Math.floor(Math.random() * 0xffffff);
                  _0x40f633 = _0x2c8ffb("<div class=\"mvp-youtube-holder\"><div id=\"" + _0x1ae4c7 + "\" class=\"mvp-media mvp-emiframe\"></div></div>").css('display', 'block').prependTo(_0x139c5b);
                  var _0x5814ef = {
                    'height': "100%",
                    'width': "100%",
                    'playerVars': {
                      'controls': _0x49c9b1.youtubePlayerType == 'chromeless' ? 0x0 : 0x1,
                      'modestbranding': 0x1,
                      'playsinline': _0x49c9b1.useMobileNativePlayer ? 0x0 : 0x1,
                      'rel': 0x0,
                      'wmode': "transparent",
                      'iv_load_policy': 0x3,
                      'cc_load_policy': 0x0,
                      'showinfo': 0x0,
                      'disablekb': 0x1,
                      'color': _0x49c9b1.youtubePlayerColor
                    },
                    'videoId': _0x1667c6,
                    'events': {
                      'onReady': _0x3b4534,
                      'onPlaybackQualityChange': _0x37e813,
                      'onPlaybackRateChange': _0x568348,
                      'onStateChange': _0x557966,
                      'onError': _0x112be6
                    }
                  };
                  var _0x9046ef = window.location.href.split('/');
                  var _0x199749 = _0x9046ef[0x0] + '//' + _0x9046ef[0x2];
                  if (/^http/.test(_0x199749)) {
                    _0x5814ef.playerVars.origin = _0x199749;
                  }
                  if (_0x4b8613) {
                    _0x5814ef.playerVars.start = _0x4b8613;
                  } else {
                    if (_0x1450dc.start) {
                      _0x5814ef.playerVars.start = parseInt(_0x1450dc.start, 0xa);
                    }
                  }
                  if (_0x1450dc.end) {
                    _0x5814ef.playerVars.end = parseInt(_0x1450dc.end, 0xa);
                  }
                  if (!window.YT) {
                    var _0x44134e = document.createElement("script");
                    _0x44134e.src = _0x49c9b1.youtube_js;
                    var _0x213a90 = document.getElementsByTagName("script")[0x0];
                    _0x213a90.parentNode.insertBefore(_0x44134e, _0x213a90);
                  }
                  var _0x4b02f4 = setInterval(function () {
                    if (window.YT && window.YT.Player) {
                      if (_0x4b02f4) {
                        clearInterval(_0x4b02f4);
                      }
                      _0x589fef = new YT.Player(_0x1ae4c7, _0x5814ef);
                    }
                  }, 0x64);
                  _0x51f1e6 = true;
                } else {
                  if (_0x1a0066) {
                    var _0x2e4b7f = 0x0;
                    if (_0x4b8613) {
                      _0x2e4b7f = _0x4b8613;
                    } else {
                      if (_0x1450dc.start) {
                        _0x2e4b7f = _0x1450dc.start;
                      }
                    }
                    if (_0x4d248d) {
                      _0x589fef.loadVideoById({
                        'videoId': _0x1667c6,
                        'startSeconds': _0x2e4b7f,
                        'endSeconds': _0x1450dc.end
                      });
                    } else {
                      _0x589fef.cueVideoById({
                        'videoId': _0x1667c6,
                        'startSeconds': _0x2e4b7f,
                        'endSeconds': _0x1450dc.end
                      });
                    }
                  }
                }
                _0x40f633.show();
                if (_0x588042 == 0x2 && _0x1450dc.width && _0x1450dc.height) {
                  _0x44abc3.sw = _0x1450dc.width;
                  _0x44abc3.sh = _0x1450dc.height;
                  MVPAspectRatio.resizeMedia("iframe", _0x588042, _0x40f633, _0x44abc3);
                }
              } else {
                if (_0xaad07c == "vimeo") {
                  if (_0x49c9b1.vimeoPlayerType == "chromeless") {
                    if (_0x1450dc.userAccount) {
                      if (_0x1450dc.userAccount == "basic") {
                        _0x4f5c87 = "default";
                      } else {
                        _0x4f5c87 = "chromeless";
                      }
                    } else {
                      _0x4f5c87 = "chromeless";
                    }
                  } else {
                    _0x4f5c87 = "default";
                  }
                  if (_0x4f5c87 == "default") {
                    if (!_0x4a0ad6) {
                      if (!_0x37c5c2) {
                        _0x37c5c2 = _0x2c8ffb("<div class=\"mvp-vimeo-holder-default\"/>").prependTo(_0x139c5b);
                      }
                      _0x3e4b12 = _0x3c019f('0');
                      _0x37c5c2.show().append(_0x3e4b12);
                      _0x404808 = _0x37c5c2;
                      _0xaa9921 = _0x3e4b12;
                      if (!window.Vimeo) {
                        var _0x44134e = document.createElement("script");
                        _0x44134e.src = _0x49c9b1.vimeo_js;
                        var _0x213a90 = document.getElementsByTagName("script")[0x0];
                        _0x213a90.parentNode.insertBefore(_0x44134e, _0x213a90);
                      }
                      var _0x4b02f4 = setInterval(function () {
                        if (window.Vimeo) {
                          if (_0x4b02f4) {
                            clearInterval(_0x4b02f4);
                          }
                          _0x1a10e0 = new Vimeo.Player(_0x3e4b12[0x0]);
                          _0x24e760 = _0x1a10e0;
                          _0x24e760.on("loaded", _0x2a7ad9);
                          _0x24e760.on('play', _0x161e14);
                          _0x24e760.on('pause', _0x161905);
                          _0x24e760.on('ended', _0x15011c);
                          _0x24e760.on("error", _0x2d2faa);
                          if (_0x49c9b1.rememberPlaybackPosition) {
                            _0x24e760.on("timeupdate", _0x2f9fc7);
                          }
                          _0x2f1036 = true;
                        }
                      }, 0x64);
                      _0x4a0ad6 = true;
                    } else {
                      _0x404808 = _0x37c5c2;
                      _0xaa9921 = _0x3e4b12;
                      _0x24e760 = _0x1a10e0;
                      if (_0x2f1036) {
                        _0x404808.show();
                        _0x24e760.loadVideo(_0x1667c6);
                        setTimeout(function () {
                          clearTimeout(this);
                          _0x2a7ad9();
                        }, 0x1f4);
                      }
                    }
                  } else {
                    if (!_0xca0949) {
                      if (!_0xc3f128) {
                        _0xc3f128 = _0x2c8ffb("<div class=\"mvp-vimeo-holder-chromeless\"/>").prependTo(_0x139c5b);
                      }
                      _0x3562ec = _0x3c019f('1');
                      _0xc3f128.show().append(_0x3562ec);
                      _0x404808 = _0xc3f128;
                      _0xaa9921 = _0x3562ec;
                      if (!window.Vimeo) {
                        var _0x44134e = document.createElement("script");
                        _0x44134e.src = _0x49c9b1.vimeo_js;
                        var _0x213a90 = document.getElementsByTagName("script")[0x0];
                        _0x213a90.parentNode.insertBefore(_0x44134e, _0x213a90);
                      }
                      var _0x4b02f4 = setInterval(function () {
                        if (window.Vimeo) {
                          if (_0x4b02f4) {
                            clearInterval(_0x4b02f4);
                          }
                          _0x3242a7 = new Vimeo.Player(_0x3562ec[0x0]);
                          _0x24e760 = _0x3242a7;
                          _0x24e760.on("loaded", _0x2a7ad9);
                          _0x24e760.on("play", _0x161e14);
                          _0x24e760.on("pause", _0x161905);
                          _0x24e760.on('ended', _0x15011c);
                          _0x24e760.on('error', _0x2d2faa);
                          _0x24e760.on("seeking", _0xe8fd61);
                          _0x24e760.on("seeked", _0x142211);
                          if (_0x4f5c87 == "chromeless") {
                            _0x24e760.on("playbackratechange", _0x36d4bb);
                            _0x24e760.on('timeupdate', _0x2f9fc7);
                          }
                          _0x6c4700 = true;
                        }
                      }, 0x64);
                      _0xca0949 = true;
                    } else {
                      _0x404808 = _0xc3f128;
                      _0xaa9921 = _0x3562ec;
                      _0x24e760 = _0x3242a7;
                      if (_0x6c4700) {
                        _0x404808.show();
                        _0x24e760.loadVideo(_0x1667c6);
                        setTimeout(function () {
                          clearTimeout(this);
                          _0x2a7ad9();
                        }, 0x1f4);
                      }
                    }
                  }
                  if (_0x588042 == 0x2 && _0x1450dc.width && _0x1450dc.height) {
                    vimeoIframe.sw = _0x1450dc.width;
                    vimeoIframe.sh = _0x1450dc.height;
                    MVPAspectRatio.resizeMedia("iframe", _0x588042, _0x404808, _0xaa9921);
                  }
                } else {
                  if (_0xaad07c == 'custom') {
                    _0x43db09.show();
                    if (!_0x456d4f) {
                      _0x456d4f = _0x2c8ffb("<div class=\"mvp-custom-holder mvp-media\"/>").prependTo(_0x139c5b);
                    }
                    _0x456d4f.show().load(_0x1667c6, function (_0x50c095, _0x592814, _0x5c1526) {
                      if (_0x592814 == "error") {
                        console.log(_0x5c1526.status + " " + _0x5c1526.statusText);
                      } else if (_0x592814 == 'success') {
                        _0x456d4f.addClass("mvp-visible");
                        _0x43db09.hide();
                        _0x1a96c8 = true;
                      }
                    });
                    _0x2fc352.css("display", "none").removeClass('mvp-player-controls-visible');
                    _0x17ac30 = true;
                    if (_0x1450dc.duration) {
                      _0x3861a2 = _0x1450dc.duration * 0x3e8;
                      if (_0xa5b163) {
                        clearTimeout(_0xa5b163);
                      }
                      _0xa5b163 = setTimeout(function () {
                        clearTimeout(this);
                        if (!_0x31c70b && !_0x4204d7) {
                          _0x2af768();
                        }
                      }, _0x3861a2);
                    }
                  } else {
                    if (_0xaad07c == 'custom_html') {
                      _0x43db09.show();
                      if (!_0x456d4f) {
                        _0x456d4f = _0x2c8ffb("<div class=\"mvp-custom-holder mvp-media\"/>").prependTo(_0x139c5b);
                      }
                      var _0x3340d7 = _0x208e6f.find(_0x2c8ffb('#' + _0x1667c6)).html();
                      _0x456d4f.html(_0x3340d7).show().addClass("mvp-visible");
                      _0x43db09.hide();
                      _0x1a96c8 = true;
                      _0x2fc352.css("display", 'none').removeClass("mvp-player-controls-visible");
                      _0x17ac30 = true;
                      if (_0x1450dc.duration) {
                        _0x3861a2 = _0x1450dc.duration * 0x3e8;
                        if (_0xa5b163) {
                          clearTimeout(_0xa5b163);
                        }
                        _0xa5b163 = setTimeout(function () {
                          clearTimeout(this);
                          if (!_0x31c70b && !_0x4204d7) {
                            _0x2af768();
                          }
                        }, _0x3861a2);
                      }
                    }
                  }
                }
              }
            }
          }
        }
        if (!_0x1085bb && !_0x3bc623) {
          _0x5f10f7();
        }
      }
      function _0x5f10f7() {
        if (_0x395507) {
          _0x2c8ffb(_0x5ca0d3).trigger("adRequest", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        } else {
          _0x3bc623 = true;
          if (_0x4fa790) {
            var _0x2661e8 = 0x0;
            _0x4fa790.find(".mvp-annotation").each(function () {
              var _0x1c50b6 = _0x2c8ffb(this).clone().attr('data-id', _0x2661e8).appendTo(_0x474086);
              if (_0x1c50b6.hasClass("mvp-adsense-detail")) {
                var _0x263c4a = "<ins class=\"adsbygoogle\" style=\"display:inline-block;";
                if (_0x1c50b6.attr('data-width') != undefined && _0x1c50b6.attr('data-height') != undefined) {
                  _0x263c4a += 'width:' + _0x1c50b6.attr("data-width") + "px;height:" + _0x1c50b6.attr('data-height') + "px;";
                }
                ans += "\"";
                ans += " data-ad-client=\"" + _0x1c50b6.attr("data-ad-client") + "\" data-ad-slot=\"" + _0x1c50b6.attr("data-ad-slot") + "\"></ins>";
                _0x2c8ffb(_0x263c4a).prependTo(_0x1c50b6);
                _0x8aad2e = true;
              } else if (_0x1c50b6.hasClass("mvp-adsense-code")) {
                _0x8aad2e = true;
              }
              _0x52e080.push({
                'id': _0x2661e8,
                'start': !isNaN(parseInt(_0x1c50b6.attr("data-show"), 0xa)) ? parseInt(_0x1c50b6.attr('data-show'), 0xa) : 0x0,
                'end': !isNaN(parseInt(_0x1c50b6.attr("data-hide"), 0xa)) ? parseInt(_0x1c50b6.attr('data-hide'), 0xa) : 0xf4240,
                'item': _0x1c50b6
              });
              _0x2661e8++;
            });
            _0x474086.show();
            if (_0x8aad2e) {
              if (typeof adsbygoogle === 'undefined') {
                if (window.location.protocol != "file:") {
                  var _0x14601c = document.createElement("script");
                  _0x14601c.type = "text/javascript";
                  if (!MVPUtils.relativePath(_0x49c9b1.adsbygoogle_js)) {
                    var _0x11339f = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.adsbygoogle_js);
                  } else {
                    var _0x11339f = _0x49c9b1.adsbygoogle_js;
                  }
                  _0x14601c.src = _0x11339f;
                  _0x14601c.onload = _0x14601c.onreadystatechange = function () {
                    if (!this.readyState || this.readyState == "complete") {
                      _0x474086.find('.adsbygoogle').each(function () {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                      });
                    }
                  };
                  _0x14601c.onerror = function () {
                    console.log("Error loading " + this.src);
                  };
                  var _0x44107a = document.getElementsByTagName("script")[0x0];
                  _0x44107a.parentNode.insertBefore(_0x14601c, _0x44107a);
                }
              } else {
                _0x474086.find(".adsbygoogle").each(function () {
                  (adsbygoogle = window.adsbygoogle || []).push({});
                });
              }
            }
          }
          if (_0xaad07c == "audio" || _0xaad07c == "video" || _0xaad07c == 'youtube' && _0x49c9b1.youtubePlayerType == "chromeless" || _0xaad07c == 'vimeo' && _0x4f5c87 == "chromeless") {
            if (_0x1450dc.subtitles) {
              _0x2c4751 = false;
              _0x3012bc();
            } else {
              _0x2c4751 = true;
            }
            if (_0x1450dc.chapters) {
              _0x5e7bb7 = false;
              _0xb6e1c7();
              _0xd5f952.addClass('mvp-seekbar-chapters');
            } else {
              _0x5e7bb7 = true;
            }
            if (!_0x36b677 && _0x1450dc.previewSeek) {
              if (_0x1450dc.previewSeek == "auto" && _0xaad07c == "video") {
                _0x59f04a = true;
                _0xfaf57a = true;
                _0x3cfe19();
              } else {
                _0x59f04a = false;
                _0x4dfd59();
              }
            } else {
              _0x59f04a = true;
              _0xfaf57a = false;
            }
          }
          if (_0x49c9b1.mediaEndAction != "loop" && _0x49c9b1.upNextTime && !_0x33f920 && _0x142a3d > 0x1) {
            var _0x38eec5 = _0x453856.getNextCounter(0x1);
            if (typeof _0x38eec5 !== 'undefined') {
              var _0x38eb12 = _0x1eed68[_0x38eec5].data;
              if (_0x38eb12.thumb || _0x38eb12.title) {
                if (_0x38eb12.thumb) {
                  _0x37f960.css({
                    'background-image': 'url(' + encodeURI(_0x38eb12.thumb) + ')',
                    'display': "block"
                  });
                } else {
                  _0x37f960.css('display', 'none');
                }
                if (_0x38eb12.title) {
                  _0x5b7298.html(_0x38eb12.title);
                }
                if (_0x38eb12.duration) {
                  _0xe29369.show().html(MVPUtils.formatTime(_0x38eb12.duration));
                } else {
                  _0xe29369.hide().html('');
                }
                _0x6abeef.addClass("mvp-upnext-on");
              }
            }
          }
          if (_0x1450dc.title) {
            _0x41586a.html(_0x1450dc.title);
            _0x43145f.show();
            if (_0x49c9b1.showVideoTitle) {
              _0x557762.html(_0x1450dc.title).addClass("mvp-visible");
            }
          }
          if (_0x1450dc.description) {
            _0x5bc14f.html(_0x1450dc.description);
            _0x43145f.show();
          }
          if (_0x463a00 && _0x1450dc.download) {
            if (_0x49c9b1.restrictDownloadForLoggedInUser && !_0x49c9b1.isUserLoggedIn || !_0x2bfc70) {
              _0x54ba97.show();
            } else {
              _0x54ba97.show().find('a').attr({
                'href': _0x1450dc.download,
                'download': ''
              });
            }
          }
          if (_0xaad07c == "audio" || _0xaad07c == "video" || _0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == "chromeless" || _0xaad07c == "vimeo" && _0x4f5c87 == "chromeless") {
            if (_0x1450dc.liveStream) {
              _0x40d4b4.hide();
              _0x5ec4e4.hide();
              _0xc5351f.hide();
              _0xd5f952.hide();
              _0x253de7.show();
            } else {
              _0x40d4b4.show();
              _0x5ec4e4.show();
              _0xc5351f.show();
              _0xd5f952.show();
            }
            _0x8f9621.show();
            _0x19b5b0.show();
            _0x2cd9a4.show();
            _0xf7f71.show();
            _0xf39bf5.show();
            _0xc5e786.show();
            if (_0xaad07c == "audio" || _0xaad07c == "hls" || _0xaad07c == "video") {
              if (_0x1b6859) {
                if (_0x3c1510) {
                  _0x3c1510.checkCastState();
                } else {
                  var _0x12f7e6 = setInterval(function () {
                    if (_0x3c1510) {
                      clearInterval(_0x12f7e6);
                      _0x3c1510.checkCastState();
                    }
                  }, 0x1f4);
                }
              }
            }
          } else {
            _0x8f9621.hide();
            _0x19b5b0.hide();
            _0x40d4b4.hide();
            _0x5ec4e4.hide();
            _0xc5351f.hide();
            _0xd5f952.hide();
            _0x2cd9a4.hide();
            _0xf7f71.hide();
            _0xf39bf5.hide();
            _0xc5e786.hide();
          }
        }
      }
      window.onYouTubeIframeAPIReady = function () {};
      function _0x3b4534(_0x3396a4) {
        _0x1a0066 = true;
        if (!_0x44abc3) {
          _0x44abc3 = _0x40f633.find(".mvp-emiframe");
          if (_0x49c9b1.youtubePlayerType == "chromeless" && _0x49c9b1.forceYoutubeChromeless) {
            _0x44abc3.addClass("mvp-yt-clean");
          }
        }
        _0x44abc3.addClass("mvp-visible");
        if (_0x49c9b1.selectorInit && !_0x5777b3) {
          _0x1ac3d7 = _0x41a8e7;
          _0x5777b3 = true;
        }
        _0x50f193();
        if (_0x4d248d) {
          _0x589fef.playVideo();
        } else {
          if (_0x4b8613 != null || _0x1450dc.poster) {
            _0x589fef.playVideo();
          }
          _0x44abc3.addClass("mvp-visible");
          _0x105ccb.show();
        }
        if (_0x395507) {
          if (_0x49c9b1.youtubePlayerType == "chromeless") {
            _0x55a107.show();
            setTimeout(function () {
              _0x55a107.addClass("mvp-visible-fast");
            }, 0x14);
          }
        }
        if (_0x49c9b1.autoPlayInViewport && !_0x511fa7) {
          _0x70f010();
        }
      }
      function _0x37e813(_0x52a483) {
        _0x225308(_0x52a483.data);
      }
      function _0x568348(_0x972be0) {
        _0x2cba97(_0x972be0.data);
      }
      function _0x557966(_0x3ded13) {
        if (!_0x40f633.is(":visible")) {
          return;
        }
        if (_0x3ded13.data == -0x1) {
          if (_0x395507) {
            if (_0x49c9b1.youtubePlayerType == "chromeless") {
              _0x55a107.show();
              setTimeout(function () {
                _0x55a107.addClass('mvp-visible-fast');
              }, 0x14);
            }
          }
        } else {
          if (_0x3ded13.data == 0x0) {
            _0x2af768();
          } else {
            if (_0x3ded13.data == 0x1) {
              if (!_0x13e949) {
                _0x4b8613 = null;
                if (_0x1450dc.playbackRate && _0x1450dc.playbackRate != 0x1) {
                  _0x589fef.setPlaybackRate(Number(_0x1450dc.playbackRate));
                } else {
                  if (_0x49c9b1.youtubePlayerType == "chromeless") {
                    _0x2cba97(0x1);
                  }
                }
                if (_0x49c9b1.blockYoutubeEvents) {
                  if (!_0x51d4a7) {
                    _0x51d4a7 = _0x2c8ffb("<div class=\"mvp-iframe-blocker\"></div>").css("display", "block").appendTo(_0x40f633);
                  }
                }
                _0x13e949 = true;
              }
              if (_0x51d4a7 && !_0x1450dc.is360) {
                _0x51d4a7.css("display", "block");
              }
              _0x148530();
              _0x5839b0 = true;
            } else {
              if (_0x3ded13.data == 0x2) {
                _0x1fcacb();
              } else {
                if (_0x3ded13.data == 0x3) {
                  _0x44abc3.addClass("mvp-visible");
                } else if (_0x3ded13.data == 0x5) {
                  if (!_0x4d248d) {
                    _0x44abc3.addClass("mvp-visible");
                    _0x105ccb.show();
                  }
                }
              }
            }
          }
        }
      }
      function _0x112be6(_0x11082e) {
        switch (_0x11082e.data) {
          case 0x2:
            console.log("Error code = " + _0x11082e.data + ": The request contains an invalid parameter value. For example, this error occurs if you specify a video ID that does not have 11 characters, or if the video ID contains invalid characters, such as exclamation points or asterisks.");
            break;
          case 0x64:
            console.log("Error code = " + _0x11082e.data + ": Video not found, removed, or marked as private");
            break;
          case 0x65:
            console.log("Error code = " + _0x11082e.data + ": Embedding disabled for this video");
            break;
          case 0x96:
            console.log("Error code = " + _0x11082e.data + ": Video not found, removed, or marked as private [same as error 100]");
            break;
        }
      }
      function _0x3c019f(_0x2990d6) {
        var _0x3e5017 = MVPUtils.rgbToHex(_0x49c9b1.vimeoPlayerColor);
        if (_0x3e5017.charAt(0x0) == '#') {
          _0x3e5017 = _0x3e5017.substr(0x1);
        }
        var _0x409661 = '1';
        if (_0x49c9b1.useMobileNativePlayer) {
          _0x409661 = '0';
        }
        var _0x57b7f1 = _0x4d248d ? '1' : '0';
        var _0xf292d5 = _0x49c9b1.mediaEndAction == 'loop' ? '1' : '0';
        var _0xbc1c0 = "player" + Math.floor(Math.random() * 0xffffff);
        var _0x3e5017 = "?color=" + _0x3e5017;
        var _0xf292d5 = '&loop=' + _0xf292d5;
        var _0x2e9de1 = '&playsinline=' + _0x409661;
        var _0x2ca582 = "&autoplay=" + _0x57b7f1;
        var _0x6733d7 = "&background=" + _0x2990d6;
        if (_0x4d248d) {
          if (_0x49c9b1.autoPlayInViewport) {
            _0x2ca582 = "&autoplay=0";
          } else {
            _0x2ca582 = '&autoplay=1';
            _0x2ca582 = true;
          }
        }
        if (_0x1667c6.indexOf('/') > -0x1) {
          _0x1667c6 = _0x1667c6.substr(0x0, _0x1667c6.indexOf('/'));
        }
        var _0x2ade26 = "https://player.vimeo.com/video/" + _0x1667c6 + _0x3e5017 + "&byline=1" + "&portrait=1" + "&title=1" + '&autopause=1' + _0x2e9de1 + _0xf292d5 + "&dnt=1" + _0x6733d7 + "&speed=1" + "&muted=0" + _0x2ca582;
        if (_0x49c9b1.vimeoNoCookie) {
          _0x2ade26 += "&dnt=1";
        }
        if (_0x1450dc.quality) {
          _0x2ade26 += '&quality=' + _0x1450dc.quality;
        }
        var _0x33e465 = _0x2c8ffb("<iframe/>", {
          'id': _0xbc1c0,
          'frameborder': 0x0,
          'src': _0x2ade26,
          'width': "100%",
          'height': "100%",
          'webkitAllowFullScreen': true,
          'mozallowfullscreen': true,
          'allowFullScreen': true,
          'allow': "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        }).addClass("mvp-media mvp-emiframe");
        return _0x33e465;
      }
      function _0x161e14() {
        if (!_0x1e793d) {
          _0xaa9921.addClass("mvp-visible");
          if (_0x1450dc.start || _0x4b8613) {
            if (_0x4b8613) {
              var _0x5ca9c6 = _0x4b8613;
            } else {
              if (_0x1450dc.start) {
                var _0x5ca9c6 = _0x1450dc.start;
              }
            }
            _0x4b8613 = null;
            _0x24e760.setCurrentTime(_0x5ca9c6).then(function (_0x16036a) {})["catch"](function (_0x18fc40) {
              console.log(_0x18fc40.name);
            });
          }
          if (_0x1450dc.playbackRate && _0x1450dc.playbackRate != 0x1) {
            _0x24e760.setPlaybackRate(_0x1450dc.playbackRate).then(function (_0x4212be) {})["catch"](function (_0x336e68) {});
          } else {
            if (_0x4f5c87 == "chromeless") {}
          }
          _0x1e793d = true;
        }
        _0x148530();
        _0x5b30dc = true;
      }
      function _0x161905() {
        if (_0xaad07c && _0xaad07c != "vimeo") {
          return;
        }
        _0x1fcacb();
      }
      function _0x36d4bb(_0x390d86) {
        _0x2cba97(_0x390d86.playbackRate);
      }
      function _0x2a7ad9() {
        if (_0x49c9b1.selectorInit && !_0x5777b3) {
          _0x1ac3d7 = _0x41a8e7;
          _0x5777b3 = true;
        }
        _0x50f193();
        if (_0x4f5c87 == "default") {
          _0x49c9b1.blockVimeoEvents = false;
        } else {
          _0x49c9b1.blockVimeoEvents = true;
        }
        if (_0x49c9b1.blockVimeoEvents) {
          if (!_0x1cfe6a) {
            _0x1cfe6a = _0x2c8ffb("<div class=\"mvp-iframe-blocker\"></div>").css("display", "block").appendTo(_0x404808);
          }
          if (_0x1450dc.is360 || _0x1450dc.vpwd) {
            _0x1cfe6a.css('display', "none");
          } else {
            _0x1cfe6a.css("display", 'block');
          }
        }
        if (_0x4d248d || _0x4b8613 != null) {
          _0x24e760.play().then(function () {})['catch'](function (_0xc466f3) {
            if (_0x4f5c87 == "chromeless") {
              if (!_0x1450dc.vpwd) {
                _0x105ccb.show();
              }
              _0x43db09.hide();
            }
            _0xaa9921.addClass("mvp-visible");
          });
        } else {
          if (_0x4f5c87 == "chromeless") {
            if (!_0x1450dc.vpwd) {
              _0x105ccb.show();
            }
            _0x43db09.hide();
          }
          _0xaa9921.addClass('mvp-visible');
        }
        if (_0x395507) {
          if (_0x4f5c87 == "chromeless") {
            _0x55a107.show();
            setTimeout(function () {
              _0x55a107.addClass("mvp-visible-fast");
            }, 0x14);
          }
        }
        if (_0x49c9b1.autoPlayInViewport && !_0x511fa7) {
          _0x70f010();
        }
      }
      function _0x2f9fc7(_0x17356c) {
        _0x17e176 = _0x17356c.duration;
        _0x34dba9 = _0x17356c.seconds;
        _0x34c8d8 = _0x17356c.percent;
      }
      function _0x15011c() {
        _0x2af768();
      }
      function _0xe8fd61() {
        _0x43db09.show();
      }
      function _0x142211() {
        _0x43db09.hide();
      }
      function _0x2d2faa(_0x2dbea3) {
        console.log("Vimeo Player Error!", _0x2dbea3);
      }
      function _0x5b2753() {
        if (_0xaad07c == "image" && _0x1450dc.is360) {
          _0x1dd13b.render(_0x5b8150, _0x5438f1);
        }
        if (_0x3b71ee) {
          _0x3b71ee = false;
          setTimeout(function () {
            clearTimeout(this);
            _0x4b9c93.hide(0x12c);
          }, 0x7d0);
        }
      }
      function _0x58cb39() {
        if (!_0x136c1a) {
          return;
        }
        if (_0xaad07c == "image") {
          _0x1b0251.update();
          _0x15885c = requestAnimationFrame(_0x58cb39);
        } else {
          if (_0x1450dc.vrMode == "monoscopic") {
            if (_0x1717e3) {
              _0x1717e3.update();
            }
            _0x5a34d3.render(_0x63d6ae, _0x5438f1);
            if (_0x5ac143.readyState === _0x5ac143.HAVE_ENOUGH_DATA) {
              _0x58a9f1.needsUpdate = true;
            }
            _0x15885c = requestAnimationFrame(_0x58cb39);
          } else {
            _0x1717e3.update();
            _0x54d105.render(_0x2f9a71, _0x57d2e3);
            if (_0x5ac143.readyState === _0x5ac143.HAVE_ENOUGH_DATA) {
              _0x1ced73.needsUpdate = true;
            }
          }
        }
      }
      function _0x3a3968() {
        _0x25274f = new Hls();
        _0x253f76 = Hls.isSupported();
        _0x150a20 = true;
        if (_0x253f76) {
          _0x25274f.subtitleDisplay = false;
          _0x25274f.subtitleTrack = -0x1;
          _0x25274f.on(Hls.Events.MEDIA_ATTACHED, function () {
            _0x25274f.loadSource(_0x1667c6);
          });
          _0x25274f.on(Hls.Events.MANIFEST_PARSED, function (_0x278a87, _0x1c3dd9) {
            if (_0x49c9b1.showStreamVideoBitrateMenu && !_0x15d7aa) {
              _0x15d7aa = true;
              var _0x4600ae = [];
              var _0x512efc;
              var _0x26188e = _0x1c3dd9.levels.length;
              var _0x491e64;
              for (_0x512efc = 0x0; _0x512efc < _0x26188e; _0x512efc++) {
                _0x491e64 = _0x1c3dd9.levels[_0x512efc];
                if (_0x491e64.width) {
                  _0x4600ae.push({
                    'label': _0x491e64.width + 'x' + _0x491e64.height + ", " + Math.ceil(Math.round(_0x491e64.bitrate / 0x3e8)) + "kbps",
                    'value': _0x512efc.toString()
                  });
                }
              }
              _0x4600ae.push({
                'label': "auto",
                'value': '-1',
                'selected': true
              });
              if (_0x49c9b1.hideQualityMenuOnSingleQuality && _0x4600ae.length == 0x1) {} else {
                _0x114191(_0x4600ae, '-1');
              }
            }
          });
          _0x25274f.on(Hls.Events.MANIFEST_LOADED, function (_0x91a300, _0x221ebb) {});
          _0x25274f.on(Hls.Events.LEVEL_LOADED, function (_0x2cba12, _0x525721) {});
          _0x25274f.on(Hls.Events.AUDIO_TRACKS_UPDATED, function (_0x243680, _0x3b441c) {
            if (_0x49c9b1.showStreamAudioBitrateMenu && !_0x7d70e4) {
              _0x7d70e4 = true;
              var _0x4a6a1d = _0x25274f.audioTracks;
              var _0x30018d = _0x4a6a1d.length;
              if (_0x30018d > 0x1) {
                var _0x5b3c06;
                var _0x3f8684;
                var _0x2e9d20;
                var _0x29335c;
                var _0x4d7848;
                for (_0x5b3c06 = 0x0; _0x5b3c06 < _0x30018d; _0x5b3c06++) {
                  _0x3f8684 = _0x4a6a1d[_0x5b3c06];
                  _0x2e9d20 = _0x3f8684.groupId + " - " + _0x3f8684.name;
                  _0x29335c = _0x3f8684.id.toString();
                  _0x4d7848 = _0x2c8ffb('<li/>').addClass('mvp-menu-item').attr({
                    'data-value': _0x29335c,
                    'data-label': _0x2e9d20
                  }).text(_0x2e9d20).on("click", _0x5731e6).appendTo(_0xde9b71);
                }
                _0x3ddf01 = true;
                _0x1cfeb1.show();
                _0x184606.removeClass("mvp-force-hide");
              }
            }
          });
          _0x25274f.on(Hls.Events.AUDIO_TRACK_SWITCHED, function (_0x14e77f, _0x3ce10c) {
            if (_0x3ddf01) {
              _0x5e18f9(_0x3ce10c.id);
            }
          });
          _0x25274f.on(Hls.Events.AUDIO_TRACK_LOADED, function (_0x5c2b99, _0x336f44) {});
          _0x25274f.on(Hls.Events.SUBTITLE_TRACK_SWITCH, function (_0x46785b, _0x5c53ef) {});
          _0x25274f.on(Hls.Events.SUBTITLE_TRACK_LOADED, function (_0x1f35fd, _0x24494c) {});
          _0x25274f.on(Hls.Events.SUBTITLE_TRACKS_UPDATED, function (_0x50c456) {
            var _0x172708 = _0x25274f.subtitleTracks.length;
            if (_0x172708 > 0x0 && !_0x1450dc.subtitles) {
              if (!_0xc2740a) {
                _0xc2740a = true;
                var _0x43d0c9;
                var _0x252cd0;
                var _0x58be0f;
                var _0x404fae;
                _0x1450dc.subtitles = [];
                for (_0x43d0c9 = 0x0; _0x43d0c9 < _0x172708; _0x43d0c9++) {
                  _0x252cd0 = _0x25274f.subtitleTracks[_0x43d0c9];
                  _0x404fae = _0x43d0c9.toString();
                  _0x58be0f = {
                    'label': _0x252cd0.name,
                    'value': _0x404fae,
                    'src': _0x252cd0.url
                  };
                  if (_0x252cd0['default']) {
                    _0x58be0f["default"] = true;
                  }
                  _0x1450dc.subtitles.push(_0x58be0f);
                }
                _0x230bed = true;
                _0x3012bc();
              }
            }
          });
          _0x25274f.on(Hls.Events.ERROR, function (_0x13a252, _0x556018) {
            if (_0x556018.fatal) {
              switch (_0x556018.type) {
                case Hls.ErrorTypes.NETWORK_ERROR:
                  console.log("fatal network error encountered, try to recover");
                  _0x25274f.startLoad();
                  break;
                case Hls.ErrorTypes.MEDIA_ERROR:
                  console.log("fatal media error encountered, try to recover");
                  _0x25274f.recoverMediaError();
                  break;
                default:
                  _0x25274f.destroy();
                  break;
              }
            }
          });
        }
      }
      function _0x32100e() {
        _0x19a052 = dashjs.MediaPlayer().create();
        _0x24e723 = true;
        _0x19a052.setFastSwitchEnabled = true;
        _0x19a052.on(dashjs.MediaPlayer.events.STREAM_INITIALIZED, function (_0x1aa2da) {
          console.log('dashjs.MediaPlayer.events.STREAM_INITIALIZED', _0x1aa2da);
          if (_0x49c9b1.showStreamVideoBitrateMenu && !_0x15d7aa) {
            _0x15d7aa = true;
            var _0xb9f2ed = _0x19a052.getBitrateInfoListFor('video');
            var _0x1c6d44 = [];
            var _0x5e4c45;
            var _0x485f40 = _0xb9f2ed.length;
            var _0x2d2ca8;
            for (_0x5e4c45 = 0x0; _0x5e4c45 < _0x485f40; _0x5e4c45++) {
              _0x2d2ca8 = _0xb9f2ed[_0x5e4c45];
              if (_0x2d2ca8.width) {
                _0x1c6d44.push({
                  'label': _0x2d2ca8.width + 'x' + _0x2d2ca8.height + ", " + Math.ceil(Math.round(_0x2d2ca8.bitrate / 0x3e8)) + 'kbps',
                  'value': _0x2d2ca8.qualityIndex.toString()
                });
              }
            }
            _0x1c6d44.push({
              'label': "auto",
              'value': '-1',
              'selected': true
            });
            if (_0x49c9b1.hideQualityMenuOnSingleQuality && _0x1c6d44.length == 0x1) {} else {
              _0x114191(_0x1c6d44, '-1');
            }
          }
          if (_0x49c9b1.showStreamAudioBitrateMenu && !_0x7d70e4) {
            _0x7d70e4 = true;
            var _0x12ad40 = _0x19a052.getBitrateInfoListFor("audio");
            _0x485f40 = _0x12ad40.length;
            if (_0x485f40 > 0x1) {
              var _0x1606b6;
              var _0x1e69d5;
              var _0xc5e70c;
              var _0x36de57;
              for (_0x5e4c45 = 0x0; _0x5e4c45 < _0x485f40; _0x5e4c45++) {
                _0x1606b6 = _0x12ad40[_0x5e4c45];
                _0x1e69d5 = Math.ceil(Math.round(_0x1606b6.bitrate / 0x3e8)) + "kbps";
                _0xc5e70c = _0x1606b6.qualityIndex.toString();
                _0x36de57 = _0x2c8ffb("<li/>").addClass("mvp-menu-item").attr({
                  'data-value': _0xc5e70c,
                  'data-label': _0x1e69d5
                }).text(_0x1e69d5).on('click', _0x5731e6).appendTo(_0xde9b71);
              }
              _0x3ddf01 = true;
              _0x1cfeb1.show();
              _0x184606.removeClass('mvp-force-hide');
            }
          }
        });
        _0x19a052.on(dashjs.MediaPlayer.events.QUALITY_CHANGE_REQUESTED, function (_0x70037a) {});
        _0x19a052.on(dashjs.MediaPlayer.events.QUALITY_CHANGE_RENDERED, function (_0x4859b2) {});
        _0x19a052.on(dashjs.MediaPlayer.events.TRACK_CHANGE_RENDERED, function (_0x2314e2) {});
        _0x19a052.on(dashjs.MediaPlayer.events.TEXT_TRACKS_ADDED, function (_0x51a6f9) {
          console.log("dashjs.MediaPlayer.events.TEXT_TRACKS_ADDED", _0x51a6f9);
        });
        _0x19a052.on(dashjs.MediaPlayer.events.ERROR, function (_0x5e7751) {
          console.log("dashjs.MediaPlayer.events.ERROR " + _0x5e7751.error + " : " + _0x5e7751.event.message);
        });
        _0x19a052.on(dashjs.MediaPlayer.events.PLAYBACK_ERROR, function (_0x40f0f0) {
          console.log("dashjs.MediaPlayer.events.PLAYBACK_ERROR");
        });
      }
      function _0x537dc7() {
        _0x136c1a = false;
        if (_0x15885c) {
          cancelAnimationFrame(_0x15885c);
          _0x15885c = null;
        }
        if (_0x5a3ed3) {
          if (_0x54d105) {
            _0x54d105.setAnimationLoop(null);
          }
          _0x5a3ed3 = false;
        }
        if (_0xca3476) {
          clearInterval(_0xca3476);
          _0xca3476 = null;
        }
        if (_0x35ea59) {
          _0x35ea59.stop();
        }
        _0x223ac1 = false;
        if (_0x19ddcc) {
          _0x19ddcc.stop();
        }
        _0x2aa1b2 = false;
        _0x48f7fc.off(_0x454d29);
        _0x139c5b.find(".mvp-media").removeClass("mvp-visible");
        if (_0x4b9c93) {
          _0x4b9c93.hide(0x12c);
          _0x3b71ee = false;
        }
        _0x290120.hide();
        _0x591853.hide();
        if (_0x1b0251) {
          _0x1b0251.removeEventListener('change', _0x5b2753);
          _0x1b0251.reset();
          _0x1b0251.autoRotate = false;
        }
        if (_0x183900) {
          _0x51e834();
        }
        if (_0x49c9b1.offlineImage) {
          _0x5ca0d3.setOfflineImage();
        }
        if (_0xaad07c == "audio") {
          if (_0x143642) {
            _0x143642.pause();
            _0x143642.src = '';
          }
          if (_0x30e28d) {
            _0x30e28d.off("ended pause play canplay ratechange loadedmetadata error");
          }
          if (_0x442e51 && _0xb8e3f0) {
            _0xb8e3f0.clean();
          }
          if (_0x1450dc.slideshowImages && _0x2060ea) {
            _0x2060ea.dispose();
          }
        } else {
          if (_0xaad07c == "video") {
            if (_0x253f76 && _0x225c56 == "hls") {
              if (_0x25274f) {
                _0x25274f.detachMedia();
                _0x25274f.off();
                _0x25274f.destroy();
                _0x25274f = null;
                _0x150a20 = false;
              }
              if (_0x124dbc) {
                _0x124dbc.detachMedia();
                _0x124dbc.off();
                _0x124dbc.destroy();
              }
            }
            if (_0x52ee22 && _0x225c56 == "dash") {
              if (_0x19a052) {
                _0x19a052.attachSource(null);
              }
            }
            if (_0x5ee613 && _0x1450dc.is360) {
              if (_0x1450dc.vrMode == "monoscopic") {
                if (_0x1e5081) {
                  _0x1e5081.hide();
                }
              } else {
                if (_0x45dc47) {
                  _0x45dc47.hide();
                }
              }
            }
            if (_0x326462) {
              _0x326462.pause();
              try {
                _0x326462.currentTime = 0x0;
              } catch (_0x52e864) {}
              _0x326462.src = '';
              _0x326462 = null;
            }
            if (_0x5ac143) {
              _0x5ac143.off("ended loadedmetadata ratechange canplay canplaythrough waiting playing play pause error seeked");
            }
            if (_0x395d2f) {
              _0x395d2f.hide();
            }
          } else {
            if (_0xaad07c == "image") {
              if (_0xa5b163) {
                clearTimeout(_0xa5b163);
                _0xa5b163 = null;
              }
              if (_0x1450dc.is360) {
                if (_0x42fcc0) {
                  _0x42fcc0.hide();
                }
                _0x428281 = false;
              } else {
                _0x137aae.hide().find(".mvp-media").remove();
                _0x50fbba = null;
              }
              _0x195faa = null;
              _0x3861a2 = null;
            } else {
              if (_0xaad07c == "youtube") {
                if (_0x589fef) {
                  _0x40f633.hide();
                  if (_0x1a0066) {
                    _0x589fef.stopVideo();
                  }
                  _0x13e949 = false;
                }
              } else {
                if (_0xaad07c == 'vimeo') {
                  _0x17e176 = 0x0;
                  _0x34dba9 = 0x0;
                  _0x34c8d8 = 0x0;
                  if (_0x24e760) {
                    _0x24e760.unload().then(function () {})["catch"](function (_0x36c8be) {
                      console.log(_0x36c8be);
                    });
                  }
                  _0x1e793d = false;
                  if (_0x404808) {
                    _0x404808.hide();
                  }
                } else if (_0xaad07c == "custom" || _0xaad07c == "custom_html") {
                  if (_0xa5b163) {
                    clearTimeout(_0xa5b163);
                    _0xa5b163 = null;
                  }
                  _0x456d4f.empty().hide();
                }
              }
            }
          }
        }
        if (_0x30f341) {
          _0x30f341.hide().empty();
        }
        _0x27da1e = null;
        if (_0x29a19c) {
          _0x29a19c.hide().empty();
        }
        _0x39440f = null;
        _0x395507 = false;
        _0x32f14f.removeClass("mvp-ad-skip-btn-visible mvp-ad-skip-no-thumb");
        _0x777f09.hide().removeClass('mvp-visible-fast');
        _0x56e131.hide();
        _0x55a107.hide().removeClass('mvp-visible-fast');
        _0x55a107.find(".mvp-volume-toggle").show();
        _0x2fa554.html(_0x3ae78e);
        _0x9f0b79 = false;
        _0x474086.hide().empty();
        _0x52e080 = [];
        _0x8aad2e = false;
        _0x54ba97.hide().find('a').attr("href", '#').removeAttr("download");
        _0x253de7.hide();
        _0xc54ce2.hide();
        if (_0x225e48) {
          _0x225e48.hide();
        }
        _0x192b7c.hide();
        _0x1fb1a7.hide();
        _0x482062.hide();
        _0x24730b.css("display", 'none').removeClass('mvp-holder-visible');
        _0xe72265.html('');
        _0x126d5c = false;
        _0x43ed9f.html('');
        if (_0x49c9b1.useChapterWindow) {
          _0x3c9582.hide();
          _0x126d5c = false;
          _0x23875e.val('');
        }
        _0x45b7ac.css('display', 'none').removeClass("mvp-holder-visible");
        _0x55db69 = false;
        _0x40f459.hide();
        _0x5d6224.hide();
        _0x245b29.val('');
        _0xde616a.css('display', 'none').removeClass("mvp-holder-visible");
        _0x2f3da0 = false;
        _0x54c3c8 = false;
        _0x360693 = false;
        _0x33a975 = false;
        _0x5ec64c = false;
        _0x407a4a.html('');
        _0x494165 = null;
        _0x22585a.html('');
        _0xbddf8b.removeClass("mvp-holder-visible").css({
          'display': "none",
          'width': "auto",
          'height': "auto"
        });
        _0xbddf8b.find(".mvp-settings-menu").css("display", "none");
        _0x5524aa.css("display", "block");
        _0x40d4b4.html("00:00").hide();
        _0x5ec4e4.hide();
        _0xc5351f.html('00:00').hide();
        _0x6a32cc = null;
        _0x107649.hide();
        _0x2a65bd.empty();
        _0x387696 = false;
        _0x5d71e2 = [];
        _0x529d63 = [];
        _0x275e34 = null;
        _0x2185d8 = null;
        _0x2fbe78.empty();
        _0x173279.addClass("mvp-force-hide");
        _0xcc1b36.hide();
        _0x230bed = false;
        _0x4098c6.empty();
        _0xb4a765.addClass("mvp-force-hide");
        _0xde9b71.empty();
        _0x184606.addClass("mvp-force-hide");
        _0x3ddf01 = false;
        _0x15d7aa = false;
        _0x7d70e4 = false;
        _0xc2740a = false;
        if (_0x275e34) {
          _0x2a65bd.removeClass("mvp-subtitle-visible");
        }
        _0xb361ff.hide();
        _0x247928.removeClass("mvp-ad-info-start-visible mvp-ad-info-start-controls-align");
        _0x3fd320 = null;
        _0x482aec = [];
        _0x4afc0f.hide();
        _0x33e7c8.css("background-image", "none");
        if (_0xfaf57a) {
          _0xfaf57a = false;
          _0x8bc5df = false;
          if (_0x253f76 && _0x225c56 == "hls") {
            if (_0x124dbc) {
              _0x124dbc.detachMedia();
            }
          }
          if (_0x52ee22 && _0x225c56 == 'dash') {
            if (_0x482968) {
              _0x482968.attachSource(null);
            }
          }
          if (_0x50164f) {
            _0x50164f.pause();
            _0x50164f.src = '';
          }
          if (_0xf5f6c0) {
            _0xf5f6c0.clearRect(0x0, 0x0, _0x18208a, _0x6b9097);
          }
        }
        _0xd5157e = false;
        if (_0x557762) {
          _0x557762.html('').removeClass("mvp-visible");
        }
        _0x54beb6.css('display', "none").removeClass("mvp-holder-visible");
        _0x41586a.html('');
        _0x5bc14f.html('');
        _0x43145f.hide();
        _0x31c70b = false;
        _0x328347.html('');
        _0x170382.css('display', "none").removeClass("mvp-holder-visible");
        _0x4204d7 = false;
        _0x5da90c.css("display", 'none').removeClass("mvp-holder-visible");
        _0x3abc2b.css("display", "none").removeClass("mvp-holder-visible");
        _0x1b10ac = false;
        _0x181688.css("display", 'none').removeClass("mvp-holder-visible");
        _0x3f7bc0 = false;
        _0x105ccb.hide();
        _0x8f9621.find(".mvp-btn-play").show();
        _0x8f9621.find(".mvp-btn-pause").hide();
        _0x6abeef.removeClass("mvp-upnext-on mvp-upnext-visible");
        _0x37f960.css("background-image", 'none');
        _0x5b7298.html('');
        _0xe29369.html('');
        _0x30553b.removeClass('mvp-upnext-wrap2-visible');
        _0xbd16b4.css("background-image", "none");
        _0x2b9734.html('');
        _0x5cf8bf.html('');
        _0x2a430a.hide().removeClass('mvp-holder-visible');
        _0x6880b5.val('');
        _0x4f6174.hide().removeClass("mvp-holder-visible");
        if (_0x357692) {
          _0x357692.hide();
        }
        _0x4b8613 = null;
        _0xaad07c = null;
        _0x225c56 = null;
        _0x1450dc = null;
        _0x1f950b = false;
        _0x1a96c8 = false;
        _0x4bdd56 = false;
        _0xa19aec = false;
        _0x2ccb1a = false;
        _0x4f3fc8.width(0x0);
        _0xd6cb33.width(0x0);
        _0x583d93.width(0x0);
        _0x1808b1.width(0x0);
        _0x134a79.width(0x0);
        _0x3e24c7.removeClass('mvp-solo-seekbar-visible');
        if (!_0x4d248d) {
          _0x2fc352.css("display", "none").removeClass("mvp-player-controls-visible");
          _0x17ac30 = true;
        }
      }
      function _0x35ea78() {
        _0x136c1a = false;
        if (_0x15885c) {
          cancelAnimationFrame(_0x15885c);
          _0x15885c = null;
        }
        if (_0x5a3ed3) {
          if (_0x54d105) {
            _0x54d105.setAnimationLoop(null);
          }
          _0x5a3ed3 = false;
        }
        if (_0xca3476) {
          clearInterval(_0xca3476);
          _0xca3476 = null;
        }
        _0x3f8d85 = false;
        _0x59c0f8 = false;
        _0x341968 = false;
        _0x48f7fc.off(_0x454d29);
        _0x139c5b.find(".mvp-media").removeClass('mvp-visible');
        if (_0x4b9c93) {
          _0x4b9c93.hide(0x12c);
          _0x3b71ee = false;
        }
        _0x290120.hide();
        if (_0x1b0251) {
          _0x1b0251.removeEventListener("change", _0x5b2753);
          _0x1b0251.reset();
          _0x1b0251.autoRotate = false;
        }
        if (_0xaad07c == "audio") {
          if (_0x143642) {
            _0x143642.pause();
            _0x143642.src = '';
          }
          if (_0x30e28d) {
            _0x30e28d.off("ended pause play canplay ratechange loadedmetadata error");
          }
          if (_0x442e51 && _0xb8e3f0) {
            _0xb8e3f0.clean();
          }
          if (_0x1450dc.slideshowImages && _0x2060ea) {
            _0x2060ea.dispose();
          }
        } else {
          if (_0xaad07c == "video") {
            if (_0x253f76 && _0x225c56 == "hls") {
              if (_0x25274f) {
                _0x25274f.detachMedia();
                _0x25274f.off();
                _0x25274f.destroy();
                _0x25274f = null;
                _0x150a20 = false;
              }
              if (_0x124dbc) {
                _0x124dbc.detachMedia();
                _0x124dbc.off();
                _0x124dbc.destroy();
              }
            }
            if (_0x52ee22 && _0x225c56 == "dash") {
              if (_0x19a052) {
                _0x19a052.attachSource(null);
              }
            }
            if (_0x5ee613 && _0x1450dc.is360) {
              if (_0x1450dc.vrMode == "monoscopic") {
                if (_0x1e5081) {
                  _0x1e5081.hide();
                }
              } else {
                if (_0x45dc47) {
                  _0x45dc47.hide();
                }
              }
            }
            if (_0x326462) {
              _0x326462.pause();
              try {
                _0x326462.currentTime = 0x0;
              } catch (_0x142dba) {}
              _0x326462.src = '';
              _0x326462 = null;
            }
            if (_0x5ac143) {
              _0x5ac143.off("ended loadedmetadata ratechange canplay canplaythrough waiting playing play pause error seeked");
            }
            if (_0x395d2f) {
              _0x395d2f.hide();
            }
          } else {
            if (_0xaad07c == 'image') {
              if (_0xa5b163) {
                clearTimeout(_0xa5b163);
                _0xa5b163 = null;
              }
              if (_0x1450dc.is360) {
                if (_0x42fcc0) {
                  _0x42fcc0.hide();
                }
                _0x428281 = false;
              } else {
                _0x137aae.hide().find(".mvp-media").remove();
                _0x50fbba = null;
              }
              _0x195faa = null;
              _0x3861a2 = null;
            } else {
              if (_0xaad07c == "youtube") {
                if (_0x589fef) {
                  _0x40f633.hide();
                  if (_0x1a0066) {
                    _0x589fef.stopVideo();
                  }
                  _0x13e949 = false;
                }
              } else {
                if (_0xaad07c == 'vimeo') {
                  _0x17e176 = 0x0;
                  _0x34dba9 = 0x0;
                  _0x34c8d8 = 0x0;
                  if (_0x24e760) {
                    _0x24e760.unload().then(function () {})['catch'](function (_0x2954b2) {
                      console.log(_0x2954b2);
                    });
                  }
                  _0x1e793d = false;
                  if (_0x404808) {
                    _0x404808.hide();
                  }
                } else if (_0xaad07c == "custom" || _0xaad07c == "custom_html") {
                  if (_0xa5b163) {
                    clearTimeout(_0xa5b163);
                    _0xa5b163 = null;
                  }
                  _0x456d4f.empty().hide();
                }
              }
            }
          }
        }
        if (_0x30f341) {
          _0x30f341.hide();
        }
        if (_0x395507) {
          _0x395507 = false;
          _0x32f14f.removeClass("mvp-ad-skip-btn-visible mvp-ad-skip-no-thumb");
          _0x777f09.hide().removeClass("mvp-visible-fast");
          _0x56e131.hide();
          _0x55a107.hide().removeClass('mvp-visible-fast');
          _0x55a107.find(".mvp-volume-toggle").show();
          _0x2fa554.html(_0x3ae78e);
          _0x9f0b79 = false;
        } else {
          if (_0x474086.is(':visible')) {
            _0x5390c3 = true;
            _0x474086.hide();
          }
          if (_0x275e34) {
            _0x5af44a = true;
            _0x107649.hide();
          }
        }
        _0x6a32cc = null;
        _0xb361ff.hide();
        _0x4afc0f.hide();
        _0x6abeef.removeClass("mvp-upnext-on mvp-upnext-visible");
        _0x30553b.removeClass("mvp-upnext-wrap2-visible");
        if (_0x357692) {
          _0x357692.hide();
        }
        _0x4b8613 = null;
        _0xaad07c = null;
        _0x225c56 = null;
        _0x1450dc = null;
        _0x1f950b = false;
        _0x1a96c8 = false;
        _0x4bdd56 = false;
        _0xa19aec = false;
        _0x2ccb1a = false;
        _0x4f3fc8.width(0x0);
        _0xd6cb33.width(0x0);
        _0x3e24c7.removeClass("mvp-solo-seekbar-visible");
        _0x2fc352.css('display', 'none').removeClass("mvp-player-controls-visible");
        _0x17ac30 = true;
      }
      this.cancelIma = function () {
        _0x2aa1b2 = false;
        _0x395507 = false;
        if (_0xaad07c == "video") {
          _0x5ac143.addClass("mvp-visible");
        }
      };
      this.setAdInterface = function () {
        _0x2fc352.css("display", "none").removeClass("mvp-player-controls-visible");
        document.body.style.cursor = "default";
        _0x17ac30 = true;
        _0x777f09.show();
        setTimeout(function () {
          _0x777f09.addClass("mvp-visible-fast");
        }, 0x14);
        _0x55a107.show();
        setTimeout(function () {
          _0x55a107.addClass("mvp-visible-fast");
        }, 0x14);
        if (!_0x14ea2c && _0xaad07c != "image") {
          _0x14ea2c = true;
          if (_0x3594f0 && _0x3594f0.length && _0x1ac3d7 == 0x0) {
            setTimeout(function () {
              if (_0x3594f0) {
                _0x3594f0.addClass("mvp-unmute-toggle-visible").one("click touchend", function (_0x5a82c8) {
                  _0x367db0();
                  return false;
                });
              }
            }, 0x3e8);
          }
        }
        _0x395507 = true;
        _0x105ccb.hide();
      };
      this.hideAdInterface = function () {
        _0x395507 = false;
        _0x32f14f.removeClass("mvp-ad-skip-btn-visible mvp-ad-skip-no-thumb");
        _0x777f09.hide().removeClass('mvp-visible-fast');
        _0x56e131.hide();
        _0x55a107.hide().removeClass("mvp-visible-fast");
        _0x55a107.find(".mvp-volume-toggle").show();
        _0x2fa554.html(_0x3ae78e);
        _0x9f0b79 = false;
        _0xa19aec = false;
        _0x2ccb1a = false;
        _0x4f3fc8.width(0x0);
        _0xd6cb33.width(0x0);
        _0x2fc352.css("display", "none").removeClass("mvp-player-controls-visible");
        _0x17ac30 = true;
        _0x395507 = false;
      };
      this.showPlayerInterface = function () {
        if (_0x31f22e) {
          _0x1808b1.width(_0x31f22e);
        }
        if (_0x34f818) {
          _0x134a79.width(_0x34f818);
        }
        _0x31f22e = null;
        _0x34f818 = null;
        _0x1808b1.removeClass("mvp-progress-sizing");
        _0x134a79.removeClass("mvp-progress-sizing");
        if (_0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == 'default' || _0xaad07c == "vimeo" && _0x4f5c87 == 'default' || _0xaad07c == "custom" || _0xaad07c == 'custom_html') {
          _0x2fc352.css('display', "none").removeClass("mvp-player-controls-visible");
          document.body.style.cursor = "default";
          _0x17ac30 = true;
        } else {
          _0x2fc352.css("display", "block");
          if (_0xca3476) {
            clearInterval(_0xca3476);
            _0xca3476 = null;
          }
          _0xca3476 = setInterval(_0x150da0, 0x1f4);
        }
        if (_0x2aa1b2) {
          if (_0x24fb02.length) {
            setTimeout(function () {
              var _0x1622bb = _0x24fb02[0x0];
              if (_0x5ca0d3.getCurrentTime() > _0x1622bb.begin) {
                _0x24fb02[0x0].marker.remove();
                _0x24fb02.shift();
              }
            }, 0x1f4);
          }
        }
        if (_0xaad07c == "video") {
          _0x5ac143.addClass("mvp-visible");
        }
      };
      function _0x1dff3e() {
        _0x136c1a = false;
        if (_0x15885c) {
          cancelAnimationFrame(_0x15885c);
          _0x15885c = null;
        }
        if (_0x5a3ed3) {
          if (_0x54d105) {
            _0x54d105.setAnimationLoop(null);
          }
          _0x5a3ed3 = false;
        }
        if (_0xca3476) {
          clearInterval(_0xca3476);
          _0xca3476 = null;
        }
        _0x4b8613 = null;
        if (_0xaad07c == "audio") {
          if (_0x143642) {
            _0x4b8613 = _0x143642.currentTime;
            _0x143642.pause();
            _0x143642.src = '';
          }
          if (_0x30e28d) {
            _0x30e28d.off("ended pause play canplay ratechange loadedmetadata error");
          }
          if (_0x442e51 && _0xb8e3f0) {
            _0xb8e3f0.clean();
          }
        } else {
          if (_0xaad07c == "video") {
            if (_0x5ee613 && _0x1450dc.is360) {
              if (_0x1450dc.vrMode == "monoscopic") {
                if (_0x1e5081) {
                  _0x1e5081.hide();
                }
              } else {
                if (_0x45dc47) {
                  _0x45dc47.hide();
                }
              }
            }
            if (_0x326462) {
              _0x4b8613 = _0x326462.currentTime;
              _0x326462.pause();
              try {
                _0x326462.currentTime = 0x0;
              } catch (_0x3a403c) {}
              _0x326462.src = '';
              _0x326462 = null;
            }
            if (_0x5ac143) {
              _0x5ac143.off("ended loadedmetadata canplay canplaythrough ratechange waiting playing play pause error seeked");
            }
          }
        }
        _0x105ccb.hide();
        _0x1f950b = false;
        _0x1a96c8 = false;
      }
      function _0x47cba3() {
        if (!_0x588a79 || !_0xaad07c) {
          return;
        }
        if (_0x2aa7b0) {
          _0x4c9596();
        }
        _0x537dc7();
        _0x453856.reSetCounter();
        _0x2fc352.removeClass("mvp-player-controls-visible");
        if (_0x2e3f69 == "fullscreen") {
          document.body.style.cursor = "none";
        }
        _0x17ac30 = true;
      }
      function _0x372383() {
        if (typeof _0x2c8ffb.fn.masonry !== 'undefined' && _0x5b8e61) {
          _0x223a1c.masonry('destroy');
        }
        if (_0xaad07c) {
          _0x537dc7();
        }
        _0x223a1c.empty();
        _0x142a3d = 0x0;
        _0x453856.reSetCounter();
        _0x3f2b4f = false;
        _0x200cb8 = '';
        _0x3d64b6 = null;
        if (_0x2cb5ab) {
          _0x2cb5ab.setScrollActive();
        }
        _0x58b362 = false;
        _0x2a1113 = null;
        _0x114c06 = null;
        _0xfe5fe6 = null;
        _0x196418 = null;
        _0x2e785a = null;
        _0x99f1ea = null;
        _0x2d202a = null;
        _0x4c6cc5 = null;
        _0x26ae05 = null;
        _0x50dbc5 = null;
        _0x20063 = false;
        _0x2d3b7c = false;
        _0x1eed68 = [];
        _0x2a1553 = [];
        _0x4a08ff = [];
        _0xda6036 = false;
        _0x3d4743 = null;
        _0x1d04e3 = null;
        _0x2d0ff2 = null;
        _0x3e776d = null;
        _0x5bea3f = null;
        _0x1c7baf = null;
        _0xda4773 = null;
        _0x295725 = null;
        _0x4b0daf = [];
      }
      function _0x3199b6() {
        if (!_0x588a79) {
          return;
        }
        if (_0x142a3d == 0x0) {
          return;
        }
        if (_0x1450dc) {
          _0x57fdf0();
        }
        if (_0x116683 && _0xa78a33) {
          var _0x4e6937 = _0x223a1c.find(".mvp-playlist-item-selected");
          var _0x1491cf = _0x4e6937.nextAll(".mvp-playlist-item:not(.mvp-filter-hidden)").filter(":first");
          if (_0x1491cf.length) {
            var _0x2c7a9a = _0x1491cf.attr("data-id");
            _0x453856.setCounter(_0x2c7a9a, false);
          } else {
            _0x453856.advanceHandler(0x1, true);
          }
        } else {
          _0x453856.advanceHandler(0x1, true);
        }
      }
      function _0x57fdf0() {
        if (!_0x1a96c8) {
          return;
        }
        if (_0x49c9b1.rememberPlaybackPosition == 'all') {
          _0x1eed68[_0x48707c].data.start = _0x5ca0d3.getCurrentTime();
        }
        if (_0x49c9b1.useStatistics && _0x48707c != undefined) {
          if (_0xaad07c != 'custom' && _0xaad07c != 'custom_html') {
            _0x145691('mvp_play_count', _0x48707c);
          }
        }
        if (_0x49c9b1.displayWatchedPercentage && _0x1450dc && _0xaad07c != "image" && _0x1a96c8) {
          _0xc8886f();
        }
      }
      function _0xc8886f() {
        if (_0x1450dc.watchedComplete) {
          return;
        }
        if (_0x1450dc.mediaId == undefined && _0x1450dc.path == undefined) {
          return;
        }
        var _0x8da8c9 = _0x5ca0d3.getCurrentTime();
        var _0x4c3f0a = _0x5ca0d3.getDuration();
        var _0xd62f26 = [{
          'name': "action",
          'value': 'mvp_set_watched_percentage'
        }, {
          'name': "playlist_id",
          'value': _0xd3a404
        }, {
          'name': "watched",
          'value': _0x8da8c9
        }, {
          'name': "duration",
          'value': _0x4c3f0a
        }];
        if (_0x1450dc.mediaId) {
          _0xd62f26.push({
            'name': "media_id",
            'value': _0x1450dc.mediaId
          });
          _0xd62f26.push({
            'name': "url",
            'value': _0x1450dc.safeTitle || ''
          });
        } else if (_0x1450dc.path) {
          _0xd62f26.push({
            'name': 'url',
            'value': _0x1450dc.path
          });
          _0xd62f26.push({
            'name': "media_id",
            'value': null
          });
        }
        if (_0x8da8c9 + 0.1 >= _0x4c3f0a) {
          _0x1eed68[_0x48707c].data.watchedComplete = true;
        }
        _0x2c8ffb.ajax({
          'url': _0x49c9b1.ajax_url,
          'type': 'post',
          'data': _0xd62f26,
          'dataType': "json"
        }).done(function (_0x584c47) {
          if (_0x584c47 & _0x584c47.update && _0x584c47.update == '1') {
            var _0x566f26;
            if (_0x584c47.media_id && _0x584c47.title) {
              _0x566f26 = _0x223a1c.find(".mvp-playlist-item[data-media-id=\"" + _0x584c47.media_id + "\"][data-safe-title=\"" + _0x584c47.title + "\"]");
            } else if (_0x584c47.title) {
              _0x566f26 = _0x223a1c.find(".mvp-playlist-item[data-media-url=\"" + _0x584c47.title + "\"]");
            }
            if (_0x566f26 && _0x566f26.length) {
              var _0x5e51d9 = _0x584c47.watched / _0x584c47.duration * 0x64;
              if (_0x5e51d9 > 0x64) {
                _0x5e51d9 = 0x64;
              }
              _0x566f26.find(".mvp-media-watched-progress").width(_0x5e51d9 + '%');
              _0x566f26.find('.mvp-media-watched-bg').removeClass("mvp-hidden");
            }
          }
        }).fail(function (_0x46f84f, _0x13ba44, _0x2ebd7e) {
          console.log("Error mvp_set_watched_percentage: " + _0x46f84f.responseText, _0x13ba44, _0x2ebd7e);
        });
      }
      function _0x11ddd6() {
        var _0x5e8ba0;
        var _0x2ea844;
        var _0x174f8f = [];
        for (_0x5e8ba0 = 0x0; _0x5e8ba0 < _0x142a3d; _0x5e8ba0++) {
          _0x2ea844 = _0x1eed68[_0x5e8ba0].data;
          if (!_0x2ea844.watchedSet) {
            if (_0x2ea844.mediaId != undefined) {
              _0x174f8f.push({
                'media_id': _0x2ea844.mediaId,
                'url': _0x2ea844.safeTitle || ''
              });
              _0x2ea844.watchedSet = true;
            } else if (_0x2ea844.path) {
              _0x174f8f.push({
                'media_id': null,
                'url': _0x2ea844.path
              });
              _0x2ea844.watchedSet = true;
            }
          }
        }
        if (_0x174f8f.length) {
          var _0x5ac49d = [{
            'name': "action",
            'value': "mvp_get_watched_percentage"
          }, {
            'name': "data",
            'value': JSON.stringify(_0x174f8f)
          }];
          _0x2c8ffb.ajax({
            'url': _0x49c9b1.ajax_url,
            'type': "post",
            'data': _0x5ac49d,
            'dataType': 'json'
          }).done(function (_0x2cd373) {
            if (_0x2cd373) {
              var _0x3b1689;
              var _0x3d63d1 = _0x2cd373.length;
              var _0x31d582;
              var _0x4f8233;
              var _0xf2089d;
              for (_0x3b1689 = 0x0; _0x3b1689 < _0x3d63d1; _0x3b1689++) {
                _0x31d582 = _0x2cd373[_0x3b1689];
                if (_0x31d582.media_id && _0x31d582.title) {
                  _0x4f8233 = _0x223a1c.find(".mvp-playlist-item[data-media-id=\"" + _0x31d582.media_id + "\"][data-safe-title=\"" + _0x31d582.title + "\"]");
                } else if (_0x31d582.title) {
                  _0x4f8233 = _0x223a1c.find(".mvp-playlist-item[data-media-url=\"" + _0x31d582.title + "\"]");
                }
                if (_0x4f8233 && _0x4f8233.length) {
                  _0xf2089d = _0x31d582.watched / _0x31d582.duration * 0x64;
                  if (_0xf2089d > 0x64) {
                    _0xf2089d = 0x64;
                  }
                  if (_0x31d582.watched + 0.1 >= _0x31d582.duration) {
                    _0x4f8233.attr("data-watched-complete", '1');
                  }
                  _0x4f8233.find(".mvp-media-watched-progress").width(_0xf2089d + '%');
                  _0x4f8233.find(".mvp-media-watched-bg").removeClass("mvp-hidden");
                }
              }
            }
          }).fail(function (_0x5ccbfe, _0x1e3025, _0x5db068) {
            console.log("Error mvp_get_watched_percentage: " + _0x5ccbfe.responseText, _0x1e3025, _0x5db068);
          });
        }
      }
      function _0x37d09c() {
        if (!_0x588a79) {
          return;
        }
        if (_0x142a3d == 0x0) {
          return;
        }
        if (_0x1450dc) {
          _0x57fdf0();
        }
        _0x453856.advanceHandler(-0x1, true);
      }
      this.setImaType = function (_0x10edeb) {
        _0x1fab36 = _0x10edeb;
      };
      this.playHandler = function () {
        _0x148530();
      };
      function _0x148530() {
        _0x43db09.hide();
        _0x105ccb.hide();
        _0x8f9621.find('.mvp-btn-play').hide();
        _0x8f9621.find(".mvp-btn-pause").show();
        if (_0x49c9b1.showPosterOnPause && _0xaad07c != 'audio') {
          if (_0x27da1e) {
            _0x27da1e.one("transitionend", function () {
              if (!_0x1f950b) {
                return;
              }
              _0x30f341.hide();
            }).removeClass("mvp-visible");
          }
        }
        if (!_0x1a96c8) {
          setTimeout(function () {
            _0x9b20e1();
          }, 0x32);
          if (_0x49c9b1.autoPlayAfterFirst) {
            _0x4d248d = true;
            _0x49c9b1.autoPlay = true;
          }
          if (!_0x14ea2c && _0xaad07c != "image") {
            _0x14ea2c = true;
            if (_0x3594f0 && _0x3594f0.length && _0x1ac3d7 == 0x0) {
              setTimeout(function () {
                if (_0x3594f0) {
                  _0x3594f0.addClass('mvp-unmute-toggle-visible').one("click touchend", function (_0x51c190) {
                    _0x367db0();
                    return false;
                  });
                }
              }, 0x3e8);
            }
          }
          if (_0x49c9b1.minimizeOnScroll && _0x49c9b1.minimizeOnScrollOnlyIfPlaying) {
            _0x3bc0ca();
          }
          if (_0xaad07c == "audio") {
            if (_0x442e51) {
              if (window.location.protocol == "file:") {
                console.log("Using Audio Equalizer requires server connection!");
              } else {
                if (typeof _0xb8e3f0 === 'undefined') {
                  var _0x46e2f7 = setInterval(function () {
                    if (_0xb8e3f0) {
                      if (_0x46e2f7) {
                        clearInterval(_0x46e2f7);
                      }
                      _0xb8e3f0.init(_0x143642);
                      _0x5cecc4.addClass("mvp-visible");
                    }
                  }, 0x64);
                } else {
                  _0xb8e3f0.init(_0x143642);
                  _0x5cecc4.addClass("mvp-visible");
                }
              }
            } else {
              if (_0x1450dc.slideshowImages) {
                if (_0x2060ea) {
                  _0x2060ea.play();
                }
              }
            }
          } else {
            if (_0x5ee613 && _0x1450dc.is360) {
              if (_0x4b9c93) {
                setTimeout(function () {
                  _0x4b9c93.show(0x12c);
                  _0x3b71ee = true;
                }, 0x3e8);
              }
              var _0x2a2852 = _0x139c5b.width();
              var _0x248f76 = _0x139c5b.height();
              if (_0x1450dc.vrMode == 'monoscopic') {
                _0x1e5081.show();
                _0x1b0251.addEventListener("change", _0x5b2753);
                _0x5a34d3.setSize(_0x2a2852, _0x248f76);
                _0x5438f1.aspect = _0x2a2852 / _0x248f76;
                _0x5438f1.updateProjectionMatrix();
                if (_0x15885c) {
                  cancelAnimationFrame(_0x15885c);
                }
                _0x15885c = requestAnimationFrame(_0x58cb39);
              } else {
                _0x45dc47.show();
                _0x54d105.setSize(_0x2a2852, _0x248f76);
                _0x57d2e3.aspect = _0x2a2852 / _0x248f76;
                _0x57d2e3.updateProjectionMatrix();
                _0x54d105.setAnimationLoop(_0x58cb39);
                _0x5a3ed3 = true;
                _0x290120.show();
                setTimeout(function () {
                  _0x4b9c93.hide(0x12c);
                  _0x3b71ee = false;
                }, 0x1388);
              }
              setTimeout(function () {
                if (_0x1450dc.vrMode == "monoscopic") {
                  _0x1e5081.addClass("mvp-visible");
                } else {
                  _0x45dc47.addClass("mvp-visible");
                }
              }, 0x14);
              _0x136c1a = true;
            }
          }
          if (!_0x395507 && _0x420869.length) {
            if (!_0x53e109) {
              _0x152e7e();
            }
          }
          if (_0x395507) {
            if (_0x1450dc.skipEnable !== 'undefined') {
              _0x1f4e81();
            }
            var _0x5dd2a1 = "adStart";
          } else {
            var _0x5dd2a1 = 'mediaStart';
          }
          _0x2c8ffb(_0x5ca0d3).trigger(_0x5dd2a1, {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
          _0x1a96c8 = true;
          if (_0x395507) {
            if (_0x1450dc.TrackingEvents) {
              _0x58e9d8('start');
            }
            if (_0x1450dc.Impression) {
              _0x2edba4(_0x1450dc.Impression);
            }
            _0x2fc352.css("display", 'none').removeClass("mvp-player-controls-visible");
            document.body.style.cursor = "default";
            _0x17ac30 = true;
            var _0x4ec642 = _0x5ca0d3.getDuration();
            if (_0x4ec642) {
              _0x2ed8f8.html("&nbsp;(-" + MVPUtils.formatTime(_0x4ec642) + ')');
            }
            _0x777f09.show();
            setTimeout(function () {
              _0x777f09.addClass("mvp-visible-fast");
            }, 0x14);
          } else {
            _0x777f09.hide().removeClass('mvp-visible-fast');
            if (_0x31f22e) {
              _0x1808b1.width(_0x31f22e);
            }
            if (_0x34f818) {
              _0x134a79.width(_0x34f818);
            }
            _0x31f22e = null;
            _0x34f818 = null;
            _0x1808b1.removeClass("mvp-progress-sizing");
            _0x134a79.removeClass('mvp-progress-sizing');
            if (_0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == "default" || _0xaad07c == "vimeo" && _0x4f5c87 == "default" || _0xaad07c == 'custom' || _0xaad07c == "custom_html") {
              _0x2fc352.css('display', "none").removeClass("mvp-player-controls-visible");
              document.body.style.cursor = "default";
              _0x17ac30 = true;
            } else {
              _0x2fc352.css('display', 'block');
            }
            if (_0x5390c3) {
              _0x5390c3 = false;
              _0x474086.show();
            }
            if (_0x5af44a) {
              _0x5af44a = false;
              _0x107649.show();
            }
          }
        }
        if (_0x49c9b1.togglePlaybackOnMultipleInstances) {
          if (ap_mediaArr.length > 0x1) {
            var _0x1d6c81;
            var _0x1ea6b9 = ap_mediaArr.length;
            for (_0x1d6c81 = 0x0; _0x1d6c81 < _0x1ea6b9; _0x1d6c81++) {
              if (_0x5ca0d3 != ap_mediaArr[_0x1d6c81].inst) {
                ap_mediaArr[_0x1d6c81].inst.pauseMedia();
              }
            }
          }
        }
        if (_0x1450dc.slideshowImages && _0x49c9b1.slideshowPauseWithAudio) {
          if (_0x2060ea) {
            _0x2060ea.play();
          }
        }
        if (_0xaad07c == "audio" || _0xaad07c == "video" || _0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == "chromeless" || _0xaad07c == "vimeo" && _0x4f5c87 == "chromeless") {
          if (_0xca3476) {
            clearInterval(_0xca3476);
            _0xca3476 = null;
          }
          _0xca3476 = setInterval(_0x150da0, 0x1f4);
        }
        if (_0x395507) {
          if (_0x1450dc.TrackingEvents) {
            _0x58e9d8("resume");
          }
          _0x2c8ffb(_0x5ca0d3).trigger('adPlay', {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        } else {
          _0x2c8ffb(_0x5ca0d3).trigger("mediaPlay", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        }
        if (_0x241405 && typeof ga !== "undefined") {
          if (_0x395507) {
            var _0x257249 = "AD played";
            var _0x275ef3 = "AD title: " + _0x1450dc.title + " | t: " + Math.round(_0x5ca0d3.getCurrentTime());
          } else {
            var _0x257249 = "Video played";
            var _0x275ef3 = "Video title: " + _0x1450dc.title + " | t: " + Math.round(_0x5ca0d3.getCurrentTime());
          }
          ga("send", {
            'hitType': "event",
            'eventCategory': "Modern video player: " + _0x49c9b1.instanceName,
            'eventAction': _0x257249,
            'eventLabel': "title: " + _0x1450dc.title + " | time: " + Math.round(_0x5ca0d3.getCurrentTime()),
            'nonInteraction': true
          });
        }
        _0x1f950b = true;
        if (_0x4f5c86) {
          clearTimeout(_0x4f5c86);
        }
        _0x33d37e();
      }
      this.toggleBigPlay = function (_0x1405a1) {
        if (_0x1405a1) {
          _0x105ccb.show();
        } else {
          _0x105ccb.hide();
        }
      };
      this.pauseHandler = function () {
        _0x1fcacb();
      };
      function _0x1fcacb() {
        if (_0xca3476) {
          clearInterval(_0xca3476);
        }
        _0x43db09.hide();
        _0x8f9621.find(".mvp-btn-play").show();
        _0x8f9621.find('.mvp-btn-pause').hide();
        if (_0x49c9b1.showPosterOnPause && _0xaad07c != "audio") {
          if (_0x27da1e) {
            _0x30f341.show();
            setTimeout(function () {
              _0x27da1e.addClass("mvp-visible");
            }, 0x14);
          } else if (_0x153050) {
            _0x3078fd();
          }
        }
        if (_0x1450dc.slideshowImages && _0x49c9b1.slideshowPauseWithAudio) {
          if (_0x2060ea) {
            _0x2060ea.pause();
          }
        }
        if (_0x2aa1b2 && _0x395507) {} else {
          if (!_0x1a96c8) {
            if (_0xaad07c == "audio" || _0xaad07c == "video") {
              _0x105ccb.show();
            }
          } else {
            if (_0xaad07c == "audio" || _0xaad07c == "video" || _0xaad07c == 'youtube' && _0x49c9b1.youtubePlayerType == "chromeless" || _0xaad07c == 'vimeo' && _0x4f5c87 == "chromeless") {
              _0x105ccb.show();
            }
          }
        }
        if (_0x395507) {
          if (_0x1450dc.TrackingEvents) {
            _0x58e9d8("pause");
          }
          var _0x567382 = "adPause";
        } else {
          var _0x567382 = "mediaPause";
        }
        _0x2c8ffb(_0x5ca0d3).trigger(_0x567382, {
          'instance': _0x5ca0d3,
          'instanceName': _0x49c9b1.instanceName,
          'media': _0x1450dc
        });
        if (_0x241405 && typeof ga !== "undefined") {
          if (_0x395507) {
            var _0x1ae9da = "AD paused";
            var _0x3f9e31 = "AD title: " + _0x1450dc.title + " | t: " + Math.round(_0x5ca0d3.getCurrentTime());
          } else {
            var _0x1ae9da = "Video paused";
            var _0x3f9e31 = "Video title: " + _0x1450dc.title + " | t: " + Math.round(_0x5ca0d3.getCurrentTime());
          }
          ga("send", {
            'hitType': 'event',
            'eventCategory': "Modern video player: " + _0x49c9b1.instanceName,
            'eventAction': _0x1ae9da,
            'eventLabel': _0x3f9e31,
            'nonInteraction': true
          });
        }
        if (_0x395507) {
          if (_0x1450dc.link) {
            if (_0x1450dc.ClickTracking) {
              _0x2edba4(_0x1450dc.ClickTracking);
            }
            if (_0x1450dc.target && _0x1450dc.target == "_blank") {
              window.open(_0x1450dc.link);
            } else {
              var _0x20e1d2 = _0x1450dc.link;
              _0x47cba3();
              window.location = _0x20e1d2;
              return;
            }
          }
        }
        _0x1f950b = false;
      }
      this.trackProgress = function (_0x201ec5, _0x69ead2, _0x27cfd) {
        _0x150da0(_0x201ec5, _0x69ead2, _0x27cfd);
      };
      function _0x150da0(_0x406f5f, _0x13c738, _0x2ed3c4) {
        if (typeof _0x406f5f === "undefined" && !_0x1f950b) {
          return;
        }
        if (_0x576097) {
          return;
        }
        var _0x54cc5e;
        if (_0x2aa1b2 && _0x395507) {} else {
          if (_0xaad07c == "audio") {
            if (_0x143642) {
              var _0x13c738 = _0x143642.currentTime;
              var _0x2ed3c4 = _0x143642.duration;
              if (typeof _0x143642.buffered !== "undefined" && _0x143642.buffered.length != 0x0) {
                try {
                  var _0x34a1e3 = _0x143642.buffered.end(_0x143642.buffered.length - 0x1);
                } catch (_0x2deb72) {}
                if (!isNaN(_0x34a1e3)) {
                  _0x54cc5e = _0x34a1e3 / Math.floor(_0x143642.duration);
                }
              }
            }
          } else {
            if (_0xaad07c == "video") {
              if (_0x326462) {
                var _0x13c738 = _0x326462.currentTime;
                var _0x2ed3c4 = _0x326462.duration;
                if (typeof _0x326462.buffered !== "undefined" && _0x326462.buffered.length != 0x0) {
                  try {
                    var _0x34a1e3 = _0x326462.buffered.end(_0x326462.buffered.length - 0x1);
                  } catch (_0x29e10c) {}
                  if (!isNaN(_0x34a1e3)) {
                    _0x54cc5e = _0x34a1e3 / Math.floor(_0x326462.duration);
                  }
                }
              }
            } else {
              if (_0xaad07c == "youtube") {
                if (_0x589fef) {
                  var _0x13c738 = _0x589fef.getCurrentTime();
                  var _0x2ed3c4 = _0x589fef.getDuration();
                  _0x54cc5e = _0x589fef.getVideoLoadedFraction();
                }
              } else {
                if (_0xaad07c == 'vimeo') {
                  _0x13c738 = _0x34dba9;
                  _0x2ed3c4 = _0x17e176;
                  _0x54cc5e = _0x34c8d8;
                } else {
                  if (_0xaad07c == "image") {
                    var _0x27611e = _0x1450dc.duration * 0x3e8;
                    var _0x263c06 = new Date().getTime() - _0x195faa;
                    _0x3861a2 -= _0x263c06;
                    if (_0x3861a2 < 0x0) {
                      _0x3861a2 = 0x0;
                    }
                    _0x195faa = new Date().getTime();
                    var _0x13c738 = (_0x27611e - _0x3861a2) / 0x3e8;
                    var _0x2ed3c4 = _0x1450dc.duration;
                    _0x54cc5e = 0x1;
                  }
                }
              }
            }
          }
        }
        if (MVPUtils.isNumber(_0x13c738) && MVPUtils.isNumber(_0x2ed3c4)) {
          var _0x541bce = _0x13c738;
          if (_0x2ed3c4 > 0x0 && !_0x395507) {
            if (_0x5e08d1.length && _0x5e7bb7 && !_0x488eee) {
              if (_0xaad07c == "audio" || _0xaad07c == "video" || _0xaad07c == "youtube" && _0x49c9b1.youtubePlayerType == "chromeless" || _0xaad07c == "vimeo" && _0x4f5c87 == "chromeless") {
                _0x2bfa95(_0x2ed3c4);
                _0x488eee = true;
              }
            }
            if (!_0x2cec26) {
              if (!_0x53e109) {
                _0x152e7e(_0x2ed3c4);
              }
              if (_0x49c9b1.createAdMarkers && _0x420869.length) {
                _0x3cdaec(_0x2ed3c4);
              }
              _0x2cec26 = true;
            }
          }
          if (_0x541bce > _0xac8d7e) {
            _0xac8d7e = _0x541bce;
          }
          if (_0x395507) {
            if (_0x541bce != _0x6a32cc) {
              _0x2ed8f8.html("&nbsp;(-" + MVPUtils.formatTime(_0x2ed3c4 - _0x541bce) + ')');
              if (_0x541bce > 0x0) {
                if (!_0x9f0b79) {
                  _0x9f0b79 = true;
                  _0x35e6d6 = false;
                  _0x329c6d = null;
                  if (typeof _0x1450dc.skipEnable !== "undefined") {
                    _0x329c6d = _0x1450dc.skipEnable;
                    var _0x2ebd23;
                    if (_0x3e7915) {
                      var _0x536580 = _0x453856.getNextCounter(0x1);
                      if (typeof _0x536580 !== "undefined") {
                        var _0x32df6e = _0x1eed68[_0x536580].data;
                        if (_0x32df6e.thumb) {
                          _0x2ebd23 = _0x32df6e.thumb;
                        }
                      }
                    } else {
                      if (_0x465438.thumb) {
                        _0x2ebd23 = _0x465438.thumb;
                      }
                    }
                    if (_0x2ebd23) {
                      _0x2c8ffb("<img src=\"" + _0x2ebd23 + "\" alt=\"next\"/>").appendTo(_0x20f53c.empty().show());
                    } else {
                      _0x32f14f.addClass("mvp-ad-skip-no-thumb");
                    }
                    _0xe0388.show();
                    _0x32f14f.addClass("mvp-ad-skip-btn-visible");
                  }
                }
                if (_0x329c6d != null && !_0x35e6d6) {
                  if (_0x541bce < _0x329c6d) {
                    _0x2fa554.html(_0x3ae78e + "&nbsp;" + (_0x329c6d - parseInt(_0x541bce, 0xa)).toString());
                  } else {
                    _0x35e6d6 = true;
                    _0x32f14f.removeClass("mvp-ad-skip-btn-visible mvp-ad-skip-no-thumb");
                    setTimeout(function () {
                      _0x20f53c.hide();
                      _0xe0388.hide();
                      _0x56e131.show();
                      _0x32f14f.addClass("mvp-ad-skip-btn-visible");
                    }, 0x1f4);
                  }
                }
              }
              if (_0x1450dc.TrackingEvents) {
                var _0x14b238 = _0x13c738 / _0x2ed3c4;
                if (_0x14b238 >= 0.25 && !_0x3f8d85) {
                  _0x58e9d8("firstQuartile");
                  _0x3f8d85 = true;
                } else {
                  if (_0x14b238 >= 0.5 && !_0x59c0f8) {
                    _0x58e9d8('midpoint');
                    _0x59c0f8 = true;
                  } else if (_0x14b238 >= 0.75 && !_0x341968) {
                    _0x58e9d8('thirdQuartile');
                    _0x341968 = true;
                  }
                }
              }
            }
            _0x3911a2 = _0x184401.width();
            if (_0x54cc5e) {
              _0x4f3fc8.width(_0x54cc5e * _0x3911a2);
            }
            _0xd6cb33.width(_0x13c738 / _0x2ed3c4 * _0x3911a2);
          } else {
            if (_0x541bce != _0x6a32cc) {
              if (_0x1450dc.end || _0x1450dc.lockTime && !_0x3d3884) {
                var _0x105a6e = _0x1450dc.end || _0x1450dc.lockTime;
                if (_0x13c738 >= _0x105a6e) {
                  if (_0x1450dc.lockTime) {
                    if (_0xca3476) {
                      clearInterval(_0xca3476);
                    }
                    _0x136c1a = false;
                    if (_0x15885c) {
                      cancelAnimationFrame(_0x15885c);
                      _0x15885c = null;
                    }
                    if (_0x5a3ed3) {
                      if (_0x54d105) {
                        _0x54d105.setAnimationLoop(null);
                      }
                      _0x5a3ed3 = false;
                    }
                    _0x45aac9('watch');
                  } else {
                    if (_0x49c9b1.mediaEndAction != "loop" && _0x49c9b1.mediaEndAction != "rewind") {
                      if (_0xca3476) {
                        clearInterval(_0xca3476);
                      }
                      _0x136c1a = false;
                      if (_0x15885c) {
                        cancelAnimationFrame(_0x15885c);
                        _0x15885c = null;
                      }
                      if (_0x5a3ed3) {
                        if (_0x54d105) {
                          _0x54d105.setAnimationLoop(null);
                        }
                        _0x5a3ed3 = false;
                      }
                    }
                    _0x2af768();
                  }
                  return;
                }
              }
              if (_0x24fb02.length) {
                var _0x2d31e8;
                var _0x5c12b3 = _0x24fb02.length;
                var _0xb5c35c;
                for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
                  _0xb5c35c = _0x24fb02[_0x2d31e8];
                  if (_0x247928.length) {
                    if (_0x541bce > _0xb5c35c.begin - parseInt(_0x49c9b1.adUpcomingMsgTime, 0xa)) {
                      if (_0x541bce > _0xb5c35c.begin - 0x1) {
                        _0x247928.removeClass("mvp-ad-info-start-visible");
                      } else {
                        _0x247928.addClass("mvp-ad-info-start-visible");
                        if (_0x2fc352.length && _0x2fc352.hasClass("mvp-player-controls-visible")) {
                          _0x247928.addClass("mvp-ad-info-start-controls-align");
                        }
                        _0x131d9c.html(parseInt(_0xb5c35c.begin - _0x541bce, 0xa));
                      }
                    }
                  }
                }
              } else {
                if (_0x420869.length) {
                  var _0x2d31e8;
                  var _0x5c12b3 = _0x420869.length;
                  var _0xb5c35c;
                  for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
                    _0xb5c35c = _0x420869[_0x2d31e8];
                    if (_0x247928.length) {
                      if (_0x541bce > _0xb5c35c.begin - parseInt(_0x49c9b1.adUpcomingMsgTime, 0xa)) {
                        if (_0x541bce > _0xb5c35c.begin - 0x1) {
                          _0x247928.removeClass('mvp-ad-info-start-visible');
                        } else {
                          _0x247928.addClass("mvp-ad-info-start-visible");
                          if (_0x2fc352.length && _0x2fc352.hasClass("mvp-player-controls-visible")) {
                            _0x247928.addClass("mvp-ad-info-start-controls-align");
                          }
                          _0x131d9c.html(parseInt(_0xb5c35c.begin - _0x541bce, 0xa));
                        }
                      }
                    }
                    if (_0x541bce >= _0xb5c35c.begin && _0x541bce < _0xb5c35c.begin + 0x1) {
                      if (!_0xb5c35c.played) {
                        _0x31f22e = _0x1808b1.width();
                        _0x34f818 = _0x134a79.width();
                        _0x1808b1.addClass("mvp-progress-sizing");
                        _0x134a79.addClass("mvp-progress-sizing");
                        if (_0xca3476) {
                          clearInterval(_0xca3476);
                        }
                        _0x136c1a = false;
                        if (_0x15885c) {
                          cancelAnimationFrame(_0x15885c);
                          _0x15885c = null;
                        }
                        if (_0x5a3ed3) {
                          if (_0x54d105) {
                            _0x54d105.setAnimationLoop(null);
                          }
                          _0x5a3ed3 = false;
                        }
                        _0xb5c35c.played = true;
                        _0x1baffa = _0xb5c35c.begin;
                        if (_0x49c9b1.playAdsOnlyOnce) {
                          _0x420869[_0x2d31e8].marker.remove();
                          _0x420869.splice(_0x2d31e8, 0x1);
                        }
                        _0x35ea78();
                        if (_0xb5c35c.data.type) {
                          _0x1450dc = _0xb5c35c.data;
                        } else {
                          _0x1450dc = _0x35278d(_0xb5c35c.data);
                        }
                        _0x395507 = true;
                        if (_0x1450dc.origtype == 's3_video' || _0x1450dc.origtype == "s3_audio") {
                          _0xe718f4(_0x1450dc);
                        } else {
                          _0x1f4eb8();
                        }
                        return;
                      }
                    } else if (_0x541bce > _0xb5c35c.begin + 0x1) {
                      _0xb5c35c.played = false;
                    }
                  }
                } else {
                  if (_0x450dd1.length) {
                    if (_0x541bce > _0x2ed3c4 - parseInt(_0x49c9b1.adUpcomingMsgTime, 0xa)) {
                      if (_0x541bce > _0x2ed3c4 - 0x1) {
                        _0x247928.removeClass("mvp-ad-info-start-visible");
                      } else {
                        _0x247928.addClass("mvp-ad-info-start-visible");
                        if (_0x2fc352.length && _0x2fc352.hasClass("mvp-player-controls-visible")) {
                          _0x247928.addClass("mvp-ad-info-start-controls-align");
                        }
                        _0x131d9c.html(parseInt(_0x2ed3c4 - _0x541bce, 0xa));
                      }
                    }
                  }
                }
              }
              if (_0x52e080.length) {
                var _0x2d31e8;
                var _0x5c12b3 = _0x52e080.length;
                var _0x59dfd2;
                var _0x4adfcc;
                var _0x42a190;
                var _0x523c7c;
                for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
                  _0x59dfd2 = _0x52e080[_0x2d31e8];
                  _0x4adfcc = _0x59dfd2.start;
                  _0x42a190 = _0x59dfd2.end;
                  _0x523c7c = _0x59dfd2.item;
                  if (_0x541bce >= _0x4adfcc && _0x541bce <= _0x42a190 - 0x1) {
                    if (!_0x523c7c.mvpvisible) {
                      if (_0x523c7c.hasClass('mvp-annotation-iframe')) {
                        var _0x5b45a4 = _0x523c7c.find("iframe");
                        _0x5b45a4.attr("src", _0x5b45a4.attr('data-src'));
                      } else {
                        if (_0x523c7c.hasClass("mvp-annotation-shortcode") && !_0x523c7c.hasClass("mvp-annotation-shortcode-ready")) {
                          if (window.location.protocol != "file:") {
                            var _0x1c2cc9 = _0x523c7c.addClass("mvp-annotation-shortcode-ready mvp-hidden").find(".mvp-annotation-shortcode-content").html();
                            _0xefa101(_0x523c7c, _0x1c2cc9);
                          }
                        }
                      }
                      _0x523c7c.css("display", "block");
                      setTimeout(function (_0x34bfb1) {
                        console.log(_0x34bfb1);
                        _0x34bfb1.addClass("mvp-annotation-visible");
                      }, 0x14, _0x523c7c);
                      _0x523c7c.mvpvisible = true;
                    }
                  } else {
                    if (_0x523c7c.mvpvisible) {
                      _0x523c7c.css("display", "none").removeClass("mvp-annotation-visible");
                      if (_0x523c7c.hasClass("mvp-annotation-iframe")) {
                        _0x523c7c.find("iframe").attr('src', 'about:blank');
                      } else {
                        if (_0x523c7c.hasClass("mvp-annotation-shortcode")) {}
                      }
                      _0x523c7c.mvpvisible = false;
                    }
                  }
                }
              }
              if (_0x387696 && _0x5d71e2.length) {
                var _0x2d31e8;
                var _0x5c12b3 = _0x5d71e2.length;
                var _0x523c7c;
                var _0x50c038;
                var _0x2c389a;
                for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
                  _0x523c7c = _0x5d71e2[_0x2d31e8];
                  _0x50c038 = _0x523c7c.start;
                  _0x2c389a = _0x523c7c.end;
                  if (_0x541bce >= _0x50c038 && _0x541bce <= _0x2c389a) {
                    if (!_0x275e34) {
                      _0x275e34 = _0x2c8ffb("<div class=\"mvp-subtitle\">" + _0x523c7c.text + "</div>");
                      if (_0x2fc352.hasClass("mvp-player-controls-visible")) {
                        _0x2a65bd.addClass("mvp-subtitle-visible");
                      }
                      _0x275e34.start = _0x50c038;
                      _0x275e34.end = _0x2c389a;
                      _0x2a65bd.append(_0x275e34);
                    }
                  } else if (_0x275e34) {
                    if (_0x541bce < _0x275e34.start || _0x541bce > _0x275e34.end) {
                      _0x275e34.remove();
                      _0x275e34 = null;
                    }
                  }
                }
              }
              if (_0x488eee) {
                var _0x2d31e8;
                var _0x5c12b3 = _0x5e08d1.length;
                var _0x523c7c;
                var _0x50c038;
                var _0x2c389a;
                for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
                  _0x523c7c = _0x5e08d1[_0x2d31e8];
                  _0x50c038 = _0x523c7c.start;
                  _0x2c389a = _0x523c7c.end;
                  if (_0x541bce >= _0x50c038 && _0x541bce <= _0x2c389a) {
                    if (!_0x956980) {
                      _0x3b7564(_0x2d31e8);
                    }
                  } else if (_0x956980) {
                    if (_0x541bce < _0x956980.start || _0x541bce > _0x956980.end) {
                      _0x956980 = null;
                    }
                  }
                }
              }
              if (_0x360693 && _0x54c3c8) {
                _0x590237(_0x13c738);
              }
              if (_0x2ed3c4 > 0x0) {
                if (!_0x33f920) {
                  if (_0x6abeef.hasClass("mvp-upnext-on")) {
                    if (_0x541bce > _0x2ed3c4 - _0x49c9b1.upNextTime) {
                      _0x6abeef.addClass('mvp-upnext-visible');
                    } else {
                      _0x6abeef.removeClass("mvp-upnext-visible");
                    }
                  }
                }
              }
              _0x40d4b4.html(MVPUtils.formatTime(_0x541bce));
              _0xc5351f.html(MVPUtils.formatTime(_0x2ed3c4));
            }
            _0x1a31d5 = _0x8083b8.width();
            if (_0x54cc5e && _0x54cc5e != 0x1) {
              _0x583d93.width(_0x54cc5e * _0x1a31d5);
            }
            _0x1808b1.width(_0x13c738 / _0x2ed3c4 * _0x1a31d5);
            _0x134a79.width(_0x13c738 / _0x2ed3c4 * _0x381e37.width());
          }
          if (_0x49c9b1.caption_breakPointArr && !_0x5bab07 && _0x275e34) {
            var _0x5316e7 = _0x2a65bd.width();
            var _0x2d31e8;
            var _0x5c12b3 = _0x49c9b1.caption_breakPointArr.length;
            var _0x2f6ae9;
            var _0x39d9c1;
            for (_0x2d31e8 = 0x0; _0x2d31e8 < _0x5c12b3; _0x2d31e8++) {
              _0x2f6ae9 = _0x49c9b1.caption_breakPointArr[_0x2d31e8];
              if (_0x5316e7 > _0x2f6ae9.width) {
                _0x39d9c1 = _0x2f6ae9.size;
              }
            }
            _0x2a65bd.css('fontSize', _0x39d9c1 + 'px');
            _0x5bab07 = true;
          }
          _0x6a32cc = _0x541bce;
        }
      }
      function _0x152e7e(_0x48ef26) {
        _0x53e109 = true;
        var _0x26a384;
        var _0x1ea844 = _0x420869.length;
        var _0x290773;
        for (_0x26a384 = 0x0; _0x26a384 < _0x1ea844; _0x26a384++) {
          _0x290773 = _0x420869[_0x26a384].begin;
          if (typeof _0x290773 === "string" && _0x290773.indexOf('%') != -0x1) {
            var _0x1ee561 = _0x48ef26 || _0x5ca0d3.getDuration();
            if (_0x1ee561) {
              if (_0x290773 < 0x0) {
                _0x290773 = 0x0;
              } else {
                if (_0x290773 > 0x64) {
                  _0x290773 = 0x64;
                }
              }
              _0x290773 = _0x290773.substr(0x0, _0x290773.length - 0x1);
              _0x420869[_0x26a384].begin = Math.round(_0x290773 / 0x64 * _0x1ee561);
            }
          } else {
            _0x420869[_0x26a384].begin = parseInt(_0x290773, 0xa);
          }
        }
        MVPUtils.keysrt(_0x420869, "begin");
      }
      function _0x1f4e81() {
        var _0x178c31 = _0x1450dc.skipEnable;
        if (typeof _0x178c31 === "string" && _0x178c31.indexOf('%') != -0x1) {
          var _0x85aa85 = _0x5ca0d3.getDuration();
          if (_0x85aa85) {
            if (_0x178c31 < 0x0) {
              _0x178c31 = 0x0;
            } else {
              if (_0x178c31 > 0x64) {
                _0x178c31 = 0x64;
              }
            }
            _0x178c31 = _0x178c31.substr(0x0, _0x178c31.length - 0x1);
            _0x1450dc.skipEnable = Math.round(_0x178c31 / 0x64 * _0x85aa85);
          }
        }
      }
      _0x5ca0d3.togglePlayBtn = function (_0x3e63dc) {
        if (_0x3e63dc) {
          _0x105ccb.show();
          _0x8f9621.find(".mvp-btn-play").show();
          _0x8f9621.find('.mvp-btn-pause').hide();
        } else {
          _0x105ccb.hide();
          _0x8f9621.find(".mvp-btn-play").hide();
          _0x8f9621.find('.mvp-btn-pause').show();
        }
      };
      _0x5ca0d3.updateMediaTime = function (_0x11d72f, _0x4545b1) {
        _0x40d4b4.html(MVPUtils.formatTime(_0x11d72f));
        _0xc5351f.html(MVPUtils.formatTime(_0x4545b1));
        if (!_0x3202d5) {
          _0x1a31d5 = _0x8083b8.width();
          _0x1808b1.width(_0x11d72f / _0x4545b1 * _0x1a31d5);
          _0x134a79.width(_0x11d72f / _0x4545b1 * _0x381e37.width());
        }
      };
      _0x5ca0d3.toggleRel = function () {
        if (_0x3f7bc0) {
          _0x181688.one('transitionend', function () {
            _0x181688.css("display", "none");
            _0x3f7bc0 = false;
          }).removeClass("mvp-holder-visible");
        } else {
          _0x181688.css("display", 'block');
          setTimeout(function () {
            _0x181688.addClass('mvp-holder-visible');
            _0x3f7bc0 = true;
            _0x4a9ebf.build();
          }, 0x14);
        }
      };
      if (_0x49c9b1.useStatistics) {
        _0x507d3f(_0x38d31a, function (_0x426a27) {
          if (window.event) {
            window.event.cancelBubble = true;
          }
          if (_0x1450dc) {
            _0x57fdf0();
          }
        });
        if (_0x49c9b1.ipInfo) {
          _0x9808af = _0x49c9b1.ipInfo;
        }
      }
      function _0x145691(_0x26e93b, _0x3d50ad) {
        if (window.location.protocol == "file:") {
          return;
        }
        if (!_0x1eed68[_0x3d50ad]) {
          return;
        }
        var _0x69224e = _0x1eed68[_0x3d50ad].data;
        if (_0x69224e.mediaId == undefined) {
          return;
        }
        if (_0xd3a404 == undefined) {
          return;
        }
        if (_0x26e93b == 'mvp_play_count') {
          var _0x5f0cfe = [{
            'name': "action",
            'value': _0x26e93b
          }, {
            'name': 'percentToCountAsPlay',
            'value': _0x49c9b1.percentToCountAsPlay
          }, {
            'name': "playlist_id",
            'value': _0xd3a404
          }, {
            'name': "media_id",
            'value': _0x69224e.mediaId
          }, {
            'name': "title",
            'value': _0x69224e.safeTitle || ''
          }, {
            'name': "currentTime",
            'value': _0x5ca0d3.getCurrentTime()
          }, {
            'name': 'duration',
            'value': _0x5ca0d3.getDuration()
          }, {
            'name': 'countryData',
            'value': _0x9808af ? JSON.stringify(_0x9808af) : null
          }, {
            'name': "thumb",
            'value': _0x69224e.thumb || _0x69224e.thumbDefault || null
          }, {
            'name': 'video_url',
            'value': _0x1667c6
          }];
        } else {
          if (_0x26e93b == "mvp_download_count" || _0x26e93b == 'mvp_finish_count') {
            var _0x5f0cfe = [{
              'name': "action",
              'value': _0x26e93b
            }, {
              'name': "playlist_id",
              'value': _0xd3a404
            }, {
              'name': "media_id",
              'value': _0x69224e.mediaId
            }, {
              'name': "title",
              'value': _0x69224e.safeTitle || ''
            }];
          }
        }
        console.log(_0x5f0cfe);
        _0x2c8ffb.ajax({
          'url': _0x49c9b1.ajax_url,
          'type': 'post',
          'data': _0x5f0cfe,
          'dataType': "json"
        }).done(function (_0x1cf386) {}).fail(function (_0x436df3, _0x3d3676, _0x2a1c6b) {
          console.log("Error getStats: " + _0x436df3.responseText, _0x3d3676, _0x2a1c6b);
        });
      }
      function _0xefa101(_0x1c948a, _0x2710cc) {
        var _0x5ce912 = [{
          'name': "action",
          'value': "mvp_annotation_shortcode"
        }, {
          'name': 'shortcode',
          'value': JSON.stringify(_0x2710cc)
        }, {
          'name': 'annotation_id',
          'value': _0x1c948a.attr("data-id")
        }];
        _0x2c8ffb.ajax({
          'url': _0x49c9b1.ajax_url,
          'type': 'post',
          'data': _0x5ce912,
          'dataType': 'json'
        }).done(function (_0x453623) {
          var _0x310af = _0x474086.find(".mvp-annotation[data-id=" + _0x453623.annotation_id + ']');
          if (_0x310af.length) {
            _0x310af.find(".mvp-annotation-shortcode-content").html(_0x453623.output);
            _0x310af.removeClass("mvp-hidden");
          }
        }).fail(function (_0x337863, _0x10b043, _0x3e6854) {
          console.log("Error doAnnotationShortcode: " + _0x337863.responseText, _0x10b043, _0x3e6854);
        });
      }
      this.mediaEndHandler = function () {
        _0x2af768();
      };
      function _0x2af768() {
        if (_0x2aa1b2) {
          if (_0x19ddcc.getHasPostRoll()) {
            _0x19ddcc.contentComplete();
            return;
          }
          _0x395507 = false;
        }
        if (_0x395507) {
          if (_0x1450dc.TrackingEvents) {
            _0x58e9d8("complete");
          }
          _0x2c8ffb(_0x5ca0d3).trigger("adEnd", {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
        } else {
          if (_0x49c9b1.useStatistics) {
            _0x145691("mvp_finish_count", _0x48707c);
          }
          if (_0x49c9b1.mediaEndAction != "next" && _0x49c9b1.mediaEndAction != "comingnext") {
            _0x57fdf0();
          }
        }
        if (_0x241405 && typeof ga !== "undefined") {
          if (_0x395507) {
            var _0xd3c9b0 = "AD ended";
            var _0x29006a = "AD title: " + _0x1450dc.title;
          } else {
            var _0xd3c9b0 = "Video ended";
            var _0x29006a = "Video title: " + _0x1450dc.title;
          }
          ga('send', {
            'hitType': "event",
            'eventCategory': "Modern video player: " + _0x49c9b1.instanceName,
            'eventAction': _0xd3c9b0,
            'eventLabel': _0x29006a,
            'nonInteraction': true
          });
        }
        if (typeof _0x1450dc.endLink !== 'undefined') {
          if (_0x1450dc.endTarget == '_blank') {
            window.open(_0x1450dc.endLink);
          } else {
            var _0x23563d = _0x1450dc.endLink;
            _0x47cba3();
            window.location = _0x23563d;
            return;
          }
        }
        if (_0x395507 && !_0x3e7915) {
          _0x35ea78();
          if (_0x319b1b.length && _0x28e3ab < _0x319b1b.length - 0x1) {
            _0x28e3ab++;
            if (_0x319b1b[_0x28e3ab].type) {
              if (_0x319b1b[_0x28e3ab].data) {
                _0x1450dc = _0x319b1b[_0x28e3ab].data;
              } else {
                _0x1450dc = _0x319b1b[_0x28e3ab];
              }
            } else {
              _0x1450dc = _0x35278d(_0x319b1b[_0x28e3ab]);
            }
            _0x395507 = true;
          } else {
            _0x319b1b = [];
            _0x28e3ab = -0x1;
            _0x1450dc = _0x465438;
          }
          if (_0x1450dc.origtype && (_0x1450dc.origtype == "s3_audio" || _0x1450dc.origtype == "s3_video")) {
            _0xe718f4(_0x1450dc);
          } else {
            _0x1f4eb8();
          }
        } else {
          if (_0x450dd1.length && _0x28e3ab < _0x450dd1.length - 0x1) {
            _0x537dc7();
            _0x28e3ab++;
            if (_0x450dd1[_0x28e3ab].type) {
              if (_0x450dd1[_0x28e3ab].data) {
                _0x1450dc = _0x450dd1[_0x28e3ab].data;
              } else {
                _0x1450dc = _0x450dd1[_0x28e3ab];
              }
            } else {
              _0x1450dc = _0x35278d(_0x450dd1[_0x28e3ab]);
            }
            _0x3e7915 = true;
            _0x395507 = true;
            if (_0x1450dc && (_0x1450dc.origtype == "s3_video" || _0x1450dc.origtype == "s3_audio")) {
              _0xe718f4(_0x1450dc);
            } else {
              _0x1f4eb8();
            }
            return;
          }
          _0x2c8ffb(_0x5ca0d3).trigger('mediaEnd', {
            'instance': _0x5ca0d3,
            'instanceName': _0x49c9b1.instanceName,
            'media': _0x1450dc
          });
          var _0xc23f69 = _0x1450dc.start || 0x0;
          if (_0x49c9b1.mediaEndAction == 'next') {
            _0x3199b6();
          } else {
            if (_0x49c9b1.mediaEndAction == "rel") {
              if (_0xaad07c == "audio") {
                if (_0x143642) {
                  _0x143642.currentTime = _0xc23f69;
                  _0x143642.pause();
                }
              } else {
                if (_0xaad07c == 'video') {
                  if (_0x326462) {
                    _0x326462.currentTime = _0xc23f69;
                    _0x326462.pause();
                    _0x1fcacb();
                  }
                } else {
                  if (_0xaad07c == "youtube") {
                    if (_0x589fef) {
                      _0x589fef.seekTo(_0xc23f69);
                      _0x589fef.pauseVideo();
                    }
                  } else if (_0xaad07c == "vimeo") {
                    if (_0x24e760) {
                      _0x24e760.pause();
                      _0x24e760.setCurrentTime(_0xc23f69);
                    }
                  }
                }
              }
              if (_0x208e6f.find(".mvp-rel-playlist").length) {
                if (typeof MVPRelPagination === "undefined") {
                  var _0x4010d9 = document.createElement("script");
                  _0x4010d9.type = "text/javascript";
                  _0x4010d9.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.rel_js);
                  _0x4010d9.onload = _0x4010d9.onreadystatechange = function () {
                    if (!this.readyState || this.readyState == "complete") {
                      if (!_0x4a9ebf) {
                        _0x4a9ebf = new MVPRelPagination({
                          'parent': _0x5ca0d3,
                          'wrapper': _0x181688,
                          'settings': _0x49c9b1
                        });
                      }
                      _0x5ca0d3.toggleRel();
                    }
                  };
                  _0x4010d9.onerror = function () {
                    console.log("Error loading " + this.src);
                  };
                  var _0x9ed873 = document.getElementsByTagName("script")[0x0];
                  _0x9ed873.parentNode.insertBefore(_0x4010d9, _0x9ed873);
                } else {
                  if (!_0x4a9ebf) {
                    _0x4a9ebf = new MVPRelPagination({
                      'wrapper': _0x181688,
                      'settings': _0x49c9b1
                    });
                  }
                  _0x5ca0d3.toggleRel();
                }
              } else {
                console.log("No related playlists found!");
              }
            } else {
              if (_0x49c9b1.mediaEndAction == "comingnext") {
                if (_0xaad07c == 'audio') {
                  if (_0x143642) {
                    _0x143642.currentTime = _0xc23f69;
                    _0x143642.pause();
                  }
                } else {
                  if (_0xaad07c == "video") {
                    if (_0x326462) {
                      _0x326462.currentTime = _0xc23f69;
                      _0x326462.pause();
                    }
                  } else {
                    if (_0xaad07c == "youtube") {
                      if (_0x589fef) {
                        _0x589fef.seekTo(_0xc23f69);
                        _0x589fef.pauseVideo();
                      }
                    } else if (_0xaad07c == "vimeo") {
                      if (_0x24e760) {
                        _0x24e760.pause();
                        _0x24e760.setCurrentTime(_0xc23f69);
                      }
                    }
                  }
                }
                var _0x3c30f0 = _0x453856.getNextCounter(0x1);
                var _0x2afbc3;
                if (typeof _0x3c30f0 !== "undefined") {
                  _0x2afbc3 = _0x1eed68[_0x3c30f0].data;
                  _0x1b6b25(_0x2afbc3);
                }
              } else {
                if (_0x49c9b1.mediaEndAction == 'loop') {
                  if (_0xaad07c == "audio") {
                    if (_0x143642) {
                      _0x143642.currentTime = _0xc23f69;
                      _0x143642.play();
                    }
                  } else {
                    if (_0xaad07c == 'video') {
                      if (_0x326462) {
                        _0x326462.currentTime = _0xc23f69;
                        _0x326462.play();
                      }
                    } else {
                      if (_0xaad07c == 'youtube') {
                        if (_0x589fef) {
                          _0x589fef.seekTo(_0xc23f69);
                          _0x589fef.playVideo();
                        }
                      } else if (_0xaad07c == "vimeo") {
                        if (_0x24e760) {
                          _0x24e760.setCurrentTime(_0xc23f69);
                        }
                      }
                    }
                  }
                } else {
                  if (_0x49c9b1.mediaEndAction == "rewind") {
                    if (_0xaad07c == "audio") {
                      if (_0x143642) {
                        _0x143642.currentTime = _0xc23f69;
                        _0x143642.pause();
                      }
                    } else {
                      if (_0xaad07c == 'video') {
                        if (_0x326462) {
                          _0x326462.currentTime = _0xc23f69;
                          _0x326462.pause();
                        }
                      } else {
                        if (_0xaad07c == "youtube") {
                          if (_0x589fef) {
                            _0x589fef.seekTo(_0xc23f69);
                            _0x589fef.pauseVideo();
                          }
                        } else if (_0xaad07c == "vimeo") {
                          if (_0x24e760) {
                            _0x24e760.pause();
                            _0x24e760.setCurrentTime(_0xc23f69);
                          }
                        }
                      }
                    }
                  } else {
                    if (_0x49c9b1.mediaEndAction == "poster") {
                      if (_0xaad07c == "audio") {
                        if (_0x143642) {
                          _0x143642.currentTime = _0xc23f69;
                          _0x143642.pause();
                        }
                      } else {
                        if (_0xaad07c == "video") {
                          if (_0x326462) {
                            _0x326462.currentTime = _0xc23f69;
                            _0x326462.pause();
                          }
                          if (_0x1450dc.poster) {
                            _0x1a96c8 = false;
                            if (_0x5ee613 && _0x1450dc.is360) {
                              if (_0x1450dc.vrMode == "monoscopic") {
                                if (_0x1e5081) {
                                  _0x1e5081.hide();
                                }
                              } else {
                                if (_0x45dc47) {
                                  _0x45dc47.hide();
                                }
                              }
                            } else {
                              _0x395d2f.hide();
                            }
                            _0x203a19();
                          }
                        } else {
                          if (_0xaad07c == 'youtube') {
                            if (_0x589fef) {
                              _0x589fef.seekTo(_0xc23f69);
                              _0x589fef.pauseVideo();
                            }
                            if (_0x1450dc.poster) {
                              _0x1a96c8 = false;
                              _0x40f633.hide();
                              _0x203a19();
                            }
                          } else if (_0xaad07c == "vimeo") {
                            if (_0x24e760) {
                              _0x24e760.pause();
                              _0x24e760.setCurrentTime(_0xc23f69);
                            }
                            if (_0x1450dc.poster) {
                              _0x1a96c8 = false;
                              _0x404808.hide();
                              _0x203a19();
                            }
                          }
                        }
                      }
                    } else {
                      if (_0x49c9b1.mediaEndAction == "custom") {
                        if (_0x49c9b1.mediaEndActionCustom) {
                          _0x5a295c = _0x2c8ffb(_0x49c9b1.mediaEndActionCustom).appendTo(_0x93b161);
                        }
                      } else {
                        if (_0x49c9b1.mediaEndAction == 'image' && _0x49c9b1.mediaEndImage) {
                          _0x5ca0d3.pauseMedia();
                          if (!_0x29a19c) {
                            _0x29a19c = _0x2c8ffb("<div class=\"mvp-media-end-image-holder\"/>").appendTo(_0x93b161);
                          }
                          _0x2c8ffb(new Image()).addClass("mvp-media-end-image mvp-media").appendTo(_0x29a19c).on("load", function () {
                            _0x39440f = _0x2c8ffb(this);
                            MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x39440f);
                            _0x39440f.addClass("mvp-visible");
                            if (_0x49c9b1.mediaEndImageUrl) {
                              _0x29a19c.one('click', function () {
                                if (_0x49c9b1.mediaEndImageUrlTarget && _0x49c9b1.mediaEndImageUrlTarget == "_blank") {
                                  window.open(_0x49c9b1.mediaEndImageUrl);
                                } else {
                                  window.location = _0x49c9b1.mediaEndImageUrl;
                                  return;
                                }
                              });
                            }
                          }).on("error", function (_0x2e6f29) {
                            console.log(_0x2e6f29);
                          }).attr({
                            'src': _0x49c9b1.mediaEndImage
                          });
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
      function _0x1b6b25(_0xe113b5) {
        if (_0xe113b5.poster || _0xe113b5.thumb) {
          var _0x786c97 = _0xe113b5.poster || _0xe113b5.thumb;
          _0x2c8ffb(new Image()).addClass("mvp-media").appendTo(_0x4abb38.empty()).on("load", function () {
            _0x2cc5c3 = _0x2c8ffb(this);
            MVPAspectRatio.resizeMedia('image', _0x588042, _0x93b161, _0x2cc5c3);
            _0x2cc5c3.addClass("mvp-visible");
          }).on("error", function (_0x3868be) {
            console.log(_0x3868be);
          }).attr({
            'src': _0x786c97,
            'alt': _0x1450dc.title
          });
        }
        var _0x33cdfa = _0xe113b5.title;
        if (_0xe113b5.duration) {
          _0x33cdfa += " <span class=\"mvp-comingnext-duration\">(" + MVPUtils.formatTime(_0xe113b5.duration) + ")</span>";
        }
        _0x8254b4.html(_0x33cdfa);
        _0x1391aa.css("display", "block");
        setTimeout(function () {
          _0x1391aa.addClass("mvp-holder-visible");
          _0x183900 = true;
          var _0x141687 = 0x1;
          _0x6d4734.css('stroke-dashoffset', '169' - 0x1 * ('169' / _0x49c9b1.comingnextTime));
          _0xd32047 = setInterval(function () {
            if (!_0xd32047) {
              return;
            }
            if (_0x141687 == _0x49c9b1.comingnextTime) {
              clearInterval(_0xd32047);
              _0xd32047 = null;
              _0x3199b6();
              return;
            }
            var _0xb28a0c = '169' - (_0x141687 + 0x1) * ('169' / _0x49c9b1.comingnextTime);
            _0x6d4734.css("stroke-dashoffset", _0xb28a0c);
            _0x141687++;
          }, 0x3e8);
        }, 0x14);
      }
      function _0x51e834() {
        if (_0xd32047) {
          clearInterval(_0xd32047);
          _0xd32047 = null;
        }
        if (_0x183900) {
          _0x1391aa.one("transitionend", function () {
            _0x1391aa.css("display", 'none');
            _0x183900 = false;
            _0x4abb38.empty();
            _0x2cc5c3 = null;
            _0x8254b4.html('');
            _0x6d4734.css("stroke-dashoffset", '169');
          }).removeClass("mvp-holder-visible");
        }
      }
      if (_0x49c9b1.addResizeEvent) {
        _0x48f7fc.on("resize", function () {
          if (!_0x588a79) {
            return false;
          }
          if (_0xb63b8e) {
            clearTimeout(_0xb63b8e);
          }
          _0xb63b8e = setTimeout(_0x31d45c, 0xfa);
        });
        window.addEventListener("orientationchange", _0x320e4e);
      }
      function _0x320e4e() {
        setTimeout(function () {
          _0x31d45c();
        }, 0x32);
      }
      function _0x31d45c() {
        if (!_0x588a79) {
          return false;
        }
        if (!_0x49c9b1.addResizeEvent) {
          return false;
        }
        if (_0x49c9b1.createPlayer) {
          var _0x53f31a = MVPUtils.getViewportSize(_0x36b677);
          if (_0x2e3f69 == "normal") {
            if (_0x2629f6) {
              if (_0x59a538 == "wall") {} else {
                _0x53f31a.h -= _0x2629f6;
              }
            }
          }
          if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
            var _0x546098 = _0x40300f;
          } else {
            _0x546098 = _0x550351;
          }
          if (_0x59a538 == "vrb") {
            if (_0x546098.width() > _0x49c9b1.verticalBottomSepearator) {
              if (_0x521020) {
                _0x550351.removeClass("mvp-ps-drot").addClass("mvp-ps-dot");
              }
              _0x349f0e.removeClass("mvp-playlist-holder-bottom").width(_0x49c9b1.playlistSideWidth);
              if (_0x49c9b1.playlistOpened) {
                var _0x378723 = _0x546098.width() - _0x349f0e.width();
              } else {
                var _0x378723 = _0x546098.width();
              }
              _0x93b161.width(_0x378723);
              if (_0x2e3f69 == 'fullscreen') {
                var _0x2306cf = _0x546098.height();
              } else {
                var _0x20c218 = _0x546098.width();
                if (_0x49c9b1.combinePlayerRatio) {
                  var _0x2306cf = _0x378723 / _0x49c9b1.playerRatio;
                } else {
                  var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
                }
              }
              if (_0x2306cf > _0x53f31a.h) {
                _0x2306cf = _0x53f31a.h;
              }
              _0x93b161.height(_0x2306cf);
              _0x349f0e.height(_0x2306cf);
              _0x546098.height(_0x2306cf);
            } else {
              if (_0x521020) {
                _0x550351.removeClass('mvp-ps-dot').addClass("mvp-ps-drot");
                if (_0x2b1fae == "scroll" && _0x49c9b1.playlistScrollType == "perfect-scrollbar") {
                  if (_0x2cb5ab) {
                    _0x2cb5ab.updateScrollPosition();
                  }
                }
              }
              _0x349f0e.addClass("mvp-playlist-holder-bottom");
              var _0x20c218 = _0x546098.width();
              var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
              if (_0x2306cf > _0x53f31a.h) {
                _0x2306cf = _0x53f31a.h;
              }
              _0x93b161.css({
                'height': _0x2306cf,
                'width': _0x20c218
              });
              _0x349f0e.css({
                'height': _0x49c9b1.playlistBottomHeight,
                'width': "100%"
              });
              if (_0x49c9b1.playlistOpened) {
                _0x546098.height(_0x2306cf + _0x349f0e.height());
              } else {
                _0x546098.height(_0x2306cf);
              }
              if (_0x2e3f69 == 'fullscreen') {
                if (_0x49c9b1.playlistOpened) {
                  _0x93b161.height(_0x546098.height() - _0x349f0e.height());
                } else {
                  _0x93b161.height(_0x546098.height());
                }
              }
            }
          } else {
            if (_0x59a538 == 'vb') {
              var _0x20c218 = _0x546098.width();
              var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
              if (_0x2306cf > _0x53f31a.h) {
                _0x2306cf = _0x53f31a.h;
              }
              _0x93b161.height(_0x2306cf);
              if (_0x49c9b1.playlistOpened) {
                _0x546098.height(_0x2306cf + _0x349f0e.height());
              } else {
                _0x546098.height(_0x2306cf);
              }
              if (_0x2e3f69 == "fullscreen") {
                if (_0x49c9b1.playlistOpened) {
                  _0x93b161.height(_0x546098.height() - _0x349f0e.height());
                } else {
                  _0x93b161.height(_0x546098.height());
                }
              }
            } else {
              if (_0x59a538 == 'hb') {
                var _0x20c218 = _0x546098.width();
                var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
                if (_0x2306cf > _0x53f31a.h) {
                  _0x2306cf = _0x53f31a.h;
                }
                if (_0x2306cf > 0x1f4 && _0x53f31a.h <= _0x2306cf) {
                  _0x546098.height(_0x2306cf);
                  if (_0x49c9b1.playlistOpened) {
                    _0x93b161.height(_0x2306cf - _0x349f0e.height());
                  } else {
                    _0x93b161.height(_0x2306cf);
                  }
                } else {
                  _0x93b161.height(_0x2306cf);
                  if (_0x49c9b1.playlistOpened) {
                    _0x546098.height(_0x2306cf + _0x349f0e.height());
                  } else {
                    _0x546098.height(_0x2306cf);
                  }
                  if (_0x2e3f69 == "fullscreen") {
                    if (_0x49c9b1.playlistOpened) {
                      _0x93b161.height(_0x546098.height() - _0x349f0e.height());
                    } else {
                      _0x93b161.height(_0x546098.height());
                    }
                  }
                }
              } else {
                if (_0x59a538 == "wall") {
                  if (_0x2e3f69 == 'normal' && _0x34e44f) {
                    var _0x20c218 = _0x20ec37.width();
                    var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
                    if (_0x2306cf > _0x53f31a.h) {
                      _0x2306cf = _0x53f31a.h;
                      _0x2306cf = _0x2306cf - _0x2629f6;
                      _0x3ed710.removeClass("mvp-lightbox-center");
                    } else {
                      _0x3ed710.addClass('mvp-lightbox-center');
                    }
                    _0x20ec37.height(_0x2306cf);
                  }
                } else {
                  if (_0x59a538 == 'outer') {
                    if (_0x2e3f69 == "fullscreen") {
                      _0x93b161.height(_0x546098.height());
                    } else {
                      var _0x20c218 = _0x546098.width();
                      var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
                      if (_0x2306cf > _0x53f31a.h) {
                        _0x2306cf = _0x53f31a.h;
                      }
                      _0x93b161.height(_0x2306cf);
                    }
                  } else {
                    if (_0x59a538 == 'no-playlist') {
                      var _0x20c218 = _0x546098.width();
                      var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
                      if (_0x2306cf > _0x53f31a.h) {
                        _0x2306cf = _0x53f31a.h;
                      }
                      _0x546098.height(_0x2306cf);
                    }
                  }
                }
              }
            }
          }
          if (_0x49c9b1.playerType == "lightbox" && _0x59a538 != 'wall') {
            if (_0x2e3f69 == "normal") {
              var _0x20c218 = _0x20ec37.width();
              var _0x2306cf = _0x20c218 / _0x49c9b1.playerRatio;
              var _0x53f31a = MVPUtils.getViewportSize(_0x36b677);
              var _0x2306cf = _0x546098.height();
              if (_0x2306cf > _0x53f31a.h) {
                _0x2306cf = _0x53f31a.h;
                _0x2306cf = _0x2306cf - _0x2629f6;
                _0x3ed710.removeClass("mvp-lightbox-center");
              } else {
                _0x3ed710.addClass('mvp-lightbox-center');
              }
              _0x20ec37.height(_0x2306cf);
            }
          }
          if (_0x116683) {
            if (_0x49c9b1.gridType == "javascript" && _0x49c9b1.breakPointArr) {
              _0x2516e4();
              if (_0x37cc09 != _0x2804ba) {
                _0x2804ba = _0x37cc09;
                _0x223a1c.find('.mvp-playlist-item').each(function () {
                  if (_0x153025 > 0x0) {
                    var _0x5d7b40 = 0x64 / _0x37cc09;
                    _0x2c8ffb(this).css({
                      'marginLeft': 0x0,
                      'marginTop': 0x0,
                      'marginRight': _0x153025 + 'px',
                      'marginBottom': _0x153025 + 'px',
                      'width': "calc(" + _0x5d7b40 + "% - " + _0x153025 + 'px)'
                    });
                  } else {
                    _0x2c8ffb(this).css({
                      'marginLeft': 0x0,
                      'marginTop': 0x0,
                      'marginRight': _0x153025 + 'px',
                      'marginBottom': _0x153025 + 'px',
                      'width': 0x64 / _0x37cc09 + '%'
                    });
                  }
                });
              }
            }
          }
          if (_0x49c9b1.minimizeOnScroll) {
            if (_0x40300f.hasClass(_0x49c9b1.minimizeClass)) {
              if (_0x2e3f69 == "normal") {
                if (_0x53f31a.w <= 0x1f4) {
                  _0x546098.addClass("mvp-minimize-full-width");
                } else {
                  _0x546098.removeClass("mvp-minimize-full-width");
                }
              }
            } else {
              _0x40300f.css({
                'width': _0x546098.width(),
                'height': _0x546098.height()
              });
            }
          }
          _0x1a31d5 = _0x8083b8.width();
          _0x31f22e = null;
          _0x34f818 = null;
          _0x3911a2 = _0x184401.width();
          if (_0xbddf8b) {
            if (_0xbddf8b.height() > _0x93b161.height() - 0x3c) {
              _0xbddf8b.css("maxHeight", _0x93b161.height() - 0x3c).addClass("mvp-settings-holder-scrollable");
            }
          }
          if (_0xaad07c) {
            _0x9b20e1();
          }
          if (_0x49c9b1.elementsVisibilityArr) {
            var _0xa70faa;
            var _0x44c53e = _0x49c9b1.elementsVisibilityArr.length;
            var _0x54cd68;
            var _0x20c218 = _0x139c5b.width();
            for (_0xa70faa = 0x0; _0xa70faa < _0x44c53e; _0xa70faa++) {
              _0x54cd68 = _0x49c9b1.elementsVisibilityArr[_0xa70faa];
              if (_0x20c218 < _0x54cd68.width) {
                if (_0x54cd68.elements.indexOf("seekbar") == -0x1) {
                  _0xd5f952.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("play") == -0x1) {
                  _0x8f9621.addClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("time") == -0x1) {
                  _0x40d4b4.addClass("mvp-force-hide");
                  _0xc5351f.addClass("mvp-force-hide");
                  _0x5ec4e4.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("download") == -0x1) {
                  _0x54ba97.addClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('pip') == -0x1) {
                  _0xc54ce2.addClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('cc') == -0x1) {
                  _0xcc1b36.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("share") == -0x1) {
                  _0x4d7e30.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("info") == -0x1) {
                  _0x43145f.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("next") == -0x1) {
                  _0x276f15.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("previous") == -0x1) {
                  _0x376393.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("rewind") == -0x1) {
                  _0xc5e786.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('skip_backward') == -0x1) {
                  _0xf7f71.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("skip_forward") == -0x1) {
                  _0xf39bf5.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('volume') == -0x1) {
                  _0x19b5b0.addClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("volume_seekbar") == -0x1) {
                  _0xb23a7f.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('fullscreen') == -0x1) {
                  _0x2cc853.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('theater') == -0x1) {
                  _0x4fa334.addClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('playlist') == -0x1) {
                  _0x2f574b.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("annotations") == -0x1) {
                  _0x474086.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('upnext') == -0x1) {
                  _0x6abeef.addClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("settings") == -0x1) {
                  _0x2cd9a4.addClass("mvp-force-hide");
                }
              } else {
                if (_0x54cd68.elements.indexOf("seekbar") == -0x1) {
                  _0xd5f952.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("play") == -0x1) {
                  _0x8f9621.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('time') == -0x1) {
                  _0x40d4b4.removeClass('mvp-force-hide');
                  _0xc5351f.removeClass('mvp-force-hide');
                  _0x5ec4e4.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("download") == -0x1) {
                  _0x54ba97.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('pip') == -0x1) {
                  _0xc54ce2.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('cc') == -0x1) {
                  _0xcc1b36.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("share") == -0x1) {
                  _0x4d7e30.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("info") == -0x1) {
                  _0x43145f.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("next") == -0x1) {
                  _0x276f15.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('previous') == -0x1) {
                  _0x376393.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("rewind") == -0x1) {
                  _0xc5e786.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf('skip_backward') == -0x1) {
                  _0xf7f71.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("skip_forward") == -0x1) {
                  _0xf39bf5.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("volume") == -0x1) {
                  _0x19b5b0.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("volume_seekbar") == -0x1) {
                  _0xb23a7f.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("fullscreen") == -0x1) {
                  _0x2cc853.removeClass("mvp-force-hide");
                }
                if (_0x54cd68.elements.indexOf("theater") == -0x1) {
                  _0x4fa334.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("playlist") == -0x1) {
                  _0x2f574b.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('annotations') == -0x1) {
                  _0x474086.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf('upnext') == -0x1) {
                  _0x6abeef.removeClass('mvp-force-hide');
                }
                if (_0x54cd68.elements.indexOf("settings") == -0x1) {
                  _0x2cd9a4.removeClass("mvp-force-hide");
                }
              }
            }
          }
          if (!_0x49c9b1.keepCaptionFontSizeAfterManualResize) {
            if (_0x49c9b1.caption_breakPointArr && _0x275e34) {
              var _0x20c218 = _0x2a65bd.width();
              var _0xa70faa;
              var _0x44c53e = _0x49c9b1.caption_breakPointArr.length;
              var _0x3247f0;
              var _0xa4dba9;
              for (_0xa70faa = 0x0; _0xa70faa < _0x44c53e; _0xa70faa++) {
                _0x3247f0 = _0x49c9b1.caption_breakPointArr[_0xa70faa];
                if (_0x20c218 > _0x3247f0.width) {
                  _0xa4dba9 = _0x3247f0.size;
                }
              }
              _0x2a65bd.css("fontSize", _0xa4dba9 + 'px');
            }
          }
          if (_0x4a9ebf && _0x3f7bc0) {
            _0x4a9ebf.resizePagination();
          }
        }
        if (_0x2aa1b2 && _0x19ddcc) {
          _0x19ddcc.resize();
        }
        if (_0x116683 && _0x49c9b1.playlistOpened) {
          if (_0x2cb5ab) {
            if (_0x2b1fae == "buttons" || _0x2b1fae == "hover") {
              _0x2cb5ab.resize(_0x2aa7b0);
            }
          }
        }
      }
      function _0x9b20e1() {
        if (_0x27da1e) {
          MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x27da1e);
        } else if (_0x2cc5c3) {
          MVPAspectRatio.resizeMedia('image', _0x588042, _0x93b161, _0x2cc5c3);
        }
        if (_0x39440f) {
          MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x39440f);
        }
        if (_0xaad07c == 'video') {
          if (_0x5ee613 && _0x1450dc.is360) {
            if (_0x136c1a) {
              var _0x41bff4 = _0x139c5b.width();
              var _0x24b91b = _0x139c5b.height();
              if (_0x1450dc.vrMode == 'monoscopic') {
                _0x5438f1.aspect = _0x41bff4 / _0x24b91b;
                _0x5438f1.updateProjectionMatrix();
                _0x5a34d3.setSize(_0x41bff4, _0x24b91b);
              } else {
                _0x57d2e3.aspect = _0x41bff4 / _0x24b91b;
                _0x57d2e3.updateProjectionMatrix();
                _0x54d105.setSize(_0x41bff4, _0x24b91b);
              }
            }
          } else if (_0x5ac143) {
            MVPAspectRatio.resizeMedia("video", _0x588042, _0x93b161, _0x5ac143);
          }
        } else {
          if (_0xaad07c == "image") {
            if (_0x1450dc.is360) {
              if (_0x428281) {
                var _0x41bff4 = _0x139c5b.width();
                var _0x24b91b = _0x139c5b.height();
                _0x1dd13b.setSize(_0x41bff4, _0x24b91b);
                _0x5438f1.aspect = _0x41bff4 / _0x24b91b;
                _0x5438f1.updateProjectionMatrix();
                _0x1dd13b.render(_0x5b8150, _0x5438f1);
              }
            } else if (_0x50fbba) {
              MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x50fbba);
            }
          } else {
            if (_0xaad07c == "audio") {
              if (_0x1450dc.slideshowImages) {
                if (_0x2060ea) {
                  _0x2060ea.resize();
                }
              }
            }
          }
        }
      }
      function _0x4d8ee1(_0x4a0d70) {
        if (!_0x588a79) {
          return false;
        }
        if (typeof _0x4a0d70 !== "undefined") {
          if (_0x49c9b1.playlistOpened && _0x4a0d70 == true) {
            return false;
          } else {
            if (!_0x49c9b1.playlistOpened && _0x4a0d70 == false) {
              return false;
            }
          }
          _0x49c9b1.playlistOpened = !_0x4a0d70;
        }
        if (_0x49c9b1.playlistOpened) {
          _0x349f0e.hide();
        } else {
          _0x349f0e.show();
        }
        _0x49c9b1.playlistOpened = !_0x49c9b1.playlistOpened;
        _0x31d45c();
      }
      function _0x54cd1f(_0x3196c0) {
        var _0x2d2c6f = {
          "origclasses": _0x3196c0.attr("class")
        };
        _0x2d2c6f.type = _0x2d2c6f.origtype = _0x3196c0.attr("data-type");
        if (_0x3196c0.attr('data-exclude') != undefined) {
          _0x2d2c6f.excludeId = _0x3196c0.attr("data-exclude");
        }
        if (_0x3196c0.attr('data-noapi') != undefined) {
          _0x2d2c6f.noApi = true;
        }
        if (_0x3196c0.attr("data-width") != undefined) {
          _0x2d2c6f.width = _0x3196c0.attr('data-width');
        }
        if (_0x3196c0.attr('data-height') != undefined) {
          _0x2d2c6f.height = _0x3196c0.attr("data-height");
        }
        if (_0x3196c0.attr("data-is360") != undefined) {
          _0x2d2c6f.is360 = true;
          _0x2d2c6f.vrMode = "monoscopic";
        }
        if (_0x3196c0.attr('data-vr-mode') != undefined) {
          if (_0x1a12a5) {
            _0x2d2c6f.vrMode = _0x3196c0.attr("data-vr-mode");
          } else {
            _0x2d2c6f.vrModeOrig = _0x3196c0.attr("data-vr-mode");
          }
        }
        if (_0x3196c0.attr("data-media-id") != undefined) {
          _0x2d2c6f.mediaId = _0x3196c0.attr("data-media-id");
        }
        if (_0x196418) {
          _0x2d2c6f.pwd = _0x196418;
        } else if (_0x3196c0.attr("data-pwd") != undefined) {
          _0x2d2c6f.pwd = _0x3196c0.attr("data-pwd");
        }
        if (_0x3196c0.attr("data-vpwd") != undefined) {
          _0x2d2c6f.vpwd = _0x3196c0.attr('data-vpwd');
        }
        if (_0x3196c0.attr("data-live-stream") != undefined) {
          _0x2d2c6f.liveStream = true;
        }
        if (_0x3196c0.attr("data-alt") != undefined) {
          _0x2d2c6f.alt = _0x3196c0.attr('data-alt');
        }
        if (_0x3196c0.attr("data-content-url") != undefined) {
          _0x2d2c6f.contentUrl = _0x3196c0.attr("data-content-url");
        }
        if (_0x2d2c6f.type == "audio" || _0x2d2c6f.type == 'video') {
          _0x2d2c6f.path = _0x3196c0.data("path");
        } else {
          if (_0x3196c0.attr('data-path') != undefined) {
            _0x2d2c6f.path = _0x3196c0.attr("data-path");
            if (_0x2d2c6f.path.indexOf("ebsfm:") != -0x1) {
              _0x2d2c6f.path = MVPUtils.b64DecodeUnicode(_0x2d2c6f.path.substr(0x6));
            }
          }
        }
        if (_0x3196c0.attr("data-bucket") != undefined) {
          _0x2d2c6f.bucket = _0x3196c0.attr("data-bucket");
          if (_0x2d2c6f.bucket.indexOf("ebsfm:") != -0x1) {
            _0x2d2c6f.bucket = MVPUtils.b64DecodeUnicode(_0x2d2c6f.bucket.substr(0x6));
          }
        }
        if (_0x3196c0.attr("data-key") != undefined) {
          _0x2d2c6f.key = _0x3196c0.attr('data-key');
          if (_0x2d2c6f.key.indexOf("ebsfm:") != -0x1) {
            _0x2d2c6f.key = MVPUtils.b64DecodeUnicode(_0x2d2c6f.key.substr(0x6));
          }
        }
        if (_0x3196c0.attr("data-mp4") != undefined) {
          _0x2d2c6f.mp4 = _0x3196c0.attr("data-mp4");
        }
        if (_0x3196c0.attr("data-thumb") != undefined) {
          _0x2d2c6f.thumb = _0x3196c0.attr('data-thumb');
        }
        if (_0x3196c0.attr("data-hover-preview") != undefined) {
          _0x2d2c6f.hoverPreview = _0x3196c0.attr('data-hover-preview');
        }
        if (_0x3196c0.attr("data-title") != undefined) {
          _0x2d2c6f.title = _0x3196c0.attr("data-title");
        }
        if (_0x3196c0.attr("data-description") != undefined) {
          _0x2d2c6f.description = _0x3196c0.attr("data-description");
        }
        if (_0x3196c0.attr("data-quality") != undefined) {
          _0x2d2c6f.quality = _0x3196c0.attr("data-quality");
        }
        if (_0x3196c0.attr('data-quality-mobile') != undefined) {
          _0x2d2c6f.qualityMobile = _0x3196c0.attr('data-quality-mobile');
        }
        if (_0x3196c0.attr('data-download') != undefined) {
          _0x2d2c6f.download = _0x3196c0.attr("data-download");
        }
        if (_0x3196c0.attr("data-watched-complete") != undefined) {
          _0x2d2c6f.watchedComplete = true;
        }
        if (!_0x442e51) {
          if (_0x3196c0.attr('data-slideshow-images') != undefined) {
            _0x2d2c6f.slideshowImages = _0x3196c0.attr("data-slideshow-images").split(',');
          }
        }
        if (_0x3196c0.attr('data-age-verify') != undefined) {
          _0x2d2c6f.ageVerify = true;
        }
        if (_0x3196c0.attr("data-poster") != undefined) {
          _0x2d2c6f.poster = _0x3196c0.attr('data-poster');
        }
        if (_0x3196c0.attr("data-poster-frame-time") != undefined) {
          _0x2d2c6f.posterFrameTime = _0x3196c0.attr("data-poster-frame-time");
        }
        if (_0x2e785a != undefined) {
          _0x2d2c6f.lockTime = _0x2e785a;
        } else {
          if (_0x3196c0.attr("data-lock-time") != undefined) {
            if (_0x49c9b1.isUserLoggedIn) {
              _0x2d2c6f.lockTime = Number(_0x3196c0.attr("data-lock-time"));
            }
          }
        }
        if (_0x99f1ea) {
          _0x2d2c6f.lockVideoUserRoles = _0x99f1ea;
        }
        if (_0x2d202a) {
          _0x2d2c6f.start = _0x2d202a;
        } else if (_0x3196c0.attr("data-start") != undefined) {
          _0x2d2c6f.start = Number(_0x3196c0.attr("data-start"));
        }
        if (_0x26ae05) {
          _0x2d2c6f.end = _0x26ae05;
        } else if (_0x3196c0.attr('data-end') != undefined) {
          _0x2d2c6f.end = Number(_0x3196c0.attr('data-end'));
        }
        if (_0x50dbc5) {
          _0x2d2c6f.playbackRate = _0x50dbc5;
        } else if (_0x3196c0.attr("data-playback-rate") != undefined) {
          _0x2d2c6f.playbackRate = Number(_0x3196c0.attr("data-playback-rate"));
        }
        if (_0x3196c0.attr("data-time-watched") != undefined) {
          _0x2d2c6f.timeWatched = _0x3196c0.attr("data-time-watched");
        }
        if (_0x3196c0.attr("data-duration") != undefined) {
          _0x2d2c6f.duration = _0x3196c0.attr("data-duration");
        }
        if (_0x3196c0.attr('data-aspect-ratio') != undefined) {
          _0x2d2c6f.aspectRatio = Number(_0x3196c0.attr("data-aspect-ratio"));
        }
        if (_0x3196c0.attr("data-id3") != undefined) {
          _0x2d2c6f.id3 = true;
        }
        if (_0x3196c0.attr('data-share') != undefined) {
          _0x2d2c6f.share = _0x3196c0.attr("data-share");
        }
        if (_0x3196c0.attr("data-limit") != undefined) {
          _0x2d2c6f.limit = Number(_0x3196c0.attr("data-limit"));
        }
        if (_0x3196c0.attr("data-is360") != undefined) {
          _0x2d2c6f.is360 = true;
        }
        if (_0x3196c0.attr("data-preview-seek") != undefined) {
          _0x2d2c6f.previewSeek = _0x3196c0.attr("data-preview-seek");
        }
        if (_0x3196c0.attr("data-user-id") != undefined) {
          _0x2d2c6f.user_id = _0x3196c0.attr('data-user-id');
        }
        if (_0x3196c0.attr('data-sort') != undefined) {
          _0x2d2c6f.sort = _0x3196c0.attr("data-sort");
          if (_0x3196c0.attr("data-sort-direction") != undefined) {
            _0x2d2c6f.sortDirection = _0x3196c0.attr('data-sort-direction');
          }
        }
        if (_0x3196c0.attr('data-user-account') != undefined) {
          _0x2d2c6f.userAccount = _0x3196c0.attr("data-user-account");
        }
        if (_0x3196c0.attr("data-upload-date") != undefined) {
          _0x2d2c6f.date = _0x3196c0.attr("data-upload-date");
        }
        if (_0x3196c0.children('.mvp-subtitles').length) {
          var _0x3f685a = _0x3196c0.children('.mvp-subtitles');
          if (_0x3f685a.children("div").length) {
            _0x2d2c6f.subtitles = [];
            _0x3f685a.children('div').each(function () {
              var _0x2fe66f = _0x2c8ffb(this);
              var _0x5cffa4 = _0x2fe66f.attr('data-label');
              var _0x25b7a3 = {
                'label': _0x5cffa4,
                'value': _0x5cffa4,
                'src': _0x2fe66f.attr("data-src")
              };
              if (_0x2fe66f.attr("data-default") != undefined) {
                _0x25b7a3["default"] = true;
              }
              if (_0x2fe66f.attr("data-cors") != undefined) {
                _0x25b7a3.cors = true;
              }
              _0x2d2c6f.subtitles.push(_0x25b7a3);
            });
            _0x2d2c6f.subtitles.push({
              'label': _0x49c9b1.subtitleOffText,
              'value': _0x49c9b1.subtitleOffText
            });
          }
        }
        if (_0x3196c0.attr("data-playlist-icons") != undefined) {
          _0x2d2c6f.playlistIcons = _0x3196c0.data("playlist-icons");
        }
        if (_0x3196c0.find(".mvp-custom-playlist-item-content").length) {
          _0x2d2c6f.customContent = _0x3196c0.find(".mvp-custom-playlist-item-content").html();
        }
        if (_0x3196c0.attr("data-chapters") != undefined) {
          _0x2d2c6f.chapters = _0x3196c0.attr("data-chapters");
        }
        if (_0x3196c0.attr('data-chapters-cors') != undefined) {
          _0x2d2c6f.chaptersCors = true;
        }
        if (_0x3196c0.attr("data-link") != undefined) {
          _0x2d2c6f.link = _0x3196c0.attr("data-link");
          if (_0x3196c0.attr("data-target") != undefined) {
            _0x2d2c6f.target = _0x3196c0.attr("data-target");
          } else {
            _0x2d2c6f.target = "_blank";
          }
        }
        if (_0x3196c0.attr('data-end-link') != undefined) {
          _0x2d2c6f.endLink = _0x3196c0.attr("data-end-link");
          _0x2d2c6f.endTarget = "_blank";
          if (_0x3196c0.attr("data-end-target") != undefined) {
            _0x2d2c6f.endTarget = _0x3196c0.attr("data-end-target");
          }
        }
        if (_0x3196c0.children(".mvp-ad-section").length) {
          _0x2d2c6f.adSection = _0x3196c0.children('.mvp-ad-section');
          if (_0x5560e8) {
            _0x2d2c6f.adSection = _0x2d2c6f.adSection.wrap("<p>").parent().html();
          }
        } else {
          if (_0x114c06) {
            _0x2d2c6f.adSection = _0x114c06;
            if (_0x5560e8) {
              _0x2d2c6f.adSection = _0x2d2c6f.adSection.wrap("<p>").parent().html();
            }
          }
        }
        if (_0x3196c0.children(".mvp-annotation-section").length) {
          _0x2d2c6f.annotationSection = _0x3196c0.children(".mvp-annotation-section");
          if (_0x5560e8) {
            _0x2d2c6f.annotationSection = _0x2d2c6f.annotationSection.wrap("<p>").parent().html();
          }
        } else {
          if (_0xfe5fe6) {
            _0x2d2c6f.annotationSection = _0xfe5fe6;
            if (_0x5560e8) {
              _0x2d2c6f.annotationSection = _0x2d2c6f.annotationSection.wrap("<p>").parent().html();
            }
          }
        }
        if (_0x4c6cc5) {
          _0x2d2c6f.vast = _0x4c6cc5;
        } else if (_0x3196c0.attr("data-vast") != undefined) {
          _0x2d2c6f.vast = _0x3196c0.attr("data-vast");
        }
        if (_0x3196c0.attr('data-load-more') != undefined) {
          _0x20063 = true;
          _0x24d23e = _0x3196c0.wrap('<p>').parent().html();
        }
        return _0x2d2c6f;
      }
      function _0x35278d(_0x28c1d8) {
        var _0x3a7018 = {
          type: _0x28c1d8.attr("data-type")
        };
        if (_0x3a7018.type == "audio" || _0x3a7018.type == "video") {
          _0x3a7018.path = _0x28c1d8.data("path");
        } else {
          if (_0x28c1d8.attr("data-path") != undefined) {
            _0x3a7018.path = _0x28c1d8.attr("data-path");
            if (_0x3a7018.path.indexOf("ebsfm:") != -0x1) {
              _0x3a7018.path = MVPUtils.b64DecodeUnicode(_0x3a7018.path.substr(0x6));
            }
          }
        }
        if (_0x28c1d8.attr('data-is360') != undefined) {
          _0x3a7018.is360 = true;
        }
        if (_0x28c1d8.attr('data-poster') != undefined) {
          _0x3a7018.poster = _0x28c1d8.attr("data-poster");
        }
        if (_0x28c1d8.attr("data-link") != undefined) {
          _0x3a7018.link = _0x28c1d8.attr('data-link');
          if (_0x28c1d8.attr('data-target') != undefined) {
            _0x3a7018.target = _0x28c1d8.attr("data-target");
          } else {
            _0x3a7018.target = "_blank";
          }
          if (_0x28c1d8.attr('data-rel') != undefined) {
            _0x3a7018.rel = _0x28c1d8.attr("data-rel");
          }
        }
        if (_0x28c1d8.attr("data-end-link") != undefined) {
          _0x3a7018.endLink = _0x28c1d8.attr("data-end-link");
          if (_0x28c1d8.attr("data-end-target") != undefined) {
            _0x3a7018.endTarget = _0x28c1d8.attr("data-end-target");
          } else {
            _0x3a7018.endTarget = "_blank";
          }
          if (_0x28c1d8.attr("data-end-rel") != undefined) {
            _0x3a7018.endRel = _0x28c1d8.attr("data-end-rel");
          }
        }
        if (_0x28c1d8.attr("data-skip-enable") != undefined) {
          _0x3a7018.skipEnable = _0x28c1d8.attr('data-skip-enable');
        }
        if (_0x28c1d8.attr("data-ad-id") != undefined) {
          _0x3a7018.adId = _0x28c1d8.attr("data-ad-id");
        }
        if (_0x28c1d8.attr("data-duration") != undefined) {
          _0x3a7018.duration = _0x28c1d8.attr("data-duration");
        }
        return _0x3a7018;
      }
      this.playMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x1f950b) {
          return false;
        }
        if (_0x39440f) {
          return false;
        }
        if (_0x576097) {
          _0x3c1510.play();
        } else {
          if (_0xaad07c == "audio") {
            if (_0x143642) {
              var _0x1913ae = _0x143642.play();
              if (_0x1913ae !== undefined) {
                _0x1913ae.then(function () {})["catch"](function (_0x5292b3) {
                  _0x105ccb.show();
                  _0x43db09.hide();
                });
              }
            } else {
              console.log(0x1621);
            }
          } else {
            if (_0xaad07c == 'video') {
              if (!_0x3d30f6 && _0x1450dc.poster && !_0x1a96c8) {
                _0x30f341.hide();
                _0x105ccb.hide();
                _0x3a8faa();
              } else {
                if (_0x326462) {
                  var _0x1913ae = _0x326462.play();
                  if (_0x1913ae !== undefined) {
                    _0x1913ae.then(function () {})["catch"](function (_0x4eaeb8) {
                      console.log(_0x4eaeb8);
                      _0x105ccb.show();
                      _0x43db09.hide();
                    });
                  }
                }
              }
            } else {
              if (_0xaad07c == 'youtube') {
                if (_0x1450dc.posterposter && !_0x1a96c8) {
                  _0x30f341.hide();
                  _0x3a8faa();
                } else {
                  _0x589fef.playVideo();
                }
              } else if (_0xaad07c == 'vimeo') {
                if (_0x1450dc.posterposter && !_0x1a96c8) {
                  _0x30f341.hide();
                  _0x3a8faa();
                } else {
                  _0x24e760.play();
                }
              }
            }
          }
        }
        _0x1f950b = true;
      };
      this.pauseMediaBetweenCast = function () {};
      this.pauseMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (!_0x1f950b) {
          return false;
        }
        if (_0x576097) {
          _0x3c1510.pause();
        } else {
          if (_0xaad07c == "audio") {
            if (_0x143642) {
              _0x143642.pause();
            }
          } else {
            if (_0xaad07c == "video") {
              if (_0x326462) {
                _0x326462.pause();
              }
            } else {
              if (_0xaad07c == 'youtube') {
                _0x589fef.pauseVideo();
              } else if (_0xaad07c == 'vimeo') {
                _0x24e760.pause();
              }
            }
          }
        }
        _0x1f950b = false;
      };
      function _0x3c0bec() {
        _0x3d30f6 = true;
        var _0x24fe33 = setInterval(function () {
          if (_0x19ddcc) {
            clearInterval(_0x24fe33);
            var _0x383c38 = _0x465438.vast;
            if (_0x383c38.substr(-0xb) == "correlator=") {
              var _0x3322e5 = Math.floor(Math.random() * 9999999).toString();
              _0x383c38 += _0x3322e5;
            }
            console.log(_0x383c38);
            if (_0xaad07c == 'video') {
              _0x19ddcc.load(_0x383c38, _0x5ac143[0x0], _0x1ac3d7);
            } else if (_0xaad07c == "audio") {
              _0x19ddcc.load(_0x383c38, _0x30e28d[0x0], _0x1ac3d7);
            }
          }
        }, 0x64);
      }
      this.togglePlayback = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x49c9b1.displayPosterOnMobile && _0x1450dc.poster) {
          return;
        }
        if (_0x39440f) {
          return false;
        }
        _0x48f7fc.off(_0x454d29);
        if (_0x1450dc.pwd) {
          _0x2a430a.css("display", "block");
          setTimeout(function () {
            _0x2a430a.addClass("mvp-holder-visible");
          }, 0x14);
          return false;
        }
        if (_0x2aa1b2 && _0x395507) {
          if (_0x19ddcc) {
            _0x19ddcc.togglePlayPause();
          }
        } else {
          if (_0x2aa1b2 && !_0x3d30f6) {
            if (_0x1450dc.poster && !_0x1a96c8) {
              if (_0x30f341) {
                if (_0xaad07c != "audio") {
                  _0x30f341.hide();
                }
              }
              _0x105ccb.hide();
              _0x43db09.show();
              _0x3a8faa();
            } else {
              _0x3c0bec();
            }
          } else {
            if (_0x576097) {
              _0x3c1510.togglePlayPause();
            } else {
              if (_0xaad07c == "audio") {
                if (!_0x1a96c8) {
                  if (_0x41a8e7 != 0x0) {
                    _0x1ac3d7 = _0x41a8e7;
                  }
                  _0x50f193(_0x1ac3d7);
                }
                if (_0x143642) {
                  if (_0x143642.paused) {
                    var _0x2a5678 = _0x143642.play();
                    if (_0x2a5678 !== undefined) {
                      _0x2a5678.then(function () {})["catch"](function (_0x48146e) {
                        console.log(_0x48146e);
                        _0x105ccb.show();
                        _0x43db09.hide();
                      });
                    }
                  } else {
                    _0x143642.pause();
                  }
                } else {
                  _0x105ccb.hide();
                  _0x43db09.show();
                  _0x3a8faa();
                }
              } else {
                if (_0xaad07c == "video") {
                  if (_0x1450dc.poster && !_0x1a96c8) {
                    if (_0x30f341) {
                      _0x30f341.hide();
                    }
                    _0x105ccb.hide();
                    _0x43db09.show();
                    _0x3a8faa();
                  } else {
                    if (_0x326462) {
                      if (_0x326462.paused) {
                        var _0x2a5678 = _0x326462.play();
                        if (_0x2a5678 !== undefined) {
                          _0x2a5678.then(function () {})["catch"](function (_0x365142) {
                            _0x105ccb.show();
                            _0x43db09.hide();
                          });
                        }
                      } else {
                        _0x326462.pause();
                      }
                    }
                  }
                } else {
                  if (_0xaad07c == "youtube") {
                    if (_0x1450dc.poster && !_0x1a96c8) {
                      if (_0x30f341) {
                        _0x30f341.hide();
                      }
                      _0x105ccb.hide();
                      _0x3a8faa();
                    } else {
                      if (_0x589fef) {
                        var _0xbc431c = _0x589fef.getPlayerState();
                        if (_0xbc431c == 0x1) {
                          _0x589fef.pauseVideo();
                        } else {
                          if (_0xbc431c == 0x2) {
                            _0x589fef.playVideo();
                          } else if (_0xbc431c == -0x1 || _0xbc431c == 0x5 || _0xbc431c == 0x0) {
                            _0x589fef.playVideo();
                          }
                        }
                      }
                    }
                  } else {
                    if (_0xaad07c == 'vimeo') {
                      if (_0x1450dc.poster && !_0x1a96c8) {
                        if (_0x30f341) {
                          _0x30f341.hide();
                        }
                        _0x105ccb.hide();
                        _0x3a8faa();
                      } else if (_0x24e760) {
                        _0x24e760.getPaused().then(function (_0x5c980c) {
                          if (_0x5c980c) {
                            _0x24e760.play();
                          } else {
                            _0x24e760.pause();
                          }
                        });
                      }
                    } else {
                      if (_0xaad07c == 'custom' || _0xaad07c == "custom_html") {
                        if (_0x1450dc.poster && !_0x1a96c8) {
                          if (_0x30f341) {
                            _0x30f341.hide();
                          }
                          _0x105ccb.hide();
                          _0x3a8faa();
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      };
      this.nextMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x3199b6();
      };
      this.previousMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x37d09c();
      };
      this.setVolume = function (_0xa8a02) {
        if (!_0x588a79) {
          return false;
        }
        if (_0xa8a02 < 0x0) {
          _0xa8a02 = 0x0;
        } else {
          if (_0xa8a02 > 0x1) {
            _0xa8a02 = 0x1;
          }
        }
        _0x50f193(_0xa8a02);
      };
      this.toggleMute = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x367db0();
      };
      this.seek = function (_0x5d9aba) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x39440f) {
          return false;
        }
        if (_0x576097) {
          if (_0x3c1510) {
            _0x3c1510.seekTo(_0x5d9aba);
          }
        } else {
          if (_0xaad07c == "audio") {
            if (_0x143642) {
              _0x143642.currentTime = _0x5d9aba;
            }
          } else {
            if (_0xaad07c == "video") {
              if (_0x326462) {
                _0x326462.currentTime = _0x5d9aba;
              }
            } else {
              if (_0xaad07c == 'youtube') {
                if (_0x589fef) {
                  _0x589fef.seekTo(_0x5d9aba);
                }
              } else if (_0xaad07c == "vimeo") {
                if (_0x24e760) {
                  _0x24e760.setCurrentTime(_0x5d9aba);
                }
              }
            }
          }
        }
        if (!_0x1f950b) {
          _0x150da0(true);
        }
      };
      this.seekBackward = function (_0x3e2d5d) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x39440f) {
          return false;
        }
        if (_0xaad07c == "audio") {
          if (_0x143642) {
            try {
              _0x143642.currentTime = Math.max(_0x143642.currentTime - (_0x3e2d5d || _0x49c9b1.seekTime), 0x0);
            } catch (_0x386c83) {
              console.log(_0x386c83);
            }
          }
        } else {
          if (_0xaad07c == "video") {
            if (_0x326462) {
              try {
                _0x326462.currentTime = Math.max(_0x326462.currentTime - (_0x3e2d5d || _0x49c9b1.seekTime), 0x0);
              } catch (_0x32257d) {
                console.log(_0x32257d);
              }
            }
          } else {
            if (_0xaad07c == "youtube") {
              var _0x5e352b = Math.max(_0x589fef.getCurrentTime() - (_0x3e2d5d || _0x49c9b1.seekTime), 0x0);
              _0x589fef.seekTo(_0x5e352b);
            } else if (_0xaad07c == "vimeo") {
              _0x24e760.getCurrentTime().then(function (_0x353e44) {
                var _0x36a3ec = Math.max(_0x353e44 - (_0x3e2d5d || _0x49c9b1.seekTime), 0x0);
                _0x24e760.setCurrentTime(_0x36a3ec);
              });
            }
          }
        }
        if (!_0x1f950b) {
          _0x150da0(true);
        }
      };
      this.seekForward = function (_0x4a069b) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x39440f) {
          return false;
        }
        if (_0xaad07c == "audio") {
          if (_0x143642) {
            try {
              _0x143642.currentTime = Math.min(_0x143642.currentTime + (_0x4a069b || _0x49c9b1.seekTime), _0x143642.duration);
            } catch (_0x2a643b) {
              console.log(_0x2a643b);
            }
          }
        } else {
          if (_0xaad07c == "video") {
            if (_0x326462) {
              try {
                _0x326462.currentTime = Math.min(_0x326462.currentTime + (_0x4a069b || _0x49c9b1.seekTime), _0x326462.duration);
              } catch (_0x1dbb26) {
                console.log(_0x1dbb26);
              }
            }
          } else {
            if (_0xaad07c == 'youtube') {
              var _0x1407b1 = Math.min(_0x589fef.getCurrentTime() + (_0x4a069b || _0x49c9b1.seekTime), _0x589fef.getDuration());
              _0x589fef.seekTo(_0x1407b1);
            } else {
              if (_0xaad07c == "vimeo") {
                if (_0x17e176 != 0x0 && _0x34dba9 != 0x0) {
                  var _0x1407b1 = Math.min(_0x34dba9 + (_0x4a069b || _0x49c9b1.seekTime), _0x17e176);
                  _0x24e760.setCurrentTime(_0x1407b1);
                } else {
                  _0x24e760.getCurrentTime().then(function (_0x3fdec9) {
                    _0x24e760.getDuration().then(function (_0x39641d) {
                      var _0x531f0a = Math.min(_0x3fdec9 + (_0x4a069b || _0x49c9b1.seekTime), _0x39641d);
                      _0x24e760.setCurrentTime(_0x531f0a);
                    });
                  });
                }
              }
            }
          }
        }
        if (!_0x1f950b) {
          _0x150da0(true);
        }
      };
      _0x5ca0d3.mediaEndHandler = function () {
        _0x2af768();
      };
      this.isCastSupportedMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return null;
        }
        if (["video", "audio", 'hls', "dash"].indexOf(_0xaad07c) > -0x1) {
          return true;
        } else {
          return false;
        }
      };
      this.getCurrentMediaData = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return null;
        }
        return _0x1450dc;
      };
      this.getCurrentMediaUrl = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return '';
        }
        var _0x53ac69 = window.location.href;
        var _0x58c813;
        if (_0x53ac69.indexOf('?') == -0x1) {
          _0x58c813 = '?';
        } else {
          _0x58c813 = '&';
        }
        var _0x4c7c3c = "mvp-query-instance=" + encodeURIComponent(_0x49c9b1.instanceName);
        if (_0x1450dc.mediaId != undefined) {
          var _0x55f6aa = "&mvp-media-id=" + _0x1450dc.mediaId;
        } else {
          var _0x55f6aa = "&mvp-active-item=" + _0x48707c;
        }
        var _0x4e38db = _0x1a96c8 && _0xaad07c != "image" ? "&mvp-playback-position-time=" + Math.floor(_0x5ca0d3.getCurrentTime()) : '';
        var _0x2b51ea = _0x58c813 + _0x4c7c3c + "&mvp-scroll-to-player=1" + _0x55f6aa + _0x4e38db;
        if (_0x1450dc.mediaId != undefined && _0x4b39ef.indexOf(_0x1450dc.origtype) == -0x1 && _0x1450dc.title) {
          var _0xca3dd = '&mvp-media-title=' + encodeURIComponent(_0x1450dc.title);
          _0x2b51ea += _0xca3dd;
        }
        return _0x2b51ea;
      };
      this.getCurrentTime = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (!_0x1a96c8) {
          return '0';
        }
        if (_0x576097) {
          return _0x3c1510.getCurrentTime();
        } else {
          if (_0xaad07c == 'audio') {
            return _0x143642.currentTime;
          } else {
            if (_0xaad07c == "video") {
              return _0x326462.currentTime;
            } else {
              if (_0xaad07c == "youtube") {
                if (!_0x589fef) {
                  return '0';
                }
                return _0x589fef.getCurrentTime();
              } else {
                if (_0xaad07c == "vimeo") {
                  return _0x34dba9;
                }
              }
            }
          }
        }
      };
      this.getDuration = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x576097) {
          return _0x3c1510.getDuration();
        } else {
          if (_0xaad07c == 'audio') {
            return _0x143642.duration;
          } else {
            if (_0xaad07c == 'video') {
              return _0x326462.duration;
            } else {
              if (_0xaad07c == "youtube") {
                return _0x589fef.getDuration();
              } else {
                if (_0xaad07c == "vimeo") {
                  return _0x17e176;
                }
              }
            }
          }
        }
      };
      this.getLoadProgress = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        var _0x2c271b;
        if (_0xaad07c == "audio") {
          if (typeof _0x143642.buffered !== 'undefined' && _0x143642.buffered.length != 0x0) {
            try {
              var _0x234399 = _0x143642.buffered.end(_0x143642.buffered.length - 0x1);
            } catch (_0x3a7c3b) {}
            if (!isNaN(_0x234399)) {
              _0x2c271b = _0x234399 / Math.floor(_0x143642.duration);
            }
          }
        } else {
          if (_0xaad07c == "video") {
            if (typeof _0x326462.buffered !== "undefined" && _0x326462.buffered.length != 0x0) {
              try {
                var _0x234399 = _0x326462.buffered.end(_0x326462.buffered.length - 0x1);
              } catch (_0x42bbf3) {}
              if (!isNaN(_0x234399)) {
                _0x2c271b = _0x234399 / Math.floor(_0x326462.duration);
              }
            }
          } else {
            if (_0xaad07c == "youtube") {
              _0x2c271b = _0x589fef.getVideoLoadedFraction();
            } else if (_0xaad07c == "vimeo") {
              _0x2c271b = _0x34c8d8;
            }
          }
        }
        return _0x2c271b;
      };
      this.togglePlaylist = function (_0x5885de) {
        if (!_0x588a79) {
          return false;
        }
        _0x4d8ee1(_0x5885de);
      };
      this.toggleRandom = function (_0x4b4cbc) {
        if (!_0x588a79) {
          return false;
        }
        if (typeof _0x453856 === "undefined") {
          return false;
        }
        _0x453856.setRandom(_0x4b4cbc);
      };
      this.toggleLoop = function (_0x3042c8) {
        if (!_0x588a79) {
          return false;
        }
        if (typeof _0x453856 === "undefined") {
          return false;
        }
        _0x453856.setLooping(_0x3042c8);
      };
      this.setPlaybackRate = function (_0x3bcca6) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        _0x1450dc.playbackRate = _0x3bcca6;
        if (_0x1a96c8) {
          if (_0xaad07c == "audio") {
            if (_0x143642) {
              _0x143642.playbackRate = _0x3bcca6;
            }
          } else {
            if (_0xaad07c == "video") {
              if (_0x326462) {
                _0x326462.playbackRate = _0x3bcca6;
              }
            } else {
              if (_0xaad07c == "youtube") {
                _0x589fef.setPlaybackRate(Number(_0x3bcca6));
              } else if (_0xaad07c == "vimeo") {
                _0x24e760.setPlaybackRate(_0x3bcca6).then(function (_0x309eba) {})['catch'](function (_0x3c3e1d) {
                  console.log(_0x3c3e1d.name);
                });
              }
            }
          }
        }
      };
      this.setPlaybackQuality = function (_0xf820ba) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        if (_0x1a96c8) {
          if (_0xaad07c == "audio" || _0xaad07c == "video") {
            if (_0x225c56 == "hls") {
              var _0x4b0c3b = parseInt(_0xf820ba, 0xa);
              if (!_0x1450dc.quality) {
                _0x25274f.currentLevel = _0x4b0c3b;
                _0x25274f.nextLevel = _0x4b0c3b;
                _0x25274f.loadLevel = _0x4b0c3b;
              } else {
                _0x25274f.currentLevel = _0x4b0c3b;
              }
            } else {
              if (_0x225c56 == "dash") {
                var _0x4b0c3b = parseInt(_0xf820ba, 0xa);
                _0x19a052.setQualityFor("video", _0x4b0c3b);
              } else {
                _0x1450dc.quality = _0xf820ba;
                _0x225308(_0xf820ba);
                _0x1085bb = true;
                _0x1dff3e();
                _0x30fc93();
                _0x3a8faa();
              }
            }
          }
        }
      };
      this.toggleInfo = function (_0x2d4eb8) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        _0x5603f5(_0x2d4eb8);
      };
      this.toggleShare = function (_0x5041d5) {
        if (!_0x588a79) {
          return false;
        }
        if (!_0xaad07c) {
          return false;
        }
        _0x2dd698(_0x5041d5);
      };
      this.toggleFullscreen = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x4eaebf();
      };
      this.openLightbox = function (_0xac5d9d) {
        if (!_0x588a79) {
          return false;
        }
        if (_0x34e44f) {
          return false;
        }
        _0x14ff68.css("display", "block");
        setTimeout(function () {
          clearTimeout(this);
          _0x14ff68.css('opacity', 0x1);
        }, 0x32);
        if (typeof _0xac5d9d !== 'undefined') {
          var _0x2268de = _0x223a1c.find(".mvp-playlist-item[data-media-id=" + _0xac5d9d + ']');
          if (_0x2268de.length != 0x0) {
            var _0x1864cb = _0x2268de.attr('data-id');
            _0x453856.processPlaylistRequest(_0x1864cb);
          } else {
            _0x453856.processPlaylistRequest(_0x453856.getCounter());
          }
        } else {
          _0x453856.processPlaylistRequest(_0x453856.getCounter());
        }
      };
      this.closeLightbox = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x14ff68.one("transitionend", function () {
          _0x14ff68.css("display", "none");
          _0x34e44f = false;
          _0x4c9596();
        }).css("opacity", 0x0);
        if (_0x49c9b1.displayWatchedPercentage && _0x1450dc && _0xaad07c != "image" && _0x1a96c8) {
          _0xc8886f();
        }
        if (_0xaad07c) {
          _0x537dc7();
        }
      };
      this.destroyMedia = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x47cba3();
      };
      this.destroyPlaylist = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x372383();
      };
      this.destroyInstance = function () {
        _0x372383();
        if (_0x453856) {
          _0x2c8ffb(_0x453856).off();
          _0x453856 = null;
        }
        if (_0x350714) {
          _0x2c8ffb(_0x350714).off();
          _0x350714 = null;
        }
        if (_0x5c7de9) {
          _0x2c8ffb(_0x5c7de9).off();
          _0x5c7de9 = null;
        }
        if (_0xb8e3f0) {
          _0x5c7de9 = null;
        }
        if (_0x25274f) {
          _0x25274f.off();
          _0x25274f.destroy();
          _0x25274f = null;
        }
        if (_0x19a052) {
          _0x19a052.off();
          dashjs.MediaPlayer().reset();
          _0x19a052 = null;
        }
        _0x1e590e.off(".mvp");
        _0x5215aa.off(".mvp");
      };
      this.loadPlaylist = function (_0x5c95ed, _0x56246b) {
        if (!_0x588a79 || _0x547090) {
          return false;
        }
        if (typeof _0x5c95ed === "string") {
          if (typeof _0x56246b != undefined) {
            _0x49c9b1.mediaId = _0x56246b;
          }
          if (_0x200cb8 == _0x5c95ed) {
            return false;
          }
          _0x1b42bc(_0x5c95ed);
        } else {
          alert("Invalid value loadPlaylist!");
          return false;
        }
      };
      this.setAutoPlay = function (_0x53d98e) {
        _0x4d248d = _0x53d98e;
      };
      this.inputMedia = function (_0x376f83) {
        if (!_0x588a79) {
          return false;
        }
        if (_0x547090) {
          return false;
        }
        if (_0x2aa7b0) {
          _0x4c9596();
        }
        if (_0x142a3d > 0x0) {
          _0x453856.reSetCounter();
        }
        _0x1450dc = _0x376f83;
        _0xaad07c = _0x376f83.type;
        if (_0x4b39ef.indexOf(_0xaad07c) == -0x1) {
          alert("inputMedia method supports tracks that dont require processing: " + _0x4b39ef);
          return false;
        }
        if (!_0x142a3d || _0x142a3d == 0x0) {
          _0x49c9b1.mediaEndAction = "loop";
        }
        if (_0x1450dc.origtype == "s3_video" || _0x1450dc.origtype == "s3_audio") {
          _0xe718f4(_0x1450dc);
        } else {
          _0x1f4eb8();
        }
      };
      this.loadMedia = function (_0x3ec840, _0x26b846, _0x4b9cbd) {
        if (!_0x588a79 || _0x547090) {
          return false;
        }
        if (!_0x3d64b6) {
          return false;
        }
        var _0x4e0b14 = -0x1;
        if (_0x3ec840 == "title") {
          var _0x4c7e46;
          var _0x36bd08;
          for (_0x4c7e46 = 0x0; _0x4c7e46 < _0x142a3d; _0x4c7e46++) {
            if (_0x26b846 == _0x1eed68[_0x4c7e46].data.title) {
              _0x4e0b14 = _0x4c7e46;
              _0x36bd08 = true;
              break;
            }
          }
          if (!_0x36bd08) {
            alert("No media with title \"" + _0x26b846 + "\" to load! LoadMedia failed.");
            return false;
          }
        } else {
          if (_0x3ec840 == 'counter') {
            if (_0x26b846 < 0x0) {
              alert("Invalid track number. Track number  \"" + _0x26b846 + "\" doesnt exist. LoadMedia failed.");
              return false;
            } else {
              if (_0x26b846 > _0x142a3d - 0x1) {
                alert("Invalid track number. Track number  \"" + _0x26b846 + "\" doesnt exist. LoadMedia failed.");
                return false;
              } else {
                _0x4e0b14 = _0x26b846;
              }
            }
          } else {
            if (_0x3ec840 == 'id') {
              var _0x34d6a0 = _0x223a1c.find('.mvp-playlist-item[data-media-id=' + _0x26b846 + ']');
              if (_0x34d6a0.length == 0x0) {
                alert("No media with media ID " + _0x26b846 + " to load! LoadMedia failed.");
                return false;
              }
              _0x4e0b14 = _0x34d6a0.attr('data-id');
            } else {
              if (_0x3ec840 == "id-title") {
                var _0x34d6a0 = _0x223a1c.find(".mvp-playlist-item[data-media-id=\"" + _0x26b846 + "\"][title=\"" + _0x4b9cbd + "\"]");
                if (_0x34d6a0.length == 0x0) {
                  alert("No media with media ID " + _0x26b846 + " to load! LoadMedia failed.");
                  return false;
                }
                _0x4e0b14 = _0x34d6a0.attr("data-id");
              } else {
                console.log("loadMedia function requires format parameter!");
                return false;
              }
            }
          }
        }
        _0x57fdf0();
        _0x453856.processPlaylistRequest(_0x4e0b14);
      };
      this.addTrack = function (_0x21bb49, _0x2f463b, _0x52ea8e, _0x2fe455) {
        if (!_0x588a79 || _0x547090) {
          return false;
        }
        _0x1cedbb = false;
        if (typeof _0x52ea8e !== "undefined") {
          _0x1cedbb = _0x52ea8e;
        }
        var _0x157975 = 0x1;
        var _0x1f0cd1 = false;
        if (typeof _0x2f463b === 'string' || Object.prototype.toString.call(_0x2f463b) === "[object Object]") {} else {
          if (Object.prototype.toString.call(_0x2f463b) === "[object Array]") {
            _0x157975 = _0x2f463b.length;
            _0x1f0cd1 = true;
          } else {
            alert("addTrack method requires track as string, object or array parameter. AddTrack failed.");
            return false;
          }
        }
        _0x53f505 = _0x2fe455;
        _0x4a105b = false;
        _0x20c1ed = true;
        if (_0x3d64b6) {
          if (typeof _0x53f505 !== "undefined") {
            if (_0x53f505 < 0x0) {
              _0x53f505 = 0x0;
            } else if (_0x3e3db2 => _0x142a3d || _0x3e3db2 == "end") {
              _0x53f505 = _0x142a3d;
              _0x4a105b = true;
            }
          } else {
            _0x4a105b = true;
            _0x53f505 = _0x142a3d;
          }
        } else {
          _0x53f505 = 0x0;
          _0x4a105b = true;
        }
        _0x547090 = true;
        _0x43db09.show();
        _0x5561a0 = -0x1;
        _0x2a1553 = [];
        _0x4a08ff = [];
        var _0x525048;
        var _0x3b9f1b;
        var _0x2efb90;
        for (_0x525048 = 0x0; _0x525048 < _0x157975; _0x525048++) {
          _0x3b9f1b = _0x1f0cd1 ? _0x2f463b[_0x525048] : _0x2f463b;
          _0x2efb90 = {};
          if (_0x21bb49 == "html") {
            _0x2efb90 = _0x54cd1f(_0x2c8ffb(_0x3b9f1b));
          } else {
            _0x2efb90 = _0x3b9f1b;
          }
          _0x4a08ff.push(_0x2efb90);
        }
        _0x142a3d = _0x4a08ff.length;
        _0x3d64b6 = _0x223a1c;
        _0x298f2c = false;
        _0x388bd8();
      };
      this.removeTrack = function (_0xaf6097, _0x201965) {
        if (!_0x588a79 || _0x547090) {
          return false;
        }
        if (_0x142a3d == 0x0) {
          return;
        }
        var _0x1adaab;
        var _0x3c5d8d;
        if (_0xaf6097 == "title") {
          var _0x353a4b;
          for (_0x353a4b = 0x0; _0x353a4b < _0x142a3d; _0x353a4b++) {
            if (_0x201965 == _0x1eed68[_0x353a4b].data.title) {
              _0x1adaab = _0x223a1c.children(".mvp-playlist-item").eq(_0x353a4b);
              _0x3c5d8d = true;
              break;
            }
          }
          if (!_0x3c5d8d) {
            alert("Track with title \"" + _0x201965 + "\" doesnt exist. RemoveTrack failed.");
            return false;
          }
        } else {
          if (_0xaf6097 == "counter") {
            _0x201965 = parseInt(_0x201965, 0xa);
            if (_0x201965 < 0x0 || _0x201965 > _0x142a3d - 0x1) {
              alert("Track number  \"" + _0x201965 + "\" doesnt exist. RemoveTrack failed.");
              return false;
            }
            _0x1adaab = _0x223a1c.find(".mvp-playlist-item").eq(_0x201965);
          } else {
            if (_0xaf6097 == 'id') {
              _0x1adaab = _0x223a1c.find(".mvp-playlist-item[data-media-id=" + _0x201965 + ']');
              if (_0x1adaab.length == 0x0) {
                alert("Track with media id \"" + _0x201965 + "\" doesnt exist. RemoveTrack failed.");
                return false;
              }
            } else {
              alert("removeTrack method failed.");
              return false;
            }
          }
        }
        _0x1adaab.remove();
        _0x1eed68.splice(parseInt(_0x1adaab.attr("data-id"), 0xa), 0x1);
        _0x2a5ee9();
        if (_0x142a3d > 0x0) {
          var _0x29d06e = _0x453856.getCounter();
          if (_0x201965 == _0x29d06e) {
            _0x537dc7();
            _0x453856.setPlaylistItems(_0x142a3d);
          } else {
            _0x453856.setPlaylistItems(_0x142a3d, false);
            if (_0x201965 < _0x29d06e) {
              _0x453856.reSetCounter(_0x453856.getCounter() - 0x1);
            } else {}
          }
        } else {
          _0x372383();
        }
        if (_0x5560e8) {
          _0x1b620a();
        }
      };
      this.setOfflineImage = function (_0x5188f8) {
        if (!_0x3ccccf) {
          _0x3ccccf = _0x2c8ffb("<div class=\"mvp-offline-holder\"/>").appendTo(_0x139c5b);
        }
        if (_0x5188f8) {
          _0x2c8ffb(new Image()).addClass("mvp-media").appendTo(_0x3ccccf.empty().show()).on("load", function () {
            MVPAspectRatio.resizeMedia("image", _0x588042, _0x93b161, _0x27da1e);
            _0x2c8ffb(this).addClass('mvp-visible');
          }).on("error", function (_0x104ad2) {
            console.log(_0x104ad2);
          }).attr({
            'src': _0x5188f8
          });
          if (_0x49c9b1.offlineImageUrl) {
            _0x3ccccf.on("click", function () {
              if (_0x49c9b1.offlineImageUrlTarget && _0x49c9b1.offlineImageUrlTarget == "_blank") {
                window.open(_0x49c9b1.offlineUrl);
              } else {
                window.location = _0x49c9b1.offlineImageUrl;
                return;
              }
            });
          }
        } else {
          _0x3ccccf.empty().hide().off('click');
        }
      };
      this.totalScrollAction = function () {
        if (_0x20063) {
          if (_0x1d567f && _0x3174a1) {
            if (!_0x547090) {
              _0x5ca0d3.loadMore();
            }
          }
        } else if (_0x2d3b7c) {
          if (!_0x58b362) {
            _0x3859ca();
          }
        }
      };
      this.loadMore = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0x3174a1) {
          return false;
        }
        if (!_0x1d567f) {
          return false;
        }
        if (_0x547090) {
          return false;
        }
        _0x547090 = true;
        _0x43db09.show();
        _0x58b362 = true;
        _0x2a1553 = [];
        if (_0x3174a1 == 'youtube') {
          if (!_0x350714) {
            _0x15e4c0('youtube');
            var _0xaaf412 = setInterval(function () {
              if (_0x350714) {
                clearInterval(_0xaaf412);
                _0x350714.resumeLoad(_0x1d567f);
              }
            }, 0x64);
          } else {
            _0x350714.resumeLoad(_0x1d567f);
          }
        } else {
          if (_0x3174a1 == 'vimeo') {
            if (!_0x5c7de9) {
              _0x15e4c0("vimeo");
              var _0xaaf412 = setInterval(function () {
                if (_0x5c7de9) {
                  clearInterval(_0xaaf412);
                  _0x5c7de9.resumeLoad(_0x1d567f);
                }
              }, 0x64);
            } else {
              _0x5c7de9.resumeLoad(_0x1d567f);
            }
          }
        }
      };
      this.setLoadMore = function (_0x3b8c6c) {
        _0x20063 = _0x3b8c6c;
      };
      this.endLoadMore = function () {
        _0x547090 = false;
        _0x43db09.hide();
        _0x58b362 = false;
      };
      function _0x3859ca() {
        _0x43db09.show();
        _0x58b362 = true;
        if (_0x45d18d) {
          _0x45d18d.css("opacity", 0x0);
        }
        var _0x2ad40f = [{
          'name': "action",
          'value': "mvp_add_more"
        }, {
          'name': 'playlist_id',
          'value': _0xd3a404
        }, {
          'name': "addMoreOffset",
          'value': _0x2d0ff2
        }, {
          'name': "addMoreLimit",
          'value': _0x3d4743
        }, {
          'name': "addMoreSortOrder",
          'value': _0x3e776d
        }, {
          'name': "addMoreSortDirection",
          'value': _0x5bea3f
        }, {
          'name': "encryptMediaPaths",
          'value': _0x1c7baf
        }];
        _0x2c8ffb.ajax({
          'url': _0x49c9b1.ajax_url,
          'type': 'post',
          'data': _0x2ad40f,
          'dataType': "json"
        }).done(function (_0x50ad05) {
          if (_0x2a1113 && _0x2a1113.attr("data-add-more-offset") != undefined) {
            _0x2d0ff2 = parseInt(_0x2a1113.attr("data-add-more-offset"), 0xa) + _0x3d4743;
            _0x2a1113.attr('data-add-more-offset', _0x2d0ff2);
          }
          _0x5ca0d3.addTrack("html", _0x50ad05);
        }).fail(function (_0x41f87f, _0x8d6758, _0x7bbb9e) {
          console.log(_0x41f87f.responseText, _0x8d6758, _0x7bbb9e);
          _0x5ca0d3.endLoadMore();
        });
      }
      this.addMore = function () {
        if (!_0x588a79) {
          return false;
        }
        if (_0x547090) {
          return false;
        }
        if (_0x2d3b7c) {
          if (!_0x58b362) {
            _0x3859ca();
          }
        }
      };
      this.setAddMore = function (_0x404379) {
        _0x2d3b7c = _0x404379;
      };
      function _0x3f38d5() {
        _0x43db09.show();
        _0x58b362 = true;
        var _0x105055 = [{
          'name': "action",
          'value': "mvp_add_more"
        }, {
          'name': "playlist_id",
          'value': _0xd3a404
        }, {
          'name': "addMoreOffset",
          'value': _0x2d0ff2
        }, {
          'name': "addMoreLimit",
          'value': _0x3d4743
        }, {
          'name': "addMoreSortOrder",
          'value': _0x3e776d
        }, {
          'name': "addMoreSortDirection",
          'value': _0x5bea3f
        }, {
          'name': "encryptMediaPaths",
          'value': _0x1c7baf
        }];
        _0x2c8ffb.ajax({
          'url': _0x49c9b1.ajax_url,
          'type': "post",
          'data': _0x105055,
          'dataType': 'json'
        }).done(function (_0x1ea8be) {
          _0x223a1c.find(".mvp-playlist-item:visible").addClass("mvp-pagination-hidden").each(function () {
            _0x2c8ffb(this).find('.mvp-thumbimg').removeClass("mvp-visible");
          });
          _0x5ca0d3.addTrack("html", _0x1ea8be);
          _0x3bde0b(_0x107c46);
          _0x4b0f7c();
        }).fail(function (_0x2757f4, _0x11cf12, _0x281ad4) {
          console.log(_0x2757f4, _0x11cf12, _0x281ad4);
          _0x5ca0d3.endLoadMore();
        });
      }
      function _0x4b0f7c() {
        _0x4b0daf[_0x107c46].page = _0x107c46;
        var _0x5a6c77 = [];
        _0x223a1c.find(".mvp-playlist-item:not(.mvp-pagination-hidden)").each(function () {
          _0x5a6c77.push(_0x2c8ffb(this));
        });
        _0x4b0daf[_0x107c46].media_id = _0x5a6c77;
      }
      function _0x3bde0b(_0x45e004) {
        _0x45e004 += 0x1;
        var _0x30126c;
        var _0x314216;
        var _0x357815 = "<div class=\"mvp-pagination-container\">";
        if (_0x45e004 > 0x1) {
          _0x357815 += "<div class=\"mvp-pagination-page mvp-pagination-prev\" data-page-id=\"prev\" title=\"" + _0x49c9b1.paginationPreviousBtnTitle + "\">" + _0x49c9b1.paginationPreviousBtnText + "</div>";
        }
        if (_0x45e004 > 0x3) {
          _0x357815 += "<div class=\"mvp-pagination-page mvp-pagination-start\" data-page-id=\"0\">1</div><div class=\"mvp-pagination-dots\">...</div>";
        }
        if (_0x45e004 - 0x2 > 0x0) {
          _0x30126c = _0x45e004 - 0x2;
          _0x314216 = _0x30126c - 0x1;
          _0x357815 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + "</div>";
        }
        if (_0x45e004 - 0x1 > 0x0) {
          _0x30126c = _0x45e004 - 0x1;
          _0x314216 = _0x30126c - 0x1;
          _0x357815 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + "</div>";
        }
        _0x30126c = _0x45e004;
        _0x314216 = _0x30126c - 0x1;
        _0x357815 += "<div class=\"mvp-pagination-page mvp-pagination-currentpage\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + '</div>';
        if (_0x45e004 + 0x1 < _0x4ac7b1 + 0x1) {
          _0x30126c = _0x45e004 + 0x1;
          _0x314216 = _0x30126c - 0x1;
          _0x357815 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + "</div>";
        }
        if (_0x45e004 + 0x2 < _0x4ac7b1 + 0x1) {
          _0x30126c = _0x45e004 + 0x2;
          _0x314216 = _0x30126c - 0x1;
          _0x357815 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + "</div>";
        }
        if (_0x45e004 < _0x4ac7b1 - 0x2) {
          _0x30126c = _0x4ac7b1;
          _0x314216 = _0x30126c - 0x1;
          _0x357815 += "<div class=\"mvp-pagination-dots\">...</div><div class=\"mvp-pagination-page mvp-pagination-end\" data-page-id=\"" + _0x314216 + "\">" + _0x30126c + "</div>";
        }
        if (_0x45e004 < _0x4ac7b1) {
          _0x357815 += "<div class=\"mvp-pagination-page mvp-pagination-next\" data-page-id=\"next\" title=\"" + _0x49c9b1.paginationNextBtnTitle + "\">" + _0x49c9b1.paginationNextBtnText + "</div>";
        }
        _0x357815 += "</div>";
        if (_0x295725) {
          _0x295725.html(_0x357815);
        } else {
          _0x550351.append("<div class=\"mvp-pagination-wrap\">" + _0x357815 + '</div>');
        }
        if (!_0x4e5836) {
          _0x4e5836 = true;
          _0x295725 = _0x550351.find(".mvp-pagination-wrap").on("click", ".mvp-pagination-page:not(.mvp-pagination-currentpage)", function () {
            if (!_0x588a79) {
              return false;
            }
            if (_0x547090) {
              return false;
            }
            if (_0x58b362) {
              return false;
            }
            _0x58b362 = true;
            if (_0xda4773) {
              _0xda4773.removeClass("mvp-pagination-currentpage");
            }
            _0xda4773 = _0x2c8ffb(this).addClass("mvp-pagination-currentpage");
            var _0x4659a6 = _0x2c8ffb(this).attr('data-page-id');
            if (_0x4659a6 == 'prev') {
              _0x107c46 -= 0x1;
            } else {
              if (_0x4659a6 == 'next') {
                _0x107c46 += 0x1;
              } else {
                _0x107c46 = parseInt(_0x4659a6, 0xa);
              }
            }
            if (_0x4b0daf[_0x107c46].page == null) {
              _0x2d0ff2 = _0x107c46 * _0x3d4743;
              _0x3f38d5();
            } else {
              _0x223a1c.find(".mvp-playlist-item:visible").addClass("mvp-pagination-hidden").each(function () {
                _0x2c8ffb(this).find('.mvp-thumbimg').removeClass("mvp-visible");
              });
              var _0x162285 = _0x4b0daf[_0x107c46].media_id;
              _0x2c8ffb(_0x162285).each(function () {
                var _0x266381 = _0x2c8ffb(this).removeClass("mvp-pagination-hidden").find(".mvp-thumbimg").removeClass("mvp-visible");
                setTimeout(function () {
                  _0x266381.addClass("mvp-visible");
                }, 0x14);
              });
              _0x3bde0b(_0x107c46);
              _0x58b362 = false;
            }
          });
          _0xda4773 = _0x295725.find(".mvp-pagination-currentpage");
        }
      }
      this.getTitle = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0x1450dc) {
          return false;
        }
        return _0x1450dc.title;
      };
      this.getMediaPlaying = function () {
        if (!_0x588a79) {
          return false;
        }
        return _0x1f950b;
      };
      this.getPlaylistLength = function () {
        if (!_0x588a79) {
          return false;
        }
        return _0x142a3d;
      };
      this.getPlaylistData = function () {
        if (!_0x588a79) {
          return false;
        }
        return _0x1eed68;
      };
      this.getLastPlaylistData = function () {
        if (!_0x588a79) {
          return false;
        }
        return _0x234582;
      };
      this.getMediaType = function () {
        if (!_0x588a79) {
          return false;
        }
        return _0xaad07c;
      };
      this.getSetupDone = function () {
        return _0x588a79;
      };
      this.isPlaylistLoading = function () {
        return _0x547090;
      };
      this.getSettings = function () {
        return _0x49c9b1;
      };
      this.getActiveItemId = function () {
        if (!_0x588a79) {
          return false;
        }
        return typeof _0x453856 !== "undefined" ? _0x453856.getCounter() : null;
      };
      this.adSkip = function () {
        if (!_0x588a79) {
          return false;
        }
        if (!_0x395507 || !_0x35e6d6) {
          return false;
        }
        if (_0x32f14f) {
          _0x32f14f.trigger("click");
        }
      };
      this.resize = function () {
        if (!_0x588a79) {
          return false;
        }
        _0x31d45c();
      };
      if (_0x181123) {
        if (_0x49c9b1.playbackPositionKey) {
          if (!_0x49c9b1.rememberPlaybackPosition) {
            localStorage.removeItem(_0x40ddc8);
          } else {
            if (localStorage.getItem(_0x40ddc8)) {
              var _0x80d57d = JSON.parse(localStorage.getItem(_0x40ddc8));
              _0x1ac3d7 = _0x80d57d.volume;
              if (_0x49c9b1.rememberPlaybackPosition == '1') {
                _0x49c9b1.playbackPositionTime = _0x80d57d.playbackPositionTime;
                _0x49c9b1.activeItem = _0x80d57d.activeItem;
              } else if (_0x49c9b1.rememberPlaybackPosition == "all") {
                _0x49c9b1.lastPositionArr = _0x80d57d.lastPositionArr;
              }
              localStorage.removeItem(_0x40ddc8);
            }
          }
        }
      }
      if (_0x5560e8) {
        if (typeof MVPCacheManager === "undefined") {
          var _0xdcb1d = document.createElement("script");
          _0xdcb1d.type = "text/javascript";
          _0xdcb1d.src = MVPUtils.qualifyURL(_0x49c9b1.sourcePath + _0x49c9b1.cache_js);
          _0xdcb1d.onload = _0xdcb1d.onreadystatechange = function () {
            if (!this.readyState || this.readyState == "complete") {
              _0x247c95 = new MVPCacheManager("TeanCacheMVP");
              _0x2c8ffb(_0x247c95).on("MVPCacheManager.GET_DATA", function (_0x41a0c3, _0x589031) {
                if (_0x589031) {
                  var _0x1b1eeb = _0x589031.value;
                  if (_0x1b1eeb.date + _0x49c9b1.cacheTime > Math.floor(Date.now() / 0x3e8)) {
                    if (_0x1b1eeb.activePlaylist == _0x49c9b1.activePlaylist) {
                      _0x200cb8 = _0x49c9b1.activePlaylist;
                      _0x298f2c = true;
                      console.log("Playlist is loading from cache!");
                      if (_0x1b1eeb.globalPlaylistData) {
                        _0x223a1c.html(_0x1b1eeb.globalPlaylistData);
                      }
                      var _0x4494f1 = JSON.parse(_0x1b1eeb.playlist);
                      _0x2a1553 = [];
                      var _0x5389b2;
                      var _0x15c557 = _0x4494f1.length;
                      for (_0x5389b2 = 0x0; _0x5389b2 < _0x15c557; _0x5389b2++) {
                        _0x2a1553.push(_0x4494f1[_0x5389b2].data);
                      }
                      if (_0x1b1eeb.loadMoreOnTotalScroll) {
                        _0x20063 = _0x1b1eeb.loadMoreOnTotalScroll;
                        _0x1d567f = _0x1b1eeb.nextPageToken;
                        _0x24d23e = _0x1b1eeb.loadMoreItem;
                        _0x3174a1 = _0x1b1eeb.loadMoreType;
                      }
                      _0x1b1eeb = null;
                    } else {
                      _0x247c95.deleteData();
                    }
                  } else {
                    _0x247c95.deleteData();
                  }
                }
                _0x9e829b();
              });
            }
          };
          _0xdcb1d.onerror = function () {
            console.log("Error loading " + this.src);
          };
          var _0x654e32 = document.getElementsByTagName("script")[0x0];
          _0x654e32.parentNode.insertBefore(_0xdcb1d, _0x654e32);
        }
      } else {
        _0x9e829b();
      }
      function _0x9e829b() {
        if (_0x49c9b1.activateWhenParentVisible) {
          var _0x1c3698 = _0x550351.parent();
          if (_0x1c3698.length) {
            var _0x415702 = setInterval(function () {
              if (_0x1c3698.css("display") != "none" && _0x1c3698.width() > 0x0 && _0x1c3698.height() > 0x0) {
                clearInterval(_0x415702);
                _0x684b8f();
              }
            }, 0x1f4);
          } else {
            _0x684b8f();
          }
        } else {
          _0x684b8f();
        }
      }
      function _0x1b620a() {
        var _0xf2f8e7 = {
          'activePlaylist': _0x200cb8,
          'playlist': JSON.stringify(_0x1eed68),
          'date': Math.floor(Date.now() / 0x3e8)
        };
        if (_0x2a1113) {
          _0xf2f8e7.globalPlaylistData = _0x2a1113.wrap("<p>").parent().html();
        }
        if (_0x20063 && _0x1d567f && _0x24d23e && _0x3174a1) {
          _0xf2f8e7.loadMoreOnTotalScroll = true;
          _0xf2f8e7.nextPageToken = _0x1d567f;
          _0xf2f8e7.loadMoreItem = _0x24d23e;
          _0xf2f8e7.loadMoreType = _0x3174a1;
        }
        if (_0x247c95) {
          _0x247c95.saveData(_0xf2f8e7);
        }
      }
      if (_0x49c9b1.showControlsBeforeStart) {
        _0x8f9621.find(".mvp-btn-play").show();
        _0x50f193();
      }
      function _0x684b8f() {
        setTimeout(function () {
          var _0x3cd0a7 = _0x2c8ffb("<div class=\"mvp-playlist-item\" style=\"opacity:0;\"></div>").prependTo(_0x550351);
          if (_0x1898dd == 'h') {
            _0x49c9b1.pi_size = _0x3cd0a7.outerWidth(true);
          } else {
            _0x49c9b1.pi_size = _0x3cd0a7.outerHeight(true);
          }
          _0x3cd0a7.remove();
          _0x3cd0a7 = null;
          if (_0x2a1553.length) {
            _0x55ad20();
          } else {
            if (_0x4bcbda.length) {
              _0x547090 = true;
              _0x43db09.show();
              _0x2c8ffb(_0x5ca0d3).trigger('playlistStartLoad', {
                'instance': _0x5ca0d3,
                'instanceName': _0x49c9b1.instanceName
              });
              _0x4a08ff = _0x4bcbda;
              _0x142a3d = _0x4a08ff.length;
              _0x388bd8();
            } else if (_0x49c9b1.activePlaylist && !MVPUtils.isEmpty(_0x49c9b1.activePlaylist)) {
              _0x1b42bc(_0x49c9b1.activePlaylist);
            } else {
              _0x179bd6();
            }
          }
        }, 0x32);
      }
      return this;
    };
  })(jQuery);