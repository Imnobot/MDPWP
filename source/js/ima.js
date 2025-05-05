(function (_0x4d27d6, _0x4a3823) {
    'use strict';
  
    var _0x3918ef = function (_0xa51561, _0xd9f232, _0x76302a, _0x430488) {
      var _0x5c2dbb = this;
      var _0x4d3d71;
      var _0x3a5935;
      var _0x5bbf72;
      var _0x3ab668 = false;
      var _0xfc55f8;
      var _0x4a5f55;
      var _0x3ce1f2;
      var _0x4db24f;
      var _0x217bb7;
      var _0xe3e41c;
      var _0x150a39;
      var _0x47567d;
      var _0x42c976;
      var _0x479e2d = MVPUtils.isIOS();
      function _0x145254() {
        _0x150a39 = new google.ima.AdDisplayContainer(_0x430488[0x0], _0x42c976);
        _0x47567d = new google.ima.AdsLoader(_0x150a39);
        _0x47567d.getSettings().setDisableCustomPlaybackForIOS10Plus(true);
        _0x47567d.addEventListener(google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED, _0x4c5a1a, false);
        _0x47567d.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, _0x4103e3, false);
      }
      function _0x4c5a1a(_0x1953eb) {
        var _0x41a886 = new google.ima.AdsRenderingSettings();
        _0x41a886.restoreCustomPlaybackStateOnAdBreakComplete = true;
        if (_0xa51561.hideImaAdTimer) {
          _0x41a886.uiElements = [];
        }
        _0x4db24f = _0x1953eb.getAdsManager(_0x42c976, _0x41a886);
        _0x4db24f.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, _0x4103e3);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.LOADED, _0x467d3d);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED, _0x51fa1b);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED, _0x23be31);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.AD_PROGRESS, _0x536570);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.STARTED, _0x1a550b);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.RESUMED, _0x150c12);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.PAUSED, _0x1a5d2e);
        _0x4db24f.addEventListener(google.ima.AdEvent.Type.ALL_ADS_COMPLETED, _0x470592);
        _0x3ab668 = true;
        if (_0x479e2d && _0xa51561.forceAdMutedOnIos) {
          _0x5c2dbb.setVolume(0x0);
        } else if (_0x4a5f55) {
          _0x5c2dbb.setVolume(_0x4a5f55);
        } else {
          _0x5c2dbb.setVolume(0x0);
        }
        _0x5c2dbb.play();
      }
      function _0x4103e3(_0x317f5f) {
        console.log("IMA ERROR - " + _0x317f5f.getError());
        _0x5c2dbb.stop();
        _0xd9f232.cancelIma();
        _0xd9f232.playMedia();
      }
      function _0x467d3d(_0x2838cd) {
        _0xfc55f8 = _0x2838cd.getAd().isLinear();
        _0xd9f232.setImaType(_0xfc55f8);
        _0x5c2dbb.resize();
        if (!_0x3ce1f2) {
          _0x58f36a();
        }
      }
      function _0x51fa1b(_0x4f2d65) {
        _0x430488.addClass('mvp-holder-visible');
        _0x430488.removeClass('mvp-w0');
        _0xd9f232.pauseMedia();
        _0x4d3d71 = true;
        _0xfc55f8 = _0x4f2d65.getAd().isLinear();
        _0xd9f232.setImaType(_0xfc55f8);
        _0x5c2dbb.resize();
        _0xd9f232.setAdInterface();
      }
      function _0x23be31() {
        _0x4d3d71 = false;
        _0x3a5935 = false;
        _0x430488.removeClass("mvp-holder-visible");
        _0x430488.addClass("mvp-w0");
        if (!_0x217bb7) {
          _0xd9f232.hideAdInterface();
          _0xd9f232.showPlayerInterface();
          _0xd9f232.playMedia();
        }
      }
      function _0x536570(_0x25dcc2) {
        var _0x409626 = _0x25dcc2.getAdData();
        var _0x261a0a = Math.round(_0x409626.currentTime);
        var _0x2c0eb9 = Math.round(_0x409626.duration);
        _0xd9f232.trackProgress(false, _0x261a0a, _0x2c0eb9);
      }
      function _0x1a550b(_0x257320) {
        _0x3a5935 = true;
        _0xfc55f8 = _0x257320.getAd().isLinear();
        _0xd9f232.setImaType(_0xfc55f8);
        _0x5c2dbb.resize();
        if (!_0xfc55f8) {
          _0x430488.addClass("mvp-holder-visible");
          _0xd9f232.playMedia();
        }
      }
      function _0x150c12(_0x6f22e2) {
        _0x3a5935 = true;
        _0xd9f232.toggleBigPlay(false);
      }
      function _0x1a5d2e(_0x34df95) {
        _0x3a5935 = false;
        _0xd9f232.toggleBigPlay(true);
      }
      function _0x470592() {
        if (_0xe3e41c) {
          _0xe3e41c = false;
          _0xd9f232.mediaEndHandler();
        } else {
          _0xd9f232.hideAdInterface();
          _0xd9f232.showPlayerInterface();
          _0xd9f232.playMedia();
        }
      }
      function _0x58f36a() {
        var _0x5e58af = _0x4db24f.getCuePoints();
        if (!_0x5e58af) {
          return;
        }
        if (!_0x3ce1f2) {
          _0x3ce1f2 = [];
          var _0x721a95;
          var _0x18640c = _0x5e58af.length;
          var _0x468e41;
          for (_0x721a95 = 0x0; _0x721a95 < _0x18640c; _0x721a95++) {
            _0x468e41 = _0x5e58af[_0x721a95];
            if (_0x468e41 == -0x1) {
              _0x468e41 = "end";
              _0xe3e41c = true;
            }
            _0x3ce1f2[_0x721a95] = {
              'timeStart': _0x468e41
            };
          }
        }
        if (_0x5e58af.length) {
          _0xd9f232.makeAdMarkersIma(_0x5e58af);
        }
      }
      _0x5c2dbb.play = function () {
        if (!_0x3ab668) {
          return;
        }
        if (!_0x5bbf72) {
          _0x5bbf72 = true;
          _0x150a39.initialize();
          try {
            var _0x30bf5e = _0x76302a.width();
            var _0x3afec0 = _0x76302a.height();
            _0x4db24f.init(_0x30bf5e, _0x3afec0, google.ima.ViewMode.NORMAL);
            _0x5c2dbb.resize();
            _0x4db24f.start();
          } catch (_0x5c70db) {
            console.log("ima loader self.play ", _0x5c70db);
            _0xd9f232.playMedia();
          }
        } else if (_0x4d3d71) {
          _0x4db24f.resume();
        } else {
          _0xd9f232.playMedia();
        }
      };
      _0x5c2dbb.pause = function () {
        if (!_0x3ab668) {
          return;
        }
        if (_0x4d3d71) {
          _0x4db24f.pause();
        } else {
          _0xd9f232.pauseMedia();
        }
      };
      _0x5c2dbb.togglePlayPause = function () {
        if (_0x3a5935) {
          _0x5c2dbb.pause();
        } else {
          _0x5c2dbb.play();
        }
      };
      _0x5c2dbb.setVolume = function (_0x463071) {
        if (_0x4db24f) {
          _0x4db24f.setVolume(_0x463071);
        }
      };
      _0x5c2dbb.contentComplete = function () {
        _0x217bb7 = true;
        _0x47567d.contentComplete();
      };
      _0x5c2dbb.getIsLinear = function () {
        return _0xfc55f8;
      };
      _0x5c2dbb.getHasPostRoll = function () {
        return _0xe3e41c;
      };
      _0x5c2dbb.load = function (_0x1f2290, _0x3e1bce, _0x4378a5) {
        _0x42c976 = _0x3e1bce;
        _0x4a5f55 = _0x4378a5;
        if (_0x5bbf72) {
          _0x5c2dbb.stop();
        }
        _0x145254();
        _0x430488.removeClass("mvp-w0");
        var _0x51bc01 = new google.ima.AdsRequest();
        _0x51bc01.adTagUrl = _0x1f2290;
        var _0x3604ad = _0x76302a.width();
        var _0x1fbbd7 = _0x76302a.height();
        _0x51bc01.linearAdSlotWidth = _0x3604ad;
        _0x51bc01.linearAdSlotHeight = _0x1fbbd7;
        _0x51bc01.nonLinearAdSlotWidth = _0x3604ad;
        _0x51bc01.nonLinearAdSlotHeight = _0x1fbbd7;
        _0x47567d.requestAds(_0x51bc01);
      };
      _0x5c2dbb.stop = function (_0x575389) {
        _0x430488.removeClass("mvp-holder-visible").addClass("mvp-w0").css("transform", "none");
        _0x3ab668 = false;
        _0x4d3d71 = false;
        _0x5bbf72 = false;
        _0xfc55f8 = true;
        _0xe3e41c = false;
        _0x217bb7 = false;
        _0x3ce1f2 = null;
        _0x5c2dbb.destroy();
      };
      _0x5c2dbb.destroy = function () {
        if (_0x150a39) {
          _0x150a39.destroy();
          _0x150a39 = null;
        }
        if (_0x47567d) {
          _0x47567d.destroy();
          _0x47567d = null;
        }
        if (_0x4db24f) {
          _0x4db24f.stop();
          _0x4db24f.destroy();
          _0x4db24f = null;
        }
      };
      _0x5c2dbb.resize = function () {
        if (_0x430488) {
          if (!_0xfc55f8) {
            var _0x3974c4 = -_0xd9f232.find(".mvp-player-controls-bottom").height();
            _0x430488.css("transform", "translateY(" + _0x3974c4 + 'px');
          } else {
            _0x430488.css("transform", "none");
          }
        }
        if (_0x4db24f) {
          var _0x1c718d = _0x76302a.width();
          var _0x3974c4 = _0x76302a.height();
          _0x4db24f.resize(_0x1c718d, _0x3974c4, google.ima.ViewMode.NORMAL);
        }
      };
    };
    _0x4d27d6.MVPImaLoader = _0x3918ef;
  })(window, jQuery);