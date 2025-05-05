(function (_0x52b2c5, _0x6956d0) {
    'use strict';
  
    var _0xd33776 = function (_0x2d6772) {
      var _0x10927b = this;
      var _0x2ec6dc = _0x2d6772.sourcePath;
      var _0x323b4c;
      var _0x84c8ba = 0x64;
      var _0x5b0189;
      var _0xfec9fb = [];
      var _0x1c09db = [];
      var _0x5f2afd;
      var _0x4121a8 = _0x2d6772.vai;
      var _0x544714 = [];
      this.resumeLoad = function (_0x2a7061) {
        _0x1c09db = [];
        if (_0x2a7061) {
          _0x5720e2(_0x2a7061);
        } else {
          _0x6956d0(_0x10927b).trigger('MVPVimeoLoader.END_LOAD', {
            'data': _0x1c09db,
            'nextPageToken': _0x2a7061
          });
        }
      };
      this.setDataFromCache = function (_0x2e4ed8) {
        _0x1c09db = [];
        _0xfec9fb = _0x2e4ed8;
        _0x84c8ba = 0x64;
        _0x323b4c = _0xfec9fb.limit || 0x3e8;
        if (_0x323b4c < _0x84c8ba) {
          _0x84c8ba = _0x323b4c;
        }
      };
      this.setData = function (_0x344575) {
        if (_0x52b2c5.location.protocol == 'file:') {
          console.log("Using Vimeo locally is not possible! This requires server connection!");
          return;
        }
        _0x1c09db = [];
        _0xfec9fb = _0x344575;
        _0x84c8ba = 0x64;
        _0x323b4c = _0xfec9fb.limit || 0x3e8;
        if (_0x323b4c < _0x84c8ba) {
          _0x84c8ba = _0x323b4c;
        }
        _0x5f2afd = 0x0;
        _0x5b0189 = null;
        _0x544714 = [];
        if (_0x344575.excludeId) {
          _0x544714 = _0x344575.excludeId.split(',').map(function (_0x384bb4) {
            return _0x384bb4.trim();
          });
        }
        if (_0xfec9fb.type == 'vimeo_single' && _0xfec9fb.path.indexOf('/') > -0x1) {
          _0xfec9fb.path = _0xfec9fb.path.replace('/', ':');
        }
        if (_0xfec9fb.type == "vimeo_single_list") {
          var _0x4967f7 = _0xfec9fb.path.split(',').map(function (_0x151a7e) {
            return _0x151a7e.trim();
          });
          var _0x348d19 = '';
          var _0xc525d0;
          var _0x31406f = _0x4967f7.length;
          for (_0xc525d0 = 0x0; _0xc525d0 < _0x31406f; _0xc525d0++) {
            _0x348d19 += "/videos/" + _0x4967f7[_0xc525d0];
            if (_0xc525d0 != _0x31406f - 0x1) {
              _0x348d19 += ',';
            }
          }
          _0xfec9fb.path = _0x348d19;
        }
        var _0x57d0c9 = _0x2ec6dc + "includes/vimeo/vimeo_data.php";
        var _0x344575 = {
          'type': _0xfec9fb.type,
          'path': _0xfec9fb.path,
          'user_id': _0xfec9fb.user_id,
          'sort': _0xfec9fb.sort,
          'sortDirection': _0xfec9fb.sortDirection,
          'page': 0x1,
          'perPage': _0x323b4c < _0x84c8ba ? _0x323b4c : _0x84c8ba,
          'vai': _0x4121a8,
          'vpwd': _0xfec9fb.vpwd
        };
        _0x6956d0.ajax({
          'type': "GET",
          'url': _0x57d0c9,
          'data': _0x344575,
          'dataType': 'json'
        }).done(function (_0x23ab5a) {
          if (!_0x23ab5a.body) {
            console.log("Vimeo response null!");
            return false;
          }
          _0x2fa7c7(_0x23ab5a);
        }).fail(function (_0x867cf4, _0x2f798b, _0xea1c66) {
          console.log(_0x867cf4, _0x2f798b, _0xea1c66);
        });
      };
      function _0x5720e2(_0x124261) {
        var _0x412316 = _0x2ec6dc + "includes/vimeo/vimeo_data.php";
        var _0x30ea60 = {
          'type': "next_page",
          'path': _0x124261,
          'vai': _0x4121a8
        };
        _0x6956d0.ajax({
          'type': "GET",
          'url': _0x412316,
          'data': _0x30ea60,
          'dataType': "json"
        }).done(function (_0x13524f) {
          _0x2fa7c7(_0x13524f);
        }).fail(function (_0x56d615, _0x4db457, _0x3519ec) {
          console.log(_0x56d615, _0x4db457, _0x3519ec);
        });
      }
      function _0x2fa7c7(_0x314d65) {
        if (_0x314d65.body.paging && _0x314d65.body.paging.next) {
          _0x5b0189 = _0x314d65.body.paging.next;
        } else {
          _0x5b0189 = null;
        }
        var _0x1184f2;
        var _0x552cc4;
        var _0x40c0c0;
        if (_0x314d65.body.data) {
          _0x1184f2 = _0x314d65.body.data.length;
        } else {
          _0x1184f2 = 0x1;
        }
        for (_0x552cc4 = 0x0; _0x552cc4 < _0x1184f2; _0x552cc4++) {
          if (_0x1c09db.length == _0x323b4c) {
            break;
          }
          if (_0x314d65.body.uri) {
            _0x40c0c0 = _0x314d65.body;
          } else {
            _0x40c0c0 = _0x314d65.body.data[_0x552cc4];
          }
          var _0x22ef81 = _0x7332de(_0x40c0c0);
          if (_0x22ef81) {
            _0x1c09db.push(_0x22ef81);
          } else {
            _0x323b4c--;
          }
        }
        if (_0x1c09db.length < _0x323b4c) {
          if (_0x5b0189) {
            if (_0x1c09db.length + _0x84c8ba > _0x323b4c) {
              _0x84c8ba = _0x323b4c - _0x1c09db.length;
              var _0x472d8c = _0x5b0189.split('per_page=')[0x1].split('&')[0x0];
              _0x5b0189 = _0x5b0189.replace('per_page=' + _0x472d8c, "per_page=" + _0x84c8ba);
            }
            _0x5720e2(_0x5b0189);
          } else {
            _0x6956d0(_0x10927b).trigger("MVPVimeoLoader.END_LOAD", {
              'data': _0x1c09db,
              'nextPageToken': _0x5b0189
            });
          }
        } else {
          _0x6956d0(_0x10927b).trigger('MVPVimeoLoader.END_LOAD', {
            'data': _0x1c09db,
            'nextPageToken': _0x5b0189
          });
        }
      }
      function _0x7332de(_0x4cd6e7) {
        if (_0x4cd6e7.privacy && _0x4cd6e7.privacy.embed !== "public") {}
        var _0x269195 = _0x6956d0.extend(true, {}, _0xfec9fb);
        if (_0x269195.deeplink && _0x269195.origtype != "vimeo_single") {
          _0x269195.deeplink = _0x269195.deeplink + (_0x5f2afd + 0x1).toString();
          _0x5f2afd++;
        }
        _0x269195.type = "vimeo";
        _0x269195.path = _0x4cd6e7.uri.substr(_0x4cd6e7.uri.lastIndexOf('/') + 0x1);
        if (_0x544714.length) {
          if (_0x544714.indexOf(_0x269195.path) != -0x1) {
            return false;
          }
        }
        if (_0x4cd6e7.uri.indexOf(':') > -0x1) {
          _0x4cd6e7.uri = _0x4cd6e7.uri.substr(0x0, _0x4cd6e7.uri.lastIndexOf(':'));
        }
        if (_0x4cd6e7.duration) {
          _0x269195.duration = _0x4cd6e7.duration;
        }
        if (!_0x269195.title && _0x4cd6e7.name) {
          _0x269195.title = _0x4cd6e7.name;
        }
        if (!_0x269195.description && _0x4cd6e7.description) {
          _0x269195.description = _0x4cd6e7.description;
        }
        if (!_0x269195.thumb && _0x4cd6e7.pictures) {
          _0x269195.pictures = _0x4cd6e7.pictures;
        }
        if (!_0x269195.url) {
          _0x269195.url = 'https://vimeo.com/' + _0x269195.path;
        }
        if (_0x4cd6e7.release_time) {
          _0x269195.release_time = _0x4cd6e7.release_time;
        }
        if (_0x4cd6e7.download) {
          if (_0x4cd6e7.download.link) {
            _0x269195.download = _0x4cd6e7.download.link;
          } else {
            if (_0x4cd6e7.download[0x0]) {
              _0x269195.download = _0x4cd6e7.download[0x0].link;
            }
          }
        }
        if (_0x4cd6e7.user && _0x4cd6e7.user.account) {
          _0x269195.userAccount = _0x4cd6e7.user.account;
        }
        return _0x269195;
      }
      this.getNextPageToken = function () {
        return _0x5b0189;
      };
    };
    _0x52b2c5.MVPVimeoLoader = _0xd33776;
  })(window, jQuery);