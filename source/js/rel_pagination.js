(function (_0x159fd4, _0x37a46b) {
    'use strict';
  
    var _0x1e8fa7 = function (_0x4a7ac7) {
      var _0x2a21ce = _0x4a7ac7.parent;
      var _0x3a52a9 = MVPUtils.isMobile();
      var _0x58277c;
      var _0x4acf1d;
      var _0x37e511;
      var _0x3c2480;
      var _0x288346;
      var _0x7c6d92 = 0x0;
      var _0x48c590;
      var _0x1f4f2b;
      var _0x5554d0;
      var _0x12f003;
      var _0x575b38;
      var _0xa0ced9;
      var _0xce2d03 = true;
      var _0x292186;
      var _0x16e79a = [];
      var _0x5c89b5;
      var _0x424a84;
      var _0x2af6c4;
      var _0x419444 = [];
      var _0x1ab3d1 = [{
        'width': 0x0,
        'column': 0x1,
        'row': 0x1,
        'gutter': 0x0
      }, {
        'width': 0x1c2,
        'column': 0x2,
        'row': 0x2,
        'gutter': 0xa
      }, {
        'width': 0x30c,
        'column': 0x2,
        'row': 0x2,
        'gutter': 0x14
      }, {
        'width': 0x44c,
        'column': 0x3,
        'row': 0x2,
        'gutter': 0x14
      }];
      var _0x3a695f = _0x4a7ac7.wrapper;
      var _0x30423a = _0x3a695f.find(".mvp-rel-playlist-holder");
      var _0x20ab1d = _0x3a695f.find('.mvp-rel-playlist-inner');
      var _0x328f7a = _0x3a695f.find(".mvp-rel-playlist-content");
      MVPUtils.keysrt(_0x1ab3d1, "width");
      var _0x595b60 = [];
      _0x37a46b(_0x4a7ac7.settings.playlistList).find(".mvp-rel-playlist").each(function () {
        var _0xed8579 = _0x37a46b(this);
        var _0x407d5a = _0xed8579.attr("data-rel-num");
        var _0x4122d8 = _0xed8579.find(".mvp-playlist-item").length;
        var _0x1ea031 = _0xed8579.attr("data-playlist-id");
        var _0x594c57 = [];
        while (_0x594c57.length < _0x407d5a) {
          var _0x29390a = Math.floor(Math.random() * _0x4122d8);
          if (_0x594c57.indexOf(_0x29390a) === -0x1) {
            _0x594c57.push(_0x29390a);
            _0x595b60.push(_0xed8579.find(".mvp-playlist-item").eq(_0x29390a).attr("data-playlist-id", _0x1ea031));
          }
        }
      });
      _0x16e79a = [];
      var _0x5e182d;
      var _0x4aad3f = _0x595b60.length;
      var _0x1894a0;
      var _0x5ca3b8;
      var _0x13f9ef = _0x3a52a9 ? " mvp-rel-box-mobile" : '';
      var _0x4cef89;
      var _0x1011ce;
      var _0x33386d;
      for (_0x5e182d = 0x0; _0x5e182d < _0x4aad3f; _0x5e182d++) {
        _0x5ca3b8 = _0x595b60[_0x5e182d];
        _0x4cef89 = _0x5ca3b8.attr('data-thumb') || _0x5ca3b8.attr('data-poster');
        _0x1011ce = _0x5ca3b8.attr("data-title");
        _0x33386d = _0x5ca3b8.attr('data-duration');
        _0x1894a0 = "<div class=\"mvp-rel-box" + _0x13f9ef + "\" data-id=\"" + _0x5e182d + "\" data-playlist-id=\"" + _0x5ca3b8.attr('data-playlist-id') + "\" data-media-id=\"" + _0x5ca3b8.attr("data-media-id") + "\"";
        if (_0x1011ce) {
          _0x1894a0 += " title=\"" + _0x1011ce + "\"";
        }
        _0x1894a0 += "><div class=\"mvp-rel-thumb\"><img class=\"mvp-rel-thumbimg\" src=\"" + _0x4cef89 + "\" alt=\"image\" />" + "</div>";
        if (_0x1011ce) {
          _0x1894a0 += "<div class=\"mvp-rel-title\">" + _0x1011ce + "</div>";
        }
        if (_0x33386d) {
          _0x1894a0 += "<div class=\"mvp-rel-duration\">" + MVPUtils.formatTime(_0x33386d) + "</div>";
        }
        _0x1894a0 += "</div>";
        _0x16e79a.push(_0x37a46b(_0x1894a0));
      }
      _0x5c89b5 = _0x16e79a.length;
      var _0x221a5c = _0x3a695f.find(".mvp-rel-prev").on("click", function () {
        if (_0xce2d03) {
          return false;
        }
        _0xce2d03 = true;
        _0x7c6d92--;
        _0x48c590 = -(_0x7c6d92 * _0x288346);
        _0x4edf95();
      });
      var _0x5749a4 = _0x3a695f.find(".mvp-rel-next").on("click", function () {
        if (_0xce2d03) {
          return false;
        }
        _0xce2d03 = true;
        _0x7c6d92++;
        _0x48c590 = -(_0x7c6d92 * _0x288346);
        _0x4edf95();
      });
      _0x3a695f.find(".mvp-rel-close").on("click", function () {
        if (_0xce2d03) {
          return false;
        }
        _0xce2d03 = true;
        _0x2a21ce.toggleRel();
      });
      this.build = function () {
        if (_0x2af6c4) {
          _0x34d075(true);
        }
        MVPUtils.shuffleArray(_0x16e79a);
        _0x31f936();
        _0x1f4f2b = _0x12f003;
        _0x5554d0 = _0x575b38;
        _0x51c026(true);
        _0x419444 = [];
        if (!_0x2af6c4) {
          _0x2af6c4 = true;
          var _0x3372d4;
          _0x328f7a.find(".mvp-rel-box").each(function () {
            _0x3372d4 = _0x37a46b(this).on('click', function () {
              var _0x109e4b = _0x37a46b(this).attr("data-playlist-id");
              var _0x4d39f0 = _0x37a46b(this).attr('data-media-id');
              var _0x5dac87 = _0x2a21ce.loadPlaylist(".mvp-playlist-" + _0x109e4b, _0x4d39f0);
              if (!_0x5dac87) {
                _0x2a21ce.loadMedia('id', _0x4d39f0);
              }
            });
            _0x419444.push(_0x3372d4.find(".mvp-rel-thumbimg"));
          });
          var _0x3110a8 = 0x0;
          var _0x4bd42a = _0x419444.length;
          var _0x3ac48c;
          for (_0x3ac48c = 0x0; _0x3ac48c < _0x4bd42a; _0x3ac48c++) {
            setTimeout(function () {
              clearTimeout(this);
              _0x419444[_0x3110a8].addClass('mvp-visible');
              _0x3110a8++;
            }, 0x32 + _0x3ac48c * 0x32);
          }
        } else {
          _0x328f7a.find(".mvp-rel-box").each(function () {
            _0x419444.push(_0x37a46b(this).find('.mvp-rel-thumbimg'));
          });
          var _0x3110a8 = 0x0;
          var _0x4bd42a = _0x419444.length;
          var _0x3ac48c;
          for (_0x3ac48c = 0x0; _0x3ac48c < _0x4bd42a; _0x3ac48c++) {
            setTimeout(function () {
              clearTimeout(this);
              _0x419444[_0x3110a8].addClass("mvp-visible");
              _0x3110a8++;
            }, 0x32 + _0x3ac48c * 0x32);
          }
        }
      };
      function _0x31f936() {
        var _0x5f24be = _0x3a695f.width();
        var _0x2ff0fe = _0x3a695f.height();
        var _0x583f4a;
        var _0x13b519 = _0x1ab3d1.length;
        var _0x4aab3b;
        var _0x48f319;
        for (_0x583f4a = 0x0; _0x583f4a < _0x13b519; _0x583f4a++) {
          _0x4aab3b = _0x1ab3d1[_0x583f4a];
          if (_0x5f24be > _0x4aab3b.width) {
            _0x12f003 = _0x4aab3b.column;
            _0xa0ced9 = _0x4aab3b.gutter;
            _0x48f319 = _0x4aab3b;
          }
        }
        var _0x211f16 = _0x5f24be / _0x12f003;
        var _0x16ca4f = _0x211f16 / 1.7777777777777777;
        var _0xe69b68 = Math.round(_0x2ff0fe / _0x16ca4f);
        if (_0xe69b68 > _0x48f319.row) {
          _0xe69b68 = _0x48f319.row;
        }
        _0x575b38 = _0xe69b68;
        if (_0x575b38 < 0x1) {
          _0x575b38 = 0x1;
        }
      }
      function _0x51c026() {
        _0x292186 = _0x12f003 * _0x575b38;
        var _0x5a8275;
        var _0xc0a823;
        var _0x48c799 = 0x0;
        var _0x1ae4be;
        _0x37e511 = Math.ceil(_0x5c89b5 / _0x292186);
        for (_0x5a8275 = 0x0; _0x5a8275 < _0x37e511; _0x5a8275++) {
          var _0x8538d9 = _0x37a46b("<div class=\"mvp-rel-cont\"></div>");
          _0x1ae4be = _0x292186;
          if (_0x48c799 + _0x1ae4be > _0x5c89b5) {
            _0x1ae4be = _0x5c89b5 - _0x48c799;
          }
          _0x48c799 += _0x1ae4be;
          for (_0xc0a823 = 0x0; _0xc0a823 < _0x1ae4be; _0xc0a823++) {
            var _0x508b76 = _0x16e79a.shift();
            if (_0xa0ced9 > 0x0) {
              var _0x5ec1ca = 0x64 / _0x12f003;
              var _0x3643fd = _0xa0ced9 + _0xa0ced9 / _0x12f003;
              _0x508b76.css({
                'marginRight': _0xa0ced9 + 'px',
                'marginBottom': _0xa0ced9 + 'px',
                'width': "calc(" + _0x5ec1ca + "% - " + _0x3643fd + 'px)'
              });
            } else {
              _0x508b76.css({
                'marginRight': _0xa0ced9 + 'px',
                'marginBottom': _0xa0ced9 + 'px',
                'width': 0x64 / _0x12f003 + '%'
              });
            }
            _0x8538d9.append(_0x508b76);
          }
          _0x328f7a.append(_0x8538d9);
        }
        _0x3c2480 = _0x37e511;
        if (_0x5c89b5 % _0x292186 != 0x0) {
          _0x37e511 -= 0x1;
        }
        _0x20ab1d.css({
          'paddingTop': _0xa0ced9 + 'px',
          'paddingLeft': _0xa0ced9 + 'px'
        });
        _0x328f7a.css("display", "block");
        var _0x22af9e = _0x30423a.width();
        var _0x5a8275 = 0x0;
        _0x328f7a.find(".mvp-rel-cont").each(function () {
          _0x5a8275++;
          _0x37a46b(this).width(_0x22af9e);
        });
        _0x328f7a.width(_0x22af9e * _0x5a8275);
        _0x288346 = _0x328f7a.children(".mvp-rel-cont").eq(0x0).width();
        var _0xf39582 = _0x328f7a.children('.mvp-rel-cont').eq(0x0).height();
        _0x20ab1d.css('height', _0xf39582 + _0xa0ced9);
        _0x58277c = true;
        if (_0x424a84) {
          var _0x8538d9 = _0x328f7a.find(".mvp-rel-box[data-id=" + _0x424a84 + ']').parent();
          if (_0x8538d9.find(".mvp-rel-box").length == _0x292186) {
            _0x7c6d92 = _0x8538d9.index();
          } else {
            _0x7c6d92 = _0x8538d9.index() - 0x1;
            if (_0x7c6d92 < 0x0) {
              _0x7c6d92 = 0x0;
            }
          }
          var _0x37c71f = -(_0x7c6d92 * _0x288346);
          _0x328f7a.css({
            'transform': "translateX(" + _0x37c71f + "px)"
          });
          _0x424a84 = null;
        }
        if (_0x7c6d92 == 0x0) {
          _0x221a5c.hide();
        } else {
          _0x221a5c.show();
        }
        if (_0x7c6d92 + 0x1 == _0x3c2480) {
          _0x5749a4.hide();
        } else {
          _0x5749a4.show();
        }
        _0x328f7a.css("opacity", 0x1);
        _0x4acf1d = true;
        _0xce2d03 = false;
      }
      function _0x34d075(_0x45b87d) {
        _0x16e79a = [];
        var _0x12f3e7;
        _0x328f7a.css("display", "none").find('.mvp-rel-box').each(function () {
          _0x12f3e7 = _0x37a46b(this);
          if (_0x45b87d) {
            _0x12f3e7.find(".mvp-rel-thumbimg").removeClass("mvp-visible");
          }
          _0x16e79a.push(_0x12f3e7.detach());
        });
        _0x328f7a.find(".mvp-rel-cont").remove();
        _0x221a5c.hide();
        _0x5749a4.hide();
        if (_0x45b87d) {
          _0x424a84 = null;
          _0x7c6d92 = 0x0;
          _0x328f7a.css({
            'transform': "translateX(0px)"
          });
        }
      }
      this.resizePagination = function () {
        if (!_0x4acf1d) {
          return;
        }
        _0x4acf1d = false;
        _0x31f936();
        if (_0x12f003 != _0x1f4f2b || _0x575b38 != _0x5554d0) {
          _0x1f4f2b = _0x12f003;
          _0x5554d0 = _0x575b38;
          _0x424a84 = _0x328f7a.children(".mvp-rel-cont").eq(_0x7c6d92).find(".mvp-rel-box").eq(0x0).attr('data-id');
          _0x34d075();
          _0x51c026();
          return;
        }
        var _0x5a1e7e = _0x30423a.width();
        var _0x414b8d = 0x0;
        _0x328f7a.find('.mvp-rel-cont').each(function () {
          _0x414b8d++;
          _0x37a46b(this).width(_0x5a1e7e);
        });
        _0x328f7a.width(_0x5a1e7e * _0x414b8d);
        _0x288346 = _0x328f7a.children(".mvp-rel-cont").eq(0x0).width();
        var _0x32a584 = _0x328f7a.children().eq(_0x7c6d92).height();
        _0x20ab1d.css('height', _0x32a584 + _0xa0ced9);
        var _0x2e0a8a = -(_0x7c6d92 * _0x288346);
        _0x328f7a.css({
          'transform': "translateX(" + _0x2e0a8a + "px)"
        });
        _0x4acf1d = true;
      };
      function _0x4edf95() {
        _0x328f7a.one("transitionend", function () {
          _0xce2d03 = false;
        }).css({
          'transform': "translateX(" + _0x48c590 + "px)"
        });
        var _0x2b4fbc = _0x328f7a.children(".mvp-rel-cont").eq(_0x7c6d92).height();
        _0x20ab1d.css("height", _0x2b4fbc + _0xa0ced9);
        if (_0x7c6d92 == 0x0) {
          _0x221a5c.hide();
        } else {
          _0x221a5c.show();
        }
        if (_0x7c6d92 + 0x1 == _0x3c2480) {
          _0x5749a4.hide();
        } else {
          _0x5749a4.show();
        }
      }
      return this;
    };
    _0x159fd4.MVPRelPagination = _0x1e8fa7;
  })(window, jQuery);