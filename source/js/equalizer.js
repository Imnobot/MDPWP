(function (_0x11ea2f, _0x12b780) {
    'use strict';
  
    var _0x4847bf = function (_0x1b263f) {
      var _0x54a2a6 = this;
      var _0x3bfe1f;
      var _0x3b203e;
      var _0x290ea4 = _0x1b263f.canvas;
      var _0x658ebc = _0x290ea4.getContext('2d');
      var _0x4d0835 = _0x1b263f.holder;
      var _0x1f8331;
      var _0x49ead9;
      var _0x282812;
      var _0x1f4faf;
      var _0xcb57c4;
      var _0x387ec3;
      var _0xca509d;
      var _0x5bf764;
      var _0x3dbed6;
      var _0x407911;
      var _0x138950;
      var _0x4c8206;
      var _0x37f3e6;
      var _0x3e3504 = 0.7;
      var _0x522bf6;
      this.resume = function () {
        alert(_0x3b203e.state);
        if (_0x3b203e.state === 'suspended' && typeof _0x3b203e.resume === 'function') {
          _0x3b203e.resume();
        }
      };
      this.init = function (_0x1fea1a) {
        if (!_0x522bf6) {
          _0x3b203e = new (_0x11ea2f.AudioContext || _0x11ea2f.webkitAudioContext)();
          _0x1f8331 = _0x3b203e.createAnalyser();
          _0x37f3e6 = _0x3b203e.createMediaElementSource(_0x1fea1a);
          _0x37f3e6.connect(_0x1f8331);
          _0x1f8331.connect(_0x3b203e.destination);
          _0x138950 = new Uint8Array(_0x1f8331.frequencyBinCount);
          _0x54a2a6.animate();
          _0x522bf6 = true;
        } else {
          _0x1f8331 = _0x3b203e.createAnalyser();
          _0x37f3e6.connect(_0x1f8331);
          _0x1f8331.connect(_0x3b203e.destination);
          _0x54a2a6.animate();
        }
      };
      this.animate = function () {
        _0x290ea4.width = _0x4d0835.width();
        _0x290ea4.height = _0x4d0835.height();
        _0x49ead9 = _0x290ea4.width / 0x2;
        _0x282812 = _0x290ea4.height / 0x2;
        _0x1f4faf = _0x290ea4.height / 0x6;
        if (_0x290ea4.height > 0x1f4) {
          _0xcb57c4 = 0xc8;
          _0x3e3504 = 0.7;
        } else {
          _0xcb57c4 = 0x64;
          _0x3e3504 = 0.5;
        }
        _0x658ebc.beginPath();
        _0x658ebc.arc(_0x49ead9, _0x282812, _0x1f4faf, 0x0, 0x2 * Math.PI);
        _0x658ebc.stroke();
        _0x1f8331.getByteFrequencyData(_0x138950);
        var _0x5a84df;
        for (_0x5a84df = 0x0; _0x5a84df < _0xcb57c4; _0x5a84df++) {
          _0x4c8206 = Math.PI * 0x2 / _0xcb57c4;
          _0x407911 = _0x138950[_0x5a84df] * _0x3e3504;
          _0x387ec3 = _0x49ead9 + Math.cos(_0x4c8206 * _0x5a84df) * _0x1f4faf;
          _0xca509d = _0x282812 + Math.sin(_0x4c8206 * _0x5a84df) * _0x1f4faf;
          _0x5bf764 = _0x49ead9 + Math.cos(_0x4c8206 * _0x5a84df) * (_0x1f4faf + _0x407911);
          _0x3dbed6 = _0x282812 + Math.sin(_0x4c8206 * _0x5a84df) * (_0x1f4faf + _0x407911);
          var _0x3887da = "rgb(" + _0x138950[_0x5a84df] + ", " + _0x138950[_0x5a84df] + ", " + 0xcd + ')';
          _0x658ebc.strokeStyle = _0x3887da;
          _0x658ebc.lineWidth = 0x2;
          _0x658ebc.beginPath();
          _0x658ebc.moveTo(_0x387ec3, _0xca509d);
          _0x658ebc.lineTo(_0x5bf764, _0x3dbed6);
          _0x658ebc.stroke();
        }
        _0x3bfe1f = requestAnimationFrame(_0x54a2a6.animate);
      };
      this.clean = function () {
        if (_0x3bfe1f) {
          cancelAnimationFrame(_0x3bfe1f);
        }
        if (_0x658ebc) {
          _0x658ebc.clearRect(0x0, 0x0, _0x290ea4.width, _0x290ea4.height);
        }
        if (_0x1f8331) {
          _0x1f8331.disconnect();
          _0x1f8331 = null;
        }
      };
      this.changeSrc = function () {
        _0x1f8331 = _0x3b203e.createAnalyser();
        _0x37f3e6.connect(_0x1f8331);
        _0x1f8331.connect(_0x3b203e.destination);
        _0x54a2a6.animate();
      };
    };
    _0x11ea2f.MVPAudioEqualizer = _0x4847bf;
  })(window, jQuery);