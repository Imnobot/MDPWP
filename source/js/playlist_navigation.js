(function (_0x2fde50, _0x26b4bc) {
    'use strict';
  
    var _0x395e0b = function (_0x5f4b2d) {
      var _0x10974b = this;
      var _0x1e599a = MVPUtils.isMobile();
      var _0x59345e = 'ontouchstart' in _0x2fde50;
      var _0x556f56 = _0x5f4b2d.parent;
      var _0x2e95d0 = _0x5f4b2d.wrapper;
      var _0x2698b5 = _0x5f4b2d.playlistHolder;
      var _0x499db5 = _0x5f4b2d.playlistInner;
      var _0x2dc795 = _0x5f4b2d.playlistContent;
      var _0x2f09fb = _0x2e95d0.find('.mvp-nav-backward');
      var _0x5abaed = _0x2e95d0.find(".mvp-nav-forward");
      var _0x71f813 = _0x5f4b2d.navigationDirection;
      var _0x312cc7 = _0x5f4b2d.navigationType;
      var _0x4ce18f = _0x5f4b2d.pi_size;
      var _0x48dab8 = _0x5f4b2d.thumbScrollValue;
      var _0x42e76d = true;
      var _0x48b5cf;
      var _0x29027a;
      var _0x1fa2de;
      var _0x11696b;
      function _0x467c25(_0x3d3d77) {
        var _0x7f7c44;
        _0x26b4bc.each(_0x26b4bc("head link"), function () {
          if (_0x26b4bc(this).attr('href').toLowerCase().indexOf(_0x3d3d77.toLowerCase()) > -0x1) {
            _0x7f7c44 = true;
            return false;
          }
        });
        return _0x7f7c44;
      }
      function _0x2a0f09(_0x4694fe) {
        var _0x5540ed = document.createElement('link');
        _0x5540ed.setAttribute("type", "text/css");
        _0x5540ed.setAttribute("rel", "stylesheet");
        _0x5540ed.setAttribute("href", _0x4694fe);
        _0x26b4bc('head').append(_0x5540ed);
      }
      this.checkPlaylistNavigation = function () {
        if (_0x312cc7 == "scroll") {
          if (_0x2fde50.playlistScrollLoading) {
            var _0x3b7f54 = setInterval(function () {
              if (!_0x2fde50.playlistScrollLoading) {
                clearInterval(_0x3b7f54);
                _0x10974b.checkPlaylistNavigation();
                return;
              }
            }, 0x64);
            return;
          }
          if (_0x5f4b2d.playlistScrollType == "mcustomscrollbar") {
            if (!_0x11696b && !_0x467c25("mcustomscrollbar")) {
              if (!MVPUtils.relativePath(_0x5f4b2d.mCustomScrollbar_css)) {
                var _0x1cbf26 = MVPUtils.qualifyURL(_0x5f4b2d.sourcePath + _0x5f4b2d.mCustomScrollbar_css);
              } else {
                var _0x1cbf26 = _0x5f4b2d.mCustomScrollbar_css;
              }
              _0x2a0f09(_0x1cbf26);
              _0x11696b = true;
            }
            if (typeof mCustomScrollbar === "undefined") {
              _0x2fde50.playlistScrollLoading = true;
              var _0x6cd278 = document.createElement("script");
              _0x6cd278.type = 'text/javascript';
              if (!MVPUtils.relativePath(_0x5f4b2d.mCustomScrollbar_js)) {
                var _0x1cbf26 = MVPUtils.qualifyURL(_0x5f4b2d.sourcePath + _0x5f4b2d.mCustomScrollbar_js);
              } else {
                var _0x1cbf26 = _0x5f4b2d.mCustomScrollbar_js;
              }
              _0x6cd278.src = _0x1cbf26;
              _0x6cd278.onload = _0x6cd278.onreadystatechange = function () {
                if (!this.readyState || this.readyState == 'complete') {
                  _0x10974b.checkPlaylistNavigation();
                  _0x2fde50.playlistScrollLoading = false;
                }
              };
              _0x6cd278.onerror = function () {
                alert("Error loading " + this.src);
              };
              var _0x5063ea = document.getElementsByTagName("script")[0x0];
              _0x5063ea.parentNode.insertBefore(_0x6cd278, _0x5063ea);
              return;
            }
            var _0x133af1 = _0x71f813 == 'h' ? 'x' : 'y';
            _0x499db5.mCustomScrollbar({
              'axis': _0x133af1,
              'theme': _0x5f4b2d.playlistScrollTheme,
              'scrollInertia': 0x0,
              'scrollButtons': {
                'enable': true
              },
              'mouseWheel': {
                'normalizeDelta': true,
                'deltaFactor': 0x32,
                'preventDefault': true
              },
              'keyboard': {
                'enable': false
              },
              'advanced': {
                'autoExpandHorizontalScroll': true
              },
              'callbacks': {
                'onOverflowYNone': function () {
                  _0x499db5.find(".mCSB_container").addClass("mvp-mCSB_full");
                },
                'onOverflowY': function () {
                  _0x499db5.find(".mCSB_container").removeClass("mvp-mCSB_full");
                },
                'onTotalScroll': function () {
                  _0x556f56.totalScrollAction();
                },
                'alwaysTriggerOffsets': false
              }
            });
          } else {
            if (_0x5f4b2d.playlistScrollType == 'perfect-scrollbar') {
              if (!_0x11696b && !_0x467c25("perfect-scrollbar")) {
                if (!MVPUtils.relativePath(_0x5f4b2d.perfectScrollbar_css)) {
                  var _0x1cbf26 = MVPUtils.qualifyURL(_0x5f4b2d.sourcePath + _0x5f4b2d.perfectScrollbar_css);
                } else {
                  var _0x1cbf26 = _0x5f4b2d.perfectScrollbar_css;
                }
                _0x2a0f09(_0x1cbf26);
                _0x11696b = true;
              }
              if (typeof PerfectScrollbar !== "function") {
                _0x2fde50.playlistScrollLoading = true;
                var _0x6cd278 = document.createElement("script");
                _0x6cd278.type = "text/javascript";
                if (!MVPUtils.relativePath(_0x5f4b2d.perfectScrollbar_js)) {
                  var _0x1cbf26 = MVPUtils.qualifyURL(_0x5f4b2d.sourcePath + _0x5f4b2d.perfectScrollbar_js);
                } else {
                  var _0x1cbf26 = _0x5f4b2d.perfectScrollbar_js;
                }
                _0x6cd278.src = _0x1cbf26;
                _0x6cd278.onload = _0x6cd278.onreadystatechange = function () {
                  if (!this.readyState || this.readyState == 'complete') {
                    _0x10974b.checkPlaylistNavigation();
                    _0x2fde50.playlistScrollLoading = false;
                  }
                };
                _0x6cd278.onerror = function () {
                  alert("Error loading " + this.src);
                };
                var _0x5063ea = document.getElementsByTagName("script")[0x0];
                _0x5063ea.parentNode.insertBefore(_0x6cd278, _0x5063ea);
              } else {
                _0x1fa2de = new PerfectScrollbar(_0x499db5[0x0], {
                  'wheelSpeed': 0x2,
                  'wheelPropagation': true,
                  'minScrollbarLength': 0x64
                });
                var _0x185cf8 = _0x71f813 == 'h' ? "ps-x-reach-end" : "ps-y-reach-end";
                _0x499db5[0x0].addEventListener(_0x185cf8, () => {
                  _0x556f56.totalScrollAction();
                });
              }
            }
          }
        } else {
          if (_0x312cc7 == 'buttons') {
            if (!_0x1e599a) {
              _0x499db5.on("wheel", function (_0x13ffde) {
                if (!_0x556f56.getSetupDone() || _0x556f56.isPlaylistLoading()) {
                  return false;
                }
                if (!_0x42e76d) {
                  return false;
                }
                if (_0x71f813 == 'h') {
                  var _0x371583 = _0x499db5.width();
                  var _0x1e3588 = _0x2dc795.width();
                  var _0x30cf95 = 'translateX';
                } else {
                  var _0x371583 = _0x499db5.height();
                  var _0x1e3588 = _0x2dc795.height();
                  var _0x30cf95 = "translateY";
                }
                if (_0x1e3588 < _0x371583) {
                  return;
                }
                _0x2f09fb.show();
                _0x5abaed.show();
                if (_0x13ffde.originalEvent.wheelDelta) {
                  var _0x1d4a19 = _0x13ffde.originalEvent.wheelDelta > 0x0 ? 0x1 : -0x1;
                  var _0x1921d8;
                } else {
                  if (_0x13ffde.originalEvent.detail) {
                    var _0x1d4a19 = _0x13ffde.originalEvent.detail < 0x0 ? 0x1 : -0x1;
                    var _0x1921d8;
                  }
                }
                if (!_0x29027a) {
                  _0x1921d8 = _0x2dc795[0x0].style.transform.replace(/[^\d.]/g, '');
                  _0x1921d8 = parseInt(_0x1921d8) || 0x0;
                } else {
                  _0x1921d8 = _0x29027a;
                }
                _0x1921d8 += _0x48dab8 * _0x1d4a19;
                if (_0x1921d8 > 0x0) {
                  _0x1921d8 = 0x0;
                  _0x2f09fb.hide();
                } else if (_0x1921d8 <= _0x371583 - _0x1e3588) {
                  _0x1921d8 = _0x371583 - _0x1e3588;
                  _0x5abaed.hide();
                  _0x556f56.totalScrollAction();
                }
                _0x29027a = _0x1921d8;
                _0x2dc795.css({
                  '-webkit-transform': '' + _0x30cf95 + '(' + _0x1921d8 + 'px)',
                  '-ms-transform': '' + _0x30cf95 + '(' + _0x1921d8 + "px)",
                  'transform': '' + _0x30cf95 + '(' + _0x1921d8 + 'px)'
                });
                return false;
              });
            }
            _0x2f09fb.on('click', function () {
              if (!_0x556f56.getSetupDone() || _0x556f56.isPlaylistLoading()) {
                return false;
              }
              if (_0x48b5cf) {
                return false;
              }
              _0x48b5cf = true;
              if (_0x71f813 == 'h') {
                var _0x360a9a = _0x499db5.width();
                var _0x5b42b6 = _0x2dc795.width();
                var _0x3992b9 = "translateX";
              } else {
                var _0x360a9a = _0x499db5.height();
                var _0x5b42b6 = _0x2dc795.height();
                var _0x3992b9 = "translateY";
              }
              if (_0x5b42b6 < _0x360a9a) {
                return;
              }
              _0x2f09fb.show();
              _0x5abaed.show();
              var _0x515a3b;
              if (!_0x29027a) {
                _0x515a3b = _0x2dc795[0x0].style.transform.replace(/[^\d.]/g, '');
                _0x515a3b = parseInt(_0x515a3b) || 0x0;
              } else {
                _0x515a3b = _0x29027a;
              }
              if (_0x515a3b % _0x4ce18f != 0x0) {
                var _0x317bde = -(_0x515a3b % _0x4ce18f);
                while (_0x317bde <= _0x360a9a - _0x4ce18f * 0x2) {
                  _0x317bde += _0x4ce18f;
                }
                _0x515a3b += _0x317bde;
              } else {
                var _0x3ef627 = Math.floor(_0x360a9a / _0x4ce18f);
                _0x515a3b = _0x515a3b + _0x4ce18f * _0x3ef627;
              }
              if (_0x515a3b >= 0x0) {
                _0x515a3b = 0x0;
                _0x2f09fb.hide();
              }
              _0x29027a = _0x515a3b;
              _0x2dc795.one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
                _0x48b5cf = false;
              }).css({
                '-webkit-transform': '' + _0x3992b9 + '(' + _0x515a3b + "px)",
                '-ms-transform': '' + _0x3992b9 + '(' + _0x515a3b + "px)",
                'transform': '' + _0x3992b9 + '(' + _0x515a3b + 'px)'
              });
            });
            _0x5abaed.on("click", function () {
              if (!_0x556f56.getSetupDone() || _0x556f56.isPlaylistLoading()) {
                return false;
              }
              if (_0x48b5cf) {
                return false;
              }
              _0x48b5cf = true;
              if (_0x71f813 == 'h') {
                var _0x11d22d = _0x499db5.width();
                var _0xab44e3 = _0x2dc795.width();
                var _0xb23d9d = "translateX";
              } else {
                var _0x11d22d = _0x499db5.height();
                var _0xab44e3 = _0x2dc795.height();
                var _0xb23d9d = "translateY";
              }
              if (_0xab44e3 < _0x11d22d) {
                return;
              }
              _0x2f09fb.show();
              _0x5abaed.show();
              var _0x501c85;
              if (!_0x29027a) {
                _0x501c85 = _0x2dc795[0x0].style.transform.replace(/[^\d.]/g, '');
                _0x501c85 = parseInt(_0x501c85) || 0x0;
              } else {
                _0x501c85 = _0x29027a;
              }
              if (_0x501c85 % _0x4ce18f != 0x0) {
                var _0x44fade = _0x501c85 % _0x4ce18f + _0x4ce18f;
                while (_0x44fade <= _0x11d22d - _0x4ce18f) {
                  _0x44fade += _0x4ce18f;
                }
                _0x501c85 -= _0x44fade;
              } else {
                var _0x51f44d = Math.floor(_0x11d22d / _0x4ce18f);
                _0x501c85 = _0x501c85 - _0x4ce18f * _0x51f44d;
              }
              if (_0x501c85 <= _0x11d22d - _0xab44e3) {
                _0x501c85 = _0x11d22d - _0xab44e3;
                _0x5abaed.hide();
                _0x556f56.totalScrollAction();
              }
              _0x29027a = _0x501c85;
              _0x2dc795.one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
                _0x48b5cf = false;
              }).css({
                '-webkit-transform': '' + _0xb23d9d + '(' + _0x501c85 + 'px)',
                '-ms-transform': '' + _0xb23d9d + '(' + _0x501c85 + "px)",
                'transform': '' + _0xb23d9d + '(' + _0x501c85 + "px)"
              });
            });
            if (_0x59345e) {
              _0x394841();
            }
          } else {
            if (_0x312cc7 == 'hover') {
              if (!_0x1e599a) {
                _0x499db5.on("mousemove", function (_0x416dfe) {
                  if (!_0x556f56.getSetupDone() || _0x556f56.isPlaylistLoading()) {
                    return false;
                  }
                  if (!_0x42e76d) {
                    return false;
                  }
                  var _0x5bd243;
                  var _0x47c05a;
                  if (_0x71f813 == 'h') {
                    var _0x1e1542 = _0x2698b5.width();
                    var _0x27f88f = _0x2dc795.width();
                    if (_0x27f88f < _0x1e1542) {
                      return;
                    }
                    _0x47c05a = parseInt(_0x499db5.css("left"), 0xa) + _0x2698b5.offset().left;
                    _0x5bd243 = (_0x1e1542 - _0x27f88f) / _0x1e1542 * (_0x416dfe.pageX - _0x47c05a);
                    _0x2dc795.css("left", _0x5bd243 + 'px');
                  } else {
                    var _0x37d786 = _0x2698b5.height();
                    var _0x27f88f = _0x2dc795.height();
                    if (_0x27f88f < _0x37d786) {
                      return;
                    }
                    _0x47c05a = parseInt(_0x499db5.css("top"), 0xa) + _0x2698b5.offset().top;
                    _0x5bd243 = (_0x37d786 - _0x27f88f) / _0x37d786 * (_0x416dfe.pageY - _0x47c05a);
                    _0x2dc795.css("top", _0x5bd243 + 'px');
                  }
                  return false;
                });
              }
              if (_0x59345e) {
                _0x394841();
              }
            }
          }
        }
      };
      this.updatePosition = function () {
        if (_0x5f4b2d.playlistScrollType == "mcustomscrollbar") {
          _0x499db5.mCustomScrollbar("scrollTo", 0x0);
        } else if (_0x5f4b2d.playlistScrollType == 'perfect-scrollbar') {
          _0x499db5[0x0].scrollTop = 0x0;
        }
      };
      function _0x394841() {
        var _0x4be324;
        var _0xc18760;
        var _0xc196b8;
        var _0xa48f28;
        var _0x51b469;
        var _0x24caf4 = false;
        _0x2dc795.off("touchstart.ap touchmove.ap touchend.ap click.ap-touchclick").on("touchstart.ap", function (_0x312f3d) {
          if (!_0x556f56.getSetupDone() || _0x556f56.isPlaylistLoading()) {
            return false;
          }
          var _0x160ac2 = _0x312f3d.originalEvent.touches[0x0];
          _0x4be324 = _0x2dc795.position().left;
          _0xc18760 = _0x2dc795.position().top;
          _0xc196b8 = _0x160ac2.pageX;
          _0xa48f28 = _0x160ac2.pageY;
          _0x51b469 = false;
          _0x24caf4 = true;
        }).on("touchmove.ap", function (_0x1e5984) {
          if (!_0x24caf4) {
            return;
          }
          var _0xd5fd41 = _0x1e5984.originalEvent.touches[0x0];
          _0x2f09fb.show();
          _0x5abaed.show();
          if (_0x71f813 == 'h') {
            var _0x290a12 = _0x4be324 - _0xc196b8 + _0xd5fd41.pageX;
            var _0x55f438 = _0x2698b5.width();
            var _0x3e8a6e = _0x2dc795.width();
            if (_0x3e8a6e < _0x55f438) {
              return;
            }
            if (_0x290a12 > 0x0) {
              _0x290a12 = 0x0;
              _0x2f09fb.hide();
            } else {
              if (_0x290a12 <= _0x55f438 - _0x3e8a6e) {
                _0x290a12 = _0x55f438 - _0x3e8a6e;
                _0x5abaed.hide();
                if (loadMoreOnTotalScroll) {
                  if (nextPageToken && loadMoreType) {
                    if (!playlistTransitionOn) {
                      _0x10974b.loadMore();
                    }
                  }
                } else if (addMoreOnTotalScroll) {
                  if (!loadMoreProcess) {
                    addMore();
                  }
                }
              }
            }
            _0x2dc795.css("left", _0x290a12 + 'px');
          } else {
            var _0x290a12 = _0xc18760 - _0xa48f28 + _0xd5fd41.pageY;
            var _0x2315be = _0x2698b5.height();
            var _0x3e8a6e = _0x2dc795.height();
            if (_0x3e8a6e < _0x2315be) {
              return;
            }
            if (_0x290a12 > 0x0) {
              _0x290a12 = 0x0;
              _0x2f09fb.hide();
            } else if (_0x290a12 <= _0x2315be - _0x3e8a6e) {
              _0x290a12 = _0x2315be - _0x3e8a6e;
              _0x5abaed.hide();
              _0x556f56.totalScrollAction();
            }
            _0x2dc795.css('top', _0x290a12 + 'px');
          }
          _0x51b469 = _0x51b469 || Math.abs(_0xc196b8 - _0xd5fd41.pageX) > 0x5 || Math.abs(_0xa48f28 - _0xd5fd41.pageY) > 0x5;
          return false;
        }).on("touchend.ap", function (_0x40c608) {
          _0x24caf4 = false;
        }).on("click.ap-touchclick", function (_0x18fb6e) {
          if (_0x51b469) {
            _0x51b469 = false;
            return false;
          }
        });
      }
      this.scrollTo = function (_0x5b6b91) {
        if (_0x312cc7 == "scroll") {
          if (_0x5f4b2d.playlistScrollType == "mcustomscrollbar") {
            if (typeof mCustomScrollbar !== "undefined") {
              setTimeout(function () {
                if (_0x71f813 == 'h') {
                  _0x499db5.mCustomScrollbar("scrollTo", parseInt(_0x5b6b91.position().left), {
                    'scrollInertia': 0x1f4
                  });
                } else {
                  _0x499db5.mCustomScrollbar("scrollTo", parseInt(_0x5b6b91.position().top), {
                    'scrollInertia': 0x1f4
                  });
                }
              }, 0x1f4);
            } else {
              var _0x39f53d = setInterval(function () {
                if (typeof mCustomScrollbar !== "undefined") {
                  clearInterval(_0x39f53d);
                  if (_0x71f813 == 'h') {
                    _0x499db5.mCustomScrollbar("scrollTo", parseInt(_0x5b6b91.position().left), {
                      'scrollInertia': 0x1f4
                    });
                  } else {
                    _0x499db5.mCustomScrollbar("scrollTo", parseInt(_0x5b6b91.position().top), {
                      'scrollInertia': 0x1f4
                    });
                  }
                }
              }, 0x1f4);
            }
          } else if (_0x5f4b2d.playlistScrollType == "perfect-scrollbar") {
            setTimeout(function () {
              if (_0x71f813 == 'h') {
                _0x499db5.stop().animate({
                  'scrollTop': _0x5b6b91[0x0].offsetLeft + 'px'
                }, {
                  'duration': 0x1f4
                });
              } else {
                _0x499db5.stop().animate({
                  'scrollTop': _0x5b6b91[0x0].offsetTop + 'px'
                }, {
                  'duration': 0x1f4
                });
              }
            }, 0x3e8);
          }
        } else {
          if (_0x312cc7 == "buttons") {
            if (_0x71f813 == 'h') {
              var _0x10f172 = _0x2698b5.width();
              var _0x552a0f = _0x2dc795.width();
              var _0x294fb9 = "translateX";
            } else {
              var _0x10f172 = _0x2698b5.height();
              var _0x552a0f = _0x2dc795.height();
              var _0x294fb9 = "translateY";
            }
            if (_0x552a0f < _0x10f172) {
              return;
            }
            _0x2f09fb.show();
            _0x5abaed.show();
            var _0x1f2872 = _0x2dc795.find(".mvp-playlist-item").index(_0x5b6b91);
            var _0x586d6c = -_0x1f2872 * _0x4ce18f;
            if (_0x586d6c >= 0x0) {
              _0x586d6c = 0x0;
              _0x2f09fb.hide();
            } else if (_0x586d6c <= _0x10f172 - _0x552a0f) {
              _0x586d6c = _0x10f172 - _0x552a0f;
              _0x5abaed.hide();
            }
            _0x29027a = _0x586d6c;
            _0x2dc795.one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function () {
              _0x48b5cf = false;
            }).css({
              '-webkit-transform': '' + _0x294fb9 + '(' + _0x586d6c + "px)",
              '-ms-transform': '' + _0x294fb9 + '(' + _0x586d6c + "px)",
              'transform': '' + _0x294fb9 + '(' + _0x586d6c + 'px)'
            });
          }
        }
      };
      this.showButtons = function (_0x3b7ed6) {
        if (_0x3b7ed6 == "forward") {
          _0x5abaed.show();
        }
      };
      this.resize = function (_0x9b2fe3) {
        if (_0x312cc7 == "buttons") {
          if (_0x71f813 == 'h') {
            var _0x5aac9a = _0x499db5.width();
            var _0x21706a = _0x2dc795.width();
            var _0x537598 = "translateX";
          } else {
            var _0x5aac9a = _0x499db5.height();
            var _0x21706a = _0x2dc795.height();
            var _0x537598 = "translateY";
          }
          console.log(_0x5aac9a, _0x21706a);
          if (_0x21706a < _0x5aac9a) {
            _0x42e76d = false;
            _0x2f09fb.hide();
            _0x5abaed.hide();
          } else {
            _0x42e76d = true;
            if (_0x9b2fe3) {
              var _0xee3399 = _0x2dc795.find(".mvp-playlist-item").index(_0x9b2fe3);
              var _0x5f56f7 = -_0xee3399 * _0x4ce18f;
            } else {
              var _0x5f56f7 = 0x0;
            }
            if (!_0x29027a) {
              _0x5f56f7 = _0x2dc795[0x0].style.transform.replace(/[^\d.]/g, '');
              _0x5f56f7 = parseInt(_0x5f56f7);
            } else {
              _0x5f56f7 = _0x29027a;
            }
            if (_0x5f56f7 > 0x0) {
              _0x5f56f7 = 0x0;
              _0x5abaed.show();
            } else {
              if (_0x5f56f7 < _0x5aac9a - _0x21706a) {
                _0x5f56f7 = _0x5aac9a - _0x21706a;
                _0x2f09fb.show();
              } else if (isNaN(_0x5f56f7) && !_0x556f56.getMediaType()) {
                _0x5abaed.show();
              }
            }
            _0x29027a = _0x5f56f7;
            setTimeout(function () {
              _0x2dc795.css({
                '-webkit-transform': '' + _0x537598 + '(' + _0x5f56f7 + 'px)',
                '-ms-transform': '' + _0x537598 + '(' + _0x5f56f7 + "px)",
                'transform': '' + _0x537598 + '(' + _0x5f56f7 + "px)"
              });
            }, 0x15e);
          }
        } else {
          if (_0x312cc7 == "hover") {
            if (_0x71f813 == 'h') {
              var _0x43d357 = _0x499db5.width();
              var _0x21706a = _0x2dc795.width();
              if (_0x21706a < _0x43d357) {
                _0x42e76d = false;
              } else {
                _0x42e76d = true;
                var _0x5f56f7 = parseInt(_0x2dc795.css("left"), 0xa);
                if (_0x5f56f7 > 0x0) {
                  _0x5f56f7 = 0x0;
                } else if (_0x5f56f7 < _0x43d357 - _0x21706a) {
                  _0x5f56f7 = _0x43d357 - _0x21706a;
                }
                _0x2dc795.css("left", _0x5f56f7 + 'px');
              }
            } else {
              var _0x1b0c41 = _0x499db5.height();
              var _0x21706a = _0x2dc795.height();
              if (_0x21706a < _0x1b0c41) {
                _0x42e76d = false;
              } else {
                _0x42e76d = true;
                var _0x5f56f7 = parseInt(_0x2dc795.css("top"), 0xa);
                if (_0x5f56f7 > 0x0) {
                  _0x5f56f7 = 0x0;
                } else if (_0x5f56f7 < _0x1b0c41 - _0x21706a) {
                  _0x5f56f7 = _0x1b0c41 - _0x21706a;
                }
                _0x2dc795.css("top", _0x5f56f7 + 'px');
              }
            }
          }
        }
      };
      this.setScrollActive = function () {
        _0x48b5cf = false;
      };
      this.updateScrollPosition = function () {
        if (_0x5f4b2d.playlistScrollType == "perfect-scrollbar") {
          if (_0x1fa2de) {
            _0x1fa2de.update();
          }
        }
      };
      this.destroy = function () {
        if (_0x312cc7 == 'scroll') {
          if (_0x5f4b2d.playlistScrollType == "mcustomscrollbar") {
            if (typeof mCustomScrollbar !== "undefined") {
              _0x499db5.mCustomScrollbar("destroy");
            }
          } else if (_0x5f4b2d.playlistScrollType == "perfect-scrollbar") {
            if (_0x1fa2de) {
              _0x1fa2de.destroy();
              _0x1fa2de = null;
            }
          }
        } else {
          if (_0x312cc7 == "buttons") {
            _0x499db5.off("wheel");
            _0x2f09fb.off("click");
            _0x5abaed.off("click");
            if (_0x71f813 == 'h') {
              var _0x379c6a = "translateX";
            } else {
              var _0x379c6a = "translateY";
            }
            _0x29027a = 0x0;
            _0x2dc795.css({
              '-webkit-transform': '' + _0x379c6a + '(' + 0x0 + "px)",
              '-ms-transform': '' + _0x379c6a + '(' + 0x0 + "px)",
              'transform': '' + _0x379c6a + '(' + 0x0 + "px)"
            });
          } else if (_0x312cc7 == "hover") {
            _0x499db5.off("mousemove");
          }
        }
        if (_0x59345e) {
          _0x2dc795.off("touchstart.ap touchmove.ap touchend.ap click.ap-touchclick");
        }
        if (_0x71f813 == 'h') {
          _0x2dc795.css("left", 0x0);
        } else {
          _0x2dc795.css('top', 0x0);
        }
      };
      _0x10974b.checkPlaylistNavigation();
    };
    _0x2fde50.MVPPlaylistNavigation = _0x395e0b;
  })(window, jQuery);