(function (_0x4f9029) {
    'use strict';
  
    var _0x4bdc93 = function (_0x2e95d8) {
      var _0x1aab77 = this;
      var _0x4fca68;
      var _0x5a1c76 = _0x2e95d8.parent;
      var _0x2610ca = _0x2e95d8.wrapper;
      var _0x53e6fa = _0x2e95d8.btn[0x0];
      var _0x13767a = _0x2e95d8.settings;
      var _0x37cf34 = MVPUtils.isMobile();
      var _0x124524;
      var _0x52ab99;
      var _0x1a01a3;
      var _0x4cc9b3;
      var _0xe06b19;
      var _0x1ed2d9;
      var _0x308cb1;
      var _0x410f56;
      var _0x3436bc;
      var _0x1ba3d9;
      var _0x4832a8;
      var _0x2d4a5e;
      var _0x4f0b47;
      var _0x5b7d5d;
      function _0x435310() {
        var _0xb4be24 = setInterval(function () {
          if (_0x4f9029.chrome && _0x4f9029.chrome.cast && _0x4f9029.chrome.cast.isAvailable) {
            clearInterval(_0xb4be24);
            _0x4fca68 = true;
            var _0x43ebb3 = {
              receiverApplicationId: chrome.cast.media.DEFAULT_MEDIA_RECEIVER_APP_ID,
              "autoJoinPolicy": chrome.cast.AutoJoinPolicy.ORIGIN_SCOPED
            };
            cast.framework.CastContext.getInstance().setOptions(_0x43ebb3);
            _0x52ab99 = document.createElement("google-cast-launcher");
            _0x52ab99.style.display = "block";
            _0x52ab99.style.position = "absolute";
            _0x52ab99.style.opacity = 0x0;
            _0x52ab99.style.top = 0x0;
            _0x52ab99.style.height = "100%";
            var _0x3e31d0 = _0x53e6fa.querySelector(".mvp-cast-off").getAttribute("data-tooltip");
            if (_0x3e31d0.length) {
              _0x52ab99.setAttribute("data-tooltip", _0x3e31d0);
            }
            _0x53e6fa.appendChild(_0x52ab99);
            _0x1aab77.checkCastState();
            _0x16a6a7();
          }
        }, 0x1f4);
        _0x124524 = document.createElement("div");
        _0x124524.className = "mvp-cast-message-wrap";
        _0x124524.innerHTML = "<div class=\"mvp-cast-message\"><svg viewBox=\"0 0 512 512\"><path d=\"M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z\"></path></svg><div class=\"mvp-cast-message-inner\"><div class=\"mvp-cast-message-connect\">" + _0x13767a.castConnectingMsg + "</div><div class=\"mvp-cast-message-state\"></div></div>" + "</div>";
        _0x2610ca[0x0].querySelector(".mvp-player-holder").appendChild(_0x124524);
      }
      ;
      function _0x16a6a7() {
        _0x4832a8 = new cast.framework.RemotePlayer();
        _0x2d4a5e = new cast.framework.RemotePlayerController(_0x4832a8);
        _0x1aab77.setVolume();
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.IS_CONNECTED_CHANGED, function (_0x7b813a) {
          if (_0x4832a8.isConnected) {
            _0x124524.classList.add("mvp-cast-message-wrap-visible");
            _0x53e6fa.querySelector('.mvp-cast-on').style.display = 'block';
            _0x53e6fa.querySelector('.mvp-cast-off').style.display = "none";
            _0x3d00fd();
            _0x1ed2d9 = _0x5a1c76.getMediaPlaying();
            _0x5a1c76.pauseMedia();
            _0x4ff95d();
            _0x4cc9b3 = true;
            _0x5a1c76.setIsCasting(true);
          } else {
            _0x124524.querySelector('.mvp-cast-message-state').innerHTML = '';
            _0x124524.querySelector('.mvp-cast-message-connect').style.display = "block";
            _0x53e6fa.querySelector(".mvp-cast-on").style.display = "none";
            _0x53e6fa.querySelector(".mvp-cast-off").style.display = "block";
            _0x124524.classList.remove("mvp-cast-message-wrap-visible");
            _0x5a1c76.setIsCasting(false);
            _0x32d7b5();
            var _0x3aa340 = _0x5a1c76.getCurrentMediaData();
            if (!_0x37cf34 && _0x1a01a3 == _0x3aa340.mediaPath) {
              _0x1aab77.stop();
              if (_0x1ed2d9) {
                _0x5a1c76.playMedia();
              }
              if (_0x4f0b47) {
                _0x5a1c76.seek(_0x4f0b47);
              }
            } else {
              _0x1aab77.stop();
            }
            _0x410f56 = false;
            _0x4cc9b3 = false;
            _0x5b7d5d = undefined;
          }
        });
      }
      function _0x5bb858() {
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.MEDIA_INFO_CHANGED, function (_0x18f761) {
          var _0x196741 = cast.framework.CastContext.getInstance().getCurrentSession();
          if (!_0x196741) {
            return;
          }
          var _0x304100 = _0x196741.getMediaSession();
          if (!_0x304100) {
            return;
          }
          if (_0x304100.playerState == "PAUSED") {
            _0x2ea230("PAUSED");
          } else if (_0x304100.playerState == 'PLAYING') {
            _0x2ea230("PLAYING");
          }
          _0x1d17f1();
        });
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.IS_PAUSED_CHANGED, function () {
          if (_0x4832a8.isPaused) {
            _0x2ea230("PAUSED");
          } else if (_0x5b7d5d !== "PLAYING") {
            _0x2ea230("PLAYING");
          }
        });
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.CURRENT_TIME_CHANGED, function (_0x35c3ab) {
          if (!_0xe06b19 && !_0x308cb1 && !_0x410f56) {
            if (_0x1aab77.getCurrentTime() >= _0x1aab77.getDuration()) {
              if (_0x13767a.mediaEndAction == "loop") {
                setTimeout(function () {
                  _0x4ff95d(true);
                }, 0x7d0);
              } else {
                _0x1aab77.stop();
                setTimeout(function () {
                  _0x5a1c76.mediaEndHandler();
                }, 0x7d0);
              }
            } else {
              _0x5a1c76.updateMediaTime(_0x1aab77.getCurrentTime(), _0x1aab77.getDuration());
              if (_0x1aab77.getCurrentTime()) {
                _0x4f0b47 = _0x1aab77.getCurrentTime();
              }
              if (_0x1aab77.getDuration() > 0x0) {
                _0x410f56 = false;
              }
            }
          }
        });
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.VOLUME_LEVEL_CHANGED, function () {
          _0x5a1c76.setVolumeExternal(_0x4832a8.volumeLevel);
        });
        _0x2d4a5e.addEventListener(cast.framework.RemotePlayerEventType.IS_MUTED_CHANGED, function () {
          _0x5a1c76.setVolumeExternal(_0x4832a8.volumeLevel);
        });
      }
      function _0x3d00fd() {
        if (_0x52ab99) {
          _0x52ab99.style.width = '0';
        }
      }
      function _0x32d7b5() {
        if (_0x52ab99) {
          _0x52ab99.style.width = "100%";
        }
      }
      _0x1aab77.checkCastState = function () {
        if (!_0x4fca68) {
          return;
        }
        var _0x25034c = _0x5a1c76.isCastSupportedMedia();
        if (_0x25034c) {
          _0x53e6fa.style.display = "block";
          if (_0x4cc9b3) {
            _0x4ff95d();
          }
        } else {
          _0x53e6fa.style.display = "none";
          _0x1aab77.stopCasting();
        }
      };
      _0x1aab77.play = function () {
        if (_0x5b7d5d == "IDLE") {
          _0x4ff95d(true);
        } else if (_0x4832a8.isPaused) {
          _0x2d4a5e.playOrPause();
        }
      };
      _0x1aab77.pause = function () {
        _0x5b7d5d = 'PAUSED';
        if (!_0x4832a8.isPaused) {
          _0x2d4a5e.playOrPause();
        } else {
          _0x5b7d5d = "PLAYING";
        }
      };
      _0x1aab77.togglePlayPause = function () {
        if (!_0x308cb1) {
          if (_0x5b7d5d == "IDLE") {
            _0x4ff95d(true);
          } else {
            _0x2d4a5e.playOrPause();
          }
        }
      };
      _0x1aab77.stop = function () {
        if (!_0x4cc9b3) {
          return;
        }
        clearTimeout(_0x1ba3d9);
        _0x2d4a5e.playOrPause();
        _0x2d4a5e.stop();
        _0x5a1c76.togglePlayBtn(true);
        _0x410f56 = true;
        _0x5b7d5d = 'IDLE';
        _0x1d17f1();
      };
      _0x1aab77.startSeeking = function () {
        _0x308cb1 = true;
      };
      _0x1aab77.stopSeeking = function () {
        clearTimeout(_0x1ba3d9);
        _0x1ba3d9 = setTimeout(function () {
          _0x308cb1 = false;
        }, 0x7d0);
      };
      _0x1aab77.seek = function (_0x15eb86) {
        _0x308cb1 = true;
        clearTimeout(_0x1ba3d9);
        _0x1ba3d9 = setTimeout(function () {
          _0x308cb1 = false;
        }, 0x7d0);
        var _0x310946 = Math.round(_0x15eb86 * _0x1aab77.getDuration());
        _0x4832a8.currentTime = _0x310946;
        _0x2d4a5e.seek();
      };
      _0x1aab77.seekTo = function (_0x1457cb) {
        _0x308cb1 = true;
        clearTimeout(_0x1ba3d9);
        _0x1ba3d9 = setTimeout(function () {
          _0x308cb1 = false;
        }, 0x7d0);
        _0x4832a8.currentTime = _0x1457cb;
        _0x2d4a5e.seek();
      };
      _0x1aab77.getCurrentTime = function () {
        return _0x4832a8.currentTime;
      };
      _0x1aab77.getDuration = function () {
        return _0x4832a8.duration;
      };
      _0x1aab77.setVolume = function (_0x1dfd00) {
        var _0x56b0c5;
        if (typeof _0x1dfd00 !== "undefined") {
          _0x56b0c5 = _0x1dfd00;
        } else {
          _0x56b0c5 = _0x13767a.volume;
        }
        _0x4832a8.volumeLevel = _0x56b0c5;
        _0x2d4a5e.setVolumeLevel();
      };
      function _0x2ea230(_0x82932) {
        if (_0x82932 == 'PAUSED') {
          _0x5a1c76.togglePlayBtn(true);
          _0x5b7d5d = "PAUSED";
        } else if (_0x5b7d5d != "PLAYING") {
          _0x5a1c76.togglePlayBtn(false);
          _0x5b7d5d = 'PLAYING';
        }
        _0x1d17f1();
      }
      _0x1aab77.stopCasting = function () {
        _0x1ed2d9 = !!(_0x5b7d5d == "PLAYING");
        try {
          var _0x35bd34 = cast.framework.CastContext.getInstance().getCurrentSession();
          _0x35bd34.endSession(true);
        } catch (_0x4b1ca5) {}
      };
      _0x1aab77.loadSubtitle = function (_0x405a14) {
        var _0xaa4a99 = cast.framework.CastContext.getInstance().getCurrentSession();
        var _0xca6522 = _0xaa4a99.getMediaSession();
        var _0x27bd70 = new chrome.cast.media.EditTracksInfoRequest([parseInt(_0x405a14)]);
        _0xca6522.editTracksInfo(_0x27bd70, _0x5e3860 => console.log("Subtitles loaded"), _0x1da8b6 => console.log("Chromecast loadSubtitle error", _0x1da8b6));
      };
      function _0x4ff95d(_0x58d98a) {
        var _0x2a4625 = _0x5a1c76.getCurrentMediaData();
        _0x1a01a3 = _0x2a4625.mediaPath;
        var _0x4d4759 = _0x1a01a3;
        if (!MVPUtils.relativePath(_0x4d4759)) {
          _0x4d4759 = MVPUtils.qualifyURL(_0x4d4759);
        }
        var _0x4f3649 = new chrome.cast.media.MediaInfo(_0x4d4759);
        _0x4f3649.metadata = new chrome.cast.media.GenericMediaMetadata();
        var _0x357c7a = "video/mp4";
        if (_0x2a4625.type == "audio") {
          _0x357c7a = "audio/mp3";
        }
        _0x4f3649.contentType = _0x357c7a;
        _0xe06b19 = _0x2a4625.liveStream;
        if (_0x124524.querySelector('.mvp-cast-title') !== null) {
          _0x124524.querySelector('.mvp-cast-title').innerHTML = '';
        }
        if (_0x124524.querySelector('.mvp-cast-subtitle') !== null) {
          _0x124524.querySelector(".mvp-cast-subtitle").innerHTML = '';
        }
        if (_0x2a4625.title) {
          _0x4f3649.metadata.title = _0x2a4625.title;
        }
        if (_0x2a4625.subtitle) {
          _0x4f3649.metadata.subtitle = _0x2a4625.subtitle;
        }
        if (_0x2a4625.poster) {
          var _0x35da8e = _0x2a4625.poster;
          if (!MVPUtils.relativePath(_0x35da8e)) {
            _0x35da8e = MVPUtils.qualifyURL(_0x35da8e);
          }
          _0x4f3649.metadata.images = [{
            'url': _0x35da8e
          }];
        }
        if (_0x2a4625.subtitles) {
          _0x4f3649.textTrackStyle = new chrome.cast.media.TextTrackStyle();
          _0x4f3649.textTrackStyle.backgroundColor = _0x13767a.textTrackStyle.backgroundColor;
          _0x4f3649.textTrackStyle.foregroundColor = _0x13767a.textTrackStyle.foregroundColor;
          _0x4f3649.textTrackStyle.edgeColor = _0x13767a.textTrackStyle.edgeColor;
          _0x4f3649.textTrackStyle.edgeType = _0x13767a.textTrackStyle.edgeType;
          _0x4f3649.textTrackStyle.fontFamily = _0x13767a.textTrackStyle.fontFamily;
          _0x4f3649.textTrackStyle.fontGenericFamily = _0x13767a.textTrackStyle.fontGenericFamily;
          _0x4f3649.textTrackStyle.fontScale = Number(_0x13767a.textTrackStyle.fontScale);
          _0x4f3649.textTrackStyle.fontStyle = _0x13767a.textTrackStyle.fontStyle;
          var _0x28f870 = [];
          var _0xed6be9;
          for (var _0xbfcb19 in _0x2a4625.subtitles) {
            if (_0x2a4625.subtitles[_0xbfcb19].src) {
              var _0x16fe4e = new chrome.cast.media.Track(_0xbfcb19, chrome.cast.media.TrackType.TEXT);
              _0x16fe4e.name = _0x2a4625.subtitles[_0xbfcb19].label;
              _0x16fe4e.subtype = chrome.cast.media.TextTrackType.SUBTITLES;
              _0xed6be9 = _0x2a4625.subtitles[_0xbfcb19].src;
              if (!MVPUtils.relativePath(_0xed6be9)) {
                _0xed6be9 = MVPUtils.qualifyURL(_0xed6be9);
              }
              _0x16fe4e.trackContentId = _0xed6be9;
              _0x16fe4e.trackContentType = "text/vtt";
              _0x16fe4e.trackId = parseInt(_0xbfcb19);
              _0x16fe4e.customData = null;
              _0x28f870.push(_0x16fe4e);
            }
          }
          var _0x4fa536 = _0xbfcb19++;
          _0x16fe4e = new chrome.cast.media.Track(_0x4fa536, chrome.cast.media.TrackType.TEXT);
          _0x16fe4e.subtype = chrome.cast.media.TextTrackType.SUBTITLES;
          _0x16fe4e.name = '';
          _0x16fe4e.trackContentId = '';
          _0x16fe4e.trackContentType = "text/vtt";
          _0x16fe4e.customData = null;
          _0x16fe4e.trackId = parseInt(_0x4fa536);
          _0x28f870.push(_0x16fe4e);
          _0x4f3649.tracks = _0x28f870;
        }
        var _0x1a20c7 = new chrome.cast.media.LoadRequest(_0x4f3649);
        var _0x4081dd;
        if (_0x2a4625.subtitles) {
          for (var _0xbfcb19 in _0x2a4625.subtitles) {
            if (_0x2a4625.subtitles[_0xbfcb19]["default"]) {
              _0x4081dd = parseInt(_0xbfcb19);
              _0x1a20c7.activeTrackIds = [parseInt(_0xbfcb19)];
              break;
            }
          }
        }
        if (_0x1ed2d9 || _0x58d98a) {
          _0x1a20c7.autoplay = true;
        } else {
          _0x1a20c7.autoplay = false;
          _0x1aab77.pause();
        }
        _0x5b7d5d = "BUFFERING";
        _0x1a20c7.currentTime = _0x5a1c76.getCurrentTime();
        _0x1aab77.setVolume();
        if (!_0x3436bc) {
          _0x5bb858();
          _0x3436bc = true;
        }
        cast.framework.CastContext.getInstance().getCurrentSession().loadMedia(_0x1a20c7).then(function () {
          console.log('LOADED');
          _0x5b7d5d = "LOADED";
        }, function (_0x50922b) {
          _0x5b7d5d = 'IDLE';
          console.log("Cast load media error: " + _0x50922b);
          _0x1d17f1();
        });
      }
      function _0x1d17f1() {
        var _0x3dc2a4 = cast.framework.CastContext.getInstance().getCurrentSession();
        if (_0x3dc2a4 && _0x3dc2a4.getMediaSession() && _0x3dc2a4.getMediaSession().media) {
          var _0x5348e3 = _0x3dc2a4.getMediaSession();
          var _0x99f6ac = _0x5348e3.media;
          if (_0x99f6ac.metadata) {
            var _0x12cd8d = _0x99f6ac.metadata.title;
            var _0x142ec5 = _0x99f6ac.metadata.episodeTitle;
            var _0x26e109 = _0x142ec5 ? _0x12cd8d + ": " + _0x142ec5 : _0x12cd8d;
            var _0x3de16c = _0x99f6ac.metadata.subtitle;
            var _0x53da1c = _0x3dc2a4.getCastDevice().friendlyName || "Chromecast";
          }
          if (_0x53da1c && _0x5b7d5d) {
            var _0x413f15 = _0x5b7d5d.toLowerCase();
            var _0x4ba859 = _0x413f15.charAt(0x0).toUpperCase() + _0x413f15.slice(0x1);
            _0x124524.querySelector('.mvp-cast-message-connect').style.display = "none";
            var _0x2fd91d = "<div class=\"mvp-cast-state\">" + _0x4ba859 + " on <strong>" + _0x53da1c + "</strong></div>";
            if (_0x26e109) {
              _0x2fd91d += "<div class=\"mvp-cast-title\">" + _0x26e109 + "</div>";
            }
            if (_0x3de16c) {
              _0x2fd91d += "<div class=\"mvp-cast-subtitle\">" + _0x3de16c + "</div>";
            }
            _0x124524.querySelector(".mvp-cast-message-state").style.display = "block";
            _0x124524.querySelector(".mvp-cast-message-state").innerHTML = _0x2fd91d;
          }
        }
      }
      _0x435310();
    };
    _0x4f9029.MVPCast = _0x4bdc93;
  })(window);