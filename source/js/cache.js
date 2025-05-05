(function (_0x40f3ef, _0x27d058) {
    'use strict';
  
    var _0x59bcd9 = function (_0x158c20) {
      var _0x8b3889 = this;
      var _0x4a8e18;
      if ("indexedDB" in _0x40f3ef) {
        var _0xa58f9e = indexedDB.open(_0x158c20, 0x1);
        _0xa58f9e.onupgradeneeded = function (_0x2bb704) {
          if (!_0xa58f9e.result.objectStoreNames.contains("playlistData")) {
            _0xa58f9e.result.createObjectStore("playlistData", {
              'keyPath': 'id'
            });
          }
        };
        _0xa58f9e.onsuccess = function (_0x1748e1) {
          _0x4a8e18 = _0xa58f9e.result;
          _0x8b3889.getData();
        };
        _0xa58f9e.onerror = function (_0x3bb5b1) {
          console.log(_0xa58f9e.errorCode);
        };
      }
      this.saveData = function (_0x1f404a) {
        var _0x413cc2 = _0x4a8e18.transaction("playlistData", "readwrite");
        var _0x5e511f = _0x413cc2.objectStore("playlistData");
        var _0x3817de = _0x5e511f.put({
          'id': 0x0,
          'value': _0x1f404a
        });
        _0x3817de.onerror = function (_0x2c0b9b) {
          console.log("Error", _0x2c0b9b.target.error.name);
        };
        _0x3817de.onsuccess = function (_0x388cae) {};
        _0x413cc2.oncomplete = function (_0x29316b) {};
      };
      this.getData = function () {
        var _0x530f2a = _0x4a8e18.transaction("playlistData", "readonly");
        var _0x1c135f = _0x530f2a.objectStore("playlistData");
        var _0x25fa53 = _0x1c135f.get(0x0);
        _0x25fa53.onsuccess = function (_0x15bd71) {
          var _0x17a3ff = _0x15bd71.target.result;
          _0x27d058(_0x8b3889).trigger('MVPCacheManager.GET_DATA', _0x17a3ff);
        };
        _0x25fa53.onerror = function (_0x3f6f49) {
          console.log("Error", _0x3f6f49.target.error.name);
        };
        _0x530f2a.oncomplete = function (_0x2a51e2) {};
      };
      this.deleteData = function () {
        var _0x28e37a = _0x4a8e18.transaction("playlistData", "readwrite");
        var _0x46f1e7 = _0x28e37a.objectStore("playlistData");
        var _0x576eba = _0x46f1e7['delete'](0x0);
        _0x576eba.onsuccess = function (_0x493bec) {};
        _0x576eba.onerror = function (_0x515062) {
          console.log("Error", _0x515062.target.error.name);
        };
        _0x28e37a.oncomplete = function (_0x39e11c) {};
      };
    };
    _0x40f3ef.MVPCacheManager = _0x59bcd9;
  })(window, jQuery);