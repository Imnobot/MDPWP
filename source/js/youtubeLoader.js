(function (_0x2b0252, _0x444747) {
    'use strict';
  
    var _0xc78ca1 = function (_0x781789) {
      var _0x54aed3 = this;
      var _0x2b41d8;
      var _0x118c3d;
      var _0x492b33 = [];
      var _0x49a72b;
      var _0x392664;
      var _0x2261b2;
      var _0xc1e178 = 0x32;
      var _0x9bf575;
      var _0x49911a;
      var _0x3e9da7;
      var _0x2f09f8;
      var _0x3432c1 = _0x781789.youtubeAppId.split(',').map(function (_0x2a2fff) {
        return _0x2a2fff.trim();
      });
      var _0x1cc98e = 0x0;
      var _0x1151f8 = _0x3432c1[_0x1cc98e];
      var _0x3b1424;
      var _0x399afb;
      var _0x4cd0ab;
      this.resumeLoad = function (_0x453761) {
        _0x492b33 = [];
        if (_0x453761) {
          _0x9bf575 = _0x453761.substr(0x0, _0x453761.lastIndexOf("&pageToken="));
          _0x339d05(_0x453761);
        } else {
          _0x444747(_0x54aed3).trigger("MVPYoutubeLoader.END_LOAD", {
            'data': _0x492b33,
            'nextPageToken': _0x453761
          });
        }
      };
      this.setDataFromCache = function (_0x50e84d) {
        _0x492b33 = [];
        _0x118c3d = _0x50e84d;
        _0x3e9da7 = _0x118c3d.limit || 0x190;
        _0xc1e178 = 0x32;
        if (_0x3e9da7 < _0xc1e178) {
          _0xc1e178 = _0x3e9da7;
        }
        _0x2f09f8 = _0x118c3d.sort || 'relevance';
        _0x2b41d8 = _0x118c3d.type;
      };
      this.setData = function (_0x258952) {
        if (!_0x1151f8) {
          alert("Youtube API key missing! Set Youtube API key in settings.");
          return;
        }
        _0x492b33 = [];
        _0x118c3d = _0x258952;
        _0x2261b2 = 0x0;
        _0x3e9da7 = _0x118c3d.limit || 0x190;
        _0xc1e178 = 0x32;
        if (_0x3e9da7 < _0xc1e178) {
          _0xc1e178 = _0x3e9da7;
        }
        _0x2f09f8 = _0x118c3d.sort || "relevance";
        _0x2b41d8 = _0x118c3d.type;
        _0x49911a = null;
        _0x4cd0ab = [];
        if (_0x258952.excludeId) {
          _0x4cd0ab = _0x258952.excludeId.split(',').map(function (_0x24be12) {
            return _0x24be12.trim();
          });
        }
        var _0x464ed7 = "title,description,";
        if (_0x781789.playlistItemContent.indexOf('date') > -0x1) {
          _0x464ed7 += "publishedAt,";
        }
        if (_0x781789.playlistItemContent.indexOf("thumb") > -0x1) {
          _0x464ed7 += "thumbnails(default(url),standard(url),medium(url),high(url),maxres(url)),";
        }
        if (_0x464ed7.length > 0x0) {
          _0x464ed7 = _0x464ed7.substr(0x0, _0x464ed7.length - 0x1);
          if (_0x2b41d8 == "youtube_single" || _0x2b41d8 == "youtube_single_list") {
            _0x3b1424 = ",liveStreamingDetails,snippet";
            _0x399afb = ",liveStreamingDetails,snippet(" + _0x464ed7 + ')';
          } else {
            _0x3b1424 = ",snippet";
            _0x399afb = ',snippet(' + _0x464ed7 + ')';
          }
        } else {
          _0x3b1424 = '';
          _0x399afb = '';
        }
        if (_0x2b41d8 == "youtube_single" || _0x2b41d8 == "youtube_single_list") {
          if (_0x2b41d8 == "youtube_single_list") {
            _0x118c3d.path = _0x118c3d.path.replace(/\s+/g, '');
          }
          if (_0x781789.playlistItemContent.indexOf("duration") > -0x1) {
            _0x9bf575 = "https://www.googleapis.com/youtube/v3/videos?id=" + _0x118c3d.path + "&key=" + _0x1151f8 + "&part=id" + _0x3b1424 + ",contentDetails&fields=items(id" + _0x399afb + ",contentDetails(duration))";
          } else {
            _0x9bf575 = 'https://www.googleapis.com/youtube/v3/videos?id=' + _0x118c3d.path + '&key=' + _0x1151f8 + '&part=id' + _0x3b1424 + '&fields=items(id' + _0x399afb + ')';
          }
        } else {
          if (_0x2b41d8 == "youtube_playlist") {
            _0x9bf575 = 'https://www.googleapis.com/youtube/v3/playlistItems?playlistId=' + _0x118c3d.path + "&maxResults=" + _0xc1e178 + "&key=" + _0x1151f8 + '&part=contentDetails' + _0x3b1424 + "&fields=items(contentDetails(videoId)" + _0x399afb + "),nextPageToken";
          } else {
            if (_0x2b41d8 == "youtube_channel") {
              _0x9bf575 = "https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=" + _0x118c3d.path + "&fields=items(contentDetails%2FrelatedPlaylists%2Fuploads)&key=" + _0x1151f8;
              _0x3442a5(_0x9bf575);
              return;
            } else {
              console.log("Wrong youtube type!");
              return;
            }
          }
        }
        _0x339d05(_0x9bf575);
      };
      function _0x3442a5(_0x50d381) {
        _0x444747.ajax({
          'url': _0x50d381,
          'dataType': "jsonp"
        }).done(function (_0x591e70) {
          var _0x43ed23 = _0x591e70.items[0x0].contentDetails.relatedPlaylists.uploads;
          _0x9bf575 = "https://www.googleapis.com/youtube/v3/playlistItems?part=contentDetails" + _0x3b1424 + "&playlistId=" + _0x43ed23 + "&fields=items(contentDetails(videoId)" + _0x399afb + '),nextPageToken&maxResults=' + _0xc1e178 + "&key=" + _0x1151f8;
          _0x2b41d8 = "youtube_playlist";
          _0x339d05(_0x9bf575);
        }).fail(function (_0x5d5081, _0x1f0d8b, _0x3a0358) {
          console.log(_0x5d5081, _0x1f0d8b, _0x3a0358);
        });
      }
      function _0x339d05(_0x786c91) {
        _0x444747.ajax({
          'url': _0x786c91,
          'dataType': "jsonp"
        }).done(function (_0x12ac21) {
          if (_0x12ac21.error && _0x12ac21.error.message) {
            console.log(_0x12ac21.error.message);
            if (_0x12ac21.error.message.indexOf("exceeded") > -0x1 && _0x12ac21.error.message.indexOf('quota') > -0x1) {
              if (_0x3432c1.length > 0x1) {
                _0x1cc98e++;
                if (_0x1cc98e < _0x3432c1.length) {
                  _0x1151f8 = _0x3432c1[_0x1cc98e];
                  var _0x1c01d2 = _0x786c91.substr(0x0, _0x786c91.indexOf("&key=") + 0x5);
                  var _0x3c20dc = _0x786c91.substr(_0x786c91.indexOf("&part="));
                  var _0x4e24bc = _0x1c01d2 + _0x1151f8 + _0x3c20dc;
                  _0x9bf575 = _0x4e24bc;
                  _0x339d05(_0x4e24bc);
                  return;
                }
              } else {
                _0x444747(_0x54aed3).trigger('MVPYoutubeLoader.QUOTA_ERROR', {
                  'er': _0x12ac21.error.message
                });
              }
              return;
            }
          }
          var _0x4a8aed;
          var _0x2ce46d = _0x12ac21.items.length;
          var _0x51fc6a;
          _0x49911a = _0x12ac21.nextPageToken;
          if (_0x49911a) {
            _0x49911a = _0x9bf575 + "&pageToken=" + _0x49911a;
          }
          for (_0x4a8aed = 0x0; _0x4a8aed < _0x2ce46d; _0x4a8aed++) {
            if (_0x492b33.length == _0x3e9da7) {
              break;
            }
            _0x51fc6a = _0x12ac21.items[_0x4a8aed];
            if (_0x2b41d8 == "youtube_playlist" || _0x2b41d8 == 'youtube_single' || _0x2b41d8 == 'youtube_single_list' || _0x2b41d8 == 'youtube_channel') {
              if (_0x51fc6a.status) {
                if (_0x51fc6a.status.privacyStatus == 'public') {
                  var _0x4cdd28 = _0x3b0cc6(_0x51fc6a, _0x2b41d8);
                  if (_0x4cdd28) {
                    _0x492b33.push(_0x4cdd28);
                  } else {
                    _0x3e9da7--;
                  }
                }
              } else {
                if (_0x51fc6a.snippet) {
                  if (_0x51fc6a.snippet.title != "Private video") {
                    var _0x4cdd28 = _0x3b0cc6(_0x51fc6a, _0x2b41d8);
                    if (_0x4cdd28) {
                      _0x492b33.push(_0x4cdd28);
                    } else {
                      _0x3e9da7--;
                    }
                  }
                }
              }
            }
          }
          if (_0x2b41d8 == 'youtube_single' || _0x2b41d8 == "youtube_single_list") {
            _0x444747(_0x54aed3).trigger("MVPYoutubeLoader.END_LOAD", {
              'data': _0x492b33,
              'nextPageToken': _0x49911a
            });
          } else {
            if (_0x492b33.length < _0x3e9da7) {
              if (_0x49911a) {
                if (_0x492b33.length + _0xc1e178 > _0x3e9da7) {
                  _0xc1e178 = _0x3e9da7 - _0x492b33.length;
                  var _0xbeae21 = _0x49911a.substr(0x0, _0x9bf575.indexOf("&maxResults=") + 0xc);
                  var _0x1bc5ed = _0x49911a.substr(_0x9bf575.indexOf("&key="));
                  _0x49911a = _0xbeae21 + _0xc1e178.toString() + _0x1bc5ed;
                }
                if (_0x2b41d8 == "youtube_playlist" || _0x2b41d8 == "youtube_channel") {
                  var _0x5db6d2 = _0x49911a;
                }
                _0x339d05(_0x5db6d2);
              } else if (_0x781789.playlistItemContent.indexOf('duration') > -0x1) {
                _0x49a72b = _0x492b33.length;
                _0x392664 = 0x0;
                _0xbf2004();
              } else {
                _0x444747(_0x54aed3).trigger("MVPYoutubeLoader.END_LOAD", {
                  'data': _0x492b33,
                  'nextPageToken': _0x49911a
                });
              }
            } else if (_0x781789.playlistItemContent.indexOf("duration") > -0x1) {
              _0x49a72b = _0x492b33.length;
              _0x392664 = 0x0;
              _0xbf2004();
            } else {
              _0x444747(_0x54aed3).trigger("MVPYoutubeLoader.END_LOAD", {
                'data': _0x492b33,
                'nextPageToken': _0x49911a
              });
            }
          }
        }).fail(function (_0x326c3f, _0x26e0c7, _0x48c974) {
          console.log(_0x326c3f, _0x26e0c7, _0x48c974);
        });
      }
      function _0xbf2004() {
        var _0x5c3abb = '';
        var _0x2eaf27;
        var _0xbd953b = 0x0;
        for (_0x2eaf27 = _0x392664; _0x2eaf27 < _0x49a72b; _0x2eaf27++) {
          _0x5c3abb += _0x492b33[_0x2eaf27].path + ',';
          _0xbd953b++;
          if (_0xbd953b == 0x32) {
            break;
          }
        }
        _0x5c3abb = _0x5c3abb.substr(0x0, _0x5c3abb.length - 0x1);
        var _0x40adb6 = "https://www.googleapis.com/youtube/v3/videos?id=" + _0x5c3abb + "&key=" + _0x1151f8 + '&part=liveStreamingDetails,contentDetails&fields=items(contentDetails(duration))';
        _0x444747.ajax({
          'url': _0x40adb6,
          'dataType': "jsonp"
        }).done(function (_0x4adad2) {
          if (_0x4adad2.items.length != _0xbd953b) {
            console.log("getYtDuration response length mismatch!");
          }
          var _0x4dc4b0 = _0x4adad2.items.length;
          var _0x46e0d9;
          for (_0x2eaf27 = 0x0; _0x2eaf27 < _0x4dc4b0; _0x2eaf27++) {
            _0x46e0d9 = _0x4adad2.items[_0x2eaf27];
            _0x492b33[_0x392664].duration = _0xe6aaff(_0x46e0d9.contentDetails.duration);
            if (_0x46e0d9.liveStreamingDetails) {
              _0x492b33[_0x392664].liveStream = true;
              _0x492b33[_0x392664].liveStreamingDetails = item.liveStreamingDetails;
            }
            _0x392664++;
          }
          if (_0x392664 < _0x49a72b) {
            _0xbf2004();
          } else {
            _0x444747(_0x54aed3).trigger('MVPYoutubeLoader.END_LOAD', {
              'data': _0x492b33,
              'nextPageToken': _0x49911a
            });
          }
        }).fail(function (_0x182987, _0x51eb94, _0x428d4d) {
          console.log(_0x182987, _0x51eb94, _0x428d4d);
        });
      }
      function _0x3b0cc6(_0xcba0da, _0x1fb19e) {
        var _0x559519 = jQuery.extend(true, {}, _0x118c3d);
        _0x559519.type = "youtube";
        delete _0x559519.limit;
        if (_0x1fb19e == 'youtube_single' || _0x1fb19e == "youtube_single_list") {
          _0x559519.path = _0xcba0da.id;
        } else {
          if (_0x1fb19e == "youtube_playlist") {
            _0x559519.path = _0xcba0da.contentDetails.videoId;
          } else if (_0x1fb19e == "youtube_channel") {
            _0x559519.path = _0xcba0da.id.videoId;
          }
        }
        if (_0x4cd0ab.length) {
          if (_0x4cd0ab.indexOf(_0x559519.path) != -0x1) {
            return false;
          }
        }
        if (_0xcba0da.snippet) {
          if (!_0x559519.title && _0xcba0da.snippet.title) {
            _0x559519.title = _0xcba0da.snippet.title;
          }
          if (!_0x559519.description && _0xcba0da.snippet.description) {
            _0x559519.description = _0xcba0da.snippet.description;
          }
          if (_0xcba0da.snippet.publishedAt) {
            _0x559519.date = _0xcba0da.snippet.publishedAt;
          }
          if (!_0x559519.thumb && _0xcba0da.snippet.thumbnails) {
            _0x559519.thumbnails = _0xcba0da.snippet.thumbnails;
          }
        }
        if (_0xcba0da.liveStreamingDetails) {
          _0x559519.liveStream = true;
          _0x559519.liveStreamingDetails = _0xcba0da.liveStreamingDetails;
        }
        if (_0xcba0da.contentDetails) {
          if (_0xcba0da.contentDetails.projection && _0xcba0da.contentDetails.projection == '360') {
            _0x559519.is360 = true;
          }
          if (!_0x559519.duration && _0xcba0da.contentDetails.duration) {
            _0x559519.duration = _0xe6aaff(_0xcba0da.contentDetails.duration);
          }
        }
        return _0x559519;
      }
      function _0xe6aaff(_0x5831de) {
        var _0x4c2557 = _0x5831de.match(/\d+/g);
        if (_0x5831de.indexOf('M') >= 0x0 && _0x5831de.indexOf('H') == -0x1 && _0x5831de.indexOf('S') == -0x1) {
          _0x4c2557 = [0x0, _0x4c2557[0x0], 0x0];
        }
        if (_0x5831de.indexOf('H') >= 0x0 && _0x5831de.indexOf('M') == -0x1) {
          _0x4c2557 = [_0x4c2557[0x0], 0x0, _0x4c2557[0x1]];
        }
        if (_0x5831de.indexOf('H') >= 0x0 && _0x5831de.indexOf('M') == -0x1 && _0x5831de.indexOf('S') == -0x1) {
          _0x4c2557 = [_0x4c2557[0x0], 0x0, 0x0];
        }
        _0x5831de = 0x0;
        if (_0x4c2557.length == 0x3) {
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x0]) * 0xe10;
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x1]) * 0x3c;
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x2]);
        }
        if (_0x4c2557.length == 0x2) {
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x0]) * 0x3c;
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x1]);
        }
        if (_0x4c2557.length == 0x1) {
          _0x5831de = _0x5831de + parseInt(_0x4c2557[0x0]);
        }
        return _0x5831de;
      }
      this.getNextPageToken = function () {
        return _0x49911a;
      };
    };
    _0x2b0252.MVPYoutubeLoader = _0xc78ca1;
  })(window, jQuery);