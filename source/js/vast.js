(function (_0x733d2d, _0x12a721) {
    'use strict';
  
    var _0x510c48 = function (_0x18707d) {
      var _0x5527f9 = this;
      var _0x194ea2;
      var _0x2fb3c6 = [];
      var _0x5c5cfe = [];
      var _0x3020ac = [];
      var _0x53ff62 = [];
      var _0x4f924e = [];
      var _0x42eec0 = 0x0;
      var _0x324a20 = 0x1;
      _0x5527f9.stop = function () {
        if (_0x194ea2) {
          _0x194ea2.onreadystatechange = null;
          _0x194ea2.onerror = null;
          _0x194ea2.abort();
          _0x194ea2 = null;
        }
      };
      _0x5527f9.load = function (_0x4de16b) {
        if (_0x194ea2) {
          _0x5527f9.stop();
        }
        _0x194ea2 = new XMLHttpRequest();
        _0x194ea2.onreadystatechange = function (_0x416b39) {
          if (_0x194ea2.readyState == 0x4) {
            if (_0x194ea2.status == 0xc8) {
              var _0x486271 = _0x6b87c0(_0x194ea2.responseXML);
              try {
                var _0x4ef813 = _0x486271.VAST.Ad.Wrapper.VASTAdTagURI["#cdata-section"];
                if (!_0x4ef813) {
                  _0x4ef813 = _0x486271.VAST.Ad.Wrapper.VASTAdTagURI['#text'];
                }
                if (_0x4ef813) {
                  _0x5527f9.load(_0x4ef813);
                  return;
                }
              } catch (_0x4bc58e) {}
              if (_0x486271["vmap:VMAP"]) {
                if (!_0x486271["vmap:VMAP"]["vmap:AdBreak"].length) {
                  _0x486271["vmap:VMAP"]["vmap:AdBreak"] = [_0x486271['vmap:VMAP']["vmap:AdBreak"]];
                }
                var _0x2e555e;
                var _0x5c78d7 = _0x486271["vmap:VMAP"]["vmap:AdBreak"].length;
                var _0x2409f5;
                for (_0x2e555e = 0x0; _0x2e555e < _0x5c78d7; _0x2e555e++) {
                  _0x2409f5 = {};
                  _0x2409f5.timeOffset = _0x486271['vmap:VMAP']["vmap:AdBreak"][_0x2e555e]["@attributes"].timeOffset;
                  _0x2409f5.breakType = _0x486271["vmap:VMAP"]['vmap:AdBreak'][_0x2e555e]["@attributes"].breakType;
                  _0x2409f5.breakId = _0x486271["vmap:VMAP"]["vmap:AdBreak"][_0x2e555e]["@attributes"].breakId;
                  _0x2409f5.source = _0x486271['vmap:VMAP']["vmap:AdBreak"][_0x2e555e]["vmap:AdSource"]["vmap:AdTagURI"]["#cdata-section"];
                  _0x3020ac.push(_0x2409f5);
                }
                _0x324a20 = _0x3020ac.length;
                _0x5527f9.load(_0x3020ac[_0x42eec0].source);
                return;
              }
              var _0x50e3f8 = [];
              var _0x3e13a0 = [];
              var _0x486271 = _0x6b87c0(_0x194ea2.responseXML).VAST;
              if (!_0x486271.Ad) {
                var _0x3c99d4 = "No ad tag was found in the VAST file!";
                _0x12a721(_0x5527f9).trigger('MVPVastLoader.ERROR', {
                  'data': _0x3c99d4
                });
                return;
              } else {
                if (!_0x486271.Ad.length) {
                  _0x486271.Ad = [_0x486271.Ad];
                }
                var _0x2e555e;
                var _0x36ec83 = _0x486271.Ad.length;
                var _0x42f05d;
                var _0x1d464c;
                for (_0x2e555e = 0x0; _0x2e555e < _0x36ec83; _0x2e555e++) {
                  _0x1d464c = _0x486271.Ad[_0x2e555e].InLine;
                  if (!_0x1d464c) {
                    var _0x3c99d4 = "No InLine tag was found in the VAST file!";
                    _0x12a721(_0x5527f9).trigger('MVPVastLoader.ERROR', {
                      'data': _0x3c99d4
                    });
                    return;
                  }
                  _0x42f05d = {};
                  _0x42f05d.id = _0x486271.Ad[_0x2e555e]['@attributes'].id;
                  _0x42f05d.sequence = _0x486271.Ad[_0x2e555e]["@attributes"].sequence;
                  if (!_0x42f05d.sequence) {
                    _0x42f05d.sequence = _0x2e555e;
                  }
                  _0x42f05d.InLine = {};
                  if (_0x3020ac.length && _0x3020ac[_0x42eec0].timeOffset) {
                    _0x42f05d.timeOffset = _0x3020ac[_0x42eec0].timeOffset;
                  }
                  if (_0x486271.Ad[_0x2e555e]['@attributes'].timeOffset != undefined) {
                    _0x42f05d.timeOffset = _0x486271.Ad[_0x2e555e]["@attributes"].timeOffset;
                  }
                  if (_0x1d464c.Impression) {
                    if (_0x1d464c.Impression['#cdata-section']) {
                      _0x42f05d.InLine.Impression = _0x1d464c.Impression["#cdata-section"];
                    } else {
                      _0x42f05d.InLine.Impression = _0x1d464c.Impression["#text"];
                    }
                  }
                  if (!_0x1d464c.Creatives.Creative.length) {
                    _0x1d464c.Creatives.Creative = [_0x1d464c.Creatives.Creative];
                  }
                  if (_0x1d464c.Creatives.Creative.length) {
                    var _0x25fa72;
                    var _0x3d90ad = _0x1d464c.Creatives.Creative.length;
                    for (_0x25fa72 = 0x0; _0x25fa72 < _0x3d90ad; _0x25fa72++) {
                      if (_0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds) {
                        _0x42f05d.InLine.NonLinear = {};
                        _0x42f05d.InLine.type = "nonlinear";
                        _0x42f05d.InLine.NonLinear.duration = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear["@attributes"].minSuggestedDuration;
                        if (!_0x42f05d.InLine.NonLinear.duration) {
                          _0x42f05d.InLine.NonLinear.duration = "00:00:05";
                        }
                        try {
                          _0x42f05d.InLine.NonLinear.width = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear["@attributes"].width;
                          _0x42f05d.InLine.NonLinear.height = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear["@attributes"].height;
                        } catch (_0x300848) {}
                        try {
                          _0x42f05d.InLine.NonLinear.ClickThrough = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.NonLinearClickThrough["#cdata-section"];
                          _0x42f05d.InLine.NonLinear.ClickTracking = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.NonLinearClickTracking["#cdata-section"];
                        } catch (_0x209130) {}
                        if (_0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.StaticResource) {
                          _0x42f05d.InLine.NonLinear.source = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.StaticResource["#cdata-section"];
                        } else if (_0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.IFrameResource) {
                          _0x42f05d.InLine.NonLinear.source = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.IFrameResource["#cdata-section"];
                        }
                        try {
                          _0x42f05d.InLine.NonLinear.type = _0x1d464c.Creatives.Creative[_0x25fa72].NonLinearAds.NonLinear.StaticResource["@attributes"].creativeType;
                        } catch (_0x4e140f) {}
                        _0x3e13a0.push(_0x42f05d);
                      }
                      if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear) {
                        _0x42f05d.InLine.Linear = {};
                        _0x42f05d.InLine.type = "linear";
                        if (!_0x1d464c.Creatives.Creative[_0x25fa72].Linear.MediaFiles.MediaFile.length) {
                          _0x1d464c.Creatives.Creative[_0x25fa72].Linear.MediaFiles.MediaFile = [_0x1d464c.Creatives.Creative[_0x25fa72].Linear.MediaFiles.MediaFile];
                        }
                        var _0x3d4ec2;
                        var _0x142f51 = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.MediaFiles.MediaFile.length;
                        var _0x5b72f0;
                        var _0x408243 = [];
                        for (_0x3d4ec2 = 0x0; _0x3d4ec2 < _0x142f51; _0x3d4ec2++) {
                          _0x5b72f0 = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.MediaFiles.MediaFile[_0x3d4ec2];
                          if (_0x5b72f0['#cdata-section']) {
                            if (_0x5b72f0["#cdata-section"].match(/\.mp3|\.mp4/ig)) {
                              _0x408243.push(_0x5b72f0);
                            }
                          } else if (_0x5b72f0["#text"].match(/\.mp3|\.mp4/ig)) {
                            _0x408243.push(_0x5b72f0);
                          }
                        }
                        var _0x4ed616;
                        var _0x25ca65 = _0x408243.length;
                        var _0x2462fd;
                        if (_0x25ca65 == 0x0) {
                          console.log("cannot parse vast (MediaFilesArr 0); try using ima loader!");
                          continue;
                        }
                        for (_0x4ed616 = 0x0; _0x4ed616 < _0x25ca65; _0x4ed616++) {
                          if (_0x733d2d.innerWidth >= _0x408243[_0x4ed616]["@attributes"].width) {
                            _0x2462fd = _0x4ed616;
                            break;
                          }
                        }
                        if (_0x408243[_0x2462fd]["#cdata-section"]) {
                          _0x42f05d.InLine.Linear.source = _0x408243[_0x2462fd]["#cdata-section"];
                        } else {
                          _0x42f05d.InLine.Linear.source = _0x408243[_0x2462fd]['#text'];
                        }
                        if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.Duration) {
                          if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.Duration["#cdata-section"]) {
                            _0x42f05d.InLine.Linear.Duration = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.Duration['#cdata-section'];
                          } else if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.Duration['#text']) {
                            _0x42f05d.InLine.Linear.Duration = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.Duration['#text'];
                          }
                        }
                        if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear['@attributes']) {
                          if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear["@attributes"].skipoffset != undefined) {
                            _0x42f05d.InLine.Linear.skipoffset = _0x1d464c.Creatives.Creative[_0x25fa72].Linear['@attributes'].skipoffset;
                          }
                        }
                        if (_0x42f05d.InLine.Linear.skipoffset) {
                          _0x42f05d.InLine.Linear.skipoffset = _0x42f05d.InLine.Linear.skipoffset.substr(0x0, 0x8);
                          if (_0x42f05d.InLine.Linear.Duration && _0x42f05d.InLine.Linear.skipoffset.indexOf('%') != -0x1) {
                            var _0x47707a = Math.round(MVPUtils.toSeconds(_0x42f05d.InLine.Linear.Duration) * (_0x42f05d.InLine.Linear.skipoffset.substr(0x0, _0x42f05d.InLine.Linear.skipoffset.length - 0x1) / 0x64));
                            _0x42f05d.InLine.Linear.skipoffset = _0x47707a;
                          }
                        }
                        if (_0x42f05d.InLine.Linear.skipoffset) {
                          _0x42f05d.InLine.Linear.skipoffset = MVPUtils.toSeconds(_0x42f05d.InLine.Linear.skipoffset);
                          if (_0x42f05d.InLine.Linear.Duration && MVPUtils.toSeconds(_0x42f05d.InLine.Linear.Duration) <= _0x42f05d.InLine.Linear.skipoffset) {
                            delete _0x42f05d.InLine.Linear.skipoffset;
                          }
                        }
                        if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking) {
                          _0x42f05d.InLine.Linear.TrackingEvents = [];
                          var _0x1c9e03;
                          var _0x4e8b5e = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking.length;
                          for (_0x1c9e03 = 0x0; _0x1c9e03 < _0x4e8b5e; _0x1c9e03++) {
                            _0x42f05d.InLine.Linear.TrackingEvents.push({
                              'event': _0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking[_0x1c9e03]['@attributes'].event
                            });
                            if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking[_0x1c9e03]['#cdata-section']) {
                              _0x42f05d.InLine.Linear.TrackingEvents[_0x1c9e03].URI = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking[_0x1c9e03]["#cdata-section"];
                            } else {
                              _0x42f05d.InLine.Linear.TrackingEvents[_0x1c9e03].URI = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.TrackingEvents.Tracking[_0x1c9e03]["#text"];
                            }
                          }
                        }
                        if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks) {
                          if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickThrough) {
                            if (_0x42f05d.InLine.Linear.ClickThrough = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickThrough["#cdata-section"]) {
                              _0x42f05d.InLine.Linear.ClickThrough = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickThrough["#cdata-section"];
                            } else {
                              _0x42f05d.InLine.Linear.ClickThrough = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickThrough["#text"];
                            }
                          }
                          if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickTracking) {
                            if (_0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickTracking["#cdata-section"]) {
                              _0x42f05d.InLine.Linear.ClickTracking = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickTracking["#cdata-section"];
                            } else {
                              _0x42f05d.InLine.Linear.ClickTracking = _0x1d464c.Creatives.Creative[_0x25fa72].Linear.VideoClicks.ClickTracking["#text"];
                            }
                          }
                        }
                        _0x50e3f8.push(_0x42f05d);
                      }
                    }
                  }
                }
              }
              MVPUtils.keysrt(_0x50e3f8, "sequence");
              MVPUtils.keysrt(_0x3e13a0, 'sequence');
              var _0x2e555e;
              var _0x5c78d7 = _0x3e13a0.length;
              var _0x411a32;
              for (_0x2e555e = 0x0; _0x2e555e < _0x5c78d7; _0x2e555e++) {
                _0x411a32 = {};
                _0x411a32.type = "vastNonLinear";
                _0x411a32.path = _0x3e13a0[_0x2e555e].InLine.NonLinear.source;
                if (_0x3e13a0[_0x2e555e].InLine.NonLinear.type && _0x3e13a0[_0x2e555e].InLine.NonLinear.type.indexOf("image") != -0x1 || _0x411a32.path.match(/jpg|jpeg|png|webm/ig)) {} else {
                  continue;
                }
                if (_0x3e13a0[_0x2e555e].InLine.NonLinear.duration) {
                  _0x411a32.duration = MVPUtils.toSeconds(_0x3e13a0[_0x2e555e].InLine.NonLinear.duration);
                }
                _0x2226ba(_0x411a32, _0x3e13a0[_0x2e555e].timeOffset, _0x411a32.duration);
                _0x411a32.width = _0x3e13a0[_0x2e555e].InLine.NonLinear.width || 0x258;
                _0x411a32.height = _0x3e13a0[_0x2e555e].InLine.NonLinear.height || 0xc8;
                _0x411a32.width = parseInt(_0x411a32.width, 0xa);
                _0x411a32.height = parseInt(_0x411a32.height, 0xa);
                if (_0x3e13a0[_0x2e555e].InLine.NonLinear.ClickThrough) {
                  _0x411a32.link = _0x3e13a0[_0x2e555e].InLine.NonLinear.ClickThrough;
                }
                _0x411a32.target = "_blank";
                if (_0x3e13a0[_0x2e555e].InLine.NonLinear.ClickTracking) {
                  _0x411a32.ClickTracking = _0x3e13a0[_0x2e555e].InLine.NonLinear.ClickTracking;
                }
                _0x4f924e.push(_0x411a32);
              }
              _0x5c5cfe = _0x4f924e;
              var _0x2e555e;
              var _0x5c78d7 = _0x50e3f8.length;
              var _0x411a32;
              for (_0x2e555e = 0x0; _0x2e555e < _0x5c78d7; _0x2e555e++) {
                _0x411a32 = {};
                _0x411a32.type = "video";
                _0x411a32.path = _0x50e3f8[_0x2e555e].InLine.Linear.source;
                if (_0x50e3f8[_0x2e555e].timeOffset != undefined) {
                  var _0x4e0a11 = _0x50e3f8[_0x2e555e].timeOffset;
                  _0x2c8679(_0x411a32, _0x4e0a11);
                } else {
                  _0x411a32.adPre = true;
                  _0x411a32.begin = 0x0;
                }
                if (_0x50e3f8[_0x2e555e].InLine.Linear.Duration) {
                  _0x411a32.duration = MVPUtils.toSeconds(_0x50e3f8[_0x2e555e].InLine.Linear.Duration);
                }
                if (_0x50e3f8[_0x2e555e].InLine.Linear.skipoffset != undefined) {
                  _0x411a32.skipEnable = _0x50e3f8[_0x2e555e].InLine.Linear.skipoffset;
                }
                _0x411a32.link = _0x50e3f8[_0x2e555e].InLine.Linear.ClickThrough;
                if (_0x50e3f8[_0x2e555e].InLine.Linear.ClickTracking) {
                  _0x411a32.ClickTracking = _0x50e3f8[_0x2e555e].InLine.Linear.ClickTracking;
                }
                _0x411a32.target = '_blank';
                if (_0x50e3f8[_0x2e555e].InLine.Impression) {
                  _0x411a32.Impression = _0x50e3f8[_0x2e555e].InLine.Impression;
                }
                if (_0x50e3f8[_0x2e555e].InLine.Linear.TrackingEvents) {
                  _0x411a32.TrackingEvents = _0x50e3f8[_0x2e555e].InLine.Linear.TrackingEvents;
                }
                _0x53ff62.push(_0x411a32);
              }
              _0x2fb3c6 = _0x53ff62;
              _0x42eec0++;
              if (_0x42eec0 == _0x324a20) {
                _0x12a721(_0x5527f9).trigger('MVPVastLoader.END_LOAD', {
                  'linear': _0x2fb3c6,
                  'nonlinear': _0x5c5cfe
                });
              } else {
                _0x5527f9.load(_0x3020ac[_0x42eec0].source);
              }
            } else {
              _0x12a721(_0x5527f9).trigger("MVPVastLoader.ERROR", {
                'data': _0x194ea2.statusText
              });
            }
          }
        };
        _0x194ea2.onerror = function (_0x1c1654) {
          _0x12a721(_0x5527f9).trigger("MVPVastLoader.ERROR", {
            'data': _0x1c1654
          });
        };
        _0x194ea2.open("get", _0x4de16b, true);
        _0x194ea2.setRequestHeader("Content-Type", "text/xml");
        _0x194ea2.send();
      };
      function _0x2c8679(_0x169ed8, _0x2e9a00) {
        if (_0x2e9a00.toLowerCase() == "start") {
          _0x169ed8.begin = 0x0;
          _0x169ed8.adPre = true;
        } else {
          if (_0x2e9a00.toLowerCase() == 'end') {
            _0x169ed8.begin = 'end';
            _0x169ed8.adEnd = true;
          } else if (_0x2e9a00.indexOf('%') != -0x1) {
            _0x169ed8.begin = _0x2e9a00;
            _0x169ed8.adMid = true;
          } else {
            _0x169ed8.begin = MVPUtils.toSeconds(_0x2e9a00);
            _0x169ed8.adMid = true;
          }
        }
      }
      function _0x2226ba(_0x260f7f, _0x234eef, _0x4388e5) {
        if (!_0x234eef) {
          _0x234eef = "start";
        }
        if (_0x234eef.toLowerCase() == "start") {
          _0x260f7f.start = 0x0;
          _0x260f7f.end = _0x4388e5;
        } else if (_0x234eef.indexOf('%') != -0x1) {
          _0x260f7f.start = _0x234eef;
          _0x260f7f.end = _0x4388e5;
        } else {
          _0x260f7f.start = MVPUtils.toSeconds(_0x234eef);
          _0x260f7f.end = parseInt(_0x260f7f.start, 0xa) + _0x4388e5;
        }
      }
      function _0x6b87c0(_0x954d16) {
        var _0x580ce9 = {};
        if (_0x954d16.nodeType == 0x1) {
          if (_0x954d16.attributes.length > 0x0) {
            _0x580ce9["@attributes"] = {};
            for (var _0xfd57c6 = 0x0; _0xfd57c6 < _0x954d16.attributes.length; _0xfd57c6++) {
              var _0x287719 = _0x954d16.attributes.item(_0xfd57c6);
              _0x580ce9['@attributes'][_0x287719.nodeName] = _0x287719.nodeValue;
            }
          }
        } else {
          if (_0x954d16.nodeType == 0x3) {
            _0x580ce9 = _0x954d16.nodeValue.trim();
          } else if (_0x954d16.nodeType == 0x4) {
            _0x580ce9 = _0x954d16.nodeValue;
          }
        }
        if (_0x954d16.hasChildNodes()) {
          for (var _0xb06dae = 0x0; _0xb06dae < _0x954d16.childNodes.length; _0xb06dae++) {
            var _0x25ded7 = _0x954d16.childNodes.item(_0xb06dae);
            var _0x2eda23 = _0x25ded7.nodeName;
            if (typeof _0x580ce9[_0x2eda23] == "undefined") {
              _0x580ce9[_0x2eda23] = _0x6b87c0(_0x25ded7);
            } else {
              if (typeof _0x580ce9[_0x2eda23].length == "undefined") {
                var _0x115b50 = _0x580ce9[_0x2eda23];
                _0x580ce9[_0x2eda23] = [];
                _0x580ce9[_0x2eda23].push(_0x115b50);
              }
              if (typeof _0x580ce9[_0x2eda23] === "object") {
                _0x580ce9[_0x2eda23].push(_0x6b87c0(_0x25ded7));
              }
            }
          }
        }
        return _0x580ce9;
      }
      ;
    };
    _0x733d2d.MVPVastLoader = _0x510c48;
  })(window, jQuery);